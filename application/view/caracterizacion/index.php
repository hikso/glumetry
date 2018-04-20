         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Caracterización
                   </h3>
                   <ul class="breadcrumb">
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
             <div class="row-fluid">
                 <!-- BEGIN PROFILE PORTLET-->
                 <div class=" profile span12">
                     <div class="span2">
                         <div class="profile-photo">
                             <img src="<?php echo URL; ?>img/Afro-monkey.jpg" alt="">
                         </div>
                         <a href="profile.html" class="profile-features active">
                             <i class=" icon-user"></i>
                             <p class="info">Historial clinico</p>
                         </a>
                         <a href="profile_activities.html" class="profile-features ">
                             <i class=" icon-calendar"></i>
                             <p class="info">Esquema de insulina</p>
                         </a>
                         <a href="profile_contact.html" class="profile-features ">
                             <i class=" icon-phone"></i>
                             <p class="info">Gestón alimentos</p>
                         </a>
                     </div>
                     <div class="span10">
                         <div class="profile-head">
                             <div class="span6">
                                 <h1><?php echo $userName ?></h1>
                                 <p>Paciente</p> 
                             </div>

                             <div class="span2">
                             </div>

                             <div class="span4">
                                 <a href="<?php echo URL ?>caracterizacion/actualizarPerfil" class="btn btn-edit btn-large pull-right mtop20"> Actualizar </a>
                             </div>
                         </div>
                         <div class="space15"></div>
                         <div class="row-fluid">
                             <div class="span8 bio">
                             <div class="space15"></div>
                                 <h2>Biografia</h2>
                                 <p><label>Nombres </label>: <?php echo $nombre ?></p>
                                 <p><label>Apellidos </label>: <?php echo $apellido ?></p>
                                 <p><label>Tipo documento </label>: <?php echo $tipoDocumento ?></p>
                                 <p><label>Documento </label>: <?php echo $documento ?></p>
                                 <p><label>Genero </label>: <?php echo $genero ?></p>
                                 <p><label>Celular </label>: <?php echo $celular ?></p>
                                 <p><label>Telefono </label>: <?php echo $telefono ?></p>
                                 <p><label>Fecha de nacimiento </label>: <?php echo $fechaNacimiento ?></p>
                                 <p><label>Domicilio </label>: <?php echo $domicilio ?></p>
                                 <p><label>Escolaridad </label>: <?php echo $escolaridad ?></p>
                                 <div class="space15"></div>
                                 <hr>
                                 <div class="space20"></div>
                             </div>
                             <div class="span4">
                                 <div class="profile-side-box green">
                                     <h1>Novedades</h1>
                                     <div class="desk">
                                         <div class="row-fluid experience">
                                             <h4>Novedad</h4>
                                             <p>Descripcion</p>
                                             <a href="#"> Ir a </a>
                                         </div>
                                         <div class="row-fluid experience">
                                             <h4>Novedad</h4>
                                             <p>Descripcion</p>
                                             <a href="#"> Ir a </a>
                                         </div>
                                         <div class="row-fluid experience">
                                             <h4>Novedad</h4>
                                             <p>Descripcion</p>
                                             <a href="#"> Ir a </a>
                                         </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- END PROFILE PORTLET-->
             </div>
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->