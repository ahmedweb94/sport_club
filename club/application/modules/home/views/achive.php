<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <ul class="nospace clear">
          <?php $i=0;
          $len=count($achive);
          foreach($achive as $achive){?>
            <li class="one_half <?php if($i== 0 || $i % 2 == 0) {echo 'first';}?>">
              <article><img class="borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $achive->achive_images;?>" alt=""  width="460px" height="200px">
                <h2><?php echo $achive->achive_title;?></h2>
                <p><?php $desc= strip_tags($achive->achive_description); echo substr($desc,0,250);?>
                
              </p>
              <p class="right"><a href="<?php echo base_url();?>home/achive?id=<?php echo $achive->achive_id.'?'.$achive->achive_title;?>">قراءه المزيد &raquo;</a></p>
            </article>
            </li><?php $i++;}?>
            
          </ul>
        </div>
        <!-- ################################################################################################ --> 
        <!-- ################################################################################################ -->
        <nav class="pagination">
          <ul>
            <li><a href="<?php echo base_url();?>home/achive?id=<?php if($achive->achive_id == 1){echo $achive->achive_id;}else{ echo $achive->achive_id-1;}?>">&laquo; السابقه</a></li>
            
            <li><a href="<?php echo base_url();?>home/achive?id=<?php echo $achive->achive_id+1;?>">&hellip;</a></li>
            
          </ul>
        </nav>
        <!-- ################################################################################################ --> 
        <!-- / main body -->
        <div class="clear"></div>
      </main>
    </div>
  </div>