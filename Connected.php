<?php
include_once 'config.php';
require_once ('yahoo/Yahoo.inc');
session_start();

$session = YahooSession::requireSession($consumer_key,$consumer_secret,$app_id);
if (is_object($session))
{
$user = $session->getSessionedUser();
$profile = $user->getProfile();
$name = $profile->nickname; // Getting user name
$guid = $profile->guid; // Getting Yahoo ID
$contacts=$user->getContacts()->contacts; 
////////////////////////image///////////////////////////////////////
?>
<html>
    
    <head>

<link href="css/subpage.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
    </head>

    <style>



    .topgap

    {

        margin-top: 140px; 
        margin-left: 20px;

    }
    .borders
    {
        border:1px solid #E4E3E3;  
    }
    .btn1
    {
        background: #23C0E3 !important;
        color: white !important;
    }
    .btn1:hover
    {
        background: #EBEBEB !important;
        color: black !important;
    }
    .c_w
    {
        width: 679px !important;
    }

</style>
    
    <body>

     <div class="container c_w  borders"> 
   
    <div class="row  ">
        <span><img src="img/yahoo-contacts.png"><h1 style="margin-left: 20px">Contacts List: </h1> </div></span>
<hr>
<br>
<form id="myform" action="send_mail.php" method="post" style="margin-left: 20px">
    
        
        
        

<?php
//echo "Hi! ".$name."<br />";

for ($i=0,$k=0;$i<count($contacts->contact);$i++)
{
for($j=0;$j<count($contacts->contact[$i]->fields);$j++)
{
$url_data = $contacts->contact[$i]->fields[$j]->uri;
$url_pie=explode("/user/", $url_data);
$url_end=substr($url_pie[1], stripos($url_pie[1], "/")+1);
$data=explode("/", $url_end);
if ($data[2]==="email")
{
$email_fr[$k]=$user->getDatafrom($url_end)->email->value;

}

if ($data[2]==="name")
{
    
$name_fr[$k]=$user->getDatafrom($url_end)->name->value->givenName;

}

}
$k++;
}
//echo "You have ".$k." contacts.<br />";
if($k>0){
    
?>
  <div class="row">
            <div class="col-xs-4">
                <input type="checkbox" onclick="checkedAll()" style="margin-right: 10px" name="" value="">Select All/None<br>
                <hr>
            </div>
            <div class="col-xs-8">
                <center>       

                    <button class="btn1 btn btn-default " name="yahoo_send_mail">Send Invitation</button>
                </center>
            </div>
        </div>  
    
    
    
 <?php   
    
for($i=0;$i<$k;$i++){
    $name_emailid[$i]="(".$name_fr[$i].")".$email_fr[$i];
//echo ($i+1).": ".$email_fr[$i]."<br />";
?>
   <div class="row" style="margin-left: 20px">  
                <div class="col-xs-06" >
                    <input type="checkbox" style="margin-right: 10px" name="email[]" value="<?= $email_fr[$i]?>"><?= $name_emailid[$i] ?><br>
                </div>
            </div>  

<?php
}

?>

     <center>       
            <br><br>
            <button class="btn1 btn btn-default " name="yahoo_send_mail">Send Invitation</button>
        </center>
    
    
<?php
}

else{
    echo "You have ".$k." contacts.<br />";
}




}
else
{
header("Location :".$re_url);
}

?>
    
    </form> 

    </div>
    </body>
    
    
    
    <script language='JavaScript'>

    checked = false;

    function checkedAll() {

        if (checked == false) {
            checked = true
        } else {
            checked = false
        }

        for (var i = 0; i < document.getElementById('myform').elements.length; i++) {

            document.getElementById('myform').elements[i].checked = checked;

        }

    }

</script>


</html>