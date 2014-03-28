<?php
ob_start();



//function for parsing the curl request
function curl_file_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
if(isset($_GET['user_id']))
{
    $from_id=$_GET['user_id'];
}
$client_id = '000000004C110855';
$client_secret = 'AOlYfiuASddTuNYD7cFtI4Uq1kCiq1JV';
$redirect_uri = 'http://www.arustech.com/face/oauth-hotmail.php?user_id='.$from_id;
$auth_code = $_GET["code"];
$fields = array(
    'code' => urlencode($auth_code),
    'client_id' => urlencode($client_id),
    'client_secret' => urlencode($client_secret),
    'redirect_uri' => urlencode($redirect_uri),
    'grant_type' => urlencode('authorization_code')
);
$post = '';
foreach ($fields as $key => $value) {
    $post .= $key . '=' . $value . '&';
}
$post = rtrim($post, '&');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://login.live.com/oauth20_token.srf');
curl_setopt($curl, CURLOPT_POST, 5);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);
$response = json_decode($result);
$accesstoken = $response->access_token;

//$accesstoken = $_SESSION['accesstoken'] ;//= $_GET['access_token'];
$url = 'https://apis.live.net/v5.0/me/contacts?access_token=' . $accesstoken;
$xmlresponse = curl_file_get_contents($url);
$xml = json_decode($xmlresponse, true);

$msn_email = "";
$i = 0;
if ($xml['data']) {
    foreach ($xml['data'] as $emails) {
// echo $emails['name'];
        $email_ids = implode(",", array_unique($emails['emails'])); //will get more email primary,sec etc with comma separate
//$msn_email[$i]= rtrim($email_ids,",");
        $msn_total[$i] = "(" . $emails['name'] . ")  " . rtrim($email_ids, ",");
        $msn_names[$i] = "(" . $emails['name'] . ")  ";
        $msn_email[$i] = rtrim($email_ids, ",");
        $i++;
    }
}
?>
<!doctype html>
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
        <span><img src="img/hotmail-contacts.png"><h1 style="margin-left: 20px">Contacts List: </h1> </div></span>
<hr>
<br>
<form id="myform" action="send_mail.php" method="post" style="margin-left: 20px">
    <?php if(isset($_GET['user_id']))
{
     
    $idd=$_GET['user_id'];
    
} ?>
    
    <input type="hidden" name="msn_from_email" hidden value="<?= $idd ?>"/>
<?php
if ($msn_email != '') {
    ?>
        <div class="row">
            <div class="col-xs-4">
                <input type="checkbox" onclick="checkedAll()" style="margin-right: 10px" name="" value="">Select All/None<br>
                <hr>
            </div>
            <div class="col-xs-8">
                <center>       

                    <button class="btn1 btn btn-default " name="msn_send_mail">Send Invitation</button>
                </center>
            </div>
        </div>

    <?php
    $total = count($msn_total);
    // foreach($msn_email as $contact)
    for ($j = 0; $j < $total; $j++) {
        ?>

            <div class="row" style="margin-left: 20px">  
                <div class="col-xs-06" >
                    <input type="checkbox" style="margin-right: 10px" name="email[]" value="<?= $msn_email[$j] ?>"><?= $msn_total[$j] ?><br>
                </div>
            </div>









        <?php
    }//for loop ends
    ?>
        <center>       
            <br><br>
            <button class="btn1 btn btn-default " name="msn_send_mail">Send Invitation</button>
        </center>
        <?php
        unset($msn_email);
    }//if ends
    else {

        echo "No Contacts Found";
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


