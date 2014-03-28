<?php
$obj_events	= $main->load_model('Events'); // include class to process...

#............................................................
$msg="";
$event_id="";
$event_name="";
$event_date="";
$religion_type="";

$btn_name="submit";



#................................ Edit Process Here

	if(isset($_POST['update']))
	{
            
		if($obj_events->UpdateEventsData($_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Updated!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}

	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$event_id	= $_GET['id'];
			$data		= $main->db->get_row('tbl_events',array('event_id'=>$event_id));
			
			$event_name	= $data['event_name'];
			$event_date	= $data['event_date'];
			$religion_type	= $data['religion_type'];
					
			$btn_name="update";
		}

//End of Edit Process





#...............................Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$event_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_events',array('event_id'=>$event_id) );
				 
				if($res)
					$msg.=$adminProj->showAlert('success','Successfully Deleted!');
				else
					$msg.=$adminProj->showAlert('danger','Error in deletion!');				 

				
		}



	
	
	
	
	if(isset($_POST['submit']))
	{
		if($obj_events->addEvent($_POST))
						{
							$msg.=$admin->showAlert('success','Successfully Added!');
						}else
						{
							$msg.=$admin->showAlert('danger','Error in Updation!');
						}
			
	}

/// getting table data ...
	$rows	= $obj_events->getEvents();
       

?>