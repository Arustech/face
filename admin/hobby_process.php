<?
$obj_extra	= $main->load_model('Extra'); // include class to process...

#............................................................
$msg="";
$hobby_id="";
$hobby_name="";

$btn_name="submit";



#................................ Edit Process Here

	if(isset($_POST['update']))
	{

		if($obj_extra->UpdateExtraData('hobbies',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Updated!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}

	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$hobby_id	= $_GET['id'];
			$data		= $main->db->get_row('tbl_hobbies',array('hobby_id'=>$hobby_id));
			
			$hobby_name	= $data['hobby_name'];
					
			$btn_name="update";
		}

//End of Edit Process





#...............................Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$hobby_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_hobbies',array('hobby_id'=>$hobby_id) );
				 
				if($res)
					$msg.=$adminProj->showAlert('success','Successfully Deleted!');
				else
					$msg.=$adminProj->showAlert('danger','Error in deletion!');				 

				
		}



	
	
	
	
	if(isset($_POST['submit']))
	{
		if($obj_extra->addExtraData('hobbies',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Added!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}
			
	}

/// getting table data according to list type....
	$rows	= $obj_extra->getExtraInfo('admin');


?>