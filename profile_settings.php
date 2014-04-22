<link href="plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet">
<script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>
<?php
$extra = $main->load_model('Extra');
if (isset($_POST['btn_settings'])) {
   
   
   $noti_setting = $_POST['noti'];
   $extra ->save_noti_settings($noti_setting,$user['user_id']);
   $main->show_tab('tab_settings');
}


?>

<div class="wrapper_basic">
   <form action="profile.php" method="POST" name="frm_settings" id="frm_settings">

      <div class="form-group" style="margin-bottom: 5px">
         <p for="Institute" class="col-lg-4 control-label">Get Notifications</p>
         <div class="col-lg-8">
            <select name="noti"  class="form-control required">
               <?php 
               if($user['user_noti']==1){
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
<script type="text/javascript">
   $(function() {
      
      
      var json =<?=$json_hobbies?>;
      
      
      $('#hobby_id').tagsinput({
         itemValue: 'value',
         itemText: 'text'

      });
      var elt = $('#hobby_id').tagsinput('input');
      elt.prop('readonly', 'readonly');
      $.each(json, function(idx, obj) {
	 $('#hobby_id').tagsinput('add', { "value": obj.value, "text": obj.text });
}); 

      
      
      
      $('[name=hobbies]').change(function(){
      $('#hobby_id').tagsinput('add', { "value": $(this).val(), "text": $('[name=hobbies] option:selected').text() });
      });


   });
</script>