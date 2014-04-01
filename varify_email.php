<?php
require('lib/Main.php');
$main = new Main;
$member = $main->load_model('Member');


if (isset($_GET['submit_email'])){
    
 
 $member->re_varify_email($_GET['email_verify']);  
 header('Location:login.php?email_verify');

    
}
$varify ='';
if (isset($_GET['varify'])){
$varify = $_GET['varify'];
}
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

      <style>
          .Verification{
              
    background-color: #E5E5E5;
    border-radius: 13px;
    color: #4D7397;
    margin: 0 auto 55px;
    padding: 25px 32px 50px 36px;
    width: 70%;
              
          }
          

          
      </style>




   </head>   


   <body>

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
              
                            <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Verify Your email address</legend>


<div class="Verification">
<p>
<ul><b>If you have trouble receiving your Inbox Verification E-mail, try the following:</b>
<br><br>
    <li>Wrong Address Make sure that you have typed in the correct e-mail address.</li>
    <li>Junk Mail Filter Make sure that the Verification E-mail did not get filtered into the junk mail folder of your e-mail application.</li>
</ul>
</p>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email_verify">Resend Verification E-mail</label>
  <div class="controls">
      <input disabled="" id="email_verify" name="email_verify" value="<?=$varify?>" class="input-large form-control" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit_email" class="btn btn-primary">Send E-mail</button>
  </div>
</div>

</fieldset>
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