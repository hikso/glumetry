<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
     <h3 class="page-title">
       Consultar usuarios
     </h3>
     <ul class="breadcrumb">

     </ul>
   </div>
   <div id="msg" class="span10">

   </div>
 </div>

 <!-- END PAGE HEADER-->
 <!-- BEGIN PAGE CONTENT-->
 <div class="row-fluid">
  <div class="span12">
    <div class="control-group">
     <!-- BEGIN EXAMPLE TABLE widget-->
     <div class="widget white-full">
       <div class="widget-title">
         <h4> Listado de Usuarios</h4>
       </div>

       <div class="widget-body">
         <div class="space15"></div>
         <table id="tblListarUsuarios" name="tableDataTable" class="table table-striped table-bordered dataTable no-footer">
          <thead>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Documento</th>
              <th>Tipo de usuario</th>
              <th>Correo</th>
              <th>Cambiar estado</th>
              <th>Agregar cuenta</th>
            </tr>
          </thead>


          <?php foreach ($users as $value) { ?>
          <tr>
            <td><?php echo $value->primer_nombre. ' ' . $value->segundo_nombre; ?></td>
            <td><?php echo $value->primer_apellido.' '. $value->segundo_apellido; ?></td>
            <td><?php echo $value->documento; ?></td>
            <td><?php echo $tipoUsuario = ($value->tipoUsuario == 1) ? "Paciente" : "Médico" ;?></td>
            <td><?php echo $value->correo_electronico; ?></td>
            <td><a id="<?php echo $value->id_usuario; ?>" value="<?php echo $value->estado; ?>" onclick="cambioEstado(this)" href="javascript:void(null)"><span class="label label<?php echo ($value->estado == 1) ? "-info" : ""; ?>"><?php echo ($value->estado == 1) ? "Activo" : "Inactivo"; ?></span></a></td>
            <td><button <?php 
                            foreach ($numCuentas as $key) {
                              if ($key->id_usuario == $value->id_usuario) {
                                if ($key->numCuentas == 2) {
                                  echo "disabled='disabled'";
                                }
                              }
                              
                            }


              ?> onclick="cargarModalAgregarCuenta(this,<?php echo $value->id_usuario ; ?>,<?php echo $value->id_tipo_documento ?>, <?php echo $value->id_genero; ?>, <?php echo $real = ($value->telefono == "" or $value->telefono == "/") ? "' / '" : "'$value->telefono'" ; ?>)" value="<?php echo $value->tipoUsuario; ?>" data-toggle='modal' href="#myModal3" class="btn btn-primary" > <?php 

            foreach ($numCuentas as $key) {
              if ($key->id_usuario == $value->id_usuario) {
                if ($key->numCuentas != 2) {
                  echo $tipoUsuario = ($value->tipoUsuario == 2) ? "Paciente" : "Médico" ;
                }else{
                  echo "-";
                }
              }
              
            } 
             ?></button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- END EXAMPLE TABLE widget-->
</div>

<!--BEGIN METRO STATES-->
<div class="space10"></div>
<!--END METRO STATES-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>

<div id="myModal3" class="modal hide fade modalAlimentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="ModalTitulo">Añadir cuenta</h3>
  </div>
  <div class="modal-body">
  <div class="row-fluid">
     <div id="msgModal" class="span10">

   </div>
   </div>
   <div class="row-fluid">
    <div class="span7" id="info-basica" >
      <!-- BEGIN GRID SAMPLE PORTLET-->
      <div class="widget white-full">
        <div class="widget-title">
          <h4>Información Básica</h4>
        </div>
        <div class="widget-body form">
          <div class="row-fuild">
            <div class="span6">
              <div class="control-group" >
                <label for="txtPrimerNombre" class="control-label">Primer Nombre</label>
                <div class="controls">
                  <input disabled="disabled" class="input-large texto" id="txtPrimerNombre" name="txtPrimerNombre" type="text" required/>
                </div>
              </div>
            </div>
            <div class="span6">
              <div class="control-group ">
                <label for="txtSegundoNombre" class="control-label">Segundo Nombre</label>
                <div class="controls">
                  <input disabled="disabled" class="input-large texto" id="txtSegundoNombre" name="txtSegundoNombre" type="text" >
                </div>
              </div>
            </div>
          </div>
          <div class="row-fuild">
            <div class="span6">
              <div class="control-group ">
                <label for="txtPrimerApellido" class="control-label">Primer Apellido</label>
                <div class="controls">
                  <input disabled="disabled" class="input-large texto" id="txtPrimerApellido" name="txtPrimerApellido" type="text"  required/>
                </div>
              </div>
            </div>
            <div class="span6">
              <div class="control-group ">
                <label for="txtSegundoApellido" class="control-label">Segundo Apellido</label>
                <div class="controls">
                  <input  disabled="disabled" class="input-large texto" id="txtSegundoApellido" name="txtSegundoApellido" type="text"  required/>
                </div>
              </div>
            </div>
          </div>
          <div class="control-group " name="inputPaciente">
            <label for="txtOcupacion" class="control-label">Ocupación</label>
            <div class="controls">
              <input class="input-large textoynumeros" id="txtOcupacion" name="txtOcupacion" placeholder="Conductor" type="text">
            </div>
          </div>
          <div class="control-group" name="inputMedico">
            <label class="control-label">Especialización</label>
            <div class="controls">
              <select class="input-large" tabindex="1" id="slctEspecializacion" required/>
              <option value="" selected="selected">Seleccione una opción</option>
              <?php foreach ($especializacion as $value) {
                echo "<option value='$value->id_especializacion'>$value->descripcion</option>";
              } ?>
            </select>
          </div>
        </div>
        <div class="row-fuild">

          <div class="span6">
            <div class="control-group">
              <label class="control-label">Tipo de documento</label>
              <div class="controls">
                <select disabled="disabled" class="input-large" tabindex="1" id="slctTipo_Documento" required/>
                <option value="" selected="selected">Seleccione una opción</option>
                <?php foreach ($tipo_documento as $value) {
                  echo "<option value='$value->id_tipo_documento'>$value->descripcion</option>";
                } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="control-group ">
            <label for="txtDocumento" class="control-label">Documento</label>
            <div class="controls">
              <input disabled="disabled" class="input-large" id="txtDocumento" name="txtDocumento" type="text" required/>
            </div>
          </div>
        </div>

      </div>
      <div class="row-fuild">
        <div class="span6">
          <div class="control-group" name="inputPaciente">
            <label class="control-label">Departamento</label>
            <div class="controls">
              <select class="input-large depart" id="slctDepartamento" tabindex="1" required/>
              <option value="" selected="selected">Seleccione una opción</option>
              <?php foreach ($departamento as $value) {
                echo "<option value='$value->id_departamento'>$value->descripcion</option>";
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="control-group" name="inputPaciente">
          <label class="control-label">Municipios</label>
          <div class="controls">
            <select class="input-large" tabindex="1" id="municipios" disabled="true" required/> 
            <option value="" selected="selected">Seleccione una opción</option>
          </select>
        </div>
      </div>

    </div>
  </div>
  <div class="control-group" name="inputPaciente">
    <label class="control-label">Estado Civil</label>
    <div class="controls">
      <select class="input-large" tabindex="1" id="slctEstado_Civil" required/>
      <option value="" selected="selected">Seleccione una opción</option>
      <?php foreach ($estado_civil as $value) {
        echo "<option value='$value->id_estado_civil'>$value->descripcion</option>";
      } ?>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Género</label>
  <div class="controls">
    <select disabled="disabled" class="input-large" tabindex="1" id="slctGenero" required/>
    <option value="" selected="selected">Seleccione una opción</option>
    <?php foreach ($genero as $value) {
      echo "<option value='$value->id_genero'>$value->descripcion</option>";
    } ?>
  </select>
</div>
</div>
<div class="control-group" name="inputPaciente">
  <label class="control-label">Escolaridad</label>
  <div class="controls">
    <select class="input-large" tabindex="1" id="slctEscolaridad" required/>
    <option value="" selected="selected">Seleccione una opción</option>
    <?php foreach ($escolaridad as $value) {
      echo "<option value='$value->id_escolaridad'>$value->descripcion</option>";
    } ?>
  </select>
</div>
</div>
<div class="row-fuild">
    <div class="span6">
        <div class="control-group " name="inputPaciente">
            <label for="dpFechaNacimiento" class="control-label">Fecha de nacimiento (*)</label>
                <input class="" id="dpFechaNacimiento"  type="text" readonly="" required/>
          </div>
      </div>
  </div>
</div>
</div>
</div>
<div class="span5" id="info-contacto">
  <!-- BEGIN GRID SAMPLE PORTLET-->
  <div class="widget white-full">
    <div class="widget-title">
      <h4>Información de Contacto</h4>
    </div>
    <div class="widget-body">
      <div class="row-fluid">

        <div class="span4">
          <div class="control-group ">
            <label for="txtExt" class="control-label">Extensión</label>
            <div class="controls">
              <form>
                <input class="input-mini" id="txtExt" name="txtExt" type="text" data-mask="(999)" placeholder="300">
              </form>
            </div>
          </div>
        </div>
        <div class="span8">
          <div class="control-group ">
            <label for="txtTelefono" class="control-label">Telefono</label>
            <div class="controls">
              <form>
                <input class="input-small" id="txtTelefono" name="txtTelefono" type="tel" data-mask="999-99-99"  placeholder="345-45-45">
              </form>
            </div>
          </div>
        </div>

      </div>
      <div class="control-group " name="inputMedico">
        <label for="txtCelular" class="control-label">Celular</label>
        <div class="controls">
          <input class="input-medium" id="txtCelular" name="txtCelular" type="tel" data-mask="999-999-99-99" placeholder="345-454-25-23">
        </div>
      </div>
      <div class="control-group " name="inputMedico">
        <label for="txtCentroDeTrabajo" class="control-label">Centro de trabajo</label>
        <div class="controls">
          <input class="input-medium textoynumeros" id="txtCentroDeTrabajo" name="txtCentroDeTrabajo" placeholder="Clinica Medellin" type="text">
        </div>
      </div>
    </div>
  </div>
 </div>
 </div>
 </div>
<div class="modal-footer">  
  <button id="agregarCuentaUsuario" class="btn btn-primary">Aceptar</button>
</div>
</div>

<div id="confirmCambio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: block;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel3">Cambio de estado</h3>
    </div>
    <div class="modal-body">
        <p>Confirmar cambio de estado:</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button data-dismiss="modal" class="btn btn-primary">Aceptar</button>
    </div>
</div>