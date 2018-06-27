<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'rank/add_edit'?>" method="post">
  <div class="box-body">
    
    <div class="col-md-12">	
      <div class="form-group col-md-6">
        <label for=""><b>الفريق</b></label>
        <?php 
        $this->db->select('team_id, team_title');
        $query = $this->db->get('team');?>
      </div>
      <div class="form-group col-md-6">
        <select name="rank_team" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="rankes_team">
          <?php 
          foreach ($query->result() as $row){?>
            <option value="<?php echo $row->team_id;?>"<?php if($row->team_id == $userData->rankes_team){echo 'selected';}?>><?php echo $row->team_title;?></option> 
          <?php } ?>
        </select>
      </div>
    </div>
    
    <div class="col-md-12">	
      <div class="form-group col-md-6">
        <label for=""><b>البطوله</b></label>
        <?php 
        $this->db->select('champ_id, champ_title');
        $query = $this->db->get('champ');?>
      </div>
      <div class="form-group col-md-6">
        <select name="rank_champ" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="rankes_champ">
          <?php 
          foreach ($query->result() as $row){?>
            <option value="<?php echo $row->champ_id;?>"<?php if($row->champ_id == $userData->rankes_champ){echo 'selected';}?>><?php echo $row->champ_title;?></option> 
          <?php } ?>
        </select>
      </div>
    </div> 
    <div class="col-md-12">
      <div class="form-group col-md-6">
        <label for=""><b>الترتيب<b/></label>
        </div>
        <div class="form-group col-md-3">
          <input type="number" name="rank_rank" value="<?php echo isset($userData->rank_rank)?$userData->rank_rank:'';?>" class="form-control" placeholder="الترتيب  ">
        </div>
      </div>
      <?php if(!empty($userData->rank_id)){?>
        <input type="hidden"  name="rank_id" value="<?php echo isset($userData->rank_id)?$userData->rank_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->rank_image)?$userData->rank_image:'';?>">
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
