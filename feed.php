<div class="loop-container">
   <?php
   $posts_ = $main->load_model('Posts');
   $posts = $posts_->get_all_posts($user['user_id'],0,0,10);
   echo $posts;
   ?>
</div>
<script type="text/javascript">
   $(function() {
      $('#post_comment').autosize();
   });

</script>