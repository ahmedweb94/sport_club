<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">   
        <figure class="center"><?php echo substr($query['8']->main_value,9,-12);?>
        <figcaption><a href="#">Find Us With Google Maps &raquo;</a></figcaption>
      </figure>
    </div>
    <div class="one_third">
      <address>
       <?php echo $query['4']->main_value;?>
       <i class="fa fa-phone pright-10"></i> <?php echo $query['5']->main_value;?><br>
       <i class="fa fa-envelope-o pright-10"></i> <a href="#"><?php echo $query['6']->main_value;?></a>
     </address>
   </div>
   <div class="one_third">
    <p class="nospace btmspace-10">تابعنا</p>
    <ul class="faico clear">
      <li><a class="faicon-twitter" href="<?php  echo strip_tags($query['3']->main_value);?> "><i class="fa fa-twitter"></i></a></li>
      <li><a class="faicon-linkedin" href="<?php echo strip_tags ($query['7']->main_value);?>"><i class="fa fa-linkedin"></i></a></li>
      <li><a class="faicon-facebook" href="<?php echo strip_tags ($query['2']->main_value);?>"><i class="fa fa-facebook"></i></a></li>
      <li><a class="faicon-flickr" href="#"><i class="fa fa-flickr"></i></a></li>
      <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
    </ul>
    <form class="clear" method="post" action="#">
      <fieldset>
        <legend>أشترك</legend>
        <input type="text" value="" placeholder="أدخل الايميل هنا&hellip;">
        <button class="fa fa-sign-in" type="submit" title="Sign Up"><em>Sign Up</em></button>
      </fieldset>
    </form>
  </div>
  <!-- ################################################################################################ --> 
</footer>
</div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#"></a></p>
    
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS -->
<script src="<?php echo base_url();?>assets/layout/scripts/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/layout/scripts/jquery.fitvids.min.js"></script> 
<script src="<?php echo base_url();?>assets/layout/scripts/jquery.mobilemenu.js"></script> 
<script src="<?php echo base_url();?>assets/layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script src="<?php echo base_url();?>assets/layout/scripts/3.js"></script>
<script src="<?php echo base_url();?>assets/layout/scripts/jssor.slider-27.1.0.min.js"></script>

<script type="text/javascript">jssor_1_slider_init();</script>
<!---- STRT---------->
<script src="<?php echo base_url();?>assets/sliderengine2/jquery.js"></script>
<script src="<?php echo base_url();?>assets/sliderengine2/amazingslider.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sliderengine2/amazingslider-1.css">
<script src="<?php echo base_url();?>assets/sliderengine2/initslider-1.js"></script>

</body>
</html>