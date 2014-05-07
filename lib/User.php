<?php

/// version 1.0
/// last updated 29-11-2013

class User Extends Main {

    
    
    
    
   public function getTypeHtml() {

      // $types= array('company'=>'Basic membership, plus business directory','individual'=>'Basic membership');
      $types = array('company' => 'Premium Package', 'individual' => 'Standard Package');

      $html = '<select name="user_type" id="user_type" class="required">';
      $html.='<option value="">Please Select Type</option>';
      foreach ($types as $key => $type) {

         $html.='<option value="' . $key . '">' . $type . '</option>';
      }
      $html.='</select>';

      return $html;
   }

   public function getPayment($data) {// redirecting to paypal site.

      $paypal = $this->load_model('Paypal');

      $arr = $paypal->PayUsingPaypal(array('name' => 'User Registration', 'price' => $data['price']), 'ExecutePayment');

      // process for temp user

      $data['payment_id'] = $arr['pay_id'];
      $data['date'] = $this->currentDate();


      $res = $this->db->insert('tbl_tmp_user', $data);

      /// auto redirect to another page if query successfully execute

      if ($res) {
         header("Location: $arr[url]");
      } else {
         return false;
      }
   }

   public function getRegisterUser($data) {
      $obj_admin = $this->load_model('Admin');

      $user_info = $this->unsetA($data, 'cpass,txtCaptcha,submit');

      //Let's generate a totally random string using md5 
      $md5_hash = md5(rand(0, 999));
      //We don't need a 32 character long string so we trim it down to 5 
      $security_code = substr($md5_hash, 15, 8);


      $user_info['user_verify_code'] = $security_code;
      $user_info['user_date'] = $this->currentDate();
      $user_info['user_pass'] = md5($user_info['user_pass']);


      $result = $this->db->insert('tbl_user', $user_info);

      if ($result) {

         $subject = 'Welcome to Safqah';
         $message = 'Welcome to Safqah <BR> <a href="' . $this->config['web_path'] . 'index.php?c=' . $security_code . '">Click Here</a> to login.';

         $this->sendEmail($user_info['user_email'], $subject, $message);


         return $obj_admin->noti('success', 'Thank you for registering with us. We have sent you an email to verify your email account. Please click the link in that email.');
      } else {

         return $obj_admin->noti('error', 'An Error Ocurred during registration process our support team is handling this error');
      }
   }

   public function getLogin($data) {



      $obj_admin = $this->load_model('Admin');

      $tbl = 'tbl_user';
      $cond = array('user_email' => $data['user_email'], 'user_pass' => md5($data['user_pass']));
      $res = $this->db->get_row($tbl, $cond);
      if ($res) {
         if ($res['user_verify'] == 1) {

            if (isset($data['remember_me'])) {

               $expire = time() + 60 * 60 * 24 * 30; //month (60 sec * 60 min * 24 hours * 30 days)
               setcookie('user_email', $data['user_email'], $expire);
               setcookie('user_pass', $data['user_pass'], $expire);
            }

            $this->initSession(); /// starting session
            $_SESSION['user'] = $res['user_name'];



            if ($res['user_type'] == 'individual') {

               $chkExist = $this->db->get_row('tbl_ind', array('user_id' => $res['user_id']));

               if ($chkExist) {

                  echo "<script>window.location.href='" . $this->config['web_path'] . "ind_home.php';</script>";
               } else {
                  echo "<script>window.location.href='" . $this->config['web_path'] . "ind_edit.php';</script>";
               }
            } elseif ($res['user_type'] == 'company') {


               $chkExist = $this->db->get_row('tbl_company', array('user_id' => $res['user_id']));

               if ($chkExist) {

                  echo "<script>window.location.href='" . $this->config['web_path'] . "com_home.php';</script>";
               } else {
                  echo "<script>window.location.href='" . $this->config['web_path'] . "company_edit.php';</script>";
               }
            }
         } else {
            return $obj_admin->noti('warning', 'In order to use your account, you must verify your email address by clicking the link in the email we sent you.');
         }
      } else {
         return $obj_admin->noti('error', 'Email or Password Incorrect');
      }
   }

   public function chkLogin() {
      if (isset($_SESSION['user']) && $_SESSION['user'] != "") {

         $tbl = 'tbl_user';
         $cond = array('user_name' => $_SESSION['user']);
         $res = $this->db->get_row($tbl, $cond);
         if ($res) {
            return $res;
         }
      } else {

         echo "<script> window.location.href='" . $this->config['web_path'] . "'; </script>";
      }
   }

