<?php require("header.php");?>
<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>
<script type="text/javascript" src="assets/js/demo/charts/chart_filled_blue.js"></script>
<script type="text/javascript" src="assets/js/demo/charts/chart_simple.js"></script>



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
          <h3>Dashboard</h3>
          <span>Good morning, <?=ucfirst($user['admin_username'])?>!</span> </div>
        
      </div>
      <div class="row row-bg">
        <div class="col-sm-6 col-md-3 hidden-xs">
          <div class="statbox widget box box-shadow">
            <div class="widget-content">
              <div class="visual cyan"> <i class="icon-th-large"></i> </div>
              <div class="title">Tota Users at KnownFaces</div>
              <div class="value"><?=$adminProj->getTotal('user');?></div>
              <!--<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>--> </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-3 hidden-xs">
          <div class="statbox widget box box-shadow">
            <div class="widget-content">
              <div class="visual green"> <i class="icon-user"></i> </div>
              <div class="title">Total Albums at KnownFaces</div>
              <div class="value"><?=$adminProj->getTotal('albums');?></div>
               </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 hidden-xs">
          <div class="statbox widget box box-shadow">
            <div class="widget-content">
              <div class="visual yellow"> <i class="icon-folder-close"></i> </div>
              <div class="title">Total Videos at KnownFaces</div>
              <div class="value"><?=$adminProj->getTotal('videos');?></div>
			  </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 hidden-xs">
          <div class="statbox widget box box-shadow">
            <div class="widget-content">
              <div class="visual red"> <i class="icon-folder-open"></i> </div>
              <div class="title">Total Posts at KnownFaces</div>
              <div class="value"><?=$adminProj->getTotal('posts');?></div></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="widget box">
            <div class="widget-header">
              <h4><i class="icon-reorder"></i> Total Earnings $ (<span class="blue">+29%</span>)</h4>
              <div class="toolbar no-padding">
                <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
              </div>
            </div>
            <div class="widget-content">
              <div id="chart_filled_blue" class="chart"></div>
            </div>
            <div class="divider"></div>
            <div class="widget-content">
              <ul class="stats">
                <li> <strong>4,853</strong> <small>Total Views</small> </li>
                <li class="light hidden-xs"> <strong>271</strong> <small>Last 24 Hours</small> </li>
                <li> <strong>1,025</strong> <small>Unique Users</small> </li>
                <li class="light hidden-xs"> <strong>105</strong> <small>Last 24 Hours</small> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
 
     
    </div>
  </div>
</div>
</body>
</html>