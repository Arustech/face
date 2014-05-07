<?php
class AdminProj extends Admin
{
//Project  Starts

	/// Categories Operations
		
		
	public function getTotal($type='user')
		{
			
			if($type=='user')
				$tbl	= 'tbl_user';
			elseif($type=='albums')
				$tbl	= 'tbl_album';
			elseif($type=='videos')
				$tbl	= 'tbl_video';
			elseif($type=='posts')
				$tbl	= 'tbl_post';
			
			
			$query	= 'SELECT COUNT(*) as total FROM '.$tbl;
			
			$res	= $this->db->ex($query);
			if(is_array($res))
			return	$res[0]['total'];
			else
			return false;
			
		}
                public function getReport($type='user')
		{
			
			if($type=='user')
				$query	= 'SELECT * FROM tbl_user';
			elseif($type=='albums')
				$query	= 'SELECT * FROM tbl_album, tbl_user where tbl_album.user_id = tbl_user.user_id' ; 
			elseif($type=='videos')
				$query	= 'SELECT * FROM tbl_video, tbl_user where tbl_video.user_id = tbl_user.user_id' ; 
			elseif($type=='posts')
				$query	= 'SELECT * FROM tbl_post, tbl_user where tbl_post.posted_by_user_id = tbl_user.user_id' ; 
			
			
                           
			$res	= $this->db->ex($query);
			if(is_array($res))
			return	$res;
			else
			return false;
			
		}
		
                
             public function getReligionHtml($religion_type=false){
                 
                 $religions  = array('Christian','Hindu','Jew','Muslim');
                 $html  = "<select name='religion_type' class='form-control required' >";
                 $html.= "<option value=''>Select Region</option>";
                 foreach($religions as $religion)
                 {
                     $selected  = "";
                     if($religion_type && $religion_type==$religion)
                     {
                         $selected= 'selected';
                     }
                     
                     $html.="<option $selected >$religion</option>";                     
                 }
                 $html.='</select>';
                 
                 return $html;
                 
             }  
             
