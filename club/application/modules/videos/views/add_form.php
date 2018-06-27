<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'videos/add_edit'?>" method="post">
	<div class="box-body">
		<div class="row">
			
			<div class="col-md-12">
				<div class="form-group col-md-6">
					<label for=""><b>عنوان الفيديو<b/></label>
					</div>
					<div class="form-group col-md-6">
						<input type="text" name="videos_title" value="<?php echo isset($userData->videos_title)?$userData->videos_title:'';?>" class="form-control" placeholder="عنوان الفيديو">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group col-md-3">
						<label for=""><b>وصف الفيديو<b/></label>
						</div>
						<div class="form-group col-md-9">
							<textarea class="form-control ckeditor" id="html" name="videos_description" placeholder="وصف الفيديو" ><?php echo isset($userData->videos_description)?$userData->videos_description:'';?></textarea>

						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-6">
							<label for=""><b>رابط الفيديو</b></label>
						</div>
						<div class="form-group col-md-6">
							<?php if($view=="1"){
								$linke=str_replace("watch?v=","embed/",$userData->videos_link);
								echo '<object width="420" height="315"
								data="'.$linke.'">
								</object>';

							}else{?>
								<input type="text" name="videos_link" value="<?php echo isset($userData->videos_link)?$userData->videos_link:'';?>" class="form-control" placeholder="htt://www.youtube.com/">
							<?php }?>
						</div>
					</div>
					
					<?php if($view!="1"){?>

						<?php if(!empty($userData->videos_id)){?>
							<input type="hidden"  name="videos_id" value="<?php echo isset($userData->videos_id)?$userData->videos_id:'';?>">
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
