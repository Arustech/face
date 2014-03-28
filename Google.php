<?php

// disable warnings
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

$sClientId = '806502622181-gma9213r222plu7br7u1n58n5s1p22hi.apps.googleusercontent.com';
$sClientSecret = '1KfRfuqTlw8xTi1HNnpQpQpU';
$sCallback = 'http://arustech.com/face/Google.php'; // callback url, don't forget to change it to your!
$iMaxResults = 250; // max results
$sStep = 'auth'; // current step

// include GmailOath library  https://code.google.com/p/rspsms/source/browse/trunk/system/plugins/GmailContacts/GmailOath.php?r=11
include_once('GmailOath.php');

session_start();

// prepare new instances of GmailOath  and GmailGetContacts
$oAuth = new GmailOath($sClientId, $sClientSecret, $argarray, false, $sCallback);
$oGetContacts = new GmailGetContacts();

if ($_GET && $_GET['oauth_token']){

    $sStep = 'fetch_contacts'; // fetch contacts step

    // decode request token and secret
    $sDecodedToken = $oAuth->rfc3986_decode($_GET['oauth_token']);
    $sDecodedTokenSecret = $oAuth->rfc3986_decode($_SESSION['oauth_token_secret']);

    // get 'oauth_verifier'
    $oAuthVerifier = $oAuth->rfc3986_decode($_GET['oauth_verifier']);

    // prepare access token, decode it, and obtain contact list
    $oAccessToken = $oGetContacts->get_access_token($oAuth, $sDecodedToken, $sDecodedTokenSecret, $oAuthVerifier, false, true, true);
    $sAccessToken = $oAuth->rfc3986_decode($oAccessToken['oauth_token']);
    $sAccessTokenSecret = $oAuth->rfc3986_decode($oAccessToken['oauth_token_secret']);
    $aContacts = $oGetContacts->GetContacts($oAuth, $sAccessToken, $sAccessTokenSecret, false, true, $iMaxResults);

    // turn array with contacts into html string
    $sContacts = $sContactName = $cname=$cemail='';
    
    foreach($aContacts as $k => $aInfo) {
        $sContactName[] = end($aInfo['title']);
        $cname=end($aInfo['title']);
        $aLast = end($aContacts[$k]);
        foreach($aLast as $aEmail) {
            $cemail[]=$aEmail['address'];
            $sContacts[]=  $cname . '(' . $aEmail['address'] . ')';
        }
    }
    
} else {
    // prepare access token and set it into session
    $oRequestToken = $oGetContacts->get_request_token($oAuth, false, true, true);
    $_SESSION['oauth_token'] = $oRequestToken['oauth_token'];
    $_SESSION['oauth_token_secret'] = $oRequestToken['oauth_token_secret'];
}

?>
<!DOCTYPE html>
<html lang="en" >
    
    
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
        
        
            
            
            

    <?php if ($sStep == 'auth'): ?>
        <center>
        <?php
       
       $urls_="https://www.google.com/accounts/OAuthAuthorizeToken?oauth_token=".$oAuth->rfc3986_decode($oRequestToken['oauth_token']);
       
       echo '<input type="image" src="img/google-contacts.png" href="'.$urls_.'" onclick="return popitup(\''.$urls_.'\');" />';?>
       
        </center>
   








 <?php elseif ($sStep == 'fetch_contacts'): ?>
           
            
            <div class="container c_w  borders"> 
   
    <div class="row  ">
        <img src="img/google-contacts.png"><h1 style="margin-left: 20px">Contacts List: </h1> </div>
<hr>
<br>
<form id="myform" action="send_mail.php" method="post" style="margin-left: 20px">
    
        
        
        

<?php
//echo "Hi! ".$name."<br />";


//echo "You have ".$k." contacts.<br />";
if($cemail>0){
    
?>
  <div class="row">
            <div class="col-xs-4">
                <input type="checkbox" onclick="checkedAll()" style="margin-right: 10px" name="" value="">Select All/None<br>
                <hr>
            </div>
            <div class="col-xs-8">
                <center>       

                    <button class="btn1 btn btn-default " name="gmail_send_mail">Send Invitation</button>
                </center>
            </div>
        </div>  
    
    
    
 <?php   
    
for($i=0;$i<count($cemail);$i++){
//echo ($i+1).": ".$email_fr[$i]."<br />";
if($cemail[$i]!=''){
    ?>
    
   <div class="row" style="margin-left: 20px">  
                <div class="col-xs-06" >
                    <input type="checkbox" style="margin-right: 10px" name="email[]" value="<?= $cemail[$i]?>"><?= $sContacts[$i] ?><br>
                </div>
            </div>  

<?php
}//if ends

} //for ends

?>

     <center>       
            <br><br>
            <button class="btn1 btn btn-default " name="gmail_send_mail">Send Invitation</button>
        </center>
    
    
<?php
}

else{
    echo "You have 0 contacts.<br />";
}


?>
    
    </form> 

    </div>
            
            
            
            
            
            
            
            
            
    <?php endif ?>

 
            
            
            
            
            
            
            
            
            
</body>

<script language="javascript" type="text/javascript">

function popitup(url) {
	newwindow=window.open(url,'Gmail Contacts','width=778,scrollbars=1');
       
      
	if (window.focus) {
            newwindow.focus();
            
             $(newwindow.document).ready(function(){
           
      
       });
            
          
            
        }
	return false;
}



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
    
    

// -->
</script>

</html>