<?php
require('header.php');
?>

<style>
    ul, ol {
    margin-bottom: 10px;
    margin-right: 25px;
    margin-top: 0;
}
   
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
 
   .navigation2 ul 
    {           
        float:right;
        	list-style:none;
                display: flex;
                display: -ms-flexbox;
               // margin-right: 30px;
                
    }
    .navigation2 li 
    {
        
        width:50%;
        margin-left: 11px;
      //  margin-right: 6px;
        height:25px ;
    }
    
    .navigation2 li:hover 
    {
       // float:left;
       // margin-left: 6px;
      //  margin-right: 6px;
         border-bottom: 4px solid #009AEF !important;
      
    }
    .navigation2 a:hover{
        text-decoration: none;
    }
    li > .active {
        border-bottom: 4px solid #009AEF !important;
    }
    .navigation2 a{
        font-size: 13px;
        text-align: center;
        //margin-left: 10px;
      
    }
    .nav_top_space
    {
        margin-top:20px;
    }
  .loop-container {
    border: 1px solid #CCCCCC;
    float: left;
    margin-top: 1px;
    padding: 10px 10px 50px;
    right: 16px;
    width: 969px;
}
 .upload_block
 {
     width:500px ;
     height:350px;
 }
   #drop
   {
    margin-bottom: 0px !important;
    padding: 0px !important;
   
   }
   
</style>

        <div class="container ">
            
         <?php 
         require('timeline_header.php');
        ?>

     
            
           
        <div class=" adjustment info_content">    
                
            <div class="row nav_top_space">
             <nav class="navigation2 " >
           
            
            	<ul >
                    <li><a href="timeline_photos.php">Photos</a></li>
                    <li class="active"><a href="timeline_photos_Albums.php">Albums</a></li>
                </ul>
             
            </nav>
            </div>
      
      
            </div>
            <div class="adjustment"> 
           <div class="strip"> <span class="lt"></span>

   <p>My Albums</p>

</div>

                    
<div class="loop-container">

<div id="create_album_button" class=" header_link" style="width:120px;margin:30px;position: relative;right: 14px;width: 120px;">
    <a href="create_album_addingFiles.php">Create Album</a>
</div>
   
<?php
 require('album.php');
?>
    

</div>
                
<!-- status wrapper -->
 
                
        </div>
     

                     
</div>     
            
           


<?php include('footer.php') ?>

