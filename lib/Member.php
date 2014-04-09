<?php



/// version 1.0



class Member Extends Main {



   private $tbl = 'tbl_user';

   private $secret_key = '@#KJOIU:M4654VBmnansmnsamndasNVB12132%^)#!';

   private $p_key = 'user_id';



   private function set_session($data) {

      $this->initSession();

      foreach ($data as $key => $val) {

         $_SESSION[$key] = $val;

      }

   }



   public function check_email($email) {

      return $this->db->getCount($this->tbl, array('user_email' => $email));

   }



   public function check_user_name($user) {

      return $this->db->getCount($this->tbl, array('user_name' => $user));

   }



   public function forgot_member($email) {

      $message = 'Dear User<br>You Have requested New Password.<br>Please find the change Password below<br>';

      $new_pass = mt_rand();

      if ($this->db->update($this->tbl, array('user_pwd' => md5($new_pass)), array('user_email' => $email))) {

         $message.="New Password :<strong>$new_pass</strong>";

         $subject = $this->config['title'] . " - Password Recovery";

         if ($this->sendEmail($email, $subject, $message)) {

            $this->alert('success', 'An Email with new password sent to your registered email address');

         }

      }

   }



   public function change_status($status, $user_id) {



      return $this->db->update('tbl_user', $status, array('user_id' => $user_id));

   }



   public function log_in_user($id, $name, $pass, $route = 'index') {

      $this->db->update('tbl_user', array('user_last_login' => date('Y-m-d')), array('user_id' => $id));



      $session_arr = array(

          'kfc_user_id' => $id,

          'kfc_user_name' => $name,

          'kfc_user_pwd' => $pass

      );

      $this->set_session($session_arr);

      $this->go($route);

   }



   public function check_login($data) {





      $email = $data['user_email'];

      $pwd = md5($data['user_pwd']);



      $cond = array('user_email' => $email, 'user_pwd' => $pwd);

      $res = $this->db->get_row($this->tbl, $cond);

      if ($res) {

          

          if ($res['user_status'] == 'approved')

          {



         if (isset($data['remember'])) {





            $token = bin2hex(openssl_random_pseudo_bytes(32));

            $this->store_token($res['user_id'], $token);

            $cookie = $res['user_id'] . ':' . $token;

            $mac = hash_hmac('sha256', $cookie, $this->secret_key);

            $cookie .= ':' . $mac;

            setcookie('rememberme', $cookie, time() + 60 * 60 * 24 * 15);

         }

         $this->log_in_user($res['user_id'], $res['user_name'], $res['user_pwd']);

      } else {

          //$this->alert('error', 'Please verify your email first ');

          header('Location:varify_email.php?varify='.$email.'');

      }}

      else{

          

           $this->alert('error', 'Invalid Email or Password');

          

      }

   }



   public function store_token($user_id, $token) {

      $tb = 'tbl_remember';

      $data['user_id'] = $user_id;

      $data['token'] = $token;



      $row = $this->db->get_row($tb, array('user_id' => $user_id));

      if ($row) {

         $this->db->update($tb, $data, array('user_id' => $user_id));

      } else {

         $this->db->insert($tb, $data);

      }

   }



   public function logout_user() {

      $this->initSession();

      session_unset();

      session_destroy();

      setcookie("rememberme", "", time() - 60 * 60 * 24 * 15);

   }



   public function check_user() {



      $user = array();

      $this->initSession();

      if (isset($_SESSION['kfc_user_id']) && isset($_SESSION['kfc_user_name']) && isset($_SESSION['kfc_user_pwd'])) {

         $row = $this->db->get_row($this->tbl, array('user_id' => $_SESSION['kfc_user_id'], 'user_pwd' => $_SESSION['kfc_user_pwd']));

         if (!$row) {

            $this->logout_user();

            return false;

         } else

            return $row;

      } else if (!$this->check_cookie()) {

         return false;

      } else

         return false;

   }



