<div class="loop-container adjustment">
   <?php
   
  $user_id=$user['user_id'];
  if(!empty($visit_user_id))
  {
      $user_id  = $visit_user_id;
      $visitor  =   1;
  }
   
   $posts_ = $main->load_model('Posts');
   $posts = $posts_->get_all_posts($user_id,1,$visitor);
   echo $posts;
   ?>
</div>
<script type="text/javascript">
   $(function() {
      $('#post_comment').autosize();
   });

</script>