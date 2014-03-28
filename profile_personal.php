<!--<link rel="stylesheet" href="plugins/tags/bootstrap-tagsinput.css">
<script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>-->
<style>
   /*.bootstrap-tagsinput {
    background-color: #FFFFFF;
    border: 1px solid #C9ECF5;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555555;
    display: inline-block;
    line-height: 22px;
    margin-bottom: 6px;
    max-width: 100%;
    padding: 1px 6px;
    vertical-align: text-bottom;
    width: 277px;
    font-size: 16px;
    font-weight: 50;
    font-family: ;*/
}
   
</style>
<?php
if(isset($_POST['btn_personal']))
{
   $work_->update_profile_personal($main->unsetA($_POST,'btn_personal'),$user['user_id']); 
   $main->show_tab('tab_personal');
}
$personal = $work_->get_personal_data($user['user_id']);
?>

<div class="wrapper_basic">


    <form action="" method="POST" name="frm_personal" id="frm_personal">
        <div class="form-group">
               <p for="favorite_music" class="col-lg-4 control-label">Favorite Music:</p>
               <div class="col-lg-8"><input id="favorite_music"  value="<?=$personal['favorite_music']?>" placeholder="Your  favourite music"  name="favorite_music" type="text" data-role="tagsinput"  class="form-control required"></div>
               <div class="clear"></div>
        </div>
           
        <div class="form-group">
           <p for="favorite_tv_shows" class="col-lg-4 control-label">Tv Shows:</p>
                 <div class="col-lg-8"><input id="favorite_tv_shows" value="<?=$personal['favorite_tv_shows']?>" placeholder="Your  favourite Tv shows" name="favorite_tv_shows" type="text"  class=" form-control required"></div>
            <div class="clear"></div>
        </div>
        
        <div class="form-group">
           <p for="favorite_movies" class="col-lg-4 control-label">Favorite Movies:</p>
                 <div class="col-lg-8"><input id="favorite_movies" value="<?=$personal['favorite_movies']?>" placeholder="Your  favourite movies" name="favorite_movies" type="text"  class="form-control required"></div>
            <div class="clear"></div>
        </div>                

        
        <div class="form-group">
           <p for="favorite_books" class="col-lg-4 control-label">Favorite Books:</p>
                 <div class="col-lg-8"><input id="favorite_books" value="<?=$personal['favorite_books']?>" name="favorite_books" placeholder="Your  favourite books"type="text" class=" form-control required"></div>
            <div class="clear"></div>
        </div>        
             
        <div class="form-group">
           <p for="favorite_quotes" class="col-lg-4 control-label">Favorite Quotes:</p>
                 <div class="col-lg-8"><input id="favorite_quotes" value="<?=$personal['favorite_quotes']?>" name="favorite_quotes" placeholder="Your  favourite quotes" type="text"class=" form-control required"></div>
            <div class="clear"></div>
        </div>        
        
        
        <div class="form-group">
           <p for="about_me" class="col-lg-4 control-label">About Me:</p>
                 <div class="col-lg-8">
                    <textarea placeholder="Brief description about yourself"   class="form-control" name="about_me" id="about_me"><?=$personal['about_me']?></textarea>
                 </div>
            <div class="clear"></div>
        </div>  
            
        <div style="display:block;height: 15px;"></div>

           <div class="col-lg-12">
               <div class="submit"><button type="submit" name="btn_personal" class="btn btn-primary">Submit</button></div>
            </div>

      </form> 	

</div>
<script type="text/javascript">

$(function(){
 //$(".tags").tagsinput('items');
   
});
</script>

