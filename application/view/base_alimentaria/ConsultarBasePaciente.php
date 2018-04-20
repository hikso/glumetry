 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     Base Alimentaria
   </h3>
   <ul class="breadcrumb">
   </ul>
   <div  class="span10"><div id="ErrorConsulta" style="display:none" class="alert"><button class="close" data-dismiss="alert"></button></div></div>
   <div class="row-fluid">
    <div class="span5">
      <!-- BEGIN widget-->
      <div class="widget white-full">
     <div class="widget-body form alinear">
        <div class="widget white-full">
        <div class="widget-title">
   <label class="control-label">Base Alimentaria</label> 
         <div class="fi">
          <input class="dateC"  size="16" id="fechaConsulta" type="text"  value="<?php  echo date("Y/n/j"); ?>" readonly="">
        
        </div>
  </div>
   <div class="widget-body">
    <table class="table" >
      <thead>
        <tr>
          <th width="80">Fecha</th>
          <th width="60">Total CHO</th>
          <th width="10">Ver</th>
        </tr>
      </thead>
      <tbody  id="TablaConsulta">
      </tbody>
    </table>
  </div>
</div>
 </div>
</div>
<!-- END widget-->
</div>
<div id="Base" style="display:none"></div>
<div class="span6">
  <!-- BEGIN widget-->
  <div class="widget white-full">
   <div class="widget-title">
   <label class="control-label">Detalles Base Alimentaria</label>
  </div>
  <div class="widget-body form switch-form" id="form" style="display:none;">
    <div class="widget-body form table">
     <div id="ErrorConsultaMomento"  class="alert" style="display:none"><button class="close" data-dismiss="alert"></button>No hay alimentos recomendados según el momento seleccionado.</div>
      <!-- BEGIN FORM-->
      <div id="ConsultarForm">
    <div class="">Momento:
      <select name="momento" id="momento" class="input-large m-wrap momentoConsulta" tabindex="1">
        <option>Seleccione</option>
        <?php foreach ($momento as $value) { ?>
        <option value="<?php echo $value->id_momento; ?>"><?php echo $value->descripcion; ?></option>
        <?php } ?>
      </select>
      </div>
      <br>
      <div>Total de carbohidratos por momento: <div id="TotalCarbohidratos" class="total"></div></div>
      <br></br>
      <div class="span6">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget blue tableConsulta">
                           
                            <div class="widget-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Alimentos</th>
                                        <th>Carbohidratos</th>
                                        <th>Índice Glucémico</th>
                                    </tr>
                                    </thead>
                                    <tbody id="alimentos">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                    <div class="alert alert-block alert-info fade in alertConsulta">
                              <h4 class="alert-heading">   Niveles de glucosa recomendados</h4>
                              <p>
                              <br>
                                <div id="antes"></div>
                                <div id="despues"></div>
                              </p>
                          </div>
                          </div>
    <!--</form>-->
    </div>
  </div>
</div>
</div>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <!--BEGIN METRO STATES-->
  <div class="space10"></div>
  <!--END METRO STATES-->
</div>
</div>
<!-- END PAGE CONTENT-->  
