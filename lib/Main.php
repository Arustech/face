<?php

//Version 1.0
//Last Updated 20-11-2013
//echo getcwd();
class Main {
// Framework variables
  
   /* Local Server */

    public $config = array(
       'script_path' => 'C:/wamp/www/face/',
       'web_path' => 'http://localhost/face/',
       'admin_path' => 'http://localhost/face/admin/',
       'log_error' => TRUE,
       'admin_email' => 'info@knownface.com',
       'upload_dir' => 'uploads',
       'upload_path' => 'C:/wamp/www/face/uploads/',
       'upload_url' => 'http://localhost/face/uploads/',
       'thumb_path' => 'http://localhost/face/uploads/thumbs/',
       'cover_web' => 'http://localhost/face/uploads/covers/',
       'cover_path' => 'C:/wamp/www/face/uploads/covers/',
       'avatar_path' => 'C:/wamp/www/face/uploads/avatar/',
       'avatar_web' => 'http://localhost/face/uploads/avatar/',
       'orig_path' => 'C:/wamp/www/face/uploads/orignal/',
       'orig_web' => 'http://localhost/face/uploads/orignalimg/',
       'db_name' => 'face_db',
       'db_user' => 'root',
       'db_pass' => '',
       'db_host' => 'localhost',
       'db_type' => 'mysql',
       'db_port' => 3306,
       'db_charset' => 'utf8',
       'title' => 'knownface.com',
   );
   public $username;
   public $msg;

   public function __construct() {
      date_default_timezone_set('Asia/Karachi');
      //date_default_timezone_set('America/Chicago');

      ob_start();
      $this->db = $this->load_model("Db");





      if ($this->config['log_error'] == TRUE) {

         error_reporting(E_ALL);
      } else {

         error_reporting(E_ALL);
      }
   }

   /*



    * @param string model name

    */

   //Common Functions  

   public function currentDate() {
      return date('Y-m-d');
   }
   
   public function current_date_time(){
       return date( 'Y-m-d H:i:s', time());
   }

   function load_model($module_name) {



      $location = "{$this->config['script_path']}/lib/{$module_name}.php";







      // Make sure the module is not already loaded

      if (@!is_object($this->$module_name)) {

         if (file_exists($location)) {

            // Load the module into the current object

            include_once($location);

            $this->$module_name = new $module_name();

            // Return the object

            return $this->$module_name;
         } else {

            return FALSE;
         }
      } else {

         // Return the object

         return $this->$module_name;
      }
   }

   function iJS($filename) {



      $location = "{$this->config['script_path']}js/{$filename}.js";

      if (file_exists($location)) {

         $source = $this->config['web_path'] . "js/$filename.js";



         echo "<script type='text/javascript' src='$source'></script>\n";
      } else {

         echo "$location not found";
      }
   }

   function iCSS($filename) {



      $location = "{$this->config['script_path']}css/{$filename}.css";

      if (file_exists($location)) {

         $source_css = $this->config['web_path'] . "css/$filename";

         echo "<link href='$source_css.css' rel='stylesheet' type='text/css' media='screen'>\n";
      } else {

         echo "$location not found";
      }
   }

   // For file uploading...

