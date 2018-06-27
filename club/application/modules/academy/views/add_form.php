<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'academy/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">			
        <div class="col-md-6 form-group">
          <label for="">اسم الاكاديميه</label>
        </div>
        <div class="form-group col-md-6">
          <input type="text" name="academy_title" value="<?php echo isset($userData->academy_title)?$userData->academy_title:'';?>" class="form-control" placeholder="اسم الاكاديميه">
        </div>
      </div>
      <div class="col-md-12">			
        <div class="col-md-3 form-group">
          <label for="">مميزات الاكاديميه</label>
        </div>
        <div class="form-group col-md-9">   
          <textarea class="form-control ckeditor" id="html"  name="academy_pros" >
            <?php echo isset($userData->academy_pros)?$userData->academy_pros:'';?>
          </textarea>
        </div>
      </div>
      <div class="col-md-12">			
        <div class="col-md-6 form-group">
          <label for="">قيمه الاشتراك شهريا</label>
        </div>
        <div class="form-group col-md-3">
          <input type="number" name="academy_price_m" value="<?php echo isset($userData->academy_price_m)?$userData->academy_price_m:'';?>" class="form-control" placeholder="قيمه الاشتراك">
        </div>
      </div>
      <div class="col-md-12">			
        <div class="col-md-6 form-group">
          <label for="">قيمه الاشتراك سنويا</label>
        </div>
        <div class="form-group col-md-3">
          <input type="number" name="academy_price_y" value="<?php echo isset($userData->academy_price_y)?$userData->academy_price_y:'';?>" class="form-control" placeholder="قيمه الاشتراك">
        </div>
      </div>
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile">الصوره</label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->academy_images) && file_exists('assets/images/'.$userData->academy_images)){ 
              $academy_images = $userData->academy_images;
            }else{ 
              $academy_images = 'user.png'; 
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>assets/images/<?php echo isset($academy_images)?$academy_images:'user.png';?>" alt="User profile picture"></left>
          </div> <input type="file" name="profile_pic" id="exampleInputFile">
        </div>
      </div>                
      <?php if(!empty($userData->academy_id)){?>
        <input type="hidden"  name="academy_id" value="<?php echo isset($userData->academy_id)?$userData->academy_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->academy_images)?$userData->academy_images:'';?>">
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
