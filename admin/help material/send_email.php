<?php require("header.php");

include("email_process.php");




?>

<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>
 <script type="text/javascript" src="plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-multiselect/bootstrap-multiselect.min.js"></script>
<body>
<?php require ('top-nav.php')?>    
    <div id="container">
  <?php require ('sidebar.php')?>	
        <div id="content">
            <div class="container">
			
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                        </li>
                        <li class="current"> <a href="send_email.php" title="">Manage Newsletter</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Manage Newsletter</h3>  <span>Send Newsletter</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Mangage Newsletter</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="cms" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Select Users:</label>
                                        <div class="col-md-10">
                                            <select class="multiselect" multiple="multiple" name="users_emails[]" style="display: none;">
                                                <?=$users_emails?>
                                            </select>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Subject:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="subject" value=""id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Message Body:<span class="required">*</span></label>
										<div class="col-md-10">
                                            <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 200px;" rows="3" cols="5" name="message" class="form-control  wysiwyg form-control required"></textarea>
                                        </div>
									
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"/> 
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
  <script type="text/javascript">
  

$(document).ready(function () {
	
				////////////////////////////////////////////////validation Engine
		$("#company").validate();
		});
  </script>
</body>

</html>