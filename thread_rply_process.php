<?php
$User_obj=$main->load_model('User');

$forum_obj=$main->load_model('Forums');

if(isset($_POST['save_new_thread'])){
   $last_id=$forum_obj->save_new_thread($_POST);
   $url=$main->config['web_path']."thread_reply.php?id=".$last_id;
   
   $main->db->tail="";

 header('Location: '.$url);   
    
}

if(isset($_POST['submit_comment'])){
    if($_POST['comment_body']==''){
        $main->alert('error', "Enter some text to add comment");
        
    }
    else{
        $user=$_SESSION['kfc_user_id'];
        if($user!='')
      $res =$forum_obj-> save_thread_comments($_REQUEST['id'],$user,$_POST['comment_body']);
        
    }
}


if(isset($_REQUEST['id'])){
    
  $thread_info=$forum_obj->get_threads_detail($_REQUEST['id']);
  $threadby=$User_obj->getUserInfo($thread_info['thread_by']);
if (strlen($threadby['user_name']) > 14){
   $username = substr($threadby['user_name'], 0, 11) . '...';
}
else{
    $username =$threadby['user_name'];
}
  $total_threads=$forum_obj->get_all_threads($thread_info['thread_by']);
  $t_threads=count($total_threads);

    $replies=$forum_obj->get_threads_comments($thread_info['thread_id']);
        $total_replies=  count($replies);
      
  
  
  
}

?>