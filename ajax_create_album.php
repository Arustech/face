<?php
require 'lib/Main.php';
$main=new Main();
$data='';

$files=$_POST['myfiles'];
if($_POST['album_name']!=''){
    
    $data['album_name']=$_POST['album_name'];
}
else
{
    $data['album_name']=$main->currentDate();
}

$data['user_id']=$_POST['userid'];
$data['created']=$main->current_date_time();
$data['cover_photo_name']=$files[0];
$data['access']=$_POST['access'];


$main->db->insert('tbl_album', $data);
$album_id=$main->db->last_id;
unset($data);
for($i=0;$i<count($files);$i++){
    $data['photo_created']=$main->current_date_time();
    $data['album_id']=$album_id;
    $data['photo_src']=$files[$i];
    $main->db->insert('tbl_photo', $data);
}

?>