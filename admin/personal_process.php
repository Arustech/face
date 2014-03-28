<?php

$obj_member 	= $main->load_model('Member'); // include class to process...
$obj_personal 	= $main->load_model('PersonalInfo'); // include class to process...
$obj_profile	= $main->load_model('Profile'); // include class to process...

#............................................................


$msg		= "";
$btn_name	= 'submit';
$page_text	= "Add Personal Info Here!";
$required	= 'required';


#list of variables (headings) for member.php

$crumb_link	= "Add Contact Info";



#...............Form Submit.............................
	
	# Member Basic Profile Details here
	if(isset($_POST['personal_update']))
	{
			
	if($obj_personal->addMemberPersonalInfo($_POST))
		{
		$msg.=$admin->showAlert('success','Personal Info successfully updated');
		
		}else
		{
		$msg.=$admin->showAlert('danger','OOps Error Occured');
		}
	
	}
	
	
	

#..............................Edit Area.............................
	
	
	# List of variables for edit profile personal info
	
	$user_id="";		 $personal_id="";		$activities="";
	$favorite_music="";	 $favorite_tv_shows="";	
	$favorite_movies="";
	$favorite_books="";
	$favorite_quotes="";
	$about_me="";
	

	
	
	
	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$user_id	= $_GET['user_id'];
	
		$required="";
		$btn_name	= 'update';
		
	
		
		$info				=$obj_personal->getPersonalInfo($user_id);	
		$personal_id		= $info['personal_id'];
		$activities			= $info['activities'];
		$favorite_music		= $info['favorite_music'];
		$favorite_tv_shows	= $info['favorite_tv_shows'];
		$favorite_movies	= $info['favorite_movies'];
		$favorite_books		= $info['favorite_books'];
		$favorite_quotes	= $info['favorite_quotes'];
		$about_me			= $info['about_me'];
	
		
		
		
		//echo $obj_tend->getEditCat($category_id);
	}
	
	
#.........................................Delete Process..........................
	
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
	{
		$user_type	=$_GET['t'];
		$id	=$_GET['id'];
		
		$msg	=$obj_member->delMember($user_type,$id);
		
	}
	
?>