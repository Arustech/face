<?php
$forums_obj=$main->load_model('Forums');
$msg="";


if(isset($_POST['save_cat'])){
  
    $res=$forums_obj->add_forum_cat($_POST);     
    if($res){
    $msg=$admin->showAlert('success','Category Successfully Added!');
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}


if(isset($_POST['save_topic'])){
  
    $res=$forums_obj->add_forum_topic($_POST);     
    if($res){
    $msg=$admin->showAlert('success','Topic Successfully Added!');
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}

if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='trash_cat'){
  
    $res=$forums_obj->delete_cat($_REQUEST['id']);
     if($res){
    $msg=$admin->showAlert('success','Category Successfully Deleted!');
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}

if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='trash_top'){
  
    $res=$forums_obj->delete_topic($_REQUEST['id']);
     if($res){
    $msg=$admin->showAlert('success','Topic Successfully Deleted!');
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}

if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='trash_thread'){
  
    $res=$forums_obj->delete_thread($_REQUEST['id']);
     if($res){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}

if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='trash_comment'){
  
    $res=$forums_obj->delete_thread_comment($_REQUEST['id']);
     if($res){
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}



if(isset($_POST['edit_cat'])){
  
    $res=$forums_obj->update_cat($_POST);     
    if($res){
    $msg=$admin->showAlert('success','Topic Successfully Added!');
    }
    else{
        $msg=$admin->showAlert('danger','Error Occured!');
    }
}




$cat=$main->db->get_rows('tbl_forum_topics',array('topic_parent'=>0));
?>
