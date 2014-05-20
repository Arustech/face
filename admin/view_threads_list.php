<?php require("header.php");
 require ('forum_process.php');
$forums_obj=$main->load_model("Forums");
$msg="";
?>

<script type="text/javascript" src="plugins/nestable/jquery.nestable.min.js"></script>
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
			<li> <i class="icon-home"></i> <a href="index.php">Dashboard</a> </li>
                        <li> <i ></i> <a href="view_all_topics.php">View All Topics</a> </li>
			</ul>

			</div>  
			 <div class="page-header">
					<div class="page-title">
					  <h3>
					 
					  •	Forums
					 
					  </h3>
					  <span></span> </div>
					
			</div>			

	    <div class="col-md-12">
 
                 <div class="widget box">
                            
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> <?=$_REQUEST['tname']?></h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <?php
                                $id=$_REQUEST['id'];
                                                                            $vals= $forums_obj->get_threads('0',$id);
                                                                             
                                                                          ?>
                                <br><br>
                                
                                
                                
                                <table class="table table-hover table-condensed table  table-striped table-bordered table-hover table-responsive datatable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sr#</th>
                                           
                                           <th>Thread Title</th>
                                           <th>Thread Data</th>
                                            <th>Thread Date</th>
                                            <th>Thread Topics</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php	
                                                                       if(is_array($vals))
									{
										$i=0;
										foreach($vals as $val)
										{
										$i++;
										echo '<tr>';	
										echo '<td>'.$i.'</td>';
										echo '<td>'.$val['thread_title'].'</td>';
                                                                                echo '<td>'.$val['thread_data'].'</td>'; 
                                                                                echo '<td>'.$val['thread_date'].'</td>';
                                                                                echo '<td>'.$val['thread_topic'].'</td>';
                                                                                
                                                                                  ?>
                                                                                <td>
             
                                                                                   <a title="" class="btn btn-xs bs-tooltip" href="?mod=trash_thread&id=<?=$val['thread_id']?>" data-original-title="Delete">

										   <i class="icon-trash"></i>

										   </a>
                                                                                    <a title="" class="btn btn-xs bs-tooltip" href="view_comments_list.php?id=<?=$val['thread_id']?>&tname=<?=$val['thread_title']?>" data-original-title="View Thread Comments">

										   <i class="icon-eye-open"></i>

										   </a>

                                                                                </td>
                                                                                <?php
										echo '</tr>';
										
                                            
                                                                                
                                                                                }
									}
									?>
                                                                              
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

  </script>
 
<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/DT_bootstrap.js"></script>
<script type="text/javascript" src="plugins/datatables/responsive/datatables.responsive.js"></script>
</body>



</html>