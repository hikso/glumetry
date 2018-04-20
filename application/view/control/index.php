 <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                    Nuevo control
                   </h3>
                   <ul class="breadcrumb">
                   </ul>
                   <div class="row-fluid">
            </div>
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
   <div class="row-fluid">
                 <div class="span12">
                     <div class="widget white-full">
                         <div class="widget-body">
                             <form class="form-horizontal" action="#">
                                <div id="pills" class="custom-wizard-pills">
                                 <ul class="nav nav-pills">
                                     <li class="active"><a href="#pills-tab1" data-toggle="tab">Alimentación</a></li>
                                     <li class=""><a href="#pills-tab2" data-toggle="tab">Médicamento</a></li>
                                     <li class=""><a href="#pills-tab3" data-toggle="tab">Observaciones</a></li>
                                 </ul>
                                 <div class="progress progress-success progress-striped active">
                                     <div class="bar" style="width: 90%;"></div>
                                 </div>
                                 <div class="tab-content">
                                     <div class="tab-pane active" id="pills-tab1">
                                         <div class="span5">
                                         <h3>Plato<button class="btn btn-glmtry">Seleccionar plato</button> 
                                         </h3>                          
                                         <div class="control-group">
                                                <label class="control-label">Nombre comida</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Comida" class="input-medium">
                                                </div>
                                         </div>
                                         <div class="control-group">
                                                 <label class="control-label">Carbohidratos</label>
                                                 <div class="controls">
                                                     <input type="number" placeholder="0" class="input-mini">
                                                 </div>
                                         </div>
                                         <button class="btn"><i class="icon-chevron-left"></i> Ver Detalles</button>
                                         </div>
                                         <div class="span5 offset2"> 
                                         <h3>Momento</h3>
                                            <div class="control-group">
                                                   <input id="dp1" type="text" value="12-02-2012" size="16" class="m-ctrl-medium">
                                            </div>
                                              <div class="control-group">
                                                          <label class="radio">
                                                              <div class="radio" id="uniform-undefined"><span><input type="radio" name="optionsRadios1" value="option1" style="opacity: 0;"></span></div>
                                                              Antes de la comida
                                                          </label>
                                                          <label class="radio">
                                                              <div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" name="optionsRadios1" value="option2" checked="" style="opacity: 0;"></span></div>
                                                              Despues de la comida
                                                          </label>
                                              </div>
                                              <div class="control-group">
                                                    <label class="control-label">Categoría</label>
                                                    <div class="controls">
                                                        <select class="input-medium m-wrap" tabindex="1">
                                                            <option value="Desayuno">Desayuno</option>
                                                            <option value="Media mañana">Media mañana</option>
                                                            <option value="Almuerzo">Almuerzo</option>
                                                            <option value="Algo">Algo</option>
                                                            <option value="Cena">Cena</option>
                                                            <option value="Merienda">Merienda</option>
                                                        </select>
                                                    </div>
                                              </div>
                                         </div>
                                     </div>
                                     <div class="tab-pane" id="pills-tab2">
                                       <div class="span5">
                                         <h3>Acción rápida</h3>                          
                                         <div class="control-group">
                                                 <label class="control-label">Sugerida</label>
                                                 <div class="controls">
                                                     <input type="text" class="input-mini">
                                                 </div>
                                         </div>
                                         <div class="control-group">
                                                 <label class="control-label">Aplicada</label>
                                                 <div class="controls">
                                                     <input type="number" placeholder="0" class="input-mini">
                                                 </div>
                                         </div>
                                         </div>
                                         <div class="span5 offset2"> 
                                         <h3>Acción lenta/Mixta</h3>
                                          <div class="control-group">
                                                  <label class="control-label">Recomendación médica</label>
                                                  <div class="controls">
                                                      <input type="text" class="input-mini">
                                                  </div>
                                          </div>
                                         </div>
                                        <div class="widget white-full">
                                            <div class="widget-title">
                                              <h3>Antidiabeticos orales</h3>
                                            </div>
                                            <br>
                                              <div class="control-group">
                                                    <label class="control-label">Médicamento</label>
                                                    <div class="controls">
                                                        <select class="input-medium m-wrap" tabindex="1">
                                                            <option value="Option1">Option1</option>
                                                            <option value="Option2">Option2</option>
                                                            <option value="Option3">Option3</option>
                                                            <option value="Option4">Option4</option>
                                                            <option value="Option5">Option5</option>
                                                            <option value="Option6">Option6</option>
                                                        </select>
                                                    </div>
                                              </div>
                                              <div class="control-group">
                                                      <label class="control-label">Unidades</label>
                                                      <div class="controls">
                                                          <input type="number" class="input-mini">
                                                      </div>
                                              </div>
                                            </div>
                                        </div>
                                     <div class="tab-pane" id="pills-tab3">
                                         <div class="span5">
                                         <h3>Cometario</h3>         
                                            <div class="control-group">
                                                      <textarea class="input-xlarge" rows="3"></textarea>
                                            </div>
                                         </div>
                                         <div class="span5 offset2"> 
                                         <h3>Ejercicio</h3>
                                          <div class="control-group">
                                                  <label class="control-label">Intencidad</label>
                                                  <div class="controls">
                                                      <select class="input-medium m-wrap" tabindex="1">
                                                           <option value="Option1">Muy Ligero</option>
                                                           <option value="Option2">Ligero</option>
                                                           <option value="Option3">Moderado</option>
                                                           <option value="Option4">Intenso</option>
                                                           <option value="Option5">Máximo</option>
                                                      </select>
                                                  </div>
                                            </div>
                                         </div>
                                     </div>
                                     <div class="row-fluid">
                                     <ul class="pager wizard">
                                         <li class="next last"><a href="javascript:;">Anterior</a></li>
                                         <li class="next"><a href="javascript:;">Siguiente</a></li>
                                     </ul>
                                     </div>
                             </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
            <!-- END PAGE CONTENT-->
