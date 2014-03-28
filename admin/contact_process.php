<?php

$obj_member 	= $main->load_model('Member'); // include class to process...
$obj_contact 	= $main->load_model('ContactProfile'); // include class to process...
$obj_profile	= $main->load_model('Profile'); // include class to process...

#............................................................


$msg		= "";
$btn_name	= 'submit';
$page_text	= "Add Contact Info Here!";
$required	= 'required';


#list of variables (headings) for member.php

$crumb_link	= "Add Contact Info";



#...............Form Submit.............................
	
	# Member Basic Profile Details here
	if(isset($_POST['contact_update']))
	{
		if($obj_contact->addMemberContactInfo($_POST))
		{
		$msg.=$admin->showAlert('success','Contact Info successfully updated');
		
		}else
		{
		$msg.=$admin->showAlert('danger','OOps Error Occured');
		}
	
	}
	
	
	

#..............................Edit Area.............................
	
	
	# List of variables for edit Contact info
	
	$user_id="";		 $contact_id="";		$mobile="";
	$address="";		 $land_line="";	
	$country_id="";
	$zip_code="";
	$city="";
	$state_province="";
	$website="";

	
	
	
	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$user_id	= $_GET['user_id'];
	
		$required="";
		$btn_name	= 'update';
		

	
	
		$info			=$obj_contact->getContactInfo($user_id);	
		$contact_id		= $info['contact_id'];
		$mobile			= $info['mobile'];
		$land_line		= $info['land_line'];
		$address		= $info['address'];
		$country_id		= $info['country_id'];
		$zip_code		= $info['zip_code'];
		$city			= $info['city'];
		$state_province	= $info['state_province'];
		$website		= $info['website'];
		
	
		
		
		
		//echo $obj_tend->getEditCat($category_id);
	}
	
	

?>