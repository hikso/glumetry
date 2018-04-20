<div class="container-fluid">
          <div class="row-fluid">
            <div class="span12">
          <h3 class="page-title">
            Alimentos
          </h3>
          <ul Class="breadcrumb"></ul>
          </div>
            </div>
               <div class="row-fluid">
                <div class="span12">
               
               </div>
                </div>
                  <div class="row-fluid">

                    <div class="span12">
                        <!-- BEGIN GRID SAMPLE PORTLET-->
                      <div class="widget blue">
                          <div class="widget-body">
                            <a href="#myModal1" role="button" class="btn btn-primary pull-left " data-toggle="modal">Nuevo <i class="icon-plus"></i></a>
                            <!-- Modal -->
                            
                            <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel1">Alimento</h3>
                                </div>
                                <div class="modal-body">
                            <div <?php echo URL;?>"alimentos/RegistrarAlimentos" class="form-horizontal" method="POST">
                              <div class="control-group">
                                <label class="control-label">Nombre </label>
                                <div class="controls">
                                    <input id ="txtNombreAlimentos" type="text" class="span6">
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">Clasificación</label>
                                <div class="controls" id="txtClasificacion">
                                    <select class="span6">
                                      <option>Granos</option>
                                      <option>Lacteos</option>
                                      <option>Vegetales</option>
                                    </select>
                                </div>
                              </div> 
                              <div class="control-group">
                                <label class="control-label">Indice Glucemico</label>
                                <div class="controls">
                                    <input type="text" id="txtIndiceGlucemico" class="span6">
                                </div>
                              </div> 
                              <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                    <button class="btn btn-primary" id="btnAddAlimentos">Save</button>
                                </div>     
                            </div>
                            </div>
                            </div>
                                
                              <div class="space15"></div>  
                                <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid"><div class="span6"><div id="editable-sample_length" class="dataTables_length"><label></div></div><div class="span6"><div class="dataTables_filter" id="editable-sample_filter"><label>Buscar: <input type="text" aria-controls="editable-sample" class="medium"></label></div></div></div><table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                  <thead>
                                    <tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Identificación" style="width: 207px;">Alimentos</th>
                                    <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Identificación" style="width: 207px;">Clasificación</th>
                                    <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Identificación" style="width: 207px;">Índice Glucémico</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 98px;">Editar</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 134px;">Eliminar</th></tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <td>Aguacate</td>
                                        <td>Verduras</td>
                                        <td>20</td>
                                        <td class=" "><a class="edit" href="javascript:;">Edit</a></td>
                                        <td class=" "><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Maíz</td>
                                        <td>Granos</td>
                                        <td>5</td>
                                        <td class=" "><a class="edit" href="javascript:;">Edit</a></td>
                                        <td class=" "><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Leche</td>
                                        <td>Lacteos</td>
                                        <td>150</td>
                                        <td class=" "><a class="edit" href="javascript:;">Edit</a></td>
                                        <td class=" "><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END GRID SAMPLE PORTLET-->
                        </div>
                      </div>
                </div>