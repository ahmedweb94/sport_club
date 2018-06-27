<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <?php $setting = setting_all();?>
  
  <link rel="icon" href="<?php echo base_url((setting_all('favicon'))?'assets/images/'.setting_all('favicon'):'assets/images/favicon.ico');?>">
  <title><?php echo (setting_all('website'))?setting_all('website'):'Dasboard';?></title>






  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.css');?>">
    <!--  <link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css');?>">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>" />
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
    .modal-dialog{
        width: 900px;
    }
</style>





<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/rtl.css'); ?>" />

  </head>
    <body class="hold-transition skin-black-light sidebar-mini" data-base-url="<?php echo base_url(); ?>" >

        <div class="wrapper">

          <header class="main-header">
            <a href="<?php echo base_url(); ?>" class="logo">
             <?php $logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Control Sidebar Toggle Button -->
                        <!-- <li>
                          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> -->
                        <!-- User Account: style can be found in dropdown.less -->          

                        <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <?php 
                 $profile_pic =  'user.png';
                 if(isset($this->session->userdata('user_details')[0]->profile_pic) && file_exists('assets/images/'.$this->session->userdata('user_details')[0]->profile_pic))
                              {
                                 $profile_pic = $this->session->userdata('user_details')[0]->profile_pic;
                              }?>
                              <img src="<?php echo base_url().'assets/images/'.$profile_pic;?>"  class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo isset($this->session->userdata('user_details')[0]->name)?$this->session->userdata('user_details')[0]->name:'';?></span>
                          </a>
                          <ul class="dropdown-menu" role="menu" style="width: 164px;">
                              <li><a href="<?php echo base_url('user/profile');?>"><i class="fa fa-user mr10"></i>حسابك الشخصى</a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo base_url('user/logout');?>"><i class="fa fa-power-off mr10"></i> تسجيل خروج</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              
              <ul class="sidebar-menu">
                <li class="header"><!-- MAIN NAVIGATION --></li>
                <?php //echo '<pre>';print_r($this->router); die; ?>
                <li class="<?=($this->router->method==="profile")?"active":"not-active"?>"> 
                <a href="<?php echo base_url('user/profile');?>"> <i class="fa fa-user"></i> <span>حسابك الشخصى</span></a>
                </li>                
                <?php $this->load->view("include/menu");?> 
                
               
               <?php if(CheckPermission("users", "own_read")){ ?>
                    <li class="<?=($this->router->method==="userTable")?"active":"not-active"?>"> 
                        <a href="<?php echo base_url();?>user/userTable"> <i class="fa fa-users"></i> <span>ادارة الاعضاء</span></a>
                    </li>    
                <?php }  if(isset($this->session->userdata('user_details')[0]->user_type) && $this->session->userdata('user_details')[0]->user_type == 'admin'){ ?>    
                    <li class="<?=($this->router->class==="setting")?"active":"not-active"?>">
                        <a href="<?php echo base_url("setting"); ?>"><i class="fa fa-cogs"></i> <span>الاعدادات العامة</span></a>
                    </li>
         
                    <!-- <li class="<?php //echo ($this->router->class==="Templates")?"active":"not-active"?>">
                        <a href="<?php //echo base_url("Templates"); ?>"><i class="fa fa-cubes"></i> <span>Templates</span></a>
                    </li> -->
                  <?php }  /*if(CheckPermission("invoice", "own_read")){ ?>   
                    <li class="<?=($this->router->class==="invoice")?"active":"not-active"?>">
                        <a href="<?php echo base_url("invoice/view"); ?>"><i class="fa fa-list-alt"></i> <span>Invoice</span></a>
                    </li>

               <?php  }*/ ?>
 <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-futbol"></i>
     النشاط الرياضي <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo base_url("game"); ?>">ادارة الالعاب</a></li>
        <li><a href="<?php echo base_url("team"); ?>">ادارة الفرق</a></li>
        <li><a href="<?php echo base_url("champ"); ?>">ادارة المنافسات  </a></li>    
 <li><a href="<?php echo base_url("matches"); ?>">ادارة المبارايات والنتائج</a></li> 
  <li><a href="<?php echo base_url("rank"); ?>">ادارة ترتيب الجدول</a></li>   
        <li><a href="<?php echo base_url("academy"); ?>">ادارة الاكاديميه</a></li>          
      </ul>
    </li>
    
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-handshake"></i>
     النشاطات  <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo base_url("activite"); ?>">ادارة الانشطه الاجتماعيه</a></li>
        <li><a href="<?php echo base_url("trip"); ?>">ادارة الرحلات</a></li>
        <li><a href="<?php echo base_url("party"); ?>">ادارة الحفلات  </a></li>    
      </ul>
    </li>
    
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-project-diagram"></i>
       المشروعات<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo base_url("project_section"); ?>">انواع المشاريع</a></li>
        <li><a href="<?php echo base_url("project"); ?>">ادارة المشاريع</a></li>
      </ul>
    </li>
    
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-newspaper"></i>
       الاخبار<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo base_url("news_section"); ?>">اقسام الاخبار</a></li>
        <li><a href="<?php echo base_url("news"); ?>">ادارة الاخبار</a></li>
      </ul>
    </li>
    
<li class="<?=($this->router->class==="news")?"active":"not-active"?>">
                        <a href="<?php echo base_url("main"); ?>"><i class="fa fa-globe"></i> <span>عن النادي</span></a>
                    </li>
                    
                    <li class="<?=($this->router->class==="trainers")?"active":"not-active"?>">
                      <a href="<?php echo base_url("achive"); ?>"><i class="fa fa-trophy"></i> <span> اداره الانجازات</span></a>
                  </li>
                  
                    <li class="<?=($this->router->class==="videos")?"active":"not-active"?>">
                      <a href="<?php echo base_url("videos"); ?>"><i class="fa fa-video-camera"></i> <span>مقاطع الفيديو</span></a>
                  </li>
                  
                  <li class="<?=($this->router->class==="gallery")?"active":"not-active"?>">
                      <a href="<?php echo base_url("gallery"); ?>"><i class="fa fa-picture-o"></i> <span>البومات الصور</span></a>
                  </li>
                  
                  <li class="<?=($this->router->class==="subscribe")?"active":"not-active"?>">
                        <a href="<?php echo base_url("subscribe"); ?>"><i class="fa fa-reply-all"></i> <span>الاشتراكات البريديه</span></a>
                    </li>

                  <li class="<?=($this->router->class==="contactus")?"active":"not-active"?>">
                      <a href="<?php echo base_url("contactus"); ?>"><i class="fa fa-envelope"></i> <span>رسائل الادارة</span></a>
                  </li>
                  

                  
 
              </ul>

            </section>

            <!-- /.sidebar -->
          </aside>         
<style>
.progress-main-div1 {
    padding-top: 10px;
    background-color: rgb(232, 82, 15);
    position: fixed;
    bottom: 21px;
    z-index: 50;
    width: 50%;
    padding-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 34%;
    margin-bottom: 19px;
}
.progress-main-div1 a{
    color:#04046e;;
}
</style>
