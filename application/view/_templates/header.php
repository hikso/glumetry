<?php 
        if (!isset($_SESSION)) {
          echo '';
        }else{

          $userName = $_SESSION['userName']; 
          $url = $_SESSION['userHome'];
        }
 ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Nov 2014 07:13:44 GMT -->
<head>
   <meta charset="UTF-8">
   <title>Glumetry</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <script type="text/javascript" src="<?php echo URL; ?>js/jquery.js"></script>
   <link href="<?php echo URL; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />

   <link href="<?php echo URL; ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>css/style-slide.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>css/glumetry.css" rel="stylesheet" />
   
   <link href="<?php echo URL; ?>css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>css/style-default.css" rel="stylesheet" id="style_color" />
   
   <link href="<?php echo URL; ?>assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/jquery.validate.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/stylev.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/data-tables/DT_bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/nestable/jquery.nestable.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>media/css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/bootstrap-datepicker/css/datepicker.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/alertify.rtl.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/themes/default.rtl.css">
      <link rel="stylesheet" href="{PATH}/">
<link rel="stylesheet" href="{PATH}/">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->               
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="<?php echo URL.$_SESSION['userHome']; ?>">
                   <img src="<?php echo URL; ?>img/logo.png" alt="Glúmetry">
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <?php echo $_SESSION['directAccess']; ?>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="<?php echo URL ?>img/avatar-mini.png" alt="">
                               <span class="username"><?php echo $userName ?></span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"><i class="icon-cog"></i>Configuración</a></li>
                               <li><a href="<?php echo URL ?>login/LogOut"><i class="icon-key"></i>Salir</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
 
<div class="sidebar-scroll">
<div id="sidebar" class="nav-collapse collapse">
     <div class="navbar-inverse">
         <form class="navbar-search visible-phone">
             <input type="text" class="search-query" placeholder="Search" />
          </form>
      </div>  
        <ul class="sidebar-menu">
        <?php foreach ($_SESSION['Menu'] as $Menu) { ?>
              <li class="sub-menu">
               <?php $onclick =''; ?>
              <?php if ( isset($_SESSION['historia']) == 0 && $Menu->id_menu == 4) {
               $onclick =' onclick="AlertarExistenciaHC()" ';
              }?>

              <?php if ($Menu->url == NULL): ?>
                <a href="javascript:;" class="">
                 <i class="<?php echo $Menu->icono; ?>"></i>
                   <span><?php echo $Menu->titulo; ?></span>
                    <span class="arrow"></span>
                </a>
              <?php else: ?>
                <a href="<?php echo URL.$Menu->url; ?>" class="">
                 <i class="<?php echo $Menu->icono; ?>"></i>
                   <span><?php echo $Menu->titulo; ?></span>
                </a>
              <?php endif ?>
                  <ul class="sub">
                  <?php foreach ($_SESSION['subMenus'] as $submenu) { ?>
                      <?php if ($submenu->id_menu == $Menu->id_menu ): ?>
                        <?php if ($onclick != '' && $Menu->id_menu == 4 && $submenu->id_submenu != 11 && $submenu->id_submenu != 10) { ?>

                       <li><a href="#" <?php echo $onclick; ?>> <?php echo $submenu->titulo; ?></a></li>
                        
                        <?php }else{?>
                       <li><a href="<?php echo URL.$submenu->url; ?>" <?php echo $onclick; ?>> <?php echo $submenu->titulo; ?></a></li>

                          <?php } ?>
                        
                      <?php endif ?>
                    
                  <?php } ?>
                   </ul>
              </li>
       <?php } ?>

                </ul>
             </div>
          </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE --> 
      <div id="main-content">

