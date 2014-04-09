<?php
include("lib/Main.php");
$main = new Main;
$member = $main->load_model('Member');
$profile = $main->load_model('BasicProfile');
$obj_user = $main->load_model("User");
$obj_noti = $main->load_model("Notification");

$user = $member->check_user();
if (!$user)
 $main->go('login');
$profile_basic = $profile->getBasicProfileByID($user['user_id']);

$visit_username ="";
$visit_user_id="";
$visitor=0; // check if anyone wants to visit other's timeline... please view process in timeline_feed.php
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
      <script src="js/common.js"></script>
      <script src="js/jquery.placeholder.js"></script>
      <script type="text/javascript" src="plugins/fancybox/jquery.fancybox.pack.js"></script>
      <link rel="stylesheet" type="text/css" href="plugins/fancybox/jquery.fancybox.css" media="screen" />
    <link href="plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet">
    <script type="text/javascript" src="plugins/bootstrap-tag/bootstrap-tagsinput.js"></script>
    
        <link rel="stylesheet" href="plugins/rollbar/css/jquery.rollbar.css" />
<!--        <script type="text/javascript" src="plugins/rollbar/js/jquery-1.7.2.min.js"></script>-->
	<script type="text/javascript" src="plugins/rollbar/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="plugins/rollbar/js/jquery.rollbar.min.js"></script>
	<script type="text/javascript">
	  $(document).ready(function(){
	  	$('.user-comm').rollbar({zIndex:80}); 
                
                $('.user-comm-msg').rollbar({zIndex:80}); 
//	  	$('body').rollbar({zIndex:80});
	  });
	</script>
   


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
 <!--<script type="text/javascript" src="plugins/confirmbox/bootstrap-confirmation.js"></script>-->
 <link href="plugins/bootstrap-dialog/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
 <script src="plugins//bootstrap-dialog/js/bootstrap-dialog.min.js"></script>
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
      .noti_message{

        //color: #3D4E60;
        font-size: 12px;
        font-weight: normal;
        margin-left: 9px;
      }

      .footer a
      {

         color: #828282 !important;
      }

      .footer
      {
         /* border-top: 1px solid #EBEBEB;*/
         height: 35px;
         padding-left: 13px;
         padding-top: 6px;
         width: 237px;
         font-family: sans-serif;
      }


      .time {

         color: #0070a3;
      }
      
      .time_noti{
        float: right;
         font-size: 11px;
      }
      
      
      .top-panel ul li {
         float: left;
         padding: 0 2px;
      }

      .user_name{
         float: right

      }
      .user_name li{padding: 0 5px !important;}
      .modal-dialog {
        margin: 157px !important;
        position: relative !important;
        
}
.modal {
    z-index: 1033333 !important;
}

.make_btn{
    
    background-color: #FFFFFF;
    border-radius: 3px;
    margin: -2px;
    
   // color: #4D7397;
    padding: 2px 4px;
    border-color: #CCCCCC;
   
}
.make_btn:hover{
    text-decoration:none;
     background-color: #0897B9;
     color:#FFFFFF  !important;
}

.make_btn_home{
    background-color: #0897B9;
    border-radius: 3px;
    color:#FFFFFF;
    padding: 2px 4px;
    margin: -2px;
    border-color: #CCCCCC;

}
.make_btn_home:hover{
    text-decoration:none;
    background-color: #0897B9;
    color:#FFFFFF  !important;
}
.top_ico {
    min-width: 8%;
    text-align: left !important;
}
      
      </style>
      <?php
      if (isset($_GET['a'])) {
         $friend_id = $_GET['a'];
         $member->make_friends($user['user_id'], $friend_id);
      }
      if (isset($_GET['r'])) {
         $friend_id = $_GET['r'];
         $member->reject_friends($user['user_id'], $friend_id);
      }
      
      ?>
      <body class="subpage">



         <div class="header-wrraper navbar-fixed-top">

           <!-- <div class="topbar">

               <div class="one"></div>

               <div class="two"></div>

               <div class="one"></div>

               <div class="two"></div>

               <div class="one"></div>

               <div class="two"></div>

               <div class="one"></div>

               <div class="two"></div>

            </div>-->


            <div class="container">


               <div class="header ">

                  <div class="col-lg-12" >

                     <div class="col-lg-4 logo"> <img src="img/logo.png" alt="Knowfaces" > </div>
                     <div class="col-lg-6 top-panel">
                        <ul>

                           <li class="top_ico">
                               <a href="#" class="button popover-request" data-remotecontent="popover.php?type=friends" id="friends_a" data-toggle="popover" title="Friend Requests"  >
                                 <span style="font-size: 15px ; right: -12px ;position: relative" class="glyphicon glyphicon-user"></span>
                                    <span style="font-size: 17px" class="glyphicon glyphicon-user"></span>
                                    <?php
                                    $friend_counts = $member->get_count_requests($user['user_id']);
                                    if ($friend_counts){
                                      $hide2="";}
                                        else{$hide2="style='display:none'";}
                                       ?>
                                    <span id="friend_requests" class="badgee"  <?=$hide2?>  style="right:11px"><?= $friend_counts ?></span></a>
                                 
                              </li>

 <li class="top_ico">
     <a href="#" class="button popover-messages " data-remotecontent="popover.php?type=messages" id="msg_a"  data-toggle="popover" title="<a style='color:#333333' href='message.php'>New Messages</a>"  >
                                    <span style="font-size: 17px" class="glyphicon glyphicon-comment"></span>
                                   
                                   
                                    
                                                                       <?php
                                    
