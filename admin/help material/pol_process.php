<?
$obj_cms = $main->load_model('Cms'); 

$msg="";



$btn_name="submit";


/// Edit Process Here

	if(isset($_POST['update']))
	{
		$msg	=$obj_cms->updatePol($_POST);
	}


/// getting table data according to list type....

	$row	=$main->db->get_row('tbl_pol');
	$pol_ques	= $row['pol_ques'];
	$pol_ans1	= $row['pol_ans1'];
	$pol_ans2	= $row['pol_ans2'];
	$pol_ans3	= $row['pol_ans3'];

?>