   public function getUserDeatil() {

      if (isset($_SESSION['user']) && $_SESSION['user'] != "") {

         $tbl = 'tbl_user';
         $cond = array('user_name' => $_SESSION['user']);
         $res = $this->db->get_row($tbl, $cond);
         if ($res) {
            return $res;
         }
      } else {
         return false;
      }
   }

   public function setEnableUser($payer_id) {
      $tbl = 'tbl_tmp_user';
      $cond = array('payment_id' => $payer_id);
      $res = $this->db->get_row($tbl, $cond);
      if ($res) {

         $result = $this->setVerify(0, $res['user_id']);

         if ($result) {

            $tbl = 'tbl_user';
            $cond = array('user_id' => $res['user_id']);
            $res = $this->db->get_row($tbl, $cond);
            if ($res) {
               $this->initSession(); /// starting session
               $_SESSION['user'] = $res['user_name'];



               if ($res['user_type'] == 'individual') {

                  echo "<script>window.location.href='" . $this->config['web_path'] . "ind_home.php?mod=paid';</script>";
               } elseif ($res['user_type'] == 'company') {

                  echo "<script>window.location.href='" . $this->config['web_path'] . "com_home.php?mod=paid';</script>";
               }
            }
         }
      }
   }

   public function setVerify($verify_email = false, $verify_account = false) {
      $data = array();
      if ($verify_email) {
         $cond = array('user_verify_code' => $verify_email);
         $data['user_verify'] = '1';
      } elseif ($verify_account) {
         $cond = array('user_id' => $verify_account);
         $data['user_account'] = '1';
         $data['user_subscribe_date'] = $this->currentDate();
      }

      $res = $this->db->get_row('tbl_user', $cond);

      if ($res) {

         if ($this->db->update('tbl_user', $data, $cond)) {
            return true;
         } else {
            return false;
         }
      }
   }

   public function setUserSetting($data, $stype) {
      $info = array();
      $us_category = $data['cat_data'];
      $user_id = $data['user_id'];



      $info = $this->unsetA($data, 'user_id,cat,cat_data,subcat,update,selected_cats,submit');

      if (!isset($data['us_' . $stype . '_email'])) {
         $info['us_' . $stype . '_email'] = 0;
      } else {
         $info['us_' . $stype . '_email'] = 1;
      }


      if ($stype == 'tender') {
         $info['us_tender_category'] = $us_category;
      } elseif ($stype == 'b2b') {
         $info['us_b2b_category'] = $us_category;
      }


      $info['user_id'] = $user_id;


      $tbl = 'tbl_user_setting';
      $cond = array('user_id' => $info['user_id']);
      $res = $this->db->get_row($tbl, $cond);
      if ($res) {
         if ($this->db->update($tbl, $info, $cond)) {
            return true;
         } else {
            return false;
         }
      } else {
         $result = $this->db->insert($tbl, $info);
         return true;
      }
   }

   public function getUserSetting($user_id) {
      $tbl = 'tbl_user_setting';
      $cond = array('user_id' => $user_id);
      $res = $this->db->get_row($tbl, $cond);
      if ($res) {
         return $res;
      }
   }

   public function setListing($user_id) {

      if ($this->db->update('tbl_company', array('company_listing' => 1), array('user_id' => $user_id))) {
         return true;
      } else {
         return false;
      }
   }

   public function getUserInfo($user_id, $type) {
      if ($type == 'ind') {
         $tbl = 'tbl_ind';
      } elseif ($type == 'company') {
         $tbl = 'tbl_company';
      }

      $cond = array('user_id' => $user_id);
      $res = $this->db->get_row($tbl, $cond);
      if ($res) {
         return $res;
      }
   }

