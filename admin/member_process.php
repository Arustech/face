<?php
$obj_member	 = $main->load_model('Member'); // include class to process...
$obj_basic	 = $main->load_model('BasicProfile'); // include class to process...

#............................................................


$msg		= "";
$btn_name	= 'submit';
$page_text	= "Add member Here!";
$required	= 'required';


#list of variables (headings) for member.php

$crumb_link	= "Add Member";
$table_heading	= "Members List";


#...............Form Submit.............................
	# Member Login Details here


  

	if(isset($_POST['btn_status']))
	{
    $data['user_status'] = $_POST['user_status'];
     if ($obj_member->change_status($data,$_POST['user_id']) )
       $msg.=$admin->showAlert('success','status successfully changed'); 
     else 
        $msg.=$admin->showAlert('danger','some problem occurred while changing');
     
      
   }
				
	if(isset($_POST['submit']))
	{
				
	
	
	if($obj_member->addMember($_POST,$_FILES,1))
		{
     
		$msg.=$admin->showAlert('success','user successfully added');
		
		}else
		{
		$msg.=$admin->showAlert('danger','OOps Error Occured');
		}
	
	}
	
	# Member Basic Profile Details here
	if(isset($_POST['basic_update']))
	{
			
	if($obj_basic->addMemberBasic($_POST))
		{
		$msg.=$admin->showAlert('success','Basic Info successfully updated');
		
		}else
		{
		$msg.=$admin->showAlert('danger','OOps Error Occured');
		}
	
	}
	
	
	

#..............................Edit Area.............................
	
	
		if(isset($_POST['update']))
	{
			
		$msg	=$obj_member->updateUser($_POST,$_FILES);
			
	}
	
	
	# List of variables for edit prsonal details / basic profile info
	
	$user_id="";		 $user_email="";		$pic="";
	$first_name="";		 $profile_basic_id="";	
	$last_name="";
	$birthday="";
	$religion="";
	$gender="";
	$relation="";
	$lookingfor="";
	
	
	
	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$user_id	= $_GET['user_id'];
	
		$required="";
		$btn_name	= 'update';
		
		if($page_name=='basic_profile')
		{
		
		$basics				= $obj_member->getUsers(0,$user_id,'tbl_profile_basic');	
		$profile_basic_id	= $basics[0]['profile_basic_id'];
		$user_id			= $basics[0]['user_id'];
		$first_name			= $basics[0]['first_name'];
		$last_name			= $basics[0]['last_name'];
		$birthday			= $basics[0]['birthday'];
		$religion			= $basics[0]['religion'];
		$gender				= $basics[0]['gender'];
		$relation			= $basics[0]['relation'];
		$lookingfor			= $basics[0]['lookingfor'];
		
		
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
        
	if(isset($_GET['mod']) && $_GET['mod']=='del_user')
	{
		$user_id	=$_GET['user_id'];
		$msg	=$adminProj->getDelUser($user_id);
		
	}
	
	
	
#....................Feature Company Process...............

	

#.........................Members List...................


	if(isset($_POST['search']))
	{
	
	
	$data	=$_POST['user_data'];
	$user_sql	=$obj_member->searchUser($data);
	
	}
	else
	{
	$user_sql	=$obj_member->getUsers(1);
	}
		//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($user_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$users = $main->db->ex($page->getSQL());
	
	
?>