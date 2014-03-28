<?php require("header.php");
include("events_process.php");


?>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
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
                        <li class="current"> <a href="country.php" title="">Manage Events</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Manage Events</h3>  <span>Manage List of Events</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        <?

						?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Events</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="event" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Religion Type:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                           <?=$adminProj->getReligionHtml($religion_type)?>
                                        </div>
																				
									</div>
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Event Name:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="event_name" value="<?=$event_name;?>"id="spinner-default" class="form-control required">
                                        </div>
																				
									</div>
									<div class="form-group">
                                        <label class="col-md-2 control-label">Event Date:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="event_date" value="<?=$event_date;?>"id="datepicker" class="form-control required ">
                                        </div>
										
										<input type="hidden" name="event_id" value="<?=$event_id?>" />
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
                                <h4><i class="icon-reorder"></i>Events List</h4> 
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
											
											<th> Religion Type</th>
											<th> Event Name</th>
											<th>Event Date</th>
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
                                            
                                            
                                            <td><?=$row['religion_type']?></td>
                                            <td><?=$row['event_name']?></td>
                                            <td><?=$row['event_date']?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   
										   <a href="?mod=edit&id=<?=$row['event_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a> 
										   <a href="?mod=trash&id=<?=$row['event_id']?>" class="btn btn-xs bs-tooltip" title="Delete">
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
	
    $("#event").validate();
    
});
$(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
  });

  </script>

</body>

</html>