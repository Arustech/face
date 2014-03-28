<?php
include('lib/Main.php');
$main = new Main;
$obj_posts  = $main->load_model("Posts");
$path = $main->get_path('videos');
$tempFile = $_FILES['Filedata']['tmp_name'];
$filename   = rand().'_'.$_FILES['Filedata']['name'];

$data=  array();
$data['user_id']    = isset($_REQUEST['user_id'])? $_REQUEST['user_id'] : "";
$data['post_title'] = isset($_REQUEST['post_title'])? $_REQUEST['post_title'] : "";
$data['post_access']= isset($_REQUEST['post_access'])? $_REQUEST['post_access'] : "";
$data['user_access']= isset($_REQUEST['user_access'])? $_REQUEST['user_access'] : "0";

 if(move_uploaded_file($tempFile,$path.$filename) )
    {
             if(!empty($data['user_id']))
             {
                 $data['video_src'] = $filename; 
                 $res   =   $obj_posts->post_video($data);
                 if($res)
                 {
                     echo '1';
                 }
             }else
                 echo 'invalid user';
       
    }
    else 
       echo 'invalid file';
	
?>