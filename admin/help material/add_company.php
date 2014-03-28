<?php require("header.php");
$obj_comp = $main->load_model('Company');
include("company_process.php");




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
                        <li class="current"> <a href="add_company.php" title="">Company</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3><?=$head_title?> Company</h3>  <span>Fill all fields</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i><?=$head_title?> Company</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="company" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Company Title:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="title" value="<?=$title;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Description:<span class="required">*</span></label>
										<div class="col-md-10">
                                            <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="description" class="auto form-control required"><?=$desc?></textarea>
                                        </div>
									</div>
									  <div class="form-group">
										<label class="col-md-2 control-label">Upload logo:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="file" />
												<?
										if(!empty($img))
										{
										echo'<img src="'.$main->config['upload_url'].$img.'" height="100" width="100"/>';
										}
										?>
                                        </div>
                                        <input type="hidden" name="comp_id" value="<?=$comp_id?>" />
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
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
  <script type="text/javascript">
  

$(document).ready(function () {
	
				////////////////////////////////////////////////validation Engine
		$("#company").validate();
		});
  </script>
</body>

</html>