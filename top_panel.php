<script type="text/javascript" src="<?=$main->config['web_path']?>js/jquery.quovolver.js"></script>
<link href="<?=$main->config['web_path']?>css/quovolver.css" rel="stylesheet">

    
<div class="proflie"> <a title="Change Profile Picture" href="upload_new.php?1"><img src="<?= $main->get_uurl('thumbs') . $user['user_avatar'] ?>" alt=""></a>

                     <p class="us"><a href="timeline_wall.php"><?= $main->truncate(ucfirst($profile_basic['first_name']), 16, false) ?></a></p>

                     <p><a href="profile">Edit Profile</a></p>

                     <p></p>

                     <p>
                        <a href="requests"><?= $friend_counts ?> new contact request</a>
                     </p>

                     <p><a href="">1new message</a></p>
                        <p><a href="">My Friends (<?= $obj_user->friend_count($profile_basic['user_id'])?>) </a></p>
                  </div>



               <div class="setting">
                   <?php $obj_events   = $main->load_model('Events');?>
                        <?php
                            $events     = $obj_events->getFriendsEvents($user['user_id']);
                            if(!empty($events) && $events!='<div id="testimonials"><ul></ul></div>'){
                            echo $events; }
                            else {
                        ?>
                     <p><a href=""><strong> <u>Complete your Profile</u></strong> and make it even easier to find you!</a></p>

                     <p><a href=""><strong> <u>Find your Profile</u></strong> and make it even easier to find you!</a></p>

                     <p><a href="">Change your <strong> <u>Privacy Settings</u></strong> here.</a></p>
                     <?php } ?>

                  </div>

                  <div class="network">

                     <div class="col-lg-12">

                        <h1>Grow your network</h1>

                        <p style="font-size: 11px;; margin-bottom: 5px">Login to your email to invite people</p>

                        <div class="input-group custom-email">

                           <input type="text" class="form-control" id="email_import" placeholder="Email Address">

                           <span class="input-group-btn">

                              <button class="btn btn-default" id="Go" type="button"> <span class="">Go</span> </button>

                           </span> </div>

                        <!-- /input-group -->

<!--                  <div class="g-social"> <a href=""><img src="img/win.jpg" alt="" height="25"></a> <a href=""><img src="img/gmx.jpg" alt="" height="25"></a> <a href=""><img src="img/gmail.jpg" alt="" height="25"></a> <a href=""><img src="img/yahoo.jpg" alt="" height="25"></a> </div>-->
                        <div class="g-social"> <a   ><img  src="img/hotmail-contacts_thumbx.png" alt="" height="25"></a>  <a ><img src="img/gmailx.jpg" alt="" height="25"></a> <a ><img src="img/yahoox.jpg" alt="" height="25"></a> </div>

                     </div>

                  </div>