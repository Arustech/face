<?php
/// version 1.0
/// last updated 25-11-2013

class BasicProfile Extends Member{

private $tbl	= 'tbl_profile_basic';
private $p_key	= 'profile_basic_id';
private $f_key ='user_id';


	# Add Member Profile Basic Information
	public function addMemberBasic($data)
	{			
		$result	= false;
		$fields		= $this->unsetA($data,'basic_update,user_id,profile_basic_id');
		$cond		= array($this->p_key=>$data['profile_basic_id']);
		$control	= $this->db->update($this->tbl,$fields,$cond);
			
		#updation process starts from Here....
		if($control)
			{
			$result		= true;
			}
	
		return $result;
	}
	
   public function getBasicProfileByID($id)
   {
      return $this->db->get_row($this->tbl,array($this->f_key=>$id));
      
   }
   
   public function update_profile($data,$user_id)
   {
      
      
      $user_arr = array(
          'user_name'=>$data['user_name'],
          'user_pwd'=>md5($data['user_pwd']),
          'user_email'=>$data['user_email']
          );
      if($data['user_pwd']=='')
      {
          $user_arr = $this->unsetA($user_arr, 'user_pwd');
      }
       
      $basic_arr = $this->unsetA($data,'user_name,user_pwd,user_email');
      
  
      
      $upd_user = $this->db->update('tbl_user',$user_arr,array('user_id'=>$user_id));
 
      
      
      
      if($upd_user)
      {
         $member=$this->load_model('Member');
         if($data['user_pwd']=='')
         {
            $user_arr['user_pwd']=$this->db->get_one('tbl_user', array('user_id'=>$user_id), $column = 'user_pwd');
         }
         $member->log_in_user($user_id,$user_arr['user_name'],$user_arr['user_pwd'],'profile');
                  
      }
      
      $upd_basic =$this->db->update('tbl_profile_basic',$basic_arr,array('user_id'=>$user_id));
      
      if($upd_basic || $upd_user)
      {
         $this->alert('success',"Basic Profile Updated");
      }
    
      
      
      
      
      
      
   }
   
	 
		
	public function getBasicDropdownHtml($field,$val=false)
	{
		if($field=='religion')
		$arr = array('Christian'=>'Christian','Hindu'=>'Hindu','Jew'=>'Jew','Muslim'=>'Muslim');
		if($field=='gender')
		$arr = array('Male'=>'Male','Female'=>'Female');
		if($field=='relation')
		$arr = array('InAnOpenRelationship'=>'Open','InARelationship'=>'Engaged','IsSingle'=>'Single','ItsComplicated'=>'Complicated','Married'=>'Married');
		if($field=='lookingfor')
		$arr = array('Friendship'=>'Friendship','RandomPlay'=>'RandomPlay','Relationship'=>'Relationship');
		
		$html = '';
			
		foreach($arr as $key=>$ar)
		{
			$selected = "";
			if($val)
			{
			if($val == $key)
			$selected ="selected";
			}
			$html.="<option value='$key' $selected>$ar</option>";
		}
		return $html;
	}
	
	
}// end of class
?>