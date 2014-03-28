<?php
$obj_extra	= $main->load_model('Extra'); // include class to process...

#............................................................
$msg="";
$user_id="";
$hobby_id="";
$user_hobby_id="";

$btn_name="submit";

if(isset($_GET['user_id']))
{
$user_id	= $_GET['user_id'];
}

#................................ Edit Process Here

	if(isset($_POST['update']))
	{

		if($obj_extra->UpdateExtraData('user_hobbies',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Updated!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}

	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$user_hobby_id	= $_GET['id'];
			$data		= $main->db->get_row('tbl_user_hobbies',array('user_hobby_id'=>$user_hobby_id));
			
			$hobby_id	= $data['hobby_id'];
					
			$btn_name="update";
		}

//End of Edit Process





#...............................Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$user_hobby_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_user_hobbies',array('user_hobby_id'=>$user_hobby_id) );
				 
				if($res)
					$msg.=$admin->showAlert('success','Successfully Deleted!');
				else
					$msg.=$admin->showAlert('danger','Error in deletion!');				 

				
		}



	
	
	
	
	if(isset($_POST['submit']))
	{
		if($obj_extra->addExtraData('user_hobbies',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Added!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}
			
	}

/// getting table data according to list type....

	
	$rows	= $obj_extra->getExtraInfo('user',$user_id);


?>