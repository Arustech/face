<?php
$cats=$forum_obj->get_all_forum_cats();

?>
<div style="float:right;margin-top: 60px;margin-right: 14px">
    <span style="color:#757575;font-size:12px "> Select a Topic for new Thread:</span><br>       
             <select class="target" style="width:250px">
              <option style="background-color: #0897B9"  value="">Select a topic...</option>   
          <?php  foreach($cats as $cat)
          {
              ?>
                 <option style="background-color: #DCDCDC" disabled value="<?=$cat['topic_id']?>"><?=  ucfirst($cat['topic_name'])?></option>
               <?php 
               $topics=$forum_obj->get_forum_topics($cat['topic_id']);
              
               foreach($topics as $topic)
               {
              ?>
                 <option style="margin-left:10px" value="<?=$topic['topic_id']?>">  <?=ucfirst($topic['topic_name'])?></option>
               <?php } ?>
            
                
          <?php  } ?>
            
              </select>
             
         </div>
<script>
    $( ".target" ).change(function() {
        var x=$(this).val();

    window.location="<?=$main->config['web_path']?>new_thread.php?id="+x;
});
</script>