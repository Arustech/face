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
  if($_POST['feedback_text']!=''){  
  $feedback_text=$_POST['feedback_text'];
  }
  else{
    $feedback_text="Feedback Box Left Empty By User";  
  }
  $user_info=$member->check_user();  
  $email=$user_info['user_email'];
  $subject="Feedback";
  $message="<h3>Feedback from user</h3><User has awarded >".$_POST['rating-input-1']." Stars out of 5 to Knownfaces<br><h4>User Feedback:</h4>".$feedback_text;
  $main->contactEmail($email, $subject, $message); 
}
    ?>
<div class="strip"> <span class="lt"></span>

   <p style="float: left">Feedback</p>

</div>
<div class="page_content">
<br><br>
<div class="inner_page_conetnt">
    <h4 class="heading">Give your feedback about Knownfaces</h4>
<br>
<p class="text">Let us know how we can improve your experience with Knownfaces<br><br>Rate your experience using Knownfaces:</p>
<form action="feedback.php" method="post" name="feedback">
<span class="rating">
    <input type="radio" class="rating-input"
           id="rating-input-1-5" name="rating-input-1" value="5">
    <label for="rating-input-1-5" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-4" name="rating-input-1" value="4">
    <label for="rating-input-1-4" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-3" name="rating-input-1" value="3">
    <label for="rating-input-1-3" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-2" name="rating-input-1" value="2">
    <label for="rating-input-1-2" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-1" name="rating-input-1" value="1" checked>
    <label for="rating-input-1-1" class="rating-star"></label>
</span>
<br><br>
<p class="text">Your Feedback</p>
<textarea name="feedback_text" rows="5" cols="46"></textarea> 
<br><br>

<button  name="submit" class="btn btn-default" type="submit">Submit</button>

</form>

<br><br><br>
    
    
</div>
</div>

<?php
require 'footer.php';
?>