//                                      $msg_counts = $member->get_count_message($user['user_id']);
//                                    if ($msg_counts) {
//                                        $hide="";}
//                                        else{$hide="style='display:none'";}
                                         $hide="style='display:none'";
                                       ?>
                                <span class="badgee" id="msg1" <?=$hide?> style="right:11px"><?=$msg_counts?></span></a>
<!--                                       <span class="badgee" style="right:11px"><?=$msg_counts?></span></a>-->
                                
                              </li>
                              
                              <li class="top_ico">
                                 <a href="#" class="button popover-noti noti_count" data-remotecontent="popover.php?type=noti" data-toggle="popover" title="Notifications"  >
                                  <span style="font-size: 17px" class="glyphicon glyphicon-globe">
                              <?php 
                                            
                                            $noti_count = $obj_noti->getUserNotiCount();
                                    if($noti_count > 0)
                                    {
                                        $hide1="";
                                    }
                                     else{$hide1="style='display:none'";}  
                                         ?>
                                  </span> <span class="badgee" id="noti" <?=$hide1?>><?=$noti_count;?></span></a>
                                
                                   
                              </li>

                              <!--                        <li><a href="./">Home</a></li>-->

                              <!--            <li><a href="">Find Friends</a></li>-->

<!--                        <li><a href="" class="active"><?php // $main->truncate(ucfirst($profile_basic['first_name']), 5, false)    ?></a></li>

                        <li><a href=""><img src="img/lock.png" alt="" title="lock"></a></li>

                        <li class="last"><a href=""><img src="img/setting.png" alt="" title="setting"></a></li>-->
                              <div class="user_name" >
                                  <li><a class="make_btn_home" href="index">Home</a></li>
                                  <li><a style="color: #4D7397"  class="make_btn frnds" href="friends">Friends</a></li>
                                 <li><a style="color: #4D7397" class="make_btn" href="timeline_wall.php">Settings</a></li>

                                 
                                 <li><a style="color: #4D7397" class="make_btn" href="<?=$main->config['web_path']?>logout.php">Logout</a></li>
                                 <li><a href="" class="active"><?= $main->truncate(ucfirst($profile_basic['first_name']), 10, false) ?></a></li>
<!--                                 <li><a href="logout.php"><span style="font-size:16px " class="glyphicon glyphicon-off"></span></a></li>-->

