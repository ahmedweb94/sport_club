<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head">الرحلات </div>
        <div class="line" ></div>
        <div class="head2">الرحلات القادمه</div>
        <table class="Tabl">
          <tr>
            <th >التاريخ</th>
            <th>الأسم</th>
            
          </tr>
          <?php foreach($trip as $trip){?>
            <tr>
              <td class="date"><?php echo $trip->trip_date;?></td>
              <td><a href="<?php echo base_url();?>home/trip?id=<?php echo $trip->trip_id.'?'.$trip->trip_title;?>"><?php echo $trip->trip_title;?></a>   </td>
              
            </tr>
          <?php }?>
          
        </table><!--######################## end table1#####################################-->
      </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
