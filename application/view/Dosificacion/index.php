 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     Dosificación
   </h3>
   <ul class="breadcrumb">
   </ul>
 </div>
 <div class="span11">
 <div class="alert alert-error s" id="ErrorDosi" style="display:none">
 </div>
  <div class="alert alert-success s" id="Registro" style="display:none">
  <strong>Registro Exitoso !</strong>
 </div> 
</div>
 <div class="row-fluid">
  <div class="span6">
    <!-- BEGIN widget-->
    <div class="widget white-full">
      <div class="widget-title form-horizontal">
       <div class="control-group">
         <label class="control-label">Fecha</label>
         <div class="controls">
            <input class="dateC"  size="16" id="fechaDosificacion" type="text"  value="<?php  echo date("Y/n/j"); ?>" readonly="">
        </div>
      </div>
    </div>
    <p class="spanc"></p>
    <form name="form1" method="post" action="#" id="form1" class="form-horizontal">
      <div class="control-group" id="MomentoSlct">
        <label class="control-label" for="txtTipoDosificacion">Tipo de insulina</label>
        <div class="controls">
          <select name="tipoDosificacion" id="tipoDosificacion" class="selecDosi">
            <option id="select">Seleccionar</option>
            <?php foreach ($dosificacion as $value) { ?>
            <option value="<?php echo $value->id_tipo_dosificacion ; ?>"><?php echo $value->tipoDosificacion; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="Dosificacion">Unidades de insulina</label>
        <div class="controls">
            <input maxlength="3" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;"  max="99" min="0" type="number" placeholder="1" class="input-mini" id="dosis" name="Glucometria"  onKeyPress="return soloNumeros(event)">
        </div>
      </div>
      <div class="control-group formGlucometria">
        <label class="control-label" for="txtComentarioDosificacion">Comentario</label>
        <div class="controls">
          <textarea class="input-xlarge " rows="3"  maxlength="100" id="txtComentarioDosificacion" name="txtComentarioDosificacion"></textarea>
        </div>
      </div>
      <select name="id" id="id" style="display: none;">
        <?php foreach ($id as $value) { ?>
        <option  value="<?php echo $value->idb ; ?>"><?php echo $value->idb; ?></option>
        <?php } ?>
      </select>
      <div class="controls formGlucometria">
          <button class="btn btn-primary" type="button" value="rbtnAntesComida" name="btnGuardarDosificacion" onclick="GuadarDisificacion();" id="btnGuardarDosificacion">Guardar</button>
          <button class="btn btn-primary" type="button" style="display:none;" name="btnNuevo" onclick="NuevoDosificacion();" id="btnNuevo">Nuevo</button>
          <button class="btn " type="button" value="rbtnLimpiar1" name="btnLimpiar1" id="btnLimpiar1"><a href="pacientes">Salir</a></button>
      </div>
      <!-- END FORM-->
    </form>
      
  </div>
  <!-- END widget-->
</div>

<div class="span6 glucometria divPo">
  <!-- BEGIN widget-->
  <div class="widget white-full">
   <div class="widget-title">
     <label class="control-label ">Registro dosificación</h4></label>
   </div>
   <p class="span2"></p>
   <div class="widget-body">
    <table class="table">
      <thead>
        <tr>
          <th width="100">Unidades de insulina</th>
          <th width="100">Tipo de insulina</th>
          <th width="100">Comentario</th>
        </tr>
      </thead>
      <tbody  id="tblDosificacion">
      </tbody>
    </table>
  </div>
</div>
</div>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <!--BEGIN METRO STATES-->
  <div class="space10"></div>
  <!--END METRO STATES-->
</div>
