<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <h3 class="page-title">
        Clasificación (Alimentos)
      </h3>
      <ul Class="breadcrumb"></ul>
    </div>
  </div>
  <div class="container-fluid">
   <div class="row-fluid">
    <div class="span12">

    </div>
  </div>
  <div class="row-fluid">

    <div class="span8">
      <!-- BEGIN GRID SAMPLE PORTLET-->
      <div class="widget blue">
        <div class="widget-body">
          <a href="#myModal1" role="button" class="btn btn-primary pull-left " data-toggle="modal">Nuevo <i class="icon-plus"></i></a>
          <!-- Modal -->
          <div <?php echo URL; ?>"clasificacion/RegistrarClasificacion" class="form-horizontal" method="POST">
            <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">Clasificación</h3>
              </div>
              <div class="modal-body">
                <div class="control-group">
                  <label class="control-label">Nombre </label>
                  <div class="controls">
                    <input type="text" class="span6" id="txtclasificacion">
                  </div>
                </div>    
              </div>    
              <div class="modal-footer">
                <button  type="submit" class="btn" data-dismiss="modal" value="btnAddClasificacion" aria-hidden="true">Close</button>
                <button  type="submit" class="btn btn-primary" id="btnAddClasificacion" data-dismiss="modal" aria-hidden="true">Save</button>
              </div>
            </div> 
          </div>
          <div class="space15"></div>  
          <div id="editable-sample_wrapper" <?php echo URL; ?>"clasificacion/ListarClasificacion" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid"><div class="span6"><div id="editable-sample_length" class="dataTables_length"><label></div></div><div class="span6"><div class="dataTables_filter" id="editable-sample_filter"><label>Buscar: <input type="text" aria-controls="editable-sample" class="medium"></label></div></div></div><table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
          <thead>
            <tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Identificación" style="width: 207px;"><i class=" icon-leaf"></i> Clasificación</th>
             <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 98px;">Editar</th>
             <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 134px;">Eliminar</th></tr>
           </thead>
           <tbody>
           <?php foreach ($clasificacion as $value) { ?>
           <tr>
            <td class=""><?php echo $value->clasificacionn;?></td>
            <td class=" "><a class="edit" href="javascript:;">Edit</a></td>
            <td class=" "><a class="delete" href="javascript:;">Delete</a></td>
            </tr>
            <?php }?> 
          </tbody>
        </table>
      </div>
    </div>
 
    <!-- END GRID SAMPLE PORTLET-->
  </div>