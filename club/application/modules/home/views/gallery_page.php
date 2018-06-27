<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      
      <div id="gallery">
        <figure>
          <header class="head">مكتبه الصور</header>
          <div class="line"></div>
          <!--<button id="link">link</button>-->
          <ul class="nospace clear">
            <?php  $photo=unserialize($images->gallery_images);
            foreach($photo as $photo){?>
              <li class="one_quarter "><a class="nlb" data-lightbox-gallery="gallery1" href="<?php echo base_url();?>assets/images/<?php echo $photo;?> " title="<?php echo $images->gallery_title;?>"><img class="borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $photo;?>" alt="<?php echo $images->gallery_title;?>"></a></li>
            <?php }?>
          </ul>
          <figcaption><?php echo $images->gallery_description;?></figcaption>
        </figure>
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>