<?php

/// version 1.0
class Posts Extends Main {

   private $type_msg = 'msg', $type_photo = 'photo',$type_album ='album',$type_video='video',$type_visitor='no';
   private $tbl = 'tbl_post'; 

   public function post_message($post) {
      
      $post['post_type'] = $this->type_msg;
      $post['post_user_access'] = 0;
      $post['post_date_time'] = $this->current_date_time();
      $result = $this->db->insert($this->tbl, $post);
      if ($result){
          
          
           //// adding notification '
                    $this->load_model('member');
                    $noti_obj    = $this->load_model('Notification');
                    $noti['noti_type']          = 'post';
                    $noti['noti_data']          = $this->db->last_id;
                    $noti['noti_from_user']     = $post['posted_by_user_id'];
                    $noti['noti_date']          = $this->current_date_time();
                    $noti['post_type']          = 'status';
                    
                    $noti_obj->getAddNoti($noti);

                    /* End of noti area..........*/  
          
         return true;
      }else{
         return false;
   
        }
    }

   # ************* Member Posts  Methods Here******************
   # Get User Posts

   public function getPosts($type = 'post', $sql = false, $id = false) {
      $tbl = 'tbl_post';
      $key = 'post_id';
      if ($type == 'user') {
         $key = 'posted_by_user_id';
      }

      $cond = ($id) ? array($key => $id) : "";

      if ($sql) {
         $arr = $this->db->gen_sql($tbl, $cond);
      } else {
         $arr = $this->db->get_rows($tbl, $cond);
         //echo $this->db->sql;exit;
         if (is_array($arr))
            $arr = is_array($arr) ? $arr : "";
      }
      return $arr;
   }

// end of getCountries


    public function post_comment($data){
       return $this->db->insert('tbl_post_comment',$data);
       
    }
    

    public function get_pre_post($data=false) {

       $id="";
       if($data)
      {
      extract($data);
      $id="loop_$post_id";
      }
        
      $str = '<div id="'.$id.'" class="loop">
            <div class="rt-content">
               <div class="tr-panel">';
      
      if($data)
      {
      extract($data);
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $user_id  = $user_data['user_id'];
       if($this->type_visitor=='no' && $user_id==$posted_by_user_id)
      {       
      $str.='<ul><li><a href="javascript:;" id="post_'.$post_id.'" class="del_post"><span class="glyphicon glyphicon-trash" title="Edit"></span></a></li></ul>';//pre 
      }          
      }
      
      $str.='</div>
            </div>
            <div class="lt-content">';
      return $str;
   }

   public function get_after_post() {
      $str = '</div>
               </div>';
      return $str;
   }

   public function get_comment($comment) {
      $html = "";
      extract($comment);
     
      
      $html.='
                     <div class="panel-body" id="comment_div_'.$comment_id.'"><a href="#"><img src="'.$this->get_uurl('thumbs_small').$user_avatar.'" alt=""></a>
                        <p class="comment_get"><span>' . ucfirst($first_name . ' ' . $last_name) . '</span> '.$description.' </p>

                        <p class="links">

                           <a class="red" href="">'.$this->get_time_diff($comment_on_date).'</a>-

                           

                           <a href="">Send message</a>-';
      
      
      
      
        $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $user_id  = isset($user_data['user_id'])? $user_data['user_id'] : "";
      if($comment_by==$user_id || $posted_by_user_id==$user_id)
      {   
        $html.='<a class="del_comment" title="Delete" data-toggle="confirmation" id="del_'.$comment_id.'" href="javascript:;">Delete</a>';
      }                     
                        $html.='</p>

                     </div>';


      return $html;
   }

