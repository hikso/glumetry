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
                             <img src="<?php echo URL; ?>img/29.jpg" alt="">
                         </div>
                         <a href="profile.html" class="profile-features">
                             <i class="icon-folder-close"></i>
                             <p class="info">Historial clinico</p>
                         </a>
                         <a href="profile_activities.html" class="profile-features ">
                             <i class=" icon-calendar"></i>
                             <p class="info">Esquema de insulina</p>
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
                                 
                             </div>
                         </div>
                         <div class="space15"></div>
                         <div class="row-fluid">
                             <div class="span12 bio form">
                                 <h2> Información de perfil</h2>
                                  <div class="control-group">
                                    <label class="control-label">Tipo de documento</label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" id="ValidSelection" tabindex="1">
                                            <option value="0">--SELECCIONE--</option>
                                            <option value="Category 1">Registro Civil</option>
                                            <option value="Category 2">Tarjeta de Identidad</option>
                                            <option value="Category 3">Cédula de Ciudadanía</option>
                                        </select>
                                    </div>
                                </div>
                                   <div class="control-group ">
                                    <label for="firstname" class="control-label">Número De Identificación</label>
                                    <div class="controls">
                                        <input class="span6 " id="ValidInteger" placeholder="<?php echo $documento ?>" name="firstname" type="text" value="<?php echo $documento ?>">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="firstname" class="control-label">Nombre</label>
                                    <div class="controls">
                                        <input class="span6 " id="ValidField_1" name="firstname" type="text" placeholder="<?php echo $nombre ?>" value="<?php echo $nombre ?>">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Apellido</label>
                                    <div class="controls">
                                        <input class="span6 " id="ValidField_2" name="lastname" type="text" placeholder="<?php echo $apellido ?>" value="<?php echo $apellido ?>">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="email" class="control-label">Correo Electrónico</label>
                                    <div class="controls">
                                        <input class="span6 " id="ValidEmail" name="email" type="email">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                    <button class="btn" type="button">Cancelar</button>
                                </div>

                                 <div class="space10"></div>

                                 <h2>Change Password</h2>

                                 <div class="widget orange">
                                     <div class="widget-title">
                                          <h4><i class="icon-reorder"></i> Sets New Password</h4>
                                           <span class="tools">
                                                <a class="icon-chevron-down" href="javascript:;"></a>
                                                <a class="icon-remove" href="javascript:;"></a>
                                           </span>
                                     </div>
                                     <div class="widget-body ">
                                         <form class="form-horizontal" action="#">
                                             <div class="control-group">
                                                 <label class="control-label">Current Password</label>
                                                 <div class="controls">
                                                     <input type="password" class="span6 ">
                                                 </div>
                                             </div>
                                             <div class="control-group">
                                                 <label class="control-label">New Password</label>
                                                 <div class="controls">
                                                     <input type="password" class="span6 ">
                                                 </div>
                                             </div>
                                             <div class="control-group">
                                                 <label class="control-label">Re-type New Password</label>
                                                 <div class="controls">
                                                     <input type="password" class="span6 ">
                                                 </div>
                                             </div>

                                             <div class="form-actions">
                                                 <button type="submit" class="btn btn-success">Change Password</button>
                                                 <button type="button" class="btn">Cancel</button>
                                             </div>

                                         </form>
                                     </div>
                                 </div>
                                 <div class="text-center">
                                     <button class="btn btn-inverse btn-large "> Save &amp; Continue</button>
                                 </div>
                                 <div class="space20"></div>
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
