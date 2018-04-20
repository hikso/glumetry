<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
      Historial bases alimentarias
    </h3>
    <ul class="breadcrumb">
      <?php echo '<strong>Nombre paciente:</strong> '. $_SESSION["nombre"]. ' ' . $_SESSION['apellido']. ' <br><strong>Documento:</strong> '. $_SESSION['documento']; ?>
    </ul>
    <div id="msg" class="span10">

    </div>
    <div class="row-fluid">
      <div class="span1"></div>
      <div class="span11">
        <div class="widget white-full">
         <div class="widget-title">
          <h4>
            Historial de  <?php echo $_SESSION["nombre"]; ?> 
          </h4>
        </div>
        <div class="widget-body form">
          <!-- BEGIN FORM-->
          <div class="control-group">
            <table class="table table-striped" id="tblHistorialBases">
              <thead>
                <tr>
                  <th>Index</th>
                  <th>Fecha de asignación</th>
                  <th>Total Carbohidratos diarios</th>
                  <th>Recomendación o tratamiento</th>
                  <th>Ver detalles</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $index = 1; ?>
                  <?php foreach ($baseAlimen as $value): ?>

                    <td><?php echo $index; ?></td>
                    <td><?php echo $value->fecha_asignacion; ?></td>
                    <td><?php echo $value->totalCho; ?></td>
                    <td><?php echo $value->recomendacion; ?></td>
                    <td>
                      <button role='button' href="#ModalDetalles" onclick="cargarModalBase(this)" id='<?php echo $value->id_base_alimentaria; ?>'  data-toggle='modal' class='btn btn-small btn-info'>Detalles</button>
                    </td>
                    <?php $index ++ ?>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>


  </div>

</div>
</div>
</div>

<div id="ModalDetalles" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel3">Detalles</h3>
  </div>
  <div class="modal-body" id="cargarAliBase">


  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
  </div>
</div>