 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     Glucometría
   </h3>
   <ul class="breadcrumb">
   </ul>
 </div>
 <div class="span11">
 <div class="alert alert-error s" id="ErrorG" style="display:none">
 </div>
  <div class="alert alert-error s" id="ErrorGu" style="display:none">
  <button class="close" data-dismiss="alert">×</button>
  <strong>Ciudado !</strong>Los niveles de glucosa en sangre ingresados, están fuera del rango recomendado.
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
           <input class="dateC"  size="16" id="fecha" title="Dar clic para consultar glucometria según la fecha." type="text"  value="<?php  echo date("Y/n/j"); ?>" readonly="">
        </div>
      </div>
    </div>
    <p class="spanc"></p>
    <form name="form1" method="post" action="#" id="form1" class="form-horizontal">
      <div class="control-group" id="MomentoSlct">
        <label class="control-label" for="txtMomento">Momento</label>
        <div class="controls">
          <select name="momento" id="momento" class="momento">
            <option>Seleccionar</option>
            <?php foreach ($momentos as $value) { ?>
            <option id="momento" value="<?php echo $value->id_momento ; ?>"><?php echo $value->descripcion; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label " for="glucometria">Nivel Glucometría</label>
        <div class="controls">
          <label >Antes  
            <div style="display: none;" id="idGlucometria" name="idGlucometria"></div>  
            <input maxlength="3"  max="999" min="0" type="number"  class="input-mini cmin1" id="inputAntes" name="rbtnMomentoG" onKeyPress="return soloNumeros(event)">
          </label>
          <label name="rbtnMomentoDespues">Después
            <input maxlength="3" max="999" min="0" type="number" class="input-mini " id="inputDespues" value="inputDespues" onKeyPress="return soloNumeros(event)">
          </label>
        </div>
      </div>
      <div class="control-group formGlucometria">
        <label class="control-label" for="txtComentario">Comentario</label>
        <div class="controls">
          <textarea class="input-xlarge large" maxlength="100" rows="3"   id="txtComentario" name="txtComentario"></textarea>
        </div>
      </div>
      <div class="controls formGlucometria">
        <button class="btn btn-primary" type="button" value="rbtnAntesComida" name="btnGuardarGlucometria" onclick="btnGuardar();" id="btnGuardarGlucometria">Guardar</button>
        <button class="btn btn-primary" type="button" value="rbtnModificar" style="display: none;" name="btnModificaeGlucometria" id="btnModificarGlucometria">Guardar</button>
        <button class="btn btnLimpiar" type="button" style="display: none;" value="rbtnLimpiar1" name="btnLimpiar1" id="btnLimpiar1"><a href="pacientes">Salir</a></button>
        <button class="btn btn-primary btnLimpiar" type="button" style="display: none;" value="rbtnLimpiar" name="btnLimpiar" id="btnLimpiar" onclick="limpiarGLucometria();">Nuevo</button>
      </div>
      <!-- END FORM-->
    </form>
      <div class="alert alert-block alert-info fade in alert1" id="AlertRango">

        <div id="Rango1"></div><div id="TipoRango"></div>

      </div>
  </div>
  <!-- END widget-->
</div>
<textarea  rows="3" style="display: none;" id="SeguimeintoGlucometriaID" name="txtComentario"></textarea>
<div class="span5 glucometria divPo">
  <!-- BEGIN widget-->
  <div class="widget white-full">
   <div class="widget-title">
     <label class="control-label ">Registro glucometría</h4></label>
     <label><a class="btn btn-primary pdf"  name="ºGenerarPDF" id="btnGenerarPDF">Exportar a PDF</a></label>
     <label class="" style="display:none">Rango:<h4 class="rangoBD" id="Recomendado"></h4></label>
   </div>
   <p class="span2"></p>
   <div class="widget-body">
    <table class="table">
      <thead>
        <tr>
          <th>Momento</th>
          <th>Antes</th>
          <th>Después</th>
          <th>Ver</th>
        </tr>
      </thead>
      <tbody  id="tblGlucometria">
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

