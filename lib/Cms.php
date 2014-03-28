<?
/// version 1.0
/// last updated 27-11-2013

class Cms Extends Admin{

public $error;
	public function getCmsList()
	{
		$tbl	= 'tbl_opt';
		$cond	= array('opt_id'=>1);	
		$res	=  $this->db->get_row($tbl,$cond);
		
		if($res)
		{
				return $res;
		}else
		{
				return false;
		}
	}
	
	
	
	public function updateCms($data,$img)
	{
			$msg="";
			unset($data['submit']);
			
			
			
			if($img['logo']['name']!="")
			{
					$filename 	= strtolower($img['logo']['name']) ; 
					$image_name		= time().'_'.$filename;		
					move_uploaded_file($img["logo"]["tmp_name"],
					$this->config['upload_path']. $image_name);
					
					$data['opt_site_logo'] = $image_name;	
			
			}

			if($img['footer']['name']!="")
			{
					$filename 	= strtolower($img['footer']['name']) ; 
					$image_name		= time().'_'.$filename;		
					move_uploaded_file($img["footer"]["tmp_name"],
					$this->config['upload_path']. $image_name);
					
					$data['opt_footer_logo'] = $image_name;	
			
			}
			
	
		if($this->db->update('tbl_opt' , $data,array('opt_id'=>1)))
					{
						$msg.=$this->showAlert('success','Setting Successfully Updated!');
					}else
					{
						$msg.=$this->showAlert('danger','Oops! Error Occured!');
					}
	
		return $msg;
	}

	public function getAdvHtml($type)
	{
		$tbl	= 'tbl_adv';
		$cond	= array('adv_type'=>$type);
		$res	=  $this->db->get_rows($tbl,$cond);
				
		
		$html="";		
		if($res)
		{
			$attr="";
			if($type=="bottom")
			$attr	='width="100%"';
			
			
			foreach($res as $r)
			{
			$html.='<img src="'.$this->config['upload_url'].$r['adv_photo'].'" '.$attr.' >';
			}	
		}
		if($type=='side')
		{
		$html= $res[0]['adv_photo']; // basically it ll b a side video url...
		}
		if($type=='bottom_url')
		{
		
		
		$html= $res[0]['adv_photo']; // basically its a side url...
		}
		
		return $html;
	}

	
	
	public function updateAdv($val,$img)
	{
	
			$msg = "";
			
			$data=array();
			
			if($val)
			{
					if(isset($val['side']))
					{
					$data['adv_photo'] = $val['side'];
					
					$this->db->update('tbl_adv' , array('adv_photo'=>$val['side']),array('adv_id'=>1));
									
					}
					if(isset($val['adv_url']))
					{
					$data['adv_photo'] = $val['adv_url'];
					
					$this->db->update('tbl_adv' , array('adv_photo'=>$val['adv_url']),array('adv_id'=>3));
					}
				
			}
			

			if($img['bottom']['name']!="")
			{
					$filename 	= strtolower($img['bottom']['name']) ; 
					$image_name		= time().'_'.$filename;		
					move_uploaded_file($img["bottom"]["tmp_name"],
					$this->config['upload_path']. $image_name);
					
					$data['adv_photo'] = $image_name;
					
					if($this->db->update('tbl_adv' , $data,array('adv_id'=>2)))
					{
					$msg =$this->showAlert('success','Advertisement Successfully Uploaded!');
					}else
					{
						$msg =$this->showAlert('danger','Oops! Error Occured!');
					}
			
			}
			
	
		
	
		return $msg;
	}
	
	
	public function getFeature()
	{
			
			
		$tbl	= 'tbl_company';
		$cond	= array('company_feature'=>'1');
		$res	=  $this->db->get_rows($tbl,$cond);
		
		
		$html="";		
		if($res)
		{
						
			foreach($res as $r)
			{
			$html.='<li><img src="'.$this->config['upload_url'].$r['company_photo'].'" ></li>';
			}	
		}
		
		return $html;
	
	}
	
	public function addNews($data)
	{
		$tbl				= 'tbl_news';
		$msg				= "";
		$id					= $data['news_id'];
		if($id!="")
		{
		$news	= $this->unsetA($data,'update,news_id');
		$res	= $this->db->update('tbl_news',$news,array('news_id'=>$id));
		
		if($res)
			$msg = $this->showAlert('success','News Successfully Updated!');
			else
			$msg = $this->showAlert('error','Oops Error Occured while Updating!');

		}else
		{
		$news	=$this->unsetA($data,'submit,news_id');
		$news['news_date']	= $this->currentDate();
		$res	=  $this->db->insert($tbl,$news);
		if($res)
			$msg = $this->showAlert('success','News Successfully Added!');
			else
			$msg = $this->showAlert('error','Oops Error Occured!');

		}	
		return $msg;
	}

