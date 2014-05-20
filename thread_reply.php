<?php require('header.php');
 require 'thread_rply_process.php';

?>
 <script type="text/javascript" src="plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript" src="plugins/ckeditor/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="admin/plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="admin/plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="admin/assets/js/demo/form_validation.js"></script>
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
    .labels{
         color: #666666;
         font-size: 12px;
    }
    .inputs{
        background: url("img/input.png") repeat-x scroll 0 0 #F4F4F4;
    border: 1px solid #D7D7D7;
    color: #333333;
    font-size: 12px;
    height:24px;
    width: 265px;
    }
    .item_is_not_active {
    background: none repeat scroll 0 0 #F6E3E3;
    border: 1px solid #E3B4B4;
    cursor: default;
    left: 0;
    margin-left: 49px;
}
.item_is_active, .item_is_not_active {
    display: block;
    padding: 4px 8px 4px 4px;
    position: absolute;
    width: 50px;
    display: flex
}
.item_is_active {
    background: none repeat scroll 0 0 #E3F6E5;
    border: 1px solid #B4E3B9;
    cursor: default;
    left: 0;
}
.item_is_active_holder {
    height: 30px;
    position: relative;
}
 #editor {overflow:scroll; max-height:300px}
 
 .forum_thread_view_holder{
    border-bottom: 1px solid #CCCCCC;
    border-top: 1px solid #CCCCCC;
    margin: 16px 0 16px 16px;
    min-height: 232px;
    padding: 12px;
    width: 97.5%;
 }
 .forum_user_info{
    background: none repeat scroll 0 0 #F7F7F7;
    border: 1px solid #DFDFDF;
    border-radius: 8px;
    float: left;
    margin-right: 14px;
    padding: 5px 15px;
    width: 132px;
    z-index: 1;
 }
 .forum_thread_photo{
     padding-bottom: 5px;
 }
 
 .extra_info {
  color: #808080;
  padding: 4px 0;
}