   public function check_cookie() {

      $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';

      if ($cookie) {

         list ($user, $token, $mac) = explode(':', $cookie);



         if ($mac !== hash_hmac('sha256', $user . ':' . $token, $this->secret_key)) {

            return false;

         }

         $usertoken = $this->db->get_one('tbl_remember', array('user_id' => $user), 'token');

         if ($usertoken) {

            if ($this->timing_safe_compare($usertoken, $token)) {



               $row = $this->db->get_row($this->tbl, array($this->p_key => $user));

               if ($row) {

                  $this->log_in_user($row['user_id'], $row['user_name'], $row['user_pwd']);

               }





               // logUserIn($user);

            }

         } else

            return false;

      } else

         return false;

   }



   function timing_safe_compare($safe, $user) {

      // Prevent issues if string length is 0

      $safe .= chr(0);

      $user .= chr(0);



      $safeLen = strlen($safe);

      $userLen = strlen($user);



      // Set the result to the difference between the lengths

      $result = $safeLen - $userLen;



      // Note that we ALWAYS iterate over the user-supplied length

      // This is to prevent leaking length information

      for ($i = 0; $i < $userLen; $i++) {

         // Using % here is a trick to prevent notices

         // It's safe, since if the lengths are different

         // $result is already non-0

         $result |= (ord($safe[$i % $safeLen]) ^ ord($user[$i]));

      }



      // They are only identical strings if $result is exactly 0...

      return $result === 0;

   }



   public function register_member($data) {



      $personal = array();

      $user = array();







      $user['user_email'] = $data['user_email'];

      $user['user_pwd'] = md5($data['user_pwd']);

      $user['user_register_date'] = date('Y-m-d');

      $user['user_type'] = $data['user_type'];

      $user['user_name'] = 'user_' . mt_rand();

      $user['user_key'] = mt_rand();





      $user_res = $this->db->insert($this->tbl, $user);

      if ($user_res) {



         $personal['first_name'] = $data['user_first_name'];

         $personal['last_name'] = $data['user_last_name'];

         $personal['gender'] = $data['gender'];

         $personal['user_id'] = $this->db->last_id;

         $personal_res = $this->db->insert('tbl_profile_basic', $personal);



         $subject = 'Account Verification Email';

         $msg = 'Hi <br><br>';

         $msg.= 'Please click <a href="' . $this->config['web_path'] . 'login.php?uc=' . $user['user_key'] . '">Here</a> to activate your account at Knownfaces.';

         $result = $this->sendEmail($user['user_email'], $subject, $msg);

         $custom = array('tbl_profile_contact', 'tbl_profile_education', 'tbl_profile_personal', 'tbl_profile_work');

         $this->userToEach($personal['user_id'], $custom);

//         $session_arr = array(

//             'kfc_user_id' => $personal['user_id'],

//             'kfc_user_name' => $user['user_name'],

//             'kfc_user_pwd' => $user['user_pwd'],

//         );

//         $this->set_session($session_arr);

//         $this->go('logout');

         $this->alert('success', 'Check your email for verify your account! Thanks');

      } else {

         $this->alert('error', 'Some error occurred.Please try again later');

      }

   }



   public function addMember($data, $img = false, $admin = false) {







      $result = false;





      $fields = $this->unsetA($data, 'submit,user_id');

      $fields['user_pwd'] = md5($fields['user_pwd']);

      $fields['user_register_date'] = date('Y-m-d');

      $fields['user_key'] = mt_rand();









      #uploading image....

      //$name	= $this->uploadFile($img,'pic');



      if ($img)

         $name = $this->upload_file($img['pic'], 'avatar', array('jpg', 'jpeg', 'png', 'gif'));

      else

         $name = '';







      if (!empty($name)) {

         $fields['user_avatar'] = $name;

      }



      #insertion process starts for new tbl....

      $result = $this->db->insert('tbl_user', $fields);

      if ($result) {



         $this->userToEach($this->db->last_id);



         if (!$admin) {

            $subject = 'Account Verification Email';

            $msg = 'Hi <br><br>';

            $msg.= 'Please click <a href="' . $this->config['web_path'] . 'login.php?uc=' . $fields['user_key'] . '">Here</a> to activate your account at Knownfaces.';

            $result = $this->sendEmail($fields['user_email'], $subject, $msg);

         }

      }



      return $result;

   }



   /// getting list of users...

