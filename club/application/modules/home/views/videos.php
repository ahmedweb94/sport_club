  <div class="wrapper row3">
      <div class="rounded">
        <main class="container clear"> 
            <header class="head">ألبومات الفيديو</header>
            <div class="line"></div>
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;margin:20px auto 98px;">
                <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">
                        <?php foreach($videos as $row){?>
                            <li><img src="<?php echo base_url();?>assets/images/images/NtR5fplSVuQ.jpg" />
                                <video preload="none" src="<?php echo str_replace("watch?v=","embed/",  $row->videos_link);?>" ></video>
                            </li>
                        <?php }?>
                        
                    </ul>
                    <ul class="amazingslider-thumbnails" style="display:none;">
                        
                        <?php foreach($videos as $videos){?>
                            <li><img src="<?php echo base_url();?>assets/images/images/NtR5fplSVuQ-tn.jpg" /></li>
                        <?php }?>
                    </ul>
                    
                </div>
            </div>
        </main>
    </div>
</div>