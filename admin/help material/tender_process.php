<?php

$msg="";
$btn_name	='submit';
$page_text	="Post Tender Here!";
$table_heading	="Post Tender";
$row_id		="";		


	
	

	if(isset($_POST['submit']))
	{
				
		$msg	= $obj_tend->postTender($_POST,$_FILES);
		
	}

	//@@@@@@@@@@@@@@@@@@@@ Tender Edit Area [Form]
	
	
		if(isset($_POST['update']))
	{
			
		$msg	=$obj_tend->updateTender($_POST);
	
	}
	
	
	# List of variables for edit process
	$tender_id="";
    $tender_no="";
    $tender_subject="";
    $tender_company="";
    $category_id="";
    $tender_desc="";
    $tender_budget="";
    
    $tender_bond="";
    $tender_fees="";
    $tender_close_date="";
	$img="";


	
	
	
	if(isset($_GET['mod']) && $_GET['mod']=='edit')
	{
	
		$page_text	="Edit Tender Here!";
		$table_heading	="Edit Tender";
	
	
		$row_id	=$_GET['t_id'];
		
		$tend_rows	=$obj_tend->getTenderList(0,$_GET['t_id']);
		
		$tender_id=$tend_rows['tender_id'];
		$tender_no=$tend_rows['tender_no'];
		$tender_subject=$tend_rows['tender_subject'];
		$tender_company=$tend_rows['tender_company'];
		$category_id=$tend_rows['category_id'];
		$tender_desc=$tend_rows['tender_desc'];
		$tender_budget=$tend_rows['tender_budget'];
		
		$tender_bond=$tend_rows['tender_bond'];
		$tender_fees=$tend_rows['tender_fees'];
		$tender_close_date=$tend_rows['tender_close_date'];
		
		
	
		
		
		
		$btn_name	='update';
	//echo $obj_tend->getEditCat($category_id);
	}
	
	
	//@@@@@@@@@@@@@@@@@@@@ Del Tender 
	
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
	{
		$msg	=$obj_tend->delTender($_GET['t_id']);
		
	}
	
	
	//@@@@@@@@@@@@@@@@@@@ Tender Table Area...
	
	////getting list of Categories 
	
	$res	=$adminProj->getCat();
	
	////getting tender table data...
	if(isset($_POST['search']))
	{
	$data	=$_POST['tender_data'];
	$tend_sql	=$obj_tend->searchTender($data);
	}else
	{
	$tend_sql	=$obj_tend->getTenderList(1);
	}
		//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($tend_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$tends = $main->db->ex($page->getSQL());

?>