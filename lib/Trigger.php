<?php


class Trigger extends Main{

    function friend_request($sent_by_user_id,$sent_to_user_id)
    {
        $data="";
        $data['log_time']=$this->current_date_time();
        $data['noti_by_user_id']=$sent_by_user_id;
        $data['noti_to_user_id']=$sent_to_user_id;
        $data['log_type']="friend_request_sent";
        
        $this->db->insert('tbl_log',$data);
        
    }
    function remove_friend_request_log($self_id,$requesterd_user_id)
    {
        
        $data5="";
        $data5['noti_to_user_id']=$self_id;
        $data5['noti_by_user_id']=$requesterd_user_id;
        $data5['log_type']="friend_request_sent";
        $this->db->delete('tbl_log',$data5);
    }
   
     function notification_log($noti_by_user_id,$noti_to_user_id)
    {
        $data1="";
        $data1['log_time']=$this->current_date_time();
        $data1['noti_by_user_id']=$noti_by_user_id;
        $data1['noti_to_user_id']=$noti_to_user_id;
        $data1['log_type']="noti";
       $this->db->insert('tbl_log',$data1);
    }
    
    function remove_noti($noti_to_user_id)
    {
        
        $data3="";
        $data3['noti_to_user_id']=$noti_to_user_id;
        $data3['log_type']="noti";
        $this->db->delete('tbl_log',$data3);
    }
    
    function message_log($send_by_user_id,$send_to_user_id)
    {
        
        $data2="";
        $data2['log_time']=$this->current_date_time();
        $data2['noti_by_user_id']=$send_by_user_id;
        $data2['noti_to_user_id']=$send_to_user_id;
        $data2['log_type']="message";
        $this->db->insert('tbl_log',$data2);
    }
    
     function remove_message_log($noti_to_user_id)
    {
        
        $data4="";
        $data4['noti_to_user_id']=$noti_to_user_id;
        $data4['log_type']="message";
        $this->db->delete('tbl_log',$data4);
    }
     
    
}// end of class
?>