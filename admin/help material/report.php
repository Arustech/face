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
					  <? if($_GET['find']=='top'){?>
					  •	Top 5 active sectors/industries
					  <?}elseif($_GET['find']=='bottom'){?>
					  •	Bottom 5 non-active sectors/industries
					  <?}?>
					  </h3>
					  <span></span> </div>
					
			</div>			

			         

		
              <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Industries</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sr#</th>
                                            <th>Industry</th>
                                            <th>Sub Industry</th>
                                            <th>Total Posts</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									$vals	= $adminProj->getTopBotCat($_GET['find']);
									
									if(is_array($vals))
									{
										$i=0;
										foreach($vals as $val)
										{
										$i++;
										echo '<tr>';	
										echo '<td>'.$i.'</td>';
										echo '<td>'.$val['parent'].'</td>';
										if(array_key_exists('subcat', $val))
										{
										echo '<td>'.$val['subcat'].'</td>';
										}else
										{
										echo '<td>-</td>';	
										}
										echo '<td>'.$val['count'].'</td>';
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

</body>



</html>