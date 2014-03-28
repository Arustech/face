<?
$obj_cms = $main->load_model('Cms'); 
$obj_acc = $main->load_model('Account'); 

#.....................................................................................

$msg="";
$ban_val="";

#..........................................Edit Process...............................



if(isset($_POST['submit'])) // for CMS SETTING
{
	$msg	= $obj_cms->updateCms($_POST,$_FILES);
}


$cms	= $obj_cms->getCmsList();


$opt_site_title			= $cms['opt_site_title'];
$opt_meta_keyword		= $cms['opt_meta_keyword'];
$opt_meta_description	= $cms['opt_meta_description'];
$opt_pagi				= $cms['opt_pagi'];
$opt_site_logo			= $cms['opt_site_logo'];
$opt_footer_logo		= $cms['opt_footer_logo'];
$opt_facebook			= $cms['opt_facebook'];
$opt_twitter			= $cms['opt_twitter'];
$opt_youtube			= $cms['opt_youtube'];
$opt_linkdn				= $cms['opt_linkdn'];
$opt_rssfeed			= $cms['opt_rssfeed'];

#......................................Advertising Area...........................

	if(isset($_POST['adv']))
	{
		$msg	= $obj_cms->updateAdv($_POST,$_FILES);		
	}
#......................................Banner Uploading...........................

	
	
	$banner_image	= "";

	if(isset($_POST['banner']))
	{
		$msg	= $obj_cms->updateFrontBanner($_POST,$_FILES);		
	}
	
	if(isset($_GET['mod']) && $_GET['mod']=='banner')
	{
	$ban_val	= $_GET['bt'];
	$row		=$main->db->get_row('tbl_banner',array('banner_title'=>$ban_val));
	$banner_title	= $row['banner_title'];
	$banner_image	= $row['banner_image'];

	}
	
	

#.......................................Admin CMS SETTING .........................


/// for account edit process..
	if(isset($_POST['account']))
	{
		$msg	= $obj_acc->updateAccount($_POST);
	}

// --- getting account values from tbl_accounts
	$acc	= $obj_acc->getAccountsData();

	$email					= $acc['email'];
	$ind_charges			= $acc['ind_charges'];
	$company_charges		= $acc['company_charges'];
	$adv_charges			= $acc['adv_charges'];
	$feature_charges		= $acc['feature_charges'];
	$listing				= $acc['listing'];


	
	
#~~~~~~~~~~~~~~~~~~~~~~~~ All Credit Goes To ArusTech Team ~~~~~~~~~~~~~~~~#	
?>