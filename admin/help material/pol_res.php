<?php require("header.php");


$msg="";
?>

<script type="text/javascript" src="<?=$main->config['web_path']?>pol/ajax-poll.php"></script>
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
					  Pol & services Results
					  </h3>
					  <span></span> </div>
					
			</div>			

			         

		
              <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Pol Results</h4> 
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                              
							<div class='ajax-poll' tclass='demo'>
						
					
							</div>
                            </div>
                        </div>
                    </div>
              
		
                </div>

                

            </div>

        </div>

    </div>

  <script type="text/javascript">

  



$(document).ready(function () {


});

  </script>

</body>



</html>