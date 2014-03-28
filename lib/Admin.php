<?php
//Version 1.0
//Last Updated 20-11-2013

class Admin extends Main

{

	public $admin_id;
    public $tbl = 'tbl_admin';
    
    	public function __construct()

		{

		parent::__construct();


		}

		//Admin Operations

		
		//Show Alerts 
		
		public function showAlert($type,$msg,$title='')
		{
		
		if($title == '' )
		{
			  switch($type)
			  {
				case 'danger': $title = 'Error';break;  
				case 'info': $title = 'Info';break;  
				case 'success': $title = 'Success';break;  
				case 'warning': $title = 'Warning';break;  
			  }
			  
		}
			
			
			
			$html ="<div class='alert alert-$type fade in'> <i data-dismiss='alert' class='icon-remove close'></i> <strong>$title!</strong> $msg. </div>";
				
		return 	$html;
			
			
		}
		
		
		public function login_admin($data)
		{
		 	
			
			
			
			$pass = md5($data['admin_password']);
			$cond = array('admin_username'=>$data['admin_username'] , 'admin_password'=>$pass );
			$res = $this->db->get_row($this->tbl,$cond);
                  if($res)
				    {
						
						$this->initSession();
						$_SESSION['admin_username'] = $res['admin_username'];
						$_SESSION['admin_id'] = $res['admin_id'];
                        header('location: '.$this->config['admin_path']);
						
					}
					else return $res;

		}
		
		
		public function chk_admin_session()
		{
			
			$this->initSession();
			if(isset($_SESSION['admin_username']) &&  isset($_SESSION['admin_id']))
			{
				

				$this->admin_id = $_SESSION['admin_id'];
				
				return true;
            // header('location: '.$this->config['admin_path']);
				
			}
			else 
			return false;
            //  header('location: '.$this->config['admin_path'].'login.php');
			
			
			
		}
		
		
		public function get_detail()
		{
                   $cond = array('admin_id'=>$this->admin_id );
			 return $this->db->get_row($this->tbl,$cond);
		
			
		}
		
		
		
		public function update_profile($data)
		{


		  $cond = array('admin_id'=>$data['admin_id']);
		  		  $update = array("admin_email"=>$data['admin_email']);
		  
		  if($data['new_password']!='')
		  {
			  $pass = md5($data['new_password']);
       		 $update['admin_password']=$pass;
	  		  }



	return 		  $this->db->update($this->tbl,$update,$cond);

		}
		
	//For Notification 
		  public function  noti($type , $msg )
		  {
		   
		   //Type
		   //error , success , warning , information , alert
		   
		  echo  "<script type='text/javascript'> noty({type:'$type',text: '$msg'});</script>";
		   
		   
		  }
		


}//class ends

?>