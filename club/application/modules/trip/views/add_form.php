<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'trip/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">اسم الرحله</label>
        </div>
        <div class="form-group col-md-6">

          <input type="text" name="trip_title" value="<?php echo isset($userData->trip_title)?$userData->trip_title:'';?>" class="form-control" placeholder="اسم الرحله">
        </div>
      </div>
      <div class="col-md-12">			

        <div class="col-md-3 form-group">
          
          <label for="">البرنامج</label>
        </div>
        <div class="form-group col-md-9">   
          <textarea class="form-control ckeditor" id="html"  name="trip_description" >
            <?php echo isset($userData->trip_description)?$userData->trip_description:'';?>
          </textarea>

        </div>
      </div>
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">تاريخ الرجله</label>
        </div>
        <div class="form-group col-md-6">

          <input type="date" name="trip_date" value="<?php echo isset($userData->trip_date)?$userData->trip_date:'';?>" class="form-control" placeholder="تاريخ الرحله">
        </div>
      </div>         
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile">الصوره</label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->trip_images) && file_exists('assets/images/'.$userData->trip_images)){ 
              $trip_images = $userData->trip_images;
            }else{ 
              $trip_images = 'user.png'; 
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($trip_images)?$trip_images:'user.png';?>" alt="User profile picture"></left>
          </div> <input type="file" name="profile_pic" id="exampleInputFile">
        </div>
      </div>                
      
      <?php if(!empty($userData->trip_id)){?>
        <input type="hidden"  name="trip_id" value="<?php echo isset($userData->trip_id)?$userData->trip_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->trip_images)?$userData->trip_images:'';?>">
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
