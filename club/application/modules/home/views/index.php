<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="author" content="Rowaad IT">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container-wrap">
    <h2>Carousel Example</h2>  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo base_url('assets/home/images/1.jpg');?>" style="width:100%; height:600px;">
        </div>

        <div class="item">
          <img src="<?php echo base_url('assets/home/images/2.jpg');?>" style="width:100%; height:600px;">
        </div>
        
        <div class="item">
          <img src="<?php echo base_url('assets/home/images/3.jpg');?>" style="width:100%; height:600px;">
        </div>
        
        <div class="item">
          <img src="<?php echo base_url('assets/home/images/4.jpg');?>" style="width:100%; height:600px;">
          
        </div>
        <div class="item">
          <img src="<?php echo base_url('assets/home/images/5.jpg');?>" style="width:100%; height:600px;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

</body>
</html>

