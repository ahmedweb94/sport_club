<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'party/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">اسم الحفله</label>
        </div>
        <div class="form-group col-md-6">

          <input type="text" name="party_title" value="<?php echo isset($userData->party_title)?$userData->party_title:'';?>" class="form-control" placeholder="اسم الحفله">
        </div>
      </div>
      <div class="col-md-12">			

        <div class="col-md-3 form-group">
          
          <label for="">الوصف</label>
        </div>
        <div class="form-group col-md-9">   
          <textarea class="form-control ckeditor" id="html"  name="party_description" >
            <?php echo isset($userData->party_description)?$userData->party_description:'';?>
          </textarea>

        </div>
      </div>
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">تاريخ الحفله</label>
        </div>
        <div class="form-group col-md-6">

          <input type="date" name="party_date" value="<?php echo isset($userData->party_date)?$userData->party_date:'';?>" class="form-control" placeholder="تاريخ الحفله">
        </div>
      </div>
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile">الصوره</label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->party_images) && file_exists('assets/images/'.$userData->party_images)){ 
              $party_images = $userData->party_images;
            }else{ 
              $party_images = 'user.png'; 
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($party_images)?$party_images:'user.png';?>" alt="User profile picture"></left>
          </div> <input type="file" name="profile_pic" id="exampleInputFile">
        </div>
      </div>                
      
      <?php if(!empty($userData->party_id)){?>
        <input type="hidden"  name="party_id" value="<?php echo isset($userData->party_id)?$userData->party_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->party_images)?$userData->party_images:'';?>">
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
