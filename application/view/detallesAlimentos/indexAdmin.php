<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <h3 class="page-title">
       Detalles 
   </h3>
   <ul Class="breadcrumb"></ul>
</div>
</div>
<div class="container-fluid">
 <div class="row-fluid">

  <div class="row-fluid">
    <div class="span12">
        <div class="widget-body">
            <div class="form-horizontal" method="POST">
                <div id="tabsleft" class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <li class="active" onclick="Setpanel(0)"><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Tamaño porción</span> <span class="muted"></span></a></li>
                        <li class="" onclick="Setpanel(1)"><a href="#tabsleft-tab3" data-toggle="tab"><span class="strong">Unidad de medida</span> <span class="muted"></span></a></li>
                        <li class="" onclick="Setpanel(2)"><a href="#tabsleft-tab4" data-toggle="tab"><span class="strong">Momento</span> <span class="muted"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tabsleft-tab3"> 
                            <div class="control-group esp">
                                <label class="control-label">Medida</label>
                                <div class="controls" id="Medida">
                                    <input type="text" class="span6" id="txtUnidadDeMedida">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="tabsleft-tab2"> 
                            <div class="control-group">
                                <label class="control-label">Porción</label>
                                <div class="controls" id="porcion">
                                    <input type="text" class="span6" id="txtPorcion">
                                </div>
                            </div>
                        </div>
                         <div class="tab-pane" id="tabsleft-tab4"> 
                            <div class="control-group esp2">
                                <label class="control-label">Momento</label>
                                <div class="controls" id="Momento">
                                    <input type="text" class="span6" id="txtMomento">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="btncenter">
                                <button class="btn btn-success" type="submit" id="btnAddDetalles">Guardar</button>
                                <button class="btn" type="button">Cancelar</button>
                        </div> 
            </div>
            <div class="form-actions"></div>
        </div>
        <div class="span10">
            <div class="widget-body">
                <div class="row-fluid buscar"><div class="span6"><div id="editable-sample_length" class="dataTables_length"></label></div></div><div class="span6"><div class="dataTables_filter" id="editable-sample_filter"><label>Buscar: <input type="text" aria-controls="editable-sample" class="medium"></label></div></div></div>
                <table class="table table-striped buscar">
                    <thead>
                        <tr>
                            <th>Heredo Familia</th>
                            <th>Antecedente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Personales Patologicos</td>
                            <td>Diabetes</td>
                        </tr>
                        <tr>
                            <td>Aparto Respiratorio</td>
                            <td>Traumatismo</td>
                        </tr>
                        <tr>
                            <td>Personales no patologicos</td>
                            <td>Diabetes</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>  

</div>
</div>
</div>