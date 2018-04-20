<!-- BEGIN PAGE CONTAINER -->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     HISTORIA CLINICA
   </h3>
   <ul class="breadcrumb">
    <?php echo '<strong>Nombre paciente:</strong> '. $_SESSION["nombre"]. ' ' . $_SESSION['apellido']. ' <br><strong>Documento:</strong> '. $_SESSION['documento']; ?>
  </ul>
  <div id="msg" class="span10">
    <?php echo "$msg"; ?>
  </div>
  <!-- END PAGE TITLE & BREADCRUMB-->
</div>
</div>

<span></span>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <!--BEGIN METRO STATES-->
  <div class="space10"></div
    <!--END METRO STATES-->
    
    <div class="widget box white-full">
      <div class="widget-title">
        <h4 id="title-widget">Formulario: Ficha de identificación
        </h4>
        <span class="tools">
        </span>
      </div>
      <div class="widget-body">

        <div class="progress progress-info progress-striped active">
          <div class="bar" style="width: 25%;"></div>
        </div>
        <div class="" method ="POST">
          <div id="tabsleft" class="tabbable tabs-left">
            <ul class="nav nav-tabs">
              <li name="li" class="active" id="1"><a href="#tabsleft-tab1" data-toggle="tab"><span class="strong">Identificación</span>  <span class="muted">Interrogatorio</span></a></li>
              <li name="li" class="" id="2"><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Antecedentes</span> <span class="muted">Interrogatorio</span></a></li>
              <li name="li" class="" id="3"><a href="#tabsleft-tab3" data-toggle="tab"><span class="strong">Padecimiento Actual</span> <span class="muted">Interrogatorio</span></a></li>
              <li name="li" class="" id="4"><a href="#tabsleft-tab4" data-toggle="tab"><span class="strong">Aparatos y Sitemas</span> <span class="muted">Interrogatorio</span></a></li>
              <li name="li" class="" id="5"><a href="#tabsleft-tab5" data-toggle="tab"><span class="strong">Exploración Regional</span> <span class="muted">Exploracion Fisica</span></a></li>
              <li name="li" class="" id="6"><a href="#tabsleft-tab6" data-toggle="tab"><span class="strong">Impesión y Tratamiento</span> <span class="muted">Caso Clínico</span></a></li>
            </ul>
            <div class="tab-content">



              <!------------------------------------------------------------------------------------------------- -->                                  
              <div class="tab-pane active" id="tabsleft-tab1">

               <div class="row-fluid ross">
                 <div class="widget white-full">
                  <div class="widget-body form">
                    <div class="widget-title">

                      <h4>Consulta Médica</h4>
                      <span class="tools">
                       <a class="icon-chevron-down" href="javascript:;"></a>
                       
                     </span>
                   </div>


                   <br>

                   <tr>
                    <td>
                     <div class="input-prepend input-append">
                       <span class="add-on">Nombre Completo</span>
                       <input type="text" disabled="disabled" placeholder="" value="<?php echo $_SESSION['nombre']; ?>" class="input-medium">
                     </div>

                   </td>
                   <td>
                    <div class="input-prepend input-append">
                      <span class="add-on">Primer Apellido</span>
                      <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['apellido1']  ?>" class="input-medium">
                    </div>
                  </td>
                  <td>
                    <div class="input-prepend input-append">
                      <span class="add-on">Segundo Apellido</span>
                      <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['apellido2']  ?>" class="input-medium">
                    </div>
                  </td>
         <!--   <td>
        <input type="text" class="input-block-level span2" placeholder="Text input" name="">
      </td> -->
    </tr>
    <br>
    <br>
    <tr>
      <td>
        <div class="input-prepend input-append">
          <span class="add-on">Edad</span>
          <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['edad']; ?>" class="input-mini">
        </div>
        
      </td>

      <td>
        <div class="input-prepend input-append">
          <span class="add-on">Sexo</span>
          <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['genero'];  ?>" class="input-medium">    
        </div>   
      </td>
      <td>

      </td>
      <td>
        <div class="input-prepend input-append">
          <span class="add-on">Ocupación</span>
          <input type="text" placeholder="" value = "<?php echo $_SESSION['ocupacion']; ?>" disabled="disabled" class="input-medium">
        </div>
      </td>
      
      <td>
        <div class="input-prepend input-append">
          <span class="add-on">Origen</span>
          <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['municipio']  ?>" class="input-large">
        </div>

      </td>
      

    </tr>
    <br>
    <br>
    <tr>
      <td>
        <div class="input-prepend input-append">
          <span class="add-on">Escolaridad</span>
          <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['escolaridad']; ?>" class="input-large">
        </div>
      </td>
      <td>

        <div class="input-prepend input-append">
          <span class="add-on">Telefono</span>
          <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['telefono'];  ?>" class="input-large">
        </div>

      </tr>
      <tr>
        <td>
          <div class="input-prepend input-append">
            <span class="add-on">Documento</span>
            <input type="text" disabled="disabled" placeholder="" value = "<?php echo $_SESSION['documento'] ?>" class="input-medium">
          </div>
        </td>
        
      </tr>
      
      
      
      <!-- BEGIN FORM-->
      <div class="form-horizontal AdvancedForm" action="#">
                             <!--    <div class="control-group">
                                    <label class="control-label">Default datepicker</label>

                                    <div class="controls">
                                        <input id="dp1" type="text" value="12-02-2012" size="16" class="m-ctrl-medium">
                                    </div>
                                  </div> -->

                                  <br>

                                  <div class="row-fluid">

                                      <div class="control-group">
                                        <label for="fechav" class="control-label">Fecha</label>
                                        <div class="controls">

                                          <input class="" size="16" style="margin-bottom: 20px;   width: 80px;" id="fechav" type="text" value="<?php  echo date('Y/m/d'); ?>" readonly="">
                                          <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                      </div>
                                      <div class="control-group" style="margin-top: -29px;">
                                        <label for="hora" class="control-label">Hora</label>

                                        <div class="controls">
                                          <input class="dateC" size="16" style="width: 80px;" id="hora" type="text" value="<?php  foreach ($hora as $h) { echo $h->hora; }?>" readonly="">
                                          <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                      
                                      </div>
                                  </div>

                                  <div class="control-group" style="margin-top: 10px;">
                                    <label class="control-label">Observación</label>
                                    <div class="controls">

                                      <textarea name="" id ="txtobservacionv"></textarea>

                                    </div>
                                  </div>
                                <!-- <div class="control-group">
                                    <label class="control-label">Limit the view months</label>

                                    <div class="controls">
                                        <div class="input-append date" id="dpMonths" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                                            <input class="m-ctrl-medium" size="16" type="text" value="02/2012" readonly="">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                  </div> -->
                                </div>
                                <!-- END FORM-->
                              </div>
                            </div>

                          </div>          

                        </div>
                        <!------------------------------------------------------------------------------------------------- -->  



                        

                        <!------------------------------------------------------------------------------------------------- -->

                        <div class="tab-pane" id="tabsleft-tab2">
                          <div class="row-fluid ross">


                            <?php echo $templateheredo;
                            
                            ?>
                            <?php foreach ($mostrar_gineco as $value){if ($value->aplica_gineco != 0){ ?>
                            
                              <div class="span12">
                                 <div class="span3">
                                      <div class='input-append' >
                                      <span class='add-on'> Menarca</span>
                                      <input type="text" placeholder="" id="element1" value="<?php foreach ($datosgineco as $datos) { echo $datos->menarca; } ?>"  data-mask="99/99/9999" class="span6" readonly>
                                    </div>
                                  </div>
                                  <div class="span3">
                                     <div class='input-append'>
                                      <span class='add-on'> Ritmo mestrual(f/d/c)</span>
                                      <input class="span4" placeholder="" value=" <?php foreach ($datosgineco as $datos) { echo $datos->ritmo_mestrual; }?>" id='txtritmo' type="text">
                                    </div>
                                  </div>
                                  <div class="span3">
                                    <div class="input-append">
                                    <span class="add-on">IVSA</span>
                                    <input class="span4" value=" <?php foreach ($datosgineco as $datos) { echo $datos->inicio_vida_sexual_a; } ?>" id='txtivsa'type="text">
                                  </div>
                                  </div>
                              </div>
                              <div class="span12">
                                  <div class="span4">
                                    <div class="control-group ">

                                    <div class='input-append'>
                                      <span class='add-on'> Dismenorrea</span>
                                      <input class="" id='txtrea' value=" <?php foreach ($datosgineco as $datos) { echo $datos->dismenorrea; } ?>" placeholder="" type="text">
                                    </div>

                                    <div class='input-append'>
                                      <span class='add-on'> Nº Parejas</span>
                                      <input class="" id='txtnumparejas' value=" <?php foreach ($datosgineco as $datos) { echo $datos->numero_parejas; } ?>" placeholder="" type="text">
                                    </div>
                                    
                                    <div class="input-prepend input-append">
                                     <span class="add-on">G</span>
                                     <input class="span3" value=" <?php foreach ($datosgineco as $datos) { echo $datos->g; } ?>" id='g' type="text">
                                     <span class="add-on">A</span>
                                     <input class="span3" value=" <?php foreach ($datosgineco as $datos) { echo $datos->a; } ?>" id='a' type="text">
                                     <span class="add-on">P</span>
                                     <input class="span3" value=" <?php foreach ($datosgineco as $datos) { echo $datos->p; } ?>" id='p' type="text">
                                     <span class="add-on">C</span>
                                     <input class="span3" value=" <?php foreach ($datosgineco as $datos) { echo $datos->c; } ?>" id='c' type="text">
                                   </div>
                                   </div>
                                  </div>
                                
                              </div>
                           
                                 
                           
                     
                          

                           

                            
                          

                          

                            <div class='input-append'>
                            <span class='add-on'> FUM</span>
                            <input type="text" id="element2" value=" <?php foreach ($datosgineco as $datos) { echo $datos->fum; } ?>" data-mask="99/99/9999" readonly>
                          </div>
                          
                          <div class='input-append'>
                            <span class='add-on'> FPP</span>
                            <input type="text" id="element3" value=" <?php foreach ($datosgineco as $datos) { echo $datos->fpp; } ?>" data-mask="99/99/9999" readonly>
                          </div>

                          <div class='input-append'>
                            <span class='add-on'> FUP</span>
                            <input type="text" id="element4" value=" <?php foreach ($datosgineco as $datos) { echo $datos->fup; } ?>" data-mask="99/99/9999"  readonly>
                          </div>
                          
                          <div class="input-append">
                           <span class="add-on">Menp/Climaterio</span>
                           <input class="" placeholder="" value=" <?php foreach ($datosgineco as $datos) { echo $datos->climaterio; } ?>" id='txtclimaterio' type="text">
                         </div>
                         
                         <div class='input-append'>
                          <span class='add-on'>Mét.Planificacion</span>
                          <input class="" placeholder="" value=" <?php foreach ($datosgineco as $datos) { echo $datos->metplan; } ?>" id='txtplanificacion' type="text">
                        </div>

                        <div class='input-append'>
                          <span class='add-on'> Cit.Vaginal</span>
                          <input type="text" id="element5" value=" <?php foreach ($datosgineco as $datos) { echo $datos->citologia; } ?>" data-mask="99/99/9999" readonly>
                        </div>

                        <div class='input-append'>
                          <span class='add-on'>Ex.Mamas/Mastografía</span>
                          <input type="text" id="element6" value=" <?php foreach ($datosgineco as $datos) { echo $datos->mamas; } ?>" data-mask="99/99/9999" readonly>
                        </div>

                      
                        <?php }else{

                          echo "No aplica";
                        }


                        } ?>

                      </div>
                    </div> 

                    <!------------------------------------------------------------------------------------------------- -->                                    







                    <!------------------------------------------------------------------------------------------------- -->  
                    <div class="tab-pane ross" id="tabsleft-tab3">

                      <tr>
                        <td>
                          <h4><strong>Sintomas Generales</strong></h4>
                        </td>
                      </tr>
                      <ul class='breadcrumb'></ul>
                      
                      <div class="row-fluid ross">


                        <?php echo $templateundientexd;
                        
                        ?>
                        
                      </div>
                      <br>

                      <ul class='breadcrumb'></ul>

                      
                      <div class="row-fluid">
                        <div class="span12">
                          <!-- BEGIN  widget-->
                          <div class="white-full">
                            <div class="white-full">
                              <h4><i class=""></i> <b>PADECIMIENTO ACTUAL</b></h4>
                              <span class="tools">
         <!-- <a href="javascript:;" class="icon-chevron-down"></a>
         <a href="javascript:;" class="icon-remove"></a> -->
       </span>
     </div>
     <div class="widget-body form">
      <!-- BEGIN FORM-->
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <textarea id = "txtpadecimiento" class="span12 wysihtmleditor5" rows="5"><?php foreach ($this->txtareas as $value){ echo $value->padecimiento_actual; } ?></textarea>

        </div>
      </div>
      <!-- END FORM-->
    </div>

  </div>
  <!-- END EXTRAS widget-->
