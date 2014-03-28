<?php
include("lib/Main.php");
$main = new Main;
$member = $main->load_model('Member');
$profile = $main->load_model('BasicProfile');
$user = $member->check_user();
if (!$user)
   $main->go('login');
$profile_basic = $profile->getBasicProfileByID($user['user_id']);

//var_dump($profile_basic);
//var_dump($user);
?>
<!doctype html>
<html>

   <head>

      <meta charset="utf-8">

      <meta name="description" content="">

      <meta name="author" content="">

      <link rel="shortcut icon" href="../img/favicon.png">

      <title><?= $main->config['title'] ?></title>

      <!-- Bootstrap core CSS -->

      <link href="css/bootstrap.css" rel="stylesheet">

      <link href="css/main.css" rel="stylesheet">

      <link href="css/subpage.css" rel="stylesheet">

      <link href="css/PIE.htc" rel="stylesheet">

      <script src="js/jquery 1.10.2.js"></script>

      <script src="js/jquery.placeholder.js"></script>
      
        <script type="text/javascript" src="plugins/fancybox/jquery.fancybox.pack.js"></script>

          <link rel="stylesheet" type="text/css" href="plugins/fancybox/jquery.fancybox.css" media="screen" />



      <script>

         // To test the @id toggling on password inputs in browsers that don’t support changing an input’s @type dynamically (e.g. Firefox 3.6 or IE), uncomment this:

         // $.fn.hide = function() { return this; }

         // Then uncomment the last rule in the <style> element (in the <head>).

         $(function() {

            // Invoke the plugin

            $('input, textarea').placeholder();

            // That’s it, really.

            // Now display a message if the browser supports placeholder natively

            var html;

            if ($.fn.placeholder.input && $.fn.placeholder.textarea) {

               html = '<strong>Your current browser natively supports <code>placeholder</code> for <code>input</code> and <code>textarea</code> elements.</strong> The plugin won’t run in this case, since it’s not needed. If you want to test the plugin, use an older browser ;)';

            } else if ($.fn.placeholder.input) {

               html = '<strong>Your current browser natively supports <code>placeholder</code> for <code>input</code> elements, but not for <code>textarea</code> elements.</strong> The plugin will only do its thang on the <code>textarea</code>s.';

            }

            if (html) {

               $('<p class="note">' + html + '</p>').insertAfter('form');

            }

         });

      </script>

      <!-- Just for debugging purposes. Don't actually copy this line! -->

      <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

      <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

      <script src="plugins/noty/jquery.noty.js"></script>
      <script src="plugins/noty/layouts/top.js"></script>
      <script src="plugins/noty/themes/default.js"></script>
      <script src="js/bootstrap.js"></script>


   </head>
   <style>
      label.error{

         font-size:11px;
         font-weight: 800;
         color:#F50733;
         font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;

      }

      .form-control.error{
         border-color: red;

      }
      .badgee {

         background-color: rgba(219, 45, 42, 0.8);
         font-size: 10px;
         font-weight: 300;
         height: 14px;
         padding: 2px 4px;
         position: relative;
         right: 6px;
         text-align: center;
         text-shadow: none;
         top: -11px;
         z-index: 1;
         border-radius: 1px;
      }

      .message
      {

         color: #3d4e60;
      }


      .footer a
      {

         color: #828282 !important;
      }

      .footer
      {
         border-top: 1px solid #EBEBEB;
         height: 35px;
         padding-left: 13px;
         padding-top: 6px;
         width: 237px;
         font-family: sans-serif;
      }


      .time {

         color: #0070a3;
      }
      .top-panel ul li {
         float: left;
         padding: 0 2px;
      }

      .user_name{
         float: right

      }
      .user_name li{
         padding: 0 5px !important;

      }

   </style>

   <body class="subpage">

      <div class="topbar">

         <div class="one"></div>

         <div class="two"></div>

         <div class="one"></div>

         <div class="two"></div>

         <div class="one"></div>

         <div class="two"></div>

         <div class="one"></div>

         <div class="two"></div>

      </div>

      <div class="header-wrraper">

         <div class="container">

            <div class="header">

               <div class="col-lg-12" >

                  <div class="col-lg-4 logo"> <img src="img/logo.png" alt="Knowfaces" > </div>

                  <div class="col-lg-6 top-panel">

                     <ul>

                        <li>
                           <a href="#" class="button popover-request" data-toggle="popover" title="Friend Requests"  >
                              <span style="font-size: 15px ; right: -12px ;position: relative" class="glyphicon glyphicon-user"></span><span style="font-size: 17px" class="glyphicon glyphicon-user"></span><span class="badgee">99</span></a>
                        </li>


                        <li>
                           <a href="#" class="button popover-messages" data-toggle="popover" title="Friend Requests"  >
                              <span style="font-size: 17px" class="glyphicon glyphicon-comment"></span><span class="badgee">2</span></a>
                        </li>


                        <li>
                           <a href="#" class="button popover-noti" data-toggle="popover" title="Friend Requests"  >
                              <span style="font-size: 17px" class="glyphicon glyphicon-globe"></span> <span class="badgee">5</span></a>

                        </li>

                        <!--                        <li><a href="./">Home</a></li>-->

                        <!--            <li><a href="">Find Friends</a></li>-->

