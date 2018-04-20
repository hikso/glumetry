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
 <link href="<?php echo URL; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" />
 <link href="<?php echo URL; ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
 <link href="<?php echo URL; ?>bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/jquery-tags-input/jquery.tagsinput.css"/>
 <link href="<?php echo URL; ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="<?php echo URL; ?>css/style-slide.css" rel="stylesheet" />
 <link href="<?php echo URL; ?>css/glumetry.css" rel="stylesheet" />
 <link href="<?php echo URL; ?>css/style-responsive.css" rel="stylesheet" />
 <link href="<?php echo URL; ?>css/style-default.css" rel="stylesheet" id="style_color" />
 <link href="<?php echo URL; ?>jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
 <link href="<?php echo URL; ?>assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/jquery.validate.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/stylev.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/data-tables/DT_bootstrap.css">
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/nestable/jquery.nestable.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>media/css/jquery.dataTables.css">
 <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/bootstrap-datepicker/css/datepicker.css">
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
<!-- END SIDEBAR -->
<!-- BEGIN PAGE --> 
<div id="main-content" style="margin-left: 0px;">


 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span6">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     BIENVENIDO <strong><?php echo $userName ?></strong>
   </h3>
   <!-- END PAGE TITLE & BREADCRUMB-->
 </div>
</div>

<div class="row-fluid">
  <div class="span12">
    <div class="widget-body">
      <!--BEGIN METRO STATES-->
      <div class="row-fluid">
        <!--BEGIN METRO STATES--> 
        <div class="space20"></div>
        <div class="metro-nav metro-fix-view">
        
        <div></div>
                 <div class="metro-nav-block nav-light-green long">
          <a class="text-center" data-original-title="" href="<?php echo URL ?>/medicos/AtencionPacientes">
            <span class="value">
              <i class="icon-stethoscope"></i>
            </span>
          </a>
          <div class="status">Atención a pacientes.</div>
        </div>

        <!-- <div class="metro-nav-block nav-light-green">
          <a href="#ModalAcerca" role="button" class="btn" data-toggle="modal">
            <i class=" icon-indent-right"></i>
          </a>
          <div class="info">Acerca de</div>
          <div class="status">Información</div>
        </div> -->
        <!-- <a href="#ModalAcerca" role="button" class="btn" data-toggle="modal">Launch demo modal</a> -->
        <!-- Modal -->
        <!-- <div id="ModalAcerca" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal header</h3>
          </div>
          <div class="modal-body">
            <p>One fine body…</p>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
          </div>
        </div>
 -->
        
        <div></div>  
      </div>
      <div class="metro-nav">
        <div class="metro-nav-block nav-light">
        </div>
        <div class="metro-nav-block ">
        </div>
        <div class="metro-nav-block">
        </div>

        <div class="metro-nav-block nav-light double">

        </div>

        <div class="metro-nav-block ">
        </div>    
      </div>
    </div>
  </div>
  <!--END METRO STATES-->
</div>
<div class="clearfix"></div>
<!--END METRO STATES-->
</div>

</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->  
</div>
<!-- END CONTAINER -->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->  
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div id="footer">
 2015 &copy; Glúmetry.
</div>
<!-- END FOOTER -->
<script>
  var url = "<?php echo URL; ?>";
</script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery.js"></script>

<script src="<?php echo URL; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>AJAX/ajaaxDatos.js"></script>
<script src="<?php echo URL; ?>js/ajax/application.js"></script>
<script src="<?php echo URL; ?>js/ajax/appAjax.js"></script>
<script src="<?php echo URL; ?>js/ajax/appHc.js"></script>
<script src="<?php echo URL; ?>js/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<!-- BEGIN JAVASCRIPTS -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="<?php echo URL; ?>js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo URL; ?>jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/jquery-tags-input/jquery.tagsinput.min.js"></script>

<!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="<?php echo URL; ?>jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="<?php echo URL; ?>chart-master/Chart.js"></script>
   <script src="<?php echo URL; ?>js/jquery.scrollTo.min.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>

   <!--common script for all pages-->
   <script src="<?php echo URL; ?>js/common-scripts.js"></script>
   <script src="<?php echo URL; ?>js/easy-pie-chart.js"></script>
   <script src="<?php echo URL; ?>js/jQuery.dualListBox-1.3.js" type="text/javascript"></script>
   <script src="<?php echo URL; ?>assets/nestable/jquery.nestable.js" language="javascript" type="text/javascript"></script>
   <script src="<?php echo URL; ?>js/nestable.js" language="javascript" type="text/javascript"></script>
   <script src="<?php echo URL; ?>AJAX/ajaax.js"></script>
   <script src="<?php echo URL; ?>AJAX/ajaxAli.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>js/jquery.pulsate.min.js"></script>
   <script>
     var url = "<?php echo URL; ?>";
   </script>
   <script type="text/javascript" language="javascript" src="<?php echo URL; ?>media/js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo URL; ?>resources/syntax/shCore.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo URL; ?>resources/demo.js"></script>
   <script type="text/javascript" language="javascript" class="init">