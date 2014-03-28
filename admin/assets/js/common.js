//ArusTech Javascript Functions  v 1.0 
//Updated  6-4-2013


//Ajax function that return JSON
function CallAjaxJ(form,postData,url,callBack)
{

			var sendData;

         if (form == "")

		  {

			sendData=postData;  

		  }

		  else if(postData=="")

		  {

			sendData=$(form).serialize();  	  

		 

		  }

		$.ajax({

	    	type:'POST',

			dataType:"JSON",

		    url: url,

  		    cache: false,

			async:false,

			data:sendData ,

		    success:callBack,
			error: function(httpRequest, textStatus, errorThrown) { 
   			console.log("status=" + textStatus + ",error=" + errorThrown);
			}
	    	});

 }
 
 //Ajax function that return JSON
function CallAjax(form,postData,url,callBack)
{

			var sendData;

         if (form == "")

		  {

			sendData=postData;  

		  }

		  else if(postData=="")

		  {

			sendData=$(form).serialize();  	  

		 

		  }

		$.ajax({

	    	type:'POST',

			url: url,

  		    cache: false,

			async:false,

			data:sendData ,

		    success:callBack,
			error: function(httpRequest, textStatus, errorThrown) { 
   			console.log("status=" + textStatus + ",error=" + errorThrown);
			}
	    	});

 }
 
 function getNoty(url,layout)
 {
 
	 noty(

	{
	  text: 'Do you want to continue?',
	  layout: layout,

	  buttons: [
		{addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {

			window.location.href=url;

			$noty.close();
			noty({text: 'Successfully Deleted', type: 'success'});
		  }
		},
		{addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
			$noty.close();
			noty({text: 'Processing Successfully cancelled', type: 'error'});
		  }
		}
	  ]
	});
 
 
 
 }
 
 