   public function getUsers($sql = false, $id = false, $tbl = 'tbl_user') {

      $cond = "";
      if ($id)

         $cond = array("user_id" => $id);

      if ($sql)

         $res = $this->db->gen_sql($tbl, $cond);

      else

         $res = $this->db->get_rows($tbl, $cond);
    
      return $res;

   }



// end of getUser function

   /// searching for Users 

   public function searchUser($data) {



      $sql = "select * from tbl_user where user_name like '%$data%' or user_email like '%$data%'";



      return $sql;

   }



   #----------------- Add an empty row against each user registered...



   public function userToEach($user_id, $custom = false) {



      $result = false;

      if (!$custom)

         $arr_tbl = array('tbl_profile_basic', 'tbl_profile_contact', 'tbl_profile_education', 'tbl_profile_personal', 'tbl_profile_work');

      else

         $arr_tbl = $custom;

      foreach ($arr_tbl as $tbl) {



         $res = $this->db->insert($tbl, array('user_id' => $user_id));

         if ($res)

            $result = true;

      }



      return $result;

   }



   public function send_notifications($user_type, $subject, $content) {

      $count = 0;

      if ($user_type != '*')

         $cond = array('user_type' => $user_type);

      else

         $cond = '';

      

      $users = $this->db->get_rows('tbl_user', $cond, false, array('user_name', 'user_email'));

      foreach ($users as $user) {

         if ($this->sendEmail($user['user_email'], $subject, $content))

            $count ++;

      }

      $this->alert('success', "Mail sent to $count users");

   }

   

   public function search($search, $user_id, $start = 0, $limit = 10) {



  $sql = "SELECT 

  tbl_user.`user_avatar`,

  tbl_user.`user_name`,

  tbl_user.`user_id`,

  tbl_profile_work.`company_name`,

  tbl_profile_work.`position`,

  tbl_profile_work.`company_name`,

  tbl_profile_contact.`city`,

  tbl_profile_basic.`first_name`,

  tbl_profile_basic.`last_name`,

  tbl_country.country_name

  

FROM

  tbl_user 

  LEFT JOIN tbl_profile_work 

    ON tbl_user.`user_id` = tbl_profile_work.`user_id` 

  LEFT JOIN tbl_profile_contact 

    ON tbl_user.`user_id` = tbl_profile_contact.`user_id` 

    LEFT JOIN tbl_country

    ON tbl_profile_contact.`country_id` = tbl_country.`country_id`

    LEFT JOIN tbl_profile_basic

    ON tbl_user.`user_id` = tbl_profile_basic.`user_id`

    

WHERE (tbl_user.user_name LIKE '%$search%' 

  OR tbl_user.user_email LIKE '%$search%' 

  OR lower(tbl_profile_basic.first_name) LIKE '%$search%'

  OR lower(tbl_profile_basic.last_name) LIKE '%$search%' 

  OR CONCAT(tbl_profile_basic.first_name, ' ', tbl_profile_basic.last_name) LIKE '%$search%'    

)

  AND tbl_user.user_id != '$user_id' LIMIT  $limit  OFFSET $start";







      $rows = $this->db->ex($sql);



      return $rows;

   }



   public function check_already_friend($user_id, $friend_id) {



      $count_friend = $this->db->getCount('tbl_friend', array('user_id' => $user_id, 'user_friend_id' => $friend_id));

      $count_request = $this->db->getCount('tbl_friend_request', array('request_by' => $user_id, 'request_to' => $friend_id));

      return array('is_friend' => $count_friend, 'is_request' => $count_request);

   }



   public function send_friend_request($user_id, $friend_id) {

      $trigger_obj=$this->load_model('Trigger');

      $trigger_obj->friend_request($user_id,$friend_id);

      $data['request_by'] = $user_id;

      $data['request_to'] = $friend_id;

      return $this->db->insert('tbl_friend_request', $data);

   }



   public function get_count_requests($user_id) {



      return $this->db->getCount('tbl_friend_request', array('request_to' => $user_id));

   }



