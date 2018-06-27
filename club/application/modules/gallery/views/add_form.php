
<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'gallery/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group col-md-6">
          <label for=""><b>عنوان الالبوم<b/></label>
          </div>
          <div class="form-group col-md-6">
            <input type="text" name="gallery_title" value="<?php echo isset($userData->gallery_title)?$userData->gallery_title:'';?>" class="form-control" placeholder="عنوان الالبوم">
          </div>
        </div>



        <div class="col-md-12">
          <div class="form-group col-md-3">
            <label for=""><b>وصف الالبوم<b/></label>
            </div>
            <div class="form-group col-md-9">
              <textarea class="form-control ckeditor" id="html" name="gallery_description" placeholder="وصف الالبوم" ><?php echo isset($userData->gallery_description)?$userData->gallery_description:'';?></textarea>


            </div>
          </div>
          

          <div class="col-md-12"> 
            <div class="form-group imsize">
              <label for="exampleInputFile"><b>صور الالبوم</b></label>
              <?php if($view=="1"){
                echo '</br><div class="photo">';
                $images=unserialize($userData->gallery_images);
                
                echo '<ul class="topic">

                <li class="active">
                <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul>';
                
                foreach ($images as $value) 

                  echo '	<li><a href="'.base_url().'assets/images/'.$value.'"><img src="'.base_url().'assets/images/'.$value.'"/></a></li>';

                
                echo '	</ul>
                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                </li>
                
                </li>
                </ul>
                </div>';

              }else{


                ?>
                <div class="pic_size" id="image-holder"> 
                  <?php if(isset($userData->gallery_images) && file_exists('assets/images/'.$userData->gallery_images)){
                    $gallery_images = $userData->gallery_images;
                  }else{ 
                    $gallery_images = 'user.png';
                  } ?>  
                  <?php $images=unserialize($userData->gallery_images);
                  foreach ($images as $value) {?>

                   
                    <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo $value ;?>" alt="Album Images"></left><?php }?>
                    </div><?php echo form_upload('gallery_images[]','','multiple'); ?>
                    <?php }?> </div>
                  </div>

                  <?php if($view!="1"){?>
                    

                    <?php if(!empty($userData->gallery_id)){?>
                      <input type="hidden"  name="gallery_id" value="<?php echo isset($userData->gallery_id)?$userData->gallery_id:'';?>">
                      <div class="box-footer sub-btn-wdt">
                        <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">تعديل</button>
                      </div>
                      <!-- /.box-body -->
                    <?php }else{?>
                      <div class="box-footer sub-btn-wdt">
                        <button type="submit" name="submit" value="add" class="btn btn-success wdt-bg">اضافة</button>
                      </div>
                    <?php }}?>
                  </form>
                  <script>
                   var tt = $('textarea.ckeditor').ckeditor();
                   CKEDITOR.config.allowedContent = true;
                   
                   
                 </script>
