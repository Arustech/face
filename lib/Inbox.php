<?php
/// version 1.0
/// last updated 22-13-2014

class Inbox extends Main{

public $error;


# ************* Get All Messages******************
	
	public function getAllmsgList($msg_send_to){
            
            $sql = "SELECT
    *
FROM
    tbl_msgs
    JOIN(
            SELECT
                MAX(msg_send_date) AS maxCreated,
                msg_send_by
            FROM
                tbl_msgs
            GROUP BY
                msg_send_by
        ) AS Latest
    ON tbl_msgs.msg_send_date=Latest.maxCreated
    AND tbl_msgs.msg_send_by=Latest.msg_send_by WHERE msg_send_to = '$msg_send_to'";

//	$arr	= $this->db->get_rows('tbl_msgs',array('msg_send_to'=>$msg_send_to));
	$arr = $this->db->ex($sql);
	 
            return $arr ;
	
	}
        
//        public function getAllMsg($msg_send_to,$msg_send_by){
//
////            $con[] = array('msg_send_to'=>$msg_send_to);
//            $con[] = array('msg_send_to'=>$msg_send_to,'msg_send_by'=>$msg_send_by);
//           
//	$arr	= $this->db->get_rows('tbl_msgs',array('$con'));
//	
//            return $arr ;
//	
//	}
        public function getAllMsg($msg_send_to,$msg_send_by){
            
            
//             $sql = "SELECT * FROM tbl_msgs WHERE msg_send_by = '$msg_send_by' AND msg_send_to = '$msg_send_to' ORDER BY msg_send_date ASC;";
            
//            $sql = "SELECT * 
//                    FROM tbl_msgs 
//   
//                    WHERE msg_send_by = $msg_send_to 
//                    OR (msg_send_to = $msg_send_to AND msg_send_by = $msg_send_by) 
//                    ORDER BY msg_send_date ASC";
            $sql = "SELECT * 

                    FROM tbl_msgs 

                    WHERE (msg_send_by =  $msg_send_by) AND (msg_send_to = $msg_send_to) OR (msg_send_by =  $msg_send_to) AND (msg_send_to = $msg_send_by)
                    
                    ORDER BY msg_send_date ASC LIMIT 10";
            
          $arr = $this->db->ex($sql);


	
            return $arr ;
	
	}
        
        public function getUserName($user_id){

	$arr	= $this->db->get_row('tbl_user',array('user_id'=>$user_id));
	 
        if ($arr)
        {
         
               return $arr['user_name'];
           
	}
        else{return FALSE ;}
        }
	
               public function sendMsg($sdr, $res, $msg){

            
             $sql = "INSERT INTO `tbl_msgs` (msg_send_by,msg_send_to,msg_data,msg_send_date)VALUES ('$sdr','$res','$msg',NOW());";
             
          $arr = $this->db->ex($sql);

            if($arr)
                
                {
                
                return TRUE;
                }
                else{
                    
                    return FALSE;
                }
	
            
        }
        
        
                       public function Set_read_flag($msg_id){

             
             $sql = "UPDATE `tbl_msgs` SET msg_is_read='1' WHERE msg_id='$msg_id'";
             
          $arr = $this->db->ex($sql);

            if($arr)
                
                {
                
                return TRUE;
                }
                else{
                    
                    return FALSE;
                }
	
            
        }
        
        
                public function getlatestMsg($msg_send_to,$msg_send_by){
            
            
             $sql = "SELECT * FROM tbl_msgs WHERE msg_send_by = '$msg_send_by' AND msg_send_to = '$msg_send_to' AND msg_is_read='0'";
      
          $arr = $this->db->ex($sql);


	
            return $arr ;
	
	}
	
	
	
}// end of class
?>