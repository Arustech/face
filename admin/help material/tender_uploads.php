<?php require("header.php");
$obj_tend = $main->load_model('Tender');
include("upload_process.php");




?>
<script type="text/javascript" src="plugins/nestable/jquery.nestable.min.js"></script>
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
                        <li class="current"> <a href="tender_uploads.php" title="">documents</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Upload Documents</h3>  <span>Upload tender documents</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        <?

						?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Upload Documents</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="?mod=search&tnd_no=<?=$_GET['tnd_no']?>&t_id=<?=$_GET['t_id']?>" method="post" enctype="multipart/form-data">
                                                                   
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Select Tender No:</label>
									   <div class="col-md-6">
                                           <? if(isset($_GET['tnd_no']) && isset($_GET['t_id']))
										   {
											echo 	$tend_no	= $_GET['tnd_no'];
													$tend_id	= $_GET['t_id'];
											
										   }else
										   {
										   echo "Invalid Tender No!";
										   }?>                             
                                           
                                        </div>
										
                                    </div>
									  <div class="form-group">
									<label class="col-md-2 control-label">Upload docs:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="file"  accept="application/msword,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document"  required />
                                        </div>
                                        <input type="hidden" name="tender_id" value="<?=$tend_id?>" />
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"/> 
										</div>
									</div>
									
									
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Uploads List</h4> 
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
											
											<th>File Title</th>
											<th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  if($tends!=""){
									foreach($tends as $tend)
										{
									  ?>
                                        <tr>
                                            
                                            
                                            <td><?=$tend['real_name']?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   
										   <a href="?mod=trash&id=<?=$tend['id']?>&t_id=<?=$_GET['t_id']?>&tnd_no=<?=$_GET['tnd_no']?>" class="btn btn-xs bs-tooltip" title="Delete">
										   <i class="icon-trash"></i>
										   </a>
										   
										   </span> 
											</td>
                                        </tr>
                                       <?}
									   
									   }?>
                                    </tbody>
                                </table>
                           
                            
                            
                            
                            
                             <? if($tends!=""){?>  
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
							<?}?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  <script type="text/javascript">
  

$(document).ready(function () {
	
    $("#nestable_list_2").nestable({
        group: 1
    });

    
});
  </script>
</body>

</html>