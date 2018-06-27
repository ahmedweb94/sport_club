<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'contactus/add_edit'?>" method="post">
  <div class="box-body">
  
          
					<div class="col-md-12">
						  <div class="form-group col-md-6">
						    <label for=""><b>اسم الراسل<b/></label>
</div>
<div class="form-group col-md-6">
<input type="text" name="contactus_name" value="<?php echo isset($userData->contactus_name)?$userData->contactus_name:'';?>" class="form-control" disabled>
						  </div>
						</div>





<div class="col-md-12">	
						<div class="form-group col-md-6">
						    <label for=""><b>بريد الراسل</b></label>
</div>
<div class="form-group col-md-6">
<input type="text" name="contactus_email" value="<?php echo isset($userData->contactus_email)?$userData->contactus_email:'';?>" class="form-control" disabled>
						  </div>
						</div>

<div class="col-md-12">	
						<div class="form-group col-md-6">
						    <label for=""><b>هاتف الراسل</b></label>
</div>
<div class="form-group col-md-6">
<input type="text" name="contactus_phone" value="<?php echo isset($userData->contactus_phone)?$userData->contactus_phone:'';?>" class="form-control" disabled>
						  </div>
						</div>







					<div class="col-md-12">
						  <div class="form-group col-md-3">
						    <label for=""><b>محتوى الرسالة<b/></label>
</div>
<div class="form-group col-md-9">
<textarea class="form-control ckeditor" rows="13" id="html" name="contactus_dess" disabled> <?php echo isset($userData->contactus_dess)?$userData->contactus_dess:'';?></textarea>


						  </div>
						</div>




				
          
          
                        
        </div>
        <?php if(!empty($userData->contactus_id)){?>
        <input type="hidden"  name="id" value="<?php echo isset($userData->contactus_id)?$userData->contactus_id:'';?>">
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">تعديل</button>
        </div>
              <!-- /.box-body -->
        <?php }else{?>
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="submit" value="add" class="btn btn-success wdt-bg">اضافة</button>
        </div>
        <?php }?>
      </form>
