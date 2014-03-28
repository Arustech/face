<?php
/// version 1.0
/// last updated 27-11-2013

class Profile Extends Admin{

public $error;


# ************* Member Education Info Methods Here******************
	
	public function getEducationInfo($user_id){

	$arr	= $this->db->get_row('tbl_profile_education',array('user_id'=>$user_id));
	if(is_array($arr))
	return $arr;
	
	}
	
	publiC function addMemberEduInfo($data,$mod='insert'){
	
		$result	= false;
		$tbl	= 'tbl_profile_education';
						
		$fields		= $this->unsetA($data,'edu_update,education_id');
		$fields['last_updated']	= date('Y-m-d');
		
		if($mod=='insert'){
		$control			= $this->db->insert($tbl, $fields);
		}elseif($mod=='update'){
		$cond				= array('education_id'=>$data['education_id']);
		$control			= $this->db->update($tbl,$fields,$cond);
		}
	
		#insertion/updation process starts from Here....
		if($control)
			{
			$result		= true;
			}
	
		return $result;
	
	
	}
		
/****** End of Education info*/	



 public function getCountryHtml($country_id=false)
	{
		$arr	= $this->db->get_rows('tbl_country');
		
		$html = '';
		if(is_array($arr)){	
		foreach($arr as $ar)
		{
		$selected = "";
		if($country_id)
		{
		if($country_id == $ar['country_id'])
		$selected ="selected";
		}
		$html.="<option $selected value='".$ar['country_id']."' >".$ar['country_name']."</option>";
		}
		}
	return $html;
	
	}	
	
	
}// end of class
?>