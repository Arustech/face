<?
require '../lib/PHPMailerAutoload.php';

$obj_cms = $main->load_model('Cms'); 
//$obj_acc = $main->load_model('Account'); 


#.....................................................................................

$msg="";

#................................Sending NewsLetter To Users.........................

if(isset($_POST['submit']))
{
	
	$res		= $obj_cms->sendNewsletter($_POST);
	if($res)
	{
		$msg	=  $admin->showAlert('success','News Successfully Added!'); 
	}else
	{
		$msg	=	$admin->showAlert('error','Oops '.$obj_cms->error.' occured!'); 
	}
}

$users_emails	= $obj_cms->getUsersEmails();



	
#~~~~~~~~~~~~~~~~~~~~~~~~ All Credit Goes To ArusTech Team ~~~~~~~~~~~~~~~~#	
?>