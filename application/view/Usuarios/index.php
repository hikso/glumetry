    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->   
        <!-- END THEME CUSTOMIZER-->
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
           Registro de usuarios
       </h3>
       <ul class="breadcrumb">
       </ul>
   </div>
   <div id="msg" class="span10">
    <div  class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><strong>Información!</strong> Seleccione el tipo de usuario que desea registrar.</div>
</div>
<div class="container-fluid">

    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->

    <div class="span2"></div>
    <div class="span4">

        <div class="widget white-full">
            <div class="control-group">
                <div class="controls">

                    <label class="control-group">
                        <div class="divRadio">
                            <input type="radio" name="rbtnTipoUsuario" id="1"  value="rbtnMedico" class="radio"/>
                            <label class="labelRadio" for="1">Médico</label>
                        </div>
                    </label>

                </div>
            </div>
        </div>


    </div>
    <div class="span4">
        <div class="widget white-full">
            <div class="control-group">
                <div class="controls">
                    <label class="control-group">
                        <div class="divRadio">
                            <input type="radio" name="rbtnTipoUsuario" id="2" value="rbtnPaciente" class="radio"/>
                            <label class="labelRadio" for="2">Paciente</label>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="span2"></div>
    <div class="row-fluid">
        <div class="span3" id="info-acceso" style="display: none;">
            <!-- BEGIN GRID SAMPLE PORTLET-->
            <div class="widget white-full">
                <div class="widget-title">
                    <h4>Información Acceso</h4>
                </div>
                <div class="widget-body">
                 <div id="validarContraseña" class="control-group error">
                    <label for="txtContra" class="control-label">Contraseña (*)</label>
                    <div class="controls">
                        <input class="input-medium"  minlength="4" id="txtContra" name="txtContra" type="password" autofocus required/>                           
                        <span class="help-inline" id="spnContraseña"></span>
                    </div>
                </div>
                <div class="control-group " id="confirmarContraseña">
                    <label for="txtConfirmarContra" class="control-label">Confirmar Contraseña (*)</label>
                    <div class="controls">
                        <input class="input-medium" id="txtConfirmarContra" name="txtConfirmarContra" type="password" required/>
                        <span class="help-inline" id="spnConfirm"></span>
                    </div>
                </div>
                <div class="control-group ">
                    <label for="txtCorreo" class="control-label">Correo Electrónico (*)</label>
                    <div class="controls">
                        <input class="input-large" id="txtCorreo" name="txtCorreo" type="email" placeholder="Ejemplo@dominio.com" required/>
                    </div>
                </div>
            </div>
        </div>
        <!-- END GRID PORTLET-->
    </div>
    <div class="span5" id="info-basica" style="display: none;">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget white-full">
            <div class="widget-title">
                <h4>Información Básica</h4>
            </div>
            <div class="widget-body form">
                <div class="row-fuild">

                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label">Tipo de documento (*)</label>
                            <div class="controls">
                                <select class="input-large" tabindex="1" id="slctTipo_Documento" required/>
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
                        <label for="txtDocumento" class="control-label">Documento (*)</label>
                        <div class="controls">
                            <input class="input-large" id="txtDocumento" name="txtDocumento" type="text" required/>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row-fuild">
                <div class="span6">
                    <div class="control-group" >
                        <label for="txtPrimerNombre" class="control-label">Primer Nombre (*)</label>
                        <div class="controls">
                            <input class="input-large texto" id="txtPrimerNombre" name="txtPrimerNombre" type="text" required/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group ">
                        <label for="txtSegundoNombre" class="control-label">Segundo Nombre</label>
                        <div class="controls">
                            <input class="input-large texto" id="txtSegundoNombre" name="txtSegundoNombre" type="text" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fuild">
                <div class="span6">
                    <div class="control-group ">
                        <label for="txtPrimerApellido" class="control-label">Primer Apellido (*)</label>
                        <div class="controls">
                            <input class="input-large texto" id="txtPrimerApellido" name="txtPrimerApellido" type="text" required/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group ">
                        <label for="txtSegundoApellido" class="control-label">Segundo Apellido (*)</label>
                        <div class="controls">
                            <input class="input-large texto" id="txtSegundoApellido" name="txtSegundoApellido" type="text" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">   
                    <div class="control-group" name="inputMedico">
                        <label class="control-label">Especialización (*)</label>
                        <div class="controls">
                            <select class="input-large" tabindex="1" id="slctEspecializacion" required/>
                            <option value="" selected="selected">Seleccione una opción</option>
                            <?php foreach ($especializacion as $value) {
                                echo "<option value='$value->id_especializacion'>$value->descripcion</option>";
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="control-group " name="inputPaciente">
                    <label for="txtOcupacion" class="control-label">Ocupación</label>
                    <div class="controls">
                        <input class="input-large textoynumeros" id="txtOcupacion" name="txtOcupacion"  type="text">
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Género (*)</label>
                    <div class="controls">
                        <select class="input-large" tabindex="1" id="slctGenero" required/>
                        <option value="" selected="selected">Seleccione una opción</option>
                        <?php foreach ($genero as $value) {
                            echo "<option value='$value->id_genero'>$value->descripcion</option>";
                        } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fuild">
        <div class="span6">
            <div class="control-group" name="inputPaciente">
                <label class="control-label">Departamento (*)</label>
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
            <label class="control-label">Municipio (*)</label>
            <div class="controls">
                <select class="input-large" tabindex="1" id="municipios" disabled="true" required/> 
                <option value="" selected="selected">Seleccione una opción</option>
            </select>
        </div>
    </div>

</div>
</div>
<div class="row-fluid">
    <div class="span6">
        <div class="control-group" name="inputPaciente">
            <label class="control-label">Estado Civil (*)</label>
            <div class="controls">
                <select class="input-large" tabindex="1" id="slctEstado_Civil" required/>
                <option value="" selected="selected">Seleccione una opción</option>
                <?php foreach ($estado_civil as $value) {
                    echo "<option value='$value->id_estado_civil'>$value->descripcion</option>";
                } ?>
            </select>
        </div>
    </div>
</div>
<div class="span6">
    <div class="control-group" name="inputPaciente">
        <label class="control-label">Escolaridad  (*)</label>
        <div class="controls">
            <select class="input-large" tabindex="1" id="slctEscolaridad" required/>
            <option value="" selected="selected">Seleccione una opción</option>
            <?php foreach ($escolaridad as $value) {
                echo "<option value='$value->id_escolaridad'>$value->descripcion</option>";
            } ?>
        </select>
    </div>
</div>

</div>
<div class="row-fuild">
    <div class="span6">
        <div class="control-group " name="inputPaciente">
            <label for="dpFechaNacimiento" class="control-label">Fecha de nacimiento (*)</label>
                <input class="" id="dpFechaNacimiento"  type="text" value="" readonly="">
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
<div class="span3" id="info-contacto" style="display: none;">
    <!-- BEGIN GRID SAMPLE PORTLET-->
    <div class="widget white-full">
        <div class="widget-title">
            <h4>Información de Contacto</h4>
        </div>
        <div class="widget-body">
            <div class="row-fluid">

                <div class="span8">
                  <div class="control-group ">
                    <label for="txtTelefono" class="control-label">Teléfono</label>
                    <div class="controls">
                        <form>
                            <input class="input-small" id="txtTelefono" name="txtTelefono" type="tel" data-mask="999-99-99"  placeholder="000-00-00">
                        </form>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group ">
                    <label for="txtExt" class="control-label">Extensión</label>
                    <div class="controls">
                        <form>
                            <input class="input-mini" id="txtExt" name="txtExt" type="text" data-mask="(999)" placeholder="000">
                        </form>
                    </div>
                </div>  
            </div>

        </div>
        <div class="control-group">
            <label for="txtCelular" class="control-label">Celular</label>
            <div class="controls">
                <input class="input-medium" id="txtCelular" name="txtCelular" type="tel" data-mask="999-999-99-99" placeholder="000-000-00-00">
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
<!-- END GRID PORTLET-->
</div>
</div>

</div>
<div class="modal-footer" id="botones" style="display:none;">
  <div class="control-droup">
      <div style="float:left;   text-align: left;"><div class="alert alert-block alert-info fade in">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <h4 class="alert-heading">Información!</h4>
          <p>
            Los campos marcados con (*) son obligatorios.
        </p>
    </div></div>
    <div class="controls">
        <button class="btn btn-info" href="#confirmarLimpiar" role="button" data-toggle="modal" id="btnLimpiarUsuario">Limpiar</button>
        <button class="btn btn-info" type="submit" id="guardarUsuario">Guardar</button>
    </div>  
</div>
</div>
    <!-- <div class="widget white-full span6 options" id="botones" style="display:none;">
        <div class="widget-body form">
            <div class="form-actions">
                <button class="btn btn-info" type="submit" id="guardarUsuario">Guardar</button>
            </div>

        </div>
    </div> -->
</div><div id="confirmarLimpiar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: block;">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel3">Limpiar formulario</h3>
</div>
<div class="modal-body">
    <p>El fomulario será limpiado y la información no podrá ser recuperada.<br><strong>¿Realmente desea continuar?</strong></p>
</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button data-dismiss="modal" onclick="LimpiarCamposUsuario()" class="btn btn-primary">Aceptar</button>
</div>
</div>
