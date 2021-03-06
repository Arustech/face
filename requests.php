<?php
require('header.php');
require('top_panel.php');
$member = $main->load_model("Member");
?>
<link href="fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
<link href="plugins/preloader/preloader.css" rel="stylesheet">
<script src="plugins/preloader/jquery.isloading.js"></script>
<script src="plugins/jscroll/jscroll.js"></script>


<style>
   .firend_wrapper{

      min-height: 200px;
      width: 69%;
      float: left;
   }

   .search_wrapper{

      min-height: 390px;
      width: 30%;
      float: left;
      margin-top: 28px;
      background-color: #fff;
      border-color: #c4cde0;
      -webkit-border-radius: 3px;
      border-style: solid;
      border-width: 1px 1px 2px;
      float: right;

   }


   .frd_request{
      height: 120px;
      margin: 10px;
      //border-radius: 10px;
      border-bottom:#E4E3E3 solid 1px;

   }
   .thumbnail_img{
      border: 1px solid #959FA9;
      float: left;
      height: 79px;
      margin: 17px 13px 21px 21px;
      width: 79px;

   }

   .thumbnail_img img{
      margin: 1px;


   }

   .biodate{
      float: left;
      margin: 27px 0;


   }


   .biodate a{
      font-weight: bold;

   }

   .biodate p{

      font-size: 11px;
      color: #959FA9;
      margin: 0 0 3px;



   }


   .Confirm_btn{
      float: right;
      margin: 40px 26px 0 0;

   }

   .sff{

      border-bottom: 1px solid #e9e9e9;
      color: #888;
      font-size: 18px;
      //font-weight: bold;
      padding-left: 15px;
      background-color: #fff;
      -webkit-border-radius: 3px 3px 0 0;
      padding: 20px;
      padding-bottom: 10px;

   }

   .search_friends{

      padding: 0 20px;


   } 

   .search_friends p{

      font-size: 12px;
      color: #888;

      margin: 10px 0 10px 5px;


   }



   .icon-addon {
      position: relative;
      color: #555;
      display: block;
   }

   .icon-addon:after,
   .icon-addon:before {
      display: table;
      content: " ";
   }

   .icon-addon:after {
      clear: both;
   }

   .icon-addon.addon-md .glyphicon,
   .icon-addon .glyphicon, 
   .icon-addon.addon-md .fa,
   .icon-addon .fa {
      position: absolute;
      z-index: 2;
      left: 10px;
      font-size: 14px;
      width: 20px;
      margin-left: -2.5px;
      text-align: center;
      padding: 10px 0;
      top: 1px
   }

   .icon-addon.addon-lg .form-control {
      line-height: 1.33;
      height: 46px;
      font-size: 18px;
      padding: 10px 16px 10px 40px;
   }

   .icon-addon.addon-sm .form-control {
      height: 30px;
      padding: 5px 10px 5px 28px;
      font-size: 12px;
      line-height: 1.5;
   }

   .icon-addon.addon-lg .fa,
   .icon-addon.addon-lg .glyphicon {
      font-size: 18px;
      margin-left: 0;
      left: 11px;
      top: 4px;
   }

   .icon-addon.addon-md .form-control,
   .icon-addon .form-control {
      padding-left: 30px;
      float: left;
      font-weight: normal;
   }

   .icon-addon.addon-sm .fa,
   .icon-addon.addon-sm .glyphicon {
      margin-left: 0;
      font-size: 12px;
      left: 5px;
      top: -1px
   }

   .form-group{
      margin-bottom: 25px;
   }

   .form-group label{
      color: #0897B9;
      font-weight: normal;
   }

   .search_btn{

      float: right;
   }

</style>

<div class="strip"> <span class="lt"></span>

   <p>Friend Requests</p>

</div>

<div class="divider"></div>

<div style="clear:both"></div>


<div class="firend_wrapper">
   
</div><!-- firend_wrapper -->

<!--<div class="search_wrapper">
   <div class="sff">
      Advertise Here
   </div>
   <div class="search_friends thumbnail">
      <div style="margin-top: 10px;" ></div>
      <div class="center-block ">
         <img width="250" src="img/ADVERTISE_HERE.jpg">
      </div>
      <div style="margin-top: 10px;" ></div>
      <div class="center-block thumbnail">
         <img  width="250" src="img/advertise_free.jpg">
      </div>
      <div style="margin-top: 10px;" ></div>
      <div class="center-block thumbnail">
         <img  width="250" src="img/advertise-here.gif">
      </div>

      </div>

   </div>  search_friends -->


</div><!--search_wrapper --> 
<script type="text/javascript">

   /* $(document)
    .ajaxStart(function(){
    preload_start('.firend_wrapper');
    }).ajaxStop(function(){
    preload_stop('.firend_wrapper');
    });   */

   $(document).ready(function()
   {

      $(document).on('click', '.btn_accept', function() {
          
             var btn = $(this);
             var id = btn.attr('id');
            $(this).replaceWith('<select id="'+id+'" class="add_to_type_all" name="friends"><option value="-1">Add to</option><option value="family">Family</option><option value="friends">Friend</option></select>');
      });
      
      
      
            $(document).on('change','.add_to_type_all',function(){
                
                   var btn = $(this);
                    var request_by   =   btn.attr('id');
                    var access_val   =   btn.val();
                    if(access_val!=-1)
                    {
                        var id    = access_val+'_'+request_by;
                        var postData = {action: 'accept_request', friend_id: id, user_id:<?= $user['user_id'] ?>};
                        CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                        if (data == 'true')
                        {
                        noty({type: 'success', text: 'Friend added to  your list.'});
                        btn.parent().parent().fadeOut(500, function(){
                        $(this).remove();
                        });

                        }
                        else
                        {
                        noty({type: 'error', text: 'Some error occurred'});

                        }
                        }, function b() {
                        preload_start('.firend_wrapper');
                        }, function c() {
                        preload_stop('.firend_wrapper');
                        });
                     
                    }
            });
      
      
      
      
        $(document).on('click', '.btn_reject', function() {

         var btn = $(this);
         var id = btn.attr('id');
         var postData = {action: 'reject_request', friend_id: id, user_id:<?= $user['user_id'] ?>};
         CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
            if (data == 'true')
            {
               noty({type: 'success', text: 'Friend request rejected.'});
              btn.parent().parent().fadeOut(500, function(){
               $(this).remove();
            });

            }
            else
            {
               noty({type: 'error', text: 'Some error occurred'});

            }
         }, function b() {
            preload_start('.firend_wrapper');
         }, function c() {
            preload_stop('.firend_wrapper');
         });

      });
      
      
      
      
      
      
      
      
      
      


      $('body').scrollPagination({
         nop: 10, // The number of posts per scroll to be loaded
         offset: 0, // Initial offset, begins at 0 in this case
         delay: 2500, // When you scroll down the posts will load after a delayed amount of time.
         scroll: true, // The main bit, if set to false posts will not load as the user scrolls. 
         url: 'ajax_1.php?user_id=<?= $user['user_id'] ?>',
         gap:100,
         action:'get_requests',
         target :'.firend_wrapper',
         
 
         complete: function() {
          // noty({type:'warning',text: 'No more friends'});
            
         },
         before: function() {
            preload_start($this);
         },
         after: function() {preload_stop($this);},
         });
     



   });//ready ends

</script>
<?php include('footer.php') ?>