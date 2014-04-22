<?php

/// version 1.0

class Notification Extends Member {

    public $tbl = 'tbl_noti';
    
    public function getAddnoti($data)
    {
     
        if(count($data>0))
        {
            switch ($data['noti_type'])
            {
                case 'friend_request_accept':
                    $this->getAddFriendRequestNoti($data);
                    return 'added noti';
                    break;
                case 'post':
                    $this->getAddPostNoti($data);
                    return 'noti posted';
                    break;
                
            }
            
        }
       
    }
    
    
    public function getAddFriendRequestNoti($data)
    {
        
        $accepted_from  = $this->db->get_row('tbl_profile_basic',array('user_id'=>$data['noti_from_user']));
                $accepted_user_name = ucfirst($accepted_from['first_name']).' '.$accepted_from['last_name'];
                $data['noti_title'] = $accepted_user_name.' has accepted your friend request';
                
                 // inserting data to table...
                 $res   = $this->db->insert($this->tbl,$data);
                
                 if($res)
                 {
                     $noti  = array();
                     $noti['noti_user_to']    = $data['noti_data'];
                     $noti['noti_id']         = $this->db->last_id;
                     $this->db->insert('tbl_noti_user',$noti);                   
                     return true;
                 }
                      
    }
    
    public function getAddPostNoti($data)
    {
       $specific_friends   ="";
        $sender_full_name   = $this->get_full_name($data['noti_from_user']);
        $data['noti_title'] = $sender_full_name.' posted a new '. $data['post_type'];
       
        // unsetting post type and inserting data into noti table....
        unset($data['post_type']);
        if(isset($data['specific_friends']) && $data['specific_friends']!="")
        {
           $specific_friends    = $data['specific_friends'];
           unset($data['specific_friends']);
        }
        
        
        // inserting data to table...
         $res   = $this->db->insert($this->tbl,$data);
        $noti_id    =$this->db->last_id;
         if($res)
         {
             $noti  = array();
             $noti['noti_id']         = $noti_id;
             
             if(!empty($specific_friends))
             {
                 if(strstr($specific_friends, ','))
                 {
                     $friendzz  = explode(',', $specific_friends);
                     foreach($friendzz as $friendz)
                     {
                        $noti['noti_user_to']    = $friendz;
                        $this->db->insert('tbl_noti_user',$noti);                          
                     }
                     return true;
                 }else
                 {
                    $noti['noti_user_to']    = $specific_friends;
                    $this->db->insert('tbl_noti_user',$noti);                    
                    return true;
                 }
                 
                 
             }else
             {
                //$friends = $this->db->get_rows('tbl_friend', array('user_id' => $data['noti_from_user']));
                $query="SELECT * FROM `tbl_friend`, `tbl_user` WHERE tbl_friend.`user_friend_id` = tbl_user.`user_id` AND tbl_user.`user_noti` = 1 AND tbl_friend.user_id = $data[noti_from_user] ";
                $friends=$this->db->ex($query);
                if(!empty($friends))
                {

                foreach($friends as $friend)
                {
                    
                    $noti['noti_user_to']    = $friend['user_friend_id'];
                  
                    $this->db->insert('tbl_noti_user',$noti);  
                   // creating Log //// 
                    $trigger_obj=$this->load_model('Trigger');
                    $trigger_obj->notification_log($data['noti_from_user'],$friend['user_friend_id']);
                    
                 }
                 return true;       
                }
             }
         }
         
    }
    
    
    
    
    public function getUserNoti()
    {
        
        $user_data  = $this->check_user();
        $user_id    = $user_data['user_id'];
        
        $html="<div class='popOverBox'>";
        $sql    ="SELECT 
                    tbl_noti.*,tbl_noti_user.* 
                  FROM
                    tbl_noti 
                    LEFT JOIN tbl_noti_user 
                      ON tbl_noti.noti_id = tbl_noti_user.noti_id 
                  WHERE tbl_noti.`noti_id` = tbl_noti_user.`noti_id` 
                    AND tbl_noti_user.`noti_user_to` = $user_id  order by tbl_noti.noti_id desc limit 5";
        $rows   = $this->db->ex($sql);
       
        
        
        if(count($rows)>0)
        {
        
           
            
           foreach($rows as $row)
           {
           
               $noti_from_user_id   =   $row['noti_from_user']; 
               
               $noti_sender    = $this->db->get_row('tbl_user',array('user_id'=>$noti_from_user_id));
               $sender_avatar  = isset($noti_sender['user_avatar']) ? $noti_sender['user_avatar'] : "default.png";
              
               if($row['noti_type']=='friend_request_accept' && $row['noti_user_to']==$user_id)
               {
                $html.="<li><a href='javascript:;'>";
                $html.="<div style='display:flex;display: -ms-flexbox;'><span><img src='".$this->config['upload_url'].'thumbs/'.$sender_avatar."' width='50px' height='50px'></span>";
                $html.="<span style='margin-left:21px' class='message noti_message'>".$row['noti_title']."</span></div><BR><span style='position:relative;bottom:30px' class='time time_noti'>".$row['noti_date']."</span></a></li>";
        
                }
                if($row['noti_type']=='post' ){
                    $html.="<li><a href='".$this->config['web_path']."single_post.php?mod=sp&p_id=".$row['noti_data']."&nid=".$row['noti_user_id']."'>";
                    $html.="<div style='display:flex;display: -ms-flexbox;'><span><img src='".$this->config['upload_url'].'thumbs/'.$sender_avatar."' width='50px' height='50px'></span>";
                    $html.="<span style='margin-left:15px' class='message noti_message'>".$row['noti_title']."</span></div><BR><span style='position:relative;bottom:33px' class='time time_noti'>".$row['noti_date']."</span></a></li>";
                        
                }
           
        }
        }
       $html.="</div><li><div class='footer'><a href='javascript:;'></a></div> </li>";
       //<!--<li><div class='footer'><a href='requests'>View all Notifications</a></div> </li>-->
       echo $html;
     }
    
    public function getUserNotiCount()
    {
        $user_data  = $this->check_user();
        $user_id    = $user_data['user_id'];
  
        $sql="SELECT 
                COUNT(noti_user_id) AS total 
              FROM
                tbl_noti,
                tbl_noti_user 
              WHERE tbl_noti.`noti_id` = tbl_noti_user.`noti_id` 
                AND tbl_noti_user.`noti_flag` = '0' 
                AND tbl_noti_user.`noti_user_to`=$user_id";
        $res    = $this->db->ex($sql);
        if(count($res)>0)
        {
            return $res[0]['total'];            
        }
    }
    
    
   /* end of class */}

?>