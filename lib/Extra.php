<?php

/// version 1.0

class Extra Extends Main {
   # ************* Member Personal Info Methods Here******************

   public function getExtraInfo($type, $id = false) {

      if ($type == 'admin') {
         $tbl = 'tbl_hobbies';
         $key = 'hobby_id';
      } elseif ($type == 'user') {
         $tbl = 'tbl_user_hobbies';
         $key = 'user_id';
      } elseif ($type == 'album') {
         $tbl = 'tbl_album';
         $key = 'user_id';
      } elseif ($type == 'album_detail') {
         $tbl = 'tbl_album';
         $key = 'album_id';
      }
      $cond = ($id) ? array($key => $id) : "";

      $arr = $this->db->get_rows($tbl, $cond);
      //echo $this->db->sql;exit;
      if (is_array($arr))
         return $arr;
   }

   publiC function addExtraData($type, $data) {

      $result = false;
      if ($type == 'hobbies') {
         $tbl = 'tbl_hobbies';
         $unset = 'hobby_id,submit';
      } elseif ($type == 'user_hobbies') {
         $tbl = 'tbl_user_hobbies';
         $unset = 'user_hobby_id,submit';
      } elseif ($type == 'album') {
         $tbl = 'tbl_album';
         $unset = 'album_id,submit';
         $data['created'] = date('Y-m-d');
      } elseif ($type == 'country') {
         $tbl = 'tbl_country';
         $unset = 'country_id,submit';
      }



      $fields = $this->unsetA($data, $unset);

      $control = $this->db->insert($tbl, $fields);
      //echo $this->db->sql;exit;
      #insertion process starts from Here....
      if ($control) {
         $result = true;
      }

      return $result;
   }

   /*    * **** End of addExtraData */

   publiC function UpdateExtraData($type, $data) {

      $result = false;
      $cond = "";
      if ($type == 'hobbies') {
         $tbl = 'tbl_hobbies';
         $unset = 'hobby_id,update';
         $cond = array('hobby_id' => $data['hobby_id']);
      } elseif ($type == 'user_hobbies') {
         $tbl = 'tbl_user_hobbies';
         $unset = 'user_hobby_id,update';
         $cond = array('user_hobby_id' => $data['user_hobby_id']);
      } elseif ($type == 'album') {
         $tbl = 'tbl_album';
         $unset = 'album_id,update';
         $cond = array('album_id' => $data['album_id']);
      } elseif ($type == 'country') {
         $tbl = 'tbl_country';
         $unset = 'country_id,update';
         $cond = array('country_id' => $data['country_id']);
      }




      $fields = $this->unsetA($data, $unset);

      $control = $this->db->update($tbl, $fields, $cond);

      #insertion process starts from Here....
      if ($control) {
         $result = true;
      }

      return $result;
   }

   /*    * **** End of UpdateExtraData */

   # get hobbies html

   public function getHobbyHtml($hobby_id = false) {
      $arr = $this->db->get_rows('tbl_hobbies');

      $html = '';
      if (is_array($arr)) {
         foreach ($arr as $ar) {
            $selected = "";
            if ($hobby_id) {
               if ($hobby_id == $ar['hobby_id'])
                  $selected = "selected";
            }
            $html.="<option $selected value='" . $ar['hobby_id'] . "' >" . $ar['hobby_name'] . "</option>";
         }
      }
      return $html;
   }

   /*    * **** End of getHobbyHtml func */


   #--------------------------------------------- Country Module Methods Here

   public function getCountries($country_id = false) {

      $cond = ($country_id) ? array('country_id' => $id) : "";

      $arr = $this->db->get_rows('tbl_country', $cond);
      //echo $this->db->sql;exit;
      if (is_array($arr))
         return $arr;
   }

// end of getCountries

   public function add_hobbies($hobbies, $user) {

      if ($hobbies) {
         $arr_hobbies = explode(',', $hobbies);
         if (is_array($arr_hobbies)) {
            $this->db->delete('tbl_user_hobbies', array('user_id' => $user));
            foreach ($arr_hobbies as $hobby) {
               $this->db->insert('tbl_user_hobbies', array('hobby_id' => $hobby, 'user_id' => $user));
            }
         }
         $this->alert('success', "Your Hobbies updated with success");
      }
   }

   public function get_hobbies($user_id) {
      $ret_hobbies = array();
      $sql = "SELECT   rel.`hobby_id`, main.`hobby_name` 
       FROM
         tbl_user_hobbies AS rel 
         LEFT JOIN tbl_hobbies AS main 
         ON rel.hobby_id = main.hobby_id 
         WHERE rel.`user_id` = $user_id";
      $rows = $this->db->ex($sql);


      foreach ($rows as $row) {
         
         $ret_hobbies[] = array('text' => $row['hobby_name'],'value'=>$row['hobby_id']);
      }
      
      
      return json_encode($ret_hobbies);
   }

}

// end of class
?>