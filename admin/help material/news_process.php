<?
$obj_cms = $main->load_model('Cms'); 

$msg="";
$news_id="";
$title	= "";
$url	= "";
$btn_name="submit";


/// Edit Process Here

	if(isset($_POST['update']))
	{
		$msg	=$obj_cms->addNews($_POST);
	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$news_id			= $_GET['id'];
			$row		= $obj_cms->getNewsList($news_id);
			
			$title		= $row['news_title'];
			$url		= $row['news_url'];
			$btn_name	= 'update';
			
		}

//////////////////////////// End of Edit Process





/// Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$news_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_news',array('news_id'=>$news_id) );
				 
				if($res)
					$msg.=$obj_cms->showAlert('success','Successfully Deleted!');
				else
					$msg.=$obj_cms->showAlert('danger','Error in deletion!');				 
				
				header("Location:".$main->config['web_admin']."news.php");	
				
		}

	
	if(isset($_POST['submit']))
	{
			$msg	=$obj_cms->addNews($_POST);
			
	} 

/// getting table data according to list type....

	$rows	=$obj_cms->getNewsList();


?>