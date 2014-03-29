<?php
include("lib/Main.php");
$main = new Main;
$member = $main->load_model('Member');
$obj_album  = $main->load_model('Album');
$user = $member->check_user();

$post_title = "";
$post_access = "";
if(isset($_REQUEST['mod']) && $_REQUEST['mod']=='images_process')
{
    $imgz           = isset($_REQUEST['images']) ? $_REQUEST['images'] : ""; 
    $post_title     = isset($_REQUEST['post_title']) ? $_REQUEST['post_title'] : ""; 
    $post_access     = isset($_REQUEST['post_access']) ? $_REQUEST['post_access'] : "";
     $user_access     = isset($_REQUEST['user_access']) ? $_REQUEST['user_access'] : "0"; 
    //$imgz   = !empty($imgz)? json_decode($imgz) : "";
   
}

?>

<div style="width: 250px;margin-left: 30px;max-height:400px ">
<form id="img_form" method="post" name="pix_process">
    
    
        
        
    <span>Create New Album<input style="margin-left:20px" type="radio" value="create" checked id="new" name="album"/></span>
        <BR>
      <span>  Select Existing<input style="margin-left:50px" type="radio" value="exist" id="existing" name="album"/></span>
        <BR>
        <span   id="new_album">
            <input style="margin-top:5px" type="text" name="album_name" value="" placeholder="Enter album name"/>   
        </span>
        <BR>
        <span style="display:none" id="exist_album">
            Select Album
            <select style="min-width:100px" name="album_id" >
                <?=$obj_album->getAlbumsDropdown(0,$user['user_id'])?>
            </select>
             
        </span>
        <span><input style="margin: 5px; background-color: #428BCA;border-color: #357EBD;color: #FFFFFF;" type="button" id="finish" name="finish" value="Finish"/></span>
        <BR>
        <?php if(is_array($imgz) && !empty($imgz)) { foreach($imgz  as $img){?>
        <span><img style="margin-top: 2px;margin-bottom: 2px" src="<?=$main->config['upload_url']?>temp/thumb/<?=$img?>"/></span>
        <input type="hidden" name="images[]" value="<?=$img?>"/>        
        <?php } } 
        ?>
        
        <input type="hidden" name="user_id" value="<?=$user['user_id']?>"/>
        <input type="hidden" name="post_access" value="<?=$post_access?>"/>
        <input type="hidden" name="user_access" value="<?=$user_access?>"/>
        <input type="hidden" name="post_title" value="<?=$post_title?>"/>
        <input type="hidden" name="action" value="post_imgz"/>
    
    
    
    
</form>
</div>