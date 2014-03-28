<?php
/// version 1.0
/// last updated 27-11-2013

class Album extends Member{

public $error;

// getting albums dropdown
 public function getAlbumsDropdown($album_id=false,$user_id=false)
	{
                $cond="";
                if($user_id){
                    $cond=  array('user_id'=>$user_id);                    
                }
            
		$arr	= $this->db->get_rows('tbl_album',$cond);
		
		$html = '';
		if(is_array($arr)){	
		foreach($arr as $ar)
		{
		$selected = "";
		if($album_id)
		{
		if($album_id == $ar['album_id'])
		$selected ="selected";
		}
		$html.="<option $selected value='".$ar['album_id']."' >".$ar['album_name']."</option>";
		}
		}
	return $html;
	
	}
   
     public function albums_list($user_id)
     {
        $this->db->tail = " Order by album_id DESC";
        $rows= $this->db->get_rows('tbl_album',array('user_id'=>$user_id));
        $this->db->tail ="";
        return $rows;
     }
     
     
     public function remove_album($album_id){
        $condition='';$condition1='';
        $condition['album_id']=$album_id;
        $album_path=$this->get_path("albums");
        
        $rows=$this->db->get_rows('tbl_photo',$condition );
        foreach($rows as $row){
            unlink($album_path.$row['photo_src']);
        }
        $this->db->delete('tbl_photo',$condition );

         if($this->db->delete('tbl_album',$condition )){
             $condition1['post_type']="album";
             $condition1['post_data']=$album_id;
             $this->db->delete('tbl_post',$condition1 );
             unset($condition);
            
            return 'true';
                                                }
 }
         
   
 
 
     
     
    public function remove_photo($photo_id){
        $data="";
        $condition='';
        $condition['photo_id']=$photo_id;
        
        $album_path=$this->get_path("albums");
        $row=$this->db->get_row('tbl_photo',$condition );
        
        unlink($album_path.$row['photo_src']);
        
        if( $this->db->delete('tbl_photo',$condition )){
       
        unset($condition);
        $condition['album_id']=$row['album_id'];
        $count=$this->db->getCount('tbl_photo',$condition );
        $cover_name=$this->db->get_row('tbl_album',$condition );
        if($cover_name['cover_photo_name']==$row['photo_src'])
            {
             if($count>0){
             $new_photo=$this->db->get_row('tbl_photo',$condition ); 
             $data['cover_photo_name']=$new_photo['photo_src'];
             $this->db->update('tbl_album',$data,$condition);
            
             unset($data);
             }
             
             }
        if($count==0){
            
            $data['cover_photo_name']="default.png";
            $this->db->update('tbl_album',$data,$condition);
            $this->db->delete('tbl_post',array('post_data'=>$row['album_id'],'post_type'=>"album"));
        }
         $this->db->delete('tbl_post',array('post_data'=>$photo_id,'post_type'=>'photo') );
		 echo $this->db->sql;exit;
        return 'true';
                                                
 }
         
     }
     
     
     
     
     
     
     public function get_album_photos($album_id){
        $album_path=$this->get_uurl("albums");
        $condition='';
        $path="";
        $condition['album_id']=$_POST['album_id'];
        $rows= $this->db->get_rows('tbl_photo',$condition);
        $html="";
        $album_id=$_POST['album_id'];
        $html="<div id='add_photos'  style=' floa:right; margin-bottom: 10px;margin-left: 19px;width: 106px;'>
        <a  href='create_album_addingFiles.php?album_id=$album_id'>Add Photos</a></div>";
        foreach($rows as $row){
        $path=$album_path.$row['photo_src'];
        $photo_id=$row['photo_id'];
        
        
        $html.="<div class='list-group gallery '>
                 <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3 photo' id='$photo_id'>
                   
                         <div style='z-index: 101;'>
                              <a> <button class='delete1'  style='background:#009AEF;border:1px solid #009AEF;position:relative;top:35px;height:30px;width:30px;left:5px' data-id='$photo_id'   type='submit' ><img height='20px' width='20px' src='img/delete.png'> </button></a>
                             
                        </div>
                        <a class='thumbnail fancybox' rel='ligthbox' href='$path'>
                         <img class='img-responsive size_img'  src='$path' />

                         </a>
                 </div> ";
   
         
           }
          
           return $html;
     }
     
     public function create_album($data,$files){
        $album_name= ucfirst($data['album_name']);
        $user_id=$data['user_id'];
        $user_access=$data['user_access'];   
        $this->db->insert('tbl_album', $data);
        
        $album_id=$this->db->last_id;
        unset($data);
        for($i=0;$i<count($files);$i++){
            $data['photo_created']=$this->current_date_time();
            $data['album_id']=$album_id;
            $data['photo_src']=$files[$i];
            $this->db->insert('tbl_photo', $data);
}
         $data1='';
            $data1['posted_by_user_id']=$user_id;
            $data1['post_date_time']=$this->current_date_time();
            $data1['post_data']=$album_id;
            $data1['post_type']="album";
            $data1['post_title']="Added a new Album $album_name";
            $data1['post_user_access']=$user_access;
            $this->db->insert('tbl_post', $data1);
            
        }
        
     
        public function get_album_info($album_id){
           return $this->db->get_row('tbl_album',array('album_id'=>$album_id));
            
        }
        
        
        public function add_photos_to_album($data,$files,$album_id){
             
             $album_name=  ucfirst($data['album_name']);
             $user_id=$data['user_id'];
             $user_access=$data['user_access'];
             $access=$data['access'];
             //updating album
             $albm_data['album_name']=$album_name;
             $albm_data['user_access']=$user_access;
             $albm_data['access']=$access;
             $this->db->update('tbl_album', $albm_data,array('album_id'=>$album_id));
             $photos_count=count($files);
        unset($data);
         //adding photos to album (in tbl_photos)   
         for($i=0;$i<$photos_count;$i++){
                $data['photo_created']=$this->current_date_time();
                $data['album_id']=$album_id;
                $data['photo_src']=$files[$i];

                $this->db->insert('tbl_photo', $data);

            }
         if($photos_count==1){
             
            $data1='';unset($data1);
            $photo_id=$this->db->last_id;
            $data1['post_type']="photo";
            $data1['posted_by_user_id']=$user_id;
            $data1['post_date_time']=$this->current_date_time();
            $data1['post_data']=$photo_id;
            $data1['post_title']="$photos_count new photo Added to the Album $album_name";
            $data1['post_user_access']=$user_access;
            $this->db->insert('tbl_post', $data1);
            }
         else{
            $del="";
             $del['post_data']=$album_id;
             $del['posted_by_user_id']=$album_id;
             $del['posted_by_user_id']=$user_id;
            $this->db->get_row('tbl_post',$del);
            
            $data1='';unset($data1);
            $data1['post_type']="album";
            $data1['posted_by_user_id']=$user_id;
            $data1['post_date_time']=$this->current_date_time();
            $data1['post_data']=$album_id;
            $data1['post_title']="$photos_count new photos Added to the Album $album_name";
            $data1['post_user_access']=$user_access;
            $this->db->insert('tbl_post', $data1);
            }
           
        }
        
    
        public function creating_thumb($img)
        {
             $obj_img  = $this->load_model('Image');
             $obj_img->dirPath   = 'thumbs_wall/';
             $obj_img->w=367;
             $obj_img->h=365;
             $obj_img->create_thumb($img,$this->get_path('albums'));
        }
     
	
	
}// end of class
?>