<?
require('../lib/Main.php');
$main =  new Main();
if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='forgot')
{
$email		= $_REQUEST['email'];
$user_type	= $_REQUEST['type'];

	if($main->ForgotPass($email,$user_type))
	echo 1;
	else
	echo 0;

}

if(isset($_REQUEST['type']))
{	
	$res	= false;
	
	// check for user_name
	if($_REQUEST['type']=='user_name'){
	$res	= $main->verifyExist('tbl_user','user_name',$_REQUEST['user_name']); }
	
	elseif($_REQUEST['type']=='user_email'){
	
	// check for user_email
	$res	= $main->verifyExist('tbl_user','user_email',$_REQUEST['user_email']);}
	

	if ($res)
	echo "false";
	else
	echo "true";

}


?>