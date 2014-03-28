<?php 
require('header.php');
?>
<!-- jQuery video player -->
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

<style>
      
.glyphicon:empty {
      width: 1.3em;
   }
   .status_wrapper{
      bottom: 100px;
      width: 103%;
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
   .contents
   {
    bottom: 184px;
    position: relative;
    right: 16px;
    
   }
   .adjustment
   {
       position:relative !important;
       bottom:190px !important;
   }
  
.loop-container {
    border: 1px solid #E4E3E3;
    float: left;
    margin-top: 1px;
    padding: 10px 10px 50px;
    right: 16px;
    width: 969px;
}

 
</style>


 <div class="container ">
            
 <?php 
    require('timeline_header.php');
?>


<div class="contents">    
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
                                // alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                                   noty({type: 'error', text: 'File '+file.name+' could not be uploaded:'});
                               }, 
                                 'swf': 'plugins/uploadify/uploadify.swf',
                                 'uploader': 'uploadify.php',
                                 'debug':false,
                                 'uploadLimit' : 1,
                                 'fileSizeLimit' : '20480KB',
                                 'auto': false,
                              });
                           });
                              $(document).on('click','#post_video',function() {
                                // alert($(".selectpicker ").val());
                                var user_access = $("#selected_users").val();
                               $("#file_upload").uploadify('settings','formData' ,{'post_title':  $("#status_area_video").val(),'post_access': $(".selectpicker").val(),'user_id':'<?=$user['user_id']?>',user_access:user_access});
                               $('#file_upload').uploadify('upload','*');
                               location.reload(); 
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


            
</div>
<!--       /////////////////////////////////////////////////////////////////////////////////////////////     -->
<?php include'timeline_feed.php';?>

            
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


                           $('.banner-fade').bjqs({
                              height: 367,
                              width: 365,
                              responsive: true
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


                           });




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
                             var postData = {action: 'del_post',post_id:id};
                              CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                 if (data == 'true')
                                 {
                                    $("#loop_"+id).hide();
                                 }
                                 else
                                 {
                                    noty({type: 'error', text: 'Some error occurred'});

                                 }
                              
                           });
                           });
                        
                        
                        
                        
                        

                     </script>


<?php include('footer.php') ?>