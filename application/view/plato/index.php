<!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Platos
                   </h3>
                   <ul class="breadcrumb">
                   </ul>
                   <div class="row-fluid">
                    <div class="span4">
                    <!-- BEGIN widget-->
                    <div class="widget purple">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> 
                             Calculadora
                            </h4>
                                    <span class="tools">
                                       <a class="icon-chevron-down" href="javascript:;"></a>
                                       </span>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <form class="form-horizontal AdvancedForm" action="#">
                                
                                <div class="control-group">
                                    <label class="control-label">Nombre Alimento</label>
                                    <button class="btn btn-primary" type="button">Seleccionar</button>
                                 </div>  

                                 <div class="control-group">
                                    <label class="control-label">Por cada:  </label>
                                    <div class="controls plato">
                                        <input type="number" placeholder="100" class="input-mini" id="ValidNumber">
                                     
                                    </div>
                                    <label class="control-label">De:</label>
                                    <div class="controls">
                                        <label class="radio">
                                        <input type="radio" name="radioTipoConversion" id="gramos" value="gramos">
                                          Gramos
                                        </label>
                                        <label class="radio">
                                        <input type="radio" name="radioTipoConversion" id="carbohidratos" value="carbohidratos">
                                          Carbohidratos
                                        </label>
                                    </div>
                                    <div>
                                        <label class="control-label">Indice glúcemico:  </label>
                                        <div class="controls">
                                          <label class="control-label" disabled >Valor. </label>
                                        </div>
                                    </div>
                                </div>                                
                                  <ul class="breadcrumb">
                                  </ul>
                                <div class="control-group">
                                    <div>
                                        <label class="control-label">Calorías:  </label>
                                        <div class="controls">
                                          <label class="control-label" disabled >35 / 100 gr</label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="control-label">Proteinas:  </label>
                                        <div class="controls">
                                          <label class="control-label" disabled >0.5 / 100 gr</label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="control-label">Grasas:  </label>
                                        <div class="controls">
                                          <label class="control-label" disabled >0 / 100 gr</label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="control-label">Carbohidratos:  </label>
                                        <div class="controls">
                                          <label class="control-label" disabled >7.6 / 100 gr</label>
                                        </div>
                                    </div>
                                </div>

                                  <ul class="breadcrumb">
                                  </ul>

                                <div class="control-group">
                                      <label class="control-label">Agregar a plato</label>
                                      </div>

                                  <div class="control-group">
                                        <label class="control-label">Unidades:</label>
                                        <div class="controls">
                                           <input type="number"class="input-mini" id="ValidInteger">
                                        </div>
                                  </div>
                                  <div class="control-group">
                                        <div class="controls">
                                           <button class="btn btn-primary" type="button">Agregar</button>
                                        </div>       
                                  </div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END widget-->
                </div>
                <div class="span8">
                    <!-- BEGIN widget-->
                    <div class="widget green">
                         <div class="widget-title">
                            <h4><i class="icon-reorder"></i>
                                Plato
                            </h4>
                                <span class="tools">
                                   <a class="icon-chevron-down" href="javascript:;"></a>
                                   </span>
                        </div>
                        <div class="widget-body form switch-form">
                            <div class="widget-body form">
                                <!-- BEGIN FORM-->
                                <form class="form-horizontal" action="#">

                                 <div class="control-group">
                                    <label class="control-label">Nombre plato</label>
                                    <div class="controls">
                                        <input type="text" class="input-large">
                                    </div>
                                </div>
                                 <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th>Alimento</th>
                                        <th class="hidden-phone">Unidades</th>
                                        <th>Carbohidratos</th>
                                        <th>Indice glucemico</th> 
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Papaya</td>
                                        <td class="hidden-phone">12</td>
                                        <td>80</td>
                                        <td>50</td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Zanahoria</td>
                                        <td class="hidden-phone">1</td>
                                        <td>30</td>
                                        <td>50</td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Huevo</td>
                                        <td class="hidden-phone">2</td>
                                        <td>20</td>
                                        <td>13</td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pan</td>
                                        <td class="hidden-phone">0.5</td>
                                        <td>30</td>
                                        <td>7</td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>                       
                                    </tbody>
                                </table>
                            </div>
                                  <div class="control-group">
                                        <div"controls">
                                           <label class="control-label">Carbohidratos totales:  </label>
                                        <div class="controls">
                                          <label class="control-label" disabled >200</label>
                                        </div>
                                           <button class="btn btn-primary btnplato" type="button">Guardar</button> 
                                  </div>  
                                  </div>
                                </form>
                                <!--</form>-->
                                <div class="space20"></div>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                    <!-- END widget-->
                </div>
            </div>
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                <div class="space10"></div>
                <!--END METRO STATES-->
            </div>

            <!-- END PAGE CONTENT-->  