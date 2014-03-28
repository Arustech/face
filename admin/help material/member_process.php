<?php

$obj_member = $main->load_model('Member'); // include class to process...

#................................................................................


$msg		= "";
$mem_type	= ""; // initializing member type...
$btn_name	= 'submit';
$url		= "#";
$page_text	= "Add member Here!";
$required	= 'required';
$edit_page		= "add_ind.php?";


#list of variables (headings) for member.php

$crumb_link	= "Standard Member";
$table_heading	= "Standard Members List";


if(isset($_GET['t']))   /// checking for the member type and setting headings & Edit page..
{
$mem_type		= $_GET['t'];
if($mem_type=='corp')
{
$crumb_link		= "Premium Member";
$table_heading	= "Premium Members List";
$edit_page		= "add_corp.php?";

}
}

#.........................................Form Submit.............................
	
	if(isset($_POST['submit']))
	{
				
	
	
	if($obj_member->addMember($_POST,$_FILES))
		{
		$msg.=$admin->showAlert('success',$main->msg);
		
		}else
		{
		$msg.=$admin->showAlert('danger',$main->msg);
		}
	
	}
	
	
	
	
	
	

#............................................Edit Area.............................
	
	
		if(isset($_POST['update']))
	{
			
		$msg	=$obj_member->updateUser($_POST,$_FILES);
			
	}
	
	
	# List of variables for edit process
	
	$user_id="";		 $user_email="";		$pic="";
    $category_id="";	 $company_type="";		$docs="";
	$company_loc="";  	 $company_estb_year="";	$company_estb_capital="";
	$company_grade="";	 $company_cer="";		$company_emp="";
	$company_profile=""; $contact_des="";		$company_video="";
    $address=""; 	     $pbox="";			    $phone="";
    $extra_phone="";     $contact="";		    $website="";
	$ind_data="";		 $int_data="";			$company_title="";	

	
	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$user_id	= $_GET['user_id'];
			
		$rows		= $obj_member->getUserData($user_id,$user_type);
		
		$user_email	= $rows[0]['user_email'];
		
		if($user_type=='ind')
		{
			$category_id=$rows[0]['category_id'];
			$address=$rows[0]['ind_address'];
			$pbox=$rows[0]['ind_pbox'];
			$phone=$rows[0]['ind_phone'];
			$extra_phone=$rows[0]['ind_extra_phone'];
			$contact=$rows[0]['ind_contact'];
			$website=$rows[0]['ind_website'];
			$docs=$rows[0]['ind_docs'];
			
		}if($user_type=='corp')
		{
			
		
			$category_id				= "";
			$company_title				= $rows[0]['company_title'];
			$company_type				= $rows[0]['company_type'];
			$company_loc				= $rows[0]['company_loc'];
			$company_estb_year			= $rows[0]['company_estb_year'];
			$company_estb_capital		= $rows[0]['company_estb_capital'];
			$company_grade				= $rows[0]['company_grade'];
			$company_cer				= $rows[0]['company_cer'];
			$company_emp				= $rows[0]['company_emp'];
			$company_profile			= $rows[0]['company_profile'];
			$contact					= $rows[0]['company_contact_person'];
			$contact_des				= $rows[0]['company_contact_person_pos'];
			$address					= $rows[0]['company_address']; 
			$pbox						= $rows[0]['company_po_box']; 
			$phone						= $rows[0]['company_phone']; 
			$extra_phone				= $rows[0]['company_extra_phone'];
		    $website					= $rows[0]['company_website'];
			$docs						= $rows[0]['company_docs'];
			$pic						= $rows[0]['company_photo'];
			$company_video				= $rows[0]['company_video'];
			
			$ind_data					= $rows[0]['company_ind'];		 
			$int_data					= $rows[0]['company_int'];		 
								
		
		}
		
		
		
		
		$url	= "?mod=edit&user_id=$user_id";
		$required="";
		$btn_name	= 'update';
		//echo $obj_tend->getEditCat($category_id);
	}
	
	
#.........................................Delete Process..........................
	
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
	{
		$user_type	=$_GET['t'];
		$id	=$_GET['id'];
		
		$msg	=$obj_member->delMember($user_type,$id);
		
	}
	
	
	
#..........................................Feature Company Process...............

	if(isset($_GET['fc']) && $_GET['fc']!="")
	{
			$flag	=$_GET['fc'];
			$id		=$_GET['id'];
			
			$msg	=$obj_member->setfeature($flag,$id);
		
	}


#...........................................Members List............................
	if($mem_type!="")
	{
	$v_qs	= "";
	$v		= "-1";

	
	if(isset($_POST['search']))
	{
	
	
	$data	=$_POST['user_data'];
	$user_sql	=$obj_member->searchUser($data,$mem_type);
	
	}
	elseif(isset($_GET['mod'])&& $_GET['mod']=='chkv')
	{
		$v			= $_GET['val'];
		$v_qs		= '&mod=chkv&val='.$v;
		$user_sql	= $obj_member->getSelectedView($v);		
	}
	else
	{
	$user_sql	=$obj_member->getUser($mem_type);
	}
		//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($user_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$rows = $main->db->ex($page->getSQL());
	
	}
?>