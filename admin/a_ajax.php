<?php
// getting json data for graph.
require '../lib/Main.php';
$main=new Main();
	if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='graph_data')
	{
	$g_data	= $_REQUEST['gdata'];
	$count_user = array();
	
	foreach($g_data as $g)
	{
	$year	= $g[0];
	$month	= $g[1];
	
	$users	= $main->db->ex("SELECT COUNT(user_id) as total_user FROM tbl_user WHERE YEAR(user_register_date)='$year' AND MONTH(user_register_date)='$month'");
	
        if(!empty($users))
	{
		$count_user[$month]	= $users[0]['total_user'];
	}	
	}
	
	echo json_encode($count_user);
	
	}

?>