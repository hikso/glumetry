<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
      Gestión base alimentaria
    </h3>
    <ul class="breadcrumb">
      <?php echo '<strong>Nombre paciente:</strong> '. $_SESSION["nombre"]. ' ' . $_SESSION['apellido']. ' <br><strong>Documento:</strong> '. $_SESSION['documento']; ?>
    </ul>
    <div id="msg" class="span10">
      
    </div>
    <div class="row-fluid">
      <div class="span7">
        <div class="widget white-full">
         <div class="widget-title">
          <h4>
            Detalles de la base alimentaria
          </h4>
        </div>
        <div class="widget-body form">
          <!-- BEGIN FORM-->
          <div class="control-group">
            <label class="control-label" id="totalCHO"><ul class="breadcrumb" style="background-color:#C4DBFF;">Total consumo CHO diario / - </ul></label>
          </div>

          <?php echo $templateMomento; ?>

        </div>
      </div>
    </div>
    <div class="span4">
      <div class="widget white-full">
       <div class="widget-title">
        <h4>
          Base alimentaria
        </h4>
      </div>
      <div class="widget-body form">

        <div class="control-group">

          <label class="control-label">Fecha de asignación</label>

          <div class="controls">
            <div class="input-append date" id="dpYears" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="month">
              <input class="m-ctrl-medium" size="16" type="text" value="<?php echo date('d/m/Y'); ?>" readonly="">
              <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="span12">
            <!-- BEGIN BASIC PORTLET-->
            <div class="widget white-full">
              <div class="widget-title">
                <h4>Seleccionar estudio para tratamiento</h4>
                <span class="tools">
                  <a href="#" class="icon-question-sign"></a>
                </span>
              </div>
              <div class="widget-body">
                <table class="table" id="tblRecomendaciones">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Siglas</th>
                      <th>Detalles</th>
                      <th>Seleccionar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php $index = 1; ?>
                      <script type="text/javascript">
                       var recom = []; 
                     </script>
                     <?php foreach ($recomendaciones as $value): ?>
                      
                      <script type="text/javascript">
                        var _push = {"id_recomendacion_rango": <?php echo $value->id_recomendacion_rango; ?>, "nombre": "<?php echo $value->descripcion;?>"}
                        recom.push(_push);
                      </script>

                      <td><?php echo $index; ?></td>
                      <td><?php echo $value->siglas; ?></td>
                      <td>
                        <button role='button' href="#ModalDetalles" onclick="cargarModalRecomendacion(this)" id='<?php echo $value->id_recomendacion_rango; ?>'  data-toggle='modal' class='btn btn-small btn-info'>Ver detalles</button>
                      </td>
                      <td>
                        <button role='button' onclick="seleccionarRecomendacion(this)" id='<?php echo $value->id_recomendacion_rango; ?>'  data-toggle='modal' class='btn btn-small btn-info'>Seleccionar</button>
                      </td>
                      <?php $index ++ ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END BASIC PORTLET-->
        </div>

      </div>

    </div>


  </div>

</div>
</div>
</div>
</div>


</div>
<div id="myModal3" class="modal hide fade modalAlimentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel3">Añadir alimentos</h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid" style="display: none;">
      <div class="span6">
        <div class="widget white-full">
          <div class="widget-title">
            <h4>
              Filtro de busqueda
            </h4>
          </div>
          <div class="widget-body">
            <div class="controls">
              <select name="clasificacion" id="clasificacion" class="input-large m-wrap" tabindex="1">
                <option>Seleccionar clasificación</option>
                <?php foreach ($categorias as $value) { ?>
                <option value="<?php echo $value->id_clasificacion; ?>"><?php echo $value->descripcion; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">

<div class="span12">
  <div class="widget white-full">
   <div class="widget-body">
            <div>
              <table style="width: 100%;" class="">
                <tbody><tr>
                  <td style="width: 35%">
                    <div class="d-sel-filter">
                      <span>Filtro:</span>
                      <input type="text" id="box1Filter" name="boxFilter">
                      <button type="button" class="btn btn-info" id="box1Clear"><i class="icon-remove hands icon-white"></i></button>
                    </div>

                    <select id="box1View" multiple="multiple" style="height:300px;width:90%">
                    <?php foreach ($alimentos as $value) { ?>
                    <option value="<?php echo $value->id_alimento; ?>"><?php echo $value->descripcion; ?></option>
                    <?php } ?>
                    </select>
                    <br>

                    <span id="box1Counter" class="countLabel">Showing 13 of 13</span>

                    <select id="box1Storage" style="display: none;">

                    </select>
                  </td>
                  <td style="width: 21%; vertical-align: middle">
                    
                    <button id="to1" class="btn btn-info" type="button"><i class="icon-hand-left hands icon-white"></i></button>

                    <button id="to2" class="btn btn-info" type="button"><i class="icon-hand-right hands icon-white"></i></button>


                  </td>
                  <td style="width: 35%">
                    <div class="d-sel-filter">
                      <span>Filtro:</span>
                      <input type="text" id="box2Filter" name="boxFilter">
                      <button type="button" class="btn btn-info" id="box2Clear"><i class="icon-remove hands icon-white"></i></button>
                    </div>

                    <select id="box2View" multiple="multiple" style="height:300px;width:90%;">
                      
                    </select><br>

                    <span id="box2Counter" class="countLabel">Showing 3 of 3</span>

                    <select id="box2Storage" style="display: none;">

                    </select>
                  </td>
                </tr>
              </tbody></table>
            </div>
  </div>
</div>
</div>
</div>
</div>
<div class="modal-footer">  
  <button id="guardarMomento" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
</div>
</div>
<div id="ModalDetalles" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel3">Detalles</h3>
  </div>
  <div class="modal-body">
    <div class="span2"></div>
    <div class="span8">
      <h3 id="tituloDetalles"></h3>
      <div class="well" id="rangos">

      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
  </div>
</div>
<div class="modal-footer">
  <div class="control-droup">
    <div class="controls">
      <button type='submit' id='btnLimpiar'  name='btnLimpiar' class='btn btn-primary'>Limpiar</button>
      <button type='submit' id='btnGuardar'  name='btnGuardar' class='btn btn-primary'>Guardar</button>
    </div>  
  </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <!--BEGIN METRO STATES-->
  <div class="space10"></div>
  <!--END METRO STATES-->
           <!-- Convertir array de alimentos en JSON  -->
           <?php

           $arrayJSON = array();
           for ($i=0; $i < count($alimentos) ; $i++) { 
            array_push($arrayJSON, (array)$alimentos[$i]);
          }


          ?>
          <script type="text/javascript">
            var alimentosJSON = <?php echo json_encode($arrayJSON) ?>;
          </script>