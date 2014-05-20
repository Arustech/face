<style>
    .wrapper1  ul{
        list-style:none;
         position:relative;
               right:38px
    }
   .wrapper1 li{
        height:20px;
    }
  .wrapper1  a:hover{
       text-decoration: none;
    }
    .navigation ul 
    {
        	list-style:none;
               position:relative;
               right:38px
    }
    .navigation li 
    {
       height:20px;
       width:138px;
   }
    
    .navigation li:hover
    {
       background-color: #EFF2F7;
       
   
    }
  
    .navigation a:hover{
       text-decoration: none;
    }
    ul > .active {
 background-color: #D8DFEA;
 font-weight: bold;
    }
    .navigation a{
        font-size: 12px;
    }
    .navigation{
       
    /*border-left: 1px solid #CCCCCC;*/
  
    }
    .sidebar_wrapper{
       
    /*border-left: 1px solid #CCCCCC;*/
    border-right: 1px solid #CCCCCC;
    }
      .sidebar_heading{
       
         border-bottom: 1px solid #CCCCCC;
         width:138px;
    }
</style>
<?php
$forum_obj=$main->load_model('Forums');
$query = $_SERVER['PHP_SELF'];
$path = pathinfo( $query );
$url = $path['basename'];

$threads=$forum_obj->get_all_type_threads();
$at=count($threads);


$posts=$forum_obj->get_all_type_comments();
$ap=count($posts);
?>


<div class="sidebar_wrapper"  style="width:15%">
           
            <div class="navigation ">
            	<ul id="menu">
                    
                    <li  style="margin-top:20px"><a  href="<?= $main->config['web_path'] ?>forum.php">Forums</a></li>
                   <li><a href="<?= $main->config['web_path'] ?>new_forum.php">New Posts</a></li>
                   <li style="margin-bottom:30px"><a href="<?= $main->config['web_path'] ?>my_threads.php">My Threads</a></li>
                   <!--<li ><a href="<?= $main->config['web_path'] ?>subscribed_threads.php">Subscribed Threads</a></li>-->
                   
                    
                </ul>
            </div>
    <?php
    if($url=="forum.php"){
    ?>
    <div class="sidebar_heading"><span style="background-color:white;  border-bottom: 1px solid #CCCCCC;">Active Users</span></div>
        <ul style="margin-bottom:30px">
                   <li ><a  ></a></li>
                   <img style="width:40px;height:40px;margin:2px 2px 2px 2px" src="<?=$main->get_uurl('thumbs').$user['user_avatar']?>" alt='' title="<?=$user['user_name']?> online">

                </ul>
        
        <div class="sidebar_heading"><span style="background-color:white">Forum Statistics</span></div>
              <ul >
                   <li ><a ></a></li>
                   <li ><a ><span style="color:grey;margin-right: 10px;font-size: 12px">Threads</span><span style="font-size:11px;color:black"><?=$at?></span></a></li>  
                   <li ><a ><span style="color:grey;margin-right: 24px;font-size: 12px">Posts</span><span style="font-size:11px;color:black"><?=$ap?></span></a></li>
                      
                    
                </ul>
    <?php } ?> 
       
            </div>


<script>
var current_url = $(location).attr('href');

var target_li  = $('.navigation li:has(a[href="'+current_url+'"])');
target_li.addClass('active');

</script>