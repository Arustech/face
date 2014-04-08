<?php
require 'lib/Main.php';
$main=new Main();
if(isset($_POST['action']) && $_POST['action']=='trigger'){
    session_start();
     $user_id=$_SESSION['kfc_user_id'];
     $log=$main->db->get_rows('tbl_log',array('noti_to_user_id'=>$user_id));
     $messages=0;
     $friend_requests_sent_count=0;
     $notifications_count=0;
     ////// counter for notifications, friend requests and messages///////
      foreach($log as $noti){
            if(($noti['log_type']=='noti')){
                $notifications_count++;        
                }
                else if ($noti['log_type']=='friend_request_sent') {
              $friend_requests_sent_count++;
            }
             else if ($noti['log_type']=='message') {
              $messages++;
            }
           
     }
     
    
         $not[]=array(
             'notifications'=>$notifications_count,
              'friend_requests'=> $friend_requests_sent_count,
             'messages'=>$messages
             );
     
          echo json_encode($not);
}   
    


?>