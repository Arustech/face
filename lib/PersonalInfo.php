<?
/// version 1.0

class PersonalInfo Extends Member{
private $tbl	= 'tbl_profile_personal';
private $p_key	= 'personal_id';


	# ************* Member Personal Info Methods Here******************
	
	public function getPersonalInfo($user_id){

	$arr	= $this->db->get_row($this->tbl,array('user_id'=>$user_id));
	if(is_array($arr))
	return $arr;
	
	}
	
	publiC function addMemberPersonalInfo($data){
	
		$result	= false;
		
						
		$fields		= $this->unsetA($data,'personal_update,personal_id');
		$fields['last_updated']	= date('Y-m-d');
		
		$cond				= array($this->p_key=>$data['personal_id']);
		$control			= $this->db->update($this->tbl,$fields,$cond);
		
	
		#insertion/updation process starts from Here....
		if($control)
			{
			$result		= true;
			}
	
		return $result;
	
	
	}
		
/****** End of Personal info*/	


	
	
}// end of class
?>