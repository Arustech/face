<?php
require('header.php');
?>

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
 
   .navigation2 ul 
    {           
        	list-style:none;
                display: flex;
                display: -ms-flexbox;
                margin-right: 30px;
                
    }
    .navigation2 li 
    {
        
        width:50%;
        margin-left: 6px;
        margin-right: 6px;
        height:35px ;
    }
    
    .navigation2 li:hover
    {
        float:left;
        margin-left: 6px;
        margin-right: 6px;
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
        margin-left: 207px;
      
    }
    .nav_top_space
    {
        margin-top:20px;
    }
  
   
   
</style>

        <div class="container ">
            
      <?php 
    require('visit_user_header.php');
?>

     
            
           
        <div class=" adjustment info_content">    
                
            <div class="row nav_top_space">
             <nav class="navigation2 " >
           
            
            	<ul >
                	<li  class="active"><a>Photos</a></li>
                	<li ><a href="javascript:;">Albums</a></li>
                
                	
                </ul>
             
            </nav>
            </div>
      
      
            </div>
           </div>  
        
        
    
<?php include('footer.php') ?>