	public function getNewsList($id=false)
	{
			if($id)
			{
			$rows	=$this->db->get_row('tbl_news',array('news_id'=>$id));
			}else
			{
			$this->db->tail=" order by news_id desc";
			$rows	=$this->db->get_rows('tbl_news');
			$this->db->tail="";
			}
			return $rows;
	}
	
	// getting list of users to send email ...
	public function getUsersEmails()
	{
		$html="";
		$rows	=$this->db->get_rows('tbl_user');
		if($rows)
		{
			foreach($rows as $row)
			{
				$html.='<option value="'.$row['user_email'].'">'.$row['user_email'].'</option>';
			}
		
		}
		return	$html;		
	
	}
	
	public function sendNewsletter($data)
	{
		$mail			= $this->load_model("PHPMailer");
				
		$error_count	= 0;
		$result			= false;
		foreach($data['users_emails'] as $address)
		{
			
			$mail->From 	= $this->config['admin_email'];
			$mail->Subject 	= $data['subject'];
			$mail->Body   	= $data['message'];//html email
			$mail->addAddress($address);
			$mail->WordWrap = 50;  
			$mail->isHTML(true); // Set email format to HTML
			
			if(!$mail->send())$error_count++;
			else	$result	= true;
			
		}
		
		if($error_count!=0)
		$this->error	= $error_count;
		
	
	return $result;
	}
	
	public function updateFrontBanner($data,$img)
	{
			$msg="";
			unset($data['banner']);
			
			
			if($img['banner']['name']!="")
			{
					$filename 	= strtolower($img['banner']['name']) ; 
					$image_name		= time().'_'.$filename;		
					move_uploaded_file($img["banner"]["tmp_name"],
					$this->config['upload_path']. $image_name);
					
					$data['banner_image'] = $image_name;	
			
			}

			
			
	
		if($this->db->update('tbl_banner' , $data,array('banner_title'=>$data['banner_title'])))
					{
						$msg.=$this->showAlert('success','Banner Successfully Updated!');
					}else
					{
						$msg.=$this->showAlert('danger','Oops! Error Occured!');
					}
	return $msg;
	}
	
	#--------------------------------- Pol & SErvices Methods Here-----
	public function updatePol($data)
	{
			$msg="";
			unset($data['update']);
			
			
	
		if($this->db->update('tbl_pol' , $data,array('pol_id'=>1)))
					{
						$msg.=$this->showAlert('success','Pol Successfully Updated!');
					}else
					{
						$msg.=$this->showAlert('danger','Oops! Error Occured!');
					}
	return $msg;
	}
	#--///////End of Pol & SErvices Methods
	
	#---------------------------------- CMS Pages Data Methods------------ 
	public function getPagesData($id=false)
	{
			if($id)
			{
			$rows	=$this->db->get_row('tbl_cms',array('cms_id'=>$id));
			}else
			{
			$this->db->tail=" order by cms_id desc";
			$rows	=$this->db->get_rows('tbl_cms');
			$this->db->tail="";
			}
			return $rows;
	}
	
	
	public function updateCmsPage($data)
	{
		$msg="";
			$id		= $data['cms_id'];	
			$fields	= $this->unsetA($data,'update,_wysihtml5_mode,cms_id');

	
		if($this->db->update('tbl_cms' , $fields,array('cms_id'=>$id)))
					{
						$msg.=$this->showAlert('success','Page Content Successfully Updated!');
					}else
					{
						$msg.=$this->showAlert('danger','Oops! Error Occured!');
					}
	return $msg;
	
	}
	
	#--///////End of CMS Pages Data Methods
	
	#---------------------------------------Method to GEt PAge Content....
	
	public function getPageContent($cms_page=false)
	{
		
	
	($cms_page)?$page	= $cms_page : $page='home_page';	
	$rows		= $this->db->get_rows('tbl_cms',array('cms_page'=>$page),0,array('cms_key','cms_eng'));
	
	$content = array();
	
	if(is_array($rows))
	{	
		
		foreach($rows as $row){
				foreach($row as $key=>$value)
				{
					$content[$value]= $row['cms_eng'];
				}
		
		}
		
	}
	return $content;	
				
	}
	
}// end of class
?>