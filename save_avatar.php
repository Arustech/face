<?php
include("lib/Main.php");
$main = new Main;

$create_thumb=$main->load_model('Image');

$org_img_path=$main->config['orig_path'];
$avatar_path=$main->config['avatar_path'];
$randomString=$main->getRandomString();


$data= $_POST['image'];
$data1= $_POST['fullimage'];
$userid= $_POST['userid'];

//////////////////////setting file name///////////////////////
$file_name=$userid."_".$randomString.".png";

////////////////////// saving avatar//////////////////////////
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
file_put_contents($avatar_path.$file_name, $data);

////////////////// saving full image //////////////////////////
list($type, $data1) = explode(';', $data1);
list(, $data1)      = explode(',', $data1);
$data1 = base64_decode($data1);
file_put_contents($org_img_path.$file_name, $data1);

/////////////////////// saving thumb //////////////////////////
$create_thumb->create_thumb($file_name,$avatar_path);

//////////////////////updating db///////////////////////////
$db_data=array('user_avatar'=>$file_name);
$main->db->update('tbl_user', $db_data , array('user_id'=>$userid));
?>