.forum_user_info_holder_inner_image {
background: url("img/forum_user_info_holder_inner.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    height: 16px;
    position: relative;
    right: -131px;
    top: 35px;
    width: 10px;
    z-index: 100;
}

.forum_main{
 border-bottom: 1px solid #CCCCCC;
    float: left;
    min-height: 164px;
    padding: 10px;
    width: 82%;
    
}
.topics{   color: #808080;
    font-size: 12px;}
</style>


    <div class="to_heading">
    <h3 class="headtext"><?=$thread_info['thread_title']?></h3>
    <input id="id_field" type="text" class="hidden" value="<?=$thread_info['thread_id']?>">
    
   </div>

<!---starting Discussion part ---->
<div class="forum_thread_view_holder">
    <div class="forum_user_info_holder_inner_image"></div>
    <div class="forum_user_info">
        
         <div class="forum_thread_photo">
            <a  href="<?=$main->config['web_path']?><?=$threadby['user_name']?>"><img width="100" height="100" class="image_online" title="<?=$threadby['user_name']?>" alt="pic" src="<?= $main->get_uurl('avatar') . $threadby['user_avatar'] ?>"></a>
         </div><!--forum_thread_photo--->
        
        <div class="forum_thread_user">
             <span id="js_user_name_link_profile-1001" class="user_profile_link_span"><a href="<?=$main->config['web_path']?><?=$threadby['user_name']?>"><?=$username?></a></span>
        </div><!--forum_thread_user--->  
        
        <div class="extra_info">
            Posts: <span class="js_user_post_1001"><?=$t_threads?></span><br>
	</div><!---extra_info -->
     
    </div><!--forum_user_info--->
    
    <div class="forum_main" id="forum_main_thread">
        <div id="thread_data_div">
            <?=$thread_info['thread_data']?>
        </div>
        
        
    </div><!---- forum_main--->
    <div class="topics">Topics: <a ><?=$thread_info['thread_topic']?></a>
      <?php if($thread_info['thread_by']==$_SESSION['kfc_user_id']){?>
        <span style="float:right;margin-right:14px"><a style="cursor:pointer" class="edit_thread" id="<?=$thread_info['thread_id']?>">Edit</a>|<a class="delete_thread" id="<?=$thread_info['thread_id']?>" style="cursor:pointer" >Delete</a></span>
      <?php } ?>
    </div>
    <div style="clear: both;"></div> 
</div><!-- forum_thread_view_holder--->
<!---starting Discussion part ---->

<?php if($total_replies>0){ 
    echo "<h4 style='margin-left:15px'>Comments:</h4>";
     foreach ($replies as $comment){
         
         $commentby=$User_obj->getUserInfo($comment['comment_by_user_id']);
         if (strlen($commentby['user_name']) > 14){
   $username1 = substr($commentby['user_name'], 0, 11) . '...';
}
else{
    $username1 =$threadby['user_name'];
}
    ?>
 <div class="wrapper_<?=$comment['comment_id']?>">
<div class="forum_thread_view_holder">
    <div class="forum_user_info_holder_inner_image"></div>
    <div class="forum_user_info">
        
         <div class="forum_thread_photo">
            <a  href="<?=$main->config['web_path']?><?=$commentby['user_name']?>"><img width="100" height="100" class="image_online" title="<?=$commentby['user_name']?>" alt="pic" src="<?= $main->get_uurl('avatar') . $commentby['user_avatar'] ?>"></a>
         </div><!--forum_thread_photo--->
        
        <div class="forum_thread_user">
             <span id="js_user_name_link_profile-1001" class="user_profile_link_span"><a href="<?=$main->config['web_path']?><?=$commentby['user_name']?>"><?=$username1?></a></span>
        </div><!--forum_thread_user--->  
        
<!--        <div class="extra_info">
           
	</div>-extra_info -->
     
    </div><!--forum_user_info--->
   
    <div class="forum_main" id="forum_main_<?=$comment['comment_id']?>">
        <div id="comment_div_<?=$comment['comment_id']?>" class="comment_data">
            <?=$comment['comment_data']?>
        </div>
        
    </div><!---- forum_main--->
    <div class="topics" style="margin-left:145px"><a  href="<?=$main->config['web_path']?><?=$commentby['user_name']?>"><?=$commentby['user_name']?></a>
     <?php if($comment['comment_by_user_id']==$_SESSION['kfc_user_id']){?>
        <span style="float:right;margin-right:14px"><a class="edit_comment" id="<?=$comment['comment_id']?>" style="cursor:pointer" >Edit</a>|<a class="delete_comment" id="<?=$comment['comment_id']?>" style="cursor:pointer" >Delete</a></span>
<!--        <input id="id_field" type="text" class="hidden" value="<?=$comment['comment_id']?>">-->
      <?php } ?>
    </div>
    <div style="clear: both;"></div> 
    
    
</div><!-- forum_thread_view_holder--->
</div>
<?php } 
}?>

<!---ending Discussion part ---->



<!---starting Reply part ---->
<div class="container wrapper1" style="display:flex;display:-ms-flexbox;">
  <form method="post" action="<?=$_SERVER['REQUEST_URI']?>" name="new_comment">     
    
    <div class="row adjustment info_content" style="width:100%;margin-top:20px">    
       <div class="strip"> <h5 style="margin-left:16px">Post a Reply</h5> </div>
        
        <div style="margin-left:15px">
        

        <span class="labels">*Message</span><br>
        <div style="margin-bottom:20px">
            <textarea id="SBSFull" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 200px;" rows="3" cols="5" name="comment_body" class="form-control  required"></textarea>
        </div>
     
        </div>
        
       <br>
       <button style="margin-left: 15px" class="btn btn-primary" name="submit_comment" type="submit">Submit</button>
    
        
     <div class="row spacing">
              <!--content would be generated here-->
            
            </div>
            
 </div>

</form> 

            
</div>  

<!---ending Reply part ---->
        
     

<?php include('footer.php') ?>

   
<script>
$(document).ready(function(){

if($('#SBSFull').length > 0){
		var editor_en = CKEDITOR.replace('SBSFull', { height:"250", width:"98%", toolbar:'SBSFull', resize_enabled:false });
		CKFinder.SetupCKEditor(editor_en, 'ckeditor/ckfinder/');
	}

});

$("#new_comment").validate();



///////////// Editing Thread ///////////////////////
$(".edit_thread").click(function(){
   var id=$(this).attr('id');
  
    var cdiv=$('#thread_data_div');
    var fm="#forum_main_thread";
    var divHtml = $(cdiv).html();
    var editableText = $("<textarea id='thread_area'  style=' word-wrap: break-word; resize: horizontal; height: 100px;' rows='3' cols='5' name='comment_body' class='form-control  required' />");
    editableText.val(divHtml);
    $(cdiv).replaceWith(editableText);
   if($('.update_thread_btn').length==0){
    var button=$("<input type='submit' name='update_thread' value='Save' id='"+id+"'  class='btn btn-primary update_thread_btn'>");
    $(fm).append(button);
    }
    
    });

$(document).on('click','.update_thread_btn',function(e){
                                
                                 var thread_id=$(this).attr('id');
                                 
                                 var thread_data=$('#thread_area').val();
                                 //    ajax call 
                                  e.preventDefault();
                                 var postData = {action: 'update_thread', thread_id: thread_id,thread_data:thread_data};
                                 CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                  
                                      var html =thread_data;
                                        var viewableText = $("<div id='thread_data_div'>");
                                        viewableText.html(html);
                                        $('.update_thread_btn').remove();
                                        $('#thread_area').replaceWith(viewableText);
                                 
                                   
                                });
   
});

