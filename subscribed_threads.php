<?php require('header.php') ?>

<style>
  
    .strip{
        width:97%;
        margin-left: 15px
    }
    .to_heading{
         border-bottom: 1px solid #CCCCCC;
    /*border-left: 1px solid #CCCCCC;*/
    border-right: 1px solid #CCCCCC;
    width:917px;
    margin-left:15px;
    
    }
    .headtext{
     
        color:grey;
    }
  
</style>

<div class="to_heading">
    
    <h2 class="headtext">Forum</h2>
    
    
</div>

<div class="container wrapper1" style="display:flex;display:-ms-flexbox;">
  

    <?php include 'forum_sidebar.php';
?>            
    
    <div class="row adjustment info_content" style="width:85%;margin-top:20px">    
        <h4 style="margin-left:25px">Subscribed Threads</h4>
    <div class="strip" style="margin-bottom:10px">
                        <p style="margin-left: 16px">Threads</p>
                       
                     </div>
         <div style="clear: both"></div>
      
         <!--to be repeated-->
         
         
         <div style="display:flex;display:-ms-flexbox;margin-left: 25px;width:95%;border-bottom: 1px solid #CCCCCC;padding-bottom:10px;margin-top: 10px">
            <div style="margin-left:10px"> <img src="img/forum.png"> </div>
            <div style="width:370px;margin-left: 30px">
                
                <div style="margin-bottom: 6px;font-size: 14px;color:#3B5998"><a href="">General</a></div>
               <div style="font-size: 11px;color: grey"><span style="margin-right:10px">Replies: 23</span>Views: 10</div>
            </div>
            <div style="width:200px">
                <div style="border-radius:8px;background-color: #F6F6F6;width:301px;height:47px;border:1px solid #DEDEDE;padding:5px 0px 0px 10px ;font-size: 11px ">
                    <div>
                        <a href="">Effective Search Engine optimization</a>
                    </div>
                    <div>
                        <span>by </span><a href="">Zunair Nasir</a><span> on Feb 02-05-14 </span>
                    </div>
                </div>
                
            </div>
            
            
        </div>
         
            <div class="row spacing">
              <!--content would be generated here-->
            
            </div>
            
 <?php         include 'forum_footer.php';?>      
           
            
            
             
            </div>



            
          </div>  
        
     

<?php include('footer.php') ?>