<?php ob_start();

?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen" />
<style>
    
</style>
<div class="bootstrap">
    <div class="row">
        
        <div class="col-xs-4 ">
<!--            <img src="img/google-contacts.png">-->
             <div> <?php include('Google.php')?></div>
        </div>    
         <div class="col-xs-4">
<!--              <img src="img/hotmail-contacts.png">-->
        <?php include('Hotmail.php')?>
         </div>
          <div class="col-xs-4">
<!--              <img src="img/yahoo-contacts.png">-->
        <?php include('Yahoo.php')?>
         </div>
    </div>
</div>
