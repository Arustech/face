<?php require("header.php");?>
<body>

    <?php require ('top-nav.php');?>
    <div id="container">
     <?php require ('sidebar.php')?>
        <div id="content">
            <div class="container">
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                        </li>
                        <li class="current"> <a href="profile.php" title="">Profile</a> 
                        </li>
                    </ul>
                    
                </div>
                <div class="page-header">
                    <div class="page-title">
                        <h3>User Profile</h3>  <span>Good Day, <?=ucfirst($user['admin_username'])?>!</span> 
                    </div>
                  
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable tabbable-custom tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="index.htm#tab_overview" data-toggle="tab">Edit Account</a>
                                </li>
                            </ul>
                            <div class="tab-content row">
                                <div class="tab-pane active" id="tab_overview">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_edit_account">
                                    <form method="post" class="form-horizontal" action="profile.php">
                                                                                
                                           
                                              
                                        <div class="col-md-12 form-vertical no-margin">
                                            <div class="widget">
                                                <div class="widget-header">
                                                    <h4>Settings</h4> 
                                                </div>
                                                <div class="widget-content">
                                                    <div class="row">
                                                    <?	 

													
													if ($p_error =='pm') 
													{
						echo $admin->showAlert('danger','Password and Repeat password are not same.');}
						if ($p_error =='upd') {
						echo $admin->showAlert('success','Your profile updated.');
						}
						?>
                                                    
                                                        <div class="col-md-4 col-lg-2"> <strong class="subtitle padding-top-10px">Username</strong> 
                                                            <p class="text-muted">Admin username</p>
                                                        </div>
                                                        <div class="col-md-8 col-lg-10">
                                                            <div class="form-group">
                                                                <label class="control-label padding-top-10px">Username:</label>
                                                                <input type="text" name="admin_username" class="form-control" value="<?=ucfirst($user['admin_username'])?>" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-lg-2"> <strong class="subtitle">Change Settings</strong> 
                                                            <p class="text-muted">Enter your new password or email and press update to change	.</p>
                                                        </div>
                                                        <div class="col-md-8 col-lg-10">
                                                            <div class="form-group">
                                                                <label class="control-label">Email:</label>
                                                                <input type="email"  required  name="admin_email" value="<?=$user['admin_email']?>" class="form-control" placeholder="Leave empty for no password-change">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New password:</label>
                                                                <input type="password" name="new_password" class="form-control" placeholder="Leave empty for no password-change">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Repeat new password:</label>
                                                                <input type="password"  name="new_password_repeat" class="form-control" placeholder="Leave empty for no password-change">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                            <input type="hidden" name="admin_id" value="<?=$user['admin_id']?>">
                                                <input type="submit" value="Update Account" name="btn_update" class="btn btn-primary pull-right">
                                            </div>
                                        </div>
                                    </form>
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