<?php

if (isset($_POST['action'])) {

   require('lib/Main.php');
   $main = new Main;

  
   
   
   
   
   
   if ($_POST['action'] == 'get_requests') {
      
      $member = $main->load_model("Member");
      $user_id =$_GET['user_id'];
      $requests = $member->get_requests($user_id,$_POST['offset'],$_POST['limit']);
      
    
      
      if($requests)
      {
         foreach($requests as $request)
         {
          $users  = $member->get_users_data($request['id']);
         ?>
          <div class="frd_request">
         <div class="thumbnail_img"><img src="<?=$request['avatar']?>" width="75px" height="75px"></img> </div>
         <div class="biodate"> <a href="#"><?=ucfirst($request['first'].' '.$request['last'])?></a>
                              
            
                                <?php 
                                $place ='';
                                $city = $users['city'];
                                $country = $users['country_name'];
                                
                                if($city =='' ||$country =='')
                                $place = $city.$country; 
                                
                                if ($city!='' && $country !='')
                                $place = $city.' , '.$country;   
                                   
                                
                                ?>
             
                                <p><span class="glyphicon glyphicon-home"></span>  <?=$place?></p>
                                <?php if($users['company_name']):?>
                                <p> Works at <?=  ucfirst($users['company_name'])?></p>
                                <?php endif;?>
         
         
         
         </div>
       
         <div class="Confirm_btn">
            <a class="btn btn-md btn-success btn_accept" id="<?=$request['id']?>" href="#" style="background-color:#24BEE2"><span class="glyphicon glyphicon-ok"></span> Accept</a>
            <a class="btn btn-md btn-danger btn_reject" id="<?=$request['id']?>" href="#"><span class="glyphicon glyphicon-remove"></span> Reject</a>
           
         </div>
         </div>
         <?php 
         }//foreachends
         
      }//if ends
      else 
      {
         echo "false";
      }
      
      
   }
   
   
   if ($_POST['action'] == 'get_friends') {
      
      $member = $main->load_model("Member");
      $user_id =$_GET['user_id'];
      $rows = $member->get_friends($user_id,$_POST['offset'],$_POST['limit']);
      if($rows)
      {
         foreach($rows as $friend)
         {
          $users  = $member->get_users_data($friend['user_friend_id']);
         ?>
          <div class="frd_request">
         <div class="thumbnail_img"><img src="<?=$main->config['thumb_path'].$users['user_avatar']?>" width="75px" height="75px"></img> </div>
         <div class="biodate"> <a href="#"><?=ucfirst($users['first_name'].' '.$users['last_name'])?></a>
                              
            
                                <?php 
                                $place ='';
                                $city = $users['city'];
                                $country = $users['country_name'];
                                
                                if($city =='' ||$country =='')
                                $place = $city.$country; 
                                
                                if ($city!='' && $country !='')
                                $place = $city.' , '.$country;   
                                   
                                
                                ?>
             
             <p><span value  class="glyphicon glyphicon-envelope"><a href="new_message.php?send_to=<?=$users['user_id']?>"><span>Message</span></a></p>
             
                                <p><span class="glyphicon glyphicon-home"></span> <?=$place?></p>
                                <?php if($users['company_name']):?>
                                <p> Works at <?=  ucfirst($users['company_name'])?></p>
                                <?php endif;?>
         
         
         
         </div>
       <?php if(isset($_REQUEST['chk']) && $_REQUEST['chk']=='visit') { } else {?>
         <div class="Confirm_btn">
           
            <button    class="btn btn-danger btn_remove" name="post_status" id="<?=$users['user_id']?>">Remove</button>
                
            <!--<a href="#" class="btn btn-default">Delete Request</a>-->
         </div>
         </div>
         <?php 
       }
         }//foreachends
         
      }//if ends
      else 
      {
         echo "false";
      }
      
      
   }
   
}