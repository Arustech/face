<?php
require('header.php');
?>
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
<script src="plugins/jqupload/assets/js/script_Create_Album.js"></script>
<link href="plugins/preloader/preloader.css" rel="stylesheet">
<script src="plugins/preloader/jquery.isloading.js"></script>



    <style>
        .strip{

  background-color: #0897b9;

width: 100%;

float: left;

font-size: 20px;

color: #fefefe;

padding: 3px 0 0px 3px;

border-bottom: 4px solid #FFF;

}
.status_footer {
    float: right;
    margin-bottom: 5px;
    margin-top: 5px;
    width: 100%;
}
    </style>    
    
<div class="container">
  

    <div class="strip" style="margin-bottom:10px">
                        <p style="padding-top:2px;margin-left: 16px">Creating New Album</p>
                       
                     </div>
   <br><br>
   <span style="color: #016E88;font-family: sans-serif;font-size: 19px"> Album Name <input id="album_name" class="form-control" type="text" style="width:300px" value="<?=$main->currentDate(); ?>">
   </span>
   <input id="userid" name="userid"  class="form-control hidden" type="text" value="<?=$user['user_id']?>">
 
   <div class="status_wrapper">

   <div  id="canvas_picture" class="form-group  post_canvas">


     
      <form  id="upload" method="post" action="upload_Create_Album.php"    enctype="multipart/form-data">
          
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

                    

                     <!-- status_footer -->
                     <div class=" status_footer" style="display:flex;display: -ms-flexbox;" >  
                         <div class=" status_post" style="margin-right:5px">
                           <div class="btn-group">
                               <button id="post_picture" style="background:#0986A3"  name="post_status" class="btn btn-primary btn_post" style="width:110px">Create Album</button>
                           </div>
                        </div>
                         <div >

                           <select name="access" id="access" class="selectpicker show-menu-arrow" data-style="btn-warning" data-width='auto' >
                              <option  data-icon="glyphicon-globe" value="public">Public</option>
                              <option data-divider="true"></option>
                              <option  data-icon="glyphicon-heart" value="friends">Friends</option>
                              <option  data-icon="glyphicon-user" value="onlyme">Only Me</option>
                           </select>
                        </div>
                        


                     </div><!-- </div>footer--> 


                     </div><!-- status-->

                     
                         
</div>
      <script>
                        
  $(function() {

                         


                           $('.three_icons').tooltip();
                           $('.selectpicker').selectpicker();
                           $(".status_wrapper").on('click focus', function() {
                              $(".status_footer").fadeIn(1000);
                              var txt = $('#status_area_msg');
                              txt.prop('rows', 3);
                              txt.autosize();
                           });
                        });


                     </script>

    

<?php include('footer.php') ?>