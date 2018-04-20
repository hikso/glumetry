         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
               </div>
            </div>
                <div id="msg" class="span10">
        
        </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
             <div class="row-fluid">
                 <!-- BEGIN PROFILE PORTLET-->
                 <div class=" profile span12">
                     <div class="span2">
                         <div class="profile-photo">
                             <img src="<?php echo URL; ?>img/29.jpg" alt="">
                         </div>
                         <a href="<?php echo URL; ?>historia_Clinica/historialClinico" class="profile-features">
                             <i class="icon-folder-close"></i>
                             <p class="info">Historial clinico</p>
                         </a>
                         <a href="<?php echo URL; ?>historia_Clinica/historialesClinicos" class="profile-features ">
                             <i class=" icon-archive"></i>
                             <p class="info">Hitoriales clinicos</p>
                         </a>
                         <?php if ($_SESSION['historia'] == 0) { ?>
                             <a href="#" class="profile-features" onclick="AlertarExistenciaHC()">
                                 <i class=" icon-remove-sign"></i>
                                 <p class="info">Gestión base alimentaria</p>
                             </a>    
                         <?php }else{ ?>
                             <a href="<?php echo URL; ?>base_alimentaria/indexMedico" class="profile-features">
                                 <i class=" icon-hand-right"></i>
                                 <p class="info">Gestión base alimentaria</p>
                             </a>
                         <?php } ?>
                     </div>
                     <div class="span10">
                         <div class="profile-head">
                             <div class="span6">
                                 <h1><?php echo $_SESSION["nombre"]. ' ' .$_SESSION['apellido']; ?></h1>
                                 <p>Paciente</p> 
                             </div>

                             <div class="span2">
                             </div>

                             <div class="span4">
                             <?php if ($_SESSION['tipeUser'] == 1): ?>
                                 <a href="<?php echo URL ?>medicos/actualizarPerfil" class="btn btn-edit btn-large pull-right mtop20"> Actualizar </a>
                             <?php endif ?>
                             </div>
                         </div>
                         <div class="space15"></div>
                         <div class="row-fluid">
                             <div class="span8 bio">
                             <div class="space15"></div>
                                 <h2>Información básica</h2>
                                 <p><label>Nombres </label>: <?php echo $_SESSION["nombre"] ?></p>
                                 <p><label>Apellidos </label>: <?php echo $_SESSION['apellido'] ?></p>
                                 <p><label>Tipo documento </label>: <?php echo $_SESSION['tipo_Documento'] ?></p>
                                 <p><label>Documento </label>: <?php echo $_SESSION['documento'] ?></p>
                                 <p><label>Genero </label>: <?php echo $_SESSION['genero'] ?></p>
                                 <p><label>Telefono </label>: <?php echo $_SESSION['telefono'] ?></p>
                                 <p><label>Escolaridad </label>: <?php echo $_SESSION['escolaridad'] ?></p>
                                 <div class="space15"></div>
                                 <hr>
                                 <div class="space20"></div>
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