   public function get_all_comments($post_id) {

      $sql = "SELECT 
  tbl_post_comment.*,
  tbl_post.`posted_by_user_id`,
  tbl_user.`user_avatar`,
  `tbl_profile_basic`.`first_name`,
  `tbl_profile_basic`.`last_name` 
FROM
  tbl_post_comment 
  LEFT JOIN tbl_user 
    ON tbl_post_comment.comment_by = tbl_user.user_id 
  LEFT JOIN `tbl_profile_basic` 
    ON tbl_post_comment.`comment_by` = `tbl_profile_basic`.`user_id` 
   LEFT JOIN tbl_post
   ON tbl_post_comment.`post_id`=tbl_post.`post_id` 
WHERE tbl_post_comment.post_id = '$post_id'";
      $comments = $this->db->ex($sql);
      
      $html = "";
      $style = !$comments?'style="display:none"':'';
      $html.='<div '.$style.'  class="user-comm-msg"><div id="comments-'.$post_id.'" class="panel  panel-success">';
      if ($comments) {
      
         foreach ($comments as $comment) {
            $html.= $this->get_comment($comment);
         }
         
      }
      $html.="</div></div>";
      return $html;
   }
   public function get_all_comments_other($post_id) {

      $sql = "SELECT 
  tbl_post_comment.*,
  tbl_post.`posted_by_user_id`,
  tbl_user.`user_avatar`,
  `tbl_profile_basic`.`first_name`,
  `tbl_profile_basic`.`last_name` 
FROM
  tbl_post_comment 
  LEFT JOIN tbl_user 
    ON tbl_post_comment.comment_by = tbl_user.user_id 
  LEFT JOIN `tbl_profile_basic` 
    ON tbl_post_comment.`comment_by` = `tbl_profile_basic`.`user_id` 
   LEFT JOIN tbl_post
   ON tbl_post_comment.`post_id`=tbl_post.`post_id` 
WHERE tbl_post_comment.post_id = '$post_id'";
      
      $comments = $this->db->ex($sql);

      $html = "";
      $style = !$comments?'style="display:none"':'';
      
      $html.='<div '.$style.'  class="user-comm"><div id="comments-'.$post_id.'" class="panel  panel-success">';
      if ($comments) {
         
         foreach ($comments as $comment) {
            $html.= $this->get_comment($comment);
         }
         
      }
      
      return $html;
   }
   
   public function create_wall_slider($photos) {
      $html="";
      $html.='<div class="banner-fade"><ul class="bjqs">';
      
      foreach($photos as $photo)
      {
           $html.='<li><img src="'.$this->get_uurl('thumbs_wall').$photo['photo_src'].'"></li>';
      }
      $html.='</ul></div>';
      return $html;
            
      
   }

