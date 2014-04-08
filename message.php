<?php require("header.php"); ?>



            
<style>


        .inbox_Massages{
          width: 70%;
          height: 540px;
          float: left;
          border: 1px solid #E4E3E3;
       
      }
      
      
          .inbox_list{
          width: 30%;
          height: 540px;
         border: 1px solid #E4E3E3;
          float: left;
          border-color: #428BCA;
          
          overflow:auto;
      }
      .inbox_list li{
          border-bottom: 1px solid #E4E3E3;
          height: 57px;
          list-style: none outside none;
          padding: 5px;
          
      }
      
      ul {
    padding: 0px 0px 0px 0px;
    margin: 0px 0px 0px 0px;

}

  .activee{

           background-color: #E4E3E3;
/*            color:#fff;*/
      }
      
     
      
     .inbox_list li:hover{

          background-color: #E4E3E3;
      }

      .inbox_list img{
        height: 46px;
        width: 46px;
        border: 1px solid #E4E3E3;
        width: 46px;
        float: left;
      }
      .inbox_list p{
        margin-left: 10px;
          margin-bottom: 2px;
          max-width: 130px;
          min-width: 92px;
          overflow: hidden;
         float: left;
         display: inline;
      }
      
      .inbox_list Span{
        margin-left: 10px;
        margin-bottom: 2px;
        float: right;
      }
      
      
      .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 440px;
}


.panel-primary > .panel-heading {
    background-color: #F5F5F5;

}

.btn-warning{
    
    background-color: #428BCA !important;
    border-color: #357EBD !important;
}

.panel-heading span{
    
    color: #334C62;
}

.row {
    margin-left: 1px !important;
    margin-right: 1px !important;}

.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
   
    padding-left: 1px !important;
    padding-right: 1px !important;
    }


</style>


<link rel="stylesheet" href="plugins/jqueryui/themes/cupertino/jquery-ui.css">
<link href="plugins/uniform/themes/aristo/css/uniform.aristo.min.css" rel="stylesheet">
<script src="plugins/jqueryui/ui.js"></script>
<script type="text/javascript" src="plugins/validation/core.js"></script>
<script type="text/javascript" src="plugins/validation/delegate.js"></script>
<script type="text/javascript" src="plugins/uniform/jquery.uniform.js"></script>


  
  <script>


 $( document ).ready(function() {
    
        $(".act").click(function(){

  if (!$(this).hasClass("active")) {

    $("li.activee").removeClass("activee");

    $(this).addClass("activee");
    $('.display_send').css("display", "block");
  }
});


});



       $(document).ready(function() {

            $(".popover-new").popover({
               placement: 'bottom',
               
               html: 'true',
            //  content: "<input  id='name' name='name' value='66' type='hidden' class='form-control1 new_msg_to' required><div class=''><textarea id='message' name='' class='send_new_msg'  required></textarea><label for='message'>Message</label></div><button class='btn btn-warning btn-sm send' id='btn-chat'>Send</button>"
            content: "<div><div class='row'><div class='col-md-6 go-right form'><h6>Send New Message</h6><div class='form-group'><input  id='name' name='name' value='' type='text' class='form-control new_msg_to' required></div><div class='form-group'><textarea id='message' name='phone' class='form-control send_new_msg'  required></textarea></div><div class='form-group'><button class='btn btn-warning btn-sm send_msg_new'id='btn-chat'>Send</button></div></div></div></div>"
           });
         });
  </script>





<div class="strip"> <span class="lt"></span>
 <?php 
$obj_Inbox = $main->load_model('Inbox');
$obj_mbr = $main->load_model('Member');

 $msg = $obj_Inbox->getAllmsgList($user['user_id']);
 
 //var_dump($main->get_uurl('thumbs_small')$user_avatar);

 //'.$this->get_uurl('thumbs_small')$user_avatar
 ?>


<p class="fancybox" >Inbox</p>


