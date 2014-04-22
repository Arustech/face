<link href="plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet">
<script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>
<?php
$extra = $main->load_model('Extra');
$member = $main->load_model('Member');
if (isset($_POST['btn_settings'])) {
   
   
   $noti_setting = $_POST['noti'];
   $extra ->save_noti_settings($noti_setting,$user['user_id']);
   $main->show_tab('tab_settings');
}
$userr=$member->check_user();

?>

<div class="wrapper_basic">
   <form action="profile" method="POST" name="frm_settings" id="frm_settings">

      <div class="form-group" style="margin-bottom: 5px">
         <p for="Institute" class="col-lg-4 control-label">Get Notifications</p>
         <div class="col-lg-8">
            <select name="noti"  class="form-control required">
               <?php 
               if($userr['user_noti']==1){
                   ?>   <option  value="1" selected="selected">On</option>
                        <option  value="0" >Off</option>
              <?php }
               else
               {
                 ?>   <option  value="1" >On</option>
                        <option  value="0" selected="selected">Off</option>
              <?php }  
               
               ?>
              
            </select> 

         </div>
         <div class="clear"></div>    
      </div>
     
      <div style="display:block;height: 15px;"></div>

      <div class="col-lg-12">
         <div class="submit"><button type="submit" name="btn_settings" class="btn btn-primary">Save</button></div>
      </div>

   </form>
</div>