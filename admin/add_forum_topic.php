<?php require("header.php");
include("forum_process.php");


?>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>
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
                        <li class="current"> <a href="add_forum_topic.php" title="">Add Forum Topics</a> 
                        </li>
                    </ul>
                    
                </div>
				<?=$msg;?>
                <div class="page-header">
                    <div class="page-title">
                        <h3>Forum Topics</h3>  <span>Add new forum categories and topics</span> 
                    </div>
                    
                </div>
				 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                    
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Forum Category</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="event" action="add_forum_topic.php" method="post" >
                                                                   
                                  
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Category Title:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="cat" value="" id="cat" class="form-control required">
                                        </div>
																			
									</div>
					 <div class="form-actions">
					<input type="submit" value="Save" name="save_cat" class="btn btn-sm btn-primary"/> 						
                                      </div>						
					</form>					
										</div>
									
<!--///////////////////////////////////////////////////////////////////-->
                                 
                            </div>
                        </div>
                    </div>
                	 <div class="row">
                    <div class="col-md-12" id="add_cat">
                        <div class="widget box">
                        
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Add Topics</h4> 
								<div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="event2" action="add_forum_topic.php" method="post" ">
                                     
                                    
                         <div class="form-group">
                         
                           
                        <label class="col-md-2 control-label">Select Forum Category<span class="required">*</span>
                        </label>
                        <div class="col-md-5">
                            <select style="width:181px" class=" select2" name="parent">
                              
                                <?php
                                if($cat){
                                foreach($cat as $cate){ ?>
                                <option   value="<?=$cate['topic_id']?>"><?=  ucfirst($cate['topic_name'])?></option>
                                <?php } 
                                }?>



                           </select>

                        </div> 
                        </div>       
                                  
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Topic Name:<span class="required">*</span></label>
                                        <div class="col-md-10 input-width-large">
                                            <input type="text" name="cat" value="" id="spinner-default" class="form-control required">
                                        </div>
																				
									</div>
                                      <div class="form-actions">
					<input type="submit" value="Save" name="save_topic" class="btn btn-sm btn-primary"/> 						
                                      </div>	
                                    </form>
										</div>
									
<!--///////////////////////////////////////////////////////////////////-->
                                 
                            </div>
                        </div>
                    </div>
                </div>
              
                
            </div>
        </div>
    
  <script type="text/javascript">
  

$(document).ready(function () {
	
    $("#event").validate();
    $("#event2").validate();
    
});
$(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
  });

  </script>

</body>

</html>