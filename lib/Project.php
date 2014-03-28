<?
/// version 1.0
/// last updated 28-11-2013

class Project Extends Admin{

	
	public function getProjNo()
	{
		
		$query	="SELECT AUTO_INCREMENT as proj_no FROM information_schema.tables WHERE table_name = 'tbl_proj'
AND table_schema = DATABASE( ) ";
		
		$row		= $this->db->ex($query);
		$proj_no	= "PRJ_".$row[0]['proj_no'];
		return $proj_no;
	}	
	
	
	public function postProject($data)
	{
		

		$data['category_id']		= $data['cat_data'];
		$data['company_id']			= $data['tender_company'];
		$data['proj_date']			= $this->currentDate();
		$fields						= $this->unsetA($data,'tender_company,submit,cat,subcat,cat_data,_wysihtml5_mode,selected_cats,row_id,proj_no');
		
		
			
		
		
			if($this->db->insert('tbl_proj' , $fields))
			{
				
					// sending mail to list of users..
					$category	= $this->getAllCats('tbl_category',$fields['category_id']);
					
					$obj_user		= $this->load_model('User');
					$users			= $obj_user->getUsersByCat($category);
			if(is_array($users))
			{
				foreach($users as $user)
				{
					$email		= $user['user_email'];
					$subject	= 'New Project Posted @ '.$this->config['title'];
					$msg		= '
					<table>
						<tr><td>Project Title		</td><td>: &nbsp;'.$fields['proj_subject'].'</td></tr>
						
						<tr><td>Project Description		</td><td>: &nbsp;'.$fields['proj_desc'].'</td></tr>
						
						<tr><td>Project Budget		</td><td>: &nbsp;'.$fields['proj_budget'].'(QR)</td></tr>
						
						<tr><td>Project Bond		</td><td>: &nbsp;'.$fields['proj_bond'].'(QR)</td></tr>
						
						<tr><td>Project Fees		</td><td>: &nbsp;'.$fields['proj_fees'].'(QR)</td></tr>
						
						<tr><td>Project Posting Date		</td><td>: &nbsp;'.$fields['proj_date'].'</td></tr>
						
						<tr><td>Project Closing Date		</td><td>: &nbsp;'.$fields['proj_close_date'].'</td></tr>
						
						<tr><td>Contact	Email	</td><td>: &nbsp;'.$fields['proj_email'].'</td></tr>
						
						<tr><td>Contact	Phone	</td><td>: &nbsp;'.$fields['proj_phone'].'</td></tr>
						
						<tr><td>Url		</td><td>: &nbsp;'.$this->config['web_path'].'project_details.php?pid='.$this->db->last_id.'</td></tr>
							
					</table> 
					';
					
						$this->sendEmail($email, $subject, $msg);
						
				}
			
			}
						return true;
			
				
		}else
		{
				return false;
		}
	
	
	}
	
	
	public function updateProject($data)
	{
		

			$data['category_id']	= $data['cat_data'];
			$data['company_id']		= $data['tender_company'];
			$proj_id				= $data['row_id'];
			
			
			$fields						= $this->unsetA($data,'tender_company,update,cat,subcat,cat_data,_wysihtml5_mode,selected_cats,row_id,proj_no');
			
			$cond 		= array('proj_id'=>$proj_id);
				
					if($this->db->update('tbl_proj' , $fields,$cond))
					{
					return true;
					}else
					{
					return false;
					}

	
	
	}

	
	public function searchProject($data)
	{
		$proj_no	="";
		if(strstr($data,'PRJ'))
		{
			$row		= explode('_',$data);
			$proj_no	= $row['1'];
		}
		
		$sql	= "select * from tbl_proj where proj_id='$proj_no' or proj_subject like '%$data%' or proj_date like '%$data%' order by proj_id";
		
		return $sql;
	}
	


	public function delProject($proj_id)
		{
			if($this->db->delete('tbl_proj',array('proj_id'=>$proj_id))) 
			{
				return true;
			}
			else
			{
				return false;
			}
		
		}
	public function getProjectList($sql=false,$proj_id=false,$front_end=false)
	{
			
			$tbl	= 'tbl_proj';		
			$cond	=0;
			if($front_end)
			{
			$cond	= array('proj_status'=>'1');
			}
			if($proj_id){
				$cond	=array('proj_id'=>$proj_id);
				return $this->db->get_row($tbl,$cond);
			 }
			if($sql){
				$this->db->tail	=' order by proj_id desc';
				$res = $this->db->gen_sql($tbl,$cond);
				$this->db->tail	='';
				return $res;
				
				}elseif($cond==0)
				{
				return $this->db->get_rows($tbl);
				}
		
	}	
	
	
		
}// end of class
?>