<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'champ/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
          
<div class="col-md-12">			
					
						<div class="col-md-6 form-group">
						  
						    <label for=""> اسم البطوله</label>
    </div>
    <div class="form-group col-md-6">

						    <input type="text" name="champ_title" value="<?php echo isset($userData->champ_title)?$userData->champ_title:'';?>" class="form-control" placeholder=" اسم البطوله">
						  </div>
						</div>
        <!----
<div class="col-md-12">			

<div class="col-md-3 form-group">
						  
						    <label for="">الوصف</label>
    </div>
 <div class="form-group col-md-9">   
<textarea class="form-control ckeditor" id="html"  name="champ_description" >
<?php //echo isset($userData->champ_description)?$userData->champ_description:'';?>
</textarea>

						  </div>
						</div>
				-->
          
                     
        
        <?php if(!empty($userData->champ_id)){?>
        <input type="hidden"  name="champ_id" value="<?php echo isset($userData->champ_id)?$userData->champ_id:'';?>">
        
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
  <!--
      <script>
	var tt = $('textarea.ckeditor').ckeditor();
	CKEDITOR.config.allowedContent = true;

	
</script>
