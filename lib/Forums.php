<?php

class Forums extends Main{

    public function get_all_forum_cats(){
        
        $res=  $this->db->get_rows('tbl_forum_topics',array('topic_parent'=>0));
        return $res;
        
    }
    
     public function get_all_forum_topics(){ //cat and topics
        
        $res=  $this->db->get_rows('tbl_forum_topics');
        return $res;
        
    }
     
    
    public function get_forum_topics($id){
        $query="select * from tbl_forum_topics where topic_parent = $id";
        $res=  $this->db->ex($query);
       return $res;
        
    }
    
      public function get_threads_detals($id){
        $query="select * from tbl_threads_comments where thread_id= $id";
        $res=  $this->db->ex($query);
       return $res;
        
    }
    
     public function get_no_of_topics($id){
        $query="select count(*) as total from tbl_forum_topics where topic_parent = $id";
        $res=  $this->db->ex($query);
      
        return $res[0]['total'];
        
    }
    
    public function add_forum_cat($data){
        $date=$this->current_date_time();
        return $this->db->insert('tbl_forum_topics',array('topic_name'=>$data['cat'],'topic_parent'=>0,'topic_created_date'=>$date));
        
    }
    
    public function add_forum_topic($data){
        $date=$this->current_date_time();
       return $this->db->insert('tbl_forum_topics',array('topic_name'=>$data['cat'],'topic_parent'=>$data['parent'],'topic_created_date'=>$date));
        
    }
    

    
    
     public function update_cat($data){
        
       return $this->db->update('tbl_forum_topics',array('topic_name'=>$data['cat']),array('topic_id'=>$data['id']));
        
    }
    
    
      public function get_cat_info($id){
        
       return $this->db->get_row('tbl_forum_topics',array('topic_id'=>$id));
        
    }
    
    public function save_new_thread($data){
       
          unset($data['save_new_thread']);
          $data['thread_date']=  $this->current_date_time();
          $data['thread_by']=($_SESSION['kfc_user_id']);
          $data['thread_data']=strip_tags($data['thread_data']);
          $data['thread_data']=trim($data['thread_data']);
          
          $res= $this->db->insert('tbl_forum_threads',$data);
          return $this->db->last_id;
        
        
    }
    
    
    
    
      public function get_threads($id,$cid){
        
       return $this->db->get_rows('tbl_forum_threads',array('topic_id'=>$cid));
        
    }
    
      public function get_threads_comments($id){
        
       return $this->db->get_rows('tbl_threads_comments',array('thread_id'=>$id));
        
    }
    
       public function save_thread_comments($thread_id,$user_id,$comment){
        $date=$this->current_date_time();
        $comment1=  strip_tags($comment);
        $comment1=  trim($comment1);
       return $this->db->insert('tbl_threads_comments',array('thread_id'=>$thread_id,'comment_by_user_id'=>$user_id,'comment_data'=>$comment1,'comment_date_time'=>$date));
        
    }
    
       public function get_threads_detail($id){
        
       return $this->db->get_row('tbl_forum_threads',array('thread_id'=>$id));
        
    }
//   get all threads bt a user  
         public function get_all_threads($id){
        
       return $this->db->get_rows('tbl_forum_threads',array('thread_by'=>$id));
        
    }
    
 //get all threads based on topic   
      public function get_all_thread($id){
        
       return $this->db->get_rows('tbl_forum_threads',array('topic_id'=>$id));
        
    }
    
    
    // get last thread by user
        public function get_last_thread($id){
          $query="SELECT * FROM tbl_forum_threads WHERE topic_id = $id ORDER BY thread_date DESC LIMIT 1";
       $res=$this->db->ex($query);
       return $res;
        
    }
    
    
       // get all comments(posts) of the threads
        public function get_all_posts($id){
          $query="SELECT * FROM tbl_threads_comments WHERE thread_id = $id ";
       $res=$this->db->ex($query);
       return $res;
        
    }
  
     
       // get complete data of all type of threads
        public function get_all_type_threads(){
          $query="SELECT * FROM tbl_forum_threads  ";
       $res=$this->db->ex($query);
       return $res;
        
    }
    
    // get complete data of all threads comments
        public function get_all_type_comments(){
          $query="SELECT * FROM tbl_threads_comments  ";
       $res=$this->db->ex($query);
       return $res;
        
    }
    
    // get recently uploaded thread
        public function get_recent_threads(){
          $query="SELECT * FROM tbl_forum_threads WHERE thread_date >= NOW() - INTERVAL 1 DAY;";
       $res=$this->db->ex($query);
       return $res;
        
    }
    
     // get my thread
        public function get_my_threads(){
           $user_id=$_SESSION['kfc_user_id'];
          $query="SELECT * FROM tbl_forum_threads WHERE thread_by = $user_id";
       $res=$this->db->ex($query);
       return $res;
        
    }
    
    
     // update comments
        public function update_thread_comments($comment_id,$comment_data){
          
       $res=$this->db->update('tbl_threads_comments',array('comment_data'=>$comment_data),array('comment_id'=>$comment_id));
       return $res;
        
    }
    
    // update comments
        public function update_thread($thread_id,$thread_data){
           
       $res=$this->db->update('tbl_forum_threads',array('thread_data'=>$thread_data),array('thread_id'=>$thread_id));
       return $res;
        
    }
    
      // delete comments
        public function delete_thread_comment($comment_id){
           
       $res=$this->db->delete('tbl_threads_comments',array('comment_id'=>$comment_id));
       return $res;
        
    }
 
     
      // delete thread
        public function delete_thread($thread_id){
           $this->db->delete('tbl_threads_comments',array('thread_id'=>$thread_id));
           $res=$this->db->delete('tbl_forum_threads',array('thread_id'=>$thread_id));
           return $res;
        
    }
    
    
    
     // delete topic
        public function delete_topic($topic_id){
            
            $res= $this->db->get_rows('tbl_forum_threads',array('topic_id'=>$topic_id));
       
        if($res){
            foreach ($res as $re){
               
                $this->delete_thread($re['thread_id']);
                
            }
          
            
         } 
          $res2=  $this->db->delete('tbl_forum_topics',array('topic_id'=>$topic_id));
          
           return $res2;
        
    }
    
        
    public function delete_cat($id){
        
       $res= $this->db->get_rows('tbl_forum_topics',array('topic_parent'=>$id));
       
        if($res){
            foreach ($res as $re){
                $this->delete_topic($re['topic_id']);
                
            }
         }
         $res2= $this->db->delete('tbl_forum_topics',array('topic_id'=>$id)); 
         return $res2;
        
          
      
    }
}