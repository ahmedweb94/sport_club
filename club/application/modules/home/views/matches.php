<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head"> المباريات</div>
        <div class="line" ></div>
        <table class="TbMa2">
          <?php foreach($matches as $matches){?>
            <tr>
              <td ><img src="<?php 
              $team_id= $matches->matches_team;
              $query = $this->db->get_where('team',array('team_id'=>$team_id)); 
              foreach ($query->result() as $row){
                echo base_url();?>assets/images/<?php echo $row->team_image;?>" style="width:100px; height:100px;">
                <div class="NmTeam"><?php 
                echo $row->team_title;}?> 
              </div>
            </td>
            <td >  
             <table class="tabInfo">
              <tr>
                <td ><span class="infotxt">المكان</span></td><td><?php echo $matches->matches_place;?>  </td></tr>
                <tr> 
                  <td ><span class="infotxt">التوقيت</span></td>
                  <td><span class="infotxt2"><?php echo $matches->matches_time;?></span></td>
                </tr>
                <tr>
                  <td > <span class="infotxt">التاريخ</span></td><td>
                   <span class="infotxt2"></span><?php echo $matches->matches_date;?></td>
                 </tr>
                 <tr>
                  <td >  <span class="infotxt">البطوله</span></td><td>
                   <span class="infotxt2"> <?php  $champ_id= $matches->matches_champ;
                   $query = $this->db->get_where('champ',array('champ_id'=>$champ_id)); 
                   foreach ($query->result() as $row){
                    echo $row->champ_title;}?> </span></td>
                  </tr>
                </table>
              </td>
              <td ><img src="<?php echo base_url();?>assets/images/<?php echo $matches->matches_aganist_image;?>"  style="width:100px; height:100px;">
               <div class="NmTeam"><?php echo $matches->matches_aganist;?></div>
             </td>
             <?php if($matches->matches_team_result != null){?>
              <td><?php echo $matches->matches_aganist_result.'-'.$matches->matches_team_result;?></td><?php }?>
            </tr><!--##################-->
          <?php }?>       

        </table><!--######################## end table1#####################################-->
      </div>
      <nav class="pagination">
        <ul>
          <li><a href="#"> سابقه &raquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&laquo; قادمه </a></li>
        </ul>
      </nav>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>