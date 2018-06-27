<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'matches/add_edit'?>" method="post">
  <div class="box-body">
    
    <div class="col-md-12">	
      <div class="form-group col-md-6">
        <label for=""><b>الفريق</b></label>
        <?php 
        $this->db->select('team_id, team_title');
        $query = $this->db->get('team');?>
      </div>
      <div class="form-group col-md-6">
        <select name="matches_team" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="matches_team">
          <?php 
          foreach ($query->result() as $row){?>
            <option value="<?php echo $row->team_id;?>"<?php if($row->team_id == $userData->matches_team){echo 'selected';}?>><?php echo $row->team_title;?></option> 
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group col-md-6">
        <label for=""><b>الخصم<b/></label>
        </div>
        <div class="form-group col-md-6">
          <input type="text" name="matches_aganist" value="<?php echo isset($userData->matches_aganist)?$userData->matches_aganist:'';?>" class="form-control" placeholder="الخصم">
        </div>
      </div>

      <div class="col-md-12"> 
        <div class="form-group imsize">
          <label for="exampleInputFile"><b>صورة الخصم</b></label>
          <div class="pic_size" id="image-holder"> 
            <?php if(isset($userData->matches_aganist_image) && file_exists('assets/images/'.$userData->matches_aganist_image)){
              $matches_aganist_image = $userData->matches_aganist_image;
            }else{ 
              $matches_aganist_image = 'user.png';
            } ?> 
            <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($matches_aganist_image)?$matches_aganist_image:'user.png';?>" alt="matches picture"></left>
          </div> <input type="file" name="matches_aganist_image" id="exampleInputFile">
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
          <select name="matches_champ" class="form-group col-md-6" <?php /* if($view=="1"){echo "disabled"; }*/?> id="matches_champ">
            <?php 
            foreach ($query->result() as $row){?>
              <option value="<?php echo $row->champ_id;?>"<?php if($row->champ_id == $userData->matches_champ){echo 'selected';}?>><?php echo $row->champ_title;?></option> 
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group col-md-6">
          <label for=""><b>مكان المباراه<b/></label>
          </div>
          <div class="form-group col-md-6">
            <input type="text" name="matches_place" value="<?php echo isset($userData->matches_place)?$userData->matches_place:'';?>" class="form-control" placeholder="مكان المباراه">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label for=""><b>تاريخ المباراه<b/></label>
            </div>
            <div class="form-group col-md-6">
              <input type="date" name="matches_date" value="<?php echo isset($userData->matches_date)?$userData->matches_date:'';?>" class="form-control" placeholder="تاريخ المباراه">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label for=""><b>وقت المباراه<b/></label>
              </div>
              <div class="form-group col-md-6">
                <input type="time" name="matches_time" value="<?php echo isset($userData->matches_time)?$userData->matches_time:'';?>" class="form-control" placeholder="وقت المباراه">
              </div>
            </div>
            <?php 
            if(!empty($userData->matches_id)){
              if(date('Y-m-d g:i A')  >  date('Y-m-d g:i A', strtotime("$userData->matches_date $userData->matches_time"))){;
                   // if($userData->matches_date < time() || ($userData->matches_date == time() && $userData->matches_time < date("g:i A"))  )  {?>
                    
                    <div class="col-md-12">
                      <div class="form-group col-md-6">
                        <label for=""><b>نتيجه الفريق<b/></label>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="number" name="matches_team_result" value="<?php echo isset($userData->matches_team_result)?$userData->matches_team_result:'';?>" class="form-control" placeholder="نتيجه الفريق">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group col-md-6">
                          <label for=""><b>نتيجه الخصم<b/></label>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="number" name="matches_aganist_result" value="<?php echo isset($userData->matches_aganist_result)?$userData->matches_aganist_result:'';?>" class="form-control" placeholder="نتيجه الخصم">
                          </div>
                        </div>
                      <?php }}?>
                      <?php if(!empty($userData->matches_id)){?>
                        <input type="hidden"  name="matches_id" value="<?php echo isset($userData->matches_id)?$userData->matches_id:'';?>">
                        <input type="hidden" name="fileOld" value="<?php echo isset($userData->matches_aganist_image)?$userData->matches_aganist_image:'';?>">
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
