<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'game/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">

      <div class="col-md-12">			

        <div class="col-md-6 form-group">

          <label for=""> اسم اللعبه</label>
        </div>
        <div class="form-group col-md-6">

          <input type="text" name="game_title" value="<?php echo isset($userData->game_title)?$userData->game_title:'';?>" class="form-control" placeholder=" اسم اللعبه">
        </div>
      </div>

      <?php if(!empty($userData->game_id)){?>
        <input type="hidden"  name="game_id" value="<?php echo isset($userData->game_id)?$userData->game_id:'';?>">
        
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
    