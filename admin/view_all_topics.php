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
                      
<!--   edit widget box-->
            <?php if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='edit') {?>

                 <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Edit Forum Category</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="event" action="view_all_topics.php" method="post" >
                                                                   
                                  
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Category Title:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="cat" value="<?=$_REQUEST['cat']?>" id="cat" class="form-control required">
                                            <input  type="text" name="id" value="<?=$_REQUEST['id']?>"  class="hidden form-control required">
                                        </div>
																			
									</div>
					 <div class="form-actions">
					<input type="submit" value="Update" name="edit_cat" class="btn btn-sm btn-primary"/> 						
                                      </div>						
					</form>					
										</div>
									
<!--///////////////////////////////////////////////////////////////////-->
                                 
                            </div>
                
               <?php } ?> 
                 <div class="widget box">
                            
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Forum Categories</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <?php
                                                                            $vals= $forums_obj->get_all_forum_cats();
                                                                          
                                                                          ?>
                                <br><br>
                                
                                
                                
                                <table class="table table-hover table-condensed table  table-striped table-bordered table-hover table-responsive datatable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sr#</th>
                                           
                                           <th>Category Name</th>
                                           <th>No of Topics</th>
                                            <th>Action</th>
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
										 echo '<td>'.$val['topic_name'].'</td>';
                                                                               
                                                                                 $no_of_topics= $forums_obj->get_no_of_topics($val['topic_id']);
                                                                                 
                                                                                echo '<td>'.$no_of_topics.'</td>'; 
                                                                                ?>
                                                                                <td>
                                                                                   <a title="" class="btn btn-xs bs-tooltip" href="?mod=edit&id=<?=$val['topic_id']?>&cat=<?=$val['topic_name']?>" data-original-title="Edit">

										   <i class="icon-pencil"></i>

										   </a>
                                                                                   <a title="" class="btn btn-xs bs-tooltip" href="?mod=trash_cat&id=<?=$val['topic_id']?>" data-original-title="Delete">

										   <i class="icon-trash"></i>

										   </a>
                                                                                    <a title="" class="btn btn-xs bs-tooltip" href="?mod=view&id=<?=$val['topic_id']?>" data-original-title="View All Topics">

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
<!--  viewing topics of categories -->

 <?php if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='view') {?>
 <div class="widget box">
                              <?php
                                           $res2=$forums_obj->get_forum_topics($_REQUEST['id']);
                                        
                                             $cat_name=$forums_obj->get_cat_info($_REQUEST['id']);
                                           
                                                                          ?>
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> <?=$cat_name['topic_name']?></h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                              
                                <br><br>
                                
                                
                                
                                <table class="table table-hover table-condensed table  table-striped table-bordered table-hover table-responsive datatable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sr#</th>
                                           
                                           <th>Topic Name</th>
                                           <th>No of Threads</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php	
                                                                       if(is_array($res2))
									{
										$i=0;
										foreach($res2 as $val)
										{  
                                                                                    $total_threads=$forums_obj->get_all_thread($val['topic_id']);
                                                                                     $th=count($total_threads);
										$i++;
										echo '<tr>';	
										echo '<td>'.$i.'</td>';
										 echo '<td>'.$val['topic_name'].'</td>';
                                                                               
//                                                                                 $no_of_topics= $forums_obj->get_no_of_topics($val['topic_id']);
                                                                                 
                                                                                echo '<td>'.$th.'</td>'; 
                                                                                ?>
                                                                                <td>
                                                                                   <a title="" class="btn btn-xs bs-tooltip" href="?mod=edit&id=<?=$val['topic_id']?>&cat=<?=$val['topic_name']?>" data-original-title="Edit">

										   <i class="icon-pencil"></i>

										   </a>
                                                                                   <a title="" class="btn btn-xs bs-tooltip" href="?mod=trash_top&id=<?=$val['topic_id']?>" data-original-title="Delete">

										   <i class="icon-trash"></i>

										   </a>
                                                                                    <a title="" class="btn btn-xs bs-tooltip" href="view_threads_list.php?id=<?=$val['topic_id']?>&tname=<?=$val['topic_name']?>" data-original-title="View All Topics">

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

 <?php } ?>
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