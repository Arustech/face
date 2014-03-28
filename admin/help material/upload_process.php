<?
/// uploading tender documents....
$msg="";
$tend_id="";

/// submitting form data
$tends="";
if(isset($_POST['submit']))
{

	$msg	=$obj_tend->uploadTenderFile($_POST,$_FILES);
	
}
if(isset($_GET['mod']) && $_GET['mod']=='search' || $_GET['mod']=='trash')
{
		if($_GET['mod']=='trash')
		{
		$msg	= $obj_tend->delTenderFiles($_GET['id']);
		}

		$tend_sql	= $obj_tend->getTenderUploads($_GET['t_id']);
		$page  = $main->load_model('Page');
		$pagedb=$main->db->pdo;
		$page->setSQL($tend_sql);
		$page->setPaginator( 'pagetend');
		$page->setLimitPerPage();
		$tends = $main->db->ex($page->getSQL());

}

	
?>