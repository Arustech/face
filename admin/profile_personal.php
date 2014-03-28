<?php 
require("header.php");
$page_name	= 'contact_member';
include("personal_process.php");
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
                        <li class="current"> <a href="post_tender.php" title="">Profile Personal info</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
					
                        <h3>Profile Personal Info</h3>  <span><?=$page_text?></span> 
						
                    </div>
					                    
                </div>
				                 <div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Member's Personal Information</h4> 
                            </div>
	<div class="widget-content">
		
		<form id="personal_member" class="form-horizontal row-border" action="#" method="POST"  enctype="multipart/form-data" >
		
<!--		<div class="form-group">
				<label class="col-md-2 control-label">Activities : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="activities" class="auto form-control "><? //$activities?></textarea>
				</div>
		</div>-->
		
		<div class="form-group">
				<label class="col-md-2 control-label">Favorite Music : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="favorite_music" class="auto form-control "><?=$favorite_music?></textarea>
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-md-2 control-label">Favorite Tv Shows : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="favorite_tv_shows" class="auto form-control "><?=$favorite_tv_shows?></textarea>
				</div>
		</div>

		
		<div class="form-group">
				<label class="col-md-2 control-label">Favorite Movies : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="favorite_movies" class="auto form-control "><?=$favorite_movies?></textarea>
				</div>
		</div>
		
		
		<div class="form-group">
				<label class="col-md-2 control-label">Favorite Books : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="favorite_books" class="auto form-control "><?=$favorite_books?></textarea>
				</div>
		</div>

		
		<div class="form-group">
				<label class="col-md-2 control-label">Favorite Quotes : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="favorite_quotes" class="auto form-control "><?=$favorite_quotes?></textarea>
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-md-2 control-label">About Me : <span class="required">*</span></label>
				<div class="col-md-10">
				  <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="about_me" class="auto form-control "><?=$about_me?></textarea>
				</div>
		
			<div class="col-md-4" style="float:right;margin-top:5px;">


				<input type="hidden" value="<?=$user_id?>" name="user_id" />
				<input type="hidden" value="<?=$personal_id?>" name="personal_id" />
				
				
				<input type="submit" value="<?=$btn_name?>" name="personal_update" class="btn btn-sm btn-primary"/> 
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