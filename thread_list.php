<?php
require('header.php');
$forum_obj=$main->load_model('Forums');
$User_obj=$main->load_model('User');
$thread_list=$forum_obj->get_threads($_REQUEST['id'],$_REQUEST['cid']);

?>

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
    .newthread{
      margin-left:15px;display: block;height:24px;width:94px;background-color: #F1F1F1;border-radius: 6px;border: 1px solid darkgrey;color:grey;margin-bottom:7px;padding-left: 5px   
    }
    .newthread:hover{
        text-decoration: none;
    }
  
</style>

<div class="to_heading">
    
    <h2 class="headtext">Forum</h2>
    
    
</div>

<div class="container wrapper1" style="display:flex;display:-ms-flexbox;">
  

    <?php 
    if(isset($_REQUEST['thread'])){
        $heading=$_REQUEST['thread'];
    }
?>            
    
    <div class="row adjustment info_content" style="width:100%;margin-top:20px">    
        <h4 style="margin-left:16px"><?=$heading?></h4> 
        <a class="newthread" style="" href="new_thread.php?id=<?=$_REQUEST['cid']?>">New Thread</a>
    <div class="strip" style="margin-bottom:10px">
                        <p style="margin-left: 16px">Threads</p>
                       
                     </div>
         <div style="clear: both"></div>
      
         <!--to be repeated-->
    <?php
    foreach($thread_list as $tlist){
        $replies=$forum_obj->get_threads_comments($tlist['thread_id']);
        $total_replies=  count($replies);
        
        $threadby=$User_obj->getUserInfo($tlist['thread_by']);
    ?>     
         
         <div style="display:flex;display:-ms-flexbox;margin-left: 25px;width:95%;border-bottom: 1px solid #CCCCCC;padding-bottom:10px;margin-top: 10px">
            <div style="margin-left:10px"> <img src="img/forum.png"> </div>
            <div style="width:370px;margin-left: 30px">
                
                <div style="margin-bottom: 6px;font-size: 14px;color:#3B5998"><a href="thread_reply.php?id=<?=$tlist['thread_id']?>"><?=$tlist['thread_title']?></a></div>
               <div style="font-size: 11px;color: grey"><span style="margin-right:10px">Replies: <?=$total_replies?></span>Views: <?=$tlist['thread_views']?></div>
            </div>
            <div style="width:428px;">
                <div style="float:right;border-radius:8px;background-color: #F6F6F6;width:301px;height:47px;border:1px solid #DEDEDE;padding:5px 0px 0px 10px ;font-size: 11px;display: flex;display: -ms-flexbox ">
                    <div style="margin-right:20px">
                        <img style="width:35px;height:35px" src="<?=$main->get_uurl('thumbs') . $threadby['user_avatar']?>"> 
                    </div>
                    <div>
                        <span><?=date("F j, Y, g:i a", strtotime($tlist['thread_date']))?> </span><br>
                        <span>by </span><a href="<?=$main->config['web_path']?><?=$threadby['user_name']?>"><?=$threadby['user_name']?></a>
                    
                    </div>
                    
                </div>
                
            </div>
            
            
        </div>
         
            <div class="row spacing">
              <!--content would be generated here-->
            
            </div>
      
         
    <?php } ?>

            <?php         include 'forum_footer.php';?>      
            
            
             
            </div>



            
          </div>  
        
     

<?php include('footer.php') ?>