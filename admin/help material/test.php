<?php require("header.php");
include("cat_process.php");
//// please check  cat_process.php while initializing a variable.
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
                        <li class="current"> <a href="cat.php" title="">Categories</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Categories</h3>  <span>List Of Categories</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Add Category</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="#" method="post">
                                                                   
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Title:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="category_title" value="<?=$cat_title?>">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="category_parent" id="culture">
											<option value="0" selected="selected">No Parent</option>
                                                <?foreach($res as $cat)
												{
												if($cat_parent==$cat['category_id'])
												{
												$selected='selected';
												}else
												{
												$selected='';
												}
												?>
												<option value="<?=$cat['category_id']?>" <?=$selected?> ><?=$cat['category_title']?></option>
												<?
												}?>                                            </select>
                                        </div>
										<div class="col-md-4" style="float:right;margin-top:5px;">
										<input type="hidden" name='category_id'value="<?=$id?>">
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
                                <h4><i class="icon-reorder"></i> Categories List</h4> 
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
										<label>
											<div class="input-group"><span class="input-group-addon"><i class="icon-search"></i></span>
												<input type="text" aria-controls="DataTables_Table_0" class="form-control">
											</div>
										</label>
									</div>
								</div>
							</div>
							</div>
                            
                            <div class="row">
                            <div class="col-md-6">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Nestable List 2</h4> 
                            </div>
                            <div class="widget-content">
                                <div id="nestable_list_2" class="dd">
                                    <ol class="dd-list">
                                        <li data-id="13" class="dd-item">
                                            <div class="dd-handle">Item 13</div>
                                        </li>
                                        <li data-id="14" class="dd-item">
                                            <div class="dd-handle">Item 14</div>
                                        </li>
                                        <li data-id="15" class="dd-item"><button type="button" data-action="collapse" style="display: block;">Collapse</button><button type="button" data-action="expand" style="display: none;">Expand</button>
                                            <div class="dd-handle">Item 15</div>
                                            <ol class="dd-list" style="">
                                                
                                                <li data-id="17" class="dd-item">
                                                    <div class="dd-handle">Item 17</div>
                                                </li><li data-id="16" class="dd-item">
                                                    <div class="dd-handle">Item 16</div>
                                                </li>
                                                <li data-id="18" class="dd-item">
                                                    <div class="dd-handle">Item 18</div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                            </div>
                            
                            
                            
                            
                                <table class="table table-striped table-bordered table-hover table-checkable datatable">
                                    <thead>
                                        <tr>
											<th>Title</th>
                                            <th>Parent</th>
                                            <th style="width:200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  
									  foreach($res as $cat){
										$title	=$cat['category_title'];
										if($cat['category_parent']==0)
										{
										$parent	='No Parent';
										}else
										{
										/// getting parent from table...
										$cond	=array('category_id'=>$cat['category_parent']);
										$val	='category_title';
										$parent	=$adminProj->getCat($cond,$val);
									
										}
									  ?>
                                        <tr>
                                            
                                            <td><?=$title?></td>
                                            <td><?=$parent?></td>
                                           
                                           <td class="align-center"> 
										   <span class="btn-group">
										   <a href="?mod=edit&id=<?=$cat['category_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a>
										   <a href="?mod=trash&id=<?=$cat['category_id']?>" class="btn btn-xs bs-tooltip" title="Delete">
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
										<div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 5 of 8 entries</div>
									</div>
									<div class="col-md-6">
										<div class="dataTables_paginate paging_bootstrap">
											<ul class="pagination">
												<li class="prev disabled"><a href="index.htm#">? Previous</a>
												</li>
												<li class="active"><a href="index.htm#">1</a>
												</li>
												<li><a href="index.htm#">2</a>
												</li>
												<li class="next"><a href="index.htm#">Next ? </a>
												</li>
											</ul>
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
  <script type="text/javascript">
  
  "use strict";
$(document).ready(function () {
  
    $("#nestable_list_2").nestable({
        group: 1
    }).on("change", a);
  
  
    $("#nestable_list_menu").on("click", function (d) {
        var c = $(d.target),
            b = c.data("action");
        if (b === "expand-all") {
            $(".dd").nestable("expandAll")
        }
        if (b === "collapse-all") {
            $(".dd").nestable("collapseAll")
        }
    });
    $("#nestable_list_3").nestable()
});
  
  
  </script>
</body>

</html>