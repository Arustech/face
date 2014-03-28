<?php
ob_start();
session_start();

if(isset($_SESSION['email_id']))
    {
    $mailid=$_SESSION['email_id'];
    }


$client_id = '000000004C110855';
$client_secret = 'AOlYfiuASddTuNYD7cFtI4Uq1kCiq1JV';
$redirect_uri = 'http://www.arustech.com/face/oauth-hotmail.php?user_id='.$mailid;



$urls_ = 'https://login.live.com/oauth20_authorize.srf?client_id='.$client_id.'&scope=wl.signin%20wl.basic%20wl.emails%20wl.contacts_emails&response_type=code&redirect_uri='.$redirect_uri;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<title>Hotmail Contact List </title>

<script language="javascript" type="text/javascript">

function popitup(url) {
	newwindow=window.open(url,'Hotmail Contatcs','width=778,scrollbars=1');
       
      
	if (window.focus) {
            newwindow.focus();
            
             $(newwindow.document).ready(function(){
           
      
       });
            
          
            
        }
	return false;
}

// -->
</script>
</head>
<body>
    <center>
<?php echo '<input type="image" src="img/hotmail-contacts.png" href="'.$urls_.'" onclick="return popitup(\''.$urls_.'\');" />';?>
    </center>
<!--<center>    
<?php //echo '<a href="'.$urls_.'" target="_blank">Contact From MSN</a>';?>
</center>-->

</body>
</html>