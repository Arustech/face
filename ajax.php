<?php
if (isset($_POST['action'])) {

   require('lib/Main.php');
   $main = new Main;

   if ($_POST['action'] == 'check_email') {
      if ($main->load_model('Member')->check_email($_POST['user_email'])) {
         echo "true";
      } else {
         echo "false";
      }
   }

   
   if ($_POST['action'] == 'post_comment') {
      $img =  $_POST['img'];
     $data =  $main->unsetA($_POST, 'action,img');
      $data['comment_on_date']=$main->current_date_time();
      if ($main->load_model('Posts')->post_comment($data)) {
         $tpl='<div class="panel-body"><a href="#"><img alt="" src="'.$img.'"></a>
               <p><span>'.$main->load_model('Member')->get_full_name($data['comment_by']).'</span> '.$data['description'].'</p>
                        <p class="links">
                           <a href="" class="red">'.$main->get_time_diff($data['comment_on_date']).'</a>-
                           <a href="">Like</a>-
                           <a href="">Share</a>-
                           <a href="">Send message</a>
                        </p>
                     </div>';
         echo $tpl;
         
         
      } else {
         echo "false";
      }
   }


   if ($_POST['action'] == 'accept_request') {

      if ($main->load_model('Member')->make_friends($_POST['user_id'], $_POST['friend_id'], 'friends', true)) {
         echo "true";
      } else {
         echo "false";
      }
   }

   if ($_POST['action'] == 'check_email_already') {
      if ($main->load_model('Member')->check_email($_POST['user_email'])) {
         echo "false";
      } else {
         echo "true";
      }
   }

   if ($_POST['action'] == 'check_user_already') {
      if ($main->load_model('Member')->check_user_name($_POST['user_name'])) {
         echo "false";
      } else {
         echo "true";
      }
   }

   if ($_POST['action'] == 'add_friend') {
      if ($main->load_model('Member')->send_friend_request($_POST['user_id'], $_POST['friend_id'])) {
         echo "true";
      } else {
         echo "false";
      }
   }


   if ($_POST['action'] == 'remove_friend') {
      if ($main->load_model('Member')->remove_friend($_POST['user_id'], $_POST['friend_id'])) {
         echo "true";
      } else {
         echo "false";
      }
   }

   if ($_POST['action'] == 'reject_request') {
      if ($main->load_model('Member')->remove_request($_POST['user_id'], $_POST['friend_id'])) {
         echo "true";
      } else {
         echo "false";
      }
   }

   if ($_POST['action'] == 'search_friends') {

      $member = $main->load_model("Member");
      $user_id = $_GET['user_id'];
      $rows = $member->search(strtolower($_GET['search']), $user_id, $_POST['offset'], $_POST['limit']);
//      var_dump($rows);exit;
      if ($rows) {
         foreach ($rows as $users) {
            ?>
            <div class="frd_request">
               <div class="thumbnail_img"><img src="<?= $main->config['thumb_path'] . $users['user_avatar'] ?>" width="75px" height="75px"></img> </div>
               <div class="biodate"> <a href="<?=$main->config['web_path'].$users['user_name']?>"><?= ucfirst($users['first_name'] . ' ' . $users['last_name']) ?></a>


                  <?php
                  $place = '';
                  $city = $users['city'];
                  $country = $users['country_name'];

                  if ($city == '' || $country == '')
                     $place = $city . $country;

                  if ($city != '' && $country != '')
                     $place = $city . ' , ' . $country;
                  ?>
                  <p><span class="glyphicon glyphicon-home"></span> <?= $place ?></p>
                  <?php if ($users['company_name']): ?>
                     <p> Works at <?= ucfirst($users['company_name']) ?></p>
                  <?php endif; ?>



               </div>

               <div class="Confirm_btn">

                  <?php
                  $is_ = $member->check_already_friend($user_id, $users['user_id']);

                  // $href ='index?add='.$users['user_id'];
                  $text = 'Add as friend';
                  $disabled = '';
                  $class = 'btn_friend';
                  $add_frd = '<span class="glyphicon glyphicon-plus add_frd"></span>';
                  if ($is_['is_friend'] || $is_['is_request']):
                     $text = $is_['is_request'] ? 'Request sent already.' : 'Already Friend';
                     $class = '';
                     $disabled = "disabled";
                     $add_frd = '';
                  endif;
                  ?>
                  <button <?= $disabled ?>  class="btn btn-primary btn_friend" name="post_status" id="<?= $users['user_id'] ?>"><?=$add_frd?><?= $text ?></button> 

                  <!--<a href="#" class="btn btn-default">Delete Request</a>-->
               </div>
            </div>
            <?php
         }//foreachends
      }//if ends
      else {
         echo "false";
      }
   }
   
   
   if(isset($_REQUEST['action']) && $_REQUEST['action']=='post_imgz')
   {
       $obj_post   = $main->load_model('Posts'); 
       $obj_post->post_photo($_POST);
      
    }
     if ($_POST['action'] == 'get_msg') {
       
       $obj_Inbox = $main->load_model('Inbox');
       

       $msg = $obj_Inbox->getAllMsg($_POST['user_id'],$_POST['from']);
 //        $msg = $obj_Inbox->getAllMsg($_POST['user_id']);

        foreach ($msg as $msgs){
  $sender = $obj_Inbox->getUserName($msgs['msg_send_by']);

   $obj_Inbox->Set_read_flag($msgs['msg_id']);
        "<li class='left clearfix'><span class='chat-img pull-left'>
                            <img src='img/profile.jpg' alt='User Avatar' c />
                        </span>
                            <div class='chat-body clearfix'>
                                <div class='header'>
                                    <strong class='primary-font'>$sender</strong> <small class='pull-right text-muted'>
                                        <span class='glyphicon glyphicon-time'></span>12 mins ago</small>
                                </div>
                                <p>$msgs[msg_data]</p>
                            </div>
                        </li>";
        }        
 
   }
   
   if($_REQUEST['action']=='del_post')
   {
       $post_id  = isset($_REQUEST['post_id'])? $_REQUEST['post_id'] : "";
      if(!empty($post_id))
      {
       $res = $main->getPostDel($post_id);
       if($res)
           echo  'true';
       else
           echo  'false_close';
      }else
      {
          echo  'false_all';
      }
   }// end of delpost
   
   if($_REQUEST['action']=='del_comment')
   {
       $comment_id  = isset($_REQUEST['comment_id'])? $_REQUEST['comment_id'] : "";
      if(!empty($comment_id))
      {
       $res = $main->getDel('tbl_post_comment', 'comment_id', $comment_id);
       if($res)
           echo  'true';
       else
           echo  'false_close';
      }else
      {
          echo  'false_all';
      }
   }// end of delpost
   
   ////////////////// AR
     if ($_POST['action'] == 'get_msg') {
       
       $obj_Inbox = $main->load_model('Inbox');

       $msg = $obj_Inbox->getAllMsg($_POST['user_id'],$_POST['from']);
       $get_msg_sender = $obj_Inbox->getAllMsg($_POST['from'],$_POST['user_id']);
    
$obj_mbr = $main->load_model('Member');

        foreach ($msg as $msgs){
            $obj_Inbox->Set_read_flag($msgs['msg_id']);
             $rcvr =$_POST['from'];
   $sender = $obj_mbr->get_full_name($msgs['msg_send_by']);
  $time =$main->get_time_diff($msgs['msg_send_date']);
       echo "<li class='left clearfix'><span class='chat-img pull-left'>
                            <img src='img/profile.jpg' alt='User Avatar' c />
                        </span>
                        <div class='rcv' id='$rcvr'></div>
                            <div class='chat-body clearfix'>
                                <div class='header'>
                                    <strong class='primary-font'>$sender</strong> <small class='pull-right text-muted'>
                                        <span class='glyphicon glyphicon-time'></span>$time</small>
                                </div>
                                
                                <p>$msgs[msg_data]</p>
                            </div>
                        </li>";}
       ////////////////// sender/////////////////
        foreach ($get_msg_sender as $get_msg_sender_row){
            $time2 =$main->get_time_diff($get_msg_sender_row['msg_send_date']);
       echo  '<li class="right clearfix"><span class="chat-img pull-right">
                            <img src="img/profile.jpg" />
                        </span>
                        <div class="rcv" id=""></div>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$time2.'</small>
                                    <strong class="pull-right primary-font">Me</strong>
                                </div>
                                <p>
                      '.$get_msg_sender_row["msg_data"].'
                 </p>
            </div> </li>';
        }
       ////////////////////////////////////////
          
   }

        if ($_POST['action'] == 'send_msg') {
       
       $obj_Inbox = $main->load_model('Inbox');

//       $date [] = array('msg_send_to'=>$_POST['rcvr_id'],'msg_send_by'=>$_POST['user_id'],'msg_data'=>$_POST['']);
  
 if($_POST["rcvr_id"]== '') 
 {
  
echo  '<li class="right clearfix"><span class="chat-img pull-right">
                          
                        </span>
                        <div class="rcv" id="'.$_POST["rcvr_id"].'"></div>
                            <div class="chat-body clearfix">
                                <div class="header">
                                   
                                    <strong class="pull-right primary-font">Error</strong>
                                </div>
                                <p>
                                    Please select user first..
                                </p>
                            </div>
                        </li>';
         
     
 }
     
 
else
     
     {
  
   if($_POST["msg"]){ 
$msg = $obj_Inbox->sendMsg($_POST["sender"],$_POST["rcvr_id"], $_POST["msg"]);
       

echo  '<li class="right clearfix"><span class="chat-img pull-right">
                            <img src="img/profile.jpg"  />
                        </span>
                        <div class="rcv" id="'.$_POST["rcvr_id"].'"></div>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>now</small>
                                    <strong class="pull-right primary-font">Me</strong>
                                </div>
                                <p>
                                    '.$_POST["msg"].'
                                </p>
                            </div> </li>';

   }
 }
}
   
   
        if ($_POST['action'] == 'get_ajax_msg') {
       
       $obj_Inbox = $main->load_model('Inbox');
       $user_id =  isset($_POST['user_id'])? $_POST['user_id'] : "";
       $from =  isset($_POST['from'])? $_POST['from'] : "";
       $msg = $obj_Inbox->getlatestMsg($user_id,$from);
 //        $msg = $obj_Inbox->getAllMsg($_POST['user_id']);
$obj_mbr = $main->load_model('Member');
        foreach ($msg as $msgs){
 $obj_Inbox->Set_read_flag($msgs['msg_id']);
 
  $sender = $obj_mbr->get_full_name($msgs['msg_send_by']);

  $time =$main->get_time_diff($msgs['msg_send_date']);
       echo "<li class='left clearfix'><span class='chat-img pull-left'>
                            <img src='img/profile.jpg' alt='User Avatar' c />
                        </span>
                        <div class='rcv' id='rcvr'></div>
                            <div class='chat-body clearfix'>
                                <div class='header'>
                                    <strong class='primary-font'>$sender</strong> <small class='pull-right text-muted'>
                                        <span class='glyphicon glyphicon-time'></span>$time</small>
                                </div>
                                <p>$msgs[msg_data]</p>
                            </div>
                        </li>";
        }        
 
   }
   
         if ($_POST['action'] == 'send_new_msg') {
       
       $obj_Inbox = $main->load_model('Inbox');

//       $date [] = array('msg_send_to'=>$_POST['rcvr_id'],'msg_send_by'=>$_POST['user_id'],'msg_data'=>$_POST['']);
  
 if($_POST["rcvr_id"]== '') 
 {
  
echo  '<li class="right clearfix"><span class="chat-img pull-right">
                          
                        </span>
                        <div class="rcv" id="'.$_POST["rcvr_id"].'"></div>
                            <div class="chat-body clearfix">
                                <div class="header">
                                   
                                    <strong class="pull-right primary-font">Error</strong>
                                </div>
                                <p>
                                    Please select user first..
                                </p>
                            </div>
                        </li>';
         
     
 }
     
 
else
     
     {
$msg = $obj_Inbox->sendMsg($_POST["sender"],$_POST["rcvr_id"], $_POST["msg"]);
       

echo  '<li class="right clearfix"><span class="chat-img pull-right">
                            <img src="img/profile.jpg"  />
                        </span>
                        <div class="rcv" id="'.$_POST["rcvr_id"].'"></div>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>now</small>
                                    <strong class="pull-right primary-font">Me</strong>
                                </div>
                                <p>
                                    '.$_POST["msg"].'
                                </p>
                            </div> </li>';


 }
}


    if($_REQUEST['action']=='report')
    {
        $data   = array();
        $get_valz   = isset($_REQUEST['data']) ? $_REQUEST['data'] : "";
        if($get_valz!="")
        {
            $idz        = explode('_',$get_valz);
            $data['report_post_id']          = $idz[1]; 
            $data['report_submit_by']        = $idz[2]; 
            $data['report_date']             = $main->current_date_time();
            
            $res    = $main->db->insert('tbl_report',$data);
            if($res)
            {
                echo 'true';
            }else
            {
                echo 'error_close';
            }
        }else
        {
            echo 'error_all';
        }
    }
      
   
    if($_REQUEST['action']=='noti_count')
    {
        $user_id    = $_REQUEST['user_id'];
        $res        = $main->db->update('tbl_noti_user',array('noti_flag'=>'1'),array('noti_user_to'=>$user_id));        
    }
    
    
   
}