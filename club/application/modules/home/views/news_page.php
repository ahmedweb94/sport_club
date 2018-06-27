<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head"><?php echo $news->news_title;?></div>
        <img class="imgs borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $news->news_image;?>" align="middle">
        <div class="p_news">
         <?php echo $news->news_description;?>
       </div>
     </div>
     <!-- ################################################################################################ --> 
     <!-- / main body -->
     <div class="clear"></div>
   </main>
 </div>
</div>