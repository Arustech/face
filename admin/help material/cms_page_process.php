<?
$obj_cms = $main->load_model('Cms'); 

$msg		="";
$cms_id		="";
$cms_page	="";
$cms_key	= "";
$cms_eng	= "";
$btn_name="submit";


/// Edit Process Here

	if(isset($_POST['update']))
	{
		$msg	=$obj_cms->updateCmsPage($_POST);
	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$cms_id			= $_GET['id'];
			$row		= $obj_cms->getPagesData($cms_id);
			
			$cms_id		= $row['cms_id'];
			$cms_page	= $row['cms_page'];
			$cms_key	= $row['cms_key'];
			$cms_eng	= $row['cms_eng'];
			$btn_name	= 'update';
			
		}

//////////////////////////// End of Edit Process

/// getting table data according to list type....

	$rows	=$obj_cms->getPagesData();

#~~~~~~~~~~~~~~~~~~~~~~~ Developed By ArusTech Team~~~~~~~~~~~~~~~~~~~~~
?>