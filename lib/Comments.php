<?php
/// version 1.0

class Comments Extends Main{


	# ************* Member Posts  Methods Here******************
	
	
	# Get Post Comments
	public function getComments($type='comment',$sql=false,$id=false)
	{
	
	$tbl	= 'tbl_post_comment';
	$key	= 'comment_id';
	if($type=='post'){
	$key	= 'post_id';
	}
	
	
	
	$cond	= ($id)? array($key=>$id) : "";
	
	if($sql){
	$arr	= $this->db->gen_sql($tbl,$cond);
	}else{
	$arr	= $this->db->get_rows($tbl,$cond);
	//echo $this->db->sql;exit;
	if(is_array($arr))
	$arr	= is_array($arr)? $arr : ""; 
	}
	return $arr;
	
	
	}// end of getCountries
	
	
	

	
	
	
			
/****** End of UpdateExtraData*/
	
	
	
}// end of class
?>