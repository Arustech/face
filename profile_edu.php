<?php

if(isset($_POST['btn_edu']))
{
   $data = $main->unsetA($_POST,'btn_edu');
   $work_->update_profile_edu($data,$user['user_id']);
   $main->show_tab('tab_edu');
}
$edu = $work_->get_profile_edu($user['user_id']);
?>

<div class="wrapper_basic">
    <form action="" method="POST" name="frm_edu" id="frm_edu">
        <div class="form-group" style="margin-bottom: 5px">
        <p for="Institute" class="col-lg-4 control-label">Education's Place</p>
        <div class="col-lg-8"><input id="" name="high_school"  value="<?=$edu['high_school']?>" placeholder="Where did you go to college?" type="text"  class="form-control required"></div>
               <div class="clear"></div>    
        </div>
            <div style="display:block;height: 15px;"></div>
        
           <div class="col-lg-12">
               <div class="submit"><button type="submit" name="btn_edu" class="btn btn-primary">Submit</button></div>
            </div>

      </form>
</div>