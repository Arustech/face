<?php require("header.php");
$obj_comp = $main->load_model('Company');
include("project_process.php");
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
                        <li class="current"> <a href="project.php" title="">Project</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Project</h3>  <span>List Of Projects</span> 
                    </div>
                    
                </div>

                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Projects List</h4> 
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
												<input type="text" aria-controls="DataTables_Table_0" class="form-control" name="project_data" value=""/>
												
												
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
											<th>Project No</th>
											<th>Project Subject</th>
											<th>Project Company</th>
											<th>Project Budget</th>
                                            <th>Project Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  
									  foreach($projs as $proj){
										
									  ?>
                                        <tr>
                                            
                                            <td>PRJ_<?=$proj['proj_id']?></td>
                                            <td><?=$proj['proj_subject']?></td>
                                            <td><?
											if($proj['company_id']=='-1')
											{
											$obj_user	= $main->load_model('User');
											$row	= $obj_user->getInfo($proj['user_id']);
											if(isset($row['company_title']))
											{
											echo $row['company_title'] .' [corporate member]';
											}else
											{
											echo 'Individual [member]';
											}
											
											}else
											{
											$row	=$obj_comp->getCompanyList(0,array('id'=>$proj['company_id']));
											echo $row['title'];
											}
											?></td>
                                            <td><?=$proj['proj_budget']?></td>
                                            <td><?=$proj['proj_date']?></td>
                                            <td><?if($proj['proj_status']==1) { echo 'Active <BR> [<a href="'.$main->config['admin_path'].'project.php?act=0&id='.$proj['proj_id'].'">Deactivte</a>]';
											
											}else { 
											echo 'Deactive <BR>[<a href="'.$main->config['admin_path'].'project.php?act=1&id='.$proj['proj_id'].'">Activate</a>]';
											
											
											
											}?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   <a href="post_project.php?mod=edit&p_id=<?=$proj['proj_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a>
										  
										  
										   
										   <a class="btn btn-xs bs-tooltip trash"  href=" project.php?mod=trash&p_id=<?=$proj['proj_id']?>" title="Delete">
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