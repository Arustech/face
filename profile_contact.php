<?php
$contact_ = $main->load_model('ContactProfile');
if(isset($_POST['btn_contact']))
{
   $contact_->update_contact($main->unsetA($_POST,'btn_contact'),$user['user_id']); 
   $main->show_tab('tab_contact');
}
$contact = $contact_->get_contact($user['user_id']);
?>

<div class="wrapper_basic">


    <form action="profile" method="POST" name="frm_contact" id="frm_contact">
       
       
<!--        <div class="form-group">
               <p for="" class="col-lg-4 control-label">Phone:</p>
               <div class="col-lg-8"><input id="" name="land_line" type="text"  value="<?=$contact['land_line']?>" class=" form-control required"></div>
               <div class="clear"></div>
        </div>
       
        <div class="form-group" style="margin-bottom: 5px">
               <p for="mobile" class="col-lg-4 control-label">Mobile:</p>
               <div class="col-lg-8"><input id="" name="mobile" type="text"  value="<?=$contact['mobile']?>" class="form-control required"></div>
               <div class="clear"></div>    
        </div>
            
       
           
        <div class="form-group">
           <p for="address" class="col-lg-4 control-label">Address</p>
                 <div class="col-lg-8"><input id="address" name="address" value="<?=$contact['address']?>" type="text"  class="form-control required"></div>
            <div class="clear"></div>
        </div>-->
        
        <div class="form-group">
           <p for="city" class="col-lg-4 control-label">City:</p>
                 <div class="col-lg-8"><input id="city" name="city" value="<?=$contact['city']?>" type="text"  class="form-control required"></div>
            <div class="clear"></div>
        </div>                

        
        <div class="form-group">
           <p for="state" class="col-lg-4 control-label">State / Province:</p>
                 <div class="col-lg-8"><input id="state_province" name="state_province" value="<?=$contact['state_province']?>" type="text"  class="form-control required"></div>
            <div class="clear"></div>
        </div>        
             
        <div class="form-group">
           <p for="country" class="col-lg-4 control-label">Country :</p>
                 <div class="col-lg-8">
                      
              <?php 
              $arr = array('tbl'=>'tbl_country','field_id'=>'country_id','field_text'=>'country_name');
              echo $main->get_select_c($arr, $sel = $contact['country_id'], $name = 'country_id', $class = 'class="form-control required"')
              ?>
                    
            <div class="clear"></div>
        </div>        
        </div>
        
        <div class="form-group">
           <p for="zip" class="col-lg-4 control-label">Zip Code:</p>
                 <div class="col-lg-8"><input id="zip_code" value="<?=$contact['zip_code']?>" name="zip_code" type="text" class="form-control required"></div>
            <div class="clear"></div>
        </div>  
        
                <div class="form-group">
           <p for="website" class="col-lg-4 control-label">Website:</p>
                 <div class="col-lg-8"><input id="website" value="<?=$contact['website']?>" name="website" type="text" size="" maxlength="100" class=" form-control required"></div>
            <div class="clear"></div>
        </div>
            
        
         <div style="display:block;height: 15px;"></div>
        
           <div class="col-lg-12">
               <div class="submit"><button type="submit" name="btn_contact" class="btn btn-primary">Submit</button></div>
       	      </div>
          </form>

     
</div>




