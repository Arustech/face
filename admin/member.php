<?php
require("header.php");
include("member_process.php");
//// please check  cat_process.php while initializing a variable.
?>
<script type="text/javascript" src="plugins/noty/layouts/center.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>

<script>
   $(document).ready(function() {
      $(".trash").click(function(e) {
         e.preventDefault();
         var url = $(this).prop('href');
//var url	= $(this).val();
         var layout = 'center';
         getNoty(url, layout);
      });



   });// ready ends here...


</script>
<body>

      <?php require ('top-nav.php') ?>    
   <div id="container">
<?php require ('sidebar.php') ?>	
      <div id="content">
         <div class="container">

            <div class="crumbs">
               <ul id="breadcrumbs" class="breadcrumb">
                  <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                  </li>
                  <li class="current"> <a href="member.php" title="">Members</a> 
                  </li>
               </ul>

            </div>
<?= $msg; ?>
            <div class="page-header">
               <div class="page-title">
                  <h3>Members</h3>  <span>List Of users</span> 
               </div>

            </div>

            <div class="row" id="list">
               <div class="col-md-12">
                  <div class="widget box">
                     <div class="widget-header">
                        <h4><i class="icon-reorder"></i> Members List</h4> 
                        <div class="toolbar no-padding">
                           <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                           </div>
                        </div>
                     </div>

                     <div class="widget-content">
                        <div class="row">
                           <div class="dataTables_header clearfix">

                              <div class="col-md-6" style="float:right;">
                                 <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                    <form action="#" name="search" method="POST">
                                       <label>
                                          <div class="input-group"><span class="input-group-addon"><i class="icon-search"></i></span>
                                             <input type="text" aria-controls="DataTables_Table_0" class="form-control" name="user_data" value=""/>


                                          </div>
                                          <input type="submit" name="search" value="search" class="btn btn-xs btn-info"/>
                                       </label>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable datatable">
                           <thead>
                              <tr>
                                 <th>Profile Image</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Register Date</th>
                                 <th>Last Login</th>
               <!--						<th>Account Statu s</th>-->
                                 <th>User Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              foreach ($users as $user) {
                                 ?>
                                 <tr>

                                    <td><img width="50" height="50" src="<?= $main->get_uurl('thumbs') . $user['user_avatar'] ?>"></td>

                                    <td><?= $user['user_name'] ?></td>
                                    <td><?= $user['user_email'] ?></td>

                                    <td><?= $user['user_register_date'] ?></td>
                                    <td><?= $user['user_last_login'] ?></td>
                                    <td  style="width:230px;">
                                       <form method="POST" action="member.php" >
                                          <input type ="hidden" name ='user_id' value="<?=$user['user_id']?>">
                                          <select name="user_status">
                                          <?php 
                                          $fields = array('pending'=>'pending','approved'=>'approved','blocked'=>'blocked');
                                          
                                          echo $main->get_options_array($fields,$user['user_status']);
                                          ?>
                                          </select>
                                          <button type="submit" name="btn_status" class="btn btn-xs btn-inverse">Change Status</button>
                                     
                                    </form>
                                    </td>
                              <!--						<td><?// $user['user_online'] ?></td>-->

                                    <td class="align-center"> 
                                       <span class="btn-group">
                                          <a href="basic_profile.php?mod=edit&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit Basic Profile Info">
                                             <i class="icon-fixed-width">&#xf007;</i>
                                          </a>
                                          <a href="contact_member.php?mod=edit&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit Contact Profile Info">
                                             <i class="icon-fixed-width">&#xf0e0;</i> 
                                          </a>
                                          <a href="edu_member.php?mod=edit&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit Educational Info">
                                             <i class="icon-fixed-width">&#xf02d;</i> 
                                          </a>
                                          <a href="profile_personal.php?mod=edit&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit Personal Info">
                                             <i class="icon-fixed-width">&#xf001;</i> 
                                          </a>
                                          <a href="profile_work.php?mod=edit&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit work Info">
                                             <i class="icon-fixed-width">&#xf159;</i> 
                                          </a>

                                          <a href="user_hobbies.php?user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit User Hobbies">
                                             <i class="icon-fixed-width">&#xf08a;</i> 
                                          </a>

                                          <a href="album.php?user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Edit User Albums">
                                             <i class="icon-fixed-width">&#xf008;</i> 
                                          </a>

                                          <a href="posts.php?user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="View/Delete User Posts">
                                             <i class="icon-fixed-width">&#xf044;</i> 
                                          </a>
                                           
                                           <a href="cms_letter.php?mod=letter&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="Send newsletter">
                                             <i class="icon-fixed-width">&#xf003;</i> 
                                          </a>
										  <a href="member.php?mod=del_user&user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="Delete user permanatly">
                                             <i class="icon-fixed-width">&#xf00d;</i> 
                                          </a>
                                          

                                          <!-- 
                                           <a href="album.php?user_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="upload Album's images">
                                           <i class="icon-fixed-width">&#xf03e;</i> 
                                           </a>-->
                                          <!-- <a href="edit_membber.php?mod=edit&p_id=<?= $user['user_id'] ?>" class="btn btn-xs bs-tooltip" title="Edit">
                                           <i class="icon-pencil"></i>
                                           </a>
                                          
                                          
                                           
                                           <a class="btn btn-xs bs-tooltip trash"  href=" member_process.php?mod=trash&p_id=<?= $user['user_id'] ?>" title="Delete">
                                           <i class="icon-trash"></i>
                                           </a>-->

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
                                       <?php $page->printNavBar(); ?>

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