<?php require("header.php");
include("report_process.php");


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
                        <li class="current"> <a href="country.php" title="">Countries</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Reports List</h3>  <span>Manage List of Reports</span> 
                    </div>
                    
                </div>
		
                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Manage Reports</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
							
							
                            <div class="widget-content">
							<div class="row">

							</div>
                             <table class="table table-striped table-bordered table-hover table-checkable datatable">
                                    <thead>
                                        <tr>
											
											<th>Report Date</th>
											<th>Report Type</th>
											<th>Submitted By</th>
											<th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
									  if($reports!="" && count($reports)>0){
									foreach($reports as $report)
										{
									  ?>
                                        <tr>
                                            
                                            
                                            <td><?=$report['report_date']?></td>
                                            <td><?=$report['post_type']?></td>
                                            <td><?=ucfirst($report['first_name']).' '.$report['last_name']?></td>
                                            <td><a href="<?=$main->config['admin_path']?>report_detail.php?mod=report_detail&rep_id=<?=$report['report_id']?>">View Detail</a></td>
                                            
                                          
                                        </tr>
                                       <?php }
									   
									   }?>
                                    </tbody>
                                </table>
                             
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  <script type="text/javascript">
  

$(document).ready(function () {
	
    $("#country").validate();
    
});
  </script>

</body>

</html>