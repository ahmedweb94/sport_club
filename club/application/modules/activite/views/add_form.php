<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'activite/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">اسم النشاط</label>
        </div>
        <div class="form-group col-md-6">

          <input type="text" name="activite_title" value="<?php echo isset($userData->activite_title)?$userData->activite_title:'';?>" class="form-control" placeholder="اسم النشاط">
        </div>
      </div>
      <div class="col-md-12">			

        <div class="col-md-3 form-group">
          
          <label for="">الوصف</label>
        </div>
        <div class="form-group col-md-9">   
          <textarea class="form-control ckeditor" id="html"  name="activite_description" >
            <?php echo isset($userData->activite_description)?$userData->activite_description:'';?>
          </textarea>

        </div>
      </div>
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">تاريخ النشاط</label>
        </div>
        <div class="form-group col-md-6">

          <input type="date" name="activite_date" value="<?php echo isset($userData->activite_date)?$userData->activite_date:'';?>" class="form-control" placeholder="تاريخ النشاط">
        </div>
      </div>
      
      
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile">الصوره</label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->activite_images) && file_exists('assets/images/'.$userData->activite_images)){ 
              $activite_images = $userData->activite_images;
            }else{ 
              $activite_images = 'user.png'; 
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($activite_images)?$activite_images:'user.png';?>" alt="User profile picture"></left>
          </div> <input type="file" name="profile_pic" id="exampleInputFile">
        </div>
      </div>                
      
      <?php if(!empty($userData->activite_id)){?>
        <input type="hidden"  name="activite_id" value="<?php echo isset($userData->activite_id)?$userData->activite_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->activite_images)?$userData->activite_images:'';?>">
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
    <script>
     var tt = $('textarea.ckeditor').ckeditor();
     CKEDITOR.config.allowedContent = true;
     
     
   </script>
