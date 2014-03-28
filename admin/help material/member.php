<?php require("header.php");
include("member_process.php");
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

$(".chkVal").change(function(){
	val	=$(".chkVal").val();
	
	window.location.href="?t=corp&mod=chkv&val="+val;
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
                        <li class="current"> <a href="member.php?t=corp" title="">Member</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Members</h3>  <span>
						List Of Members
						<a href="print_member.php?t=<?=$mem_type?>">Print View</a>
						
						</span> 
                    </div>
                    
                </div>

                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i><?=$table_heading?></h4> 
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
												<input type="text" aria-controls="DataTables_Table_0" class="form-control required" name="user_data" title="search by username,email,register date" value=""/>
												
												
											</div>
											<input type="submit" name="search" value="search" id="search" class="btn btn-xs btn-info"/>
										</label>
										</form>
									</div>
								</div>
							</div>
							</div>
							
<?
		// for individual members only...
		if($mem_type=='ind'){

?>							
                                <table class="table table-striped table-bordered table-hover table-checkable datatable">
                                    <thead>
                                        <tr>
											<th>Username</th>
											<th>Email</th>
											<th>Subscription Date</th>
											<th>Paid/Unpaid</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  
									  foreach($rows as $row){
									  
									  $last_date	= date('Y-m-d', strtotime('+'.$row['sub_year'].' year', strtotime($row['user_subscribe_date'])));
										
									  ?>
                                        <tr>
                                            
                                            <td><?=$row['user_name']?></td>
                                            <td><?=$row['user_email']?></td>
                                            <td><? echo $row['user_subscribe_date'].'&nbsp;&nbsp;to&nbsp;&nbsp;'.$last_date;?></td>
                                            <td><?
											
											if($row['user_account']==1)
											{
											
												if($row['user_subscribe_date']==$last_date)
												echo 'Expired';
												else
												echo	'Paid';
											}else
											{
											echo 'Unpaid';
											}
											
											?></td>
                                           
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   <a href="<?=$edit_page?>mod=edit&user_id=<?=$row['user_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a>
										  
										  
										   
										   <a class="btn btn-xs bs-tooltip trash"  href=" ?mod=trash&id=<?=$row['user_id']?>&t=<?=$mem_type?>" title="Delete">
										   <i class="icon-trash"></i>
										   </a>
										   </span> 
											</td>
                                        </tr>
                                       <?}?>
                                    </tbody>
                                </table>
		<?} elseif($mem_type=='corp'){
		
		
		/// for corporate members only
		?>
		 <table class="table table-striped table-bordered table-hover table-checkable datatable">
					
						<div class="col-md-2" style="float:right;margin-right:-15px ">
						<select id="culture"  class="form-control chkVal">
						<option  value="-1">View By</option>
						<option value="1" <? if($v==1) echo "selected";?>>Featured</option>
						<option value="0" <? if($v==0) echo "selected";?>>UnFeatured</option>
						</select>
						</div>
                                    <thead>
                                        <tr>
											<th>Username</th>
											<th>Company</th>
											<th>Logo</th>
											<th>Subscription Date</th>
											<th>Paid/Unpaid</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  
									  foreach($rows as $row){
										  $last_date	= date('Y-m-d', strtotime('+'.$row['sub_year'].' year', strtotime($row['user_subscribe_date'])));
										
										
									  ?>
                                        <tr>
                                            
                                            <td><?=$row['user_name']?></td>
                                            <td><?=$row['company_title']?></td>
                                            <td><img src="<?=$main->config['upload_url'].$row['company_photo']?>" height="100" width="100"/> </td>
                                            <td><? echo $row['user_subscribe_date'].'&nbsp;&nbsp;to&nbsp;&nbsp;'.$last_date;?></td>
                                           <td><?
											
											if($row['user_account']==1)
											{
											
												if($row['user_subscribe_date']==$last_date)
												echo 'Expired';
												else
												echo	'Paid';
											}else
											{
											echo 'Unpaid';
											}
											
											?></td>
                                            
                                           <td class="align-center"> 
										   <span class="btn-group">
										   <a href="<?=$edit_page?>mod=edit&user_id=<?=$row['user_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a>
										  
										  
										   
										   <a class="btn btn-xs bs-tooltip trash"  href=" ?mod=trash&id=<?=$row['user_id']?>&t=<?=$mem_type?>" title="Delete">
										   <i class="icon-trash"></i>
										   </a>
										<?
										if($row['company_feature']==0)
										{
										?>   
										   <a class="btn btn-xs bs-tooltip "  href=" ?fc=on&id=<?=$row['user_id']?>&t=<?=$mem_type?>" title="Set To Feature">
										   <i class="icon-fixed-width"></i>
										   </a>
										 <?}else{?>  
										 <a class="btn btn-xs bs-tooltip "  href=" ?fc=off&id=<?=$row['user_id']?>&t=<?=$mem_type?>" title="Disable Feature">
										   <i class="icon-fixed-width"></i>
										   </a>
										 <?}?>
										   </span> 
											</td>
                                        </tr>
                                       <?}?>
                                    </tbody>
                                </table>

		<?}?>
								
								<div class="row">
								<div class="dataTables_footer clearfix">
									<div class="col-md-6">
										<div class="dataTables_info" id="DataTables_Table_0_info"><? $page->printResultBar();?></div>
									</div>
									<div class="col-md-6">
                                    

										<div class="dataTables_paginate paging_bootstrap">
                                         <?  $page->printNavBar(0,'&t='.$mem_type.$v_qs); ?>
                                        										
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