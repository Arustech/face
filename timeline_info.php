<?php require('header.php') ?>

<style>
   

   .adjustment
   {
       position:relative !important;
       bottom:190px !important;
   }
   .info_content
   {
   border-bottom: 1px solid #CCCCCC;
    border-left: 1px solid #CCCCCC;
    border-right: 1px solid #CCCCCC;
    padding-top: 5px;
   }
  
   .spacing
   {
        margin-left:15px;
        margin-top:15px;
   }
   .spacing p
   {
       font-size:12px;
       color:#808080;
   }
   
   
</style>



<div class="container ">
  
 <?php 
    require('timeline_header.php');
?>

   
    
<div class="row adjustment info_content">    

    <div class="strip" style="margin-bottom:10px">
                        <p style="padding-top:2px;margin-left: 16px">Basic Info</p>
                       
                     </div>
            <div class="row spacing">
                <div class="col-xs-2">
                    <p> Gender: </p>
                </div>
             
                <div class="col-xs-2">
                    <p style="margin-left: 40px">  <?=$basic['gender'] ?> </p>
                </div>
            
            </div>
           
            
            
             <div class="row spacing">
                <div class="col-xs-2">
                    <p> Religion: </p>
                </div>
             
                <div class="col-xs-2">
                    <p style="margin-left: 40px"> <?=$basic['religion'] ?> </p>
                </div>
            
            </div>
           
            
            
             <div class="row spacing">
                <div class="col-xs-2">
                    <p> Martial Status: </p>
                </div>
             
                <div class="col-xs-2">
                    <p style="margin-left: 40px"> <?=$basic['relation'] ?> </p>
                </div>
            
            </div>
            
           
            
            <div class="row spacing">
                <div class="col-xs-2">
                    <p> Looking For: </p>
                </div>
             
                <div class="col-xs-2">
                    <p style="margin-left: 40px">  <?=$basic['lookingfor'] ?> </p>
                </div>
            
            </div>
            
            <div class="row spacing">
                <div class="col-xs-2">
                    <p> Date Of Birth: </p>
                </div>
             
                <div class="col-xs-2">
                    <p style="margin-left: 40px">  <?=$basic['birthday'] ?> </p>
                </div>
            
            </div>
            
<!--  /////////////////////////////////////////////////////////////////////////////////  -->

        
<div class="strip" style="margin-bottom:10px;margin-top: 20px">
                        <p style="margin-left: 16px;margin-bottom: 3px">City</p>
                       
                     </div>
            <div class="row spacing">
                <div class="col-xs-2">
                    <p> <?=$contact['city']?> </p>
                </div>
             
            </div>
           
            
            
             
            </div>



            
          </div>  
        
     

<?php include('footer.php') ?>