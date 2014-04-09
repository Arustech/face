<?php
require('header.php');
require('top_panel.php');
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
<link href="plugins/preloader/preloader.css" rel="stylesheet">
<script src="plugins/preloader/jquery.isloading.js"></script>
<script src="plugins/jscroll/jscroll.js"></script>
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
      font-size : 18px !important;
      
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
   .comment_get{
       
       padding: 0 10px;
       text-align: justify;
       word-wrap: break-word;
       font-weight: normal !important;
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




<legend class="update" >Update Status</legend>      
<div class="status_wrapper">

   <div  id="canvas_msg" class="form-group post_canvas">

      <textarea  id="status_area_msg" rows="1" cols="30" class="form-control" name="textarea" placeholder="What's on your mind?" ></textarea>

   </div>


   <div  id="canvas_picture" class="form-group hideit post_canvas">


      <textarea  id="status_area_photo" rows="1" cols="30" class="form-control" name="textarea" placeholder="Say something about this photo..." ></textarea>

      <form  id="upload" method="post" action="upload.php"    enctype="multipart/form-data">
         <div>

            <div id="drop">
               Drop Here <span style="color:white;text-transform:none;font-size: 13px">     OR    <span>

                     <a>Browse</a>
                     <input type="file" name="upl" multiple/>


                     </div>

                     <ul>
                        <!-- The file uploads will be shown here -->
                     </ul>
                     </div>
                     </form>

                     </div>

                     <div  id="canvas_video" class="form-group hideit post_canvas">
                        <textarea  id="status_area_video" rows="1" cols="30" class="form-control" name="textarea" placeholder="Say something about this video..." ></textarea>
                        <form>
                           <div id="queue"></div>
                           <input id="file_upload" name="file_upload" type="file" multiple="true">
                        </form>
 <script type="text/javascript">
<?php $timestamp = time(); ?>
                          
    $(document).on('click','#post_video',function() {
                                // alert($(".selectpicker ").val());
                                var user_access = $("#selected_users").val();
                               $("#file_upload").uploadify('settings','formData' ,{'post_title':  $("#status_area_video").val(),'post_access': $(".selectpicker").val(),'user_id':'<?=$user['user_id']?>',user_access:user_access});
                               $('#file_upload').uploadify('upload','*');
                               //location.reload(); 
                            });
                            
                        $(function() {
                              $('#file_upload').uploadify({
                              'onUploadComplete': function(file) {
                                    //alert('The file ' + file.name + ' finished processing.');
                                 },
                              'onUploadSuccess' : function(file, data, response) {
                                // alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
                                   
                                    noty({type: 'success', text: 'File '+file.name+' successfully uploaded'});
                               }, 
                              'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                               alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                                 //  noty({type: 'error', text: 'File '+file.name+' could not be uploaded:'});
                               }, 
                                 'swf': 'plugins/uploadify/uploadify.swf',
                                 'uploader': 'uploadify.php',
                                 'debug':false,
                                 'uploadLimit' : 1,
                                 'fileSizeLimit' : '20480KB',
                                 'auto': false,
                              });
                           });
                              
                            
                            
                            $(document).on('change','.selectpicker ',function(){
                                var value =$(".selectpicker ").val()
                                if(value!='public')
                                {
                                var postData = {mod:'user_access',access_option:value};
                                CallAjaxPW('', postData, 'user_access.php', function callBack(data){   

                                if(data!="")
                                {
                                $.fancybox(data,{closeBtnxc   :false});              

                                }
                                });
                                }
                            });
                            
                            
                        </script>

                     </div>

                     <!-- status_footer -->
                     <div class="status_footer"  style="display:none">  
                        <div class="status_post">
                           <div class="btn-group">
                              <button id="post_message"  name="post_status" class="btn btn-primary btn_post" style="width:70px">Post</button>
                           </div>
                        </div>

                        <div style="float: right">

                           <select  class="selectpicker show-menu-arrow" data-style="btn-warning" data-width='auto' >
                              <option  data-icon="glyphicon-globe" value="public">Public</option>
                              <option data-divider="true"></option>
                              <option  data-icon="glyphicon-heart" value="friends">Friends</option>
                              <option  data-icon="glyphicon-user" value="family">Family</option>
                           </select>
                        </div>

                        <div class="status-image-panel">
                           <a id="icon_msg" class="three_icons" data-placement="left" data-toggle="tooltip" title="message" href=""><span  class="post_icon glyphicon glyphicon-envelope active"></span></a>
                           <a id="icon_picture"  class="three_icons" data-placement="top" title="upload pictures" href=""><span class="glyphicon glyphicon-camera post_icon"></span></a>
                           <a id="icon_video" class="three_icons" data-placement="right" title="upload videos"  href=""><span class="glyphicon glyphicon-film post_icon"></span></a>
                        </div>  
                         <input type="hidden" id="selected_users" name="user_access" value=""/>
                             

                     </div><!-- </div>footer--> 


                     </div><!-- status-->
                     <div style="clear:both"></div>
                     <legend></legend>



                     <div class="divider"></div>
<div class="loop-container">
                     <?php //include('feed.php') ?>
</div>
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
                           
                           $(document).ready(function(){
                             $(".fancybox").fancybox({
                                openEffect: "none",
                                closeEffect: "none",
                                arrows : false,
                                mouseWheel   : false,
                                                     
                           }); 
                           });
                           
                                                    // the function we call when we click on each img tag
                         function fancyBoxMe(e) {
                             var numElemets = $(".bjqs li img").size();
                             if ((e + 1) == numElemets) {
                                 nexT       = 0
                             } else {
                                 nexT = e + 1
                             }
                             if (e == 0) {
                                 preV = (numElemets - 1)
                             } else {
                                 preV = e - 1
                             }
                             var tarGet = $('.bjqs li img').eq(e).data('href');
                             $.fancybox({
                                 href: tarGet,
                                 helpers: {
                                     title: {
                                         type: 'inside'
                                     }
                                 },
                                 afterLoad: function () {
                                     this.title = 'Image ' + (e + 1) + ' of ' + numElemets + ' :: <a href="javascript:;" onclick="fancyBoxMe(' + preV + ')">prev</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="fancyBoxMe(' + nexT + ')">next</a>'
                                 }
                             }); // fancybox
                         } // fancyBoxMe

                         // bind click to each img tag 
                         $(document).ready(function () {
                             $(".bjqs li img").each(function (i) {
                                 $(this).bind('click', function () {
                                     fancyBoxMe(i);
                                 }); //bind      
                             }); //each
                             
                             
                             
               /// dynamic loading posts here...              
                            $('body').scrollPagination({
                            nop: 10, // The number of posts per scroll to be loaded
                            offset: 0, // Initial offset, begins at 0 in this case
                            delay: 2500, // When you scroll down the posts will load after a delayed amount of time.
                            scroll: true, // The main bit, if set to false posts will not load as the user scrolls. 
                            url: 'ajax_1.php?user_id=<?= $user['user_id'] ?>',
                            gap:100,
                            action:'get_posts',
                            target :'.loop-container',


                            complete: function() {
                            // noty({type:'warning',text: 'No more friends'});
                            },
                            before: function() {
                            preload_start($this);
                            },
                            after: function() {preload_stop($this);},
                            });

                             
                             
                             
                         }); // ready
                        

                     </script>
                     <?php include('footer.php')?>