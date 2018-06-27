<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div id="portfolio">
        <div class="head">أخر الأخبار</div>
        <div class="line" ></div>
        <?php foreach($news as $news){?>
          <ul class="nospace clear">
           
            <div class="head_news" >
             <a  href="<?php echo base_url();?>home/news?id=<?php echo $news->news_id;?>">
               <?php echo $news->news_title;?></a></div>
               <li class="one_half first">
                <div class="p_news">
                  <?php echo $news->news_description;?>
                </div>
              </li>

              <li class="one_half">
                
                <img class="borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $news->news_image;?>" alt="<?php echo $news->news_title;?>" width="460px" height="200px">
                <div class="date"><?php echo $news->news_date;?> </div>          
              </li>

            </ul>
            <div class="line2"></div>
          <?php }?>
        </div>
        
        <!-- ################################################################################################ --> 
        <!-- ################################################################################################ -->
        <nav class="pagination">
          <ul>
            <li><a href="#"> سابقه &raquo;</a></li>
            <li  ><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            
            <li><a href="">&laquo; قادمه </a></li>
          </ul>
        </nav>
        <!-- ################################################################################################ --> 
        <!-- / main body -->
        <div class="clear"></div>
      </main>
    </div>
  </div>