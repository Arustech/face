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
                        <h3>Adv. CMS Setting</h3>  <span>List of CMS </span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Adv. List</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="cms" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   
									 <div class="form-group">
										<label class="col-md-2 control-label">Embed Frontpage Video:</label>
                                        
										<div class="col-md-10">
                                            <textarea rows="5" name="side" class="form-control required">
											<?=$obj_cms->getAdvHtml('side')?></textarea>
                                        </div>		
										
                                       
                                        
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Url:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="adv_url" value="<?=$obj_cms->getAdvHtml('bottom_url')?>" class="form-control" />
											
                                        </div>
                                       
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Upload Footer Banner:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="bottom" />
											<?echo $obj_cms->getAdvHtml('bottom');?>
                                        </div>
                                       
									</div>
									<div class="form-group">
									
                                        <div class="col-md-4" style="float:right;margin-top:5px;">
										<br>
										<input type="submit" value="submit" name="adv" class="btn btn-sm btn-primary"/> 
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