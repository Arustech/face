<?
/// version 1.0
/// last updated 23-11-2013

class Company Extends Admin{

	
		
		/// add company			
		public function addCompany($data,$file)
			{
				$msg="";
				$real_name="";		
				if($file['file']['name']!="")
				{
					$real_name= $file['file']['name'];
				}
						
				$filename	=$this->uploadFile($file);
				
					$data['img_name']	= $filename;
					$data['real_name']	= $real_name;
					unset($data['submit']);
					unset($data['comp_id']);
					
					if($this->db->insert('tbl_cms_company' , $data))
					{
					$msg.=$this->showAlert('success','Company Successfully Added!');
					}else
					{
					$msg.=$this->showAlert('danger','Oops! Problem Occured!');
					}
				if($filename=="")
				{	
					$msg.=$this->showAlert('danger','Incorrect logo file!');
				}
				
				return $msg;

				
			}/// addCompany ends	
			
			
			
			
			
			
			
			
		public function updateCompany($data,$file=false)	
			{
				$msg="";
				
				if($file)/// ll proceed if upload logo ...
				{		
							
						$real_name= $file['file']['name'];
						$filename	=$this->uploadFile($file);
						if($filename!="")
						{
							$data['img_name']	= $filename;
							$data['real_name']	= $real_name;
						}					
			
				
				}
								
				
				$cond 		= array('id'=>$data['comp_id']);
				unset($data['comp_id']);
				unset($data['update']);	
					
					if($this->db->update('tbl_cms_company' , $data,$cond))
					{
						$msg.=$this->showAlert('success','Company Successfully Updated!');
					}else
					{
						$msg.=$this->showAlert('danger','Error in Company Updation!');
					}
		
				return $msg;
						
					
			}/// end of updateCompany function
					
		
		
		
				
		
		
		
		
		/// searching for Companies 
		public function searchCompany($data)
			{
				$sql	= "select * from tbl_cms_company where title like '%$data%' order by id";
				
				return $sql;
			}
		
		



		
		public function getCompanyList($sql=false,$cond=false)
			{	
				
					if($cond)
					return $this->db->get_row('tbl_cms_company',$cond);
					if($sql)	
					$sql	= "select * from tbl_cms_company order by id desc";
					return $sql;
			}		
	
	
		
	
	
	
		public function delCompany($comp_id)
			{
			
			
				$msg="";
				
				$row  = $this->db->get_row('tbl_cms_company',array('id'=>$comp_id));
				if($row)
				unlink($this->config['upload_path'].$row['img_name']);/// deleting logo from folder...					
				
                 $res = $this->db->delete('tbl_cms_company',array('id'=>$comp_id) );
				 
				if($res)
					$msg.=$this->showAlert('success','Company Successfully Deleted!');
				else
					$msg.=$this->showAlert('danger','Error in Company deletion!');				 
				 
            		
				return $msg;
			}	
}// end of class
?>