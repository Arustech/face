<?php
require("header.php");
$page_name = 'edit_member';
include("member_process.php");
?>

<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>

<script type="text/javascript" src="plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>

<script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>
<link href="plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>

<body>
   <?php require ('top-nav.php') ?>    
   <div id="container">
      <?php require ('sidebar.php') ?>	
      <div id="content">
         <div class="container">

            <div class="crumbs">
               <ul id="breadcrumbs" class="breadcrumb">
                  <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                  </li>
                  <li class="current"> <a href="post_tender.php" title="">Member</a> 
                  </li>
               </ul>

            </div>
            <?= $msg; ?>
            <div class="page-header">
               <div class="page-title">

                  <h3>Member</h3>  <span><?= $page_text ?></span> 

               </div>

            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="widget box">
                     <div class="widget-header">
                        <h4><i class="icon-reorder"></i>Add Member</h4> 
                     </div>
                     <div class="widget-content">

                        <form id="edit_member" class="form-horizontal row-border" action="#" method="POST"  enctype="multipart/form-data" >
                           <?php if(isset($_GET['mod']) && $_GET['mod']=='edit') {}else{?>

                           <div class="form-group">
                              <label class="col-md-2 control-label">Username : <span class="required">*</span></label>
                              <div class="col-md-10 input-width-large">
                                 <input type="text" class="form-control required" id="user_name" id="user_name"name="user_name" value=""/>
                              </div>
                           </div>
                           <?}?>


                           <div class="form-group">
                              <label class="col-md-2 control-label">User Email : <span class="required">*</span></label>
                              <div class="col-md-10 input-width-large">
                                 <input type="email" class="form-control required" id="user_email" id="tender_no" name="user_email" value="<?= $user_email ?>"/>
                              </div>
                           </div>



                           <div class="form-group">
                              <label class="col-md-2 control-label">Password : <span class="required">*</span></label>
                              <div class="col-md-10 input-width-large">
                                 <input type="password" class="form-control <?$required?>" id="spinner-default" id="" name="user_pwd" value=""/>
                              </div>
                           </div>
                           
                           
                         <div class="form-group">
                                        <label class="col-md-2 control-label">Account Type:</label>
                                        <div class="col-md-10">
                                            <label class="radio-inline">
                                               <input type="radio" value="business" required="" name="user_type">Business</label>
                                            <label class="radio-inline">
                                               <input type="radio"  value="personal" required="" name="user_type">Personal</label>
                                           
                                        </div>
                                    </div>



                           <div class="form-group">
                              <label class="col-md-2 control-label">Profile Picture:</label>
                              <div class="col-md-6">
                                 <input type="file" class="form-control" name="pic"  />

                                 <?= $pic ?>
                              </div>



                              <div class="col-md-4" style="float:right;margin-top:5px;">


                                 <input type="hidden" value="<?= $user_id ?>" name="user_id" />


                                 <input type="submit" value="<?= $btn_name ?>" name="<?= $btn_name ?>" class="btn btn-sm btn-primary"/> 
                              </div>				
                           </div>	









                        </form>
                     </div>
                  </div>
               </div>
            </div>


         </div>
      </div>
   </div>

</div>
</div>
</div>

<script type="text/javascript">

   $(document).ready(function() {


////////////////////////////////////////////////validation Engine
      $("#edit_member").validate({
         onkeyup: false,
         rules: {
            user_name: {
               remote: {
                  url: "ajax_func.php",
                  type: "post",
                  data: {user_name: function() {
                        return $('#user_name').val();
                     }, type: 'user_name'}
               }


            },
            user_email: {
               remote: {
                  url: "ajax_func.php",
                  type: "post",
                  data: {user_email: function() {
                        return $('#user_email').val();
                     }, type: 'user_email'}

               }


      },
         },
         messages: {
            user_name: {remote: "This username already exists"},
            user_email: {remote: "This email already exists"},
         },
      }); //Validate Engine Ends




   });// ready ends





</script>


</body>

</html>