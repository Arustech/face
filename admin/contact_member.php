<?php 
require("header.php");
$page_name	= 'contact_member';
include("contact_process.php");
?>

<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>

 <script type="text/javascript" src="plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
	
<script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>
<link href="plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>

<script src="<?=$main->config['web_path']?>assets/plugins/datepicker/jquery.ui.core.js"></script>
<script src="<?=$main->config['web_path']?>assets/plugins/datepicker/jquery.ui.widget.js"></script>
<script src="<?=$main->config['web_path']?>assets/plugins/datepicker/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?=$main->config['web_path']?>assets/plugins/datepicker/theme/jquery.ui.all.css">
<link rel="stylesheet" href="<?=$main->config['web_path']?>assets/plugins/datepicker/theme/datepicker.css">
<style>
#ui-datepicker-div{
 top: 400px !important;
    width: 200px !important;
}
</style>
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
                        <li class="current"> <a href="post_tender.php" title="">contact info</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
					
                        <h3>Contact Info</h3>  <span><?=$page_text?></span> 
						
                    </div>
					                    
                </div>
				                 <div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Member's Contact Information</h4> 
                            </div>
	<div class="widget-content">
		
		<form id="contact_member" class="form-horizontal row-border" action="#" method="POST"  enctype="multipart/form-data" >
		
		<div class="form-group">
				<label class="col-md-2 control-label">Mobile : <span class="required">*</span></label>
				<div class="col-md-10 input-width-large">
					<input type="text" class="form-control required"  id="mobile"name="mobile" value="<?=$mobile?>"/>
				</div>
		</div>
		
		
		
		<div class="form-group">
			<label class="col-md-2 control-label">Land Line : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="land_line" name="land_line" value="<?=$land_line?>"/>
			</div>
		</div>
		
		<div class="form-group">
		<label class="col-md-2 control-label">Country : </label>
		<div class="col-md-10 input-width-large">
		<select name="country_id"  class="form-control required">
			<option  value="">Select Country</option>
			
		<?=$obj_profile->getCountryHtml($country_id)?>
		   
												   
		 </select> 
		</div>
        </div>
		
		<div class="form-group">
			<label class="col-md-2 control-label">State/Province : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="state_province" name="state_province" value="<?=$state_province?>"/>
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="col-md-2 control-label">City : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="city" name="city" value="<?=$city?>"/>
			</div>
		</div>.
		
		
		<div class="form-group">
			<label class="col-md-2 control-label">Zip Code : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="zip_code" name="zip_code" value="<?=$zip_code?>"/>
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="col-md-2 control-label">Web Site : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="website" name="website" value="<?=$website?>"/>
			</div>
						
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label">Address : <span class="required">*</span></label>
			
			<div class="col-md-10">
              <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="address" class="auto form-control "><?=$address?></textarea>
            </div>	

			<div class="col-md-4" style="float:right;margin-top:5px;">


				<input type="hidden" value="<?=$user_id?>" name="user_id" />
				<input type="hidden" value="<?=$contact_id?>" name="contact_id" />
				
				
				<input type="submit" value="<?=$btn_name?>" name="contact_update" class="btn btn-sm btn-primary"/> 
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
     
$(document).ready(function () {


$(function() {
		$( "#datepicker" ).datepicker({
		defaultDate: +7,
        showOtherMonths: true,
        autoSize: true,
       dateFormat: "yy-mm-dd"
		
		});
	});

////////////////////////////////////////////////validation Engine
		$("#contact_member").validate({
			
		
			// messages: {
                // user_name:{remote:"This username already exists"},		
				// user_email:{remote:"This email already exists"},
                // },
		
	}); //Validate Engine Ends
	

	
	
});// ready ends
  

  
  
  
  </script>
  
  
</body>

</html>