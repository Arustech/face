<?php require("header.php"); ?>



            
<style>

.btn-warning{
    
    background-color: #428BCA !important;
    border-color: #357EBD !important;
}

.panel-heading span{
    
    color: #334C62;
}


.loop-container{
    
    margin: 0 auto;
    width: 100%;
    
}




.form-control1{
    background: transparent;
}
.form1 {
        margin: 0 auto;
	width: 80%;
	
}
.form1 > div {
	position: relative;
	overflow: hidden;
}
.form1 input, .form1 textarea {
	width: 100%;
	border: 2px solid gray;
	background: none;
	position: relative;
	top: 0;
	left: 0;
	z-index: 1;
	padding: 8px 12px;
	outline: 0;
}
.form1 input:valid, .form1 textarea:valid {
	background: white;
}
.form1 input:focus, .form1 textarea:focus {
	border-color: #357EBD;
}
.form1 input:focus + label, .form1 textarea:focus + label {
	background: #357EBD;
	color: white;
	font-size: 70%;
	padding: 1px 6px;
	z-index: 2;
	text-transform: uppercase;
}
.form1 label {
	-webkit-transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	position: absolute;
	color: #999;
	padding: 7px 6px;
	font-weight: normal;
}
.form1 textarea {
	display: block;
	resize: vertical;
}
.form1.go-bottom input, .form1.go-bottom textarea {
	padding: 12px 12px 12px 12px;
}
.form1.go-bottom label {
	top: 0;
	bottom: 0;
	left: 0;
	width: 100%;
}
.form1.go-bottom input:focus, .form1.go-bottom textarea:focus {
	padding: 4px 6px 20px 6px;
}
.form1.go-bottom input:focus + label, .form1.go-bottom textarea:focus + label {
	top: 100%;
	margin-top: -16px;
}
.form1.go-right label {
	border-radius: 0 5px 5px 0;
	height: 100%;
	top: 0;
	right: 100%;
	width: 100%;
	margin-right: -100%;
}
.form1.go-right input:focus + label, .form1.go-right textarea:focus + label {
	right: 0;
	margin-right: 0;
	width: 20%;
	padding-top: 5px;
}

</style>


<link rel="stylesheet" href="plugins/jqueryui/themes/cupertino/jquery-ui.css">
<link href="plugins/uniform/themes/aristo/css/uniform.aristo.min.css" rel="stylesheet">
<script src="plugins/jqueryui/ui.js"></script>
<script type="text/javascript" src="plugins/validation/core.js"></script>
<script type="text/javascript" src="plugins/validation/delegate.js"></script>
<script type="text/javascript" src="plugins/uniform/jquery.uniform.js"></script>



<div class="strip"> <span class="lt"></span>
 <?php 
$obj_Inbox = $main->load_model('Inbox');
$obj_mbr = $main->load_model('Member');

 $msg = $obj_Inbox->getAllmsgList($user['user_id']);

 ?>


<p class="fancybox" >Send New Message</p>




   
</div>
<div class="divider"></div>


<div class="loop-container"> 
    

                <div>
                    
                    <div class="container">
    <div class="row">
        <input type="hidden" class="act" data-id="<?=$user['user_id']?>">
		<div  role="form1" class="col-md-9 go-right form1">
			<h2>Send New Message</h2>
          
			<div class="form-group">
                            <input disabled sendto="<?=$_GET['send_to']?>" id="name" name="name" value="<?=$obj_mbr->get_full_name($_GET['send_to'])?> " type="text" class="form-control1 new_msg_to" required>
			
		</div>

		<div class="form-group">
			<textarea id="message" name="phone" class="form-control1 send_new_msg"  required></textarea>
			<label for="message">Message</label>
		</div>
		<div class="form-group">
			<button class="btn btn-warning btn-sm send_msg_new" id="btn-chat">
                        Send</button>
		</div>
                        
</div>
       
	</div>
</div>
                    
                    
                </div>
   
 
    
    </div>

</div>



<script>
    /////////// send New massage 
  
  
   $(document).on('click', '.send_msg_new', function() {

                                var msg  =  $(".send_new_msg").val();
                               var rcvr_id  =  $(".new_msg_to").attr('sendto');
                               $(".send_new_msg").val('');
                               var sender  =  $(".act").attr('data-id');
                                var postData = {action: 'send_new_msg', sender: sender, rcvr_id:rcvr_id, msg:msg  };
                                CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                   
                                

                                if (data)
                                   {
                                     
                                       noty({type: 'success', text: 'Messages send with success'});
                                  

                                   }
                                   else
                                   {
                                      $('#msg').html('sending failed');

                                   }
                             
                                   
                                });


                             });
                             

</script>


<?php include("footer.php"); ?>