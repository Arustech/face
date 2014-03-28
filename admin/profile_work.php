<?php 
require("header.php");
$page_name	= 'contact_member';
include("work_process.php");

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
                        <li class="current"> <a href="post_tender.php" title="">Member's Work info</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
					
                        <h3>Member's Work Info</h3>  <span><?=$page_text?></span> 
						
                    </div>
					                    
                </div>
				                 <div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Member's Work Information</h4> 
                            </div>
	<div class="widget-content">
		
		<form id="contact_member" class="form-horizontal row-border" action="#" method="POST"  enctype="multipart/form-data" >
		
		<div class="form-group">
				<label class="col-md-2 control-label">Company Name : <span class="required">*</span></label>
				<div class="col-md-10 input-width-large">
					<input type="text" class="form-control required"  id="company_name"name="company_name" value="<?=$company_name?>"/>
				</div>
		</div>
		
<!--		<div class="form-group">
				<label class="col-md-2 control-label">Job type : <span class="required">*</span></label>
				<div class="col-md-10 input-width-large">
					<input type="text" class="form-control required"  id="job_type"name="job_type" value="<?=$job_type?>"/>
				</div>
		</div>-->
		
		<div class="form-group">
				<label class="col-md-2 control-label">Position : <span class="required">*</span></label>
				<div class="col-md-10 input-width-large">
					<input type="text" class="form-control required"  id="position"name="position" value="<?=$position?>"/>
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-md-2 control-label">Description : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="description" class="auto form-control "><?=$description?></textarea>
				</div>
		</div>
		
				
		<div class="form-group">
		<label class="col-md-2 control-label">Country : </label>
		<div class="col-md-10 input-width-large">
		<select name="country"  class="form-control required">
			<option  value="">Select Country</option>
			
		<?php 
      
    $select = $country_id!=''?$country_id:false;
    echo $obj_profile->getCountryHtml($select);
              
              ?>		   
												   
		 </select> 
		</div>
        </div>
		
<!--		<div class="form-group">
			<label class="col-md-2 control-label">State/Province : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="state_province" name="state_province" value="<?//$state_province?>"/>
			</div>
		</div>-->
		
		
<!--		<div class="form-group">
			<label class="col-md-2 control-label">City : <span class="required">*</span></label>
			<div class="col-md-10 input-width-large">
				<input type="text" class="form-control required"  id="city" name="city" value="<?//$city?>"/>
			</div>
		</div>-->
		
	<!--		<div class="form-group">
			<label class="col-md-2 control-label">Current Job : <span class="required">*</span></label>
		<div class="col-md-10 input-width-large">
			<select name="current_job"  class="form-control required">
			<option  value="">Select One</option>
			<?php /*	$arr	= array('yes','no');
			foreach($arr as $ar)
			{
			$selected = "";
			if($current_job)
			{
			if($current_job ==$ar)
			$selected ="selected";
			}
			echo "<option $selected value='".$ar."' >".$ar."</option>";
			}
			*/?>
											   
			</select> 
			</div>-->
	
<div class="form-actions last">
			<div class="col-md-4">


				<input type="hidden" value="<?=$user_id?>" name="user_id" />
				<input type="hidden" value="<?=$work_id?>" name="work_id" />
				
				
				<input type="submit" value="<?=$btn_name?>" name="work_update" class="btn btn-sm btn-primary"/> 
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