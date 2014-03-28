<?
if(isset($_POST['cat_id']) )
{
include ('../lib/Main.php');
$main  =  new Main;
$main->load_model('Admin');
$proj = $main->load_model("AdminProj");
$first ="<option  value='-1'>No Subcategory</option>";
$html = $proj->getCatHTML($_POST['cat_id']);
if($html =='')
{
	echo  $first;
}

echo $first.$html;
}

	if (isset($_POST['tender_no']))
	{
	
		include ('../lib/Main.php');
		$main  =  new Main;
		
		if(isset($_GET['t_id']) && $_GET['t_id'] !='')
		{
		$check_exist = $main->db->get_row('tbl_tender',array('tender_no'=>$_POST['tender_no'],'tender_id'=>$_GET['t_id']));
		if($check_exist)
		{
		echo json_encode(array('value'=>1));
		}else
		{
		
		$check = $main->db->get_row('tbl_tender',array('tender_no'=>$_POST['tender_no']));	
	 
		if (!$check)	
		{
		echo json_encode(array('value'=>1));
		}
		else
		{
			echo json_encode(array('value'=>0));
		}
		}
		
		}
		
		else
		
		{
	 $check = $main->db->get_row('tbl_tender',array('tender_no'=>$_POST['tender_no']));	
	 
		if (!$check)	
		{
		echo json_encode(array('value'=>1));
		}
		else
		{
			echo json_encode(array('value'=>0));
		}
		}
	}

	
	if (isset($_POST['user_name']))
	{
	
		include ('../lib/Main.php');
		$main  =  new Main;
		
		if(isset($_GET['user_id']) && $_GET['user_id'] !='')
		{
		$check_exist = $main->db->get_row('tbl_user',array('user_id'=>$_GET['user_id']));
		if($check_exist)
		{
		echo json_encode(array('value'=>1));
		}else
		{
		
		$check = $main->db->get_row('tbl_user',array('user_name'=>$_POST['user_name']));	
	 
		if (!$check)	
		{
		echo json_encode(array('value'=>1));
		}
		else
		{
			echo json_encode(array('value'=>0));
		}
		}
		
		}
		
		else
		
		{
	 $check = $main->db->get_row('tbl_user',array('user_name'=>$_POST['user_name']));	
	 
		if (!$check)	
		{
		echo json_encode(array('value'=>1));
		}
		else
		{
			echo json_encode(array('value'=>0));
		}
		}
	}	
	

?> 