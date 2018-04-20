     <!-- BEGIN PAGE CONTAINER-->
     <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->   
        <div class="row-fluid">
           <div class="span12">
              <!-- BEGIN PAGE TITLE & BREADCRUMB-->
               <h3 class="page-title">
                Historiales paciente
               </h3>
               <ul class="breadcrumb">
                <?php echo '<strong>Nombre paciente:</strong> '. $_SESSION["nombre"]. ' ' . $_SESSION['apellido']. ' <strong>Documento:</strong> '. $_SESSION['documento']; ?>

                   <li class="pull-right search-wrap">
                       <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                           <div class="input-append search-input-area">
                               <input class="" id="appendedInputButton" type="text">
                               <button class="btn" type="button"><i class="icon-search"></i> </button>
                           </div>
                       </form>
                   </li>
               </ul>
               <!-- END PAGE TITLE & BREADCRUMB-->
           </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <!--BEGIN METRO STATES-->
            <div class="metro-nav metro-fix-view">
                <?php foreach ($visitas_Historias as $key) { ?>

                        <div class="metro-nav-block nav-block-orange double">
                            <a  href="<?php echo URL.'historia_Clinica/descargarPdf?download_file='.$key->urlpdf.'.pdf'; ?>" data-original-title="">
                                <i class="icon-folder-close"></i>
                                <div class="info" style="font-size: 80%;   top: 22px;">Fecha: </div>
                                <div class="info" style="font-size: 80%;"><?php echo $key->fecha; ?></div>
                                <div class="info" style="font-size: 80%;  top: 70px;">Hora: <?php echo $key->hora; ?></div>
                                <div class="status" style="font-size: 12px;">Responsable: <?php echo $key->nombre_medico; ?></div>
                            </a>
                        </div>

                <?php } ?>
            </div>

            <div class="space10"></div>
      
                            
                    </div>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT-->
     </div>