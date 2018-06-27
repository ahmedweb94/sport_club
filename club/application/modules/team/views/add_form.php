<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'team/add_edit'?>" method="post">
  <div class="box-body">     
   <div class="col-md-12">
    <div class="form-group col-md-6">
      <label for=""><b> اسم الفريق<b/></label>
      </div>
      <div class="form-group col-md-6">
        <input type="text" name="team_title" value="<?php echo isset($userData->team_title)?$userData->team_title:'';?>" class="form-control" placeholder="اسم الفريق ">
      </div>
    </div>
    <div class="col-md-12">	
      <div class="form-group col-md-6">
        <label for=""><b>اسم اللعبه</b></label>
        <?php 
        $this->db->select('game_id, game_title');
        $query = $this->db->get('game');?>
      </div>
      <div class="form-group col-md-6">
        <select name="team_game" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="team_game">
          <?php 
          foreach ($query->result() as $row){?>
            <option value="<?php echo $row->game_id;?>"<?php if($row->game_id == $userData->team_game){echo 'selected';}?>><?php echo $row->game_title;?></option> 
          <?php } ?>
        </select>
      </div>
    </div>         
    <div class="col-md-12"> 
      <div class="form-group imsize">
        <label for="exampleInputFile"><b>صورة الفريق</b></label>
        <div class="pic_size" id="image-holder"> 
          <?php if(isset($userData->team_image) && file_exists('assets/images/'.$userData->team_image)){
            $team_image = $userData->team_image;
          }else{ 
            $team_image = 'user.png';
          } ?> 
          <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($team_image)?$team_image:'user.png';?>" alt="team picture"></left>
        </div> <input type="file" name="team_image" id="exampleInputFile">
      </div>
      
    </div>
    <?php if(!empty($userData->team_id)){?>
      <input type="hidden"  name="team_id" value="<?php echo isset($userData->team_id)?$userData->team_id:'';?>">
      <input type="hidden" name="fileOld" value="<?php echo isset($userData->team_image)?$userData->team_image:'';?>">
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

