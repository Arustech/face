<?
/// version 1.0
/// last updated 29-11-2013

class Account Extends Main{
		

	
	public function getAccountsData()
	{
		$rows	= $this->db->get_rows('tbl_accounts',array(),0,array('accounts_key','accounts_value'));
		$arr = array();
		
		if($rows)
		{
		
		
			foreach($rows as $row )
			{
			    foreach ($row as $key=>$val)
				{
				
				
				$arr[$row['accounts_key']] =$val;
				
				 
				
				 
				 
				}
			
			}
			
			
					return $arr;
		}
		
	}
	
	
	public function updateAccount($data)
	{
		$obj_admin = $this->load_model('Admin');
		
		$acc	=$this->unsetA($data,'account');
		 
		$chk	= false;
		
		foreach($acc as $key=>$ac)
		{
		
		
		$res	= $this->db->update('tbl_accounts',array("accounts_value"=>$ac),array('accounts_key'=>$key));
			
			if($res)
				$chk = true;	
		}
		
		if($chk)
		return $msg = $obj_admin->showAlert('success','News Successfully Added!');
		else
		return $msg = $obj_admin->showAlert('danger',' Oops , error occured while updating!');
		
	}
	

}// end of class
?>