   public function searchListing($data, $type) {

      if ($data['search_text'] == "" && $data['cat'] == '-1' && $data['subcat'] == '-1') {
         $obj_admin = $this->load_model('Admin');
         return $obj_admin->noti('error', 'Please input  atleast 1 field to search');
      } else {

         $count = 0;
         $where = "";
         $order = "";
         $count_end = 0;







         if ($type == 'tender') {  /// searching tender 
            $tbl = 'tbl_tender';
            $title = 'tender_subject';
            $category = 'category_id';
            $order = ' order by tender_id';
         } elseif ($type == 'directory') { /// searching directory 
            $tbl = 'tbl_company';
            $title = 'company_title';
            $category = 'company_ind';
         } elseif ($type == 'project') { /// searching tender 
            $tbl = 'tbl_proj';
            $title = 'proj_subject';
            $category = 'category_id';
            $order = ' order by proj_id';
         }


         //// searching Area......

         if ($data['search_text'] != '') { // for ending bracket
            $count_end ++;
         }
         if ($data['cat'] != -1) {
            $count_end ++;
         }
         if ($data['subcat'] != -1) {
            unset($data['cat']);
            $count_end = $count;
            $count_end ++;
         }



         if (isset($data['search_text']) && $data['search_text'] != "") {
            $where.= " (LOWER ($title) like '%$data[search_text]%'";
            $count++;

            if ($count == $count_end) {
               $where.=")";
            }
         }
         if (isset($data['cat']) && $data['cat'] != '-1') {

            if ($count > 0) {
               $where.=" or";
            } else {
               $where.="(";
            }
            $admin = $this->load_model('Admin');
            $cat = $admin->getAllCats('tbl_category', $data['cat'], 1);

            $where.=" $category IN($cat)";
            $count++;
            if ($count == $count_end) {
               $where.=")";
            }
         }

         if (isset($data['subcat']) && $data['subcat'] != "-1") {
            if ($count > 0) {
               $where.=" or";
            } else {
               $where.="(";
            }

            $where.=" $category IN($data[subcat])";
            $count++;
            if ($count == $count_end) {
               $where.=")";
            }
         }

         if ($type == 'directory') { /// checking if directory listing is enable(1)
            if ($count > 0) {
               $where.=" and";
            }
            $where.=" company_listing='1'";
         }
         if ($type == 'project') { /// checking if project status is enable(1)
            if ($count > 0) {
               $where.=" and";
            }
            $where.=" proj_status='1'";
         }

         $sql = "select * from $tbl where $where $order";

         if ($this->db->ex($sql))
            return $sql;
         else
            return false;
      }
   }

   public function getUsersByCat($catid) {
      $query = "SELECT 
			*
			FROM
			tbl_user 
			LEFT JOIN tbl_ind 
			ON tbl_user.user_id = tbl_ind.`user_id` 
			LEFT JOIN tbl_company 
			ON tbl_user.user_id = tbl_company.`user_id` 
			WHERE tbl_user.`user_verify` != '0' 
			AND tbl_user.`user_account` != '0' 
			AND (
			tbl_ind.`category_id` IN ($catid) 
			OR tbl_company.`company_ind` IN ($catid)
			)";

      return $this->db->ex($query);
   }

   public function getInfo($user_id) {

      $cond = array('user_id' => $user_id);
      $res = $this->db->get_row('tbl_ind', $cond);
      if ($res) {
         return $res;
      } else {
         $res = $this->db->get_row('tbl_company', $cond);
         if ($res)
            return $res;
         else
            return false;
      }
   }

   public function getUserProjects($user_id) {
      $tbl = 'tbl_proj';
      $cond = array('user_id' => $user_id);
      return $this->db->gen_sql($tbl, $cond);
   }

   public function getPromote($data, $file) {

      # checking for selected industry
      $industry = "";
      $subindustry = "";
      if (isset($data['cat']) && $data['cat'] != "") {
         $cats = $this->db->get_row("tbl_category", array("category_id" => $data['cat']), array('category_title'));
         $industry = $cats['category_title'];
      }
      if (isset($data['subcat']) && $data['subcat'] != "") {
         $cats = $this->db->get_row("tbl_category", array("category_id" => $data['subcat']), array('category_title'));
         $subindustry = $cats['category_title'];
      }

      # Preparing message body
      $message = "";
      $message.="<table><tr><td><b>want to promote<b>	</td><td> : " . $data['like_promote'] . '</td></tr>';
      $message.="<tr><td><b>Industry<b>		</td><td>: " . $industry . "</td></tr>";
      $message.="<tr><td><b>Subindustry<b>	</td><td>: " . $subindustry . "</td></tr>";
      $message.="<tr><td><b>Description<b>	</td><td>: " . $data['desc'] . "</td></tr>";
      $message.="<tr><td><b>Other<b>		</td><td>: " . isset($data['other']) ? $data['other'] : "nil</td></tr></table>";


      # includeing PHPmailer class..		
      $mail = $this->load_model("PHPMailer");

      # setting result false before processing PHPMailer	
      $result = false;


      $mail->From = $data['email'];
      $mail->Subject = 'Promote With Us';
      $mail->Body = $message; //html email
      $mail->addAddress($this->config['admin_email']);

      if ($_FILES['file']['name'] != "")
         $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);


      $mail->WordWrap = 50;
      $mail->isHTML(true); // Set email format to HTML

      if (!$mail->send()) {
         $result = false;
      } else {
         $result = true;
      }



