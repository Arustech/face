<?php
require('header.php');
require('top_panel.php');
$post_id    = "";
if(isset($_GET['mod']) && $_GET['mod']=='sp')
{
    $post_id    = $_GET['p_id'];
    
    
}


?>
<link href="fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
<link href="plugins/bootstrap-select/bootstrap-select.css" rel="stylesheet">
<script type="text/javascript" src="plugins/autosize/jquery.autosize.js"></script>
<script type="text/javascript" src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
<!-- JavaScript Includes -->
<link href="plugins/jqupload/assets/css/style.css" rel="stylesheet" />
<script src="plugins/jqupload/assets/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->

<script src="plugins/jqupload/assets/js/vendor/jquery.ui.widget.js"></script>
<script src="plugins/jqupload/assets/js/load-image.min.js"></script>
<script src="plugins/jqupload/assets/js/canvas-to-blob.min.js"></script>
<script src="plugins/jqupload/assets/js/jquery.iframe-transport.js"></script>
<script src="plugins/jqupload/assets/js/jquery.fileupload.js"></script>
<script src="plugins/jqupload/assets/js/jquery.fileupload-process.js"></script>
<script src="plugins/jqupload/assets/js/jquery.fileupload-image.js"></script>
<script src="plugins/jqupload/assets/js/jquery.fileupload-audio.js"></script>
<script src="plugins/jqupload/assets/js/jquery.fileupload-video.js"></script>
<script src="plugins/jqupload/assets/js/jquery.fileupload-validate.js"></script>
<link href="plugins/preloader/preloader.css" rel="stylesheet">
<script src="plugins/preloader/jquery.isloading.js"></script>
<script src="plugins/codo_player/CodoPlayer.js"></script>


<!--Uploadify-->
<script src="plugins/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="plugins/uploadify/uploadify.css">



<!--For Basic Slider-->
<link href="plugins/basic-slider/bq.css" rel="stylesheet">
<script src="plugins/basic-slider/js/bq.js"></script>



<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="plugins/jqupload/assets/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<!--  main JS Upload file -->
<script src="plugins/jqupload/assets/js/script.js"></script>

<script language="JavaScript">

   function createCookie(name, value, days) {
      if (days) {
         var date = new Date();
         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
         var expires = "; expires=" + date.toGMTString();
      }
      else
         var expires = "";
      document.cookie = name + "=" + value + expires + "; path=/";
   }

   function readCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
         var c = ca[i];
         while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
         if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
      }
      return null;
   }

   function eraseCookie(name) {
      createCookie(name, "", -1);
   }

   var backColor = new Array();


   backColor[2] = '#E2E2E2';
   backColor[3] = '#FFC0CB';
   backColor[4] = '#FFFFFF';
   backColor[5] = '#293541';


   function changeBG(whichColor) {
      document.body.style.backgroundColor = backColor[whichColor];
      createCookie('backColor', whichColor);
   }

   if (readCookie('backColor'))
      document.write('<style type="text/css">body {background-color: ' + backColor[readCookie("backColor")] + ';}<\/style>');

</script>

