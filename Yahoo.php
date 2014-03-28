<?php
include_once 'config.php';
?>
<!doctype html>
<html>
    <body>
<center>
<!--<a href="<?=$connected_path?>" target="_blank">Contacts From Yahoo</a>-->

<!--<input type="image" src="img/yahoo-contacts.png" href="<?=$connected_path?>" onclick="return popitup(\''.<?=$connected_path?>_.'\');" />;-->

    <?php echo '<input type="image" src="img/yahoo-contacts.png" href="'.$connected_path.'" onclick="return popitup(\''.$connected_path.'\');" />';?>

</center>
</body>

<script>
function popitup(url) {
	newwindow=window.open(url,'yahoo','width=778,scrollbars=1');
       
      
	if (window.focus) {
            newwindow.focus();
            
             $(newwindow.document).ready(function(){
           
      
       });
            
          
            
        }
	return false;
}
</script>

</html>