<link href="plugins/bootstrap-select/bootstrap-select.css" rel="stylesheet">
<script type="text/javascript" src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="plugins/jqueryui/themes/cupertino/jquery-ui.css">
<link href="plugins/uniform/themes/aristo/css/uniform.aristo.min.css" rel="stylesheet">
<script src="plugins/jqueryui/ui.js"></script>
<script type="text/javascript" src="plugins/validation/core.js"></script>
<script type="text/javascript" src="plugins/validation/delegate.js"></script>
<script type="text/javascript" src="plugins/uniform/jquery.uniform.js"></script>

<!--////////////////////////////  -->
<link href="fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
<script type="text/javascript" src="plugins/autosize/jquery.autosize.js"></script>
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
<script src="plugins/jqupload/assets/js/script.js"></script>
<link href="plugins/preloader/preloader.css" rel="stylesheet">
<script src="plugins/preloader/jquery.isloading.js"></script>

<script type="text/javascript">
 $(document).ready(function()

                        {

                            var pathname = $(location).attr('href');
                            $('#menu li').each(function(i, n) {
                                var li = $(this);
                                var a = li.children();
                                var href = a.prop('href');
                                            console.log(pathname);

                                if (href == pathname)
                                {
                                    li.addClass('active');
                                }
                                else
                                {
                                    li.removeClass('active');
                                }


                            });
                            
                             $(".fancybox").fancybox({
                                openEffect: "none",
                                closeEffect: "none"
                            });
                            
                            
    });

</script>





