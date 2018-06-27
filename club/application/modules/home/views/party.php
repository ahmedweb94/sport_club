<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head">الحفلات</div>
        <div class="line" ></div>
        <div class="head2">قادمه</div>
        <table class="Tabl">
          <tr>
            <th >التاريخ</th>
            <th>الأسم</th>
            
          </tr>
          <?php foreach($next as $next){?>
            <tr>
              <td class="date"><?php echo $next->party_date;?></td>
              <td><a href="<?php echo base_url();?>home/party?id<?php echo $next->party_id.'?'.$next->party_title;?>"><?php echo $next->party_title;?></a>   </td>
              
            </tr>
          <?php }?>

        </table><!--######################## end table1#####################################-->
        <div class="head2">سابقه</div>
        <table class="Tabl">
          <tr>
            <th >التاريخ</th>
            <th>الأسم</th>
            
          </tr>
          <?php foreach($pre as $pre){?>
            <tr>
              
              <td class="date"><?php echo $pre->party_date;?></td>
              <td><a href="<?php echo base_url();?>home/party?id=<?php echo $pre->party_id.'?'.$pre->party_title;?>"><?php echo $pre->party_title;?></a>  </td>
              
            </tr>
          <?php }?>
          
        </table>
      </div>
      
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>