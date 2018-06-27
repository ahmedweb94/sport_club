<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <div id="portfolio">
        <div class="head"><?php echo $project->project_title;?> </div>
        <div class="line" ></div>  
        <img class="imgs borderedbox" src="<?php echo base_url();?>assets/images/<?php echo $project->project_image;?>" align="middle">
        <?php echo $project->project_description;?>
      </div>
      
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <nav class="pagination">
        <ul>
          <li><a href="<?php echo base_url();?>home/project?id=<?php if($project->project_id == 1){echo $project->project_id;}else{ echo ($project->project_id)-1;}?>"> سابقه &raquo;</a></li>
          
          
          <li><a href="<?php echo base_url();?>home/project?id=<?php echo ($project->project_id)+1;?>">&laquo; قادمه </a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>