<!--  <li>
      <a href="#" class="button popover-new" data-toggle="popover" title="Send Message">new</a>
                                    
   </li>-->



   
</div>
<div class="divider"></div>


<div class="loop-container"> 
    
    <div class="inbox_list">
        <ul>
             <?php foreach ($msg as $msgs)
             { 
           $have_msg = $main->truncate($msgs['msg_data'], '15', false);
           $time2 =$main->get_time_diff($msgs['msg_send_date']);
           $time =$main->truncate($time2, '13', false);
           
           $username = $obj_mbr->get_full_name($msgs['msg_send_by']);
           $name = $main->truncate($username,'12', $ellipsis = true);
           $user_own=$main->db->get_row('tbl_user',array('user_id'=>$msgs['msg_send_by'])); 
            ?>
            <li class="act" data-id="<?=$user['user_id']?>" from="<?=$msgs['msg_send_by']?>">
                <!--<img src="img/profile.jpg">-->
                <img src="<?=$main->get_uurl('thumbs').$user_own['user_avatar'] ?>">
                <p><a href="" title="<?=$username?>"><?=$name?> </a></p>
                <span><?=$time?></span>
                <p><?=$have_msg?></p>
            </li>
            
             <?php } ?>  
<!--            
            
            <li class="act">
                <img src="img/profile.jpg">
                <p><a href="">Abdul Rauf</a></p>
                <span>1:15 PM</span>
                <p>Hello How are ...</p>
            </li>
-->

            
         
           
            
        </ul>
   
    </div>
    <div class="inbox_Massages">
        
        
            <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span><span> Conversation: </span>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
<!--                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>-->
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
 <p id="msg"></p>
<!--                       <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="img/profile.jpg" alt="User Avatar" />
                            <div class="rcv" id="rcv_56"></div>
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p id="msg">
                                 
                                </p>
                            </div>
                        </li>-->
   <!--                    <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="img/profile.jpg"  />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>-->
                    </ul>
                </div>

                
                <div class="panel-footer" >
                    <div class="input-group">
                        
                        <input  style="width: 557px" id="btn-input" type="text" class="form-control input-sm send_msg" value="" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm send display_send"  style="display: none" id="btn-chat">
                        Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
  
    
    </div>

</div>

  
             <!------------------------------------>          
<!--                <div>
                    
                    <div class="container">
    <div class="row">
		<form  role="form1" class="col-md-9 go-right form">
			<h2>Send New Message</h2>
          
			<div class="form-group">
                            <input  id="name" name="name" value="" type="hidden" class="form-control1 new_msg_to" required>
			<label for="name">Sent to</label>
		</div>

		<div class="form-group">
			<textarea id="message" name="phone" class="form-control1 send_new_msg"  required></textarea>
			<label for="message">Message</label>
		</div>
		<div class="form-group">
			<button class="btn btn-warning btn-sm send_msg" id="btn-chat">
                        Send</button>
		</div>
                        
</form>
       
	</div>
</div>
                    
                    
                </div>
   -->
            <!------------------------------------>  
	<script type="text/javascript">
	  $(document).ready(function(){
	  	$('.panel-body').rollbar({zIndex:80}); 
	  	$('.inbox_list').rollbar({zIndex:80}); 
//	  	$('body').rollbar({zIndex:80});
	  });
	</script>

<script>
    /////////// send New massage 
  
  
   $(document).on('click', '.send_msg_new', function() {

                                var msg  =  $(".send_new_msg").val();
                               var rcvr_id  =  $(".new_msg_to").val();
                               $(".send_new_msg").val('');
//                               var sender  =  $(".act").attr('data-id');
                               var sender  =  <?=$user['user_id']?>;
                                var postData = {action: 'send_new_msg', sender: sender, rcvr_id:rcvr_id, msg:msg  };
                                CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                   
                                

                                if (data)
                                   {
                                     
                                       $('#msg').html(data);
                                  

                                   }
                                   else
                                   {
                                      $('#msg').html('sending failed');

                                   }
                             
                                   
                                });


                             });
                             
                             
                             
  


