<?php

/// add Categories..

$msg="";

$btn_name	='submit';

/// list of variables for edit process

$id="";

$cat_id="";

$cat_title="";

$cat_parent="";

$title = "Add";



/// End of edit var..





	if(isset($_POST['submit']))

	{

		$res	=$adminProj->addCat($_POST);

		if($res)

		{

		$msg	=$admin->showAlert('success','Category Successfully Added!');

		}else

		{

		$msg	=$admin->showAlert('danger','Category Not Added!');

		}

	}

	 



	

	

//// Edit Process Here	



	if(isset($_POST['update']))

	{

		

	$cond 			= array('category_id'=>$_POST['category_id']);

	$update_res 	= $adminProj->updateCat($_POST,$cond);

	if($update_res)

		{

		$msg	=$admin->showAlert('success','Category Successfully Updated!');

		}else

		{

		$msg	=$admin->showAlert('danger','Fail to update!');

		}

	

	}

	

	if(isset($_GET['mod']) && $_GET['mod']=='edit')

	{

		$title = "Update";

	$btn_name	='update';

	$id			=$_GET['id'];

	$cond		=array('category_id'=>$id);

	$row		=$adminProj->getCat($cond);

	$cat_id		=$row['category_id'];

	$cat_title	=$row['category_title'];

	$cat_parent	=$row['category_parent'];

	}

	

	if(isset($_GET['mod']) && $_GET['mod']=='trash')

	{

		

		if(isset($_GET['t']) && $_GET['t']=='cat')

		$del_parent =true;

		else 

		$del_parent =false;



		

	$res	= $adminProj->delCat($_GET['id'],$del_parent);

	if($res)

		{

		$msg	=$admin->showAlert('success','Category Successfully Deleted!');

		}else

		{

		$msg	=$admin->showAlert('danger','Fail to Delete!');

		}

	}

	

	if(isset($_POST['btn_search']) ){

	 $cat_sql  = "SELECT * from tbl_category 

	 WHERE category_title LIKE '%$_POST[txt_search]%' 

	 ";

	 //$adminProj->searchCat($_POST['txt_search']);	

	}else  $cat_sql  = $adminProj->getCategories(1);





//Pagination











$page  = $main->load_model('Page');

$pagedb=$main->db->pdo;

$page->setSQL($cat_sql);

$page->setPaginator('pagecat');

$page->setLimitPerPage();

	if(isset($_POST['btn_search']) ){
$cats = $adminProj->getCatsOnly($main->db->ex($page->getSQL()));
}
else $cats = $main->db->ex($page->getSQL());





?>