      return $result;
   }

   public function chkFvt($fvt_id) {

      $admin = $this->load_model("Admin");
      if (isset($_SESSION['user']) && $_SESSION['user'] != "") {

         $user_data = $this->getUserDeatil();
         $query = "SELECT * FROM tbl_user WHERE user_fvt LIKE '%$fvt_id%' and user_id='$user_data[user_id]'";

         $res = $this->db->ex($query);
         if (is_array($res) && !empty($res)) {
            return false;
         } else
            return true;
      } else
         return false;
   }

   public function addToFvt($fvt_id) {

      $admin = $this->load_model("Admin");
      if ($this->chkFvt($fvt_id)) {
         $user_data = $this->getUserDeatil();
         $user_fvt = array();
         $fvts = $user_data['user_fvt'];
         if (!empty($fvts)) {

            $user_fvt['user_fvt'] = $fvts . ',' . $fvt_id;
         } else {
            $user_fvt['user_fvt'] = $fvt_id;
         }

         if ($this->db->update('tbl_user', $user_fvt, array('user_id' => $user_data['user_id']))) {

            $admin->noti("warning", " Successfully added to your favourite list");
            return true;
         } else {
            $admin->noti("error", " o0ps error occured");
            return false;
         }
      }
   }

   public function getfvt($sql = false) {
      $admin = $this->load_model("Admin");
      if (isset($_SESSION['user']) && $_SESSION['user'] != "") {

         $user_data = $this->getUserDeatil();
         $res = $this->db->get_row('tbl_user', array('user_id' => $user_data['user_id']));

         if (is_array($res) && !empty($res)) {


            if (!empty($res['user_fvt'])) {

               $comp = array();
               if (strstr($res['user_fvt'], ",")) {

                  $fvts = explode(",", $res['user_fvt']);
                  $i = 0;
                  foreach ($fvts as $fvt) {

                     $com = $this->getUserInfo($fvt, 'company');
                     $comp[$i]['title'] = $com['company_title'];
                     $comp[$i]['logo'] = $com['company_photo'];

                     $name = $this->db->get_row('tbl_user', array('user_id' => $fvt));
                     $comp[$i]['username'] = $name['user_name'];
                     $i++;
                  }
               } else {

                  $com = $this->getUserInfo($res['user_fvt'], 'company');
                  $comp[0]['title'] = $com['company_title'];
                  $comp[$i]['logo'] = $com['company_photo'];
                  $name = $this->db->get_row('tbl_user', array('user_id' => $res['user_fvt']));
                  $comp[0]['username'] = $name['user_name'];
               }

               return $comp;
            } else
               return false;
         } else
            return false;
      } else
         return false;;
   }

   public function getFriendsEvents($user_id) {

      $html = "";
      $current_Date = $this->currentDate();

      $query = "SELECT 
  * 
FROM
  tbl_events,
  tbl_profile_basic,
  tbl_friend 
WHERE tbl_events.`religion_type` = tbl_profile_basic.`religion` 
  AND tbl_events.`event_date` = '{$this->currentDate()}' 
  AND tbl_profile_basic.`user_id` = `tbl_friend`.`user_friend_id` 
  AND tbl_friend.`user_id`='$user_id' ";

  
      $rows = $this->db->ex($query);



      if (is_array($rows) && !empty($rows)) {

         $html.='<div id="testimonials"><ul>';


         foreach ($rows as $row) {

            if ($row['birthday'] == $this->currentDate()) {
               // echo "Herer";exit;
               $html.='<li><blockquote><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a> has birthday today. Celebrate with <p class="author"><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a></p></blockquote></li>';
            }

//                        $html.='<p class="events"> '.$row['first_name'].' '.$row['last_name'].'Ut eu consectetur nisi. Praesent facilisis diam nec sapien gravida non mattis justo imperdiet. Vestibulum nisl urna, euismod sit amet congue at, bibendum non risus.</p>';  
            $html.='<li><blockquote>Your friend <a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a> has ' . $row['event_name'] . ' today.<p class="author">Wish <a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a></p></blockquote></li>';
         }

         $html.='</ul></div>';
      }
      return $html;
   }
  public function getUserByUsername($user_name)
   {
       return $this->db->get_row('tbl_user',array('user_name'=>$user_name));       
   }
    public function friend_count($user_id) {

       $user_data = $this->getUserDeatil();
         $query = "SELECT COUNT(user_id) FROM tbl_friend WHERE user_id = '$user_id'";

          $res = $this->db->ex($query);
         
              foreach($res as $ress)
          {
      
                return $ress['COUNT(user_id)']; 
                  
         }
   }
}

// end of class
?>