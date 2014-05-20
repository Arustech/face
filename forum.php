<?php require('header.php');

 require 'forum_process.php';
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
  
</style>

<div class="to_heading">
    
    <h2 class="headtext">Forum</h2>
    
    
</div>

<div class="container wrapper1" style="display:flex;display:-ms-flexbox;">
  

    <?php include 'forum_sidebar.php';
?>            
    
    <div class="row adjustment info_content" style="width:85%;margin-top:20px">    

       <?php  
       foreach($cat as $cate){
           
       ?>
        
        
    <div class="strip" style="margin-bottom:10px">
                        <p style="margin-left: 16px"><?=$cate['topic_name']?></p>
                       
                     </div>
         <div style="clear: both"></div>
      
         <!--to be repeated-->
         <?php $subcat=$forum_obj->get_forum_topics($cate['topic_id']);
         
         foreach($subcat as $subtopic){
            // var_dump($subtopic);exit;
          // getting last thread to be display infront of topic 
           $last_thread=  $forum_obj->get_last_thread($subtopic['topic_id']);
           $chk=count($last_thread);
         
           // total no of threads in one topic 
           $total_threads=$forum_obj->get_all_thread($subtopic['topic_id']);
           $posts=0;
           foreach ($total_threads as $tt){
              // total no of posts (comments) in one topic 
           $total_posts=$forum_obj->get_all_posts($tt['thread_id']);
           $posts+=count($total_posts);  
           }
         
           $th=count($total_threads);
           
           
           
         ?>
         
         <div style="display:flex;display:-ms-flexbox;margin-left: 25px;width:95%;border-bottom: 1px solid #CCCCCC;padding-bottom:10px;margin-top: 10px">
            <div style="margin-left:10px"> <img src="img/forum.png"> </div>
            <div style="width:370px;margin-left: 30px">
                
                <div style="margin-bottom: 6px;font-size: 14px;color:#3B5998"><a href="thread_list.php?thread=<?=$subtopic['topic_name']?>&cid=<?=$subtopic['topic_id']?>&id=<?=$cate['topic_id']?>"><?=$subtopic['topic_name']?></a></div>
                <div style="font-size: 11px;color: grey"><span style="margin-right:10px">Threads: <?=$th?></span>Posts: <?=$posts?></div>
            </div>
            <div style="width:200px">
                <div style="border-radius:8px;background-color: #F6F6F6;width:301px;height:47px;border:1px solid #DEDEDE;padding:5px 0px 0px 10px ;font-size: 11px ">
                   <?php if($chk>0){ 
     
                       $lt_user=$User_obj->getUserInfo($last_thread[0]['thread_by']);
                       ?> 
                    <div>
                        <a href="<?=$main->config['web_path']?>thread_reply.php?id=<?=$last_thread[0]['thread_id']?>"><?=  ucfirst($last_thread[0]['thread_title'])?></a>
                    </div>
                    <div>
                        <span>by </span><a href="<?=$main->config['web_path'].$lt_user['user_name']?>"><?=  ucfirst($lt_user['user_name'])?></a><span>on <?=date("F j, Y, g:i a", strtotime($last_thread[0]['thread_date']))?> </span>
                    </div>
                   <?php  }
                   else{ ?>
                       
                    <div>No Thread Found... !</div> 
                       
                  <?php }
                   ?>
                </div>
                
            </div>
            
            
        </div>
    
       
         <div class="row spacing" style="margin-bottom:20px">
              
            
            </div>
           <?php } 
           
       }?> 

           
             
            </div>


 
            
          </div>  
         <?php         include 'forum_footer.php';?>     
     

<?php include('footer.php') ?>