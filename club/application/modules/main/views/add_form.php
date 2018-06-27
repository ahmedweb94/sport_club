<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'main/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      
      <div class="col-md-12">			
       
        <div class="col-md-6 form-group">
          
          <label for="">الاسم </label>
        </div>
        <div class="form-group col-md-6">

          <input type="text" name="main_title" value="<?php echo isset($userData->main_title)?$userData->main_title:'';?>" class="form-control" placeholder="الاسم" disabled >
        </div>
      </div>
      <div class="col-md-12">			

        <div class="col-md-3 form-group">
          
          <label for="">المحتوي</label>
        </div>
        <div class="form-group col-md-9">   
          <textarea class="form-control ckeditor" id="html"  name="main_value" >
            <?php echo isset($userData->main_value)?$userData->main_value:'';?>
          </textarea>

        </div>
      </div>
      
      
      
      
      <?php if(!empty($userData->main_id)){?>
        <input type="hidden"  name="main_id" value="<?php echo isset($userData->main_id)?$userData->main_id:'';?>">
        
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