<style>
   .glyphicon:empty {
      width: 1.3em;
   }
   .status_wrapper{

      width: 70%;
      min-height: 62px;
      margin: 5px 0 10px 0; 
      //border-bottom: 0.05px solid #E4E3E3;

   }
   .status_footer{

      float: right;
      margin-top: 5px;
      margin-bottom: 5px;
      width: 100%;
   }
   .status_post{

      width: 70px;
      float: right;
      margin-left: 5px;
   }
   .status-image-panel {

      float: left;
      height: 29px;
      margin-left: 14px;
      margin-top: 3px;
   }
   .status-image-panel ul
   {
      list-style-type: none;
   }
   .status-image-panel img
   {
      height: 25px !important;
      width: 25px !important;
   }
   .status-image-panel a {
      margin-right: 5px;
   }

   .dropdown_{
      width: 75px;
      float: right;
   }

   .btn-xlarge {
      padding: 8px 21px;
      line-height: normal;
   }

   .form-group {
      margin-bottom: 5px!important;
   }

   .update{

      font-family: sans-serif;
      color: #016E88 ;
   }
   .dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-submenu:hover>a,.dropdown-submenu:focus>a {
      text-decoration: none;
      color: #ffffff;
      background-color: #0081c2;
      background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
      background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
      background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
      background-image: -o-linear-gradient(top, #0088cc, #0077b3);
      background-image: linear-gradient(to bottom, #0088cc, #0077b3);
      background-repeat: repeat-x;
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0);
   }
   .glyphicon.active{
      color:#C0C0C0;

   }

</style>


<div class="strip"> <span class="lt"></span>

   <p style="float: left">What&#39;s new in your networks</p>

<div class="bg_clr" style="float: right; width: 232px">
    <span class="lt"></span>
    <a href="javascript:changeBG(4)"><button style="padding: 2px 4px; margin-bottom: 5px; font-size: 10px" class="btn btn-default" type="button"><img src="img/sun.png">&nbsp;White</button></a>
    <a href="javascript:changeBG(5)"><button style="padding: 2px 4px; margin-bottom: 5px; font-size: 10px" class="btn btn-default" type="button"><img src="img/moon.png">&nbsp; Dark</button></a>
    <a href="javascript:changeBG(2)"><button style="padding: 2px 4px; margin-bottom: 5px; font-size: 10px" class="btn btn-default" type="button"><img src="img/color_fill.png">&nbsp; Gray</button></a>
    <a href="javascript:changeBG(3)"><button style="padding: 2px 4px; margin-bottom: 5px; font-size: 10px" class="btn btn-default" type="button"><img src="img/color_palette.png">&nbsp; Pink</button></a>   

   </div>
</div>
<div style="clear:both"></div>







                     <div class="divider"></div>

                    <div class="loop-container">
                    <?php
                    
                    if(!empty($post_id)){
                    $posts_ = $main->load_model('Posts');
                    $posts = $posts_->getPostById($post_id,$user['user_id']);
                    echo $posts;
                    }
                    ?>
                    </div>
                    <script type="text/javascript">
                    $(function() {
                    $('#post_comment').autosize();
                    });

                    </script>

                     <script>


                        $(document).on('click', '.btn_comment', function(e) {
                           e.preventDefault();
                           var btn = $(this);
                           var desc = btn.parent().prev().find('textarea');
                           var img = desc.parent().prev().find('img').attr('src');
                           var post_id = btn.attr('data-post-id');
                           var panel = '#comments-' + post_id;
                           var sendData = {
                              'comment_by': btn.attr('data-comment-by'),
                              'post_id': post_id,
                              'description': desc.val(),
                              'action': 'post_comment',
                              'img': img
                           };




                           if (desc.val() != '')
                           {


                              CallAjaxPW('', sendData, 'ajax.php', function callBack(data) {
                                 if (typeof (data) != 'undefined')
                                 {
                                    $(panel).prepend(data);
                                    $(panel).parent().fadeIn('slow');
                                    desc.val("");
                                 }
                                 else
                                 {

                                 }
                              }, function b() {
                                 preload1_start(btn);
                              }, function c() {
                                 preload_stop(btn);
                              });


                           } else
                           {
                              desc.attr('placeholder', 'please write comment......');
                           }

                        });




                        $(function() {


                            $('.banner-fade').each(function(){
                                            
                                       $(this).bjqs({
                                        height: 367,
                                        width: 365,
                                        responsive: true
                                        });
                                        });


                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};
                           $('#post_message').click(function(e) {

                              var text = $('#status_area_msg');
                              var msg = text.val();
                              var user_access = $("#selected_users").val();
                              var postData = {action: 'post_message', msg: msg, posted_by_user_id:<?= $user['user_id'] ?>,user_access:user_access,post_access: $(".selectpicker").val()};
                              CallAjaxPW('', postData, 'ajax_msg.php', function callBack(data) {
                                 if (data == 'true')
                                 {
                                    text.val('');
                                    location.reload(); 
                                 }
                                 else
                                 {
                                    noty({type: 'error', text: 'Some error occurred'});

                                 }
                              }, function b() {
                                 preload1_start('.status_wrapper');
                              }, function c() {
                                 preload_stop('.status_wrapper');
                              });


                           })




                           $('.three_icons').click(function(e) {
                              $('.btn_post').unbind();
                              e.preventDefault();
                              $('.post_icon').removeClass('active');
                              $(this).children().addClass('active');
                              var id = $(this).prop('id');
                              
                              var canvas = '#' + id.replace('icon', 'canvas');
                              var post = id.replace('icon', 'post');
                              
                              $('.btn_post').prop('id', post);
                              $('.post_canvas').hide();

                              $(canvas).show('.fadeIn');

                           });


                           $('.three_icons').tooltip();
                           $('.selectpicker').selectpicker();
                           $(".status_wrapper").on('click focus', function() {
                              $(".status_footer").fadeIn(1000);
                              var txt = $('#status_area_msg');
                              txt.prop('rows', 3);
                              txt.autosize();
                           });
                        });
                        
                        $(document).on('click',"#btn_access",function(){
                           var access   = $("#selected_users").val();
                           $.fancybox({closeClick:true});
                         });
                         
                         $('.del_post').click(function() {
                             
                             var get_id = $(this).attr('id');
                             get_id     = get_id.split('_');
                             var id         = get_id[1];
                             
                             BootstrapDialog.confirm('Are you sure you want to delete?', function(result){
            if(result) {
                             var postData = {action: 'del_post',post_id:id};
                              CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                 if (data == 'true')
                                 {
                                    $("#loop_"+id).hide();
                                 }
                                 else
                                 {
                                    noty({type: 'error', text: 'Our support team is working on it ! Thanks'});

                                 }
                              
                           });
                       }else
                       {
                           
                       }
                   });
                           });
                        

                     </script>
                     <?php include('footer.php')?>