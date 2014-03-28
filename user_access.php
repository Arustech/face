<?php
include("lib/Main.php");
$main= new Main();
$member = $main->load_model('Member');
$obj_user = $main->load_model("User");
$user = $member->check_user();


   
$access_option = "";
if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='user_access')
{
  $access_option  = $_REQUEST['access_option'];
}
//$friends = $member->get_friends($user['user_id']);

?>

<div class="wrapper_basic" style="width:300px;">
   <form action="" method="POST" name="frm_edu" id="frm_edu">

      <div class="form-group" style="margin-bottom: 5px">
         <p for="Institute" class=" control-label">Select Users</p>
         <div class="">
            <select name="friends"  class="form-control required">
               <option  value="-1">Select Friends</option>
               <?=$member->get_friends_html($user['user_id'],$access_option)?>
            </select> 

         </div>
         <div class="clear"></div>    
      </div>
      <div class="form-group" style="margin-bottom: 5px">
         
          <div class=""><input id="friend_id"  name="user_access"   value=""   type="text"  class="form-control required"></div>
         <div class="clear"></div>    
      </div>
      <div style="display:block;height: 15px;"></div>

      <div class="" style="margin-left:40%;">
          <div class="submit"><button type="button" name="btn_access" id="btn_access" class="btn btn-primary">Proceed</button></div>
      </div>

   </form>
</div>
<script type="text/javascript">
   $(function() {
      
      
    
      
      
      $('#friend_id').tagsinput({
         itemValue: 'value',
         itemText: 'text'

      });
         
      
      $('[name=friends]').change(function(){
       if($(this).val()!="-1"){   
      $('#friend_id').tagsinput('add', { "value": $(this).val(), "text": $('[name=friends] option:selected').text() });
       authorize    = $("#friend_id").val();  
       $("#selected_users").val(authorize);
        }
      });


   });
</script>