<?php
session_start();

$subject="Invitation From Knownfaces";
$message="Hello...<br>This is to invite you to the most rapidly spreading social network <strong>Knownfaces</strong>. Where you can stay in touch with your friends and share your happiness with them. <br> <a href='http://arustech.com/face/'>Click Here</a> to join and be a part of us.<br><br><strong>Thankyou</strong>";
   

///////////////////////////////////////// MSN Mail //////////////////////////////////////////////
if(isset($_POST['msn_send_mail']))
{
    
   if($_POST['msn_from_email']!=''){
     $from=$_POST['msn_from_email'];
    
   // echo "your email id:".$_POST['from_email'];

if(isset($_POST['email'])) {
echo "<br>";
echo "<img src='img/success.jpg' >";
echo "<br>";
echo "Email Sent To following email ids: <hr><br>";
$name = $_POST['email'];
$i=0;
foreach ($name as $email){

$msn_email[$i]= rtrim($email,")");
echo $msn_email[$i]."<br />";

sendEmail($msn_email[$i], $subject, $message,$from);

$i++;
}

} // end brace for if(isset

else {

echo "You did not choose any email.";

}
    
    }  
}

///////////////////////////////////// Yahoo Mail //////////////////////////////////////////

if(isset($_POST['yahoo_send_mail']))
{
   
   if($_SESSION['email_id']!=''){
     $from=$_SESSION['email_id'];
    
   // echo "your email id:".$_SESSION['email_id'];

if(isset($_POST['email'])) {
echo "<br>";
echo "<img src='img/success.jpg' >";
echo "<br>";
echo "Email Sent To following email ids: <hr><br>";
$name = $_POST['email'];
$i=0;
foreach ($name as $email){

sendEmail($email, $subject, $message,$from);
echo $email;
$i++;
}

} // end brace for if(isset

else {

echo "You did not choose any email.";

}
    
    }  
}

///////////////////////////////////// Gmail //////////////////////////////////////////

if(isset($_POST['gmail_send_mail']))
{
   
   if($_SESSION['email_id']!=''){
     $from=$_SESSION['email_id'];
    
   // echo "your email id:".$_SESSION['email_id'];

if(isset($_POST['email'])) {
echo "<br>";
echo "<img src='img/success.jpg' >";
echo "<br>";
echo "Email Sent To following email ids: <hr><br>";
$name = $_POST['email'];
$i=0;
foreach ($name as $email){

sendEmail($email, $subject, $message,$from);
echo $email;
$i++;
}

} // end brace for if(isset

else {

echo "You did not choose any email.";

}
    
    }  
}


//////////////////////////////////sending mail function///////////////////////////////////


function sendEmail($to, $subject, $message,$from) {

      $to1 = $to;

      $from1 = $from;

      $header = "From: $from1" . "\r\n";

      // To send HTML mail, the Content-type header must be set

      $header .= 'MIME-Version: 1.0'
              . "\r\n";

      $header .= 'Content-type: text/html; charset=iso-8859-1'
              . "\r\n";



      return mail($to1, $subject, $message, $header);
   }


?>