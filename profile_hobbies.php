<link href="plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet">
<script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>
<?php
$extra = $main->load_model('Extra');
if (isset($_POST['btn_hobbies'])) {
   
   
   $hobbies = $_POST['hobby_id'];
   $extra ->add_hobbies($hobbies,$user['user_id']);
   $main->show_tab('tab_hobbies');
}
$json_hobbies = $extra->get_hobbies($user['user_id']);

?>

<div class="wrapper_basic">
   <form action="" method="POST" name="frm_edu" id="frm_edu">

      <div class="form-group" style="margin-bottom: 5px">
         <p for="Institute" class="col-lg-4 control-label">Select Hobbies</p>
         <div class="col-lg-8">
            <select name="hobbies"  class="form-control required">
               <option  value="">Select Hobbies</option>
               <?= $extra->getHobbyHtml() ?>
            </select> 

         </div>
         <div class="clear"></div>    
      </div>
      <div class="form-group" style="margin-bottom: 5px">
         <p for="Institute" class="col-lg-4 control-label">Hobbies</p>
         <div class="col-lg-8"><input id="hobby_id"  name="hobby_id"   value=""  type="text"  class="form-control required"></div>
         <div class="clear"></div>    
      </div>
      <div style="display:block;height: 15px;"></div>

      <div class="col-lg-12">
         <div class="submit"><button type="submit" name="btn_hobbies" class="btn btn-primary">Submit</button></div>
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