   public function get_data_requests($user_id) {



      $this->db->tail = " Order By request_id DESC LIMIT 6";

      $users = $this->db->get_rows('tbl_friend_request', array('request_to' => $user_id));

      $this->db->tail = "";



      if ($users) {



         $html = "";

         $html.="<div class='popOverBox'>";

         foreach ($users as $user) {

            $profile = $this->db->get_row('tbl_profile_basic', array('user_id' => $user['request_by']), array('first_name', 'last_name'));



            $avatar = $this->db->get_one('tbl_user', array('user_id' => $user['request_by']), 'user_avatar');

            $img = $this->config['thumb_path'] . $avatar;

            $name = $this->truncate(ucfirst($profile['first_name'] . ' ' . $profile['last_name']), 16, false);

            if ($profile && $avatar) {

               $html.="<li class='li_bot' ><div style='float:left'>";

               $html.="<img src='$img' width='50px' height='50px'></div>";

               $html.="<span class='message' style='margin-left:5px'>$name</span>";

               $html.="<div style='float:left;margin-left:5px;margin-top:6px;'><span id='$user[request_by]'><a style='background-color:#24BEE2' href='javascript:;' class='btn btn-xs btn-success btn_accept_top' ><span class='glyphicon glyphicon-ok'></span> Accept</a></span>";

               $html.="<span style='margin-left:5px'><a href='index?r=$user[request_by]' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-remove'></span> Reject</a></div></span>";

               $html.="</li>";

               //href='index?a=$user[request_by]'

            }

         }

         $html.="</div><li><div class='footer'><a href='requests'>View all Requests</a></div> </li>";

         echo $html;

      } else {

         echo "No Requests..";

      }

   }



   public function get_requests($user_id, $offset = 0, $limit = 10) {



      $this->db->tail = " Order By request_id DESC LIMIT $limit OFFSET $offset";

      $users = $this->db->get_rows('tbl_friend_request', array('request_to' => $user_id));

      $this->db->tail = "";







      if ($users) {

         $requests = array();

         foreach ($users as $user) {

            $profile = $this->db->get_row('tbl_profile_basic', array('user_id' => $user['request_by']), array('first_name', 'last_name'));

            $avatar = $this->db->get_one('tbl_user', array('user_id' => $user['request_by']), 'user_avatar');

            $requests[] = array(

                'id' => $user['request_by'],

                'first' => $profile['first_name'],

                'last' => $profile['last_name'],

                'avatar' => $this->config['thumb_path'] . $avatar

            );

         }

         return $requests;

      }

   }



   public function remove_request($req_to, $req_by) {

      $tbl = 'tbl_friend_request';

      $cond = array('request_by' => $req_by, 'request_to' => $req_to);

      return $this->db->delete($tbl, $cond);

   }



   public function make_friends($self_id, $friend_id, $type = 'friends', $ajax = false) {



       if(strstr($friend_id, '_'));

       {

           $getSplit    = explode('_',$friend_id);

           $friend_id   = $getSplit[1];

           $type        = $getSplit[0];

       }

       

       

      $data['user_id'] = $self_id;

      $data['user_friend_id'] = $friend_id;

      $data['friend_type'] = $type;





      $check = $this->check_already_friend($self_id, $friend_id);

      if (!$check['is_friend']) {

     

         $res_1 = $this->db->insert('tbl_friend', $data);



         $data['user_id'] = $friend_id;

         $data['user_friend_id'] = $self_id;



         $res_2 = $this->db->insert('tbl_friend', $data);



         if ($res_1 && $res_2) {



                //// adding notification '

               $noti_obj    = $this->load_model('Notification');

               $noti['noti_type']   = 'friend_request_accept';

               $noti['noti_data']   = $data['user_id'];

               $noti['noti_from_user']   = $data['user_friend_id'];

               $noti['noti_date']   = $this->current_date_time();

               $noti_obj->getAddNoti($noti);

               $trigger_obj=$this->load_model('Trigger');

               $trigger_obj->notification_log($self_id,$friend_id);            
               $trigger_obj->remove_friend_request_log($self_id,$friend_id);
               /* End of noti area..........*/

               

               

            $this->remove_request($self_id, $friend_id);

            if ($ajax) {

               return true;

            } else {

              

                

                $this->alert('success', "Friend added with success.");

//                $trigger_obj=$this->load_model('Trigger');

//                $trigger_obj->friend_request_accepted($self_id,$friend_id);

                //$this->db->delete('tbl_log',array('noti_to_user_id'=>$self_id,'noti_by_user_id'=>$friend_id,'log_type'=>'friend_request_sent')); 

              //  $trigger_obj=$this->load_model('Trigger');

               

            }

         } else {

            return false;

         }

      }

   }



