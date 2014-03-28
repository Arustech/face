<?php require("header.php");
$obj_tend = $main->load_model('Tender');
$obj_comp = $main->load_model('Company');
include("tender_process.php");
//// please check  cat_process.php while initializing a variable.
?>
<script type="text/javascript" src="plugins/noty/layouts/center.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>
<script>
$(document).ready(function(){
$(".trash").click(function(e){
e.preventDefault();
var url	= $(this).prop('href');
//var url	= $(this).val();
var layout	= 'center';
getNoty(url,layout);
});



});// ready ends here...


</script>
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
                        <li class="current"> <a href="tender.php" title="">Tender</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Tender</h3>  <span>List Of Tenders</span> 
                    </div>
                    
                </div>

                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Tenders List</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
							
                            <div class="widget-content">
							<div class="row">
							<div class="dataTables_header clearfix">
								
								<div class="col-md-6" style="float:right;">
									<div class="dataTables_filter" id="DataTables_Table_0_filter">
										<form action="#" name="search" method="POST">
										<label>
											<div class="input-group"><span class="input-group-addon"><i class="icon-search"></i></span>
												<input type="text" aria-controls="DataTables_Table_0" class="form-control" name="tender_data" value=""/>
												
												
											</div>
											<input type="submit" name="search" value="search" class="btn btn-xs btn-info"/>
										</label>
										</form>
									</div>
								</div>
							</div>
							</div>
                                <table class="table table-striped table-bordered table-hover table-checkable datatable">
                                    <thead>
                                        <tr>
											<th>Tender No</th>
											<th>Tender Subject</th>
											<th>Tender Company</th>
											<th>Tender Budget</th>
                                            <th>Tender Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  
									  foreach($tends as $tend){
										
									  ?>
                                        <tr>
                                            
                                            <td><?=$tend['tender_no']?></td>
                                            <td><?=$tend['tender_subject']?></td>
                                            <td><?
											$row	=$obj_comp->getCompanyList(0,array('id'=>$tend['tender_company']));
											echo $row['title'];
											
											?></td>
                                            <td><?=$tend['tender_budget']?></td>
                                            <td><?=$tend['tender_date']?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   <a href="post_tender.php?mod=edit&t_id=<?=$tend['tender_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a>
										  
										  
										   
										   <a class="btn btn-xs bs-tooltip trash"  href=" tender.php?mod=trash&t_id=<?=$tend['tender_id']?>" title="Delete">
										   <i class="icon-trash"></i>
										   </a>
										   <a href="tender_uploads.php?mod=search&t_id=<?=$tend['tender_id']?>&tnd_no=<?=$tend['tender_no']?>" class="btn btn-xs bs-tooltip" title="Upload">
										   <i class="icon-fixed-width"></i>
										   </a>
										   </span> 
											</td>
                                        </tr>
                                       <?}?>
                                    </tbody>
                                </table>
								<div class="row">
								<div class="dataTables_footer clearfix">
									<div class="col-md-6">
										<div class="dataTables_info" id="DataTables_Table_0_info"><? $page->printResultBar();?></div>
									</div>
									<div class="col-md-6">
                                    

										<div class="dataTables_paginate paging_bootstrap">
                                         <?  $page->printNavBar(); ?>
                                        										
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
    </div>
  
</body>

</html>