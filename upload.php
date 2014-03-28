<?php
//var_dump($_FILES);
include("lib/Main.php");
$main = new Main;
$obj_img  = $main->load_model('Image');
// A list of permitted file extensions

$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error1"}';
		
		exit;
	}

                
        $filename   = rand().'_'.$_FILES['upl']['name'];
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/temp/'.$filename)){
                
               $obj_img->dirPath   = 'temp/thumb/';
               $obj_img->create_thumb($filename,$main->get_path('temp'));
            	//echo '{"status":"success"}';
                echo $filename;
		exit;
	}
}

echo '{"status":"error2"}';
exit;