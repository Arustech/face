(function($) {

   $.fn.scrollPagination = function(options) {

      var settings = {
         nop: 10, // The number of posts per scroll to be loaded
         offset: 0, // Initial offset, begins at 0 in this case
         error: 'No More Posts!', // When the user reaches the end this is the message that is
         // displayed. You can change this if you want.
         delay: 500, // When you scroll down the posts will load after a delayed amount of time.
         scroll: true, // The main bit, if set to false posts will not load as the user scrolls. 
         url: 'ajax.php', //URL for ajax
         action: 'search_friends',
         before: null,
         after: null,
         complete: null,
         gap:0,
         target : null,

      }

      // Extend the options so they work with the plugin
      if (options) {
         $.extend(settings, options);
      }

      // For each so that we keep chainability.
      return this.each(function() {

         // Some variables 
         $this = $(this);
         $settings = settings;
         target = jQuery($settings.target);
         var offset = $settings.offset;
         var busy = false; // Checks if the scroll action is happening 
         //This gap will ensure if you want to call scroll early due to scrolling on certain div 
         //which is above than footer like knownfaces footer
         
         var gap =$settings.gap;
         // so we don't run it multiple times

         function getData() {


            var sendData = {action: $settings.action, limit: $settings.nop, offset: offset};
            $.ajax({
               type: 'POST',
               url: $settings.url,
               cache: false,
               async: false,
               beforeSend: function() {
                

               },
               complete: function() {

                  

               },
               data: sendData,
               success: function(data) {
                  if (data == "false") {
                     
                     if ($.isFunction($settings.complete)) {
                        $settings.complete.call(this);
                     }
                  }
                  else {
                     // Offset increases
                     offset = offset + $settings.nop;
                     // Append the data to the target div or any thing
                     //console.log(offset);
                     target.append(data);
                     // No longer busy!	
                     busy = false;
                  }
               },
               error: function(httpRequest, textStatus, errorThrown) {
                  console.log("status=" + textStatus + ",error=" + errorThrown);
               }


            });


            //Calling after data is loaded
                  if ($.isFunction($settings.after)) {
                     $settings.after.call(this);
                  }


         }


         getData(); // Run function initially

         // If scrolling is enabled
         if ($settings.scroll == true) {
            // .. and the user is scrolling
            $(window).scroll(function() {

               
               if ($(window).scrollTop() + $(window).height() +gap > $this.height() && !busy) {
                                 busy = true;
                
                  if ($.isFunction($settings.before)) {
                     $settings.before.call(this);
                  }
                  setTimeout(function() {
                     getData();

                  }, $settings.delay);

               }
            });
         }

     

      });
   }
})(jQuery);