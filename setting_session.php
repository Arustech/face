<?php
session_start();
if(isset($_POST['emailid']))
{
    $_SESSION['email_id']=$_POST['emailid'];
    echo "set to session:".$_SESSION['email_id'];
}


?>
