<?php require("header.php");

$msg="";
?>

<script type="text/javascript" src="plugins/nestable/jquery.nestable.min.js"></script>

<body>

<?php require ('top-nav.php')?>    

    <div id="container">

  <?php require ('sidebar.php')?>	

        <div id="content">

            <div class="container">

			<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
			<li> <i class="icon-home"></i> <a href="index.php">Dashboard</a> </li>

			</ul>

			</div>  
			 <div class="page-header">
					<div class="page-title">
					  <h3>
					 
					  •	Total Posts
					 
					  </h3>
					  <span></span> </div>
					
			</div>			

	    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Users</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <?php
                                                                        
                                                                            
                                                                            $vals= $adminProj->getReport('posts');
                                                                            
                                                                      
                                                                        
                                                                        ?>
                                <br><br>
                                
                                
                                
                                <table class="table table-hover table-condensed table  table-striped table-bordered table-hover table-responsive datatable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sr#</th>
                                           <th>Username</th>
                                           <th>Post Title</th>
                                           <th>Post Type</th>
                                           <th>Post Access</th>
                                           <th>Post Data</th>
                                           <th>Post Date</th>
                                           
                                          
                                            
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
										echo '<td>'.$val['user_name'].'</td>';
                                                                                echo '<td>'.$val['post_title'].'</td>';
                                                                                echo '<td>'.$val['post_type'].'</td>';
                                                                                echo '<td>'.$val['post_access'].'</td>';
                                                                                echo '<td>'.$adminProj->getReportContent($val['post_id']).'</td>';
                                                                                echo '<td>'.$val['post_date_time'].'</td>';
                                                                               
                                                                                unset($htmlz);
                                                             //<a target="_blank" href="'.$this->config['upload_url'].'videos/'.$video['video_src'].'">Click here to view video content</a>                  
                                                                                
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

	

    $("#nestable_list_2").nestable({

        group: 1

    });




    

});

  </script>
   <script>
   $(document).ready(function(){
    
        
     
   $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
    
      $( ".datepicker" ).datepicker( "option", "showAnim", "drop" );
    
     
        

    });
    
    
    </script>
<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/DT_bootstrap.js"></script>
<script type="text/javascript" src="plugins/datatables/responsive/datatables.responsive.js"></script>
</body>



</html>