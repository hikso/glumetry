</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->  
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div id="footer">
 2015 &copy; Glúmetry.
 <a data-toggle='modal' data-target='#ModalAcercaDeM'> <i class="icon-gears"></i>Acerca de</a>
    <div class="modal fade" id="ModalAcercaDeM" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Acerca de GLUMETRY</h4>
                </div>
                <div class="modal-body"><!--ContenidoModal-->
                  <P ALIGN="justify">GLUMETRY
                  <br />
                  La gestión de la información de una  persona diagnosticada con diabetes es muy importante, debido que su estilo de vida  depende de esta. Glúmetry como herramienta de ayuda en dicha gestión brinda a los usuarios un manejo de datos práctico y versátil el cual  facilita el seguimiento de la enfermedad.
                  <br />
                  En la búsqueda de un registro completo de datos importantes de un paciente que padezca Diabetes, Glúmetry posee un registro de historial médico de la  enfermedad el cual es gestionado por médicos quienes también acceden a la aplicación.
                  La alimentación en la diabetes es un factor clave del cual dependerá el estado de salud del paciente, es muy útil contar con una herramienta que facilite  la tediosa actividad de calcular la cantidad de carbohidratos a consumir; por esto la implementación de un “Contador de carbohidratos” es un valor agregado de este sistema debido que con una concienzuda administración ayudara en su diario vivir.
                  En realidad la disciplina que ejerza el paciente en su autogestión  en procesos como el registro de sus glucómetrias y la dosificación que se administre, harán que el seguimiento  de la enfermedad sea más precisa y se obtengan datos confiables.
                  </p>
                </div><!--end ContenidoModal-->
                <div class="modal-footer">
                    <button class="btn btn-success align: right" >Aceptar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- data-target='#Navegacion' -->
    <a data-toggle='modal' href="#" data-target='#dialog' > <i class="icon-credit-card"></i> Navegación</a>
    <div class="modal fade" id="Navegacion" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Acerca de GLUMETRY</h4>
                </div>
                <div class="modal-body"><!--ContenidoModal-->
                <!-- <img style="width:400px;" class="center"  src="<?php echo URL; ?>img/Sitemap.png"> -->
                <IMG src="<?php echo URL; ?>img/Sitemap.png">
                </div><!--end ContenidoModal-->
                <div class="modal-footer">
                    <button class="btn btn-success align: right" >Aceptar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="dialog" class="modal hide dialog1" data-target='#Navegacion' aria-hidden="false">
        <div class="modal-body">
            <div>
            <IMG  src="<?php echo URL; ?>img/Sitemap.png">
            </div>
        </div>
    </div>
    <style>
    
    .modal.dialog1 { /* customized styles. this way you can have N dialogs, each one with its own size styles */
    width: 60%;
    height: 75%;
    left: 20%; /* ( window's width [100%] - dialog's width [60%] ) / 2 */
    padding: 1em 2em;
    margin: 1em 2%;

}

/* media query for mobile devices */
@media ( max-width: 480px ) {
    .modal.dialog1 {
        height: 120%;
        left: 20%; /* ( window's width [100%] - dialog's width [90%] ) / 2 */
        top: 20%;
        width: 90%;
    }
}

/* split the modal in two divs (header and body) with defined heights */
.modal .modal-header {
    height: 20%;
}

.modal .modal-body {
    height: 90%;
}

/* The div inside modal-body is the key; there's where we put the content (which may need the vertical scrollbar) */
.modal .modal-body div {
    height: 100%;
    overflow-y: auto;
    width: 100%;
}</style>
</div>
<!-- END FOOTER -->
<script>
  var url = "<?php echo URL; ?>";
</script> 
<script src="<?php echo URL; ?>js/jquery.ui.datepicker.js"></script>

<script src="<?php echo URL; ?>bootstrap/js/bootstrap.min.js"></script>


<script src="<?php echo URL; ?>js/ajax/application.js"></script>
<script src="<?php echo URL; ?>js/ajax/appAjax.js"></script>
<script src="<?php echo URL; ?>js/ajax/appHc.js"></script>
<script src="<?php echo URL; ?>js/ajax/consultaBase.js"></script>
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

