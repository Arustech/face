<?php require("header.php");

$rows	= "";
$msg	= "";
	$rows	= $main->db->get_rows('tbl_tmp_user');
	
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
                        <li class="current"> <a href="paypal_log.php" title="">Paypal Transactions log</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Paypal Transactions</h3>  <span>Paypal Transactions Log</span> 
                    </div>
                    
                </div>
				
                <div class="row" id="list">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Paypal Transactions</h4> 
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
											
											<th> Payment Id</th>
											<th> Username</th>
											<th> User Type</th>
											<th> Price</th>
											<th width="100px">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <? 
									  if($rows!=""){
									foreach($rows as $row)
										{
									  ?>
                                        <tr>
                                            
                                            
                                            <td><?=$row['payment_id']?></td>
											<?
											$user	= $main->db->get_row('tbl_user',array('user_id'=>$row['user_id']));
											
											echo	'<td>'.$user['user_name'].'</td>';
											echo	'<td>'.$user['user_type'].'</td>';
											?>
											 <td><?=$row['price']?></td>
											 <td><?=$row['date']?></td>
                                            
                                            
											<!--<td class="align-center"> 
										   <span class="btn-group">
										   
										   <a href="?mod=edit&id=<?=$row['news_id']?>" class="btn btn-xs bs-tooltip" title="Edit">
										   <i class="icon-pencil"></i>
										   </a> 
										   <a href="?mod=trash&id=<?=$row['news_id']?>" class="btn btn-xs bs-tooltip" title="Delete">
										   <i class="icon-trash"></i>
										   </a>
										   
										   </span> 
											</td>-->
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


</body>

</html>