<?
$msg="";
$list_id="";

$title="";
$QueryString="";
$btn_name="submit";

//// List of Titles according to List type
	if(isset($_GET['lt']) && $_GET['lt']!="")
	{
	$list_type		= $_GET['lt'];

	if($list_type=='tt')
	{
	$link_title		= "Tender type";
	$page_title		= "Tender Type";
	$widget_title	= "Tender Type";
	$table_title	= "List of Tender Types";

		

	}elseif($list_type=='ct'){

	$link_title		= "Company type";
	$page_title		= "Company Type";
	$widget_title	= "Company Type";
	$table_title	= "List of Company Types";
		
	}
	}

/// Edit Process Here

	if(isset($_POST['update']))
	{

		unset($_POST['update']);

		if($main->db->update('tbl_list' , $_POST,array('list_id'=>$_POST['list_id'])))
						{
							$msg.=$adminProj->showAlert('success','Successfully Updated!');
						}else
						{
							$msg.=$adminProj->showAlert('danger','Error in Updation!');
						}

	}

	if(isset($_GET['mod']) && $_GET['mod']=='edit')
		{
			$list_id= $_GET['id'];
			$data	= $main->db->get_row('tbl_list',array('list_id'=>$list_id));
			$title	= $data['list_title'];
			
			$QueryString='&mod=edit&id='.$list_id;
			$btn_name="update";
		}

//////////////////////////// End of Edit Process





/// Delete Process start Here...
	if(isset($_GET['mod']) && $_GET['mod']=='trash')
		{
				$list_id= $_GET['id'];
				
				$res = $main->db->delete('tbl_list',array('list_id'=>$list_id) );
				 
				if($res)
					$msg.=$adminProj->showAlert('success','Successfully Deleted!');
				else
					$msg.=$adminProj->showAlert('danger','Error in deletion!');				 

				
		}



	
	
	
	
	if(isset($_POST['submit']))
	{
			$msg	=$adminProj->addListType($_POST);
			
	}

/// getting table data according to list type....
	$main->db->tail=" order by list_id desc";
	$rows	=$main->db->get_rows('tbl_list',array('list_key'=>$list_type));
	$main->db->tail="";


?>