///////////// Deleting Comments ///////////////////////
$(".delete_comment").click(function(){
   var comment_id=$(this).attr('id');
   var postData = {action: 'delete_thread_comment',comment_id:comment_id};
                                 CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                  var wrapper=".wrapper_"+comment_id;
                                  $(wrapper).fadeOut();  
                                });
    });


///////////// Editing Comments ///////////////////////
$(".edit_comment").click(function(e){
     e.preventDefault();
    var id=$(this).attr('id');
    var cdiv="#comment_div_"+id;
    var fm="#forum_main_"+id;
    var divHtml = $(cdiv).html();
    var editableText = $("<textarea id='comment_area'  style='overflow: hidden; word-wrap: break-word; resize: horizontal; height: 100px;' rows='3' cols='5' name='comment_body' class='form-control  required' />");
    editableText.val(divHtml);
    $(cdiv).replaceWith(editableText);
   if($('.update_comment_btn').length==0){
    var button=$("<input type='submit' name='update_comment' value='Save' id='"+id+"'  class='btn btn-primary update_comment_btn'>");
    $(fm).append(button);
    }
    });



$(document).on('click','.update_comment_btn',function(e){
                                
                                 var comment_id=$(this).attr('id');
                               
                                 var cdiv="comment_div_"+comment_id;
                                 var thread_id=$('#id_field').val(); 
                                 var comment_data=$('#comment_area').val();
                                 //    ajax call 
                                  e.preventDefault();
                                 var postData = {action: 'update_thread_comment', thread_id: thread_id,comment_id:comment_id,comment_data:comment_data};
                                 CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                  
                                      var html =comment_data;
                                        var viewableText = $("<div id='"+cdiv+"'class='comment_data'>");
                                        viewableText.html(html);
                                        $('.update_comment_btn').remove();
                                        
                                        $('#comment_area').replaceWith(viewableText);
                                 
                                   
                                });
   
});


///////////// Deleting Thread ///////////////////////
$(".delete_thread").click(function(){
   var thread_id=$(this).attr('id');
   var postData = {action: 'delete_thread',thread_id:thread_id};
                             if(confirm("Are you sure you want to delete this thread?"))
    {
         CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                  window.location.href = "forum.php";
                                });
      
    }        
    return false;    
                           
    });



</script>
  