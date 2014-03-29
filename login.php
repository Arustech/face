<?php
require('lib/Main.php');
$main = new Main;
$member = $main->load_model('Member');
if ($member->check_user())
   $main->go('index');
?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">	
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../img/favicon.png">
      <title>Knownfaces</title>
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="plugins/uniform/themes/aristo/css/uniform.aristo.min.css" rel="stylesheet">
      <link href="css/PIE.htc" rel="stylesheet">
      <link href="plugins/qtip/jquery.qtip.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.placeholder.js"></script>
      <script src="plugins/noty/jquery.noty.js"></script>
      <script src="plugins/noty/layouts/top.js"></script>
      <script src="plugins/noty/themes/default.js"></script>
      <script type="text/javascript" src="plugins/validation/core.js"></script>
      <script type="text/javascript" src="plugins/validation/delegate.js"></script>
      <script type="text/javascript" src="plugins/qtip/jquery.qtip.min.js"></script>
      <script type="text/javascript" src="plugins/uniform/jquery.uniform.js"></script>



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






   </head>   
   <style>
      .modal-dialog {
         margin: 0;
         position: absolute;
         top: 50%;
         left: 50%;
         width:500px;
      }

      .btn-primary {
         background-color: #2BB9DD;
         border-color: #357EBD;
         color: #FFFFFF;
      }

      .btn-primary:hover {
         background-color: #F89924;

      }
      .radio-inline{
         margin-left: 20px;
         padding-left: 0;
         vertical-align: text-top;
         
      }
      .radio-label
      {
        font-size:12px;
        vertical-align: middle;
        margin-left:-10px
      }
      .uniform
      {
         cursor: pointer;
      }
      

   </style>
   <?php
   if (isset($_POST['btn_login'])) {
      $user = $member->check_login($_POST);
   }
   if (isset($_POST['btn_register'])) {
      $member->register_member($_POST);
   }
   if (isset($_POST['btn_forgot'])) {
      $member->forgot_member($_POST['user_email']);
   }
   ?>
   <body>
      <!--<div class="topbar">
         <div class="one"></div>
         <div class="two"></div>
         <div class="one"></div>
         <div class="two"></div>
         <div class="one"></div>
         <div class="two"></div>
         <div class="one"></div>
         <div class="two"></div>
      </div>-->
      <div class="header-wrraper-login">
         <div class="container">
            <div class="header">
               <div class="col-lg-12" >
                  <div class="col-lg-4 logo">
                     <!-- Button trigger modal -->

                     <!-- Modal -->
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Forgot Password" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" st  data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title" id="myModalLabel"><h3>Forgot Password ?</h3></h4>
                              </div>
                              <div class="modal-body">
                                 <form method="post" action='#' name="frm_forgot" id="frm_forgot">
                                    <p><input type="email" class="form-control" name="user_email" autocomplete="off" id="user_email_forgot" placeholder="Email"></p>

                                    <p><button type="submit" name="btn_forgot" class="btn btn-primary">Submit</button>

                                    </p>
                                 </form>
                              </div>
                              <div class="modal-footer">

                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Modal Ends -->

                     <img src="img/logo.png" alt="Knowfaces" >
                  </div>
                  <div class="col-lg-8 login-panel">	
                     <form class="form" id="frm_login" name="frm_login" role="form" action="login" method="POST">
                        <div class="email-phone">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="user_email" tabindex="1" autocomplete="off" required="" name="user_email" placeholder="Email Address">
                           </div>
                           <div class="squared">
                              <input type="checkbox" tabindex="3" class="checked uniform" value="yes" id="squared"  name="remember" />
                              <label for="squared"></label>
                              <p class="help-block">Keep me logged in</p>
                           </div>

                        </div>
                        <div class="pasword">
                           <div class="form-group">
                              <label for="Password">Password</label>
                              <input tabindex="2" type="password" class="form-control  required" autocomplete="off" id="Password" name="user_pwd" id="user_pwd" placeholder="Password">
                           </div>

                           <div class="form-group">

                              <label for="Password"><a style="color:white;" href="#" data-toggle="modal" data-target="#myModal">Forgot your password?</a ></label>
                           </div>
                        </div>
                        <div class="login"><button type="submit" name="btn_login" class="btnn btn-default">LOGIN</button></div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="content top_0">
         <div class="container">
            <div class="col-lg-12">
               <div class="col-lg-7 col-left">
                  <h1>Knownfaces</h1>
                  <p> helps you connect and<br />
                     share with the people in your<br />
                     <strong>business &amp; life.</strong>
                  </p>
                  <img src="img/content-bg.jpg" alt="">
               </div>
               <div class="col-lg-5 col-right">
                  <div class="top-heading">
                     <h1>Sign Up Now</h1>
                     <p>It's free and always will be.
                     </p>
                  </div>
                  <form action="login" method="POST" name="frm_register" id="frm_register" class="sign-form">
                     <div class="form-group">
                        <label for="First Name" class="col-lg-4 control-label">First Name:</label>
                        <div class="col-lg-8"><input id="user_first_name" name="user_first_name" type="text" size="" maxlength="12" class="form-control required"></div>
                     </div>
                     <div class="form-group">
                        <label for="Last Name" class="col-lg-4 control-label">Last Name:</label>
                        <div class="col-lg-8"><input id="user_last_name" name="user_last_name" type="text" size="" maxlength="" class=" form-control required"></div>
                     </div>
                     <div class="form-group">
                        <label for="Your Email" class="col-lg-4 control-label">Your Email:</label>
                        <div class="col-lg-8"><input id="user_email_o" name="user_email" type="email" size="" maxlength="" class=" form-control required"></div>
                     </div>
                     <div class="form-group">
                        <label for="Re-enter Email" class="col-lg-4 control-label">Re-enter Email:</label>
                        <div class="col-lg-8"><input id="user_email_c" name="user_email_c" type="email" size="" maxlength="" class=" form-control"></div>
                     </div>
                     <div class="form-group">
                        <label for="Password" class="col-lg-4 control-label">Password:</label>
                        <div class="col-lg-8"><input id="user_pwd" name="user_pwd" type="password" size="" maxlength="" class=" form-control required"></div>
                     </div>

                     <div class="form-group">
                        <label for="I am" class="col-lg-4 control-label">I am:</label>
                        <div class="col-lg-8">
                           <select name="gender" class="select form-control" id="gender">
                              <option value="Unspecified">Please select</option>
                              <option  value="Male">Male</option>
                              <option  value="Female">Female</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-12">
                           <label class="col-lg-4 control-label" id="optionsRadio">Account Type:</label>
                           <div class="col-lg-8" style="margin-left: -23px;margin-top: 9px;">

                              <label class="radio-inline">
                                 <input type="radio" class="uniform required"  style="padding:0px;margin:0px" name="user_type" value="Personal">
                                 <span class="radio-label">Personal</span>
                              </label>
                              <label class="radio-inline">
                                 <input type="radio"  class="uniform required" style="padding:0px;margin:0px" name="user_type" value="" >
                                 <span class="radio-label">Business</span></label>


                           </div>


                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="signin"><button type="image" name="btn_register" class=""> <img src="img/signgup.png" alt="Search"></button></div>
                     </div>
                  </form> 	
               </div>

            </div>
         </div>
      </div>

      <div class="footer-1">
         <div class="container">
            <div class="col-lg-12 footer1-content">

               <a href="" class="btn-1"><img src="img/friend-btn.png" alt="">
               </a>

               <a href="" class="btn-2"><img src="img/yourlife-btn.png" alt="">
               </a>
               <a href="" class="btn-3"><img src="img/youlooking-btn.png" alt="">
               </a>

            </div>
         </div>
      </div>
      <div class="footer-2">
         <div class="container">
            <div class="col-lg-12 footer-menu">
               <ul>
                  <li><a href="">Home</a></li>
                  <li><a href="">About Us</a></li>
                  <li><a href="">Why Knownfaces</a></li>
                  <li><a href="">Knownfaces network</a></li>
                  <li><a href="">Trading Activity</a></li>
                  <li><a href="">Groups</a></li>
                  <li><a href="">Forum</a></li>
                  <li><a href="">Find Help</a></li>
                  <li><a href="">Members</a></li>
                  <li><a href="">Blog</a></li>
                  <li><a href="">Contact Us</a></li>
               </ul>
            </div>
            <div class="clo-lg-12 copy-right">
               <p>© Copyright 2013 Knownfaces. All Right Reserved. </p>
            </div>
         </div>
      </div>
      <div class="bottombar">
         <div class="one"></div>
         <div class="two"></div>
         <div class="one"></div>
         <div class="two"></div>
         <div class="one"></div>
         <div class="two"></div>
         <div class="one"></div>
         <div class="two"></div>
      </div>

      <script type="text/javascript">

         function adjustModalMaxHeightAndPosition() {
            $('.modal').each(function() {
               if ($(this).hasClass('in') == false) {
                  $(this).show();
               }
               ;
               var contentHeight = $(window).height() - 60;
               var headerHeight = $(this).find('.modal-header').outerHeight() || 0;
               var footerHeight = $(this).find('.modal-footer').outerHeight() || 0;

               $(this).find('.modal-content').css({
                  'max-height': function() {
                     return contentHeight;
                  }
               });

               $(this).find('.modal-body').css({
                  'max-height': function() {
                     return (contentHeight - (headerHeight + footerHeight));
                  }
               });

               $(this).find('.modal-dialog').css({
                  'margin-top': function() {
                     return -($(this).outerHeight() / 2);
                  },
                  'margin-left': function() {
                     return -($(this).outerWidth() / 2);
                  }
               });
               if ($(this).hasClass('in') == false) {
                  $(this).hide(); /* Hide modal */
               }
               ;
            });
         }
         ;
         $(window).resize(adjustModalMaxHeightAndPosition).trigger("resize");

         $(document).ready(function() {


            $("input[type='checkbox']").uniform();
            $("input[type='radio']").uniform();
            $('#frm_forgot').validate({
               onkeyup: false,
               rules: {
                  user_email: {
                     required: true,
                     email: true,
                     remote: {
                        url: "ajax.php",
                        type: "post",
                        data: {
                           user_email: function() {
                              return $('#user_email_forgot').val();
                           },
                           action: 'check_email'

                        }
                     }



                  }
               },
               success: function(error) {
                  setTimeout(function() { // Use a mini timeout to make sure the tooltip is rendred before hiding it
                     $('#frm_forgot').find('.valid').qtip('destroy');
                  }, 1);
               },
               messages: {
                  user_email: {
                     required: 'Please enter your email',
                     remote: 'This email does not exist'
                  }


               },
               /* submitHandler: function (form) {
                // my ajax
                return false;
                },*/
               errorPlacement: function(error, element) {
                  var cornersAt = ['right center', 'right left'], // Set positioning based on the elements position in the form
                          cornersMy = ['right bottom', 'bottom left'],
                          flipIt = $(element).parents('div.left').length > 0,
                          position = {
                             at: cornersAt[flipIt ? 0 : 1],
                             my: cornersMy[flipIt ? 0 : 1]
                          },
                  offset = flipIt ? 6 : 35;
                  $(element).filter(':not(.valid)').qtip({// Apply the tooltip only if it isn't valid
                     overwrite: false,
                     content: error,
                     position: position,
                     show: {
                        event: false,
                        ready: true
                     },
                     hide: false,
                     style: {classes: 'qtip-tipsy',
                        tip: {
                           corner: true,
                           offset: offset
                        }
                     }
                  }).qtip('option', 'content.text', error);
               } // closes errorPlacement
            }); // closes validate()


            $('#frm_register').validate({
               onkeyup: false,
               rules: {
                  user_email: {
                     required: true,
                     email: true,
                     remote: {
                        url: "ajax.php",
                        type: "post",
                        data: {
                           user_email: function() {
                              return $('#user_email_o').val();
                           },
                           action: 'check_email_already'

                        }
                     },
                  },
                  user_email_c: {
                     equalTo: '#user_email_o'

                  }
               },
               success: function(error) {
                  setTimeout(function() { // Use a mini timeout to make sure the tooltip is rendred before hiding it
                     $('#frm_register').find('.valid').qtip('destroy');
                  }, 1);
               },
               messages: {
                  user_first_name: {required: 'Please enter your first name'},
                  user_last_name: {required: 'Please enter your last name'},
                  user_email: {required: 'Please enter your email', remote: 'This email already exists'},
                  user_pwd: {required: 'Please enter your password'},
                  user_type: {required: 'Please choose your account type'},
                  user_email_c: {equalTo: 'Please enter the same email again'}

               },
               /* submitHandler: function (form) {
                // my ajax
                return false;
                },*/
               errorPlacement: function(error, element) {
                  var cornersAt = ['right center', 'right left'], // Set positioning based on the elements position in the form
                          cornersMy = ['right bottom', 'bottom left'],
                          flipIt = $(element).parents('div.left').length > 0,
                          position = {
                             at: cornersAt[flipIt ? 0 : 1],
                             my: cornersMy[flipIt ? 0 : 1]
                          },
                  offset = flipIt ? 6 : 35;
                  $(element).filter(':not(.valid)').qtip({// Apply the tooltip only if it isn't valid
                     overwrite: false,
                     content: error,
                     position: position,
                     show: {
                        event: false,
                        ready: true
                     },
                     hide: false,
                     style: {classes: 'qtip-tipsy',
                        tip: {
                           corner: true,
                           offset: offset
                        }
                     }
                  }).qtip('option', 'content.text', error);
               } // closes errorPlacement
            }); // closes validate()





            $('#frm_login').validate({
               rules: {
                  user_email_c: {
                  }
               },
               success: function(error) {
                  setTimeout(function() { // Use a mini timeout to make sure the tooltip is rendred before hiding it
                     $('#frm_login').find('.valid').qtip('destroy');
                  }, 1);
               },
               messages: {
                  user_pwd: {required: 'Please enter your password'},
                  user_email: {required: 'Please enter your registered email'},
               },
               /* submitHandler: function (form) {
                // my ajax
                return false;
                },*/
               errorPlacement: function(error, element) {
                  var cornersAt = ['right center', 'right left'], // Set positioning based on the elements position in the form
                          cornersMy = ['right bottom', 'bottom left'],
                          flipIt = $(element).parents('div.left').length > 0,
                          position = {
                             at: cornersAt[flipIt ? 0 : 1],
                             my: cornersMy[flipIt ? 0 : 1]
                          },
                  offset = flipIt ? 6 : 35;
                  $(element).filter(':not(.valid)').qtip({// Apply the tooltip only if it isn't valid
                     overwrite: false,
                     content: error,
                     position: position,
                     show: {
                        event: false,
                        ready: true
                     },
                     hide: false,
                     style: {classes: 'qtip-tipsy',
                        tip: {
                           corner: true,
                           offset: offset
                        }
                     }
                  }).qtip('option', 'content.text', error);
               } // closes errorPlacement
            }); // closes validate()




         });
      </script>


   </body>

</html>