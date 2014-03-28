<?
$obj_extra	= $main->load_model('Extra'); // include class to process...

#............................................................
$msg="";
$user_id="";
$album_id="";
$album_name	= "";
$album_loc	= "";
$description	= "";

$btn_name="submit";

if(isset($_GET['user_id']))
{
$user_id	= $_GET['user_id'];
}

#................................ Edit Process Here

	if(isset($_POST['update']))
	{

		if($obj_extra->UpdateExtraData('album',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Updated!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}

	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$album_id	= $_GET['id'];
			$data		= $main->db->get_row('tbl_album',array('album_id'=>$album_id));
			
			$album_id		= $data['album_id'];
			$album_name		= $data['album_name'];
			$album_loc		= $data['album_loc'];
			$description	= $data['description'];
					
			$btn_name="update";
		}

//End of Edit Process





#...............................Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$album_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_album',array('album_id'=>$album_id) );
				 
				if($res)
					$msg.=$admin->showAlert('success','Successfully Deleted!');
				else
					$msg.=$admin->showAlert('danger','Error in deletion!');				 

				
		}



	
	
	
	
	if(isset($_POST['submit']))
	{
		if($obj_extra->addExtraData('album',$_POST))
						{
							$msg.=$admin->showAlert('success','Album Successfully Added!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error Occured!');
						}
			
	}

/// getting table data according to list type....

	
	$rows	= $obj_extra->getExtraInfo('album',$user_id);


?>