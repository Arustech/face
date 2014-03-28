<?php require("header.php");
$obj_comp = $main->load_model('Company');
include("company_process.php");
//// please check  company_process.php while initializing a variable.
?>
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
                        <li class="current"> <a href="company.php" title="">Company</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Companies</h3>  <span>List Of Companies</span> 
                    </div>
                    
                </div>

                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Companies List</h4> 
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
												<input type="text" aria-controls="DataTables_Table_0" class="form-control" name="company_data" value=""/>
												
												
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
											
											<th>Company Title</th>
											<th>Company Logo</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  
									  foreach($comps as $comp){
										
									  ?>
                                        <tr>
                                            
                                            <td><?=$comp['title']?></td>
                                            <td><img src="<?=$main->config['upload_url'].$comp['img_name']?>" width="100" height="100" /></td>
                                                                                        
                                           <td class="align-center"> 
										   <span class="btn-group">
										   <a href="add_company.php?mod=edit&c_id=<?=$comp['id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a>
										   <a href="company.php?mod=trash&c_id=<?=$comp['id']?>" class="btn btn-xs bs-tooltip" title="Delete">
										   <i class="icon-trash"></i>
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