<style>
    .cover
    {
        height: 315px;
        background-color: black;
        margin-top: 1px;
        
    }
    .display_pic
    {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    bottom: 90px;
    height: 154px;
    margin-left: 27px;
    overflow: hidden;
    padding-left: 5px !important;
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    width: 153px;
    float:left;
    }
    .header_inner_content
    {
        margin-left: 180px;
        margin-top: 22px;
        width: 300px;
    }
    .header_inner_content a
    {
        font-size: 19px;
    }
    .header_inner_content p
    {
        font-size: 11px;
        margin-top: 2px;
        color:#808080;
    }
    
    
    .header_link 
    {
    background: none repeat scroll 0 0 #009AEF !important;
    border: 1px solid #009AEF !important;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.25) !important;
    margin-right: 6px;
   height: 35px !important;
    line-height: 32px !important;
    padding: 0 12px !important;
    
    }
    
    .header_link:hover
    {
    background: none repeat scroll 0 0 #007BBF !important;
    border: 1px solid #009AEF !important;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.25) !important;
    margin-right: 6px;
   height: 35px !important;
    line-height: 32px !important;
    padding: 0 12px !important;
    
    }
    
    .header_link a
    {
        color:white !important;
    }
    .header_link a:hover
    {
        color:white !important;
        text-decoration:none !important;
    }
    .header_links_wrapper
    {
        float:right;
        display: flex;
        display: -ms-flexbox;
        bottom:49px;
        
    }
    .navi
    {
    bottom: 73px;
    right: 37px;
    }
    .navigation ul 
    {
        	list-style:none;
                display: flex;
                display: -ms-flexbox;
    }
    .navigation li 
    {
        float:left;
        margin-left: 6px;
        margin-right: 6px;
        height:25px ;
    }
    
    .navigation li:hover
    {
        float:left;
        margin-left: 6px;
        margin-right: 6px;
        border-bottom: 4px solid #009AEF !important;
    }
    .navigation a:hover{
        text-decoration: none;
    }
    ul > .active {
        border-bottom: 4px solid #009AEF !important;
    }
    .navigation a{
        font-size: 13px;
        
    }
    .container_border
    {
       border-bottom: 1px solid #CCCCCC;
    border-left: 1px solid #CCCCCC;
    border-right: 1px solid #CCCCCC;
    bottom: 189px;
    height: 111px;
    position: relative;
    width: 970px;
    z-index: -1;
    
    }
    
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
    
    
   .change_dp_button
   {
    
    bottom: 20px;
    color: #ffffff !important;
    font-size: 12px;
    left: 5px;
    position: relative;
    opacity: 60%;
    background: none repeat scroll 0 0 #009AEF !important;
    border: 1px solid #009AEF !important;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.25) !important;
    height: 20px !important;
  
    border-radius: 3px;
    
   }
   
    .change_dp_button:hover
   {
  
    bottom: 20px;
    background-color: #007BBF !important;
    color: #ffffff !important;
    font-size: 12px;
    left: 5px;
    position: relative;
    opacity: 60%;
    border: 1px solid #007BBF !important;
   }
   
   .btn-file {
    position: relative;
    overflow: hidden;
    background-color: #009AEF !important;
    border-color: #009AEF !important;
    color: #FFFFFF;
    bottom:1px;
}
.btn-file:hover {
    position: relative;
    overflow: hidden;
    background-color: #007BBE !important;
    border-color: #007BBE !important;
    color: #FFFFFF;
    bottom:1px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 999px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
.loop-container {
    border: 1px solid #E4E3E3;
    float: left;
    margin-top: 1px;
    padding: 10px 10px 50px;
    right: 16px;
    width: 969px;
}
.on_the_cover
{
    bottom: 83px;
    height: 20px;
    left: -18px;
    position: relative;
    
}
 
</style>
<?php

$basic_ = $main->load_model('BasicProfile');
$basic =$basic_->getBasicProfileByID($user['user_id']);

$contact_ = $main->load_model('ContactProfile');
$contact = $contact_->get_contact($user['user_id']);


?>    

   
            <div class="row cover" id="cover">
             <!-- Add Source for cover photo here-->
             <a class=" fancybox" rel="ligthbox" data-image-id="146" title=" " href="<?= $main->config['cover_web'].$user['user_cover']?>">
                <img id="img_cover" width="970px" height="315" src="<?= $main->config['cover_web'].$user['user_cover']?>"  title="Cover Photo">
            </a>
             
              <div class="col-md-2  on_the_cover header_links_wrapper">
<!--                        <a href="">Change Cover</a>-->
                    <form id="file-submit" method="POST" action="save_cover.php" enctype="multipart/form-data">

                        <span id="change_cover"  class="btn btn-default btn-file" style="height:23px;padding:0px 5px 3px 5px;font-size: 13px;border-radius: 2px">
                            <img  src="img/pen.png">   Change Cover <input name='cover_pic'   type="file" >
                   </span>
                           <input type="text" name="userid" value="<?= $user['user_id']?>" hidden>   
                        </form>
                    </div>
             
             
             
            </div>  
            
            <div class="row " id="header_content">
               <div class="col-md-2  display_pic" id="dp">
                   <a style=" text-decoration:none !important;" data-image-id="146" title="Profile Picture" >
                          <img width="140px" height="140" src="<?= $main->config['avatar_web'].$user['user_avatar']?>"  title="Display Picture">
<!--                          <a href="upload_new.php" id="change_dp" class="change_dp_button" hidden>Change Picture </a>-->
<span>   
                        <input type="submit"  id="change_dp" class="change_dp_button" hidden value="Change Picture"> 
      </span>
                        </a>
                </div>
                
               <div class="col-md-2 header_inner_content">
                  <a  href=""><?=ucfirst($user['user_name'])?></a>
                  
                  <p><?php  
                  if($contact['city']!="")
                      {
                      ?>
                      Lives in
                      <?=$contact['city'];
                      }  
                  if($basic['birthday']!="0000-00-00")
                      {?> · 
                      Born on 
                      <?=$basic['birthday'] ;
                      
                      }
                  else 
                      {
                      echo "<br>";
                      }   

                      ?> 
                  </p>
                </div>
                
                <div class="col-md-6 header_links_wrapper">
                   
                     <div class="col-md-2 header_link">
                        <a href="profile.php">Edit Profile</a>
                    </div>
                     
                </div>
                
            </div>
                
            <div class="row ">
           <div  class="col-xs-6 navi">
            <nav class="navigation ">
           
            
            	<ul id="menu">
                   
                	<li ><a  href="<?= $main->config['web_path'] ?>timeline_wall.php">Wall</a></li>
                        <li><a href="<?= $main->config['web_path'] ?>timeline_info.php">Info</a></li>
                        <li ><a  href="<?= $main->config['web_path'] ?>timeline_friends.php">Friends</a></li>
                        <li><a href="<?= $main->config['web_path'] ?>timeline_photos.php">Photos</a></li>
                	
                </ul>
             
            </nav>
            
            
            </div><!--navgation div-->
	  
            </div>
            
            <div class="row container_border">
                
            </div>
        


<script >
    
   
    
    
    
                             $(function() {

                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};

                           $('#dp').hover(function(e) {
                              e.preventDefault();
                              $('#change_dp').show();
                               
                            });
                            });
                           
                        
                        
                        $(function() {

                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};

                           $('#dp').mouseleave(function(e) {
                              e.preventDefault();
                              $('#change_dp').hide();
                             });
                                });
                                
                                
                                
                              $(function() {

                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};

                           $('#change_dp').click(function(e) {
                              e.preventDefault();
                              location.href = "upload_new.php"

                           }); }); 
                                
                                
                           
                           
                            $(function() {
                                $('#change_cover').hide();
                               
                            });
                         
                           
                                
                           $(function() {
                              $('#cover').hover(function(e) {
                              e.preventDefault();
                              $('#change_cover').show();
                               
                            });
                            });
                           
                        
                        
                        $(function() {

                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};

                           $('#cover').mouseleave(function(e) {
                              e.preventDefault();
                              $('#change_cover').hide();
                             });
                                });
                                
                                   
                         $('#file-submit').fileupload({
            
                                add: function(e, data) {
                                   var type = data.files[0].type;
                                   var size = data.files[0].size;

                                   if ( type == 'image/jpeg' || type == 'image/png' || type == 'image/gif' ) {

                                      if(size<=350000000)
                                      {

                                          var jqXHR = data.submit();

                                      }

                                      else{ 
                                    noty({type:'error',text: 'file exceeds limit of 350Kb'}); 
                                   }//check for file type

                                } else 
                                   {
                                       noty({type:'error',text: 'Invalid file type.Please make sure image has valid extension jpeg|gif|jpg'});  
                                   }


                                   // Automatically upload the file once it is added to the queue

                                   },
                                progress: function(e, data) {


                                },
                                fail: function(e, data) {
                                  console.log('fail');


                                },
                                success:(function (result, textStatus, jqXHR) {
                                   
                             $('#img_cover').prop('src','<?=$main->config['cover_web']?>'+result);                                  
                             $('#img_cover').css('visibility','visible').hide().fadeIn('slow');
                             
                                   
                           // console.log(result);  
                         //  location.href = "timeline_wall.php"

                              })


                                //check for file type
                             });
                            
                     </script>