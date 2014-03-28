<?php require("header.php");
$obj_tend = $main->load_model('Tender');
$user_type='corp';
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
<?php require ('top-nav.php')?>    
    <div id="container">
  <?php require ('sidebar.php')?>	
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
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
					
                        <h3>Member</h3>  <span><?=$page_text?></span> 
						
                    </div>
					
					<div class="page-title" style="float:right !important;">
					
                        <h3>Member</h3>  <span><?=$page_text?></span> 
						
                    </div>
					                    
                </div>
				                 <div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Corporate Member</h4> 
                            </div>
                            <div class="widget-content">
                                <form id="ind_member" class="form-horizontal row-border" action="#" method="POST"  enctype="multipart/form-data" >
								<?if(isset($_GET['mod']) && $_GET['mod']=='edit') {}else{?>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Username : <span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control required" id="spinner-default" id="user_name"name="user_name" value=""/>
                                        </div>
                                </div>
								<?}?>
								<div class="form-group">
                                        <label class="col-md-2 control-label">User Email : <span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="email" class="form-control required" id="spinner-default" id="tender_no" name="user_email" value="<?=$user_email?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Password : <span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="password" class="form-control <?$required?>" id="spinner-default" id="tender_no" name="user_pass" value=""/>
                                        </div>
                                </div>
								
								<div class="form-group">
                                        <label class="col-md-2 control-label">Company Title :</label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="tender_no" name="company_title" value="<?=$company_title?>"/>
                                        </div>
                                </div>
								 <div class="form-group">
                                        <label class="col-md-2 control-label">Industry :</label>
                                        
                                         <div class="col-md-3">

                                         <select name="cat" class="form-control cat">
                                         <option  value="-1">Select Industry</option>
                                         <?=$adminProj->getCatHTML()?>
                                         </select> 
                                         <select  class="form-control subcat"  name="subcat">
                                         <option  value="-1">Select Nested Industry</option>
										
                                         </select>
                                         <button  id="1" class="btn btn-sm btn-inverse btn_addcat">Add</button>
                                       
                                                                    </div>
                                                                    
                                                                    
                                 </div>
                                                                     
                                <div class="form-group">
                                                                     
                                          <label class="col-md-2 control-label">Selected:<span class="required">*</span></label></label>
                                        <div class="col-md-10">
									   <input type="text" id='sel_cats1'  name="ind_data" class="form-control"  value=""  />
    								    </div>
                                                                    
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Field Of Interest :</label>
                                        
                                         <div class="col-md-3">

                                         <select name="cat" class="form-control cat">
                                         <option  value="-1">Select Industry</option>
                                         <?=$adminProj->getCatHTML()?>
                                         </select> 
                                         <select  class="form-control subcat"  name="subcat">
                                         <option  value="-1">Select Nested Industry</option>
										
                                         </select>
                                         <button  id='2'  class="btn btn-sm btn-inverse btn_addcat">Add</button>
                                       
                                                                    </div>
                                                                    
                                                                    
                                 </div>
                                                                     
                                <div class="form-group">
                                                                     
                                          <label class="col-md-2 control-label">Selected:<span class="required">*</span></label></label>
                                        <div class="col-md-10">
										<input type="text" id='sel_cats2'  name="int_data" class="form-control"  value=""  />
    								    </div>
                                                                    
                                </div>
								
								<div class="form-group">
                                        <label class="col-md-2 control-label">Type of Establishment :</label>
                                        <div class="col-md-10 input-width-large">
                                        <select name="company_type"  class="form-control required">
                                            <option  value="">Select Type</option>
                                            
										<?=$obj_member->getDropdownHtml('estb_type',$company_type)?>	
                                                                                   
                                         </select> 
                                        </div>
                                </div>	
								<div class="form-group">
                                        <label class="col-md-2 control-label">Company Location : </label>
                                        <div class="col-md-10 input-width-large">
                                        <select name="company_loc"  class="form-control required">
                                            <option  value="">Select Location</option>
											
										<?=$obj_member->getDropdownHtml('loc',$company_loc)?>
                                           
                                                                                   
                                         </select> 
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Year of Establishment : </label>
                                     <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="company_estb_year" value="<?=$company_estb_year?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Capital of Establishment : </label>
                                     <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="company_estb_capital" value="<?=$company_estb_capital?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Company Grade : </label>
										<div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="company_grade" value="<?=$company_grade?>"/>
                                        </div>
								</div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Quality Management Certifications  : </label>
										<div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="company_cer" placeholder="Can add more than one certificate
											1-	ISO 9001
											2-	etc….
											" value="<?=$company_cer?>"/>
                                        </div>
								</div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">No. of Employees :</label>
										<div class="col-md-10 input-width-large">
                                         		
										<select name="company_emp"  class="form-control">
										<option  value="">Select Range</option>
                                        <?=$obj_member->getDropdownHtml('emp',$company_emp)?>			
										</select> 
                                        </div>
								</div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Company Profile Summary  : </label>
										<div class="col-md-10">
											<textarea class="auto form-control " name="company_profile" cols="5" rows="3" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"><?=$company_profile?></textarea>
                                        </div>
								</div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Address:</label>
										<div class="col-md-10">
                                            <textarea class="auto form-control " name="co_address" cols="5" rows="3" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"><?=$address?></textarea>
                                        </div>
									</div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">P.O Box :</label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="tender_no" name="co_pbox" value="<?=$pbox?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Phone No : </label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="co_phone" value="<?=$phone?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Extra Phone No : </label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="co_extra_phone" value="<?=$extra_phone?>"/>
                                        </div>
                                </div>	
								<div class="form-group">
                                        <label class="col-md-2 control-label">Contact Person  Name: </label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="co_contact" value="<?=$contact?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Contact Person  Designation: </label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="" name="co_contact_des" value="<?=$contact_des?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Website Url : </label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="tender_no" name="co_website" value="<?=$website?>"/>
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Video Url : </label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" class="form-control " id="spinner-default" id="tender_no" name="company_video" value="<?=$company_video?>"/>
                                        </div>
                                </div>		
								 <div class="form-group">
									<label class="col-md-2 control-label">Upload docs:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="file"  accept="application/msword,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document"   />
											<?=$docs?>
                                        </div>
                                      									
									</div>	
									<div class="form-group">
									<label class="col-md-2 control-label">Upload Picture:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="image"  />
                                        </div>
										<? if(!empty($pic)){ 
										echo '<img src="'.$main->config['upload_url'].$pic.'" width="100" height="100"/>';
                                      	}?>								
									</div>	
									<div class="form-group">
									<label class="col-md-2 control-label">I agree on terms & conditions</label>
                                        <div class="col-md-6">
                                            <input type="checkbox" class="form-control required" name="term" />
                                        </div>
                                      		
	<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="hidden" value="<?=$pic?>" name="company_photo" /> 
										<input type="hidden" value="<?=$docs?>" name="company_docs" /> 
										<input type="hidden" value="<?=$user_id?>" name="user_id" /> 
										
										<input type="hidden" value="company" name="user_type" /> 
										
										<input type="submit" value="<?=$btn_name?>" name="<?=$btn_name?>" class="btn btn-sm btn-primary"/> 
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


