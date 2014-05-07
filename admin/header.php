<?php 
require('../lib/Main.php');
$main 		= new Main();
$admin		= $main->load_model('Admin');  
$adminProj	= $main->load_model('AdminProj');  
$page  		= $main->load_model('Page');


if(isset($_GET['a']) && $_GET['a']=='o')
{
$main->Logout();	
	
}

if(!$admin->chk_admin_session()) 
{
$main->go($main->config['admin_path'].'login.php');
}


$p_error = '';
if(isset($_POST['btn_update']) )
{

	
	if($_POST['new_password'] == $_POST['new_password_repeat'])
	{
		if ($admin->update_profile($_POST));
		{
		$p_error='upd';	
		}
	}
	else 
	$p_error='pm';
	
	
	
}

$user = $admin->get_detail();





?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title>Dashboard | KnownFaces - Administration Panel</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/><![endif]-->
<link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
<!--[if IE 7]><link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css"><![endif]--><!--[if IE 8]><link href="assets/css/ie8.css" rel="stylesheet" type="text/css"/><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'><script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script><script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script><!--[if lt IE 9]><script src="assets/js/libs/html5shiv.js"></script><![endif]-->
<script type="text/javascript" src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="plugins/event.swipe/jquery.event.move.js"></script><script type="text/javascript" src="plugins/event.swipe/jquery.event.swipe.js"></script><script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
<script type="text/javascript" src="plugins/respond/respond.min.js"></script>
<script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
<script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script><!--[if lt IE 9]><script type="text/javascript" src="plugins/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>
<script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="plugins/noty/themes/default.js"></script>
<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins.js"></script>
<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
<!--<script type="text/javascript" language="javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript" src="plugins/ckeditor/ckfinder/ckfinder.js"></script>-->

<script>$(document).ready(function(){


App.init();Plugins.init();FormComponents.init()
if($('#SBSFull').length > 0){
		var editor_en = CKEDITOR.replace('SBSFull', { height:"250", width:"98%", toolbar:'SBSFull', resize_enabled:false });
		CKFinder.SetupCKEditor(editor_en, 'ckeditor/ckfinder/');
	}



});</script>


</head>