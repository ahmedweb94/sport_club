<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'news/add_edit'?>" method="post">
  <div class="box-body">        
   <div class="col-md-12">
    <div class="form-group col-md-6">
      <label for=""><b>عنوان الخبر<b/></label>
      </div>
      <div class="form-group col-md-6">
        <input type="text" name="news_title" value="<?php echo isset($userData->news_title)?$userData->news_title:'';?>" class="form-control" placeholder="عنوان الخبر ">
      </div>
    </div>
    <div class="col-md-12">	
      <div class="form-group col-md-6">
        <label for=""><b>القسم</b></label>
        <?php 
        $this->db->select('section_id, section_title');
        $query = $this->db->get('news_section');?>
      </div>
      <div class="form-group col-md-6">
        <select name="news_section" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="news_section">
          <?php 
          foreach ($query->result() as $row){?>
            <option value="<?php echo $row->section_id;?>"<?php if($row->section_id == $userData->news_section){echo 'selected';}?>><?php echo $row->section_title;?></option> 
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group col-md-3">
        <label for=""><b>وصف الخبر<b/></label>
        </div>
        <div class="form-group col-md-9">
          <textarea class="form-control ckeditor" id="html" name="news_description" placeholder="الخبر"> <?php echo isset($userData->news_description)?$userData->news_description:'';?></textarea>
        </div>
      </div>
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile"><b>صورة الخبر</b></label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->news_image) && file_exists('assets/images/'.$userData->news_image)){
              $news_image = $userData->news_image;
            }else{ 
              $news_image = 'user.png';
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($news_image)?$news_image:'user.png';?>" alt="news picture"></left>
          </div> <input type="file" name="news_image" id="exampleInputFile">
        </div>
        
      </div>
      <?php if(!empty($userData->news_id)){?>
        <input type="hidden"  name="news_id" value="<?php echo isset($userData->news_id)?$userData->news_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->news_image)?$userData->news_image:'';?>">
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
