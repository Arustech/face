<?php
$obj_comment = $main->load_model('Comments'); // include class to process...
$obj_member	 = $main->load_model('Member'); // include class to process...


#............................................................


$msg		= "";
$post_id	= "";
$btn_name	= 'submit';

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

	if(isset($_GET['post_id']))
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
	
	
?>