             public function getReportingNoti($report_id=false)
             {
                 $cond   ="";
                 if($report_id)
                 {
                 $cond  = " And tbl_report.report_id=$report_id";  
                 }
                  $rows      = $this->db->ex("SELECT 
                                            tbl_profile_basic.`first_name`,
                                            tbl_profile_basic.`last_name`,
                                            tbl_post.`post_type`,
                                            tbl_report.`report_date`, 
                                            tbl_report.`report_post_id`, 
                                            tbl_report.`report_id` 
                                          FROM
                                            tbl_profile_basic,
                                            tbl_post,
                                            tbl_report 
                                          WHERE 
                                          tbl_report.`report_submit_by`	= tbl_profile_basic.`user_id`
                                          AND
                                          tbl_report.`report_post_id`	= tbl_post.`post_id`
                                          AND
                                          tbl_report.`report_flag`	= '0' $cond ");  
             
                return $rows;
             }
             
             public function getReportContent($post_id)
             {
                 $html="";
                 
                 $row   = $this->db->get_row('tbl_post',array('post_id'=>$post_id));
                 if($row['post_type']=='msg')
                 {
                     $html.=$row['post_data'];                     
                 }elseif($row['post_type']=='video'){
                     $video_id  = $row['post_data'];
                     $video   = $this->db->get_row('tbl_video',array('video_id'=>$video_id));
                     $html.='<a target="_blank" href="'.$this->config['upload_url'].'videos/'.$video['video_src'].'">Click here to view video content</a>';
                 }elseif($row['post_type']=='photo'){
                     $photo_id  = $row['post_data'];
                     $photo   = $this->db->get_row('tbl_photo',array('photo_id'=>$photo_id));
                     $html.='<a target="_blank" href="'.$this->config['upload_url'].'albums/'.$photo['photo_src'].'">Click here to view Image</a>';
                 }elseif($row['post_type']=='album'){
                     $album_id  = $row['post_data'];
                     $album_data   = $this->db->ex("SELECT 
                                                tbl_album.`album_name`,
                                                tbl_photo.`photo_src` 
                                                FROM
                                                tbl_album,
                                                tbl_photo 
                                                WHERE 
                                                tbl_album.`album_id`=tbl_photo.`album_id` AND
                                                tbl_album.`album_id`=$album_id");
                     
                     $html.='Album Name : '.$album_data[0]['album_name'].'<BR>';
                     foreach($album_data as $alb)
                     {
                     $html.='<a target="_blank" href="'.$this->config['upload_url'].'albums/'.$alb['photo_src'].'">Click here to view Image</a><BR>';
                     }
                 }
                 
                 return $html;
             }


        public function getDelUser($user_id)
        {
            $danger = array('tbl_profile_basic'=>'user_id','tbl_profile_contact'=>'user_id','tbl_profile_education'=>'user_id','tbl_profile_personal'=>'user_id','tbl_profile_work'=>'user_id');
            $danger['tbl_user_hobbies'] = 'user_id'; 
            $danger['tbl_noti'] = 'noti_from_user'; 
            $danger['tbl_noti_user'] = 'noti_user_to'; 
            $danger['tbl_remember'] = 'user_id'; 
            $danger['tbl_report'] = 'report_submit_by'; 
            $danger['tbl_msgs'] = array('msg_send_by','msg_send_to'); 
            $danger['tbl_friend_request'] = array('request_by','request_to');
            $danger['tbl_friend'] = array('user_id','user_friend_id');
            $danger['tbl_album'] = 'user_id';
            $danger['tbl_post'] = array('posted_by_user_id','posted_on_user_id');
            $danger['tbl_video'] = 'user_id';
            $danger['tbl_user'] = 'user_id';
            
            $obj_post = $this->load_model('Posts');
            foreach($danger as $key=>$dont)
            {
                
                  if(is_array($dont) && $key!='tbl_post')
                  {
                    foreach($dont as $do)
                    {
                         $this->db->delete($key,array($do=>$user_id));   
                    }
                  }elseif($key=='tbl_post')
                  {
                      foreach($dont as $do)
                      {
                          $posts    = $this->db->get_rows($key,array($do=>$user_id,'post_type'=>'msg'));                         
                          foreach($posts as $post)
                          {
                              $this->getPostDel($post['post_id']);
                          }
                          
                      }
                      
                  }else
                  {
                      if($key=='tbl_video')
                      {
                          $obj_post->delUserVid(0,$user_id);
                      }elseif($key=='tbl_album')
                      {
                          $albums   = $this->db->get_rows($key,array($dont=>$user_id));
                          foreach($albums as $album)
                          {
                               $obj_album = $this->load_model('Album');
                               $obj_album->remove_album($album['album_id']);
                          }
                      }elseif($key=='tbl_noti')
                      {
                          $notiz    = $this->db->get_rows($key,array($dont=>$user_id));                         
                          foreach($notiz as $noti)
                          {
                               $this->db->delete('tbl_noti_user',array('noti_id'=>$noti['noti_id'])); 
                          }
                          $this->db->delete($key,array($dont=>$user_id)); 
                      }else
                      {
                          $this->db->delete($key,array($dont=>$user_id));
                      }
                     
                  }   
               
            }
            return true;         
            
        }
        




             /*		public function getCatsOnly($data)
		{
			$filter = array();
			$tbl='tbl_category';
			foreach($data as $cats)
			{
				 if ($cats['category_parent']==0)
			 $filter[]=$cats;
			 else 
			 $filter[]=$this->db->get_row($tbl,array('category_id'=>$cats['category_parent']) );
				
			}
			
         return  array_unique($filter);
			
			
		}
		
		public function getCategories($sql=false,$parent=0)
		{
			 $tbl="tbl_category";
			 $cond =array('category_parent'=>$parent);
			 if($sql)
			 return $this->db->gen_sql($tbl,$cond); 
			 else
			 return $this->db->get_rows($tbl,$cond); 
		}
		
		
		
		
		
		public function addCat($data)

			{
				unset($data['submit']);
				return $this->db->insert('tbl_category' , $data);

			}
		
	

		public function updateCat($data,$cond)
			{
				$tbl	='tbl_category';
				unset($data['update']);
				unset($data['category_id']);
				return 		  $this->db->update($tbl,$data,$cond);

			}	
		
		public function delCat($cat_id,$del_parent=false)

		   {
			   $res= '';
			   if($del_parent)
			   {
		  $res =  $this->db->delete('tbl_category',array('category_id'=>$cat_id,'category_parent'=>$cat_id ) );
			   $res = $this->db->delete('tbl_category',array('category_id'=>$cat_id) );
			   return $res;
			   }
				else 
			    return $this->db->delete('tbl_category',array('category_id'=>$cat_id) );

			   

		   }
		   
		   
		   public function getCat($cond=false,$val=false)

		   {

			
			   $tbl="tbl_category";
					
				if($cond)
				{
				
					if($val)
					{
				
					$data =   $this->db->get_row($tbl,$cond,array($val));
									
					return $data[$val];
					
					}else
					{
					$data =   $this->db->get_row($tbl,$cond);
									
					return $data;
					}
				}
				else
				{
					return  $this->db->get_rows($tbl);
				}	
			   

		   }/// end of getCat function
		   

		public function getCatHTML($parent=0)
		{
			$cats = $this->getCategories(0,$parent);
			

			$html ='';
			foreach ($cats as  $cat)
			{
				$html.="<option value='$cat[category_id]'>$cat[category_title]</option>";
							
			}
			
			return $html;
			
			
			
		}
		
		public function addListType($data)
		{
			$msg="";
			unset($data['submit']);
			unset($data['list_id']);
			
			if($this->db->insert('tbl_list' , $data))
					{
					$msg.=$this->showAlert('success','Type Successfully Added!');
					}else
					{
					$msg.=$this->showAlert('danger','Oops! Problem Occured!');
					}
			
			return $msg;
		}

		public function getListHtml($key,$id=false)
		{
			$html="";
			$type_id="";
			$selected="";
			
			if($id)////if Tender needs to be edit...
			{
			$row	=$this->db->get_row('tbl_tender',array('tender_id'=>$id));
			if($row)
			{
			if($key=='tt')
			$type_id= $row['tender_type'];
			elseif($key=='ct')	
			$type_id= $row['company_type'];
			
			}
			}
			
			
			
			$rows	=$this->db->get_rows('tbl_list',array('list_key'=>$key));
			if(!empty($rows))
				{
				
				
					if($key=='ct')			/// checking if company type selected
					$name="company_type";
					if($key=='tt')			/// checking if Tender type selected
					$name="tender_type";
					
				
				$html.= '<select name="'.$name.'" class="form-control">';
				$html.= '<option value="-1">Please Select Type</option>';
				 foreach($rows as $row) {
				
				 if($type_id==$row['list_id'])
				 {
				 $selected	= "selected";
				 }else
				 {
				 $selected="";
				 }
			
				$html.='<option value="'.$row['list_id'].'" '.$selected.' >';
				$html.= $row['list_title'].'</option>';
				}
				$html.= '</select>';
				}	
			return $html;
		}/// end of getListHtml func	

		public function getCompanyHtml($id=false)
		{
			$html="";
			$comp_id="";
			$selected="";	

			
			////if Tender needs to be edit...
			if($id)
			{
				$comp_id= $id;
			}
			

			
			$rows	=$this->db->get_rows('tbl_cms_company');
			if(!empty($rows))
				{							
				$html.= '<select name="tender_company" class="form-control">';
				$html.= '<option value="-1">Please Select Company</option>';
				 foreach($rows as $row) {
				
				if($comp_id==$row['id'])
				 {
				 $selected	= "selected";
				 }else
				 {
				 $selected= "";
				 }

				$html.='<option value="'.$row['id'].'" '.$selected.'>';
				$html.= $row['title'].'</option>';
				
				
				}
				$html.= '</select>';
				}	
			return $html;
			
		}/// end of getCompanyHtml func	
		
		
		public function getReport($type='user')
		{
			$tail	= "";
			if($type=='user')
			{
			$tbl	= 'tbl_user';
			$col	= 'user_date';
			}elseif($type=='mem_project')
			{
			$tbl	= 'tbl_proj';
			$col	= 'proj_date';
			$tail	= 'and user_id!="-1"';
			}elseif($type=='admin_project')
			{
			$tbl	= 'tbl_proj';
			$col	= 'proj_date';
			$tail	= 'and company_id!="-1"';
			}
			elseif($type=='tender')
			{
			$tbl	= 'tbl_tender';
			$col	= 'tender_date';
			}
			
			$query	= 'SELECT COUNT(*) as total FROM '.$tbl.' WHERE '.$col.' > DATE_SUB(NOW(), INTERVAL 1 WEEK) '.$tail;
			
			$res	= $this->db->ex($query);
			if(is_array($res))
			return	$res[0]['total'];
			else
			return false;
			
		}
		
		
		public function getTopBotCat($find)
		{
			$rows	= $this->db->get_rows('tbl_category');
			$cats	= array();
			
			if(is_array($rows))
			{
				foreach($rows as $row)
				{
					$cat_id			= $row['category_id'];
					$query			= "select count(*) as total from tbl_proj where category_id IN ($cat_id)";
					
					$res			= $this->db->ex($query);	
					$cat[$cat_id]	= intval($res[0]['total']);
				}
					
					$arr_size	= count($cat);
					$top_cat	= "";	
					$bottom_cat	= "";
					$result		= array();	
					$i			= 0;
					$j			= 0;
					if($arr_size>=5)
					{
					
						if($find=='top')
						{
						arsort($cat);
						}elseif($find=='bottom')
						{
						asort($cat);
						}
						
						foreach($cat as $key => $value) // getting top cat parents if find
						{
							
							if($i==5)
							{
								break;
							}
							$top_cat = $this->getAllCats('tbl_category',$key,0);
							$vals	 = explode(",",$top_cat);
							$subcat	 = ""; 	
							
							if($vals[0]!='0')
							{
								$parent	= $vals[0];						
								$subcat	= $vals[1];						
							}else
							{
								$parent	= $vals[1];	
							}
							$res	= $this->db->get_row('tbl_category',array('category_id'=>$parent));
							$result[$i]['parent']	= $res['category_title'];
							if($subcat!="")
							{
							$res	= $this->db->get_row('tbl_category',array('category_id'=>$subcat));
							$result[$i]['subcat']	= $res['category_title'];
							}
							
							
							$result[$i]['count']= $value;	
							$i++;
						}
						
						
					}	
				
					return $result;
					
					
			}
		}
		
*/		
//Project  Ends*/*******************



}
?>