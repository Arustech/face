<?php
include 'lib/Album.php';
$Albums_obj=new Album();

$albums='';
$user_id=$user['user_id'];


$albums=$Albums_obj->albums_list($user_id);
$album_path=$Albums_obj->get_uurl("albums");



?>
