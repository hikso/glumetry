<!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     Dosificaciones registradas.
   </h3>
   <ul class="breadcrumb">
    <?php echo '<strong>Nombre paciente:</strong> '. $_SESSION["nombre"]. ' ' . $_SESSION['apellido']. ' <br><strong>Documento:</strong> '. $_SESSION['documento']; ?>
   </ul>
 </div>
 <div class="row-fluid">
<div class="span12 glucometria divPo">
  <!-- BEGIN widget-->
  <div class="widget white-full">
   <div class="widget-title">
     <label class="control-label ">Registros</h4></label>
   </div>
   <p class="span2"></p>
   <div class="widget-body">
    <table name="DataTable" class="table">
      <thead>
        <tr>
          <th width="100">Fecha de dosificación</th>        
          <th width="100">Tipo de dosificación</th>        
          <th width="100">Cántidad</th>        
          <th width="100">Observaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Dosificacion as $value) { ?> 
        <tr>
          <td><?php echo $value->fecha; ?></td>
          <td><?php echo $value->tipo_doci; ?></td>
          <td><?php echo $value->cantidad; ?></td>
          <td><?php echo $value->observaciones; ?></td>
        </tr> 
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>