$('#sel_cats1').tagsinput({
itemValue: 'value',
itemText: 'text'
});

<?echo $obj_tend->getEditCat($ind_data,'sel_cats1');?>

$('#sel_cats2').tagsinput({
itemValue: 'value',
itemText: 'text'
});
<?echo $obj_tend->getEditCat($int_data,'sel_cats2');?>
	

				jQuery.validator.addMethod("checkUsername", function(username) {

			var isSuccess = false;
			var data = {'user_name':username};

			CallAjaxJ('',data,'a_ajax.php<?if (isset($_GET['user_id']))echo '?user_id='.$_GET['user_id'];?>', function callback(data) 
				{
      
				if(data.value==1)
				{
				isSuccess =true;	

								
				}
				else 
				{
				isSuccess =false;	
				}
								
				
				}
				);
			return isSuccess;
				
			
			},"USername already exists");
			
		

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
		
		
	
	$('.cat').change(function(e){
		
		var cat_obj = $(this);
		var catid = cat_obj.val();
		var next_sub = $(cat_obj).next();
		
		if(catid == -1)
		{
			cat_obj.html('<option  value="-1">No Subcategory</option>');
		}
		else 
		{
		
		postData = {'cat_id':catid};
		CallAjax('',postData,'a_ajax.php', function callBack(data){
		next_sub.html(data);
					
			
			});
		
		
		}
		
	});
	
	
	
	
	
	$('.btn_addcat').click(function(e) {
		   e.preventDefault();
		var cat = $(this).prev().prev();
		var subcat = $(this).prev();
		
		
		var btn_id = $(this).prop('id');
		var tag_i = $('#sel_cats'+btn_id);
		
		
		
     
		
		var val  = cat.find(':selected').val();
		
		
		if(val !=-1)
		{
		
var val_sub = subcat.find(':selected').val();
      if(val_sub !=-1)
	  {
		  var txt_sub = subcat.find(':selected').text();
  		tag_i.tagsinput('add', { "value": val_sub , "text": txt_sub  });
		  
	  }
		else
		{
		
		var text =cat.find(':selected').text();
  		tag_i.tagsinput('add', { "value": val , "text": text});
		
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
		$("#ind_member").validate({
			

		    rules: {
			
			user_name: {checkUsername:true},
			selected_cats: {checkCategory:true}
			
			}
		
	}); //Validate Engine Ends
	
	
	
	
});// ready ends
  

  
  
  
  </script>
  
  
</body>

</html>