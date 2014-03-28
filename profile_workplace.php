<?php
$work_ =$main->load_model('Work');
if(isset($_POST['btn_work']))
{

   
   
   $work_->update_profile_work($main->unsetA($_POST,'btn_work'),$user['user_id']); 
   $main->show_tab('tab_work');

}
$work = $work_->get_work_data($user['user_id']);


?>
<div class="wrapper_basic">


    <form action="profile.php" method="POST" name="frm_work" id="frm_work">
        <div class="form-group" style="margin-bottom: 5px">
               <p for="company_name" class="col-lg-4 control-label">Company Name:</p>
               <div class="col-lg-8"><input id="" name="company_name" type="text" value="<?=$work['company_name']?>" class="form-control"></div>
               <div class="clear"></div>    
        </div>
            
        <div class="form-group">
               <p for="position" class="col-lg-4 control-label">Position:</p>
               <div class="col-lg-8"><input id="position" name="position" type="text" value="<?=$work['position']?>" class=" form-control"></div>
               <div class="clear"></div>
        </div>
           
        <div class="form-group">
                 <p for="description" class="col-lg-4 control-label">Description:</p>
                 <div class="col-lg-8"><textarea id="description_o" name="description"  type="text" size="" maxlength="100" class=" form-control"><?=$work['description']?></textarea></div>
            <div class="clear"></div>
            </div>
             
            <div class="form-group">
           <p for="Country" class="col-lg-4 control-label">Country:</p>
           <div class="col-lg-8">
                
              <?php 
              $arr = array('tbl'=>'tbl_country','field_id'=>'country_id','field_text'=>'country_name');
              echo $main->get_select_c($arr, $sel = $work['country'], $name = 'country', $class = 'class="form-control required"')
              ?>
              
               </div>
             <div class="clear"></div>  
            </div>
        
             
        
              
       
        
        
        
             
        <div class="form-group" style="margin-bottom: 5px">
               <p for="company_name" class="col-lg-4 control-label">Start Date:</p>
               <div class="col-lg-8"><input  name="start_date" type="text" value="<?=$work['start_date']?>" class="form-control  mydatepicker"></div>
                <div class="clear"></div>    
        </div>
        
       <div style="display:block;height: 15px;"></div>
       
<div class="col-lg-12 form-actions last">
         <div class="submit"><button type="submit" name="btn_work" class="btn btn-primary">Save</button></div>
      </div>
        
           
      </form> 	

</div>

