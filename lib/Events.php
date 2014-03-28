<?php

/// version 1.0

class Events Extends Main {
   # ************* Member Personal Info Methods Here******************

   publiC function addEvent( $data) {

      $result = false;
      if ($data) {
         $tbl = 'tbl_events';
        $unset = 'event_id,submit';
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

   publiC function UpdateEventsData($data) {

      $result = false;
      $cond = "";
      if ($data) {
         $tbl = 'tbl_events';
         $unset = 'event_id,update';
         $cond = array('event_id' => $data['event_id']);
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




   #--------------------------------------------- Events Module Methods Here

   public function getEvents() {
     $arr = $this->db->get_rows('tbl_events');
      //echo $this->db->sql;exit;
      if (is_array($arr))
         return $arr;
   }

// end of getEvents

  
   
     public function getFriendsEvents($user_id) {

      
      $current_Date = $this->currentDate();
      
      $html='<div id="testimonials"><ul>';
       // checking for birthday events using getBirthdayEvent
      $html.= $this->getBirthdayEvent($user_id);      
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

         


         foreach ($rows as $row)  {

            if ($row['birthday'] == $this->currentDate()) {
               // echo "Herer";exit;
               $html.='<li><img style="float: left; position:relative; top:5px ; margin-right: 5px;" src="img/cake.png"><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a> has birthday today. Celebrate with <p class="author"><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a></p></blockquote></li>';
            }

//                        $html.='<p class="events"> '.$row['first_name'].' '.$row['last_name'].'Ut eu consectetur nisi. Praesent facilisis diam nec sapien gravida non mattis justo imperdiet. Vestibulum nisl urna, euismod sit amet congue at, bibendum non risus.</p>';  
            $html.='<li><img style="float: left; position:relative; top:20px ; margin-right: 5px;" src="img/eventsicon.png"> <blockquote class="event_msg">Your friend <b><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a></b> has ' . $row['event_name'] . ' today.<p class="author">Wish <a  href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a></p></blockquote></li>';
         }


       
      }  
      $html.='</ul></div>';
      return $html;
   } // end of getFriendsEvents

   
   
   
   /// calling this func in getFriendsEvents
   public function getBirthdayEvent($user_id){
     $html = "";
      $current_Date = $this->currentDate();

      $query = "SELECT 
                    * 
                  FROM
                    tbl_profile_basic,
                    tbl_friend 
                  WHERE tbl_profile_basic.`user_id` = `tbl_friend`.`user_friend_id` 
                    AND tbl_profile_basic.`birthday` = '$current_Date' 
                    AND tbl_friend.`user_id` = '$user_id'";

  
      $rows = $this->db->ex($query);



      if (is_array($rows) && !empty($rows)) {

          foreach ($rows as $row) {
               // echo "Herer";exit;
               $html.='<li><blockquote><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a> has birthday today. Celebrate with <p class="author"><a href="#">"' . $row['first_name'] . ' ' . $row['last_name'] . '"</a></p></blockquote></li>';

            }
    }
      return $html;      
   }// end of getBirthdayEvent
   
   

   
}



// end of class




?>