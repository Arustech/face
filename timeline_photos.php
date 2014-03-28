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

       
        border-bottom: 4px solid #009AEF !important;
    }
    .navigation2 a:hover{
        text-decoration: none;
    }
    ul > .active {
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
  
   
   
</style>

        <div class="container ">
            
      <?php 
    require('timeline_header.php');
?>

     
            
           
        <div class=" adjustment info_content">    
                
            <div class="row nav_top_space">
             <nav class="navigation2 " >
           
            
            	<ul >
                	<li  class="active"><a>Photos</a></li>
                	<li ><a href="timeline_photos_Albums.php">Albums</a></li>
                
                	
                </ul>
             
            </nav>
            </div>
      
      
            </div>
           </div>  
        
        
    
<?php include('footer.php') ?>