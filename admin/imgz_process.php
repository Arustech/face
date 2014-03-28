<?php
$obj_extra		= $main->load_model('Extra'); // include class to process...
$obj_img		= $main->load_model('Images'); // include class to process...


#............................................................


$msg		= "";
$post_id	= "";
$btn_name	= 'submit';
$album_id	='';

if(isset($_GET['album_id']))
{
$album_id	= $_GET['album_id'];
}

#...............................Insert Process start Here.....

	if(isset($_POST['submit']))
		{
			if($obj_img->getAddImages($_POST,$_FILES))
				{
					$msg.=$admin->showAlert('success','Images Successfully Uploaded!');
				}else
				{
					$msg.=$admin->showAlert('danger','Error Occured!');
				}		
		}

#...............................Delete Process start Here.....
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$comment_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_post_comment',array('comment_id'=>$comment_id) );
				 
				if($res)
					$msg.=$adminProj->showAlert('success','Successfully Deleted!');
				else
					$msg.=$adminProj->showAlert('danger','Error in deletion!');				 

				
		}
	
	

#.........................Comments List...................

/*	if(isset($_GET['post_id']))
	{
	$post_id	= $_GET['post_id'];
	}
	
	$user_sql	=$obj_comment->getComments('post',1,$post_id);
			//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($user_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$comments = $main->db->ex($page->getSQL());
*/	
	
?>