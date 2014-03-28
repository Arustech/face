<header class="header navbar navbar-fixed-top" role="banner">
  <div class="container">
    <ul class="nav navbar-nav">
      <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
    </ul>
    <a class="navbar-brand" href="<?=$main->config['web_path']?>"> <img  width="50%" src="assets/img/logo.png" alt="logo"/><a href="index.php" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation"> <i class="icon-reorder"></i> </a>
    <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
      <li> <a href="index.php#"> Dashboard </a> </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
   <?php
            $report_notis = $adminProj->getReportingNoti();
            $count_reports  =   count($report_notis);
            
   ?>   
      <li class="dropdown hidden-xs hidden-sm"> <a href="index.php#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-envelope"></i> <span class="badge"><?php if($count_reports!=0){ echo $count_reports;}else{}?></span> </a>
        <ul class="dropdown-menu extended notification">
          <li class="title">
             <?php
             if($count_reports!=0)
            echo "<p>You have $count_reports new Report</p>";
             else
            echo "<p>You have no new Report</p>";     
           
            ?>
          </li>
          <?php
          if(!empty($report_notis) && $count_reports>0)
          {
             foreach($report_notis as $rep){
             echo '<li> <a href="'.$main->config['admin_path'].'report_detail.php?mod=report_detail&rep_id='.$rep['report_id'].'"> <span class="photo"><img src="assets/img/demo/avatar-1.jpg" alt=""/></span> <span class="subject"> <span class="from">'.ucfirst($rep['first_name']).' '.$rep['last_name'].'</span> <span class="time">'.$rep['report_date'].'</span> </span> <span class="text"> Report about '.$rep['post_type'].'</span> </a> </li>';
             }
          } ?>
          <li class="footer"> <a href="javascript:void(0);">View all messages</a> </li>
        </ul>
      </li>
      <li> <a href="index.htm#" class="dropdown-toggle row-bg-toggle"> <i class="icon-resize-vertical"></i> </a> </li>
      <li class="dropdown user"> <a href="index.htm#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-male"></i> <span class="username"><?=ucfirst($user['admin_username'])?></span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
      
          <li class="divider"></li>
          <li><a href="?a=o"><i class="icon-key"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div id="project-switcher" class="container project-switcher">
    <div id="scrollbar">
      <div class="handle"></div>
    </div>
    <div id="frame">
      <ul class="project-list">
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-desktop"></i></span> <span class="title">Lorem ipsum dolor</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-compass"></i></span> <span class="title">Dolor sit invidunt</span> </a> </li>
        <li class="current"> <a href="javascript:void(0);"> <span class="image"><i class="icon-male"></i></span> <span class="title">Consetetur sadipscing elitr</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-thumbs-up"></i></span> <span class="title">Sed diam nonumy</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-female"></i></span> <span class="title">At vero eos et</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-beaker"></i></span> <span class="title">Sed diam voluptua</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-desktop"></i></span> <span class="title">Lorem ipsum dolor</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-compass"></i></span> <span class="title">Dolor sit invidunt</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-male"></i></span> <span class="title">Consetetur sadipscing elitr</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-thumbs-up"></i></span> <span class="title">Sed diam nonumy</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-female"></i></span> <span class="title">At vero eos et</span> </a> </li>
        <li> <a href="javascript:void(0);"> <span class="image"><i class="icon-beaker"></i></span> <span class="title">Sed diam voluptua</span> </a> </li>
      </ul>
    </div>
  </div>
</header>