<?php require("header.php");
include("album_process.php");


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
                        <li class="current"> <a href="album.php" title="">Albums</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Manage User Albums</h3>  <span>Manage List of Albums</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        <?

						?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Albums</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="album" action="#" method="post" enctype="multipart/form-data">
                                   .

									<div class="form-group">
                                        <label class="col-md-2 control-label">Title:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="album_name" value="<?=$album_name;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Album Location:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="album_loc" value="<?=$album_loc;?>"id="spinner-default" class="form-control required">
                                        </div>
									</div>
									
									<div class="form-group">
									<label class="col-md-2 control-label">Album Description : <span class="required">*</span></label>

									<div class="col-md-10">
									<textarea class="auto form-control " name="description" cols="5" rows="3" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"><?=$description?></textarea>
									</div>	

 																			
										<input type="hidden" name="user_id" value="<?=$user_id?>" />
										<input type="hidden" name="album_id" value="<?=$album_id?>" />
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
                                <h4><i class="icon-reorder"></i>Manage User's Albums</h4> 
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
											<th> Location</th>
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

                                            <td><?=$row['album_name']?></td>
                                            <td><?=$row['album_loc']?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   
										   <a href="imgz.php?mod=upload&album_id=<?=$row['album_id']?>" class="btn btn-xs bs-tooltip" title="Upload Images in this album">
										   <i class="icon-fixed-width">&#xf093;</i> 
										   </a>
										   
										   <a href="?mod=edit&id=<?=$row['album_id']?>&user_id=<?=$user_id?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a> 
										   <a href="?mod=trash&id=<?=$row['album_id']?>&user_id=<?=$user_id?>" class="btn btn-xs bs-tooltip" title="Delete">
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
	
    $("#album").validate();
    
});
  </script>

</body>

</html>