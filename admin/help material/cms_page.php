<?php require("header.php");
include("cms_page_process.php");


?>
<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>

<script type="text/javascript" src="plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>

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
                        <li class="current"> <a href="cms_page.php" title="">Cms Pages</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Content By Page</h3>  <span>Content Listing</span> 
                    </div>
                    
                </div>
				<? if(isset($_GET['mod']) && $_GET['mod']=='edit'){?>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        <?

						?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add News</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="list_type" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Page:<span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" value="<?=$cms_page?>" readonly name="cms_page" class="form-control"/>
                                        </div>
										
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Access Key:<span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" value="<?=$cms_key?>" readonly name="cms_key" class="form-control"/>
                                        </div>
										
									</div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Content:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                            <textarea id="SBSFull" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" rows="3" cols="5" name="cms_eng" class=" form-control required"><?=$cms_eng?></textarea>
                                        </div>
										
										
										<input type="hidden" name="cms_id" value="<?=$cms_id?>" />
										<div class="col-md-4" style="float:right;margin-top:5px;">
										
										<input type="submit" value="<?=$btn_name?>" name="<?=$btn_name?>" class="btn btn-sm btn-primary"/> 
										</div>
									</div>
																						
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
				<? } ?>
                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Content List By Page</h4> 
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
											
											<th> Page Title</th>
											<th width="200px"> Access Key</th>
											<th> Content</th>
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
                                            
                                            
                                            <td><?=$row['cms_page']?></td>
                                            <td><?=$row['cms_key']?></td>
                                            <td><?
											$main->limitChars(ucfirst($row['cms_eng']),50,200);

											?></td>
                                           
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   
										   <a href="?mod=edit&id=<?=$row['cms_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
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