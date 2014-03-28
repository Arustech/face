<?php
include 'lib/Main.php';
$main=new Main();
$img=$main->load_model('Image');
$userid=$_POST['userid'];

/////////////////// saving Image ///////////////////
$file_cover_name=$main->upload_file($_FILES['cover_pic'], 'covers');

///////////////// creating thumb //////////////////
//$path=$main->config['cover_path'];
//$img->create_cover_thumb($file_cover_name,$path);

//////////////////////updating db///////////////////////////
$db_data=array('user_cover'=>$file_cover_name);
$main->db->update('tbl_user', $db_data , array('user_id'=>$userid));

echo $file_cover_name;
?>
