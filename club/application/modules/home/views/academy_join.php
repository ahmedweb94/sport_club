<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head">الأشتراك</div>
        <div class="line" ></div>
        <?php foreach($join as $join){?>
          <div class="head2"><?php echo $join->academy_title.'&laquo';?></div>

          <table class="Tabl4">
           <tr>
             <th >سنوي</th>
             <th>شهري</th>
           </tr>
           <tr>
            <td> <?php echo $join->academy_price_y.'$';?> </td>
            <td> <?php echo $join->academy_price_m.'$';?> </td>
          </tr>   
          
        </table>
      <?php }?>
      
    </div>
    
    
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
</div>