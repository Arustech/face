<?
/// uploading tender documents....
$msg="";
$btn_name	="submit";
$head_title	="Add";
$comp_id	= "";
$title		= "";
$desc		= "";
$img		= "";

	/// submitting form data

	if(isset($_POST['submit']))
	{
		
		 $msg	=$obj_comp->addCompany($_POST,$_FILES);
		
	}
	
	
	
	//// edit process here
	if(isset($_POST['update']))
	{
			if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
			$msg	=$obj_comp->updateCompany($_POST,$_FILES);
			else
			$msg	=$obj_comp->updateCompany($_POST);
	}
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
		$comp_id	= $_GET['c_id'];
		$comp_data	=$obj_comp->getCompanyList(0,array('id'=>$comp_id));
	
		
		$title	= $comp_data['title'];
		$desc	= $comp_data['description'];
		$img	= $comp_data['img_name'];
		
		$head_title	="Edit";
		$btn_name	="update";/// change button to update..
		
	}

	
	//// deletion process here

	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
		$msg	= $obj_comp->delCompany($_GET['c_id']);
		}
	
	
	
	
	
	
	////getting CMS Companies table data...
	if(isset($_POST['search']))
	{
	$data	=$_POST['company_data'];
	$comp_sql	=$obj_comp->searchCompany($data);
	}else
	{
	$comp_sql	=$obj_comp->getCompanyList(1);
	}
		//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($comp_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$comps = $main->db->ex($page->getSQL());

	
?>