$('.panel-body').scrollTop($('.panel-body').height())
//$(".panel-body").animate({ scrollTop: $(document).height() }, 1000);
 
//$('.panel-body').scrollTop($('.panel-body').height())
//$(".panel-body").animate({ scrollTop: 0 }, "slow");
    
 $(document).on('click', '.act', function() {

                                var li = $(this);
                                var user_id = li.attr('data-id');
                                var from = li.attr('from');
                                var postData = {action: 'get_msg', user_id: user_id, from:from};
                                CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                   
                                

                                if (data)
                                   {
                                     
                                       $('#msg').html(data);
                                  

                                   }
                                   else
                                   {
                                      $('#msg').html('sending failed');

                                   }
                             
                                   
                                });


                             });
                             
                             
///// auto get msg 



 $(document).ready(function() {
     
          var CallAjax = function(){

//                                var li = $(this);
//                                var user_id = li.attr('data-id');
//                                var from = li.attr('from');
                               var msg  =  $(".send_msg").val();
                               var rcvr_id  =  $(".rcv").attr('id');
                               var sender  =  $(".act").attr('data-id');
                               
                                
                                var postData = {action: 'get_ajax_msg', user_id: sender, from:rcvr_id};
                                CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                   
                                

                                if (data)
                                   {
                                     
                                       $('#msg').append(data);
                                  

                                   }
                                   else
                                   {
                                    

                                   }
                             
                               
                                });
                             };
                              setInterval(CallAjax,5000);
                             });
                             
                            
                             
                             ///////////////////
                             

   
                             
///// Send Msg


 $(document).on('click', '.send', function() {
     
                                
                                    
                               var msg  =  $(".send_msg").val();
                               var rcvr_id  =  $(".rcv").attr('id');
                               var sender  =  $(".act").attr('data-id');
                               $(".send_msg").val('');
                               $(".send_msg").html("");
//                               alert(sender);
                             // var id    =  val.split('_');
                             // var user_id   = id[1];
                             //  alert(user_id);
                               
//                                var div = $(this);
//                               alert (div.find('div').attr('title'));                           
//                                var user_id = div.attr('data-chat');
                                
//                               console_log = 'user_id'
//                                var rcvr_id = div.attr('from');
//                                var msg = div.attr('from');
                               //var postData = {action: 'send_msg', user_id: user_id, rcvr_id:rcvr_id, msg:msg};
                                var postData = {action: 'send_msg', rcvr_id:rcvr_id, msg:msg, sender:sender };
                                CallAjaxPW('', postData, 'ajax.php', function callBack(data) {
                                   
                                

                                if (data)
                                   {
                                     
                                       $('#msg').append(data);
                                  

                                   }
                                   else
                                   {
                                      
                                        $('#msg').append('sending failed');
                                   }
                             
                                   
                                });

                             });
                             
                             

</script>



<!--<script>
    $(function () {

        // function wide variables
        var receiver_id = $('#hide_receiver_id').val();
        var sender_id = $('#hide_sender_id').val();
        var messagebox = $('#messagebox').val();

        // button click
        $('#send_btn').click(function () {
            receiver_id = $('#hide_receiver_id').val();
            sender_id = $('#hide_sender_id').val();
            messagebox = $('#messagebox').val();

            $.ajax({
                type : "POST",
                url : "chat_history.php?receiver_id=" + receiver_id + "&sender_id=" + sender_id + "&message=" + messagebox,
                success : function (result) {
                    $('#history').html(result);
                }
            });
            $('#messagebox').val('');
        });

        var auto_refresh = setInterval(function(){
            $('#history').load("chat_history.php?receiver_id="+receiver_id+"&sender_id=<?php echo $_SESSION['id']?>&message=").fadeIn("fast");
        }, 1000); // refresh every 1000 milliseconds
    });
</script>-->


<?php include("footer.php"); ?>