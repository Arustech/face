<?php

$obj_member 	= $main->load_model('Member'); // include class to process...
$obj_profile	= $main->load_model('Profile'); // include class to process...

#............................................................


$msg		= "";
$btn_name	= 'submit';
$page_text	= "Add Educaiton Info Here!";
$required	= 'required';


#list of variables (headings) for member.php

$crumb_link	= "Add Contact Info";



#...............Form Submit.............................
	
	# Member Education Details here
	if(isset($_POST['edu_update']))
	{
		if(isset($_POST['education_id']) && $_POST['education_id']!="")
		{
			$basic_mod	= 'update';
		}else
		{
			$basic_mod	= 'insert';
		}
	
	if($obj_profile->addMemberEduInfo($_POST,$basic_mod))
		{
		$msg.=$admin->showAlert('success','user successfully added');
		
		}else
		{
		$msg.=$admin->showAlert('danger','OOps Error Occured');
		}
	
	}
	
	
	

#..............................Edit Area.............................
	
	
	# List of variables for edit Education info
	
	$user_id="";		 $education_id="";		$high_school="";

	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$user_id	= $_GET['user_id'];
	
		$required="";
		$btn_name	= 'update';
		
	
		$chkC	= $main->db->getCount('tbl_profile_education',array('user_id'=>$user_id));
	
		if($chkC>0){
		$info			= $obj_profile->getEducationInfo($user_id);	
		$education_id 	= $info['education_id'];
		$high_school 	= $info['high_school'];

		
		}
		
		
		
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