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
                                           
                                            
                                          
                                        </tr>
                                       <?}?>
                                    </tbody>
                                </table>
		<?} elseif($mem_type=='corp'){
		
		
		/// for corporate members only
		?>
		 <table class="table table-striped table-bordered table-hover table-checkable datatable">
					
						
                                    <thead>
                                        <tr>
											<th>Username</th>
											<th>Company</th>
											<th>Logo</th>
											<th>Subscription Date</th>
											<th>Paid/Unpaid</th>
											
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
                                            
                                          
                                        </tr>
                                       <?}?>
                                    </tbody>
                                </table>

		<?}?>
								
								
                            </div>
                        </div>
                    </div>
                </div>
				<div id="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
				<a href="#" onclick="window.print(); return false;"><button id="btn-load-then-complete" class="btn btn-success"  >Print</button></a>
				</div>
				</div>
                
            </div>
        </div>
    </div>
  
</body>

</html>