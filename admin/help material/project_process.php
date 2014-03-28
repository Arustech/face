<?
$obj_proj = $main->load_model('Project');

#.....................................................................................
$msg="";
$btn_name	='submit';
$page_text	="Post Project Here!";
$table_heading	="Post Project";
$row_id		="";

#.......................................Form Submit..................................

if(isset($_POST['submit']))
{
	
			if($obj_proj->postProject($_POST))
				{
				$msg.=$admin->showAlert('success','Project Successfully Posted!');
				}else
				{
				$msg.=$admin->showAlert('danger','Error in Project Posting!');
				}
			
}
$proj_no	= $obj_proj->getProjNo();
#.............................................Edit Process............................



	# List of variables for edit process
	$proj_id="";
    $proj_subject="";
    $proj_company="";
    $category_id="";
    $proj_desc="";
    $proj_budget="";   
    $proj_bond="";
    $proj_fees="";
    $proj_phone="";
    $proj_email="";
    $proj_close_date="";
	
	if(isset($_GET['act']))
	{
		$chk	= $_GET['act'];
		$id		= $_GET['id'];
		$res	= $main->db->update('tbl_proj',array('proj_status'=>$chk),array('proj_id'=>$id));
		if($res)
		{
				$msg.=$admin->showAlert('success','Project Successfully Updated!');
		}else
		{
				$msg.=$admin->showAlert('danger','Error in Project Updation!');
		}
	}	
	
		if(isset($_POST['update']))
	{
						
			
		if($obj_proj->updateProject($_POST))
				{
				$msg.=$admin->showAlert('success','Project Successfully Updated!');
				}else
				{
				$msg.=$admin->showAlert('danger','Error in Project Updation!');
				}
	}

	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$page_text	="Edit Project Here!";
		$table_heading	="Edit Project";
	
	
		$row_id	=$_GET['p_id'];
		
		$proj_rows	=$obj_proj->getProjectList(0,$_GET['p_id']);
		
		$proj_id=$proj_rows['proj_id'];
		$proj_no='PRJ_'.$proj_rows['proj_id'];
		$proj_subject=$proj_rows['proj_subject'];
		$proj_company=$proj_rows['company_id'];
		$category_id=$proj_rows['category_id'];
		$proj_desc=$proj_rows['proj_desc'];
		$proj_budget=$proj_rows['proj_budget'];
		
		$proj_bond=$proj_rows['proj_bond'];
		$proj_fees=$proj_rows['proj_fees'];
		$proj_close_date=$proj_rows['proj_close_date'];
		$proj_phone=$proj_rows['proj_phone'];
		$proj_email=$proj_rows['proj_email'];
		
		
	
		
		
		
		$btn_name	='update';
	//echo $obj_tend->getEditCat($category_id);
	}
	
	
#.......................................Delete Project.............................

	if(isset($_GET['mod'])&& $_GET['mod']=='trash')
	{
		$proj_id	=$_GET['p_id'];
		if($obj_proj->delProject($proj_id))
				{
				$msg.=$admin->showAlert('success','Project Successfully Deleted!');
				}else
				{
				$msg.=$admin->showAlert('danger','Error in Project Deletion!');
				}

	}
	

#.............................................Get Projects List.......................

	if(isset($_POST['search']))
	{
	$data	=$_POST['project_data'];
	$proj_sql	=$obj_proj->searchProject($data);
	}else
	{
	$proj_sql	=$obj_proj->getProjectList(1);
	}
		//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($proj_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$projs = $main->db->ex($page->getSQL());

	
?>