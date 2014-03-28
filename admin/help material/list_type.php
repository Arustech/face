<?php require("header.php");
include("list_process.php");


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
                        <li class="current"> <a href="list_type.php?lt=<?=$list_type?>" title=""><?=$link_title?></a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3><?=$page_title?></h3>  <span><?=$page_title?></span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        <?

						?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i><?=$widget_title?></h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="list_type" action="?lt=<?=$list_type.$QueryString?>" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Title:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="list_title" value="<?=$title;?>"id="spinner-default" class="form-control required">
                                        </div>
										
										<input type="hidden" name="list_key" value="<?=$list_type?>" />
										<input type="hidden" name="list_id" value="<?=$list_id?>" />
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="submit" value="<?=$btn_name?>" name="<?=$btn_name?>" class="btn btn-sm btn-primary"/> 
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
                                <h4><i class="icon-reorder"></i><?=$table_title?></h4> 
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
											
											<th> Title</th>
											<th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  if($rows!=""){
									foreach($rows as $row)
										{
									  ?>
                                        <tr>
                                            
                                            
                                            <td><?=$row['list_title']?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   
										   <a href="?mod=edit&lt=<?=$list_type?>&id=<?=$row['list_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a> 
										   <a href="?mod=trash&lt=<?=$list_type?>&id=<?=$row['list_id']?>" class="btn btn-xs bs-tooltip" title="Delete">
										   <i class="icon-trash"></i>
										   </a>
										   
										   </span> 
											</td>
                                        </tr>
                                       <?}
									   
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
	
    $("#list_type").validate();
    
});
  </script>

</body>

</html>