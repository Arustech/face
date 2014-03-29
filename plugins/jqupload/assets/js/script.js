$(function() {

   var ul = $('#upload ul');

   $('#drop a').click(function() {
      // Simulate a click on the file input button
      // to show the file browser dialog
      $(this).parent().find('input').click();
   });


   var myfiles = [];
   // Initialize the jQuery File Upload plugin
   $('#upload').fileupload({
      disableImageResize: /Android(?!.*Chrome)|Opera/
              .test(window.navigator && navigator.userAgent),
      imageMaxWidth: 100,
      imageMaxHeight: 100,
      maxFileSize: 5000000,
      acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
      dropZone: $('#drop'),
      add: function(e, data) {
         var type = data.files[0].type;
         var size = data.files[0].size;
         if (type == 'image/jpeg' || type == 'image/png' || type == 'image/gif') {

            if (size <= 350000000)
            {
               //   var preview = '<img src="' + URL.createObjectURL(data.files[0]) + '"/>';
               var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"' +
                       ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><div class="preview"></div><p></p><span></span></li>');
               tpl.find('p').text(data.files[0].name).append('<i>' + formatFileSize(data.files[0].size) + '</i>');
               loadImage(data.files[0],
                       function(img) {
                          tpl.find('.preview').html(img);
                       },
                       {
                          minWidth: 80,
                          minHeight: 60, maxWidth: 80, maxHeight: 60, contain: true} // Options
               );


               // Add the HTML to the UL element
               data.context = tpl.appendTo(ul);

               // Initialize the knob plugin
               tpl.find('input').knob();
               // Listen for clicks on the cancel icon
               tpl.find('span').click(function() {


               if (tpl.hasClass('working'))
               {
                 
               data='';
                         
               }

                  tpl.fadeOut(function() {
                     tpl.remove();
                  });

               });

               // myfiles.push(data.files[0]);

            } else {
               noty({type: 'error', text: 'file exceeds limit of 350Kb'});
            }//check for file type

         } else
         {
            noty({type: 'error', text: 'Invalid file type.Please make sure image has valid extension jpeg|gif|jpg'});
         }
       

         $('#post_picture').on('click', function() {

        
               if(data!='')
               {
            var jqXHR = data.submit().success(function(result, textStatus, jqXHR) {
            });
               }


           
            $('#post_picture').off('click');
         });






      },           
      stop: function(e) {
//       console.log(myfiles);       

           var post_access   =$(".selectpicker").val();    
           var post_title   =$("#status_area_photo").val();    
           
           var user_access = $("#selected_users").val();
         
           var postData = {mod:'images_process',images:myfiles,post_access:post_access,post_title:post_title,user_access:user_access};
           CallAjaxPW('', postData, 'upload_process.php', function callBack(data){   
              
           if(data!="")
           {
               $.fancybox(data,{closeBtnxc   :false});              
               
           }
           });
           
           
      },
      progress: function(e, data) {

         // Calculate the completion percentage of the upload
         var progress = parseInt(data.loaded / data.total * 100, 10);
         // Update the hidden input field and trigger a change
         // so that the jQuery knob plugin knows to update the dial
         data.context.find('input').val(progress).change();
         if (progress == 100) {
            data.context.removeClass('working');
         }
      },
      fail: function(e, data) {
         // Something has gone wrong!
         data.context.addClass('error');
      }




   }).on('fileuploaddone', function(e, data) {

     myfiles.push(data.result);

   });

//   $(document).on('click','#post_picture',function(){
//      alert('asdas');
// $('#upload').fileupload('send', {files: myfiles});
//   });




   // Prevent the default action when a file is dropped on the window
   $(document).on('drop dragover', function(e) {
      e.preventDefault();
   });

   // Helper function that formats the file sizes
   function formatFileSize(bytes) {
      if (typeof bytes !== 'number') {
         return '';
      }

      if (bytes >= 1000000000) {
         return (bytes / 1000000000).toFixed(2) + ' GB';
      }

      if (bytes >= 1000000) {
         return (bytes / 1000000).toFixed(2) + ' MB';
      }

      return (bytes / 1000).toFixed(2) + ' KB';
   }

    $(document).on('click','#existing',function(){
        $("#new_album").hide();        
        $("#exist_album").show();        
    });
    
    $(document).on('click','#new',function(){
        $("#exist_album").hide();        
        $("#new_album").show();        
    });
    
    $(document).on('click','#finish',function(){
        myfiles=[];
         CallAjaxPW('#img_form', '', 'ajax.php', function callBack(data){   
           if(data!="")
           {
               $.fancybox(data);                 
           }
           });
        
        $.fancybox({closeClick:true});
      location.reload(); 
    });
    

});



