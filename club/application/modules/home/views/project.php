<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head">المشاريع الجديده</div>
        <div class="line" ></div>
        <ul class="nospace clear">
          <?php $i=0;
          $len=count($project_new);
          foreach($project_new as $project_new){?>
            <li class="one_half <?php if($i== 0 || $i % 2 == 0) {echo 'first';}?>">
              <article><img class="borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $project_new->project_image;?>" alt=""  width="460px" height="200px">
                <h2><?php echo $project_new->project_title;?></h2>
                <p><?php $desc= strip_tags($project_new->project_description); echo substr($desc,0,250);?>
                
              </p>
              <p class="right"><a href="<?php echo base_url();?>home/project?id=<?php echo $project_new->project_id.'?'.$project_new->project_title;?>">قراءه المزيد &raquo;</a></p>
            </article>
            </li><?php $i++;}?>
            
          </ul>
        </div>
        
        <div id="portfolio">
          <div class="head">منشئات النادي</div>
          <div class="line" ></div>
          <ul class="nospace clear">
            <?php $i=0;
            $len=count($project_old);
            foreach($project_old as $project_old){?>
              <li class="one_half <?php if($i== 0 || $i % 2 == 0) {echo 'first';}?>">
                <article><img class="borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $project_old->project_image;?>" alt=""  width="460px" height="200px">
                  <h2><?php echo $project_old->project_title;?></h2>
                  <p><?php $desc= strip_tags($project_old->project_description); echo substr($desc,0,250);?>
                  
                </p>
                <p class="right"><a href="<?php echo base_url();?>home/project?id=<?php echo $project_old->project_id.'?'.$project_old->project_title;?>">قراءه المزيد &raquo;</a></p>
              </article>
              </li><?php $i++;}?>
              
            </ul>
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