<!DOCTYPE html>
<html>
<head>
  <title><?php echo $result['0']->value;?> | <?php echo $title_page;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <link href="<?php echo base_url();?>assets/layout/styles/style.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo base_url();?>assets/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">
  <div class="wrapper row0">
    <div id="topbar" class="clear"> 
      <nav>
        <ul>
          <li><a href="<?php echo base_url();?>home">الرئسيه</a></li>
          <li><a href="<?php echo base_url();?>home/contactus">أتصل بنا </a></li>
          <li><a href="pages/login.html">تسجيل الدخول</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="wrapper row1">
    <header id="header" class="clear"> 
      <div id="logo" class="fl_left">
        <img src="<?php echo base_url();?>assets/images/images/demo/gallery/logo2.png">
        <h1><a href="<?php echo base_url();?>home">نادي الصيد الرياضي </a></h1>
      </div>
      <div class="fl_right">
        <form class="clear" method="post" action="#">
          <fieldset>
            <input type="text" value="" placeholder="بحث ">
            <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
          </fieldset>
        </form>
      </div>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <div class="rounded">
      <nav id="mainav" class="clear"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li class="active"><a href="<?php echo base_url("home/news");?>">الأخبار</a></li>
          <li><a class="drop" href="">عن النادي</a>
            <ul>
              <li><a href="<?php echo base_url("home/history");?>">تاريخ النادي</a></li>
              <li><a href="<?php echo base_url("home");?>">مجلس الأداره</a></li>
              <li><a href="<?php echo base_url("home");?>">شئون العضويه </a></li>
              <li><a href="<?php echo base_url("home/project");?>">منشأت النادي</a></li>
              <li><a href="<?php echo base_url("home/project");?>">المشاريع الجديده</a></li>
              <li><a href="pages/login.html">تسجيل الدخول</a></li>
              
            </ul>
          </li>
          <li><a class="drop" href="">كره القدم</a>
            <ul>
              <li><a   href="">الفريق الأول</a>
                <ul>
                  <li><a href="<?php echo base_url("home/matches");?>">جدول المباريات</a></li>
                  <li><a href="<?php echo base_url("home/matches");?>">نتائج المباريات</a></li>
                  <li><a href="<?php echo base_url("home/rank");?>">ترتيب المباريات</a></li>
                </ul>
                
              </li>
              <li><a  href="">قطاع الناشئين</a>
                <ul>
                  <li><a href="<?php echo base_url("home/matches");?>">جدول المباريات</a></li>
                  <li><a href="<?php echo base_url("home/matches");?>">نتائج المباريات</a></li>
                  <li><a href="<?php echo base_url("home/rank");?>">ترتيب المباريات</a></li>
                </ul>
              </li>
              <li><a href="">الأكاديميه </a>
               <ul>
                <li><a href="<?php echo base_url("home/academy_join");?>"> أشتراك</a></li>
                <li><a href="<?php echo base_url("home/academy");?>">مميزات الأكاديميه</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a class="drop" href="">الأنشطه </a>
          <ul>
            <li><a href="<?php echo base_url("home/activite");?>">الأنشطه الأجتماعيه</a></li>
            <li><a  href="<?php echo base_url("home/trip");?>">الرحلات </a> </li>
            <li><a href="<?php echo base_url("home/party");?>">الحفلات </a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url("home/achive");?>">أنجازات</a></li>
        <li><a class="drop" href="">الميديا </a>
          <ul>
            <li><a href="<?php echo base_url("home/gallery");?>">مكتبه الصور</a></li>
            <li><a href="<?php echo base_url("home/videos");?>">البومات الفيديو</a></li>
          </ul>
        </li>  
        <li><a class="drop"  href="">رأيك يهمنا</a>
          <ul>
           <li><a href="pages/OpInt.html">شكاوي و مقترحات</a></li>
         </ul>
       </li>
       <li><a href="<?php echo base_url("home/contactus");?>">أتصل بنا</a></li>
     </ul>
     <!-- ################################################################################################ --> 
   </nav>
 </div>
</div>