   public function get_post_album($data, $user_id) {
      extract($data);
      $photos = $this->db->get_rows('tbl_photo',array('album_id'=>$post_data));
      $slider = $this->create_wall_slider($photos);
      $html = '';
      $html.='<div class="loop"><div class="rt-content"><div class="tr-panel" style="margin-bottom:0px">';
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
       if($loginuser_id==$posted_by_user_id)
      {       
      $html.='<ul><li><a href="javascript:;" id="post_'.$post_id.'" class="del_post"><span class="glyphicon glyphicon-trash" title="Edit"></span></a></li></ul>';//pre 
      }
      
      $html.='</div>';//pre 
      $html.='<div class="main-img" style="margin-top:7px;margin-right:21px;margin-bottom:10px"> <a href="#" class="thumbnail" style="margin-top:7px;">'.$slider.'</a> </div></div>';//pre 
      $html.='<div class="lt-content">';
      $html.='<div class="comments">';
      $html.="<a href='#'><img src='" . $this->get_uurl('thumbs') . $user_avatar . "' alt=''></a>";
      $html.="<h4><a href=".$this->config['web_path'].$user_name.">". ucfirst($first_name . ' ' . $last_name) . "</a></h4>";
      $html.="<div style='width:515px;min-height:22px'>" . ucfirst($this->truncate_lines($post_title, 116, 100)) . "</div>";
      $html.="<p class='links'>
                     <a class='red' href=''>".$this->get_time_diff($post_date_time)."</a>-
                     
                     <a href=''>Send message</a>-";
                          /*****************************************************************************************************/
      /********************************************* Report submit by logged in user    ****/
      /****************************************************************************************************/
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
      #*****************************************************************************
      
      $html.="<a  href='javascript:;' class='report' id='report_$post_id"."_".$loginuser_id."'>Report</a>                     
                  </p></div>";
       $html.="<div class='panel-body1' style='margin-top:10px;,margin-left:5px'><a href='#'>"
              . "<img  style='padding-right:3px'  src='" . $this->get_uurl('thumbs_small') . $user_avatar . "' alt=''>"
              . "</a>";

      $html.= "<div style='display:flex;display: -ms-flexbox;'>
         <textarea id = 'post_comment' placeholder = 'Write a comment...' name = 'textarea' class = 'form-control' cols = '30'
         style = 'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 31px; width: 475px;'></textarea>
      </div>
      <div style = 'margin-top: 5px;margin-left:32px;margin-bottom:5px'>
      <a href = '#' class = 'btn btn-info btn_comment' data-comment-by='$user_id' data-post-id='$post_id' style = 'font-size: 10px;height: 26px;color:white; width: 86px;'>
      <i class = 'glyphicon glyphicon-share'></i>
      Comment
      </a>
      </div>
      </div>";
      $html.=$this->get_all_comments_other($post_id);
      $html .="</div></div></div></div>";//Post_
         return $html;
   }
   public function get_post_photo($data, $user_id) {
      extract($data);
      $photo = $this->db->get_one('tbl_photo',array('photo_id'=>$post_data),'photo_src');
      $html = '';
      $html.='<div class="loop" id="loop_'.$post_id.'"><div class="rt-content"><div class="tr-panel">';
      
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
       if($loginuser_id==$posted_by_user_id)
      {       
      $html.='<ul><li><a href="javascript:;" id="post_'.$post_id.'" class="del_post"><span class="glyphicon glyphicon-trash" title="Edit"></span></a></li></ul>';//pre 
      }
      $html.= '</div>';//pre 
      $html.='<div class="main-img" style="margin-right:21px;margin-top: 0;"> <a  rel="ligthbox"   href="'.$this->get_uurl('thumbs_wall').$photo.'" class="thumbnail fancybox" style="margin-top:7px;"> <img src="'.$this->get_uurl('thumbs_wall').$photo.'" alt=""> </a> </div></div>';//pre 
      $html.='<div class="lt-content">';
      $html.='<div class="comments">';
      $html.="<a href='#'><img src='" . $this->get_uurl('thumbs') . $user_avatar . "' alt=''></a>";
      $html.="<h4><a href=".$this->config['web_path'].$user_name.">". ucfirst($first_name . ' ' . $last_name) . "</a></h4>";
      $html.="<div style='width:515px;min-height:22px'><p>" . ucfirst($this->truncate_lines($post_title, 116, 100)) . "</p></div>";
     
      $html.="<p class='links'>
                     <a class='red' href=''>".$this->get_time_diff($post_date_time)."</a>-
                     
                     <a href=''>Send message</a>-";
                      /*****************************************************************************************************/
      /********************************************* Report submit by logged in user    ****/
      /****************************************************************************************************/
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
      #*****************************************************************************
      
      $html.="<a  href='javascript:;' class='report' id='report_$post_id"."_".$loginuser_id."'>Report</a>            
                  </p></div>";
       $html.="<div class='panel-body1' style='margin-top:10px;,margin-left:5px'><a href='#'>"
              . "<img  style='padding-right:3px'  src='" . $this->get_uurl('thumbs_small') . $user_avatar . "' alt=''>"
              . "</a>";

      $html.= "<div style='display:flex;display: -ms-flexbox;'>
         <textarea id = 'post_comment' placeholder = 'Write a comment...' name = 'textarea' class = 'form-control' cols = '30'
         style = 'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 31px; width: 475px;'></textarea>
      </div>
      <div style = 'margin-top: 5px;margin-left:32px;margin-bottom:5px'>
      <a href = '#' class = 'btn btn-info btn_comment' data-comment-by='$user_id' data-post-id='$post_id' style = 'font-size: 10px;height: 26px;color:white; width: 86px;'>
      <i class = 'glyphicon glyphicon-share'></i>
      Comment
      </a>
      </div>
      </div>";
      $html.=$this->get_all_comments_other($post_id);
      $html .="</div></div></div></div>";//Post_
         return $html;
   }
   public function get_post_video($data, $user_id) {
      extract($data);
      $video = $this->db->get_one('tbl_video',array('video_id'=>$post_data),'video_src');
      $html = '';
      $html.='<div class="loop" id="loop_'.$post_id.'"><div class="rt-content"><div class="tr-panel">';
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
       if($loginuser_id==$posted_by_user_id)  {    
      $html.='<ul><li><a href="javascript:;" id="post_'.$post_id.'" class="del_post"><span class="glyphicon glyphicon-trash" title="Edit"></span></a></li></ul>';//pre 
      }
      $html.='</div><div class="main-img" style="margin-top:7px;margin-right:37px;margin-bottom:10px"><script>CodoPlayer({title: "Knownfaces video",poster: "",src: "'.$this->get_uurl('videos').$video.'"
		}, {	width: 400,
			height: 225,
			volume: 80,
			preload: false,
			loadingImage: "../loader.gif",
			logo: "../logo.png",
			plugins: {
				share: true
			}
		});
		</script>
              </div></div>';//pre 
      $html.='<div class="lt-content">';
      $html.='<div class="comments">';
      $html.="<a href='#'><img src='" . $this->get_uurl('thumbs') . $user_avatar . "' alt=''></a>";
      $html.="<h4><a href=".$this->config['web_path'].$user_name.">". ucfirst($first_name . ' ' . $last_name) . "</a></h4>";
      $html.="<div style='width:515px;min-height:22px'>" . ucfirst($this->truncate_lines($post_title, 116, 100)) . "</div>";
      $html.="<p class='links'>
                     <a class='red' href=''>".$this->get_time_diff($post_date_time)."</a>-
                     
                     <a href=''>Send message</a>-";
                     /*****************************************************************************************************/
      /********************************************* Report submit by logged in user    ****/
      /****************************************************************************************************/
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
      #*****************************************************************************
      
      $html.="<a  href='javascript:;' class='report' id='report_$post_id"."_".$loginuser_id."'>Report</a>                    
                  </p></div>";
       $html.="<div class='panel-body1' style='margin-top:10px;,margin-left:5px'><a href='#'>"
              . "<img  style='padding-right:3px'  src='" . $this->get_uurl('thumbs_small') . $user_avatar . "' alt=''>"
              . "</a>";

      $html.= "<div style='display:flex;display: -ms-flexbox;'>
         <textarea id = 'post_comment' placeholder = 'Write a comment...' name = 'textarea' class = 'form-control' cols = '30'
         style = 'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 31px; width: 475px;'></textarea>
      </div>
      <div style = 'margin-top: 5px;margin-left:32px;margin-bottom:5px'>
      <a href = '#' class = 'btn btn-info btn_comment' data-comment-by='$user_id' data-post-id='$post_id' style = 'font-size: 10px;height: 26px;color:white; width: 86px;'>
      <i class = 'glyphicon glyphicon-share'></i>
      Comment
      </a>
      </div>
      </div>";
      $html.=$this->get_all_comments_other($post_id);
      $html .="</div></div></div></div>";//Post_
         return $html;
   }
   
   
   
   public function get_post_message($data,$user_id) {
      extract($data);
      $html = '';
      $html.=$this->get_pre_post($data);
      $html.='<div class="comments">';
      $html.="<a href='#'><img src='" . $this->get_uurl('thumbs') . $user_avatar . "' alt=''></a>";
      $html.="<h4><a href=".$this->config['web_path'].$user_name.">". ucfirst($first_name . ' ' . $last_name) . "</a></h4>";
      $html.="<div style='width:918px;min-height:22px'>" . ucfirst($this->truncate_lines($post_data, 116, 100)) . "</div>";
      $html.="<p class='links'>
                     <a class='red' href=''>".$this->get_time_diff($post_date_time)."</a>-
                     
                     <a href=''>Send message</a>-";
      /*****************************************************************************************************/
      /********************************************* Report submit by logged in user    ****/
      /****************************************************************************************************/
      $member   = $this->load_model('Member');      
      $user_data   = $member->check_user();      
      $loginuser_id  = $user_data['user_id'];
      #*****************************************************************************
      
      $html.="<a  href='javascript:;' class='report' id='report_$post_id"."_".$loginuser_id."'>Report</a>                    
                  </p></div>";
      $html.="<div class='panel-body1' style='margin-top:10px;,margin-left:5px'><a href='#'>"
              . "<img  style='padding-right:3px'  src='" . $this->get_uurl('thumbs_small') . $user_avatar . "' alt=''>"
              . "</a>";

      $html.= "<div style='display:flex;display: -ms-flexbox;'>
         <textarea id = 'post_comment' placeholder = 'Write a comment...' name = 'textarea' class = 'form-control' cols = '30'
         style = 'overflow: hidden; word-wrap: break-word; resize: horizontal; height: 31px; width: 853px;'></textarea>
      </div>
      <div style = 'margin-top: 5px;margin-left:32px;margin-bottom:5px'>
      <a href = '#' class = 'btn btn-info btn_comment' data-comment-by='$user_id' data-post-id='$post_id' style = 'font-size: 10px;height: 26px;color:white; width: 86px;'>
      <i class = 'glyphicon glyphicon-share'></i>
      Comment
      </a>
      </div>
      </div>";
      $html.=$this->get_all_comments($post_id);
 $html.=$this->get_after_post();
      return $html;
   }

   public function get_all_posts($user_id,$user_timeline=false) {
      
       $where   ="WHERE tbl_post.posted_by_user_id = $user_id 
                OR (
                  tbl_post.post_user_access REGEXP '(^|,)($user_id)(,|$)' 
                  AND tbl_post.`post_access` != 'public'
                ) 
                OR (
                  (
                    tbl_post.`post_access` = 'public' 
                    OR tbl_post.`post_access` = 'family' 
                    OR tbl_post.`post_access` = 'friends'
                  ) 
                  AND tbl_post.`post_user_access` = '0'
                ) 
              ORDER BY tbl_post.post_id DESC";
       
       
       if($user_timeline)
       {
           $where="WHERE tbl_post.posted_by_user_id = $user_id  ORDER BY tbl_post.post_id DESC";
       }
       
       
       

      $sql = "SELECT 
                tbl_post.*,
                tbl_user.user_avatar,
                tbl_user.user_name,
                `tbl_profile_basic`.`first_name`,
                `tbl_profile_basic`.`last_name` 
              FROM
                tbl_post 
                LEFT JOIN tbl_user 
                  ON tbl_post.posted_by_user_id = tbl_user.user_id 
                LEFT JOIN tbl_profile_basic 
                  ON tbl_post.posted_by_user_id = tbl_profile_basic.user_id 
                  $where
              ";
      
      
    
      $posts = $this->db->ex($sql);

      // $posts = $this->db->get_rows($this->tbl, array('posted_by_user_id'));

      if ($posts) {
         $html = "";
         foreach ($posts as $post) {
                     
            switch ($post['post_type']) {
               case $this->type_msg :$html.=$this->get_post_message($post, $user_id);break;
               case $this->type_photo :$html.=$this->get_post_photo($post, $user_id);break;
               case $this->type_album :$html.=$this->get_post_album($post, $user_id);break;
               case $this->type_video :$html.=$this->get_post_video($post, $user_id);break;
            }
         }
         return $html;
      }
   }

   /*    * **** End of UpdateExtraData */
   
   // post_photo... process images uploaded and add to album and also in post table.
   public function post_photo($data)
   {
      
       $album   = array();
       $posts   = array();
       $photo   = array();
       $imgz_count   = 0;
       
       
       
       if(isset($data['album']) && $data['album']=="exist")
       {
        $photo['album_id']  = $data['album_id'];              
       }elseif(isset($data['album']) && $data['album']=="create")
       {
        $album['album_name']    = $data['album_name'];
        $album['created']       = $this->currentDate();
        $album['user_id']       = $data['user_id'];
        }

       
       # checking for images if upload...
       if(isset($data['images']) && $data['images']!="")
       {
         #creating album if new created
            if(count($album)>0)
            {
                $album['cover_photo_name']  = isset($data['images'][0]) ? $data['images'][0] : "";
                $this->db->insert('tbl_album',$album);
                $photo['album_id']   = $this->db->last_id;
            }  
            
         $photo['photo_created']   = $this->currentDate(); 
         
         foreach($data['images'] as $image)
          {   
             $this->moveImages($image);
             
              $imgz_count++;
              $photo['photo_src']       = $image;              
              $this->db->insert('tbl_photo',$photo);    
          }
          
         
             if($imgz_count=='1')
               {
                   $posts['post_data']  = $this->db->last_id;               
                   $posts['post_type']  = 'photo';               
                }else
                {
                   $posts['post_data']  = $photo['album_id'];
                   $posts['post_type']  = 'album';
                }
                    $posts['post_date_time'] = $this->current_date_time();
                    $posts['posted_by_user_id'] = $data['user_id'];
//                    $posts['post_title'] = isset($data['post_title']) ? $data['post_title'] : "";
                    $posts['post_access'] = isset($data['post_access']) ? $data['post_access'] : "";
                    $posts['post_user_access'] = isset($data['user_access']) && $data['user_access']!="" ? $data['user_access'] : "0";
                    $posts['post_title'] = isset($data['post_title']) ? $data['post_title'] : "";
                    
                    $add_post   = $this->db->insert('tbl_post',$posts);
                    
                  if($add_post)  
                  {
                    //// adding notification '
                    $this->load_model('member');
                    $noti_obj    = $this->load_model('Notification');
                    $noti['noti_type']          = 'post';
                    $noti['noti_data']          = $this->db->last_id;
                    $noti['noti_from_user']     = $data['user_id'];
                    $noti['noti_date']          = $this->current_date_time();
                    $noti['post_type']         = 'image';
                    if($posts['post_user_access']!="" || $posts['post_user_access']!='0')
                    {
                        $noti['specific_friends']   = $posts['post_user_access'];
                    }

                    $noti_obj->getAddNoti($noti);

                    /* End of noti area..........*/                 
                  } 
                        
          }
   }
   /* * ******* End of post_photo */ 
   
        public function moveImages($img)
        {
             $obj_img  = $this->load_model('Image');
             $obj_img->dirPath   = 'thumbs_wall/';
             $obj_img->w=367;
             $obj_img->h=365;
             $obj_img->create_thumb($img,$this->get_path('temp'));

             $dirs   = array('basic','thumbs');
             foreach($dirs as $dir)
             {
                $dir_name   = $this->config['upload_path'];
                $temp_name  = "temp/";
                $thumb  ="albums/";
                 if($dir=='thumbs')
                 {   $thumb="thumbs/";
                     $temp_name  = "temp/thumb/";
                 }

                copy($dir_name.$temp_name.$img,$dir_name.$thumb.$img);

                 unlink($dir_name.$temp_name.$img);
             }
        }

        /// parameter "$data" should be array type...
        public function post_video($data)
        {
          //  var_dump($data);exit;
                        
           $post    = array();
           if(count($data)>0 && !empty($data))
           {
               $post['post_title']          = $data['post_title'];               
               $post['post_access']         = $data['post_access'];               
               $post['post_user_access']    = isset($data['user_access']) && $data['user_access']!="" ? $data['user_access'] : "0";               
               $data    = $this->unsetA($data, 'post_title,post_access,user_access');
                              
               $data['video_created']   = $this->current_date_time();
               $this->db->insert('tbl_video',$data);
               $video_id        = $this->db->last_id;
               if(!empty($video_id))
               {
                   
                   $post['post_data']            = $video_id;
                   $post['post_date_time']       = $this->current_date_time();
                   $post['posted_by_user_id']    = $data['user_id'];
                   $post['post_type']            = 'video';  
                   $post_res    = $this->db->insert('tbl_post',$post);
                   if($post_res)
                   {
                       
                    //// adding notification '
                    $this->load_model('member');
                    $noti_obj    = $this->load_model('Notification');
                    $noti['noti_type']          = 'post';
                    $noti['noti_data']          = $this->db->last_id;
                    $noti['noti_from_user']     = $data['user_id'];
                    $noti['noti_date']          = $this->current_date_time();
                    $noti['post_type']         = 'video';
                    if($post['post_user_access']!="" || $post['post_user_access']!='0')
                    {
                        $noti['specific_friends']   = $post['post_user_access'];
                    }

                    $noti_obj->getAddNoti($noti);

                    /* End of noti area..........*/    
                       
                       
                       
                       return true;
                   }
                   
               }else
               {
                   return false;
               }
           }else
               {
                   return false;
               }
         
        }
   
        public function getSinglePost($post_id)
        {
            $sql = "SELECT 
                tbl_post.*,
                tbl_user.user_avatar,
                `tbl_profile_basic`.`first_name`,
                `tbl_profile_basic`.`last_name` 
              FROM
                tbl_post 
                LEFT JOIN tbl_user 
                  ON tbl_post.posted_by_user_id = tbl_user.user_id 
                LEFT JOIN tbl_profile_basic 
                  ON tbl_post.posted_by_user_id = tbl_profile_basic.user_id 
                  where
                  tbl_post.post_id=$post_id
              ";
            return $this->db->ex($sql);
            
        }
   
public function getPostById($post_id,$user_id) {

      $sql = "SELECT 
                tbl_post.*,
                tbl_user.user_avatar,
                `tbl_profile_basic`.`first_name`,
                `tbl_profile_basic`.`last_name` 
              FROM
                tbl_post 
                LEFT JOIN tbl_user 
                  ON tbl_post.posted_by_user_id = tbl_user.user_id 
                LEFT JOIN tbl_profile_basic 
                  ON tbl_post.posted_by_user_id = tbl_profile_basic.user_id 
                  where tbl_post.post_id    = $post_id;
              ";
      
      
    
      $posts = $this->db->ex($sql);

      // $posts = $this->db->get_rows($this->tbl, array('posted_by_user_id'));

      if ($posts) {
         $html = "";
         foreach ($posts as $post) {
            switch ($post['post_type']) {
               case $this->type_msg :$html.=$this->get_post_message($post, $user_id);break;
               case $this->type_photo :$html.=$this->get_post_photo($post, $user_id);break;
               case $this->type_album :$html.=$this->get_post_album($post, $user_id);break;
               case $this->type_video :$html.=$this->get_post_video($post, $user_id);break;
            }
         }
         return $html;
      }
   }
   
        
        
        
}

// end of class
?>