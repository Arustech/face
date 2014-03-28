<?php

$obj_member	= $main->load_model('Member'); // include class to process...
$obj_work 	= $main->load_model('Work'); // include class to process...
$obj_profile	= $main->load_model('Profile'); // include class to process...

#............................................................


$msg		= "";
$btn_name	= 'submit';
$page_text	= "Add Work Info Here!";
$required	= 'required';


#list of variables (headings) for member.php

$crumb_link	= "Add Contact Info";



#...............Form Submit.............................
	
	# Member Basic Profile Details here
	if(isset($_POST['work_update']))
	{
		
	if($obj_work->addMemberWorkInfo($_POST))
		{
		$msg.=$admin->showAlert('success','Work Info successfully updated');
		
		}else
		{
		$msg.=$admin->showAlert('warning','No changes');
		}
	
	}
	
	
	

#..............................Edit Area.............................
	
	
	# List of variables for edit Contact info
	
	$user_id="";		 $work_id="";		$company_name="";
	$position="";		 $description="";	
	$city="";
	$state_province="";
	$country="";
	$current_job="";
	$job_type="";

	
	
	
	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$user_id	= $_GET['user_id'];
	
		$required="";
		$btn_name	= 'update';
		
	
		
		$info				= $obj_work->getWorkInfo($user_id);	
		
		$work_id			= $info['work_id'];
		$company_name		= $info['company_name'];
		$position			= $info['position'];
		$description		= $info['description'];
		$country_id			= $info['country'];
		//$city				= $info['city'];
		//$state_province		= $info['state_province'];
		$current_job		= $info['current_job'];
		$job_type			= $info['job_type'];
		

		//echo $obj_tend->getEditCat($category_id);
	}
	
	
#.........................................Delete Process..........................
	
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
	{
		$user_type	=$_GET['t'];
		$id	=$_GET['id'];
		
		$msg	=$obj_work->delMember($user_type,$id);
		
	}
	
?>