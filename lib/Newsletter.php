<?
/// version 1.0
/// last updated 27-11-2013

class Newsletter Extends Main{

public $error;
	public function getSubscribersList()
	{
		$tbl	= 'tbl_newsletter';
		$res	=  $this->db->get_rows($tbl);
		
		if($res)
		{
				return $res;
		}else
		{
				return false;
		}
	}
	
	
	
	public function addSubscriber($data)
	{
			$msg="";
			unset($data['submit']);
		$data['newsletter_date']	= $this->currentDate();	
		
		$admin	= $this->load_model("Admin");
		if($this->db->insert('tbl_newsletter' , $data))
					{
					$msg.=$admin->noti('success','You are successfully subscribed!');
					}else
					{
					$msg.=$admin->noti('error','Oops! Error Occured!');
					}
	
		return $msg;
	}

	
}// end of class
?>