<?php
/// version 1.0

class ContactProfile Extends Member{
private $tbl	= 'tbl_profile_contact';
private $p_key	= 'contact_id';


	# ************* Member Contact Info Methods Here******************
 public function getContactInfo($user_id){

	$arr	= $this->db->get_row($this->tbl,array('user_id'=>$user_id));
	if(is_array($arr))
	return $arr;
	
	}
   
   
   public function get_contact($user_id)
   {
      return $this->db->get_row($this->tbl,array('user_id'=>$user_id));
   }
   
   public function update_contact($data,$user_id)
   {
      if ($this->db->update($this->tbl,$data,array('user_id'=>$user_id)))
              $this->alert('success','Contact Profile Updated');
              else 
                $this->alert('warning','No changes');
   }

	publiC function addMemberContactInfo($data){
	
		$result	= false;
								
		$fields		= $this->unsetA($data,'contact_update,contact_id');
		$fields['last_updated']	= date('Y-m-d');
		
		$cond				= array($this->p_key=>$data['contact_id']);
		$control			= $this->db->update($this->tbl,$fields,$cond);
		
	
		#insertion/updation process starts from Here....
		if($control)
			{
			$result		= true;
			}
	
		return $result;
	
	
	}
/****** End of Contact info*/


	
	
}// end of class
?>