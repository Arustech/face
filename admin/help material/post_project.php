<?php require("header.php");
$obj_tend = $main->load_model('Tender');
include("project_process.php");



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
<?php require ('top-nav.php')?>    
    <div id="container">
  <?php require ('sidebar.php')?>	
        <div id="content">
            <div class="container">
			
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                        </li>
                        <li class="current"> <a href="post_project.php" title="">Project</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
					
                        <h3>Project</h3>  <span><?=$page_text?></span> 
						
                    </div>
					                    
                </div>
				                 <div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i><?=$table_heading?></h4> 
                            </div>
                            <div class="widget-content">
                                <form id="project" class="form-horizontal row-border" action="#" method="POST"  enctype="multipart/form-data" >
								<div class="form-group">
                                        <label class="col-md-2 control-label">Project No : <span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control required" id="spinner-default" id="proj_no" name="proj_no" value="<?=$proj_no?>" readonly="readonly"/>
                                        </div>
                                </div>
								 <div class="form-group">
                                        <label class="col-md-2 control-label">Categories :</label>
                                        
                                         <div class="col-md-3">

                                         <select name="cat" id="cat" class="form-control">
																															<option  value="-1">Select Category</option>
                                         <?=$adminProj->getCatHTML()?>
                                         </select> 
                                         <select  class="form-control" id="subcat" name="subcat">
                                         <option  value="-1">No Subcategory</option>
										
                                         </select>
                                         <button id="btn_addcat" class="btn btn-sm btn-inverse">Add</button>
                                       
                                                                    </div>
                                                                    
                                                                    
                                                                     </div>
                                                                     
                                <div class="form-group">
                                                                     
                                          <label class="col-md-2 control-label">Selected:<span class="required">*</span></label></label>
                                        <div class="col-md-10">
									   <input type="text" name="cat_data" class="form-control" id="sel_cats" value="s"  />
    								    </div>
                                                                    
                                </div>
															
								
								<div class="form-group">
                                        <label class="col-md-2 control-label">Project Subject:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control required" id="spinner-default" name="proj_subject" value="<?=$proj_subject?>"  />
                                        </div>
                                </div>

								<? if($proj_company=="" || $proj_company!='-1') {
									
								?>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Project Company:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
										<?
										if($row_id!="")
										echo $adminProj->getCompanyHtml($proj_company);
										else
										echo $adminProj->getCompanyHtml();
										
										?>		
                                        </div>
                                </div>
								<!-- if updating fronend user set company_id to -1-->
								
								<?}else
								{
								echo '<input type="hidden" name="tender_company" value="-1">';
								}?>
															
									<div class="form-group">
                                        <label class="col-md-2 control-label">Scope of work/Description:<span class="required">*</span></label>
										<div class="col-md-10">
                                            <textarea rows="5" name="proj_desc" class="form-control  wysiwyg form-control required">
											<?=$proj_desc?></textarea>
                                        </div>
										
									</div>	
								
								<div class="form-group">
                                        <label class="col-md-2 control-label">Estimated Budget:</label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control" id="spinner-default" name="proj_budget" placeholder="Amount in QR" value="<?=$proj_budget?>"/>
                                        </div>
                                </div>
								
								
								<div class="form-group">
                                        <label class="col-md-2 control-label">Project Bond:</label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control" id="spinner-default" name="proj_bond" placeholder="Amount in QR" value="<?=$proj_bond?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Project fees:</label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control" id="spinner-default" name="proj_fees" placeholder="Amount in QR" value="<?=$proj_fees?>"/>
                                        </div>
                                </div>	
								<div class="form-group">
                                        <label class="col-md-2 control-label">Bid Closing Date:</label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control datepicker"  name="proj_close_date" placeholder="YYYY-MM-DD" value="<?=$proj_close_date?>"/>
											
                                        </div>
								

                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">How would you like to be contacted:</label>
                                        <div class="col-md-10 input-width-large">
                                          By Email:  <input type="email" class="form-control "  name="proj_email" placeholder="stay if dont like" value="<?=$proj_email?>"/>
										  By Phone:  <input type="phone" class="form-control "  name="proj_phone" placeholder="stay if dont like" value="<?=$proj_phone?>"/>
											
                                        </div>
										
										
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="hidden" value="<?=$row_id?>" name="row_id" class="btn btn-sm btn-primary"/> 
										
										<input type="submit" value="<?=$btn_name?>" name="<?=$btn_name?>" class="btn btn-sm btn-primary"/> 
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


$('#sel_cats').tagsinput({
itemValue: 'value',
itemText: 'text'
});

	<?echo $obj_tend->getEditCat($category_id);?>

				

			
		

			jQuery.validator.addMethod("checkCategory", function(cats) {

			var isSuccess = false;
			var cats_inputs = $("#sel_cats").val();
			
			
			
		
				if(cats_inputs=='')
				{
				isSuccess =false;	

								
				}
				else 
				{
				isSuccess =true;	
					
				}
								
				
				
				
			return isSuccess;
				
			
			},"Please select Category");
		
		
	
	$('#cat').change(function(e){
		
		
		var catid = $(this).val();
		if(catid == -1)
		{
			$('#subcat').html('<option  value="-1">No Subcategory</option>');
		}
		else 
		{
		
		postData = {'cat_id':catid};
		CallAjax('',postData,'a_ajax.php', function callBack(data){
		
		$('#subcat').html(data);
					
			
			});
		
		
		}
		
	});
	
	
	
	
	
	$('#btn_addcat').click(function(e) {
		
        e.preventDefault();
		
		var val  = $('#cat option:selected').val();
		if(val !=-1)
		{
		
var val_sub = $('#subcat option:selected').val();
      if(val_sub !=-1)
	  {
		  var txt_sub = $('#subcat option:selected').text();
  		$('#sel_cats').tagsinput('add', { "value": val_sub , "text": txt_sub  });
		  
	  }
		else
		{
		
		var text =$('#cat option:selected').text();
  		$('#sel_cats').tagsinput('add', { "value": val , "text": text});
		
		}
		}


		
		
    });
    $.extend($.validator.defaults, {
        invalidHandler: function (c, a) {
            var d = a.numberOfInvalids();
            if (d) {
                var b = d == 1 ? "You missed 1 field. It has been highlighted." : "You missed " + d + " fields. They have been highlighted.";
                noty({
                    text: b,
                    type: "error",
                    timeout: 2000
                })
            }
        }
    });
  
    $(".datepicker").datepicker({
        defaultDate: +7,
        showOtherMonths: true,
        autoSize: true,
       dateFormat: "yy-mm-dd"
    });
	
	
	
	
				////////////////////////////////////////////////validation Engine
		$("#project").validate({
			

		    rules: {
			
			
			selected_cats: {checkCategory:true}
			
			}
		
	}); //Validate Engine Ends
	
	
	
	
});// ready ends
  

  
  
  
  </script>
  
  
</body>

</html>