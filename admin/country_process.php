<?php
$obj_extra	= $main->load_model('Extra'); // include class to process...

#............................................................
$msg="";
$country_id="";
$country_name="";
$country_symbol="";

$btn_name="submit";



#................................ Edit Process Here

	if(isset($_POST['update']))
	{

		if($obj_extra->UpdateExtraData('country',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Updated!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}

	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$country_id	= $_GET['id'];
			$data		= $main->db->get_row('tbl_country',array('country_id'=>$country_id));
			
			$country_name	= $data['country_name'];
			$country_symbol	= $data['country_symbol'];
					
			$btn_name="update";
		}

//End of Edit Process





#...............................Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$country_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_country',array('country_id'=>$country_id) );
				 
				if($res)
					$msg.=$adminProj->showAlert('success','Successfully Deleted!');
				else
					$msg.=$adminProj->showAlert('danger','Error in deletion!');				 

				
		}



	
	
	
	
	if(isset($_POST['submit']))
	{
		if($obj_extra->addExtraData('country',$_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Added!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}
			
	}

/// getting table data ...
	$rows	= $obj_extra->getCountries();


?>