<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'project/add_edit'?>" method="post">
  <div class="box-body">
    
    
   <div class="col-md-12">
    <div class="form-group col-md-6">
      <label for=""><b>اسم المشروع<b/></label>
      </div>
      <div class="form-group col-md-6">
        <input type="text" name="project_title" value="<?php echo isset($userData->project_title)?$userData->project_title:'';?>" class="form-control" placeholder="اسم المشروع ">
      </div>
    </div>
    <div class="col-md-12">	
      <div class="form-group col-md-6">
        <label for=""><b>نوع المشروع</b></label>
        <?php 
        $this->db->select('section_id, section_title');
        $query = $this->db->get('project_section');?>
      </div>
      <div class="form-group col-md-6">
        <select name="project_section" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="project_section">
          <?php 
          foreach ($query->result() as $row){?>
            <option value="<?php echo $row->section_id;?>"<?php if($row->section_id == $userData->project_section){echo 'selected';}?> ><?php echo $row->section_title;?></option> 
          <?php } ?>
        </select>		  
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group col-md-3">
        <label for=""><b>وصف المشروع<b/></label>
        </div>
        <div class="form-group col-md-9">
          <textarea class="form-control ckeditor" id="html" name="project_description" placeholder="وصف المشروع"> <?php echo isset($userData->project_description)?$userData->project_description:'';?></textarea>
        </div>
      </div>          
      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile"><b>صورة المشروع</b></label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->project_image) && file_exists('assets/images/'.$userData->project_image)){
              $project_image = $userData->project_image;
            }else{ 
              $project_image = 'user.png';
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($project_image)?$project_image:'user.png';?>" alt="project picture"></left>
          </div> <input type="file" name="project_image" id="exampleInputFile">
        </div>
        
      </div>
      <?php if(!empty($userData->project_id)){?>
        <input type="hidden"  name="project_id" value="<?php echo isset($userData->project_id)?$userData->project_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->project_image)?$userData->project_image:'';?>">
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
