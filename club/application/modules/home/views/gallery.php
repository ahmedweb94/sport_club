<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="head">مكتبه الصور</header>
          <div class="line"></div>
          <div class="group btmspace-50">
            <?php foreach($images as $images) {?>
              <div class="one_third">
                <a id=" " href="<?php echo base_url();?>home/gallery?id=<?php echo $images->gallery_id;?>" > 
                  <?php  $photo=unserialize($images->gallery_images);?>
                  <img src="<?php echo base_url();?>assets/images/<?php echo $photo[0];?>"></a>
                  <center> <span class="head">صور </span><span class="Pbalck_thrTwo" ><?php echo $images->gallery_title;?></span></center>
                </div>
              <?php }?>           
            </div>
          </figure>
        </div>
        <!-- ################################################################################################ --> 
        <!-- ################################################################################################ -->
        <nav class="pagination">
          <ul>
            <li><a href="#"> سابقه &raquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&laquo; قادمه </a></li>
          </ul>
        </nav>
        <!-- ################################################################################################ --> 
        <!-- / main body -->
        <div class="clear"></div>
      </main>
    </div>
  </div>