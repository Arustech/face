<?php require("header.php");

include("imgz_process.php");




?>

<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>
<script>
$(document).ready(function(){

$("#banner_title").change(function(){
	
var val	=$("#banner_title").val();	
	window.location.href="?mod=banner&bt="+val;	

})


});

</script>
<body>
<?php require ('top-nav.php')?>    
    <div id="container">
  <?php require ('sidebar.php')?>	
        <div id="content">
            <div class="container">
			
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                        </li>
                        <li class="current"> <a href="member.php" title="">Member</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Upload Images</h3>  <span>Album Images </span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Upload Album Images </h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="banner" action="#" method="post" enctype="multipart/form-data">
                                                                   
                                   
									<div class="form-group">
										<label class="col-md-2 control-label">Album :</label>
                                        
										<div class="col-md-6">
										<? $rows	= $obj_extra->getExtraInfo('album_detail',$album_id);?>
										 <input type="text" class="form-control required" readonly value="<?=$rows[0]['album_name']?>" />
										</div>		
										
                                       
                                        
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Upload  Image:</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control required" name="pic" />
										</div>
                                       
									</div>
									<div class="form-group">
									
                                        <div class="col-md-4" style="float:right;margin-top:5px;">
										<br>
										<input type="hidden" name="album_id" value="<?=$album_id?>" />
										<input type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"/> 
										</div>
									</div>
									
										
										
									
									
									
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
  <script type="text/javascript">
  

$(document).ready(function () {
	
				////////////////////////////////////////////////validation Engine
		$("#banner").validate();
		});
  </script>
</body>

</html>