   public function gen_ran($length = 5) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
   }

   public function get_path($folder = '') {

      return $this->config['upload_path'] . $folder . "/";
   }

   public function get_uurl($folder = '') {

      return $this->config['upload_url'] . $folder . "/";
   }

   public function uploadFile($file, $index_name = 'file') {
      $name = "";
      if ($file[$index_name]['name'] != "" || !empty($file)) {
         $filename = strtolower($file[$index_name]['name']);

         $parts = explode(".", $filename);

         $exts = "." . $parts[count($parts) - 1];

         $name = mt_rand() . $exts;

         move_uploaded_file($file[$index_name]["tmp_name"], $this->config['upload_path'] . $name);

         return $name;
      }
      return $name;
   }

   public function upload_file($file, $folder = '', $allowed = false, $max_size = false, $gen_thumb = false) {
//allowed = array('png','jpg')
      $path = $file['name'];
      $ext = pathinfo($path, PATHINFO_EXTENSION);
      $this->err_file = array();

      if ($allowed) {
         if (!in_array($ext, $allowed)) {
            $this->err_file[] = "This extension is not allowed for file upload.Please use these " . implode(',', $allowed);
            return false;
         }
      }


      $filename = $this->gen_ran(14) . ".$ext";
      $upload = $this->get_path($folder);

      if ($max_size) {
         if ($file['size'] == 0 || $file['size'] > $max_size) {
            $this->err_file[] = "File is too large.Size should not be greater than MB " . ($max_size / 1024) / 1024;
            return false;
         }
      }



      if ($file["error"] > 0) {
         $this->err_file[] = "Some Error occured . Please try again later.";
         return false;
      }


      if (file_exists($upload . $filename)) {
         $this->err_file[] = "This file already exists in our system.";
         return false;
      } else {
         if (move_uploaded_file($file["tmp_name"], $upload . $filename)) {
            $img = $this->load_model('Image');
            $img->create_thumb($filename, $upload);
            $img->w=29;
            $img->h=40;
            $img->dirPath='thumbs_small/';
            $img->create_thumb($filename, $upload);
            $img->set_default();
            
            return $filename;
         } else {
            $this->err_file[] = "Cannot upload file please check your folder permissions properly set.";
            return false;
         }
      }
   }

   public function getOrigFileName($username, $filename) {

      $filename = strtolower($filename);

      $parts = explode(".", $filename);



      $exts = "." . $parts[count($parts) - 1];



      return $username . "_" . $parts[0] . $exts;
   }

   #Check Session Already Started or Not

   public function initSession() {



      if (session_id() == '') {

         // session isn't started

         session_start();
      }
   }

   #GET Random File Name

   public function getRandFileName($username, $filename) {



      $filename = strtolower($filename);

      $parts = explode(".", $filename);



      $exts = "." . $parts[count($parts) - 1];









      return $username . "_" . rand(time(), 1) . $exts;
   }

   #Logout

   public function Logout() {

      $this->initSession();

      session_unset();

      session_destroy();

      setcookie("rememberme", "", time() - 60 * 60 * 24 * 15);

      header("Location: " . $this->config['web_path']);
   }

   #Get File name without Extension

   public function getName($name) {



      $without_ext = substr($name, 0, strrpos($name, '.'));

      $ret = $this->limitChars(ucfirst($without_ext), 20, 20);



      return $ret;
   }

   #Get last of / in any String

   function getLastSlash($str) {



      $arr = explode("/", $str);



      return $arr[count($arr) - 1];
   }

   #Convert date YYYY-mm-dd to JAN 12 2012 format

   public function convertDate($format) {



      $temp = strtotime($format);

      echo date('M d Y', $temp);
   }

   #limit chars
   # $ret only works when you need a string without echo..

   public function limitChars($string, $check_len, $upto, $ret = false) {

      $string = ucfirst(strip_tags($string));





      if (strlen($string) > $check_len) {



         $temp = substr($string, 0, $upto);

         $temp.="...";

         if ($ret)
            return $temp;
         else
            echo $temp;
      }

      else {

         if ($ret)
            return $string;
         else
            echo $string;
      }
   }

   #public function mail
   // email user a message

   function sendEmail($email, $subject, $message) {

      $to = $email;

      $from = $this->config['admin_email'];

      $header = "From: $from" . "\r\n";

      // To send HTML mail, the Content-type header must be set

      $header .= 'MIME-Version: 1.0'
              . "\r\n";

      $header .= 'Content-type: text/html; charset=iso-8859-1'
              . "\r\n";



      return mail(trim($to), $subject, $message, $header);
   }

   /// sending email to admin...
   public function contactEmail($email, $subject, $message) {

      $to = $this->config['admin_email'];

      $from = $email;

      $header = "From: $from" . "\r\n";

      // To send HTML mail, the Content-type header must be set

      $header .= 'MIME-Version: 1.0'
              . "\r\n";

      $header .= 'Content-type: text/html; charset=iso-8859-1'
              . "\r\n";



      return mail($to, $subject, $message, $header);
   }

   # forgot password

   public function ForgotPass($email, $user_type) {
      $pass = $this->getRandomString();

      if ($user_type == 'user') {
         $tbl = 'tbl_user';
         $cond = array('user_email' => "$email");
         $data = array('user_pass' => md5($pass));
      } elseif ($user_type == 'admin') {
         $tbl = 'tbl_admin';
         $cond = array('admin_email' => "$email");
         $data = array('admin_password' => md5($pass));
      }

      $res = $this->db->get_row($tbl, $cond);
      if ($res) {
         if ($this->db->update($tbl, $data, $cond)) {
            $msg = "Your New Password is: $pass";
            $from = $this->config['admin_email'];
            $this->s_email($email, "Password Recovery - knownface.com", $msg, $from);
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   /* check username with checkEmail func...
     public function ForgotPass($email)
     {




     if ($this->checkEmail($email) )
     {
     $pass = $this->getRandomString();
     $type = $this->e_type;
     $tbl='tbl_'.$type;
     $field = $type.'_email';
     $cond = array( $field => "$email" );
     $data = array( $type.'_password' => md5( $pass) );
     if ($this->db->update($tbl,$data,$cond) )
     {
     $msg = "Your New Password is: $pass";
     $from = $this->config['admin_email'];
     $this->s_email($email, "Password Recovery - DesiSingers.com",$msg,$from);
     return true;

     }
     else return false;


     } else return false ;


     }
    */


   # check  existence....

   public function verifyExist($tbl, $col_name, $val) {
      $val = strtolower($val);
      $cond = array($col_name => "$val");
      $check_user = $this->db->getCount($tbl, $cond);
      if (!$check_user)
         return false;
      else
         return true;
   }

   //Get ALl Genres



   public function getGen($value = 'yes', $sel = false) {



      $this->db->tail = ' ORDER by g_name ASC';

      $genres = $this->db->get_rows("tbl_gen");

      $html = "";



      foreach ($genres as $gen) {

         $selected = "";



         if ($sel) {



            $selected = ($sel == $gen['g_id']) ? "selected=selected" : "";
         }









         if ($value == 'no') {

            $g_id = $gen['g_name'];
         } else {

            $g_id = $gen['g_id'];
         }

         $html.="<option  $selected  value=$g_id>$gen[g_name] </option>";
      }







      echo $html;
   }

   public function getGenByID($gen_id) {

      $tbl = 'tbl_gen';

      $cond = array('g_id' => $gen_id);

      $data = $this->db->get_row($tbl, $cond, array('g_name'));

      if ($data)
         return $data['g_name'];
   }

   // Get All Countries



   public function getCountryHtml($select = false) {







      $this->db->tail = ' ORDER by c_name ASC';

      $countries = $this->db->get_rows('tbl_country');





      $html = "";



      if ($select) {

         foreach ($countries as $country) {

            if ($select == $country['c_id']) {

               $selected = 'selected="selected"';
            } else {

               $selected = '';
            }

            $html.="<option value='$country[c_id]' $selected >$country[c_name]</option>";
         }
      } else {

         foreach ($countries as $country) {



            $html.="<option value='$country[c_id]'>$country[c_name]</option>";
         }
      }





      echo $html;
   }

   public function checkUsername($username, $chk_type = false) {



      $username = strtolower($username);

      $table = 'tbl_singer';

      $cond = array(' LOWER(singer_username) ' => "$username");



      $check_singer = $this->db->getCount($table, $cond);







      $table = 'tbl_lst';

      $cond = array(' LOWER(lst_username) ' => "$username");



      $check_lst = $this->db->getCount($table, $cond);







      if ($chk_type) {

         if ($check_singer && !$check_lst)
            $this->type = 'singer';

         if ($check_lst && !$check_singer)
            $this->type = 'lst';

         if ($check_lst && $check_singer)
            $this->type = 'both';
      }









      if (!$check_lst && !$check_singer) {

         return false;
      } else {

         return true;
      }
   }

   public function getUser($username) {



      $this->checkUsername($username, 1);

      $ty = $this->type;

      $tbl = 'tbl_' . $ty;

      $username = strtolower($username);

      $c = $ty . '_username';

      $cond = array($c => "$username");

      $data = $this->db->get_row($tbl, $cond);







      $ret = array(
          'name' => $data["{$ty}_full_name"],
          'pic' => $data["{$ty}_pic"],
          'id' => $data["{$ty}_id"]
      );



      return $ret;
   }

   public function CheckSession($return = false, $chk_type = false) {



      $this->initSession();



      if (isset($_SESSION['user_name']) && isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {

         $this->username = $_SESSION['user_name'];

         $this->id = $_SESSION['user_id'];

         $this->type = $_SESSION['user_type'];









         if ($return) {

            $table = "tbl_" . $this->type;

            $cond = array("{$this->type}_id" => $this->id);

            $this->detail = $this->db->get_row($table, $cond);

            $this->pic = $this->detail["{$this->type}_pic"];
         }



         return true;
      } else {

         return false;
      }
   }

   public function alert($type, $msg) {
      //For Notification 
      //Type
      //error , success , warning , information , alert
      echo "<script type='text/javascript'>";
      echo "$(document).ready(function(){
       noty({type:'$type',text: '$msg'});        
      });
      ";
      echo "</script>";
   }

   function go($url, $java = false) {



      if ($java) {

         echo "<script type='text/javascript'> ";

         echo "window.location='" . $url . "'";

         echo "</script> ";
      } else {

         header("Location: $url");
      }
   }

   public function unsetA($arr, $indexes) {

      if (is_array($arr) && $indexes != '') {

         $index_arr = explode(',', $indexes);
         if ($index_arr) {
            foreach ($index_arr as $index) {
               unset($arr[$index]);
            }
         }

         return $arr;
      }
   }

   //Change Date
   #conver 06/27/2013 to June 27 2013

   public function changeDate($d) {

      $str = strtotime($d);

      return date('M d Y', $str);
   }

   // Mini Databse Functions



   function getSingleVal($table, $cond, $val = array()) {


      $data = $this->db->get_row($table, $cond, $val);



      return $data[$val];
   }

   public function getCountry($c_id, $all = false) {

      $table = "tbl_country";

      $cond = array('c_id' => $c_id);





      if ($all) {

         return $this->db->get_row($table, $cond);
      } else {



         $data = $this->db->get_row($table, $cond, array('c_name'));



         return $data['c_name'];
      }
   }

   public function s_email($to, $subject, $msg, $from) {
      $headers = "From: $from" . "\r\n";
      mail($to, $subject, $msg, $headers);
   }

   #get Random String

   public function getRandomString($length = 5) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
   }

   function curPageURL($qstring = false) {


      $pageURL = 'http';
      if (isset($_SERVER['HTTPS'])) {
         if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
         }
      }

      $pageURL .= "://";

      if ($_SERVER["SERVER_PORT"] != "80") {
         $pageURL .= $_SERVER['HTTP_HOST'] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
      } else {
         $pageURL .= $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
      }

      $pageURL = htmlspecialchars($pageURL);

      if ($qstring)
         return $pageURL;
      else
         return strtok($pageURL, '?');
   }

   public function getBaseUrl() {

      $protocol = 'http';
      if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {
         $protocol .= 's';
         $protocol_port = $_SERVER['SERVER_PORT'];
      } else {
         $protocol_port = 80;
      }

      $host = $_SERVER['HTTP_HOST'];
      $port = $_SERVER['SERVER_PORT'];
      $request = $_SERVER['PHP_SELF'];
      return dirname($protocol . '://' . $host . ($port == $protocol_port ? '' : ':' . $port) . $request);
   }

   //--------------------------------- ENDS ------------------------------\\



   public function truncate($string, $length, $ellipsis = true) {
      // Count all the uppercase and other wider-than-normal characters
      $wide = strlen(preg_replace('/[^A-Z0-9_@#%$&]/', '', $string));
      // Reduce the length accordingly
      $length = round($length - $wide * 0.2);
      // Condense all entities to one character
      $clean_string = preg_replace('/&[^;]+;/', '-', $string);
      if (strlen($clean_string) <= $length)
         return $string;
      // Use the difference to determine where to clip the string
      $difference = $length - strlen($clean_string);
      $result = substr($string, 0, $difference);
      if ($result != $string and $ellipsis) {
         $result = $this->add_ellipsis($result);
      }
      return $result;
   }

   function add_ellipsis($string) {
      $string = substr($string, 0, strlen($string) - 3);
      return trim(preg_replace('/ .{1,3}$/', '', $string)) . '...';
   }

   function truncate_lines($string, $line_length, $lines, $ellipsis = true) {
      $result = '';
      $spaces_added = 0;
// Divide up the string into lines
      $next_start=0;
      for ($i = 0; $i < $lines; $i++) {
         if (!$next_start) {
            $start = $i * $line_length;
         } else {
            $start = $next_start;
         }
         $line = substr($string, $start, $line_length + 1);
// Truncate the line by the appropriate length
         $old_line = $line;
         $line = $this->truncate($line, $line_length, false);
         $difference = strlen($old_line) - strlen($line);
         $next_start = (($i + 1) * $line_length) - $difference + 1;
// If there are no line breaks in this line at all
         if (strlen($line) < strlen($string) and !strstr($line, ' ')) {
// Add a space to it, keep track of how many spaces are added
            $line .= ' ';
            $spaces_added ++;
         }
         $result .= $line;
      }
      $result = substr($result, 0, strlen($result) - $spaces_added);
      if ($result != $string and $ellipsis) {
         $result = $this->add_ellipsis($result);
      }
      return $result;
   }

   public function get_options_array($fields, $select = '') {
      //Test Case
      // pending , approved , blocked
      $html = "";

      foreach ($fields as $text => $value) {
         $selected = $value == $select ? 'selected' : '';

         $html.="<option $selected value='$value'>$text</option>";
      }
      return $html;
   }

   public function get_select_c($arr, $sel = false, $name = '', $class = 'class="form-control required"') {

      $tbl = $arr['tbl'];
      $id = $arr['field_id'];
      $text = $arr['field_text'];
      $selected = '';

      $html = "";
      $html.="<select  $class name='$name' id='$id'>";
      $html.="<option value=''>Please Select</option>";


      $rows = $this->db->get_rows($tbl, array(), array($id, $text));

      if ($rows) {
         foreach ($rows as $row) {
            if ($sel) {
               if ($row[$id] == $sel) {
                  $selected = "selected";
               } else
                  $selected = "";
            }
            $html.="<option $selected value='$row[$id]'>$row[$text]</option>";
         }
      } else
         return false;



      $html.="</select>";
      return $html;
   }

   public function show_tab($tab) {

      echo "<script>";
      echo "$(function(){";
      echo "$('#$tab').tab('show')";
      echo "});";
      echo "</script>";
   }

   public function get_script_name() {
      return basename($_SERVER['SCRIPT_NAME']);
   }

   public function check_except() {

      $current = $this->get_script_name();
      return !in_array($current, $this->except);
   }

   public function get_time_diff($created_time)
 {
       
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." years ago";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." year ago";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months)." months ago";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." month ago";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." days ago";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return intval(($time_differnce/$days))." day ago";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return intval(($time_differnce/$hours))." hours ago";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return intval(($time_differnce/$hours))." hour ago";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return intval(($time_differnce/$minutes))." minutes ago";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return intval(($time_differnce/$minutes))." minute ago";
        }else if (intval(($time_differnce)) > 1) 
        {
            return intval(($time_differnce))." seconds ago";
        }else
        {
            return "few seconds ago";
        }
  }
  
  public function getDel($tbl,$col,$val)
  {
      $res  = $this->db->delete($tbl,array($col=>$val)); 
      if($res)
      {
          return true;
      }else
      {
          return false;
      }
  }
  
  public function setViews(){
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
      
     $date= $this->current_date_time();
     $res  = $this->db->insert('tbl_views',array('viewer_ip'=>$ip,'view_date'=>$date)); 
  }
  
   public function getViews(){
    $query="select count(*) as total from tbl_views group by viewer_ip ";
    
  $res= $this->db->ex($query); 
     return $res[0]['total'];
  }
  
  public function getApprovedUsers(){
       
       $query="select count(*) as total from tbl_user where user_status = 'approved'";
         $res= $this->db->ex($query); 
         
     return $res[0]['total'];
       
   }
    public function getPendingUsers(){
       
       $query="select count(*) as total from tbl_user where user_status = 'pending'";
         $res= $this->db->ex($query); 
         
     return $res[0]['total'];
       
   }
    public function getUniqueUsers(){
       
       $query="SELECT count(*) as total FROM `tbl_user` WHERE `user_register_date` > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
         $res= $this->db->ex($query); 
         
     return $res[0]['total'];
       
   }
  
  
  public function getPostDel($post_id)
  {
      $res  = false;
      $rows     = $this->db->get_rows('tbl_post_comment',array('post_id'=>$post_id));
      if(is_array($rows) && count($rows)>0)
      {
         
          
          foreach($rows as $row)
          {
             $res   = $this->getDel('tbl_post_comment', 'comment_id', $row['comment_id']);              
          }
          
          if($res)
          {
              $res  = $this->getDel('tbl_post', 'post_id', $post_id);
          }
          
      }else
      {          
              $res  = $this->getDel('tbl_post', 'post_id', $post_id);
      }
            return $res;
  }
  
  
   
  }//Class Ends
?>