   public function reject_friends($self_id, $friend_id) {

      if ($this->remove_request($self_id, $friend_id)) {

         // $this->db->delete('tbl_log',array('noti_to_user_id'=>$self_id,'noti_by_user_id'=>$friend_id,'log_type'=>'friend_request_sent')); 

          $trigger_obj=$this->load_model('Trigger');

          $trigger_obj->remove_friend_request_log($self_id,$friend_id);

          $this->alert('warning', 'Friend request declined');

      }

   }



   public function get_users_data($user_id, $rows = false) {

      $sql = "SELECT 

                 tbl_user.`user_avatar`,

                 tbl_user.`user_name`,

                 tbl_user.`user_id`,

                 tbl_profile_work.`company_name`,

                 tbl_profile_work.`position`,

                 tbl_profile_work.`company_name`,

                 tbl_profile_contact.`city`,

                 tbl_profile_basic.`first_name`,

                 tbl_profile_basic.`last_name`,

                 tbl_country.country_name



               FROM

                 tbl_user 

                 LEFT JOIN tbl_profile_work 

                   ON tbl_user.`user_id` = tbl_profile_work.`user_id` 

                 LEFT JOIN tbl_profile_contact 

                   ON tbl_user.`user_id` = tbl_profile_contact.`user_id` 

                   LEFT JOIN tbl_country

                   ON tbl_profile_contact.`country_id` = tbl_country.`country_id`

                   LEFT JOIN tbl_profile_basic

                   ON tbl_user.`user_id` = tbl_profile_basic.`user_id`



               WHERE tbl_user.user_id = '$user_id'";

      $rows = $this->db->ex($sql, $rows);



      return $rows;

   }



   public function get_friends($user_id, $start = 0, $limit = 10) {



      $this->db->tail = " Order by friend_id DESC LIMIT $limit OFFSET $start ";

      $friends = $this->db->get_rows('tbl_friend', array('user_id' => $user_id));

      $this->db->tail = "";

      return $friends;

   }

  

   public function remove_friend($user_id, $friend_id) {



      $cond['user_id'] = $user_id;

      $cond['user_friend_id'] = $friend_id;

      $del1 = $this->db->delete('tbl_friend', $cond);





      $cond['user_id'] = $friend_id;

      $cond['user_friend_id'] = $user_id;

      $del2 = $this->db->delete('tbl_friend', $cond);





      if ($del1 && $del2)

         return true;

      else

         return false;

   }



   public function get_full_name($user_id) {

      $sql = "SELECT 

  CONCAT(first_name, ' ', last_name)  AS full_name

FROM

  tbl_profile_basic 

WHERE user_id=$user_id";



      $row =$this->db->ex($sql,false);

      return $row['full_name'];

      

   }



   public function getUserBasicInfo($user_id){

       return $this->db->get_row('tbl_user',array('user_id'=>$user_id));              

   }

   

   

   public function sendIndividualNoti($data)

   {

       $msg ="";

       $obj_admin   = $this->load_model("Admin");

       

       

      $user_email   = $data['user_email'];

      $subject      = $data['letter_subject'];

      $content      = $data['letter_text'];

      $res  = $this->sendEmail($user_email, $subject, $content);

       if($res)

       {

           $msg.= $obj_admin->showAlert('success', "Mail successfully sent to $user_email");

           

       }else

       {

           $msg.= $obj_admin->showAlert('error', "Mailing server error");

       }

       return $msg;

   }

   