<!-- include alertify script -->

   <script src="<?php echo URL; ?>js/alertify.js" type="text/javascript"></script>
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
  
   <script type="text/javascript" src="<?php echo URL; ?>js/jquery.pulsate.min.js"></script>
   <script>
     var url = "<?php echo URL; ?>";
   </script>
   <script type="text/javascript" language="javascript" src="<?php echo URL; ?>media/js/jquery.dataTables.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo URL; ?>resources/syntax/shCore.js"></script>
   <script src="<?php echo URL; ?>AJAX/ajaxMaestras.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo URL; ?>resources/demo.js"></script>
   <script type="text/javascript" language="javascript" class="init">

     $(document).ready(function() {
      $('#tblListarEmpleados').DataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> pacientes',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ pacientes",
          "sInfo": "Mostrando _TOTAL_ de _END_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
    });
   </script>
   <script type="text/javascript" language="javascript" class="init">
   //DataTable Usuarios
   var DataTableUsuarios;
     $(document).ready(function() {
      DataTableUsuarios = $('#tblListarUsuarios').dataTable({
        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> usuarios',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ pacientes",
          "sInfo": "Mostrando  _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
                      //       $('#tablaTipoDocumentos').DataTable({
                      //       "oLanguage": {
                      //       "sZeroRecords": "No se encontraron concidencias",
                      //       "sSearch": "Buscar: ",
                      //       "sLengthMenu": "",
                      //       "sInfoEmpty": "Sin datos para mostrar",
                      //       "sInfoFiltered": " - Tipos Documentos",
                      //       "sInfo": "Tipos Documentos _END_ de _TOTAL_",
                      //       "sEmptyTable": "Información no disponible",
                      //          "oPaginate": {
                      //          "sPrevious": "<< ",
                      //          "sNext": ">>",
                      //          "sLast": "Última",
                      //          "sFirst": "Primera",
                      //          "pagingType": "full_numbers"
                      //          }                               
                      //     }
                      // });
    });
   </script>
   <script type="text/javascript" language="javascript" class="init">
     $(document).ready(function() {
      $('#tblHistorialBases').DataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
    });
     
   </script>
    <script type="text/javascript" language="javascript" class="init">
     
    var TablaGenero = $('#tablaGenero').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          'retrieve: true'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
  

    var TipoDocumentoTabla = $('#tablaTipoDocumentos').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

    var EstadoCivilTabla = $('#tablaEstadoCivil').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

    var TablaEspecializacion = $('#tablaEspecializacion').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

    var TablaEscolaridad = $('#tablaEscolaridad').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
   
   var TablaDepartamento = $('#tablaDepartamentos').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

   var TablaMunicipio = $('#tablaMunicipios').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var TablaHabitosPersonales = $('#tablaHabitosPersonales').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var TablaHabitosPersonales = $('#tablaFrecuencia').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var TablaTipoAntecendente = $('#TablaTipoAntecedente').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });


      var TablaDistribucionAntecedente = $('#TablaDistribucionAntecedente').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
      

      var TablaPartesDelCuerpo = $('#TablaPartesDelCuerpo').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var TablaDistribucionPartesCuerpo = $('#TablaDistrinucionPartesDelCuerpo').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var tablaEstadoDistribucionPartesCuerpo = $('#tablaEstadoDistribucionPartesCuerpo').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var TablaAparatoSistema = $('#tablaAparatoSistema').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var tablaMomento = $('#TablaMomento').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });



      var tablaParente = $('#TablaParentesco').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });


     

      var tablaRecomenda = $('#TablaRecomendacion').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var tablaTipoRango = $('#TablaTipoRango').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });

      var TablaRango = $('#TablaRangos').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });



      var tablaClasificacion = $('#TablaClasificacionM').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });



      var tablaAlimentos = $('#TablaAlimentosM').dataTable({

        "oLanguage": {
          "sZeroRecords": "No se encontraron coincidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> resultados',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ resultados",
          "sInfo": "Mostrando _END_  de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });










     
     
     
   </script>
   <script>
    $.datepicker.regional['es'] = {
     closeText: 'Cerrar',
     prevText: '<Ant',
     nextText: 'Sig>',
     currentText: 'Hoy',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
     weekHeader: 'Sm',
     dateFormat: 'dd/mm/yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: ''
     };
     $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function() {
    $( "#dpFechaNacimiento" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });
  });


    $('#fechaDosificacion').on('change', function(ev){
      document.getElementById('Registro').style.display = 'none';
      ConsultarDosificacion();
      $(this).datepicker('hide');
    });
     $(function() {
      $( "#fechaDosificacion" ).datepicker({
        startDate: '-3y',
        dateFormat : 'yy/m/d',
        maxDate: '0'                        
      });
    });

     $('#fechaConsulta').on('change', function(ev){
      
 
      $(this).datepicker('hide');
    });
     $(function() {
      $( "#fechaConsulta" ).datepicker({
        startDate: '-3y',
        dateFormat : 'yy/m/d',
        maxDate: '0'                        
      });
    });
</script>
<script src="<?php echo URL; ?>js/dynamic-table.js"></script>
<script language="javascript" type="text/javascript">

 $(function() {

   $.configureBoxes();

 });

 $(function() {
    $( "#element1" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });

    $( "#element2" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });

    $( "#element3" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });

    $( "#element4" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });

    $( "#element5" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });

    $( "#element6" ).datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            dateFormat : 'yy/m/d',
            maxDate: "0D" });
    $( ".datepicker" ).datepicker({

            inline: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            minDate: "-120Y",
            maxDate: "0D" });

  });

</script>

<!-- END JAVASCRIPTS --> 
</body>
<!-- END BODY -->
<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Nov 2014 07:14:16 GMT -->
</html>
