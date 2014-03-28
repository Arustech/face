<?php 
require('header.php');
?>
<!--For Basic Slider-->
<link href="plugins/basic-slider/bq.css" rel="stylesheet">
<script src="plugins/basic-slider/js/bq.js"></script>

<!-- jQuery video player -->
<script src="plugins/codo_player/CodoPlayer.js"></script>
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
    require('visit_user_header.php');
?>

<!--       /////////////////////////////////////////////////////////////////////////////////////////////     -->
<?php include'timeline_feed.php';?>

            
        </div>  
        
      <script>
                        $(function() {

                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};
                           $('#post_message').click(function(e) {

                                var text =$('#status_area_msg');
                              var msg = text.val();
                              var postData = {action: 'post_message', msg: msg, posted_by_user_id:<?= $user['user_id'] ?>};
                              CallAjaxPW('', postData, 'ajax_msg.php', function callBack(data) {
                                 if (data == 'true')
                                 {
                                 text.val('');
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

                     </script>


<?php include('footer.php') ?>