<?php
require 'lib/Main.php';
$main=new Main();
$main->load_model('Member');
$main->load_model('Album');
$album=new Album();


if(isset($_POST['action']) && $_POST['action']=='remove_album'){
  
         echo $album->remove_album($_POST['album_id']);
   
}

if(isset($_POST['action']) && $_POST['action']=='remove_photo'){
  
         echo $album->remove_photo($_POST['photo_id']);
   
}

if(isset($_POST['action']) && $_POST['action']=='create_album'){
  
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
        $data['user_access']=$_POST['user_access'];
        $album->create_album($data,$files);
}



if(isset($_POST['action']) && $_POST['action']=='album_photos'){
   
       echo $album->get_album_photos($_POST['album_id']);
   
    }
 
if(isset($_POST['action']) && $_POST['action']=='add_photos_to_album'){
  
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
        $data['access']=$_POST['access'];
        $data['user_access']=$_POST['user_access'];
        $album->add_photos_to_album($data,$files,$_POST['albumid']);
   
}






?>