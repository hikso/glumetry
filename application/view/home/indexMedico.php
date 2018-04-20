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
   <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">


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
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE --> 
      <div id="main-content" style="margin-left: 0px;">
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
           <h3 class="page-title">
               Atención a pacientes. 
           </h3>
           <ul class="breadcrumb">

           </ul>
           <div id="msg" class="span10"><?php echo $this->msg; ?></div>
       </div>
   </div>

   <!-- END PAGE HEADER-->
   <!-- BEGIN PAGE CONTENT-->
   <div class="row-fluid">
      <div class="span12">
          <div class="control-group">
           <!-- BEGIN EXAMPLE TABLE widget-->
           <div class="widget white-full">
               <div class="widget-title">
                   <h4> Listado de pacientes</h4>
               </div>

               <div class="widget-body">
                   <div class="space15"></div>
                   <table id="tblListarEmpleados" class="table table-striped table-bordered dataTable no-footer">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Teléfono</th>
                            <th>Género</th>
                            <th>Realizar consulta</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                        $identificador = 0;
                        $pacientes = array();
                        ?>
                        <?php foreach ($paciente as $value) { ?>
                        <?php $pacientes[] = $value->id_paciente; ?>
                        <tr>
                            <td><?php echo $value->primer_nombre. ' ' . $value->segundo_nombre; ?></td>
                            <td><?php echo $value->primer_apellido.' '. $value->segundo_apellido; ?></td>
                            <td><?php echo $value->documento; ?></td>
                            <td><?php echo $value->departamento; ?></td>
                            <td><?php echo $value->municipio; ?></td>
                            <td><?php echo $value->telefono; ?></td>
                            <td><?php echo $value->genero; ?></td>
                            <td><button value="<?php echo $identificador; ?> " class="btn btn-primary" onclick="seleccionarPaciente(this)">Seleccionar paciente</button>
                            </td>
                            <?php $identificador++ ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE widget-->
    </div>

    <!--BEGIN METRO STATES-->
    <div class="space10"></div>
    <!--END METRO STATES-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
<script type="text/javascript">
    var arrayPacientes=<?php echo json_encode($pacientes);?>;
</script>
