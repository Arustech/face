<?php
$obj_posts	 = $main->load_model('Posts'); // include class to process...
$obj_member	 = $main->load_model('Member'); // include class to process...


#............................................................


$msg		= "";
$user_id	= "";
$btn_name	= 'submit';

#.........................................Delete Process..........................
	
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
	{
		$user_type	=$_GET['t'];
		$id	=$_GET['id'];
		
		$msg	=$obj_member->delMember($user_type,$id);
		
	}
	
	
	
#....................Feature Company Process...............

	

#.........................Members List...................

	if(isset($_GET['user_id']))
	{
	$user_id	= $_GET['user_id'];
	}
	
	$user_sql	=$obj_posts->getPosts('user',1,$user_id);
			//Pagination

	$page  = $main->load_model('Page');
	$pagedb=$main->db->pdo;
	$page->setSQL($user_sql);
	$page->setPaginator('pagetend');
	$page->setLimitPerPage();
	$posts = $main->db->ex($page->getSQL());
	
	
?>