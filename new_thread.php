<?php require('header.php');
$forum_obj=$main->load_model('Forums');


?>
 <script type="text/javascript" src="plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript" src="plugins/ckeditor/ckfinder/ckfinder.js"></script>
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
</style>

<div class="to_heading">
    
    <h2 class="headtext">Forum</h2>
    
    
</div>

<div class="container wrapper1" style="display:flex;display:-ms-flexbox;">
  

 
    <form method="post" action="thread_reply.php" name="new_thread">     
        <input class="inputs hidden" type="text" name="topic_id" value="<?=$_REQUEST['id']?>"> 
    <div class="row adjustment info_content" style="width:100%;margin-top:20px">    
        <h4 style="margin-left:16px">Post New Thread</h4> 
        
        <div style="margin-left:15px">
        <span class="labels">*Title</span><br>
        <input class="inputs" type="text" name="thread_title"> 
        <br><br>
        <span class="labels">*Message</span><br>
        <div style="margin-bottom:20px">
         <textarea id="SBSFull" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 200px;" rows="3" cols="5" name="thread_data" class="form-control  required"></textarea>
      </div>
        
       
       
        <span class="labels">*Topic</span><br>
        <input class="inputs" type="text" name="thread_topic"> 
        </div>
        
       <br>
       <button style="margin-left: 15px" class="btn btn-primary" name="save_new_thread" type="submit">Save </button>
    
        
     <div class="row spacing">
              <!--content would be generated here-->
            
            </div>
            
 </div>

</form> 

            
          </div>  
        
     

<?php include('footer.php') ?>

   
<script>
    $(document).ready(function(){


//App.init();Plugins.init();FormComponents.init()
if($('#SBSFull').length > 0){
		var editor_en = CKEDITOR.replace('SBSFull', { height:"250", width:"98%", toolbar:'SBSFull', resize_enabled:false });
		CKFinder.SetupCKEditor(editor_en, 'ckeditor/ckfinder/');
	}



});
</script>
  