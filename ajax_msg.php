<?php

if (isset($_POST['action'])) {

   require('lib/Main.php');
   $main = new Main;
$data   = array();
$data['posted_by_user_id']    = isset($_REQUEST['posted_by_user_id'])? $_REQUEST['posted_by_user_id'] : "";
$data['post_data'] = isset($_REQUEST['msg'])? $_REQUEST['msg'] : "";
$data['post_access']= isset($_REQUEST['post_access'])? $_REQUEST['post_access'] : "";
$data['post_user_access']= isset($_REQUEST['user_access'])? $_REQUEST['user_access'] : "";
   
   if ($_POST['action'] == 'post_message' && $_POST['msg']!="") {
      if ($main
              ->load_model('Posts')
              ->post_message($data)) {
         echo "true";
      } else {
         echo "false";
      }
   }
}//Action ends