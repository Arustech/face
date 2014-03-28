<?php require("header.php");
include("pol_process.php");


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
                        <li class="current"> <a href="news.php" title="">News</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Pol</h3>  <span>Pol Listing</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        <?

						?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Update Pol</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="list_type" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Set Question:<span class="required">*</span></label>
                                        <div class="col-md-10">
										 <input type="text" class="form-control required" id="spinner-default" value="<?=$pol_ques?>" name="pol_ques">
                                          
                                        </div>
										
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Answer 1:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control required" id="spinner-default" value="<?=$pol_ans1?>" name="pol_ans1">
                                        </div>
									</div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Answer 2:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control required" id="spinner-default" value="<?=$pol_ans2?>" name="pol_ans2">
                                        </div>
									</div>
									
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Answer 3:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input type="text" class="form-control required" id="spinner-default" value="<?=$pol_ans3?>" name="pol_ans3">    
                                        </div>
										
										
										
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="submit" value="update" name="update" class="btn btn-sm btn-primary"/> 
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
	
    $("#list_type").validate();
    
});
  </script>

</body>

</html>