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
                        <h3>CMS Setting</h3>  <span>List of CMS </span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> CMS List</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="cms" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Site Title:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="opt_site_title" value="<?=$opt_site_title;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Meta Keywords:<span class="required">*</span></label>
										<div class="col-md-10">
                                            <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="opt_meta_keyword" class="auto form-control required"><?=$opt_meta_keyword?></textarea>
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Meta Description:<span class="required">*</span></label>
										<div class="col-md-10">
                                            <textarea style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="opt_meta_description" class="auto form-control required"><?=$opt_meta_description?></textarea>
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Pagination Value:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="opt_pagi" value="<?=$opt_pagi;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									 <div class="form-group">
										<label class="col-md-2 control-label">Upload Site logo:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="logo" />
												<?
										if(!empty($opt_site_logo))
										{
										echo'<img src="'.$main->config['upload_url'].$opt_site_logo.'" height="100" width="100"/>';
										}
										?>
                                        </div>
                                        
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Upload Footer logo:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="footer" />
												<?
										if(!empty($opt_footer_logo))
										{
										echo'<img src="'.$main->config['upload_url'].$opt_footer_logo.'" height="100" width="100"/>';
										}
										?>
                                        </div>
                                        
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Facebook Link:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="opt_facebook" value="<?=$opt_facebook;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Twitter Link:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="opt_twitter" value="<?=$opt_twitter;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Linkdln Link:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="opt_linkdn" value="<?=$opt_linkdn;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Youtube Link:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="opt_youtube" value="<?=$opt_youtube;?>"id="spinner-default" class="form-control required">
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