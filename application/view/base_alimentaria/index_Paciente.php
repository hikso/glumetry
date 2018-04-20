
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     Contador de carbohidratos 
   </h3>
   <ul class="breadcrumb">
   </ul>
   <div  class="span10"><div id="Error" style="display:none" class="alert"><button class="close" data-dismiss="alert">×</button>ygh</div></div>
   <div class="row-fluid">
    <div class="span4">
      <!-- BEGIN widget-->
      <div class="widget white-full">
        <div class="widget-title form-horizontal">
         <div class="control-group">
          <label class="control-label">Fecha de asignación</label>
          <?php foreach ($Base_alimentariafecha as $value) { ?>
          <label>
           <h4 class="controls" id="fecha">
             <?php
             echo $value->fecha_asignacion;?>
           </h4>
         </label> 
         <?php }?>
       </div>
     </div>
     <div class="widget-body form">
      <!-- BEGIN FORM-->
      <form class="form-horizontal AdvancedForm" action="#">
        <div class="control-group">
          <label class="control-label negrilla" id="alimento">Seleccione el alimento</label>
          <a href="#myModal1" role="button" class="btn btn-primary pull-left btnSelect" data-toggle="modal">Seleccionar</a>
        </div> 
         <div style="display:none;"  id="IdBaseAlimentaria"></div> 
        <div class="control-groupz">
        <label class="radio ">
            Calcular por:
        </label>
           <input max="10000"   maxlength="5" min="0" type="number" class="input-mini gramos" id="Valid" value="100"  disabled>
          <div class="controls radioBtn">
               <label class="radio">
               <input type="radio" name="radioTipoConversion" id="Gramos" value="Gramos" disabled checked>
                  Gramos
              </label>
              <label class="radio radioBtn">
                <input type="radio" name="radioTipoConversion" id="carbohidratos" value="carbohidratos" disabled>
                Carbohidratos
              </label>
          </div><p></p>
          <div class="control-group" style="display:none">
          <label class="radio unidadesLabel">
            Unidades a consumir
          </label>
          <div class="controls">
           <input max="99"  maxlength="3" min="0" type="number" class="input-mini unidades" id="ValidInteger" disabled >
         </div>
       </div>
            <label class="control-label">Índice glucémico:  </label>
            <div class="controls">
              <label class="control-label" id="ig" disabled >0  </label>
            </div>
        </div>  
        <br></br>                              
        <ul class="breadcrumb">
        </ul>
        <div id='alimentos'>
          <div class="control-group">
              <label class="control-label" style="display:none">Unidades equivalentes:  </label>
              <div class="controls" style="display:none">
                <label class="control-label" id="UnidadesEquivalentes" value="1" disabled >0</label>
              </div>
              <label class="control-label">Proteínas:  </label>
              <div class="controls">
                <label class="control-label" id="proteinas" disabled >0</label>
              </div>  
              <label class="control-label">Grasas:  </label>
              <div class="controls">
                <label class="control-label" id="grasas" disabled > 0</label>
              </div>
              <label class="control-label">Carbohidratos:  </label>
              <div class="controls">
                <label class="control-label" id="cho" disabled >0</label>
              </div>
          </div>
        </div>
        <ul class="breadcrumb">
        </ul>
       <div class="control-group">
        <div class="controls">
         <button class="btn btn-primary" type="button" id="btnAgregar">Agregar</button> 
       </div>      
       <button class="btn btn-primary limpiar" type="button" onclick="limpiarAlimento();" id="btnLimpiar">Limpiar</button>
     </div>

   </form>
   <!-- END FORM-->
 </div>
</div>
<!-- END widget-->
</div>
<div class="span8">
  <!-- BEGIN widget-->
  <div class="widget white-full">
   <div class="widget-title">
   <label class="control-label">Total carbohidratos permitidos:</label>
          <label>
           <h4 class="carbohidratos" id="Carbohidratos">
           </h4>
         </label> 
  </div>
  <div class="widget-body form switch-form">
    <div class="widget-body form table">
      <!-- BEGIN FORM-->
      <form class="form-horizontal" action="#">
        <div class="widget-body">
          <table id="tblAlimentos" class="table table-striped table-bordered table-advance table-hover">
            <thead>
              <tr>
                <th>Alimento</th>
                <th>Peso</th>
                <th>Unidad de medida</th>
                <th>Carbohidratos</th>
                <th>Proteínas</th>
                <th>Grasas</th>
                <th>Índice glucémico</th> 
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="control-group">
          <div"controls">
          <label class="control-label negrilla">Carbohidratos totales:  </label>
          <div class="controls">
            <label class="control-label negrilla" id="lbltotalCarbohidratos" disabled >0</label>
          </div>
        </div>  
      </div>
    </form>
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

<!-- END PAGE CONTENT-->  
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
    <h3 id="myModalLabel1">Seleccionar alimento</h3>
  </div>
  <div class="modal-body">
    <form name="form1" method="post" action="#" id="form1">

      <div>
        <table style="width: 100%;"  id="base" lass="">
          <tbody><tr>
            <td style="width: 35%">
              <div class="d-sel-filter">
                <span>Filtrar:  </span>
                <div class="controls">
                  <div class="input-append">
                    <input type="text" id="box1Filter" class="buscar">
                    <div id="search"></div>
                    <div class="control-group">
                      <div class="controls">
                        <form class= <?php echo URL; ?>"base_alimentaria/Clasificacion" method="POST">
                          <select name="clasificacion" id="clasificacion" class="input-large m-wrap slec" tabindex="1">
                            <option>Seleccionar clasificación</option>
                            <?php foreach ($clasificacion as $value) { ?>
                            <option value="<?php echo $value->id_clasificacion; ?>"><?php echo $value->descripcion; ?></option>
                            <?php } ?>
                          </select>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <br>
            <br>
            <br> 
              <div class="Alimentos negrilla" style="display:none">Alimentos Recomendados</div>
              <select id="box1View" multiple="multiple"  style="height:300px;width:70%;" class="left" >
              </select>

              <select id="AlimentosRecomendados" style="display:none" multiple="multiple">
              </select>


              <select id="box1Storage" style="display: none;">

              </select>
            </td>


          </tr>
        </tbody>
      </table>
    </div>

    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
    <button class="btn btn-primary" id="seleccionarAlimento" data-dismiss="modal">Aceptar</button>
  </div>
</div>



               

