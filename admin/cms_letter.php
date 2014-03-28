<?php
require("header.php");

include("cms_letter_process.php");
?>
<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>


<script type="text/javascript" src="plugins/ck/ckeditor.js"></script>
<script type="text/javascript" src="plugins/ck/adapters/jquery.js"></script>



<body>
      <?php require ('top-nav.php') ?>    
   <div id="container">
<?php require ('sidebar.php') ?>	
      <div id="content">
         <div class="container">

            <div class="crumbs">
               <ul id="breadcrumbs" class="breadcrumb">
                  <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 
                  </li>
                  <li class="current"> <a href="javascript:;" title=""><?=$link_heading?></a> 
                  </li>
               </ul>

            </div>
<?=$msg; ?>
            <div class="page-header">
               <div class="page-title">
                  <h3><?=$page_heading?></h3>  <span></span> 
               </div>

            </div>
            <div class="row">


               <div class="col-md-12" id="add_cat">
                  <div class="widget box">
                     <div class="widget-header">
                        <h4><i class="icon-reorder"></i><?=$table_heading?></h4> 
                        <div class="toolbar no-padding">
                           <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 
                           </div>
                        </div>
                     </div>

                     <div class="widget-content">
                        <form class="form-horizontal row-border" id="news_frm" action="" method="post" enctype="multipart/form-data">
                     
                       <div class="form-group">
                           
                        <?php if($chk_mod=='msg') {?>
                        
                        <label class="col-md-2 control-label">User Email<span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="user_email" readonly="readonly" name="user_email" class="form-control" value="<?=$user_email?>">
                        </div>                         
                           <?php }else{?>   
                           
                        <label class="col-md-2 control-label">User Type<span class="required">*</span>
                        </label>
                        <div class="col-md-10">
                           <select class=" col-md-6 select2" name="user_type">
                              <option  selected="" value="*">Everyone</option>
                              <option value="business">Business</option>
                              <option value="personal">Personal</option>



                           </select>

                        </div> <?php } ?>
                        </div>
                           <div class="form-group">
                              <label class="col-md-2 control-label">Subject<span class="required">*</span>
                              </label>
                              <div class="col-md-8">
                                 <input type="text" id="letter_subject" required   name="letter_subject" class="form-control" value="">
                              </div>
                           </div>

                         


                           <div class="form-group">
                              <label class="col-md-2 control-label">Content<span class="required">*</span>
                              </label>
                              <div class="col-md-8">
                                 <textarea id="letter_text" rows=16 required   name="letter_text" class="form-control"></textarea>
                              </div>
                           </div>




                           <div class="form-actions">


                              <input type="submit" class="btn btn-primary pull-right"  name="<?=$btn_submit?>" value="Send">
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



      $(document).ready(function() {



         CKEDITOR.replace('letter_text');

         $('#news_frm').validate({
            ignore: [],
            rules: {
               letter_text: {
                  required: function()
                  {
                     CKEDITOR.instances.letter_text.updateElement();
                  }
               }
            },
            messages: {
               letter_text: "Content is Required"
            },
            /* use below section if required to place the error*/
            errorPlacement: function(error, element)
            {
               if (element.attr("name") == "letter_text")
               {
                  error.insertBefore("textarea#letter_text");
               } else {
                  error.insertBefore(element);
               }
            }
         });
      });

   </script>

</body>

</html>