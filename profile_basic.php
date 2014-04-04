<?php
$basic_ = $main->load_model('BasicProfile');
   
if(isset($_POST['btn_basic']))
{
$basic_->update_profile($main->unsetA($_POST,'btn_basic'),$user['user_id']); 
$main->show_tab('tab_basic');
}

$basic =$basic_->getBasicProfileByID($user['user_id']);


?>
<script type="text/javascript">
   $(function() {
      $('#frm_basic').validate(
              {
                 onkeyup: false,
                 rules: {
                    
                   user_name: {
                       required: true,
                       remote: {
                          param: {
                             url: "ajax.php",
                             type: "post",
                             data: {
                                user_name: function() {
                                   return $('#user_name').val();
                                },
                                action: 'check_user_already'

                             }},
                          depends: function() {
                             return $('#user_name').val() !== "<?= $user['user_name'] ?>";
                          }
                       }
                    },
                    
                    user_email: {
                       required: true,
             email: true,
                       remote: {
                          param: {
                             url: "ajax.php",
                             type: "post",
                             data: {
                                user_email: function() {
                                   return $('#user_email').val();
                                },
                                action: 'check_email_already'

                             }},
                          depends: function() {
                             return $('#user_email').val() !== "<?= $user['user_email'] ?>";
                          }
                       }
                    }
                 },
                 errorPlacement: function(error, element) {
                    if (element.attr("type") == "radio")
                    {
                       error.insertBefore('#gender-list');

                    }
                    else
                    {
                       error.insertAfter(element);
                    }
                 },
                 messages: {
                    user_name: {remote:'This username already exists',required: 'Please enter your username'},
                    first_name: {required: 'Please enter your first name'},
                    last_name: {required: 'Please enter your last name'},
                    user_email: {required: 'Please enter your email address', remote: 'This email already exists'},
                    user_pwd: {required: 'Please specify your password'},
                    gender: {required: 'Please select your gender'}
                 }
              }

      );
   });
</script>


<div class="wrapper_basic">


   <form action="profile" method="POST" name="frm_basic" id="frm_basic">
      <div class="form-group" style="margin-bottom: 5px">
         <p for="User Name" class="col-lg-4 control-label">User Name:</p>
         <div class="col-lg-8"><input id="user_name" name="user_name"  value="<?=$user['user_name']?>" type="text" class="form-control required"></div>
         <div class="clear"></div>    
      </div>
      <div class="form-group" style="margin-bottom: 5px">
         <p for="First Name" class="col-lg-4 control-label">First Name:</p>
         <div class="col-lg-8"><input id="user_first_name" name="first_name" type="text" value="<?=ucfirst($basic['first_name'])?>" class="form-control required"></div>
         <div class="clear"></div>    
      </div>
      <div class="form-group">
         <p for="Last Name" class="col-lg-4 control-label">Last Name:</p>
         <div class="col-lg-8"><input id="user_last_name" name="last_name" type="text" value="<?=ucfirst($basic['last_name'])?>" class="form-control required"></div>
         <div class="clear"></div>
      </div>
      
       <div class="form-group">
         <p for="Birthday" class="col-lg-4 control-label">Birthday:</p>
         <div class="col-lg-8"><input id="birthday" name="birthday" type="text" value="<?=$basic['birthday']?>" class="form-control required mydatepicker"></div>
         <div class="clear"></div>
      </div>
      <div class="form-group">
         <p for="Your Email" class="col-lg-4 control-label">Your Email:</p>
         <div class="col-lg-8"><input id="user_email" name="user_email" type="email" value="<?=$user['user_email']?>"  class=" form-control required"></div>
         <div class="clear"></div>
      </div>

      <div class="form-group">
         <p for="Your Password" class="col-lg-4 control-label">Your Password:</p>
         <div class="col-lg-8"><input id="user_pwd" name="user_pwd" value="" placeholder="Enter new password to change" type="password" s class="form-control"></div>
         <div class="clear"></div>
      </div>

      <div class="form-group">
         <p for="religion" class="col-lg-4 control-label">Religion:</p>
         <div class="col-lg-8">
            <select name="religion" class="select form-control" id="religion">
               <option value="Unspecified">Please select</option>
              <?=$basic_->getBasicDropdownHtml('religion',$basic['religion'])?>
            </select>
         </div>
         <div class="clear"></div>  
      </div>
      
      <div class="form-group">
         <p for="relation" class="col-lg-4 control-label">Status:</p>
         <div class="col-lg-8">
            <select name="relation" class="select form-control" id="relation">
               <option value="Unspecified">Please select</option>
              <?=$basic_->getBasicDropdownHtml('relation',$basic['relation'])?>
            </select>
         </div>
         <div class="clear"></div>  
      </div>
      
       <div class="form-group">
         <p for="lookingfor" class="col-lg-4 control-label">Looking for:</p>
         <div class="col-lg-8">
            <select name="lookingfor" class="select form-control" id="lookingfor">
               <option value="Unspecified">Please select</option>
              <?=$basic_->getBasicDropdownHtml('lookingfor',$basic['lookingfor'])?>
            </select>
         </div>
         <div class="clear"></div>  
      </div>

      <div class="form-group">
         <div class="col-lg-12">
            <p class="col-lg-4 control-label" id="optionsRadio">Gender:</p>
            <div class="input col-lg-8">
 <label class="radio-inline">
                                 <input type="radio" class="uniform required" <?=$basic['gender']=='Male'?'checked':''?> style="padding:0px;margin:0px" name="gender" value="Male">
                                 <span class="radio-label">Male</span>
                              </label>
                              <label class="radio-inline">
                                 <input type="radio"  <?=$basic['gender']=='Female'?'checked':''?> class="uniform required" style="padding:0px;margin:0px" name="gender" value="Female" >
                                 <span class="radio-label">Female</span></label>
              
            </div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="col-lg-12 form-actions last">
         <div class="submit last"><button type="submit" name="btn_basic" class="btn btn-primary">Save</button></div>
      </div>
       
   </form> 	

</div>