<!--                        <li><a href="" class="active"><?php // $main->truncate(ucfirst($profile_basic['first_name']), 5, false)  ?></a></li>

                        <li><a href=""><img src="img/lock.png" alt="" title="lock"></a></li>

                        <li class="last"><a href=""><img src="img/setting.png" alt="" title="setting"></a></li>-->
                        <div class="username" >
                           <li><a href="index">Home</a></li>
                           <li><a href="index">Friends</a></li>

                           <li><a href="" class="active"><?= $main->truncate(ucfirst($profile_basic['first_name']), 5, false) ?></a></li>

                           <li><a href=""><img src="img/lock.png" alt="" title="lock"></a></li>

                           <li class="last"><a href=""><img src="img/setting.png" alt="" title="setting"></a></li>
                        </div>
                     </ul>


                     </ul>

                  </div>

                  <div class="col-lg-8 login-panel">

                     <div class="col-lg-12">

                        <div class="input-group custom-search-form">

                           <input type="text" class="form-control" placeholder="Search for people, places and things">

                           <span class="input-group-btn">

                              <button class="btn " type="button"> <span class=""><img src="img/search.png" height="26" alt=""></span> </button>

                           </span> </div>

                        <!-- /input-group --> 

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

      <div class="content">

         <div class="container">

            <div class="proflie"> <img src="<?= $main->get_uurl('thumbs') . $user['user_avatar'] ?>" alt="">

               <p class="us"><a href=""><?= $main->truncate(ucfirst($profile_basic['first_name']), 16, false) ?></a></p>

               <p><a href="profile">Edit Profile</a></p>

               <p></p>

               <p><a href="">0 new contact request</a></p>

               <p><a href="">1new message</a></p>

            </div>

            <div class="setting">

               <p><a href=""><strong> <u>Complete your Profile</u></strong> and make it even easier to find you!</a></p>

               <p><a href=""><strong> <u>Find your Profile</u></strong> and make it even easier to find you!</a></p>

               <p><a href="">Change your <strong> <u>Privacy Settings</u></strong> here.</a></p>

            </div>

            <div class="network">

               <div class="col-lg-12">

                  <h1>Grow your network</h1>

                  <p>Invite people to Knownfaces</p>

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

            <script type="text/javascript">
         $(document).ready(function() {

            $(".popover-request").popover({
               placement: 'bottom',
               //title : '<div style="text-align:center; color:red; text-decoration:underline; font-size:14px;"> Muah ha ha</div>', //this is the top title bar of the popover. add some basic css
               html: 'true',
               content: '<div class="popOverBox"><li><a href=""> <span><img src="img/profilefr.jpg" width="50px" height="50px"></span>  <span class="message">Zunair Ali Khan</span></a></li><li><a href=""> <span><img src="img/profilefr.jpg" width="50px" height="50px"></span>  <span class="message">Zunair Ali Khan</span></a></li></div></li><li> <div class="footer"> <a href="">View all Requests</a></div></li>'
            });




            $(".popover-messages").popover({
               placement: 'bottom',
               html: 'true',
               content: '<div class="popOverBox"><li><a href=""><span><img src="img/profilefr.jpg" width="50px" height="50px"></span><span class="message">New user registration.</span><span class="time">1 mins</span></a></li><li><a href=""><span><img src="img/profilefr.jpg" width="50px" height="50px"></span>  <span class="message">New user registration.</span><span class="time">1 mins</span></a></li><li><div class="footer"><a href="">View all Messages</a></div></li>'

            });



            $(".popover-noti").popover({
               placement: 'bottom',
               html: 'true',
               content: '<div class="popOverBox"><li><a href=""><span><img src="img/profilefr.jpg" width="50px" height="50px"></span><span class="message">New user registration.</span><span class="time">1 mins</span></a></li><li><a href=""><span><img src="img/profilefr.jpg" width="50px" height="50px"></span>  <span class="message">New user registration.</span><span class="time">1 mins</span></a></li><li><div class="footer"><a href="">View all notifications</a></div></li>'

            });

                  
                  
                  $("#Go").click(function(e) {
             e.preventDefault();
             var str = $("#email_import").val();

             var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;


             var res = str.match(pattern);

             if (!res || str == '')
             {
                alert("Not a valid e-mail address");
                return false;
             }
             else {
             var data_json = {'emailid':str};

                $.ajax(
                        {
                           async: false,
                           url: 'setting_session.php',
                           type: "POST",
                           data: data_json,
                           success: function(data)
                           {




                           },
                           error: function(jqXHR, textStatus, errorThrown)
                           {
                              //if fails     
                           }
                        });


                $("#Go").fancybox({
                   'width': 970,
                   'height': 180,
                   'scrolling': 'no',
                   'transitionIn': 'none',
                   'transitionOut': 'none',
                   'type': 'iframe',
                   'autoScale': false,
                   'href': "account_selection.php",
                   iframe: {
                      preload: false,
                      'autoScale': false,
                      'scrolling': 'no'
                   }
                });

             }

          });





                  


         });


         $('body').on('click', function(e) {
            $('[data-toggle="popover"]').each(function() {
               //the 'is' for buttons that trigger popups
               //the 'has' for icons within a button that triggers a popup
               if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                  $(this).popover('hide');
               }
            });
         });
            </script>