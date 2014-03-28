<?php require("header.php");

include("posts_process.php");




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
                        <li class="current"> <a href="member.php" title="">Posts</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Posts</h3>  <span>List Of user Posts</span> 
                    </div>
                    
                </div>

                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Posts List</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
							
                            <div class="widget-content">
							
			<table class="table table-striped table-bordered table-hover table-checkable datatable">
				<thead>
					<tr>
						<th>Post Type</th>
						<th>Posted On</th>
						<th>Posted Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				  <?   foreach($posts as $post){	  ?>
					<tr>
												
						<td><?=$post['post_type']?></td>
						<td><?
						$users	= $obj_member->getUsers(0,$post['posted_on_user_id']);				
						echo $users[0]['user_name'];
						?></td>
						
						<td><?=$post['post_date_time']?></td>
						
												
					   <td class="align-center"> 
					   <span class="btn-group">
					   <a href="comments.php?mod=edit&post_id=<?=$post['post_id']?>" class="btn btn-xs bs-tooltip" title="View/Edit Basic Profile Info">
					   <i class="icon-fixed-width">&#xf0e6;</i>
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