<!--                                 <li class="last"><a href=""><img src="img/setting.png" alt="" title="setting"></a></li>-->
                              </div>
                           </ul>


                           </ul>

                        </div>

                        <div class="col-lg-8 login-panel">

                           <div class="col-lg-12">
                              <form method="POST" action="search">
                                  <div  class="input-group custom-search-form">

                                    <input style="height: 27px;" name="search" type="text" class="form-control" placeholder="Search for People...">


                                    <span class="input-group-btn">

                                       <button style="height: 27px; padding:3px 3px" class="btn" type="submit"> <span class=""><img src="img/search.png" height="20" alt=""></span> </button>

                                    </span> </div></form>

                              <!-- /input-group --> 

                           </div>

                        </div>

                     </div>

                  </div>

               </div>



            </div>
            <div style="clear: both"></div>
            <div class="content">

               
           
               
               
               <script type="text/javascript">
         $(document).ready(function() {
             
             $(".noti_count").click(function(){
                  $.ajax(
                          {
                             async: false,
                             url: 'ajax.php',
                             type: "POST",
                             data: {action:'noti_count',user_id:<?=$user['user_id']?>},
                             success: function(data)
                             {
                                    $("#noti").hide();
                             }
                          });
             });
             
             ///////////////////// removing msgs badge ///////////////////////
              $("#msg_a").click(function(){
                  $.ajax(
                          {
                             async: false,
                             url: 'ajax.php',
                             type: "POST",
                             data: {action:'msg_count',user_id:<?=$user['user_id']?>},
                             success: function(data)
                             {
                                    $("#msg1").hide();
                             }
                          });
             });
             
             

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~///////////////////
            $(".popover-request").popover({
               placement: 'bottom',
               //title : '<div style="text-align:center; color:red; text-decoration:underline; font-size:14px;"> Muah ha ha</div>', //this is the top title bar of the popover. add some basic css
               html: 'true',
               content: get_popover_content,
               trigger: 'click'
            });




            $(".popover-messages").popover({
               placement: 'bottom',
               html: 'true',
               content:get_popover_content,
               trigger: 'click'
               
            });
            
           

            $(".popover-noti").popover({
               placement: 'bottom',
               html: 'true',
               content: get_popover_content,
               trigger: 'click'

            });
            
            function get_popover_content() {
                if ($(this).attr('data-remotecontent')) {
                    // using remote content, url in $(this).attr('data-remotecontent')
                    //$(this).addClass("loading");
                    var content = $.ajax({
                        url: $(this).attr('data-remotecontent'),
                        type: "GET",
                        data: $(this).serialize(),
                        dataType: "html",
                        async: false,
                        success: function() {
                            // just get the response
                        },
                        error: function() {
                            // nothing
                        }
                    }).responseText;
                    var container = $(this).attr('data-rel');
                   // $(this).removeClass("loading");
                    if (typeof container !== 'undefined') {
                        // show a specific element such as "#mydetails"
                        return $(content).find(container);
                    }
                    // show the whole page
                    return content;
                }
                // show standard popover content
                return $(this).attr('data-content');
            }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~///////////////////
            $(document).on('click','.btn_accept_top',function(){
                  
                    $(this).replaceWith('<select class="add_to_type" name="friends"><option value="-1">Add to</option><option value="family">Family</option><option value="friends">Friend</option></select>');
            });
            
            $(document).on('change','.add_to_type',function(){
               var parent       =  $(".add_to_type").parents("span:first");
               var request_by   =   parent.attr('id');
               var access_val  = $(this).val();
                if(access_val!=-1)
                {
                    var data    = access_val+'_'+request_by;
                    window.location.href="index?a="+data;
                }
                
               
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
                  var data_json = {'emailid': str};

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


////////////////////////////////////////////////trigger/////////////////////////

var Trigger = function(){
    var jsondata={action:"trigger"};
  CallAjaxPW('', jsondata, 'ajax_trigger.php', function callBack(data) {
                              var parsed_data=  jQuery.parseJSON(data);
                              
                                if (parsed_data)
                                   {
                                     
                                      if(parsed_data[0].messages>0){
                                          
                                          if($('#msg1').css('display')=='none'){
                                            $('#msg1').show();
                                            $('#msg1').text(parsed_data[0].messages);
                                        }
                                        else{
                                           $('#msg1').text(parsed_data[0].messages); 
                                        }
                                          
                                      }
                                     else if(parsed_data[0].messages==0){
                                           $('#msg1').hide();
                                        }
                                       if(parsed_data[0].friend_requests>0){
                                          
                                          if($('#friend_requests').css('display')=='none'){
                                            $('#friend_requests').show();
                                            $('#friend_requests').text(parsed_data[0].friend_requests);
                                        }
                                        else{
                                           $('#friend_requests').text(parsed_data[0].friend_requests); 
                                        }
                                          
                                      }
									    else if(parsed_data[0].friend_requests==0){
                                           $('#friend_requests').hide();
                                        }
                                      if(parsed_data[0].notifications>0){
                                          
                                          if($('#noti').css('display')=='none'){
                                            $('#noti').show();
                                            $('#noti').text(parsed_data[0].notifications);
                                        }
                                        else{
                                           $('#noti').text(parsed_data[0].notifications); 
                                        }
                                          
                                      }
                                    
                               }
                                else
                                   {
                                   }
                              });
                          };
                           
/////////////////////////////Calling Trigger////////////////////////////////////
                        
setInterval(Trigger,5000);
                            
 
////////////////////////////////////////////////////////////////////////////////





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
         
         // deleting single comments 
         $(document).on('click','.del_comment',function(){
            var get_id = $(this).attr('id');
            get_id     = get_id.split('_');
            var id         = get_id[1];
            
            BootstrapDialog.confirm('Are you sure you want to delete?', function(result){
            if(result) {
            
            var postData = {action: 'del_comment',comment_id:id};
             CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                if (data == 'true')
                {
                   $("#comment_div_"+id).hide();
                }
                else
                {
                   noty({type: 'error', text: 'Our support team is working on it ! Thanks'});
                }
          }); 
            }else {
              
            }
        });
           
         });
         
         
         // deleting single comments 
         $(document).on('click','.report',function(){
            var get_id = $(this).attr('id');
            
                               
            var postData ={action: 'report',data:get_id};
             CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                if (data == 'true')
                {
                   $("#"+get_id).text('Reported');
                }
                else
                {
                   noty({type: 'error', text: 'Our support team is working on it ! Thanks'});
                }
          }); 
           
           
           
           
           
         });
         
         
         
                  </script>
               <div class="container">