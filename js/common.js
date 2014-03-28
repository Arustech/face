//ArusTech Javascript Functions  v 1.0 
//Updated  6-4-2013


//Ajax function that return JSON
function CallAjax(form, postData, url, callBack)
{
   var sendData;
   if (form == "")
   {
      sendData = postData;
   }

   else if (postData == "")

   {
      sendData = $(form).serialize();
   }

   $.ajax({
      type: 'POST',
      dataType: "JSON",
      url: url,
      cache: false,
      async: false,
      data: sendData,
      success: callBack,
      error: function(httpRequest, textStatus, errorThrown) {
         console.log("status=" + textStatus + ",error=" + errorThrown);
      }
   });

}



function CallAjaxP(form, postData, url, callBack, b, c)
{

   var sendData;
   if (form == "")
   {
      sendData = postData;
   }
   else if (postData == "")
   {
      sendData = $(form).serialize();
   }
   $.ajax({
      type: 'POST',
      dataType: "JSON",
      url: url,
      cache: false,
      async: false,
      beforeSend: b,
      complete: c,
      data: sendData,
      success: callBack,
      error: function(httpRequest, textStatus, errorThrown) {
         console.log("status=" + textStatus + ",error=" + errorThrown);
      }
   });

}


function preload_start(element)
{
   /* $(element).LoadingScript('method_12', {
    'background_image':'img/loading30.png',
    'main_width':30,
    'animation_speed':10,
    'additional_style': '',
    'after_element':false
    })*/

   $(element).LoadingScript('method_2', {
      'color_option_1': '#cdebf8',
      'color_option_2': '#3083a7',
      'main_width': 14,
      'main_height': 14,
      'animation_speed': 225,
      'number_of_box': 4,
      'margin_left_right': 2,
      'additional_style': '',
      'circle_shape': true,
      'zoom_effect': false,
      'after_element': false
   });
}
   function preload1_start(element)
{
   

  $(element).LoadingScript('method_12', {
		'background_image':'img/loading3.png',
		'main_width':32,
		'animation_speed':10,
		'additional_style': '',
		'after_element':false
	});
   
}
   
   /*
    $(element).LoadingScript('method_3', {
    'color_option_1':'#fff',
    'color_option_2':'#3083a7',
    'animation_speed':70,
    'animation_text':'LOADING',
    'space_between_text':14,
    'additional_style': 'font-family:arial; background:#3083a7; margin-left:5px; margin-right:5px;',
    'zoom_effect':[true,14,16],
    'after_element':false
    });*/

//   $(element).LoadingScript('method_8', {
//    'color_option_1':'#ccc',
//    'color_option_2':'#3083a7',
//    'main_width':35,
//    'main_height':35,
//    'animation_speed':150,
//    'circle_shape':true,
//    'animation_effect':'cross',
//    'after_element':false
//});




function preload_stop(element)
{
   $(element).LoadingScript('destroy');

}


/* $(document)
 .ajaxStart(function(){
 preload_start('.firend_wrapper');
 }).ajaxStop(function(){
 preload_stop('.firend_wrapper');
 });   */

function CallAjaxPW(form, postData, url, callBack, b, c)
{
   var sendData;
   if (form == "")
   {
      sendData = postData;
   }
   else if (postData == "")
   {
      sendData = $(form).serialize();
   }
   $.ajax({
      type: 'POST',
      url: url,
      cache: false,
      async: false,
      beforeSend: b,
      complete: c,
      data: sendData,
      success: callBack,
      error: function(httpRequest, textStatus, errorThrown) {
         console.log("status=" + textStatus + ",error=" + errorThrown);
      }


   });

}