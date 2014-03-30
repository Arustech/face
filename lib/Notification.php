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
                    AND tbl_noti_user.`noti_user_to` = $user_id ";
        $rows   = $this->db->ex($sql);
        
        if(count($rows)>0)
        {
         
           foreach($rows as $row)
           {
           
               if($row['noti_type']=='friend_request_accept' && $row['noti_user_to']==$user_id)
               {
                $html.="<li><a href='javascript:;'>";
                $html.="<span><img src='".$this->config['upload_url'].'thumbs/'.$user_data['user_avatar']."' width='50px' height='50px'></span>";
                $html.="<span class='message'>".$row['noti_title']."</span><BR><span class='time'>".$row['noti_date']."</span></a></li>";
        
                }
                if($row['noti_type']=='post' ){
                    $html.="<li><a href='javascript:;'>";
                    $html.="<span><img src='".$this->config['upload_url'].'thumbs/'.$user_data['user_avatar']."' width='50px' height='50px'></span>";
                    $html.="<span class='message'>".$row['noti_title']."</span><BR><span class='time'>".$row['noti_date']."</span></a></li>";
                        
                }
                
           
        }
        }
       $html.="</div><li><div class='footer'><a href='requests'>View all Notifications</a></div> </li>";
       echo $html;
     }
    
    
    
    
   /* end of class */}

?>