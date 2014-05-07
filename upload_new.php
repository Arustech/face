<?php 
require('header.php');
$index_url=$main->config['web_path'];
$timeline_wall_url=$main->config['web_path']."timeline_wall.php";
?>
  <link rel="icon" href="data:,">
	
	<link rel="stylesheet" type="text/css" href="plugins/crop/crop.css">
	
	
	<script src="plugins/crop/crop.min.js"></script>
<!--        min-height: 680px;margin-top: 97px-->
        <div class="container" style="min-height: 680px;margin-top: -11px;margin-left: 208px;">



	<input type="file" class="uploadfile" id="uploadfile">
	<div class="newupload">Upload an image?</div>
       
	<div class="example">

		<!--
			NOTE: To change the aspect ratio, look in crop.css
			The class 'default' links the div to the innit(); function
		-->
                
                
		<div class="default">
			<div class="cropMain"></div>
			<div class="cropSlider"></div>
			<button class="cropButton">Crop</button>
                       
		</div>
                
                
	</div>
        <div > <button class="btn btn-default save" style="display:none;position: relative;top:297px;left:468px;"  id="save" name="save">Save</button> </div>
<?php if(isset($_GET['check']) && $_GET['check']==1){
        
    ?>
        <div>
            <input style="width:50px;height:30px" type="text" value="<?=$_GET['check']?>" name="check">
        </div>
<?php } ?> 
	<script>
            function loadImageFile()
           {
               if(document.getElementById("uploadfile").files.length===0)
                   return;
               var e=document.getElementById("uploadfile").files[0];
               if(!rFilter.test(e.type))
               {
                   return
               }
               oFReader.readAsDataURL(e)
           }
           
           
           var one=new CROP;
           one.init(".default");
           
           $("body").on("click",".cropButton",function()
           {
               $("canvas").remove();
               $(".default").after('<canvas width="200" height="200" id="canvas"/>');
               $(".default").after('<input type="text" width="400" hidden id="full_img" style="position: relative;left:552px;"/>');
               var e=document.getElementById("canvas").getContext("2d"),t=new Image,n=coordinates(one).w,r=coordinates(one).h,i=coordinates(one).x,s=coordinates(one).y,o=200,u=200;
               t.src=coordinates(one).image;
               
               var fimg=document.getElementById("full_img");
                fimg.value=t.src;
               t.onload=function()
               {
                   
                e.drawImage(t,i,s,n,r,0,0,o,u);
                $("canvas").addClass("output").show();
                
                $("#save").show();
               }
                
               });
           
           
           $("body").on("click",".newupload",function()
           {
               $(".uploadfile").click()
           });
           
           
           $("body").change(".uploadfile",function()
           {
               loadImageFile();
               $(".uploadfile").wrap("<form>").closest("form").get(0).reset();
               $(".uploadfile").unwrap()
           });
           
           oFReader=new FileReader,rFilter=/^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
           oFReader.onload=function(e)
           {
               $(".example").html('<div class="default"><div class="cropMain"></div><div class="cropSlider"></div><button class="cropButton">Crop</button></div>');
               one=new CROP;
               one.init(".default");
               one.loadImg(e.target.result)
           }
           
           
           $('#save').click(function(){
               
//               name='check';
//               name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
//                var regexS = "[\\?&]"+name+"=([^&#]*)";
//                var regex = new RegExp( regexS );
//                var results = regex.exec( window.location.href );
//                if( results == null )
//                 alert ("nothing");
//               else
//                alert (results[1]);
//               
//  var query_string = {};
//  var query = window.location.search.substring(1);
//  var vars = query.split("&");
//  for (var i=0;i<vars.length;i++) {
//    var pair = vars[i].split("=");
//    	// If first entry with this name
//    if (typeof query_string[pair[0]] === "undefined") {
//      query_string[pair[0]] = pair[1];
//    	// If second entry with this name
//    } else if (typeof query_string[pair[0]] === "string") {
//      var arr = [ query_string[pair[0]], pair[1] ];
//      query_string[pair[0]] = arr;
//    	// If third or later entry with this name
//    } else {
//      query_string[pair[0]].push(pair[1]);
//    }
//  } 
//  
  var check=window.location.search.substring(1);
                var canvas = $('canvas');
                var fullimage=$('#full_img').val();
                var dataurll=canvas[0].toDataURL();
                var userid=<?= $user['user_id']?>;
                var data_json = {'image':dataurll,'fullimage':fullimage,'userid':userid};
                $.ajax(
                {

                  async: false,
                  url : 'save_avatar.php',
                  type: "POST",
                  data : data_json,
                  success:function(data)
                  {
                  if(check==1)
                      location.href = "<?=$index_url?>"
                  else
                      location.href = "<?=$timeline_wall_url?>"


                  },
                  error: function(jqXHR, textStatus, errorThrown)
                  {
                      //if fails     
                  }
              });
               
               
           });
           
           
                   </script>
</div>
<?php include('footer.php') ?>