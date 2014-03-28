<?php require("header.php"); ?>
<style>
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        background-color: #23C0E1 !important;
        color: #FFFFFF;
    }
  
    

    .wrapper_basic {
        
   // border-radius: 7px;
    box-shadow: 0 0 2px #888888;
    margin: 45px auto;
    padding: 29px 6px;
    width: 476px;

          
    }
    
    .wrapper_basic:hover {

box-shadow: 0px 0px 5px #0897B9;
-webkit-transition: all 1500ms ease;
-moz-transition: all 1500ms ease;
-ms-transition: all 1500ms ease;
-o-transition: all 1500ms ease;
transition: all 1500ms ease;
    }
    .wrapper_basic p{ 
    color: #6A6A6A;
    
    }
    
    .clear{
      clear: both;
    }
    
     .btn-primary {
                    background-color: #428BCA!important;
                    border-color: #357EBD!important;
                    color: #FFFFFF!important;
                    position: relative;
                    right: -181px;
                    top : 4px;
                }

      .btn-primary:hover {
         background-color: #F89924!important;
                        }

    
                        .submit{
                            
                                background-color: #EBEBEB;
                               // border-radius: 0 0 6px 6px;
                                height: 40px;
                                position: relative;
                                right: 6px;
                                text-align: center;
                                top: -12px;
                                width: 102.5%;
                        }
                        
                        .label{
                            font-weight: non !Important;
                        }
    .form-group {
    margin-bottom: 10px !important;
    }
    .radio-inline{
         margin-left: -20px;
         padding-left: 0;
         vertical-align: text-top;
         
      }
      .radio-label
      {
        font-size:12px;
        vertical-align: middle;
        margin-left:-10px
      }
      .uniform
      {
         cursor: pointer;
      }
    
</style>


<link rel="stylesheet" href="plugins/jqueryui/themes/cupertino/jquery-ui.css">
<link href="plugins/uniform/themes/aristo/css/uniform.aristo.min.css" rel="stylesheet">
<script src="plugins/jqueryui/ui.js"></script>
<script type="text/javascript" src="plugins/validation/core.js"></script>
<script type="text/javascript" src="plugins/validation/delegate.js"></script>
<script type="text/javascript" src="plugins/uniform/jquery.uniform.js"></script>


  
  <script>
  $(function() {
    $( ".mydatepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    $("input[type='radio']").uniform();
  });
  </script>

<div class="strip"> <span class="lt"></span>

   <p>Your Profile</p>

</div>
<div class="divider"></div>

<div class="loop-container">

   <ul class="nav nav-tabs" id="myTab">
      <li  class="active"><a id="tab_basic" href="#basic" data-toggle="tab">Basic</a></li>
      <li><a id="tab_work" href="#workplace" data-toggle="tab">Workplace</a></li>
      <li><a id="tab_edu" href="#edu" data-toggle="tab">Education</a></li>
      <li><a id="tab_personal" href="#personal" data-toggle="tab">Personal</a></li>
      <li><a id="tab_contact" href="#contact" data-toggle="tab">Contact</a></li>
      <li><a id="tab_hobbies" href="#hobbies" data-toggle="tab">Hobbies</a></li>
   </ul>

   <div class="tab-content">
      <div class="tab-pane active fade in" id="basic"><?php include("profile_basic.php"); ?></div>
      <div class="tab-pane  fade" id="workplace"><?php include("profile_workplace.php"); ?></div>
      <div class="tab-pane fade" id="edu"><?php include("profile_edu.php"); ?></div>
      <div class="tab-pane fade" id="personal"><?php include("profile_personal.php"); ?></div>
      <div class="tab-pane fade" id="contact"><?php include("profile_contact.php"); ?></div>
      <div class="tab-pane fade" id="hobbies"><?php include("profile_hobbies.php"); ?></div>
   </div>

  

</div>
<?php include("footer.php"); ?>