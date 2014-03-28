<?php require("header.php");

include("cms_process.php");




?>

<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>
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
                        <li class="current"> <a href="cms.php" title="">Site Setting</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Admin CMS Setting</h3>  <span>List of CMS </span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Admin CMS List</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="cms" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Email:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="email" value="<?=$email;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Individual Account Charges:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="ind_charges" value="<?=$ind_charges;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Corporate Account Charges:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="company_charges" value="<?=$company_charges;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Adv.  Charges:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="adv_charges" value="<?=$adv_charges;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Feature Charges:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="feature_charges" value="<?=$feature_charges;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Lising Charges:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="listing" value="<?=$listing;?>"id="spinner-default" class="form-control required">
                                        </div>
										
										
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="submit" value="Update" name="account" class="btn btn-sm btn-primary"/> 
										</div>
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