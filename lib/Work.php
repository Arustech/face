<?php

/// version 1.0

class Work Extends Member {

   private $tbl = 'tbl_profile_work';
   private $p_key = 'work_id';

   # ************* Member Personal Info Methods Here******************

   public function getWorkInfo($user_id) {

      $arr = $this->db->get_row($this->tbl, array('user_id' => $user_id));
      if (is_array($arr))
         return $arr;
   }

   public function update_profile_work($data, $user_id) {

      if ($this->db->update($this->tbl, $data, array('user_id' => $user_id)))
         $this->alert('success', 'Your work profile has been updated');
      else
         $this->alert('warning', 'No changes');
   }
   
   public function get_profile_edu($user_id)
   {
      return $this->db->get_row('tbl_profile_education',array('user_id'=>$user_id));
   }

   public function update_profile_edu($data,$user_id)
   {
      $data['last_updated']=$this->currentDate();
      if ($this->db->update('tbl_profile_education',$data,array('user_id'=>$user_id)) )
              $this->alert ('success', 'Your Education profile is updated');
      else 
            $this->alert ('warning', 'No changes');
   }
   
   public function update_profile_personal($data,$user_id)
   {
      $data['last_updated']=$this->currentDate();
      if ($this->db->update('tbl_profile_personal',$data,array('user_id'=>$user_id)) )
              $this->alert ('success', 'Your Personal profile is updated');
      else 
            $this->alert ('warning', 'No changes');
   }
    
   public function get_work_data($user_id) {
      return $this->db->get_row($this->tbl, array('user_id' => $user_id));
   }
   
   public function get_personal_data($user_id) {
      return $this->db->get_row('tbl_profile_personal', array('user_id' => $user_id));
   }

   publiC function addMemberWorkInfo($data) {

      $result = false;


      $fields = $this->unsetA($data, 'work_update,user_id,work_id');
     // $fields['last_updated'] = date('Y-m-d');

      $cond = array($this->p_key => $data['work_id']);
      $control = $this->db->update($this->tbl, $fields, $cond);
    
    


      #insertion/updation process starts from Here....
      if ($control) {
         $result = true;
      }

      return $result;
   }
   
  
   

   /*    * **** End of Personal info */
}

// end of class
?>