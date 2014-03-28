<?php
require("header.php");
include("report_process.php");
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

                  <h3>Report detail</h3>  <span>Report detail</span> 

               </div>

            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="widget box">
                     <div class="widget-header">
                        <h4><i class="icon-reorder"></i>Report Detail</h4> 
                     </div>
                     <div class="widget-content">

                        <form class="form-horizontal row-border">
                           
                           <div class="form-group">
                              <label class="col-md-2 control-label">Report Date : <span class="required"></span></label>
                              <div class="col-md-10 input-width-large">
                                 <?=$report_date?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-2 control-label">Report Type : <span class="required"></span></label>
                              <div class="col-md-10 input-width-large">
                                  <?=$report_type?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-2 control-label">Submitted By : <span class="required"></span></label>
                              <div class="col-md-10 input-width-large">
                                 <?=$report_submit_by?>
                              </div>
                           </div>



                           <div class="form-group">
                             <label class="col-md-2 control-label">Content: <span class="required">*</span></label>
                              <div class="col-md-10 input-width-large">
                                  <?php
                                  
                                  echo  $adminProj->getReportContent($report_post_id);
                                  
                                  ?>
                              </div>



                              <div class="col-md-4" style="float:right;margin-top:5px;">




                                  <a href="?mod=rep_act&val=1&post_id=<?=$report_post_id?>"><input type="button" value="Accept" name="action" class="btn btn-sm btn-primary"/></a> 
                                  <a href="?mod=rep_act&val=0&post_id=<?=$report_post_id?>"><input type="button" value="Reject" name="action" class="btn btn-sm btn-primary"/></a>
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