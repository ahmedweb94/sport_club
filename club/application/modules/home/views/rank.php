<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head">ترتيب الجدول</div>
        <div class="line" ></div>
        <?php foreach($rank as $join){?>
          <div class="head2"><?php $team_id= $join->rank_team;
          $query = $this->db->get_where('team',array('team_id'=>$team_id)); 
          foreach ($query->result() as $row){
            echo $row->team_title.'&laquo';}?></div>

            <table class="Tabl4">
             <tr>
               <th >البطوله</th>
               <th>الترتيب</th>
             </tr>
             <tr>
              <td> <?php $champ_id= $join->rank_champ;
              $query = $this->db->get_where('champ',array('champ_id'=>$champ_id)); 
              foreach ($query->result() as $row){
                echo $row->champ_title;}?> </td>
                <td> <?php echo $join->rank_rank;?> </td>
              </tr>   
              
            </table>
          <?php }?>
          
        </div>
        
        
        <!-- / main body -->
        <div class="clear"></div>
      </main>
    </div>
  </div>