</div>
</div>

</div>

<!------------------------------------------------------------------------------------------------- -->  




<!------------------------------------------------------------------------------------------------- -->  

<div class="tab-pane" id="tabsleft-tab4">
  <div class="widget-body ross">
    <table class="table table-bordered">
      <?php echo $template_aparato_s ?>
      
    </table>
  </div>
</div>

<!------------------------------------------------------------------------------------------------- -->  

<div class="tab-pane" id="tabsleft-tab5">
  <div class="row-fluid ross">

    <?php  echo $template_una_parte ?>
    
  </div>
</div>

<!------------------------------------------------------------------------------------------------- --> 
<div class="tab-pane" id="tabsleft-tab6">

  <div class="row-fluid ross">
   <div class="row-fluid">
    <div class="span12">
      <!-- BEGIN  widget-->
      <div class="white-full">
        <h4><i class=""></i> <b>IMPRESION DIAGNOSTICA</b></h4>
        
      </div>
      <div class="widget-body form">
        <!-- BEGIN FORM-->
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <textarea id = 'txtimpresion' class="span10 wysihtmleditor5" rows="5"><?php foreach ($this->txtareas as $value){ echo $value->impresion_diagnostico; } ?></textarea>
          </div>
        </div>
        
        <!-- END FORM-->
      </div>
      <div class="white-full">
        <h4><i class=""></i> <b> TRATAMIENTO </b></h4>
        
      </div>
      <div class="widget-body form">
        <!-- BEGIN FORM-->
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <textarea id = 'txttratamiento' class="span10 wysihtmleditor5" rows="5"><?php foreach ($this->txtareas as $value){ echo $value->tratamiento; } ?></textarea>
          </div>
        </div>        

        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <button id="btnjson" class="btn  btn-primary" type="button">Guardar historia clinica</button>
          </div>
        </div>

        <!-- END FORM-->
      </div>

      <!-- END EXTRAS widget-->
    </div>
  </div>


</div>
</div>
                                   <!--  <ul class="pager wizard">
                                        <li class="previous first disabled"><a href="javascript:;">First</a></li>
                                        <li class="previous disabled"><a href="javascript:;">Previous</a></li>
                                        <li class="next last" style="display: inline;"><a href="javascript:;">Last</a></li>
                                        <li class="next" style="display: inline;"><a href="javascript:;">Next</a></li>
                                        <li class="next finish" style="display: none;"><a href="javascript:;">Finish</a></li>
                                      </ul> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          

                          
                          

                          <!-- END PAGE CONTENT-->         
                        </div>
                        <!-- END PAGE CONTAINER-->
                        
                        <!-- END PAGE -->  
                        <script>
                          var arrayfrecuencia = [<?php echo $this->arrayfrecuencia; ?>];
                          var arrayParte = [<?php echo $this->arrayParte; ?>];
                          var clasi_ante = [<?php echo $this->clasi_ante_Paciente; ?>];
                          var arraysintomas = [<?php echo $this->arraysintomas_Paciente; ?>];
                          var arrayaparato = [<?php echo $this->array_aparato_paciente ?>];
                        </script>