      public function get_friends_html($user_id,$access_option='friends',$friend_id=false) {

      $html    = "";

      $filter="friends";

      if($access_option=='family')

      {

          $filter   = 'family';

      }

      

      $this->db->tail = " Order by friend_id DESC";

      $friends = $this->db->ex("select tbl_friend.friend_id,tbl_profile_basic.user_id,tbl_profile_basic.first_name,tbl_profile_basic.last_name from tbl_friend,tbl_profile_basic where tbl_profile_basic.user_id=tbl_friend.user_friend_id and tbl_friend.friend_type='$filter' and tbl_friend.user_id='$user_id'");
      $this->db->tail = "";
       if(!empty($friends) && is_array($friends))

      {

           foreach ($friends as $friend) {

            $selected = "";

            if ($friend_id) {

               if ($friend_id == $friend['user_id'])

                  $selected = "selected";

            }

            $html.="<option $selected value='" . $friend['user_id'] . "' >" . $friend['first_name'].' '.$friend['last_name']. "</option>";

         }

          

      }

      return $html;

   }

   

   

    ///////////// AR 

   

    public function get_count_message($user_id) {



      return $this->db->getCount('tbl_msgs', array('msg_send_to' => $user_id ,'msg_is_read' => '0' ));

   }

   

   

      public function get_data_messages($user_id) {



   

      //$this->db->tail = " Order By request_id DESC LIMIT 6";

      $users = $this->db->get_rows('tbl_msgs', array('msg_send_to' => $user_id, 'msg_is_read' => '0'));

      $this->db->tail = "";

    

     

      if ($users) {



         $html = "";

         $html.="<div class='popOverBox'>";

         foreach ($users as $user) {

            $profile = $this->db->get_row('tbl_profile_basic', array('user_id' => $user['msg_send_by']), array('first_name', 'last_name'));



            $avatar = $this->db->get_one('tbl_user', array('user_id' => $user['msg_send_by']), 'user_avatar');

            $img = $this->config['thumb_path'] . $avatar;

            $name = $this->truncate(ucfirst($profile['first_name'] . ' ' . $profile['last_name']), 16, false);

            if ($profile && $avatar) {

               $html.="<li class='li_bot'style='width: 80%'; ><div style='float:left;'>";

               $html.="<img src='$img' width='50px' height='50px'></div>";

               $html.="<a href='message.php'><span class='message' style='margin-left:5px'>$name</span></a>";

              

               

              

                 $html.="</li>";

              

            }

         }

         $html.="</div><li><div class='footer'><a href='message.php'>View all messages</a></div> </li>";

         echo $html;

      } else {

         echo "No more messages";

      }

   }

   

         public function user_varify($varify_code) {



   

      //$this->db->tail = " Order By request_id DESC LIMIT 6";

      $code = $this->db->get_row('tbl_user', array('user_key' => $varify_code));

      

  

      if ($code) {

         $this->db->update('tbl_user', array('user_status' => 'approved'), array('user_id' => $code['user_id']));

     

         return 'approved';

      } else {

          return ;

      }

    



   }

         public function re_varify_email($email) {



   

      //$this->db->tail = " Order By request_id DESC LIMIT 6";

      $data = $this->db->get_row('tbl_user', array('user_email' => $email));

      

  

      if ($data) {

        $subject = 'Account Verification Email';

         $msg = 'Hi <br><br>';

         $msg.= 'Please click <a href="' . $this->config['web_path'] . 'login.php?uc=' . $data['user_key'] . '">Here</a> to activate your account at Knownfaces.';

         $result = $this->sendEmail($data['user_email'], $subject, $msg);

      }

      else{

          

          $this->alert('warning', 'Your Email is incorrect');

      }

   }

   

    public function get_frnds_sugg($user_id) {
      $sql="SELECT `user_friend_id` FROM `tbl_friend` WHERE `user_id` = $user_id ";
      $friend = $this->db->ex($sql);
    if ($friend) {
         foreach ($friend as $friend_of_friends) {
            // var_dump($friend_of_friends['user_friend_id']);exit;
                $sql2="SELECT `user_friend_id` FROM `tbl_friend` WHERE `user_id` = ".$friend_of_friends['user_friend_id']." and user_friend_id!='$user_id'";
                return $friends = $this->db->ex($sql2);
            }
         }
     else {
        return  False;
      }
   }

 

   

   /* end of class */}



?>