<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'achive/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">عنوان الانجاز</label>
        </div>
        <div class="form-group col-md-6">

          <input type="text" name="achive_title" value="<?php echo isset($userData->achive_title)?$userData->achive_title:'';?>" class="form-control" placeholder="عنوان الانجاز">
        </div>
      </div>
      <div class="col-md-12">			

        <div class="col-md-3 form-group">
          
          <label for="">الانجاز</label>
        </div>
        <div class="form-group col-md-9">   
          <textarea class="form-control ckeditor" id="html"  name="achive_description" >
            <?php echo isset($userData->achive_description)?$userData->achive_description:'';?>
          </textarea>

        </div>
      </div>
      
      
      
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile">الصوره</label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->achive_images) && file_exists('assets/images/'.$userData->achive_images)){ 
              $achive_images = $userData->achive_images;
            }else{ 
              $achive_images = 'user.png'; 
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($achive_images)?$achive_images:'user.png';?>" alt="User profile picture"></left>
          </div> <input type="file" name="profile_pic" id="exampleInputFile">
        </div>
      </div>                
      
      <?php if(!empty($userData->achive_id)){?>
        <input type="hidden"  name="achive_id" value="<?php echo isset($userData->achive_id)?$userData->achive_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->achive_images)?$userData->achive_images:'';?>">
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
