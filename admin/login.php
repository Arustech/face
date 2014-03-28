<? 
require('../lib/Main.php');
$main =  new Main();
$admin  =  $main->load_model('Admin');
$main->initSession();
$error = '';
 if ($admin->chk_admin_session())
 {
	 $main->go($main->config['admin_path']);

 }
 


if (isset($_POST['btn_login']) ) 
{

       if(!$admin->login_admin($_POST))
	   {
		   $error='l';
	   }
	   
	
}

if (isset($_POST['btn_reset']) ) 
{

       $main->ForgotPass($_POST);
	
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title>Dashboard | KnownFaces - Administration Panel</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/login.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
<!--[if IE 7]><link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css"><![endif]--><!--[if IE 8]><link href="assets/css/ie8.css" rel="stylesheet" type="text/css"/><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script><script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>
<script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="plugins/noty/themes/default.js"></script>
<!--[if lt IE 9]><script src="assets/js/libs/html5shiv.js"></script><![endif]--><script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script><script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script><script type="text/javascript" src="plugins/nprogress/nprogress.js"></script><script type="text/javascript" src="assets/js/login.js"></script><script>$(document).ready(function(){

Login.init();

});</script>
</head>
<body class="login">
<div class="logo"> <img src="assets/img/logo.png" alt="logo"/></div>
<div class="box">
  <div class="content">
    <form class="form-vertical login-form" action="login.php" method="post">
      <h3 class="form-title">Sign In to your Account</h3>
   
      <?
      if($error =='l')
	  {
		  echo $admin->noti('error','Invalid username or password');
	  }
	  
	  
	  ?>
      <div class="alert fade in alert-danger" style="display: none;"> <i class="icon-remove close" data-dismiss="alert"></i> Enter any username and password. </div>
      <div class="form-group">
        <div class="input-icon"> <i class="icon-user"></i>
          <input type="text" name="admin_username" value="" class="form-control" placeholder="Username" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username."/>
        </div>
      </div>
      <div class="form-group">
        <div class="input-icon"> <i class="icon-lock"></i>
          <input value="" type="password" name="admin_password" class="form-control" placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password."/>
        </div>
      </div>
      <div class="form-actions">
<!--        <label class="checkbox pull-left">-->
<!--          <input type="checkbox"   class="uniform" name="remember">
          Remember me</label>
-->
        <button type="submit" name="btn_login" value="btn_login" class="submit btn btn-primary pull-right"> Sign In <i class="icon-angle-right"></i> </button>
      </div>
    
    
    </form>
  </div>
  <div class="inner-box">
    <div class="content"> <i class="icon-remove close hide-default"></i> <a href="login.php#" class="forgot-password-link">Forgot Password?</a>
      <form class="form-vertical forgot-password-form hide-default" action="login.php" method="post">
        <div class="form-group">
          <div class="input-icon"> <i class="icon-envelope"></i>
            <input type="text" id='email' name="email" class="form-control" placeholder="Enter email address" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email."/>
          </div>
        </div>
        <button type="submit" id="forgot" name="btn_reset" class="submit btn btn-default btn-block"> Reset your Password </button>
      </form>
      <div  id="forgot-done" class="forgot-password-done hide-default"> <i class="icon-ok success-icon"></i> <span>Great. We have sent you an email.</span> </div>
	  
	  <div  id="forgot-undone"
	class="forgot-password-done hide-default"> <i class="icon-remove danger-icon"></i> <span>Error. This email doesnot exist.</span> </div>
	  
    </div>
	
    
	
    
	
  </div>
</div>


</body>
</html>