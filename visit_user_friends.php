<?php require('header.php') ?>
<link href="fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
<link href="plugins/bootstrap-select/bootstrap-select.css" rel="stylesheet">
<script type="text/javascript" src="plugins/autosize/jquery.autosize.js"></script>
<script type="text/javascript" src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
<!-- JavaScript Includes -->



<style>
  .adjustment
   {
    bottom: 190px !important;
    position: relative !important;
    right: 15px;
    width: 970px;
   }
   .info_content
   {
   border-bottom: 1px solid #CCCCCC;
    border-left: 1px solid #CCCCCC;
    border-right: 1px solid #CCCCCC;
    padding-top: 5px;
   }
   .loop-container {
    border: 1px solid #CCCCCC;
    float: left;
    margin-top: 1px;
    padding: 10px 10px 50px;
    right: 16px;
    width: 969px;
}
 
   
</style>
   
 <div class="container ">
            
        <?php 
        require('visit_user_header.php');
        ?>
            

        <div class=" adjustment loop-container">    
                
        <?php 
        require('visit_user_friends_timeline.php');
        ?>
                
             
          </div>  
        
</div>
    


        <?php include('footer.php') ?>