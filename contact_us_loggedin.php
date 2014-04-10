<?php
require 'header.php';
?>
<style>
    .page_content{
        border-left:1px solid #E4E3E3;
        border-right:1px solid #E4E3E3;
        border-bottom:1px solid #E4E3E3;
    }
    
    .inner_page_conetnt{
        margin-left:20px;
    }
    
    .heading{
      font-family: sans-serif;
      color: #016E88 ;
      font-size : 18px !important;
    }
    
    .text{
     color: #828282;
     font-size: 12px;
     font-weight: normal;
    }
    
    .btn {
    background: none repeat scroll 0 0 #3BC4F8;
    color: #FFFFFF;
    font-family: tahoma;
    font-size: 12px;
    //float: right !important;
   // padding: 7.5px 12px;
}




      .rating {
      overflow: hidden !important;
      display: inline-block !important;
  }
  .rating-input {
      float: right !important;
      width: 16px !important;
      height: 16px !important;
      padding: 0 !important;
      margin: 0 0 0 -16px !important;
      opacity: 0 !important;
  }
.rating-star {
      position: relative !important;
      float: right !important;
      display: block !important;
      width: 16px !important;
      height: 16px !important;
      background: url('img/star.png') 0 -16px !important;
  }

  .rating-star:hover,
  .rating-star:hover ~ .rating-star {
      background-position: 0 0 !important;
  }
   .rating-star:hover,
  .rating-star:hover ~ .rating-star,
  .rating-input:checked ~ .rating-star {
      background-position: 0 0 !important;
  }
  
</style>
<?php


if (isset($_POST['submit'])){
  if($_POST['message_text']!=''){  
  
  $user_info=$member->check_user();  
  $email=$user_info['user_email'];
  $subject="Contact us Message";
  $message="<h3>Message from user:</h3>". $user_info['user_name']."<h3>User's Message</h3> ".$_POST['message_text'];
  $main->contactEmail($email, $subject, $message); 
}


  }
    ?>
<div class="strip"> <span class="lt"></span>

   <p style="float: left">Contact Us</p>

</div>
<div class="page_content">
<br><br>
<div class="inner_page_conetnt">
    <h4 class="heading">How can we Help you</h4>
<br>
<p class="text">Let us know how we can improve your experience with Knownfaces<br></p>
<form action="contact_us_loggedin.php" method="post" name="contact_us">

<br><br>

<p class="text">Your Message</p>
<textarea name="message_text" rows="5" required cols="46"></textarea> 
<br><br>

<button  name="submit" class="btn btn-default" type="submit">Submit</button>

</form>

<br><br><br>
    
    
</div>
</div>

<?php
require 'footer.php';
?>