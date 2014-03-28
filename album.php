<style>
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        background-color: #23C0E1 !important;
        color: #FFFFFF;
    }
  
    

    .album_wrapper {
        
   // border-radius: 7px;
    box-shadow: 0 0 2px #888888;
    float: left;
    height: 196px;
    margin: 16px;
    width: 196px;
    cursor:pointer;

          
    }
    
    .album_wrapper:hover {

box-shadow: 0px 0px 5px #0897B9;
-webkit-transition: all 500ms ease;
-moz-transition: all 500ms ease;
-ms-transition: all 500ms ease;
-o-transition: all 500ms ease;
transition: all 1500ms ease;
    }
    .album_wrapper p{ 
    color: #6A6A6A;
    
    }
    
    .clear{
      clear: both;
    }
    

    .size_img {

    height: 196px !important;
   
    width: 196px !important;

          
    }  
    
    .delete
    {
        width:30px !important;
        height:30px !important;
        position:relative !important;
   /*     bottom:-6px !important;
        left:5px !important;*/
        z-index: 1 !important;
        background-color:#009AEF !important;
        border:1px solid #009AEF;
        
    }
     .delete:hover
    {
       
        background-color:#007BBF !important;
        border:1px solid #007BBF;
    }
    .delete_empty
    {
        width:30px !important;
        height:30px !important;
       
        
        opacity: 0;
        
    }
    .album
    {
        position:relative;
        bottom:30px;
    }
 
    
   
    
</style>


<div id="album_container">
<?php

require 'album_process.php';


foreach($albums as $album){
    ?>

    <div id="<?= $album['album_id']?>" class="album_wrapper " data-toggle="tab" href=".photos">
        <div style="z-index: 101;">
            <a> <button hidden data-id="<?= $album['album_id']?>"  class="delete" type="submit" ><img height="20px" width="20px" src="img/delete.png"> </button></a>
        <button    class="delete_empty" type="submit" ><img height="20px" width="20px" src="img/delete_empty.png"> </button>
    </div>
        <a> <img id="<?= $album['album_id']?>" class="album" height="196px" width="196px" src="<?=$album_path.$album['cover_photo_name']?>"  ></a>
        <span><p style="font-size: 14px; color: #016E88;font-family: sans-serif;position: relative;bottom:28px;left:3px"><?= $album['album_name']?></p></span>
	

</div> <!-- album_wrapper end -->


<?php
}
?>
</div> <!-- album_container end -->
  

<div id="photos_container" >

<!--    <span ><p style="margin-left:16px;color: #016E88;font-family: sans-serif;font-size: 19px;">Photos</p>-->
<!--    <div id="create_album_button"  style=" floa:right; margin-bottom: 10px;margin-left: 19px;width: 106px;">
        <a  href="adding_photos_to_existing_album.php">Add Photos</a>
</div>-->
    

   


    
</div>


<script>
    $('#photos_container').hide();
                            $(function() {
                              $('.album_wrapper').hover(function(e) {
                              e.preventDefault();
                              
                              $(this).find('.delete').show();
                              $(this).find('.delete_empty').hide();
                             
                              
                              
                            });
                            });
                           
                        
                        
                        $(function() {

                           //var div = {'icon_msg':'canvas_msg','icon_picture':'canvas_picture','icon_video':'canvas_video'};
                         
                           $('.album_wrapper').mouseleave(function(e) {
                              e.preventDefault();
                              $('.delete').hide();
                              $('.delete_empty').show();
                              
                             });
                                });
                              
                              $(document).on('click', '.delete', function() {
//                                  album_id=$('.album_wrapper').find('.delete')
                                var btn = $(this);
                                var album_id = btn.attr('data-id');
                                
                                var wrapper  =$('#'+album_id);
                                 
                                var postData = {action: 'remove_album', album_id: album_id};
                                CallAjaxPW('', postData, 'ajax_album.php', function callBack(data) {
                                   if (data == 'true')
                                   {
                                     
                                      noty({type: 'success', text: 'Album removed with success'});
                                      wrapper.fadeOut(500, function(){
                                      
                                    $(this).remove();
                                      
                                   });

                                   }
                                   else
                                   {
                                      noty({type: 'error', text: 'Some error occurred'});

                                   }
                                }, function b() {
                                   preload1_start(wrapper);
                                }, function c() {
                                   preload_stop(wrapper);
                                   
                                });

                             });
                             
                             $(document).on('click', '.album', function(e) {
                               e.preventDefault();
                               
                                var album= $(this).attr('id');
                                console.log(album);
                                console.log(album_container);
                                 var postData = {action: 'album_photos', album_id: album};
                                CallAjaxPW('', postData, 'ajax_album.php', function callBack(data) {
                                  
                                   
                                    $('#album_container').hide();
                                    $('#photos_container').append(data);
                                    $('#photos_container').fadeIn(1000, function(){
                                      
                                    });
                                      

                                   
                                });
                                 
                             });
                         
                         
                          $(document).on('click', '.delete1', function() {
//                                  album_id=$('.album_wrapper').find('.delete')
                                var btn = $(this);
                                var photo_id = btn.attr('data-id');
                                
                                var wrapper  =$('#'+photo_id);
                                 
                                var postData = {action: 'remove_photo', photo_id: photo_id};
                                CallAjaxPW('', postData, 'ajax_album.php', function callBack(data) {
                                   if (data == 'true')
                                   {
                                       var wrapper  =$('#'+photo_id);
                                    
                                      noty({type: 'success', text: 'Album removed with success'});
                                      wrapper.fadeOut(500, function(){
                                      
                                    $(this).remove();
                                      
                                   });

                                   }
                                   else
                                   {
                                      noty({type: 'error', text: 'Some error occurred'});

                                   }
                                }, function b() {
                                   preload1_start(wrapper);
                                }, function c() {
                                   preload_stop(wrapper);
                                   
                                });

                             });
                                
</script>
    

