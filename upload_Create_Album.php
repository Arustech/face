<?php
//var_dump($_FILES);
// A list of permitted file extensions
require 'lib/Main.php';
require 'lib/Member.php';
require 'lib/Album.php';
$album_obj=new Album();
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error1"}';
		exit;
	}
        $random_name=md5(rand(0, 1000000)*rand(0, 1000000)*rand(0, 1000000)).".".$extension;
        
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/albums/'.$random_name)){
                $album_obj->creating_thumb($random_name);
		echo $random_name;
		exit;
	}
}

echo '{"status":"error2"}';
exit;