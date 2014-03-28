<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$member = $main->load_model('Member'); /// load class....
#/**********************************************************************************************************

$link_heading  = "Announcement";
$page_heading  = "Announcement";
$btn_submit    =  "btn_send";
$table_heading = "News Letter"; 
$chk_mod       = "NL";  // by default  chk mod is set to Newsletter
$user_email    =""; 
$msg           =""; 
//$QueryString   = ""; 
if(isset($_GET['mod']) && $_GET['mod']=='letter')
{
    $user_id       = isset($_GET['user_id']) ? $_GET['user_id'] : ""; 
    $link_heading  = "Send Message";
    $page_heading  = "Send Message";
    $table_heading = "Message";    
    $btn_submit    = "btn_msg";    
    $chk_mod       = "msg";  // by default  chk mod is set to Newsletter    
    if(!empty($user_id))
    {
        $res       = $member->getUserBasicInfo($user_id);
        $user_email= $res['user_email']; 
    }
    
//    $QueryString   = "?mod=letter&user_id=$user_id";
    
}








if(isset($_POST['btn_send']))
{
   $member->send_notifications($_POST['user_type'],$_POST['letter_subject'],$_POST['letter_text']);
}elseif(isset($_POST['btn_msg']))
{
   $msg = $member->sendIndividualNoti($_POST);
}

