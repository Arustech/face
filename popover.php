<?php
require 'lib/Main.php';
$main=new Main();
$member_obj=$main->load_model('Member');
$noti_obj = $main->load_model('Notification');
$user_data  = $member_obj->check_user();
$user_id    = $user_data['user_id'];

//echo  $member_obj->get_data_requests($user_id);
if(isset($_GET) && $_GET['type']=="messages")
{
  echo  $member_obj->get_data_messages($user_id);
}

if(isset($_GET) && $_GET['type']=="friends")
{
  echo  $member_obj->get_data_requests($user_id);
}

if(isset($_GET) && $_GET['type']=="noti")
{
  echo  $noti_obj->getUserNoti();
}




?>