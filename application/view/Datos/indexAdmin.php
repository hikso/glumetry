<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">
                Datos 
            </h3>
            <ul Class="breadcrumb"></ul>
        </div>
    </div>
    <div class="container-fluid">
        <h4 id="result"></h4>
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-body">
                            <div class="form-horizontal" method="POST">
                                <div id="tabsleft" class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <div class="span12">
                                            <h3 class="page-title">
                                                Datos Perfil
                                            </h3>
                                            <ul Class="breadcrumb"></ul>
                                        </div>
                                        <li class="active" ><a href="#tabsleft-tab1" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Género</span> <span class="muted" ></span></a></li>
                                        <li class=""><a href="#tabsleft-tab2" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Tipo de documento</span> <span class="muted" ></span></a></li>
                                        <li class=""><a href="#tabsleft-tab3" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Estado Civil</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab15" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Especialización</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab4" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Escolaridad</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab6" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Departamento</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab5" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Municipio</span> <span class="muted"></span></a></li>
                                        <ul Class="breadcrumb"></ul>
                                        <div class="span12">
                                            <h3 class="page-title">
                                            Datos Historia Clinica
                                            </h3>
                                            <ul Class="breadcrumb"></ul>
                                        </div>
                                        <li class=""><a href="#tabsleft-tab8" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Hábitos Personales</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab9" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Frecuencia</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab11" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Tipo de antecedente</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab12" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Distribución de antecedente</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab13" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Partes del cuerpo</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab14" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Distribución partes del cuerpo</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab18" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Estado Partes Cuerpo</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab16" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Aparato Sistema</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab17" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Momento</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab19" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Parentesco</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab20" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Recomendación</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab21" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Tipo Rangos</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab22" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Rango</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab23" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Clasificación Alimentos</span> <span class="muted"></span></a></li>
                                        <li class=""><a href="#tabsleft-tab24" data-toggle="tab" onclick="LimpiarResult(this)"><span class="strong">Alimentos</span> <span class="muted"></span></a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <!---Inicion tabla Genero-->
                                        <div class="tab-pane active" id="tabsleft-tab1">
                                            <div class="control-group">
                                                <label class="control-label">Género</label>
                                                <div class="controls">
                                                    <input style="display : none" type="text" id="txtid" >
                                                    <input type="text" class="span6" id="txtGenero" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                    <button class="btn btn-success" type="button" id="btnGuardarGenero" >Guardar</button>
                                                    <button class="btn btn-success" type="button" id="btnActualizarGenero" style="display:none;" >Actualizar</button>                                        
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoG">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoGenero" id="SelectEstadoGenero">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Generos Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaGenero" class="span12">
                                                        <thead>
                                                            <tr>
                                                                <th style="display : none">id</th>
                                                                <th style="display : none">estado</th>
                                                                <th>Genero</th>
                                                                <th>Estado</th>
                                                                <th>Editar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_Genero">
                                                             <?php foreach ($genero as $value) { ?>
                                                                <tr>
                                                                <td style='display : none'><?php echo $value->id_genero; ?></td>
                                                                <td style='display : none'><?php echo $value->estado; ?></td>
                                                                <td><?php echo $value->genero; ?></td>
                                                                <td>
                                                                <?php if($value->estado == 0) {?>
                                                                    Activo
                                                                <?php }else{?>
                                                                   Inactivo
                                                                <?php } ?>
                                                                </td>
                                                                <td><a name='btnEditarGenero' id='<?php echo $value->id_genero?>' onclick='cargarModalGenero(this)' class='edit' >Editar</a></td>
                                                                </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Genero-->


                                        <!-- Inicio Tipo Documento-->
                                        <div class="tab-pane" id="tabsleft-tab2"> 
                                            <div class="control-group ">
                                                <label class="control-label span4">Tipo de documento</label>
                                                <div class="controls">                                        
                                                    <input style="display : none" type="text" id="txtidTD">
                                                    <input type="text" class="span6" id="txtTipoDocumento" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                    <button class="btn btn-success" type="button" id="btnGuardarTipoDoc">Guardar</button>
                                                    <button class="btn btn-success" type="button" id="btnActualizarTipoDoc" style="display:none;">Actualizar</button>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoTD">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoTD" id="SelectEstadoTD">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Inicio Tabla Tipo Documento-->
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Tipos De Documentos Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaTipoDocumentos">
                                                        <thead>
                                                        <tr>    
                                                            <th style="display: none">idTD</th>                                    
                                                            <th>Tipo Documento</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>                                                    
                                                        </tr>
                                                        </thead>
                                                        <tbody >
                                                        <?php foreach ($tipoDocumento as $value) { ?>
                                                            <tr>
                                                            <td style='display : none'>$value->id_tipo_documento</td>
                                                            <td><?php echo $value->descripcion; ?></td>
                                                            <td style='display:none'><?php echo $value->estado;?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarTD' id='$value->id_tipo_documento' type='button' onclick='cargarTipoDocumentoEditar(this)' class='btn btn-primary btn-lg' >
                                                              Editar
                                                            </button></td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Tipo Documento-->

                                        
                                        <!-- Inicio Estado Civil-->
                                        <div class="tab-pane" id="tabsleft-tab3">
                                            <div class="control-group ">
                                                <label class="control-label span4">Estado Civil</label>
                                                <div class="controls">
                                                    <input type="text" style="display:none" id="txtIDEstadoCivil">
                                                    <input type="text" class="span6" id="txtEstadoCivil" onkeypress="return validarLetras(event)" onpaste="return false;">                                        
                                                    <button class="btn btn-success" type="submit" id="btnGuardarEstadoCivil">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnUdpEstadoCivil" style="display:none">Actualizar</button>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoEstadoCiv">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoEstCiv" id="SelectEstadoEstCiv">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Inicio Tabla Estado Civil-->
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Estado Civil Registrados</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaEstadoCivil" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">idEstCiv</th>
                                                            <th>Estado Civil</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($estadoCivil as $value) { ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_estado_civil; ?></td>
                                                            <td><?php echo $value->descripcion;?></td>
                                                            <td style="display:none"><?php echo $value->estado;?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditEstCivil' id='$value->id_estado_civil' type='button' onclick='cargarEstCiv(this)' class='btn btn-primary btn-lg' >
                                                              Editar
                                                            </button></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Estado Civil-->


                                        <!-- Inicio Especializacion-->
                                        <div class="tab-pane" id="tabsleft-tab15">
                                            <div class="control-group">
                                                <label class="control-label span4">Especialización</label>
                                                <div class="controls">
                                                    <input type="text" style="display:none" id="txtIdEspecializacion" >
                                                    <input type="text" class="span6" id="txtEspecializacion" onkeypress="return validarLetras(event)" onpaste="return false;">                                        
                                                    <button class="btn btn-success" type="submit" id="btnGuardarEspecializacion">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnUdpEspecializacion" style='display:none'>Actualizar</button>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoEspecializa">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoEspciliza" id="SelectEstadoEspciliza">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Inicio Tabla Especializacion-->
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Especialización Registrados</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaEspecializacion" class="span12">
                                                        <thead>
                                                            <th style="display:none">idEspecializacion</th>
                                                            <th>especialización</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($especializacion as $value) { ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_especializacion;?></td>
                                                            <td><?php echo $value->descripcion;?></td>
                                                            <td style="display:none"><?php echo $value->estado;?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarEstCiv' id='$value->id_especializacion' type='button' onclick='cargarEsp(this)' class='btn btn-primary btn-lg' >
                                                             Editar
                                                            </button></td>
                                                            </tr>
                                                            <?php } ?>                               
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Especializacion-->
                                        

                                        <!-- Inicio Escolaridad-->
                                        <div class="tab-pane" id="tabsleft-tab4">
                                            <div class="control-group">
                                                <label class="control-label span4">Escolaridad</label>
                                                <div class="controls">
                                                    <input type="text" style="display:none" id="txtIdEcolaridad">
                                                    <input type="text" class="span6" id="txtEscolaridad" onkeypress="return validarLetras(event)" onpaste="return false;">                                        
                                                    <button class="btn btn-success" type="submit" id="btnGuardarEscolaridad">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnUdpEscolaridad" style="display:none">Actualizar</button>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoEscolaridad">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoEscolaridad" id="SelectEstadoEscolaridad">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Escolaridades Registradas</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaEscolaridad" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">idEscolaridad</th>
                                                            <th>Escolaridad</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($escolaridad as $value){ ?>
                                                                <tr>
                                                                <td style='display:none'><?php echo $value->id_escolaridad;?></td>
                                                                <td><?php echo $value->descripcion;?></td>
                                                                <td style="display:none"><?php echo $value->estado; ?></td>
                                                                <td>
                                                                <?php if($value->estado == 0) {?>
                                                                    Activo
                                                                <?php }else{?>
                                                                   Inactivo
                                                                <?php } ?>
                                                                </td>
                                                                <td><button name='bntEditarEscolaridad' id='$value->id_escolaridad' type='button' onclick='cargarEsc(this)' class='btn btn-primary btn-lg' >
                                                                 Editar
                                                                </button></td>
                                                                </tr>
                                                                <?php } ?>                             
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Escolaridad-->


                                        <!-- Inicio Departamento-->
                                        <div class="tab-pane esp3" id="tabsleft-tab6" >
                                            <div class="control-group">
                                                <label class="control-label span4">Departamento</label>
                                                <div class="controls">
                                                    <input type="text" style="display:none" id="txtIdDepar">
                                                    <input type="text" class="span6" id="txtDepartamento" onkeypress="return validarLetras(event)" onpaste="return false;">                                
                                                    <button class="btn btn-success" type="submit" id="btnGuardarDepartmento">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnUdpDepartmento" style="display:none">Actualizar</button>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoDepartament">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoDepartament" id="SelectEstadoDepartament">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                            <div class="widget-title">
                                                <h4> Departamentos Registrados</h4>                            
                                            </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaDepartamentos" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">idDepartamento</th>
                                                            <th>Departamento</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                       <tbody>
                                                            <?php foreach ($departamento as $value){ ?>
                                                                <tr>
                                                                <td style='display:none'><?php echo $value->id_departamento; ?></td>
                                                                <td><?php echo $value->departamento; ?></td>
                                                                <td style="display:none"><?php echo $value->estado; ?></td>
                                                                <td>
                                                                <?php if($value->estado == 0) {?>
                                                                    Activo
                                                                <?php }else{?>
                                                                   Inactivo
                                                                <?php } ?>
                                                                </td>
                                                                <td><button name='btnEditarDepartamento' id='$value->id_departamento' type='button' onclick='cargarDepart(this)' class='btn btn-primary btn-lg' >
                                                                Editar
                                                                </button></td>
                                                                </tr>
                                                                <?php } ?>                             
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Departamento-->



                                        <!-- Inicio Municipio-->
                                        <div class="tab-pane" id="tabsleft-tab5">
                                            <div class="control-group">
                                            <label class="control-label">Departamento</label>
                                                <div class="controls">
                                                        <select name="departamentoM" id="departamentoM" class="span6">
                                                            <option id="select">Seleccionar</option>
                                                            <?php foreach ($departamento as $value) { ?>
                                                            <option id="id_Depart" value="<?php echo $value->id_departamento; ?>"><?php echo $value->departamento; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                      <input type="text" style="display:none" id="txtIdMunicipio">
                                                      <button class="btn btn-success" type="submit" id="btnGuardarMunicipio">Guardar</button>
                                                      <button class="btn btn-success" type="submit" id="btnUdpMunicipio" style="display:none">Actualizar</button>
                                                </div>
                                            </div> 
                                            <div class="control-group">
                                                <label class="control-label">Municipio</label>
                                                <div class="controls">
                                                    <input type="text" class="span6" id="txtMunicipio" autofocus onkeypress="return validarLetras(event)" onpaste="return false;">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoMunicipio">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoMunicipio" id="SelectEstadoMunicipio">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                            <div class="widget-title">
                                                <h4> Municipios Registrados</h4>                            
                                            </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaMunicipios" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">id_Departamento</th>
                                                            <th style="display:none">id_municipio</th>
                                                            <th>Departamento</th>                                        
                                                            <th>Municipio</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($municipio as $value){ ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_departamento ?></td>
                                                            <td style='display:none'><?php echo $value->id_municipio ?></td>
                                                            <td><?php echo $value->departamento ?></td>
                                                            <td><?php echo $value->municipio ?></td>
                                                            <td style="display:none"><?php echo $value->estado ?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarMuni' id='$value->id_municipio' type='button' onclick='cargarMunicipio(this)' class='btn btn-primary btn-lg' >
                                                            Editar
                                                            </button></td>                                                                                                
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Municipio-->


                                        <!-- Inicio Tabla Hábitos Personales-->
                                        <div class="tab-pane" id="tabsleft-tab8">
                                            <div class="control-group">
                                                <label class="control-label span4">Hábitos Personales</label>
                                                <div class="controls">
                                                    <input type="text" style="display:none" id="txtIdHabPers">
                                                    <input type="text" class="span6" id="txtHabitosPersonales" onkeypress="return validarLetras(event)" onpaste="return false;">                                        
                                                    <button class="btn btn-success" type="submit" id="btnGuardarHabitosPersonale">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnUdpHabitosPersonale" style="display:none">Actualizar</button>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoHabitosPer">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoHabitosPer" id="SelectEstadoHabitosPer">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Hábitos Personales Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaHabitosPersonales" class="span12">
                                                        <thead>
                                                        <tr>   
                                                            <th style="display: none">idHabitosPersonales</th>
                                                            <th>Hábitos Personales</th>
                                                            <th style="display: none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($habitosPersonales as $value) { ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_habitos_personales; ?></td>
                                                            <td><?php echo $value->descripcion; ?></td>
                                                            <td style='display:none'><?php echo $value->estado; ?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarHabPer' id='$value->id_habitos_personales' type='button' onclick='cargarHabPer(this)' class='btn btn-primary btn-lg' >
                                                             Editar
                                                            </button></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Hábitos Personales-->


                                        <!-- Inicio Frecuencia-->
                                        <div class="tab-pane" id="tabsleft-tab9">
                                                <div class="control-group">
                                                    <label class="control-label">Habito Personal</label>
                                                        <div class="controls">
                                                                    <select name="HabitoPersonal" id="HabitoPersonal" class="span6">
                                                                        <option id="select">Seleccionar</option>
                                                                        <?php foreach ($habitosPersonales as $value) { ?>
                                                                        <option id="id_HabitosPersonalesSelect" value="<?php echo $value->id_habitos_personales; ?>"><?php echo $value->descripcion; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                              <button class="btn btn-success" type="submit" id="btnGuardarFrecuencia">Guardar</button>
                                                              <button class="btn btn-success" type="submit" id="btnUdpFrecuencia" style="display:none">Actualizar</button>
                                                        </div>
                                                </div> 
                                                <div class="control-group">
                                                    <label class="control-label">Frecuencia</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdFrecuencia">
                                                        <input type="text" class="span6" id="txtFrecuencia" onpaste="return false;">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                                <div class="control-group"  style="display:none" id="EstadoFrecuencia">
                                                    <label class="control-label span4">Estado</label>
                                                    <div class="control-group">
                                                        <select name="SelectEstadoFrecuencia" id="SelectEstadoFrecuencia">
                                                            <option value="0">Activo</option>
                                                            <option value="1">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="widget blue span10">
                                                    <div class="widget-title">
                                                        <h4> Frecuencias Registradas</h4>                            
                                                    </div>
                                                    <div class="widget-body">
                                                        <table name="DataTable" class="table" id="tablaFrecuencia" class="span12">
                                                            <thead>
                                                                <tr>
                                                                    <th style="display:none">idHabitoPersonal</th>
                                                                    <th style="display:none">id_frecuencia</th>
                                                                    <th>Habito Personal</th>
                                                                    <th>Frecuencia</th>
                                                                    <th style="display:none">Estado</th>
                                                                    <th>Estado</th>
                                                                    <th>Editar</th>                                                        
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($frecuencia as $value){ ?>
                                                                <tr>
                                                                    <td style='display:none'><?php echo $value->id_hab?></td>
                                                                    <td style='display:none'><?php echo $value->id_frec?></td>
                                                                    <td><?php echo $value->habito?></td>
                                                                    <td><?php echo $value->frecuencia?></td>
                                                                    <td style="display:none"><?php echo $value->estado?></td>
                                                                    <td>
                                                                    <?php if($value->estado == 0) {?>
                                                                        Activo
                                                                    <?php }else{?>
                                                                       Inactivo
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td><button name='btnEditarFrecuencia' id='$value->id_frec' type='button' onclick='cargarFrec(this)' class='btn btn-primary btn-lg' >
                                                                    Editar
                                                                    </button></td>                                                                                                
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- Fin Tabla Frecuencia-->



                                        <!-- Inicio Tabla Tipo antecedente-->
                                        <div class="tab-pane" id="tabsleft-tab11">
                                            <div class="control-group">
                                                <label class="control-label span4">Tipo de antecedente</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdTipoAntec">
                                                        <input type="text" class="span6" id="txtTipoAntecedente" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnGuardarTipoAntecedente">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnAdpTipoAntecedente" style="display:none">Actualizar</button>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoTipoAntecedente">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoTipoAntecedente" id="SelectEstadoTipoAntecedente">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <br />
                                                <br />
                                                <div class="widget blue span10">
                                                    <div class="widget-title">
                                                        <h4> Tipo de antecedentes</h4>                            
                                                    </div>
                                                        <div class="widget-body">
                                                            <table name="DataTable" class="table" id="TablaTipoAntecedente" class="span12">
                                                                <thead>
                                                                <tr>
                                                                    <th style="display:none">idTipAntec</th>
                                                                    <th>Tipo Antecedente</th>
                                                                    <th style="Display:none">Estado</th>
                                                                    <th>Estado</th>
                                                                    <th>Editar</th>                                                        
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($tipoAntecedente as $value){ ?>
                                                                    <tr>
                                                                    <td style='display:none'><?php echo $value->id_tipo_antecedente;?></td>
                                                                    <td><?php echo $value->tipo_Antecedente;?></td>
                                                                    <td style='display:none'><?php echo $value->estado;?></td>
                                                                    <td>
                                                                    <?php if($value->estado == 0) {?>
                                                                        Activo
                                                                    <?php }else{?>
                                                                       Inactivo
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td><button name='btnEditarTipAnt' id='$value->id_tipo_antecedente' type='button' onclick='cargarTipAnt(this)' class='btn btn-primary btn-lg' >
                                                                        Editar
                                                                    </button></td>                                                                                                
                                                                </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Fin Tabla Antecedente-->

                                        <!-- Inicio Distribución Antecedente-->
                                        <div class="tab-pane" id="tabsleft-tab12">
                                                <div class="control-group">
                                                    <label class="control-label span4">Tipo Antecedente</label>
                                                        <div class="controls">
                                                            <select name="TipoAntecedenteSelect" id="TipoAntecedenteSelect" class="span6">
                                                                <option id="select">Seleccionar</option>
                                                                <?php foreach ($tipoAntecedente as $value) { ?>
                                                                <option value="<?php echo $value->id_tipo_antecedente; ?>"><?php echo $value->tipo_Antecedente; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label span4 esp8">Distribución de antecedentes</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdDistribuAntece">
                                                        <input type="text" class="span6" id="txtDistribucionAntecedentes" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnGuardarDistribucionAntecendete">Guardar</button>
                                                        <button class="btn btn-success" type="submit" style="display:none" id="btnAdpAntecendete">Actualizar</button>
                                                    </div>
                                                </div>
                                                <div class="control-group"  style="display:none" id="EstadoDistriAnteceden">
                                                    <label class="control-label span4">Estado</label>
                                                    <div class="control-group">
                                                        <select name="SelectEstadoDistriAnteceden" id="SelectEstadoDistriAnteceden">
                                                            <option value="0">Activo</option>
                                                            <option value="1">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br />
                                                <br />
                                                <div class="widget blue span10">
                                                    <div class="widget-title">
                                                        <h4>Distribución de antecedentes</h4>
                                                    </div>
                                                        <div class="widget-body">
                                                            <table name="DataTable" class="table" id="TablaDistribucionAntecedente" class="span12">
                                                                <thead>
                                                                <tr>
                                                                    <th style="display:none">id_tipoAntecedente</th>
                                                                    <th style="display:none">id_clasi_ant</th>
                                                                    <th>Antecedente</th>
                                                                    <th>Distribución</th>
                                                                    <th style="display:none">Estado</th>
                                                                    <th>Estado</th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($distribucionAntecedente as $value){ ?>
                                                                    <tr>
                                                                    <td style='display:none'><?php echo $value->id_tipo_antecedente ?></td>
                                                                    <td style='display:none'><?php echo $value->id_clasificacion_antecedentecol ?></td>
                                                                    <td><?php echo $value->antecedente ?></td>
                                                                    <td><?php echo $value->distribucion ?></td>
                                                                    <td style='display:none'><?php echo $value->estado ?></td>
                                                                    <td>
                                                                    <?php if($value->estado == 0) {?>
                                                                        Activo
                                                                    <?php }else{?>
                                                                       Inactivo
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td><button name='btnEditarDistriAntecedente' id='$value->id_tipo_antecedente' type='button' onclick='CargarDistribucionAntecedente(this)' class='btn btn-primary btn-lg' >
                                                                        Editar
                                                                    </button></td>
                                                                </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Fin Tabla Distribucion Antecedente-->
                            

                                        <!-- Inicio Tabla Partes Del Cuerpo-->
                                        <div class="tab-pane" id="tabsleft-tab13">
                                            <div class="control-group">
                                                <label class="control-label span4">Partes del cuerpo</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdParteCuerpo">
                                                        <input type="text" class="span6" id="txtPartesCuerpo" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnGuardarPartesCuerpo">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpPartesCuerpo" style="display:none">Actualizar</button>
                                                        <a href="#tabsleft-tab14" data-toggle="tab"><span class="strong">Siguiente</span> <span class="muted" ></span></a>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoParsCuerpo">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoParsCuerpo" id="SelectEstadoParsCuerpo">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4>Partes del cuerpo</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="TablaPartesDelCuerpo" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">idPartCuer</th>
                                                            <th>Partes</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($partesCuerpo as $value){ ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_parte_cuerpo; ?></td>
                                                            <td><?php echo $value->partesCuerpo ?></td>
                                                            <td style="display:none"><?php echo $value->estado ?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarPartCuerTipAnt' id='$value->id_parte_cuerpo' type='button' onclick='cargarPartCuer(this)' class='btn btn-primary btn-lg'>
                                                                Editar
                                                            </button></td>                                                                                                
                                                        </tr>
                                                        <?php } ?>                                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Partes Del Cuerpo-->


                                        <!-- Inicio Tabla Distribucion Partes Del Cuerpo -->
                                        <div class="tab-pane" id="tabsleft-tab14">
                                            <div class="control-group">
                                                <label class="control-label span4">Partes Cuerpo</label>
                                                <div class="controls">
                                                    <select name="PartesCuerpoSelect" id="PartesCuerpoSelect" class="span6">
                                                        <option id="selectPC">Seleccionar</option>
                                                        <?php foreach ($partesCuerpo as $value) { ?>
                                                        <option value="<?php echo $value->id_parte_cuerpo; ?>"><?php echo $value->partesCuerpo; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label span4 spa8">Distribución partes cuerpo</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtUIdDistrPartesCuerpo">
                                                        <input type="text" class="span6" id="txtDistribucionPartesCuerpo" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnGuardarDistribucionPartesCuerpo">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpDistribucionPartesCuerpo" style="display:none">Actualizar</button>
                                                        <a href="#tabsleft-tab18" data-toggle="tab"><span class="strong">Siguiente</span> <span class="muted" ></span></a>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoDistriParsCuerpo">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoDistriParsCuerpo" id="SelectEstadoDistriParsCuerpo">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <br />
                                                <br />
                                                    <div class="widget blue span10">
                                                        <div class="widget-title">
                                                            <h4>Distribución partes del cuerpo</h4>                            
                                                        </div>
                                                        <div class="widget-body">
                                                            <table name="DataTable" class="table" id="TablaDistrinucionPartesDelCuerpo" class="span10">
                                                                <thead>
                                                                <tr>
                                                                    <th style="display:none">id_ParteCuerpo</th>
                                                                    <th style="display:none">id_ClaseParCuer</th>
                                                                    <th>Distribución</th>
                                                                    <th>Partes Cuerpo</th>
                                                                    <th style="display:none">Estado</th>
                                                                    <th>Estado</th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($distribucionPartesCuerpo as $value){ ?>
                                                                    <tr>
                                                                    <td style='display:none'><?php echo $value->id_clasePart ?></td>
                                                                    <td style='display:none'><?php echo $value->id_ParteCuer ?></td>
                                                                    <td><?php echo $value->ParteCuerpo ?></td>
                                                                    <td><?php echo $value->distribucionPC ?></td>
                                                                    <td style="display:none"><?php echo $value->estado ?></td>
                                                                    <td>
                                                                    <?php if($value->estado == 0) {?>
                                                                        Activo
                                                                    <?php }else{?>
                                                                       Inactivo
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td><button name='btnEditarDistribucionPC' id='$value->id_ParteCuer' type='button' onclick='CargarDistribucionParteCuerpo(this)' class='btn btn-primary btn-lg'>
                                                                        Editar
                                                                    </button></td>
                                                                </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                        </div>
                                        <!-- Fin Tabla Distribucion Partes Del Cuerpo -->



                                        <!-- Inicio Estado Distribución Partes Cuerpo-->
                                        <div class="tab-pane" id="tabsleft-tab18">
                                            <div class="control-group ">
                                                <label class="control-label span4">Distribución</label>
                                                    <div class="controls">
                                                        <select name="EstadoDistribucioPartesCuerpoSelect" id="EstadoDistribucioPartesCuerpoSelect" class="span6">
                                                            <option id="selectPC">Seleccionar</option>
                                                            <?php foreach ($estadoDistriParCue2 as $value) { ?>
                                                            <option value="<?php echo $value->id_clase_parte_cuerpo; ?>"><?php echo $value->parteCuerpo, " - ", $value->distribucion; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="control-group ">
                                                <label class="control-label span4">Estado Parte Cuerpo</label>
                                                <div class="controls">
                                                    <input type="text" style="display:none" id="txtId_EstadoPartesCuerpo">
                                                    <input type="text" class="span6" id="txtEstadoPartesCuerpo" onkeypress="return validarLetras(event)" onpaste="return false;">                                        
                                                    <button class="btn btn-success" type="submit" id="btnGuardarEstadoPartesCuerpo">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnActualizarEstadoPartesCuerpo" style="display:none">Actualizar</button>
                                                    <a href="#tabsleft-tab14" data-toggle="tab"><span class="strong">Anterior</span> <span class="muted" ></span></a>
                                                </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoEstParsCuerpo">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoEstParsCuerpo" id="SelectEstadoEstParsCuerpo">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Inicio Tabla Estado Distribución Partes Cuerpo-->
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4> Estado Distribución Partes Cuerpo Registrados</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="tablaEstadoDistribucionPartesCuerpo" class="span12">
                                                        <thead>
                                                        <tr>
                                                           <tr>
                                                                <th style="display:none">id_Estado</th>
                                                                <th>Estado</th>
                                                                <th style="display:none">id_Clase_Parte_cuerpo</th>
                                                                <th>Distribución</th>
                                                                <th>Parte Cuerpo</th>
                                                                <th style="display:none">Estado</th>
                                                                <th>Editar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($estadoDistribucionPartesCuerpo as $value) { ?>
                                                                <tr>
                                                                <td style='display:none'><?php echo $value->id_estado ?></td>
                                                                <td><?php echo $value->estado ?></td>
                                                                <td style='display:none'><?php echo$value->id_clase_parte_cuerpo ?></td>
                                                                <td><?php echo $value->parteCuerpo ?></td>
                                                                <td><?php echo $value->distribucion ?></td>
                                                                <td style="display:none"><?php echo $value->est ?></td>
                                                                <td>
                                                                <?php if($value->est == 0) {?>
                                                                    Activo
                                                                <?php }else{?>
                                                                   Inactivo
                                                                <?php } ?>
                                                                </td>
                                                                <td><a name='btnEditarEstadoDistribucionParteCuerpo' id='$value->id_estado' onclick='cargarEstDisParCue(this)' class='edit' >
                                                                  Editar
                                                                </a></td>
                                                                </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Distribución partes cuerpo-->



                                        <div class="tab-pane" id="tabsleft-tab16"> 
                                            <div class="control-group ">
                                                <label class="control-label span4">Aparato Sistema</label>
                                                <div class="controls">
                                                    <input type="text" style="display: none" id="txtIdApaSis">
                                                    <input type="text" class="span6" id="txtAparatoSistema" autofocus onkeypress="return validarLetras(event)" onpaste="return false;">
                                                </div>
                                            </div>
                                            <label class="control-label span4">Descripción</label>
                                                <div class="control-group ">
                                                    <textarea id="TextAreaDescripcionAparato" rows="5" cols="100" autofocus class="input-xlarge" required> </textarea>
                                                </div>
                                                <br />
                                                <div class="control-group"  style="display:none" id="EstadoAparaSistema">
                                                    <label class="control-label span4">Estado</label>
                                                    <div class="control-group">
                                                        <select name="SelectEstadoAparaSistema" id="SelectEstadoAparaSistema">
                                                            <option value="0">Activo</option>
                                                            <option value="1">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <button class="btn btn-success" type="submit" id="btnGuardarAparatoSistema" style="align: right">Guardar</button>
                                                    <button class="btn btn-success" type="submit" id="btnUpdAparatoSistema" style="display:none;">Actulizar</button>
                                                </div>
                                             <!-- Inicio Tabla Aparato Sistema-->
                                            <br />
                                            <br />
                                                <div class="widget blue span10">
                                                    <div class="widget-title">
                                                        <h4>Aparato Sistema Registrados</h4>                            
                                                    </div>
                                                    <div class="widget-body">
                                                        <table name="DataTable" class="table" id="tablaAparatoSistema">
                                                            <thead>
                                                            <tr>     
                                                                <th style="display:none">idAparatoSistema</th>
                                                                <th>Nombre Aparato</th>
                                                                <th>Aparato Sistema</th>
                                                                <th style="display:none">Estado</th>
                                                                <th>Estado</th>
                                                                <th>Editar</th>                                                    
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($aparatoSistema as $value) { ?>
                                                                <tr>
                                                                <td style='display:none'><?php echo $value->id_aparato_sistema; ?></td>
                                                                <td><?php echo $value->nombre_aparato; ?></td>
                                                                <td><?php echo $value->aparatoSistema; ?></td>
                                                                <td style="display:none"><?php echo $value->estado; ?></td>
                                                                <td>
                                                                <?php if($value->estado == 0) {?>
                                                                    Activo
                                                                <?php }else{?>
                                                                   Inactivo
                                                                <?php } ?>
                                                                </td>
                                                                <td><button name='btnEditarApaSis' id='$value->id_aparato_sistema' type='button' onclick='cargarApaSisEditar(this)' class='btn btn-primary btn-lg' >
                                                                  Editar
                                                                </button></td>
                                                                </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- Fin Tabla Aparato Sistema-->



                                        <!-- Inicio Tabla Momento-->
                                        <div class="tab-pane" id="tabsleft-tab17">
                                            <div class="control-group">
                                                <label class="control-label span4">Momento</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdMomentoM">
                                                        <input type="text" class="span6" id="txtMomentoM" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnguardarMmomento">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpMmomento" style="display:none">Actualizar</button>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoMomento">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoMomento" id="SelectEstadoMomento">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4>Momentos Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="TablaMomento" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">id_Momento</th>
                                                            <th>Momento</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($momento as $value){ ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo  $value->id_momento; ?></td>
                                                            <td><?php echo  $value->momento; ?></td>
                                                            <td style='display:none'><?php echo  $value->estado; ?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarMomento' id='$value->id_momento' type='button' onclick='cargarMomentoM(this)' class='btn btn-primary btn-lg'>
                                                                Editar
                                                            </button></td>                                                                                                
                                                        </tr>
                                                        <?php } ?>                                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Momento-->



                                        <!-- Inicio Tabla Parentesco-->
                                        <div class="tab-pane" id="tabsleft-tab19">
                                            <div class="control-group">
                                                <label class="control-label span4">Parentesco</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdParentescoM">
                                                        <input type="text" class="span6" id="txtParentesco" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnguardarParentescoM">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpParentescoM" style="display:none">Actualizar</button>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoParentesco">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoParentesco" id="SelectEstadoParentesco">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4>Parentescos Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="TablaParentesco" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">id_Parentesco</th>
                                                            <th>Parentesco</th>
                                                            <th>Estado</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($parentesco as $value){ ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_parentesco; ?></td>
                                                            <td><?php echo $value->Parentesco; ?></td>
                                                            <td style="display:none"><?php echo $value->estado; ?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarParentesco' id='$value->id_parentesco' type='button' onclick='CargarParentesco(this)' class='btn btn-primary btn-lg'>
                                                                Editar
                                                            </button></td>                                                                                                
                                                        </tr>
                                                        <?php } ?>                                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Parentesco-->



                                        <!-- Inicio Tabla Recomendación-->
                                        <div class="tab-pane" id="tabsleft-tab20">
                                            <div class="control-group">
                                                <label class="control-label span4">Recomendación</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdRecomendacionM">
                                                        <input type="text" class="span6" id="txtRecomendacionM" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label span4">Siglas</label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="txtSiglasM" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnguardarRecomendacionM">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpRecomendacionM" style="display:none">Actualizar</button>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoRecomendacion">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoRecomendacion" id="SelectEstadoRecomendacion">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4>Recomendaciones Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="TablaRecomendacion" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">id_Recomendacion</th>
                                                            <th>Recomendación</th>
                                                            <th>Siglas</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($recomendacion as $value){ ?>
                                                           <tr>
                                                            <td style='display:none'><?php echo $value->id_recomendacion_rango;?></td>
                                                            <td><?php echo $value->recomendacion;?></td>
                                                            <td><?php echo $value->siglas;?></td>
                                                            <td style='display:none'><?php echo $value->estado;?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarRecomedacion' id='$value->id_recomendacion_rango' type='button' onclick='CargarRecomendacion(this)' class='btn btn-primary btn-lg'>
                                                                Editar
                                                            </button></td>                                                                                                
                                                        </tr>
                                                        <?php } ?>                                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Recomendación-->


                                        <!-- Inicio Tabla Tipo Rango-->
                                        <div class="tab-pane" id="tabsleft-tab21">
                                            <div class="control-group">
                                                <label class="control-label span4">Tipo Rango</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdTipoRangoM">
                                                        <input type="text" class="span6" id="txtTipoRango" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnguardarTipoRangoM">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpTipoRangoM" style="display:none">Actualizar</button>
                                                        <a href="#tabsleft-tab22" data-toggle="tab"><span class="strong">Siguiente</span> <span class="muted" ></span></a>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoTipoRango">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoTipoRango" id="SelectEstadoTipoRango">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4>Tipos De Rangos Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="TablaTipoRango" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">id_tipoRango</th>
                                                            <th>Tipo Rango</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Editar</th>                                                        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($tipoRango as $value){ ?>
                                                           <tr>
                                                            <td style='display:none'><?php echo $value->id_tipo_rango ?></td>
                                                            <td><?php echo $value->tipoRango ?></td>
                                                            <td style='display:none'><?php echo $value->estado ?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarTipoRango' id='$value->id_tipo_rango' type='button' onclick='CargarTipoRango(this)' class='btn btn-primary btn-lg'>Editar</button></td>                                                                                                
                                                            </tr>
                                                        <?php } ?>                                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Parentesco-->


                                        <!-- Inicio Tabla Distribucion Partes Del Cuerpo -->
                                        <div class="tab-pane" id="tabsleft-tab22">
                                            <div class="control-group">
                                                <label class="control-label span4">Tipos de Rangos</label>
                                                <div class="controls">
                                                    <select name="TiposRangoSelect" id="TiposRangoSelect" class="span6">
                                                        <option id="selectTipoRango">Seleccionar</option>
                                                        <?php foreach ($tipoRango as $value) { ?>
                                                        <option value="<?php echo $value->id_tipo_rango; ?>"><?php echo $value->tipoRango; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label span4 spa8">Rango</label>
                                                    <div class="controls">
                                                        <input type="text" id="txtIdRangosM" style="display:none">
                                                        <input type="text" class="span6" id="txtRangoM" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnGuardarRangos">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpRangos" style="display:none">Actualizar</button>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoRango">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoRango" id="SelectEstadoRango">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <br />
                                                <br />
                                                    <div class="widget blue span10">
                                                        <div class="widget-title">
                                                            <h4>Rangos</h4>                            
                                                        </div>
                                                        <div class="widget-body">
                                                            <table name="DataTable" class="table" id="TablaRangos" class="span10">
                                                                <thead>
                                                                <tr>
                                                                    <th style="display:none">id_Rangos</th>
                                                                    <th>Rango</th>
                                                                    <th>Tipo Rango</th>
                                                                    <th style="display:none">Estado</th>
                                                                    <th>Estado</th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($rangos as $value){ ?>
                                                                    <tr>
                                                                    <td style='display:none'><?php echo $value->id_rango; ?></td>
                                                                    <td style='display:none'><?php echo $value->id_tipo_rango; ?></td>
                                                                    <td><?php echo $value->Rangos; ?></td>
                                                                    <td><?php echo $value->TipoRangoC; ?></td>
                                                                    <td style='display:none'><?php echo $value->estado; ?></td>
                                                                    <td>
                                                                    <?php if($value->estado == 0) {?>
                                                                        Activo
                                                                    <?php }else{?>
                                                                       Inactivo
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td><button name='btnEditarRangos' id='$value->id_rango' type='button' onclick='CargarRangos(this)' class='btn btn-primary btn-lg'>
                                                                        Editar
                                                                    </button></td>
                                                                </tr>
                                                                <?php } ?>                                 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                        </div>
                                        <!-- Fin Tabla Rangos -->


                                        <!-- Inicio Tabla Clasificacion Alimentos-->
                                        <div class="tab-pane" id="tabsleft-tab23">
                                            <div class="control-group">
                                                <label class="control-label span4">Clasificación Alimentos</label>
                                                    <div class="controls">
                                                        <input type="text" style="display:none" id="txtIdClasificacion">
                                                        <input type="text" class="span6" id="txtClasificacionAM" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        <button class="btn btn-success" type="submit" id="btnguardarClasificacionAlimentos">Guardar</button>
                                                        <button class="btn btn-success" type="submit" id="btnUdpClasificacionAlimentos" style="display:none">Actualizar</button>
                                                        <a href="#tabsleft-tab24" data-toggle="tab"><span class="strong">Siguiete</span> <span class="muted" ></span></a>
                                                    </div>
                                            </div>
                                            <div class="control-group"  style="display:none" id="EstadoClasificacionAlimentos">
                                                <label class="control-label span4">Estado</label>
                                                <div class="control-group">
                                                    <select name="SelectEstadoClasificacionAlimentos" id="SelectEstadoClasificacionAlimentos">
                                                        <option value="0">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="widget blue span10">
                                                <div class="widget-title">
                                                    <h4>Clasificaciones De Alimentos Registradas Registrados</h4>                            
                                                </div>
                                                <div class="widget-body">
                                                    <table name="DataTable" class="table" id="TablaClasificacionM" class="span12">
                                                        <thead>
                                                        <tr>
                                                            <th style="display:none">id_clasificacion</th>
                                                            <th>Clasificación De Alimento</th>
                                                            <th style="display:none">Estado</th>
                                                            <th>Estado</th>
                                                            <th>Editar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($clasificacion as $value){ ?>
                                                            <tr>
                                                            <td style='display:none'><?php echo $value->id_clasificacion;?></td>
                                                            <td><?php echo $value->clasificacion;?></td>
                                                            <td style="display:none"><?php echo $value->estado;?></td>
                                                            <td>
                                                            <?php if($value->estado == 0) {?>
                                                                Activo
                                                            <?php }else{?>
                                                               Inactivo
                                                            <?php } ?>
                                                            </td>
                                                            <td><button name='btnEditarClasificacionM' id='$value->id_clasificacion' type='button' onclick='Cargarclasificacion(this)' class='btn btn-primary btn-lg'>
                                                                Editar
                                                            </button></td>                                                                                                
                                                        </tr>
                                                        <?php } ?>                                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Tabla Momento-->


                                        <!-- Inicio Tabla Alimentos -->
                                        <div class="tab-pane" id="tabsleft-tab24">   
                                            <div class="control-group ">
                                                <input type="text" style="display:none" id ="txtIdAlimentosM">
                                                <button class="btn btn-success align: right" data-toggle="modal" data-target="#ModalAlimentos" type="submit" onclick="EsconderEstadoAlimentos()">Crear Alimento</button>
                                                <a href="#tabsleft-tab23" data-toggle="tab"><span class="strong">Anterior</span> <span class="muted" ></span></a>
                                            </div>
                                                <br />
                                                <br />
                                                    <div class="widget blue span18">
                                                        <div class="widget-title">
                                                            <h4>Alimentos Registrados</h4>                            
                                                        </div>
                                                        <div class="widget-body span12">
                                                            <table name="DataTable" class="table" id="TablaAlimentosM" class="span12">
                                                                <thead>
                                                                <tr>
                                                                    <th style="display:none">id_Rangos</th>
                                                                    <th style="display:none">id_clasificacion</th>
                                                                    <th style="display:none">id_unidad_medida</th>
                                                                    <th>Clasificaión</th>
                                                                    <th>Unidad de Medida</th>
                                                                    <th>Alimento</th>
                                                                    <th>Peso</th>
                                                                    <th>CH2</th>
                                                                    <th>Proteinas</th>
                                                                    <th>Grasas</th>
                                                                    <th>Índice Glucémico<th>
                                                                    <th style="display:none">Estado<th>
                                                                    <th>Estado<th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($alimentos as $value){ ?>
                                                                    <tr>
                                                                        <td style='display:none'><?php echo $value->id_alimento; ?></td>
                                                                        <td style='display:none'><?php echo $value->id_clasificacion; ?></td>
                                                                        <td style='display:none'><?php echo $value->id_unidad_medida; ?></td>
                                                                        <td><?php echo $value->Clasificacion; ?></td>
                                                                        <td><?php echo $value->unidadMedida; ?></td>
                                                                        <td><?php echo $value->Alimento; ?></td>
                                                                        <td><?php echo $value->peso; ?></td>
                                                                        <td><?php echo $value->carbohidratos; ?></td>
                                                                        <td><?php echo $value->proteinas; ?></td>
                                                                        <td><?php echo $value->grasas; ?></td>
                                                                        <td><?php echo $value->indice_Glucemico; ?></td>
                                                                        <td style="display:none"><?php echo $value->estado; ?></td>
                                                                        <td>
                                                                        <?php if($value->estado == 0) {?>
                                                                            Activo
                                                                        <?php }else{?>
                                                                           Inactivo
                                                                        <?php } ?>
                                                                        </td>
                                                                        <td><button name='btnEditarAlimentosM' id='$value->id_alimento' type='button' onclick='CargarAlimentosEditar(this)' data-toggle='modal' data-target='#ModalAlimentos' class='btn btn-primary btn-lg'>Editar</button></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                        </div>
                                        <!-- Fin Tabla Rangos -->

                                        <div class="modal fade" id="ModalAlimentos" style="display:none">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Registrar Nuevo Alimento</h4>
                                                    </div>
                                                    <div class="modal-body"><!--ContenidoModal-->
                                                        <div class="control-group">
                                                            <label class="control-label span4">Clasificación</label>
                                                            <div class="controls">
                                                                <select name="SelectClasAlimenAM" id="SelectClasAlimenAM" class="span6">
                                                                    <option id="selectTipoRango">Seleccionar</option>
                                                                    <?php foreach ($clasificacion as $value) { ?>
                                                                    <option value="<?php echo $value->id_clasificacion; ?>"><?php echo $value->clasificacion; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Unidad De Medida</label>
                                                            <div class="controls">
                                                                <select name="SelectUnidadMedidaAM" id="SelectUnidadMedidaAM" class="span6">
                                                                    <option id="selectTipoRango">Seleccionar</option>
                                                                    <?php foreach ($unidadMedida as $value) { ?>
                                                                    <option value="<?php echo $value->id_unidad_medida; ?>"><?php echo $value->UniMedi; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Nombre Alimento</label>
                                                            <input type="text" class="span4" id="txtNombreAlimentosAM" onkeypress="return validarLetras(event)" onpaste="return false;">
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Peso</label>
                                                            <input type="text" class="span4" id="txtPesoAM"  onpaste="return false;">
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Carbohidratos</label>
                                                            <input type="text" class="span4" id="txtCarbohidratosAM"  onpaste="return false;">
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Proteinas</label>
                                                            <input type="text" class="span4" id="txtProteinasAM"  onpaste="return false;">
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Grasas</label>
                                                            <input type="text" class="span4" id="txtGrasasAM"  onpaste="return false;">
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">Índice Glucémico</label>
                                                            <input type="text" class="span4" id="txtIndiceGlucemicoAM"  onpaste="return false;">
                                                        </div>
                                                        <div class="control-group"  style="display:none" id="EstadoAlimentos">
                                                            <label class="control-label span4">Estado</label>
                                                            <div class="control-group">
                                                                <select name="SelectEstadoAlimentos" id="SelectEstadoAlimentos">
                                                                    <option value="0">Activo</option>
                                                                    <option value="1">Inactivo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><!--end ContenidoModal-->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success align: right" type="submit" id="btnGuardarAlimentos">Guardar</button>
                                                        <button class="btn btn-success align: center" type="submit" id="btnUdpAlimentos" style="display:none">Actualizar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
            
                                        
                                        
                


    

                                    </div>
                                    
                                <!-- Divs independientes a las tablas-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quiza Falte un Div Aqui-->

