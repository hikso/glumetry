$(document).ready(function() {


      $( "#fecha" ).datepicker({
        startDate: '-3y',
        dateFormat: 'yy/mm/dd',
        maxDate: '0'                        
      });

     $('#fecha').on('change', function(ev){
      document.getElementById('btnGuardarGlucometria').disabled = false;
      validMomentos = [];
      limpiarGLucometria();
      consultarGlucometria();
    });

    ConsultarDosificacion();

    $( ".depart" ).change(function() {
        var idDepartamento = $( ".depart" ).val();
        $("#municipios").prop('disabled', false);
        $.ajax({
            type: "POST",
            url: url + "/Usuarios/cargarDepartamentos",
            data: { "idDepartamento": idDepartamento }
        }).done(function(result){
            $("#municipios").empty();
            $("#municipios").append(result);
        }).fail(function(){

        }).always(function(){

        });
    });
        //Login con AJAX
        if ($('#login').length !== 0) {

            $('#login').on('click', function(){
                var correo, password;
                correo = $('#txtCorreo').val();
                password = $('#txtPassword').val();

                $.ajax({
                    type: "POST",
                    url: url + "/login/validar",
                    data: { "txtCorreo": correo, "txtPassword": password }
                }).done(function(result){
                    document.getElementById("error").innerHTML="";
                    console.log(result.split(","));

                    $("#error").append(result);

                }).fail(function(){

                }).always(function(){

                });

            });
        }
        function calcular_edad(fecha) {
            var fechaActual = new Date()
            var diaActual = fechaActual.getDate();
            var mmActual = fechaActual.getMonth() + 1;
            var yyyyActual = fechaActual.getFullYear();
            FechaNac = fecha.split("/");
            var diaCumple = FechaNac[0];
            var mmCumple = FechaNac[1];
            var yyyyCumple = FechaNac[2];
        //retiramos el primer cero de la izquierda
        if (mmCumple.substr(0,1) == 0) {
            mmCumple= mmCumple.substring(1, 2);
        }
        //retiramos el primer cero de la izquierda
        if (diaCumple.substr(0, 1) == 0) {
            diaCumple = diaCumple.substring(1, 2);
        }
        var edad = yyyyActual - yyyyCumple;

        //validamos si el mes de cumpleaños es menor al actual
        //o si el mes de cumpleaños es igual al actual
        //y el dia actual es menor al del nacimiento
        //De ser asi, se resta un año
        if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
            edad--;
        }
        return edad;
    };

    $("#dpFechaNacimiento").on("change", function(){
        $("#txtEdad").val(calcular_edad($(this).val()));
    });  
    
        if ($('#guardarUsuario').length !== 0) {

            $('#guardarUsuario').on('click', function(){
                if ($("#txtDocumento").val()>1) {
                if (validarCorreo()) {
                varcamposVacios = camposVacios(requeridos);
                if (escorrecta && ContraConfirmada) {
                    if (varcamposVacios[0] == undefined) {
                     if (tipoUsuario == 1) {
                        //Registrar paciente en el sistema
                        var contra,celular, fecha, correo_electronico, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, ocupacion, tipoDocumento, documento, municipio, estado_civil, genero, escolaridad;

                        contra =  $("#txtContra").val();
                        correo_electronico =  $("#txtCorreo").val();
                        primer_nombre =  $("#txtPrimerNombre").val().toUpperCase();
                        segundo_nombre =  $("#txtSegundoNombre").val().toUpperCase();
                        primer_apellido =  $("#txtPrimerApellido").val().toUpperCase();
                        segundo_apellido =  $("#txtSegundoApellido").val().toUpperCase();
                        telefono = $("#txtExt").val() +"/"+ $("#txtTelefono").val();
                        ocupacion =  $("#txtOcupacion").val().toUpperCase();
                        tipoDocumento =  $("#slctTipo_Documento").val();
                        documento =  $("#txtDocumento").val();
                        municipio =  $("#municipios").val();
                        estado_civil =  $("#slctEstado_Civil").val();
                        genero =  $("#slctGenero").val();
                        celular = $("#txtCelular").val();
                        escolaridad =  $("#slctEscolaridad").val();
                        fecha = $("#dpFechaNacimiento").val();
                        $.ajax({
                            type: "POST",
                            url: url + "/Usuarios/guardarPaciente",
                            data: { "txtCorreo": correo_electronico, "fecha":fecha,"celular": celular,"txtPassword": contra, "primerNombre": primer_nombre, "segundoNombre": segundo_nombre, "primerApellido": primer_apellido, "genero": genero, "segundoApellido": segundo_apellido, "telefono": telefono, "ocupacion": ocupacion, "tipoDocumento": tipoDocumento, "documento": documento, "idMunicipio": municipio, "estadoCivil": estado_civil, "escolaridad": escolaridad }
                        }).done(function(result){

                            if (result == 1) 
                            {
                                $("#txtDocumento").focus();
                                $("html, body").animate({scrollTop:"0px"});
                                $("#txtDocumento").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El documento debe ser único para cada usuario.</div>");
                                
                            }else if (result == 2)
                            {
                                $("#txtCorreo").focus();
                                $("#txtCorreo").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("html, body").animate({scrollTop:"0px"});
                                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El correo debe ser único para cada usuario.</div>");
                                
                            }else if (result == 3) 
                            {
                                $("#txtCorreo").focus();
                                $("html, body").animate({scrollTop:"0px"});
                                $("#txtDocumento").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("#txtCorreo").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El correo y el documento deben ser únicos para cada usuario.</div>");
                                
                            }else if (result == 4)
                            {
                                $("html, body").animate({scrollTop:"0px"});
                                $("#msg").html("<div  class='alert alert-success'><button class='close' data-dismiss='alert'>×</button><strong>Registro exitoso!</strong> El usuario se ha creado exitosamente.</div>");
                                $("input:not(:radio)").val("");
                                $("select").val("");
                                $("#txtContra").focus();
                            }else
                            {
                                $("html, body").animate({scrollTop:"0px"});
                                $("#msg").html("<div  class='alert alert-error'><button class='close' data-dismiss='alert'>×</button><strong>Upps!</strong> Algo resulto realmente mal.</div>");
                                
                            };
                        }).fail(function(){

                        }).always(function(){

                        });
                    }else{
                        //Registrar medico en el sistema
                        var contra, correo_electronico, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, centro_trabajo, tipoDocumento, documento,  genero,  celular, especializacion;

                        contra =  $("#txtContra").val();
                        correo_electronico =  $("#txtCorreo").val();
                        primer_nombre =  $("#txtPrimerNombre").val().toUpperCase();
                        segundo_nombre =  $("#txtSegundoNombre").val().toUpperCase();
                        primer_apellido =  $("#txtPrimerApellido").val().toUpperCase();
                        segundo_apellido =  $("#txtSegundoApellido").val().toUpperCase();
                        telefono = $("#txtExt").val() +"/"+ $("#txtTelefono").val();
                        tipoDocumento =  $("#slctTipo_Documento").val();
                        documento =  $("#txtDocumento").val();
                        genero =  $("#slctGenero").val();
                        centro_trabajo = $("#txtCentroDeTrabajo").val().toUpperCase();
                        celular = $("#txtCelular").val();
                        especializacion = $("#slctEspecializacion").val();
                        $.ajax({
                            type: "POST",
                            url: url + "/Usuarios/guardarMedico",
                            data: { "txtCorreo": correo_electronico, "txtPassword": contra, "primerNombre": primer_nombre, "segundoNombre": segundo_nombre, "primerApellido": primer_apellido, "genero": genero, "segundoApellido": segundo_apellido, "telefono": telefono, "centro_trabajo": centro_trabajo, "celular":celular, "tipoDocumento": tipoDocumento, "documento": documento, "especializacion": especializacion}
                        }).done(function(result){

                            if (result == 1) 
                            {
                                $("#txtDocumento").focus();
                                $("html, body").animate({scrollTop:"0px"});
                                $("#txtDocumento").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El documento debe ser único para cada usuario.</div>");
                                
                            }else if (result == 2)
                            {
                                $("#txtCorreo").focus();
                                $("#txtCorreo").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("html, body").animate({scrollTop:"0px"});
                                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El correo debe ser único para cada usuario.</div>");
                                
                            }else if (result == 3) 
                            {
                                $("#txtCorreo").focus();
                                $("html, body").animate({scrollTop:"0px"});
                                $("#txtDocumento").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("#txtCorreo").parent("div").parent(".control-group").attr('class', 'control-group error');
                                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El correo y el documento deben ser únicos para cada usuario.</div>");
                                
                            }else if (result == 4)
                            {
                                $("html, body").animate({scrollTop:"0px"});
                                $("#msg").html("<div  class='alert alert-success'><button class='close' data-dismiss='alert'>×</button><strong>Registro exitoso!</strong> El usuario se ha creado exitosamente.</div>");
                                $("input:not(:radio)").val("");
                                $("select").val("");
                                $("#txtContra").focus();
                            }else
                            {
                                $("html, body").animate({scrollTop:"0px"});
                                $("#msg").html("<div  class='alert alert-error'><button class='close' data-dismiss='alert'>×</button><strong>Upps!</strong> Algo resulto realmente mal.</div>");
                                
                            };

                        }).fail(function(){

                        }).always(function(){

                        });
                    };

                }else{
                    //aui
                    for (var i = varcamposVacios.length - 1; i >= 0; i--) {

                        $( "#"+varcamposVacios[i]).parent("div").parent(".control-group").attr('class', 'control-group error');

                    };
                    $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Algunos campos son requeridos.</div>");
                    $("html, body").animate({scrollTop:"0px"});
                    $( "#"+varcamposVacios[varcamposVacios.length - 1]).focus();
                };
            }else if(!escorrecta){
                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> La contraseña es requerida.</div>");
                $("html, body").animate({scrollTop:"0px"});
                $("#txtContra").focus();
            }else
            {
                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> La contraseña debe coincidir.</div>");
                $("html, body").animate({scrollTop:"0px"});
                $("#txtConfirmarContra").focus();

            };
        }else{
         $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El formato del  correo es incorrecto.</div>");
         $("html, body").animate({scrollTop:"0px"});
         $("#txtCorreo").parent("div").parent(".control-group").attr('class', 'control-group error');
         $("#txtCorreo").focus();
    };
}else{
         $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El formato del documento es incorrecto.</div>");
         $("html, body").animate({scrollTop:"0px"});
         $("#txtDocumento").parent("div").parent(".control-group").attr('class', 'control-group error');
         $("#txtDocumento").focus();
};
        });

}
var escorrecta = false;
    //Mostrar nivel de seguridad de la contraseña
    $( "#txtContra" ).on('input', function() {
        nivel_seguridad = seguridad_clave($("#txtContra").val());
        if (nivel_seguridad <= 0 && nivel_seguridad<=30) {
            $("#validarContraseña").attr('class', 'control-group error');
            $("#spnContraseña").html("Contraseña muy insegura");
            escorrecta = false;
        }else if(nivel_seguridad <= 60 && nivel_seguridad <= 90) {
            $("#validarContraseña").attr('class', 'control-group warning');
            $("#spnContraseña").html("Contraseña débil");
            escorrecta = true;
        }else{
            $("#validarContraseña").attr('class', 'control-group success');
            $("#spnContraseña").html("Contraseña muy segura");
            escorrecta = true;
        };
    });
    //Recoger elementos por el atributo required

    var requeridos = getAllElementsWithAttribute("required");

    //limpiar error de validacion
    $("select").change(function(){
        $( $(this) ).parent("div").parent(".control-group").attr('class', 'control-group');
    });
    $("input").change(function() {
        $( $(this) ).parent("div").parent(".control-group").attr('class', 'control-group');
    });

    var ContraConfirmada = false;
    //validar que la contraseña confirmada sea igual
    $( "#txtConfirmarContra" ).focusout(function() {
     password = $( "#txtConfirmarContra" ).val();
     confirmPassword =  $( "#txtContra" ).val();
     if (password === confirmPassword) {
        $("#confirmarContraseña").attr('class', 'control-group success');
        $("#spnConfirm").html("La contraseña es correcta");
        ContraConfirmada = true;
    }else{
        $("#confirmarContraseña").attr('class', 'control-group error');
        $("#spnConfirm").html("Las contraseñas no coinciden");
        ContraConfirmada = false;
    };
});
        if ($('#seleccionarAlimento').length !== 0) {

          $('#seleccionarAlimento').on('click', function(){

            var idAlimento = $('#box1View option:selected').val();

            $.ajax({
              type: "POST",
              url: url + "/base_alimentaria/AlimentacionBasePaciente",
              data: {"idAlimento": idAlimento}
            }).done(function(result){
              document.getElementById('box1View').innerHTML = result;
            }).fail(function(){

            }).always(function(){

            });
            seleccionarAlimento();
          });
        };

    var plato = [];
    var index = 0;
    var totalCarbohidratos = 0;
    if ($('#btnAgregarAlimento').length !== 0) {

        $('#btnAgregarAlimento').on('click', function(){
            if (document.getElementById('ValidInteger').value != "") {
                if (id_Alimentos != null) {
                    var existe = false;

                    for (var i = plato.length - 1; i >= 0; i--) {
                        if(plato[i] == id_Alimentos)
                        {
                            existe = true;
                        }
                    };

                    if (!existe) {

                        var table = document.getElementById('tblPlato');
                        var unidadesAlimento = ($("#ValidInteger").val());
                        var rowCount = table.rows.length;
                        var row = table.insertRow(rowCount);
                        var cell0 = row.insertCell(0);
                        var cell1 = row.insertCell(1);
                        var cell2 = row.insertCell(2);
                        var cell3 = row.insertCell(3);
                        var cell4 = row.insertCell(4);

                        cell0.innerHTML = nombreAlimento;
                        cell1.innerHTML = unidadesAlimento;
                        cell2.innerHTML = carbohidratos;
                        cell3.innerHTML = indiceGlucemico;
                        cell4.innerHTML = "<button class='btn btn-primary'><i class='icon-pencil'></i></button> "+
                        "<button class='btn btn-danger'><i class='icon-trash '></i></button>";
                        
                        totalCarbohidratos = parseFloat(totalCarbohidratos) + parseFloat(carbohidratos);
                        document.getElementById('lbltotalCarbohidratos').innerHTML = totalCarbohidratos;
                        


                        index ++;
                    }else{
                        console.log('Este alimento ya fué agregado');
                    };
                }else
                {
                    console.log('No se ha seleccionado ningún alimento');
                };
            };

        });
};

});
function validarAlimentos () {
    var ret = undefined;
    for (var i = base_alimentaria.length - 1; i >= 0; i--) {
        if (base_alimentaria[i].alimentos[0] == undefined)
        {
            ret = i;
            break;
        }
    };
    return ret;
}
var validMomentos = false;
var validaeAlimentos;
var registroExitoso = true;
if ($('#btnGuardar').length !== 0) {

    $('#btnGuardar').on('click', function(){
        validaeAlimentos = validarAlimentos();
        if (registroExitoso) {
            if (validarBaseAlimentaria())
            {
                if (validaeAlimentos == undefined) {
                $.ajax({
                    type: "POST",
                    url: url + "/Base_alimentaria/GuardarBaseAlimentaria",
                    data: {"carbohidratosPorMomentos": carbohidratosPorMomentos, "base_alimentaria": base_alimentaria, "id_RecomendacionSeleccionada":id_RecomendacionSeleccionada}
                }).done(function(result){

                    $("#msg").html("<div  class='alert alert-success'><button class='close' data-dismiss='alert'>×</button><strong>Éxito!</strong> "+result+".</div>");
                    $("html, body").animate({scrollTop:"0px"});
                    LimpiarBaseAlimentaria();
                    registroExitoso = false;
                }).fail(function(){

                }).always(function(){

                });
                }else
                    {
                        $('[name="momentosButtons"]').find('#'+ base_alimentaria[validaeAlimentos].id_momento).pulsate();
                        $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong>Debe añadir almenos un alimento a cada momento.</div>");
                        setInterval(function () {$('[name="momentosButtons"]').find('#'+ base_alimentaria[validaeAlimentos].id_momento).pulsate("destroy");}, 3000);
                        $("html, body").animate({scrollTop:"0px"});

                    }
            };
        }else
        {
                $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Una base alimentaria ya ha sido registrada.</div>");
                $("html, body").animate({scrollTop:"0px"});
        };

    });
};
function validarCorreo () {
    //Utilizamos una expresion regular
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
 
    //Se utiliza la funcion test() nativa de JavaScript
    if (regex.test($('#txtCorreo').val().trim())) {
        return true;
    }
    else {
        return false;
    }
}
function validcamposCHO(cho)
{
    var campos = [];
    for (var i = cho.length - 1; i >= 0; i--) {

        valor = cho[i].value;
        if( valor == ""){
            campos.push(cho[i].id);
        };
    };
    return campos;
}
function validarBaseAlimentaria()
{
    var iscorrecta = false;
    var cho = getAllElementsWithAttribute("required");
    varchovacios = validcamposCHO(cho);
    if (varchovacios[0] == undefined) {

        var momentos = $('[name="momentosButtons"]').children();
        if (base_alimentaria[0] != undefined) {
         for (var j = momentos.length - 1; j >= 0; j--) {

             for (var i = base_alimentaria.length - 1; i >= 0; i--) {
              if (base_alimentaria[i].id_momento == momentos[j].id) 
              {
                validMomentos = true;
                break;
            }else
            {
                validMomentos = false;
            }; 
        };
        if (!validMomentos) {
            $(momentos[j]).pulsate();
            setInterval(function () {$(momentos[j]).pulsate("destroy");}, 3000);
            $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Algunos alimentos no se han recomendado.</div>");
            $("html, body").animate({scrollTop:"0px"});

            break;
        };
    };
}else
{
    $(momentos).pulsate();
    setInterval(function () {$(momentos).pulsate("destroy");}, 3000);

    $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Aún no se han recomendado alimentos.</div>");
    $("html, body").animate({scrollTop:"0px"});
    iscorrecta = false;

}
 if(id_RecomendacionSeleccionada == 0) 
{
    $("#tblRecomendaciones").pulsate();
    setInterval(function () {$("#tblRecomendaciones").pulsate("destroy");}, 3000);

    $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Aún no selecciono una recomendación.</div>");
    $("html, body").animate({scrollTop:"0px"});
    iscorrecta = false;


}else if (validMomentos)
{
    iscorrecta = true;
}else
{
    iscorrecta = false;    
}
}else
{
    for (var i = varchovacios.length - 1; i >= 0; i--) {

        $( "#"+varchovacios[i]).parent("div").parent(".control-group").attr('class', 'control-group error');

    };

    $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Algunos campos están vacios.</div>");

    $("html, body").animate({scrollTop:"0px"});
    $( "#"+varchovacios[varchovacios.length - 1][0]).focus();
};
return iscorrecta;
};

function validateFloatKeyPress(el, evt, ints, decimals) {

    // Valores numéricos
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (el.value[0] == undefined && charCode == 46) {
        return false
    }
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57)) {
        return false;
    }
    // Sólo un punto
    if (charCode == 46) {
        if (el.value.indexOf(".") !== -1) {
            return false;
        }

        return true;
    }


    
    return true;
}

var openclose = false;
$(".icon-folder-close").parent("a").click(function(){
    if (openclose) {
        $(".icon-folder-open").attr("class","icon-folder-close");
        openclose = false;
    }else
    {
        $(".icon-folder-close").attr("class","icon-folder-open");
        openclose = true;
    };
});

//Validaciones de contraseña
var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

function tiene_mayusculas(texto){
 for(i=0; i<texto.length; i++){
  if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
   return 1;
}
}
return 0;
}
var letras="abcdefghyjklmnñopqrstuvwxyz";

function tiene_minusculas(texto){
 for(i=0; i<texto.length; i++){
  if (letras.indexOf(texto.charAt(i),0)!=-1){
   return 1;
}
}
return 0;
}
function tiene_letras(texto){
 texto = texto.toLowerCase();
 for(i=0; i<texto.length; i++){
  if (letras.indexOf(texto.charAt(i),0)!=-1){
   return 1;
}
}
return 0;
}
var numeros="0123456789";

function tiene_numeros(texto){
 for(i=0; i<texto.length; i++){
  if (numeros.indexOf(texto.charAt(i),0)!=-1){
   return 1;
}
}
return 0;
}
    //Regoger elementos dependiendo el atributo
    function getAllElementsWithAttribute(attribute)
    {
      var matchingElements = [];
      var allElements = document.getElementsByTagName('*');
      for (var i = 0, n = allElements.length; i < n; i++)
      {
        if (allElements[i].getAttribute(attribute) !== null)
        {
          // Element exists with attribute. Add to array.
          matchingElements.push(allElements[i]);
      }
  }
  return matchingElements;
}
function seguridad_clave(clave){
 var seguridad = 0;
 if (clave.length!=0){
  if (tiene_numeros(clave) && tiene_letras(clave)){
   seguridad += 30;
}
if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
   seguridad += 30;
}
if (clave.length >= 4 && clave.length <= 5){
   seguridad += 10;
}else{
   if (clave.length >= 6 && clave.length <= 8){
    seguridad += 30;
}else{
    if (clave.length > 8){
     seguridad += 40;
 }
}
}
}
return seguridad            
}
function camposVacios(elementos)
{
    vacios = [];
    if (tipoUsuario == 1) {
        for (var i = elementos.length - 1; i >= 0; i--) {
            if ($( "#"+elementos[i].id).parent("div").parent(".control-group").attr('name') != "inputMedico") {
                valor = elementos[i].value;
                if( valor == ""){
                    vacios.push(elementos[i].id);
                };
            };
        };
    }else
    {
        for (var i = elementos.length - 1; i >= 0; i--) {
            if ($( "#"+elementos[i].id).parent("div").parent(".control-group").attr('name') != "inputPaciente") {
                valor = elementos[i].value;
                if( valor == ""){
                    vacios.push(elementos[i].id);
                };
            };
        };
    };
    return vacios;
}

$('input[type^=email]').keypress(function(e) {
  var code = e.keyCode || e.which;
  var value = $(this).val();
    if (code == 64) {
        if (value.indexOf("@") !== -1) {
            return false;
        }

        return true;
    }
});  
$.fn.selectRange = function(start, end) {
    if(!end) end = start;
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};
$("#txtExt").on('click', function(){
    $("#txtExt").selectRange(0);    
});


$("#txtTelefono").on('click', function(){
    $("#txtTelefono").selectRange(0);    
});
$("#txtCelular").on('click', function(){
    $("#txtCelular").selectRange(0);    
});

$(".texto").keypress(function(e) {

  var code = e.keyCode || e.which;
  var value = $(this).val();
    if (
                    (code < 97 || code > 122)//letras mayusculas
                && (code < 65 || code > 90) //letras minusculas
                && (code != 45) //retroceso
                && (code != 241) //ñ
                 && (code != 209) //Ñ
                 && (code != 225) //á
                 && (code != 233) //é
                 && (code != 237) //í
                 && (code != 243) //ó
                 && (code != 250) //ú
                 && (code != 193) //Á
                 && (code != 201) //É
                 && (code != 205) //Í
                 && (code != 211) //Ó
                 && (code != 218) //Ú
        ) 
    {
        return false;
    }
    if (value.length >= 45) 
        {
            return false;
        };
});

$("#txtDocumento").keypress(function (e){
    // Valores numéricos
    var charCode = (e.which) ? e.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        return false;
    }
    if ($(this).val().length > 10) { return false; };
});



$('input').on('paste', function (e) {
    var pastedData = e.originalEvent.clipboardData.getData('text');
    return false;

});
$(".textoynumeros").keypress(function (e){

    var regex = new RegExp("^[a-zA-Z0-9]+$"); 
    var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (key == " ") { return true}else{
        if (!regex.test(key)) { event.preventDefault(); return false; }
    };
});

$("input").keypress(function (e){
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }
});
//Cambio de estado para usuario
function cambioEstado (btn) {
    var id_usuario = btn.id;

    $.ajax({
        type: "POST",
        url: url + "/Usuarios/ActualizarEstado",
        data: { "id_usuario": id_usuario }
    }).done(function(result){
        var dataResult = jQuery.parseJSON(result);
        var jsonData = dataResult.users;
        var numCuentas = dataResult.numCuentas; 
         DataTableUsuarios.fnDestroy();
         DataTableUsuarios.children("tbody").html("");
         DataTableUsuarios.dataTable({
        "oLanguage": {
          "sZeroRecords": "No se encontraron concidencias",
          "sSearch": "Filtro de busqueda: ",
          "sLengthMenu": 'Mostrar <select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="15">15</option>'+
          '<option value="20">20</option>'+
          '<option value="25">25</option>'+
          '<option value="-1">Todos</option>'+
          '</select> usuarios',
          "sInfoEmpty": "Sin entradas para mostrar",
          "sInfoFiltered": " - Filtro de _MAX_ pacientes",
          "sInfo": "Mostrando _END_ de _TOTAL_",
          "sEmptyTable": "Información no disponible",
          "oPaginate": {
           "sPrevious": "Anterior",
           "sNext": "Siguiente",
           "sLast": "Última",
           "sFirst": "Primera",
           "pagingType": "full_numbers"
         }
       }
     });
     var status;     
     var statusString; 
     var enablar;
     var tipoUsuario;
         for (var i = jsonData.length - 1; i >= 0; i--) {
            status = (jsonData[i].estado == 1) ? '-info' : ''; 
            statusString = (jsonData[i].estado == 1) ? 'Activo' : 'Inactivo';
            tipoUsuario = (jsonData[i].tipoUsuario == 1) ? 'Paciente' : "Médico";
            
            telefono = (jsonData[i].telefono == '' || jsonData[i].telefono == '/') ? " / " : jsonData[i].telefono;
            for (var j = numCuentas.length - 1; j >= 0; j--) {
                if (numCuentas[j].id_usuario == jsonData[i].id_usuario) {
                    if (numCuentas[j].numCuentas != 2) {
                        tipoUser = (jsonData[i].tipoUsuario == 2) ? 'Paciente' : "Médico";
                        enablar = "";
                    }else{
                        tipoUser ="-";
                        enablar ="disabled='disabled'";
                    };
                };
            };
            DataTableUsuarios.fnAddData([
                 "<td class=''>"+jsonData[i].primer_nombre+" "+ jsonData[i].segundo_nombre+"</td>"
                ,"<td class=''>"+jsonData[i].primer_apellido+" "+ jsonData[i].segundo_apellido+"</td>"
                ,"<td class=''>"+jsonData[i].documento+"</td>"
                ,"<td class=''>"+tipoUsuario+"</td>"
                ,"<td class=''>"+jsonData[i].correo_electronico+"</td>"
                ,"<td><a id='"+jsonData[i].id_usuario+"' value='"+jsonData[i].estado+"' onclick='cambioEstado(this)' href='javascript:;'><span class='label label" +status+ "'>"+statusString+"</span></a></td>"
                ,"<td class=''><button "+enablar+" onclick='cargarModalAgregarCuenta(this,"+jsonData[i].id_usuario+","+jsonData[i].id_tipo_documento+", "+jsonData[i].id_genero+", \""+telefono+"\")' data-toggle='modal' href='#myModal3' value='"+jsonData[i].tipoUsuario+"' class='btn btn-primary'>"+tipoUser+"</button></td>"
                ]);
            DataTableUsuarios.fnDraw();
         };
            var nodoTd = btn.parentNode;
            var nodoTr = nodoTd.parentNode;
            var nodosEnTr = nodoTr.getElementsByTagName('td');

            var Nombres = nodosEnTr[0].textContent;
            var Apellidos = nodosEnTr[1].textContent;
            var Documento = nodosEnTr[2].textContent;            
            var estatus = $("#"+id_usuario).attr("value");
            var Estado = (estatus == 1) ? 'Activo' : 'Inactivo'; 

            $("html, body").animate({scrollTop:"0px"});
            $("#msg").html("<div  class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><strong>Información!</strong> El estado del usuario: <strong>"+ Nombres +" "+ Apellidos +"</strong> con documento <strong>"+Documento+"</strong> cambio a: "+Estado+"</div>");
            
    }).fail(function(){

    }).always(function(){

    });
}


function cargarModalAgregarCuenta(btnModal,id_usuario, tipoDocumento, id_genero, telefono) {
    $("#msgModal").html("<div  class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><strong>Información!</strong> Diligenciar los campos faltantes.</div>");
    $('#agregarCuentaUsuario').val(btnModal.value);                  
    $('#agregarCuentaUsuario').attr("name", id_usuario);                  
    var nodoTd = btnModal.parentNode;
    var nodoTr = nodoTd.parentNode;
    var nodosEnTr = nodoTr.getElementsByTagName('td');

    var Nombres = nodosEnTr[0].textContent;
    var Apellidos = nodosEnTr[1].textContent;
    var Documento = nodosEnTr[2].textContent;
    Nombres = Nombres.split(" ");
    Apellidos = Apellidos.split(" ");
    var primer_nombre = Nombres[0];
    var segundo_nombre = Nombres[1];
    var primer_apellido = Apellidos[0];
    var segundo_apellido = Apellidos[1];
    $("#txtPrimerNombre").val(primer_nombre);
    $("#txtSegundoNombre").val(segundo_nombre);

    $("#txtPrimerApellido").val(primer_apellido);
    $("#txtSegundoApellido").val(segundo_apellido);

    $("#slctTipo_Documento").val(tipoDocumento);
    $("#txtDocumento").val(Documento);

    $("#slctGenero").val(id_genero);

    $("#txtExt").prop('disabled', false);
    $("#txtTelefono").prop('disabled', false);
    $("#txtExt").val("");
    $("#txtTelefono").val("");

    telefono = telefono.split("/");
    if (telefono[1] != undefined) {
        if (telefono[0] != " " && telefono[1] != " ")  {
            $("#txtExt").val(telefono[0]);
            $("#txtExt").prop('disabled', true);
            $("#txtTelefono").val(telefono[1]);
            $("#txtTelefono").prop('disabled', true);
        }else if(telefono[0] != " ")
        {
            $("#txtExt").val(telefono[0]);
            $("#txtExt").prop('disabled', true);

        }else if (telefono[1] != " ")
        {
            $("#txtTelefono").val(telefono[1]);
            $("#txtTelefono").prop('disabled', true);
        };
    }else{
        $("#txtTelefono").val(telefono);
        $("#txtTelefono").prop('disabled', true);
    };

    if (btnModal.value == 2) {
        var inputMedico = document.getElementsByName("inputMedico");
        for (var i = 0; i < inputMedico.length; i++) {
            inputMedico[i].style.display = "none";
        };

        var inputPaciente = document.getElementsByName("inputPaciente");
        for (var i = 0; i < inputPaciente.length; i++) {
            inputPaciente[i].style.display = "block";
        };

        $("#ModalTitulo").html("Agregar cuenta: Paciente");
    }else{
        var inputMedico = document.getElementsByName("inputMedico");
        for (var i = 0; i < inputMedico.length; i++) {
            inputMedico[i].style.display = "block";
        };

        var inputPaciente = document.getElementsByName("inputPaciente");
        for (var i = 0; i < inputPaciente.length; i++) {
            inputPaciente[i].style.display = "none";
        };
        $("#ModalTitulo").html("Agregar cuenta: Médico");
    };
}

 if ($('#agregarCuentaUsuario').length !== 0) {

            $('#agregarCuentaUsuario').on('click', function(){
                tipoUsuario = $("#agregarCuentaUsuario").val();
                var requeridos = getAllElementsWithAttribute("required");
                varcamposVacios = camposVaciosAgregar(requeridos);
                    if (varcamposVacios[0] == undefined) {
                     if (tipoUsuario == 2) {
                        //Agregar cuenta de paciente en el sistema
                        var primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, ocupacion, tipoDocumento, documento, municipio, estado_civil, genero, escolaridad;

                        primer_nombre =  $("#txtPrimerNombre").val().toUpperCase();
                        segundo_nombre =  $("#txtSegundoNombre").val().toUpperCase();
                        primer_apellido =  $("#txtPrimerApellido").val().toUpperCase();
                        segundo_apellido =  $("#txtSegundoApellido").val().toUpperCase();
                        telefono = $("#txtExt").val() +"/"+ $("#txtTelefono").val();
                        ocupacion =  $("#txtOcupacion").val().toUpperCase();
                        tipoDocumento =  $("#slctTipo_Documento").val();
                        documento =  $("#txtDocumento").val();
                        municipio =  $("#municipios").val();
                        estado_civil =  $("#slctEstado_Civil").val();
                        genero =  $("#slctGenero").val();
                        escolaridad =  $("#slctEscolaridad").val();
                        id_usuario = $('#agregarCuentaUsuario').attr("name");
                        celular = $("#txtCelular").val();
                        fecha = $("#dpFechaNacimiento").val();
                        $.ajax({
                            type: "POST",
                            url: url + "/Usuarios/AgregarCuentaPaciente",
                            data: {"celular":celular,"fecha":fecha, "id_usuario": id_usuario, "primerNombre": primer_nombre, "segundoNombre": segundo_nombre, "primerApellido": primer_apellido, "genero": genero, "segundoApellido": segundo_apellido, "telefono": telefono, "ocupacion": ocupacion, "tipoDocumento": tipoDocumento, "documento": documento, "idMunicipio": municipio, "estadoCivil": estado_civil, "escolaridad": escolaridad }
                        }).done(function(result){
                            var rst = result.split("%");
                            $('#myModal3').modal("hide");
                            $("html, body").animate({scrollTop:"0px"});
                            $("#msg").html("<div  class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><strong>Información!</strong>"+rst[0]+"</div>");
                            var dataResult = jQuery.parseJSON(rst[1]);
                            var jsonData = dataResult.users;
                            var numCuentas = dataResult.numCuentas; 
                             DataTableUsuarios.fnDestroy();
                             DataTableUsuarios.children("tbody").html("");
                             DataTableUsuarios.dataTable({
                            "oLanguage": {
                              "sZeroRecords": "No se encontraron concidencias",
                              "sSearch": "Filtro de busqueda: ",
                              "sLengthMenu": 'Mostrar <select>'+
                              '<option value="5">5</option>'+
                              '<option value="10">10</option>'+
                              '<option value="15">15</option>'+
                              '<option value="20">20</option>'+
                              '<option value="25">25</option>'+
                              '<option value="-1">Todos</option>'+
                              '</select> usuarios',
                              "sInfoEmpty": "Sin entradas para mostrar",
                              "sInfoFiltered": " - Filtro de _MAX_ pacientes",
                              "sInfo": "Mostrando _END_ de _TOTAL_",
                              "sEmptyTable": "Información no disponible",
                              "oPaginate": {
                               "sPrevious": "Anterior",
                               "sNext": "Siguiente",
                               "sLast": "Última",
                               "sFirst": "Primera",
                               "pagingType": "full_numbers"
                             }
                           }
                         });
                         var status;     
                         var statusString; 
                         var enablar;
                         var tipoUsuario;
                             for (var i = jsonData.length - 1; i >= 0; i--) {
                                status = (jsonData[i].estado == 1) ? '-info' : ''; 
                                statusString = (jsonData[i].estado == 1) ? 'Activo' : 'Inactivo';
                                tipoUsuario = (jsonData[i].tipoUsuario == 1) ? 'Paciente' : "Médico";
                                
                                telefono = (jsonData[i].telefono == '' || jsonData[i].telefono == '/') ? " / " : jsonData[i].telefono;
                                for (var j = numCuentas.length - 1; j >= 0; j--) {
                                    if (numCuentas[j].id_usuario == jsonData[i].id_usuario) {
                                        if (numCuentas[j].numCuentas != 2) {
                                            tipoUser = (jsonData[i].tipoUsuario == 2) ? 'Paciente' : "Médico";
                                            enablar = "";
                                        }else{
                                            tipoUser ="-";
                                            enablar ="disabled='disabled'";
                                        };
                                    };
                                };
                                DataTableUsuarios.fnAddData([
                                     "<td class=''>"+jsonData[i].primer_nombre+" "+ jsonData[i].segundo_nombre+"</td>"
                                    ,"<td class=''>"+jsonData[i].primer_apellido+" "+ jsonData[i].segundo_apellido+"</td>"
                                    ,"<td class=''>"+jsonData[i].documento+"</td>"
                                    ,"<td class=''>"+tipoUsuario+"</td>"
                                    ,"<td class=''>"+jsonData[i].correo_electronico+"</td>"
                                    ,"<td><a id='"+jsonData[i].id_usuario+"' value='"+jsonData[i].estado+"' onclick='cambioEstado(this)' href='javascript:;'><span class='label label" +status+ "'>"+statusString+"</span></a></td>"
                                    ,"<td class=''><button "+enablar+" onclick='cargarModalAgregarCuenta(this,"+jsonData[i].id_usuario+","+jsonData[i].id_tipo_documento+", "+jsonData[i].id_genero+", \""+telefono+"\")' data-toggle='modal' href='#myModal3' value='"+jsonData[i].tipoUsuario+"' class='btn btn-primary'>"+tipoUser+"</button></td>"
                                    ]);
                                DataTableUsuarios.fnDraw();
                             };
                        }).fail(function(){

                        }).always(function(){

                        });
                    }else{
                        //Agregar cuenta de  medico en el sistema
                        var primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, centro_trabajo, tipoDocumento, documento,  genero,  celular, especializacion;

                        primer_nombre =  $("#txtPrimerNombre").val().toUpperCase();
                        segundo_nombre =  $("#txtSegundoNombre").val().toUpperCase();
                        primer_apellido =  $("#txtPrimerApellido").val().toUpperCase();
                        segundo_apellido =  $("#txtSegundoApellido").val().toUpperCase();
                        telefono = $("#txtExt").val() +"/"+ $("#txtTelefono").val();
                        tipoDocumento =  $("#slctTipo_Documento").val();
                        documento =  $("#txtDocumento").val();
                        genero =  $("#slctGenero").val();
                        centro_trabajo = $("#txtCentroDeTrabajo").val().toUpperCase();
                        celular = $("#txtCelular").val();
                        especializacion = $("#slctEspecializacion").val();
                        id_usuario = $('#agregarCuentaUsuario').attr("name");
                        $.ajax({
                            type: "POST",
                            url: url + "/Usuarios/AgregarCuentaMedico",
                            data: { "id_usuario": id_usuario, "primerNombre": primer_nombre, "segundoNombre": segundo_nombre, "primerApellido": primer_apellido, "genero": genero, "segundoApellido": segundo_apellido, "telefono": telefono, "centro_trabajo": centro_trabajo, "celular":celular, "tipoDocumento": tipoDocumento, "documento": documento, "especializacion": especializacion}
                        }).done(function(result){
                            var rst = result.split("%");
                            $('#myModal3').modal("hide");
                            $("html, body").animate({scrollTop:"0px"});
                            $("#msg").html("<div  class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><strong>Información!</strong>"+rst[0]+"</div>");
                            var dataResult = jQuery.parseJSON(rst[1]);
                            var jsonData = dataResult.users;
                            var numCuentas = dataResult.numCuentas; 
                             DataTableUsuarios.fnDestroy();
                             DataTableUsuarios.children("tbody").html("");
                             DataTableUsuarios.dataTable({
                            "oLanguage": {
                              "sZeroRecords": "No se encontraron concidencias",
                              "sSearch": "Filtro de busqueda: ",
                              "sLengthMenu": 'Mostrar <select>'+
                              '<option value="5">5</option>'+
                              '<option value="10">10</option>'+
                              '<option value="15">15</option>'+
                              '<option value="20">20</option>'+
                              '<option value="25">25</option>'+
                              '<option value="-1">Todos</option>'+
                              '</select> usuarios',
                              "sInfoEmpty": "Sin entradas para mostrar",
                              "sInfoFiltered": " - Filtro de _MAX_ pacientes",
                              "sInfo": "Mostrando _END_ de _TOTAL_",
                              "sEmptyTable": "Información no disponible",
                              "oPaginate": {
                               "sPrevious": "Anterior",
                               "sNext": "Siguiente",
                               "sLast": "Última",
                               "sFirst": "Primera",
                               "pagingType": "full_numbers"
                             }
                           }
                         });
                         var status;     
                         var statusString; 
                         var enablar;
                         var tipoUsuario;
                             for (var i = jsonData.length - 1; i >= 0; i--) {
                                status = (jsonData[i].estado == 1) ? '-info' : ''; 
                                statusString = (jsonData[i].estado == 1) ? 'Activo' : 'Inactivo';
                                tipoUsuario = (jsonData[i].tipoUsuario == 1) ? 'Paciente' : "Médico";
                                
                                telefono = (jsonData[i].telefono == '' || jsonData[i].telefono == '/') ? " / " : jsonData[i].telefono;
                                for (var j = numCuentas.length - 1; j >= 0; j--) {
                                    if (numCuentas[j].id_usuario == jsonData[i].id_usuario) {
                                        if (numCuentas[j].numCuentas != 2) {
                                            tipoUser = (jsonData[i].tipoUsuario == 2) ? 'Paciente' : "Médico";
                                            enablar = "";
                                        }else{
                                            tipoUser ="-";
                                            enablar ="disabled='disabled'";
                                        };
                                    };
                                };
                                DataTableUsuarios.fnAddData([
                                     "<td class=''>"+jsonData[i].primer_nombre+" "+ jsonData[i].segundo_nombre+"</td>"
                                    ,"<td class=''>"+jsonData[i].primer_apellido+" "+ jsonData[i].segundo_apellido+"</td>"
                                    ,"<td class=''>"+jsonData[i].documento+"</td>"
                                    ,"<td class=''>"+tipoUsuario+"</td>"
                                    ,"<td class=''>"+jsonData[i].correo_electronico+"</td>"
                                    ,"<td><a id='"+jsonData[i].id_usuario+"' value='"+jsonData[i].estado+"' onclick='cambioEstado(this)' href='javascript:;'><span class='label label" +status+ "'>"+statusString+"</span></a></td>"
                                    ,"<td class=''><button "+enablar+" onclick='cargarModalAgregarCuenta(this,"+jsonData[i].id_usuario+","+jsonData[i].id_tipo_documento+", "+jsonData[i].id_genero+", \""+telefono+"\")' data-toggle='modal' href='#myModal3' value='"+jsonData[i].tipoUsuario+"' class='btn btn-primary'>"+tipoUser+"</button></td>"
                                    ]);
                                DataTableUsuarios.fnDraw();
                             };
                        }).fail(function(){

                        }).always(function(){

                        });
                    };

                }else{
                    //aui
                    for (var i = varcamposVacios.length - 1; i >= 0; i--) {

                        $( "#"+varcamposVacios[i]).parent("div").parent(".control-group").attr('class', 'control-group error');

                    };
                    $('#myModal3').scrollTop(0);
                    $("#msgModal").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Algunos campos son requeridos.</div>");
                    $( "#"+varcamposVacios[varcamposVacios.length - 1]).focus();
                };
        });
}

function camposVaciosAgregar(elementos)
{
    vacios = [];
    if (tipoUsuario == 2) {
        for (var i = elementos.length - 1; i >= 0; i--) {
            if ($( "#"+elementos[i].id).parent("div").parent(".control-group").attr('name') != "inputMedico") {
                valor = elementos[i].value;
                if( valor == ""){
                    vacios.push(elementos[i].id);
                };
            };
        };
    }else
    {
        for (var i = elementos.length - 1; i >= 0; i--) {
            if ($( "#"+elementos[i].id).parent("div").parent(".control-group").attr('name') != "inputPaciente") {
                valor = elementos[i].value;
                if( valor == ""){
                    vacios.push(elementos[i].id);
                };
            };
        };
    };
    return vacios;
}

//Validar solo ingrese numeros
function validarNumeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // backspace
    if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
    if (tecla==189) return true; // guion
    if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
    if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
    if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
    if (tecla>=96 && tecla<=105) { return true;} //numpad
 
    patron = /[0-9]/; // patron
 
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba
  }


function LimpiarCamposUsuario () {
    $("input:not(:radio)").val("");
    $("select").val("");
    $("#txtContra").focus();
}

//Contador Carbohidratos ----------------------------------------------------------------
var fechaT = document.getElementById('fecha').innerText;
var id_base_alimentaria;
    fecha = fechaT;
    $.ajax({
    type: "POST",
    url: url + "/base_alimentaria/IdBase",
    data: {"fecha": fecha}
    }).done(function(result){
    var dtlls = eval('(' + result + ')');
    id_base_alimentaria = dtlls[0]["id_base_alimentaria"];
    document.getElementById('IdBaseAlimentaria').innerHTML = id_base_alimentaria;
    id();
    }).fail(function(){

    }).always(function(){

});


var TCHODtlls, idDtllsBaseAlimentaria, idBaseA, idDtllHC, TT;
function id(){
      //Consulta Detalles base alimentaria.
      var IdBaase = document.getElementById('IdBaseAlimentaria').innerText;
      $.ajax({
          type: "POST",
          url: url + "/base_alimentaria/cargarDtllsBaseAlimentaria",
          data: {"IdBaase": IdBaase}
      }).done(function(result){
          var dtllsBs = eval('(' + result + ')');
          count = dtllsBs.length;
          for(i= 0; i<=count; i++)
          {
             idDtllsBaseAlimentaria = dtllsBs[0]["id_dtll_base_alimentaria"];
             TCHODtlls = dtllsBs[0]["TCHO"];
             idBaseA = dtllsBs[0]["idBaseA"];
             idDtllHC = dtllsBs[0]["idDtllHC"];
             TT = dtllsBs[0]["TT"];
             DtllsBa();
         }
     }).fail(function(){

     }).always(function(){

     });
 }

 function DtllsBa(){
    document.getElementById('Carbohidratos').innerHTML = TT;
}

//Seleccion del alimento segun la clasificación
if ($('#clasificacion').length !== 0) {

  $('#clasificacion').change( function(){

    //Alimentos General
    document.getElementById('box1View').innerHTML = "";
    document.getElementById('AlimentosRecomendados').innerHTML = "";
    var idClasificacion = $( this ).val();
    $.ajax({
      type: "POST",
      url: url + "/base_alimentaria/AlimentosCalculadora",
      data: {"idClasificacion": idClasificacion}
  }).done(function(result){
      var clasificacion = eval('('+result+')');
      JSON1 = clasificacion;
      var numeroClsificacion = clasificacion.length;
      for (i=0; i<=numeroClsificacion; i++){
          descripcion = clasificacion[i]["descripcion"];
          id_alimento = clasificacion[i]["id_alimento"];
          clasificacionid = clasificacion[i]["id_clasificacion"];
          document.getElementById('box1View').innerHTML += "<option value='"+id_alimento+"'>"+descripcion+"</option>";
      }
  }).fail(function(){

  }).always(function(){

  });

  var idClasificacion = $( this ).val();
  var IdBaase = document.getElementById('IdBaseAlimentaria').innerText;
  $.ajax({
      type: "POST",
      url: url + "/base_alimentaria/DtllsBaseAlimentariaClasificacion",
      data: {"idClasificacion": idClasificacion, "IdBaase":IdBaase}
  }).done(function(result){
      var dtllsCls = eval('('+result+')');
      JSON1 = dtllsCls;
      var numeroClsificacion = dtllsCls.length;
      for (i=0; i<=numeroClsificacion; i++){
          idA = dtllsCls[i]["idA"];
          ali = dtllsCls[i]["ali"];
          document.getElementById('AlimentosRecomendados').innerHTML += "<option style='color:green;' value='"+idA+"'>"+ali+"</option>";
      }
  }).fail(function(){

  }).always(function(){

  });

});
}

//Filtro de busquedad
$('#box1Filter').on('input', function(){

    var alimentos = $("#box1Filter").val();
    $.ajax({
      type: "POST",
      url: url+"/base_alimentaria/SP_FiltroCalcular",
      data: { "box1Filter":alimentos }
  })
    .done(function(result) {
         if(alimentos == "")
    {
       document.getElementById('box1View').innerHTML = ""; 
    }else{
       document.getElementById('box1View').innerHTML = result;
    }
   })
    .fail(function(result) {
       console.log(result);
   })
});

$('#box1Filter').on('input', function(){
    var alimentoRecomendado = $("#box1Filter").val();
    var IdBaase = document.getElementById('IdBaseAlimentaria').innerText;
    $.ajax({
      type: "POST",
      url: url+"/base_alimentaria/SP_FiltroCalcularRecomendados",
      data: { "alimentoRecomendado":alimentoRecomendado, "IdBaase":IdBaase}
  })
    .done(function(result) {
       document.getElementById('AlimentosRecomendados').innerHTML = result;
   })
    .fail(function(result) {
       console.log(result);
   })
});    

function filtro(obj) {
   var alimentoRecomendado = $('#AlimentosRecomendados option:selected').val();
   var idAlimento = $('#box1View option:selected').val();
   seleccionarAlimento();
   document.getElementById("box1Filter").value = obj;
   document.getElementById('search').innerHTML = "";
}

var nombreAlimento,  unidadMedida, id_clasificacion, peso, proteinas, carbohidratos, indiceGlucemico, id_Alimentos, grasas;
function seleccionarAlimento()
{
  document.getElementById('box1Filter').value = "";
  $("#clasificacion").prop('selectedIndex',0);
  var id_alimento = [];
  var count = 0;
  var idAlimento = $('#box1View option:selected').val();
  $("#Valid").removeAttr("disabled");
  $('input[name=radioTipoConversion]').attr('disabled',false);
  document.getElementById("Error").innerHTML = "";
  document.getElementById('Error').style.display = 'none';

  $.ajax({
    type: "POST",
    url: url + "/base_alimentaria/AlimentacionBasePaciente",
    data: {"idAlimento": idAlimento}
  }).done(function(result){
    var alimento = eval('(' + result + ')');
               id_Alimentos = alimento[0]["id_alimento"];
               nombreAlimento = alimento[0]["descripcion"];
               unidadMedida = alimento[0]["unidad_medida"];
               id_clasificacion = alimento[0]["clasificacion"];
               peso = alimento[0]["peso"];
               carbohidratos = alimento[0]["carbohidratos"];
               proteinas = alimento[0]["proteinas"];
               grasas = alimento[0]["grasas"];
               indiceGlucemico = alimento[0]["indice"];

               pintarAlimento();
             }).fail(function(){

             }).always(function(){

             });
           }

function pintarAlimento()
{
    document.getElementById('box1Filter').innerHTML = "";
    document.getElementById('proteinas').innerHTML = proteinas+"g";                         
    document.getElementById('grasas').innerHTML = grasas+"";                        
    document.getElementById('cho').innerHTML = carbohidratos+"";
    document.getElementById('ig').innerHTML = indiceGlucemico;
    document.getElementById('alimento').innerHTML = nombreAlimento; 
    document.getElementById('UnidadesEquivalentes').innerHTML = 1; 
    document.getElementById('Valid').value = 100;
    document.getElementById('Gramos').checked = true;
    calcular();
}

function LimpiarIndice()
{
    document.getElementById('proteinas').innerHTML = proteinas;                         
    document.getElementById('grasas').innerHTML = grasas;                        
    document.getElementById('cho').innerHTML = carbohidratos;
    document.getElementById('ig').innerHTML = indiceGlucemico;
    document.getElementById('alimento').innerHTML = nombreAlimento; 
    document.getElementById('UnidadesEquivalentes').innerHTML = 1; 
    document.getElementById('Valid').value = 100;
}

function LimpiarUnidades()
{
    document.getElementById('UnidadesEquivalentes').innerHTML = "0"
    document.getElementById('proteinas').innerHTML = "0";               
    document.getElementById('grasas').innerHTML = "0";                        
    document.getElementById('cho').innerHTML = "0";  
    document.getElementById('ig').innerHTML = "0"; 
}

function unidades()
{ 
    document.getElementById('ValidInteger').value = 1;
    calcularProteinas = (($("#ValidInteger").val()) * proteinas);
    CalcularCarbohidratos = (($("#ValidInteger").val()) * carbohidratos);
    CalcularGrasas = (($("#ValidInteger").val()) * grasas);
    calcularUnidadesEquivalentes = $("#ValidInteger").val();
    document.getElementById('UnidadesEquivalentes').innerHTML = calcularUnidadesEquivalentes;
    document.getElementById('proteinas').innerHTML = calcularProteinas.toFixed(2)+"g";               
    document.getElementById('grasas').innerHTML = CalcularGrasas.toFixed(2)+"g";                        
    document.getElementById('cho').innerHTML = CalcularCarbohidratos.toFixed(2)+"g";  
    document.getElementById('ig').innerHTML = indiceGlucemico; 
}

function calcular()
{
  calcularUnidadesEquivalentes = (($("#Valid").val()) / peso); 
  calcularProteinas = (($("#Valid").val()) * proteinas) / peso;
  CalcularCarbohidratos = (($("#Valid").val()) * carbohidratos) /peso;
  CalcularGrasas = (($("#Valid").val()) * grasas) /peso;

  document.getElementById('UnidadesEquivalentes').innerHTML = calcularUnidadesEquivalentes.toFixed(2)+"g";    
  document.getElementById('proteinas').innerHTML = calcularProteinas.toFixed(2)+"g";                       
  document.getElementById('grasas').innerHTML = CalcularGrasas.toFixed(2)+"g";                        
  document.getElementById('cho').innerHTML = CalcularCarbohidratos.toFixed(2)+"g";
}

function calcularCHO()
{
    var car = 0;
    if(carbohidratos == 0)
    {
      document.getElementById('UnidadesEquivalentes').innerHTML = car.toFixed(2)+"g"; 
      document.getElementById('proteinas').innerHTML = car.toFixed(2)+"g";                       
      document.getElementById('grasas').innerHTML = car.toFixed(2)+"g";                        
      document.getElementById('cho').innerHTML = car.toFixed(2)+"g"; 
  }else
  {
    calcularUnidadesEquivalentes = (($("#Valid").val()) / carbohidratos);
    calcularProteinas = (($("#Valid").val()) * proteinas) / carbohidratos;
    CalcularCarbohidratos = (($("#Valid").val()) * carbohidratos) /carbohidratos;
    CalcularGrasas = (($("#Valid").val()) * grasas) /carbohidratos;

    document.getElementById('UnidadesEquivalentes').innerHTML = calcularUnidadesEquivalentes.toFixed(2)+"g"; 
    document.getElementById('proteinas').innerHTML = calcularProteinas.toFixed(2)+"g";                       
    document.getElementById('grasas').innerHTML = CalcularGrasas.toFixed(2)+"g";                        
    document.getElementById('cho').innerHTML = CalcularCarbohidratos.toFixed(2)+"g";
   }   
}

$("#Gramos").click(function() {  
    if($("#Gramos").is(':checked')) {  
      LimpiarIndice();
      calcular();
      document.getElementById('Valid').value = "";
      document.getElementById('Valid').value = "100";
      document.getElementById('Error').style.display = 'none';
      document.getElementById("Error").innerHTML = "";
  }  
});

$("#carbohidratos").click(function() {  
    if($("#carbohidratos").is(':checked')) { 
      LimpiarIndice();
      textBox = carbohidratos;
      document.getElementById('Valid').value = "";
      document.getElementById('Valid').value = carbohidratos;
      document.getElementById('Error').style.display = 'none';
      document.getElementById("Error").innerHTML = "";
      calcularCHO();
  }  
}); 

var range = /^\d{1,5}(\.\d{1,5})?$/;
var hundred = /^1000$/;
var calcularUnidadesEquivalentes = 0;
var CalcularCarbohidratos = 0;
var calcularProteinas = 0;
var CalcularGrasas = 0;
var textBox = 100;

if ($('#Valid').length !==0)
{
 $('#Valid').on('input', function()
 {
    textBox = ($("#Valid").val());
    document.getElementById('Error').style.display = 'none';
    document.getElementById("Error").innerHTML = "";

        if(id_Alimentos != null) //Validar existencia alimento Seleccionado
        {
          var existe = false;
          for (var i = alimento.length -1; i >=0; i--)
          {
             if(alimento[i] == id_Alimentos)
             {
               existe = true;
           }
       }
       if(!existe)
       {
          opcion = document.getElementsByName('radioTipoConversion');
          var seleccionado = false;
          for(var i=0; i< opcion.length; i++)
          {
            if(opcion[i].checked)
            {
              seleccionado = true;
          }
      }
      if(!seleccionado){
        document.getElementById('Error').style.display = 'block';
        document.getElementById("Error").innerHTML = "No seleccionado CHO/Gramos.";
    }else
    {
        if ($('#Gramos').is(':checked'))
        {
          if($('#Valid').val() != 0){
              document.getElementById('ValidInteger').value = "";

              if((range.test(this.value) || hundred.test(this.value)))
              {
                calcularUnidadesEquivalentes = (($("#Valid").val()) / peso); 
                calcularProteinas = (($("#Valid").val()) * proteinas) / peso;
                CalcularCarbohidratos = (($("#Valid").val()) * carbohidratos) /peso;
                CalcularGrasas = (($("#Valid").val()) * grasas) /peso;

                document.getElementById('UnidadesEquivalentes').innerHTML = calcularUnidadesEquivalentes.toFixed(2)+"g";    
                document.getElementById('proteinas').innerHTML = calcularProteinas.toFixed(2)+"g";                       
                document.getElementById('grasas').innerHTML = CalcularGrasas.toFixed(2)+"g";                        
                document.getElementById('cho').innerHTML = CalcularCarbohidratos.toFixed(2)+"g";
            }else   
            {
                document.getElementById('Error').style.display = 'block';
                document.getElementById('Error').innerHTML = "Ingreso caracteres no numéricos o la cifra no está en el rango de 1 a 9999.";
                LimpiarUnidades();
            }
        }else{
          LimpiarUnidades();
          document.getElementById('Valid').value = "";
          document.getElementById('Error').innerHTML = "Ingreso caracteres no numéricos o la cifra no está en el rango de 1 a 9999.";
          document.getElementById('Error').style.display = 'block';
      }
  }else if ($('#carbohidratos').is(':checked'))
  {
    if($('#Valid').val() != 0){
          document.getElementById('ValidInteger').value = "";
          document.getElementById('UnidadesEquivalentes').value = "";
          if((range.test(this.value) || hundred.test(this.value)))
          {
            calcularUnidadesEquivalentes = (($("#Valid").val()) / carbohidratos);
            calcularProteinas = (($("#Valid").val()) * proteinas) / carbohidratos;
            CalcularCarbohidratos = (($("#Valid").val()) * carbohidratos) /carbohidratos;
            CalcularGrasas = (($("#Valid").val()) * grasas) /carbohidratos;

            document.getElementById('UnidadesEquivalentes').innerHTML = calcularUnidadesEquivalentes.toFixed(2)+"g"; 
            document.getElementById('proteinas').innerHTML = calcularProteinas.toFixed(2)+"g";                       
            document.getElementById('grasas').innerHTML = CalcularGrasas.toFixed(2)+"g";                        
            document.getElementById('cho').innerHTML = CalcularCarbohidratos.toFixed(2)+"g";
           }else   
           {
               document.getElementById('Error').style.display = 'block';
               document.getElementById('Error').innerHTML = "Ingreso caracteres no numéricos o la cifra no está en el rango de 0 a 9999.";
               LimpiarUnidades();
           }
    }else{
      LimpiarUnidades();
      document.getElementById('Valid').value = "";
      document.getElementById('Error').style.display = 'block';
      document.getElementById('Error').innerHTML = "Ingreso caracteres no numéricos o la cifra no está en el rango de 1 a 9999.";
    }
   }
 }
    }else{
     document.getElementById('Error').style.display = 'block';
     document.getElementById('Error').innerHTML = "El alimento ya ha sido seleccionado.";
     $("#Valid").attr('disabled', 'disabled');
     $("#ValidInteger").attr('disabled', 'disabled');
     document.getElementById('Valid').value = "";
     document.getElementById('ValidInteger').value = "";
     SeleccionAlimento();
    }
  }else
    {
     document.getElementById('Error').style.display = 'block';
     document.getElementById('Error').innerHTML = "No hay Alimentos seleccionado.";
     SeleccionAlimento();
    }
  });
};   

function limpiarAlimento()
{
  limpiarCamposC();
  id_Alimentos = null;
} 

function SeleccionAlimento()
{
  document.getElementById('Valid').value = "";
  document.getElementById('AlimentosRecomendados').innerHTML = "";
  document.getElementById('ValidInteger').value = "";
  document.getElementById('proteinas').innerHTML = 0;                       
  document.getElementById('grasas').innerHTML = 0;                        
  document.getElementById('cho').innerHTML = 0;  
  document.getElementById('ig').innerHTML = 0; 
  document.getElementById('alimento').innerHTML = "Seleccione el alimento"; 
  $("#Valid").attr('disabled', 'disabled');
  $("#ValidInteger").attr('disabled', 'disabled');
  $('input[name=radioTipoConversion]').attr('disabled',true);
  $('input[name=radioTipoConversion]').attr('checked',false);
  $("#clasificacion").prop('selectedIndex',0);
  document.getElementById('UnidadesEquivalentes').innerHTML = 0;
}

var alimento = [];
var Agregar = 0;
var TotalCHO = 0;
var TotalProteinas = 0;
var TotalGrasas = 0;
var countA = 0;

//Agregamos los alimentos para el conteo de cabohidratos
if ($('#btnAgregar').length !==0)
{
  $('#btnAgregar').on('click', function(){
    document.getElementById('box1Filter').value = "";
    var MaxCHO = document.getElementById('Carbohidratos').innerText;
    var text = ($('#ValidInteger').val());
    var number = ($("#Valid").val());
    if(id_Alimentos != null){ 
        if(text != "" || number !="")
        {                       
            if(id_Alimentos != null){
              var existe = false;
              for (var i = alimento.length -1; i >=0; i--)
              {
                if(alimento[i] == id_Alimentos)
                {
                  existe = true;
              }
          };  
          if(!existe)
          {
            if(MaxCHO >= CalcularCarbohidratos){
                if (TotalCHO > MaxCHO)
                {
                   document.getElementById('Error').style.display = 'block';
                   document.getElementById('Error').innerHTML = "El alimento supera, el total carbohidratos que puede consumir.";
                  
              }else{
                  TotalCHO = TotalCHO + CalcularCarbohidratos;
                  if (TotalCHO > MaxCHO)
                  { 
                     document.getElementById('Error').style.display = 'block';
                     document.getElementById('Error').innerHTML = "El alimento supera, el total carbohidratos que puede consumir.";
                     TotalCHO = TotalCHO - CalcularCarbohidratos;  
                  }else{
                    var table = document.getElementById('tblAlimentos');
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);

                    row.id = countA;

                    var cell0 = row.insertCell(0);
                    var cell1 = row.insertCell(1);
                    var cell2 = row.insertCell(2);
                    var cell3 = row.insertCell(3);
                    cell3.id = ("CHO")+countA;
                    var cell4 = row.insertCell(4);
                    var cell5 = row.insertCell(5);
                    var cell6 = row.insertCell(6);
                    var cell7 = row.insertCell(7);


                    cell0.innerHTML = nombreAlimento;
                    cell1.innerHTML = peso;
                    cell2.innerHTML = unidadMedida;
                    cell3.innerHTML = document.getElementById('cho').innerText;
                    cell4.innerHTML = document.getElementById('proteinas').innerText;
                    cell5.innerHTML = document.getElementById('grasas').innerText;
                    cell6.innerHTML = indiceGlucemico;
                    cell7.innerHTML = "<center><label class='badge badge-important' onclick='borrar("+countA+")'>X</label></center>";

                    countA ++;
                    alimento.push(id_Alimentos);
                    id_Alimentos = null;
                    document.getElementById('lbltotalCarbohidratos').innerHTML = TotalCHO.toFixed(2);
                    limpiarCamposC();
                }
            }
        }else{
            document.getElementById('Error').style.display = 'block';
            document.getElementById('Error').innerHTML = "El alimento supera, el total carbohidratos que puede consulmir.";
       }
   } else
   {
     document.getElementById('Error').style.display = 'block';
     document.getElementById('Error').innerHTML = "El alimento ya fue agregado.";
     SeleccionAlimento();
 }
}else
{
    document.getElementById('Error').style.display = 'block';
    document.getElementById('Error').innerHTML = "No hay alimento seleccionado.";
    SeleccionAlimento();
}
}else{
  document.getElementById('Error').style.display = 'block';
  document.getElementById('Error').innerHTML = "Debe ingresar un valor a  calcular.";
}
}else{
 document.getElementById('Error').style.display = 'block';
 document.getElementById('Error').innerHTML = "No hay alimento seleccionado.";
 SeleccionAlimento();
}         
});
};

function borrar(posicion)
{
  countA--;
  alimento.splice(posicion,1);
  if(alimento.length == 0){
    alimento = [];
  }
  var CarbohidratosTotales =  document.getElementById('CHO'+posicion).innerText;
  resulta = CarbohidratosTotales.indexOf("g");
  CarbohidratosTotales = CarbohidratosTotales.substring(0,resulta);
  TotalCHO = TotalCHO - CarbohidratosTotales;
  document.getElementById('lbltotalCarbohidratos').innerHTML = TotalCHO.toFixed(2);
  if(TotalCHO == 0.01){TotalCHO = 0; document.getElementById('lbltotalCarbohidratos').innerHTML = 0.00;}
  if(TotalCHO < 0){TotalCHO = 0; document.getElementById('lbltotalCarbohidratos').innerHTML = 0.00;}
  $('#'+posicion).remove();
  document.getElementById('Error').style.display = 'none';
}

//No sobre pasa N numero de caracteres
$("input[maxlength]").keyup(function() {
        var limit   = $(this).attr("maxlength"); // Límite del textarea
        var value   = $(this).val();             // Valor actual del textarea
        var current = value.length;              // Número de caracteres actual
        if (limit < current) {                   // Más del límite de caracteres?
            // estáblece el valor del textarea al límite
            $(this).val(value.substring(0, limit));
        }
    });

function limpiarCamposC()
{
  document.getElementById('Valid').value = "";
  document.getElementById('ValidInteger').value = "";
  document.getElementById('proteinas').innerHTML = 0;                       
  document.getElementById('grasas').innerHTML = 0;                        
  document.getElementById('cho').innerHTML = 0;  
  document.getElementById('ig').innerHTML = 0; 
  document.getElementById('alimento').innerHTML = "Seleccione el alimento"; 
  $("#Valid").attr('disabled', 'disabled');
  $("#ValidInteger").attr('disabled', 'disabled');
  $('input[name=radioTipoConversion]').attr('disabled',true);
  $('input[name=radioTipoConversion]').attr('checked',false);
  document.getElementById('Error').style.display = 'none';
  document.getElementById('Error').innerHTML = "";
  $("#clasificacion").prop('selectedIndex',0);
  document.getElementById('UnidadesEquivalentes').innerHTML = 0;
}
function LimpiarCamposUsuario () {
    $("input:not(:radio)").val("");
    $("select").val("");
    $("#txtContra").focus();
    $("html, body").animate({scrollTop:"0px"});

}

//Glucometria


var rangeG = /^\d{1,3}(\.\d{1,3})?$/;
var hundredG = /^1000$/;

// Consulta de momento
var momen, momentoVG;
function validarMomento()
{
    $('#ErrorG').css("display", "none");
    $('#ErrorG').innerHTML = "";
    var fecha = $("#fecha").val();
    var idFicha = $("#id").val();
    $.ajax({
        type: "POST",
        url: url + "/Glucometria/CargarMomentoSeguimeinto",
        data: {"fecha":fecha, "id":idFicha}
    }).done(function(result){
           momentoVG = eval('(' + result + ')');
            count = momentoVG.length;
            for(i=0; i<=count; i++){
            momen = momentoVG[i]["id_momento"];
            }
    });   
}



//Registrar Glucometria


var validMomentos = [];

$('#momento').change( function(){
    document.getElementById('ErrorGu').style.display = 'none';
             var momento = $("#momento").val();
             var existe = false;
              for (var i = validMomentos.length -1; i >=0; i--)
              {
                if(validMomentos[i] == momento)
                {
                  document.getElementById('ErrorG').style.display = 'block';
                  document.getElementById('ErrorG').innerHTML = "El momento ya ha sido seleccionado."; 
                  existe = true;
                }
              }  
          if(!existe){
            document.getElementById('ErrorG').style.display = 'none';
          }
});



var Recomendado, antesR1, antesR2, despuesR;
function nivelGlucometria(){
        $.ajax({
          type: "POST",
          url: url + "/Glucometria/SP_Cargar_NivelGlucometria",
          data:{}
        }).done(function(result){
          var nivelGlucometria = eval('(' + result + ')');
                     R = nivelGlucometria.length;
                
                     var RangoDespues = nivelGlucometria[0]["rango"];
                     var RangoAntes = nivelGlucometria[1]["rango"];
                     var TipoRangoA = nivelGlucometria[1]["tipoRango"];
                     var TipRangoD = nivelGlucometria[0]["tipoRango"];
                     document.getElementById('TipoRango').innerHTML = RangoDespues+ " "+TipRangoD;
                     document.getElementById('Rango1').innerHTML = RangoAntes+" "+TipoRangoA;

                     OperadorRango = RangoDespues.substring(0,1);
                     RangoDespues = RangoDespues.replace(/\D/g,'');
                     antesR1 = RangoAntes.substring(0,3);                  
                     antesR2 = RangoAntes.substring(3,7);
                     despuesR = RangoDespues.substring(0,3);
                     antesR2 = antesR2.replace(/\D/g,'');
                   }).fail(function(){

                   }).always(function(){

                   }); 
               }

function btnGuardar(){
            $('#ErrorGu').css("display", "none");
            $('#ErrorG').css("display", "none");
            $('#ErrorG').innerHTML = "";
            var fe =new Date();
            cad= fe.getFullYear()+ "/" + (fe.getMonth() +1) + "/"+fe.getDate();  
            var fecha = $("#fecha").val();
            var antes = $("#inputAntes").val();
            var despues = $("#inputDespues").val();
            var observaciones = $("#txtComentario").val();
            var momento = $("#momento").val();
            var existe = false;
              for (var i = validMomentos.length -1; i >=0; i--)
              {
                if(validMomentos[i] == momento)
                {
                  existe = true;
                }
              };  
          if(!existe)
          {
            if(antes != "" || despues != ""){
             if(antes != 0 || despues != 0){
              if(momento !== "Seleccionar")
              {
              if(antes == "")
              {
                if(OperadorRango == ">")
                {
                    if(despues < parseInt(despuesR))
                    {
                        document.getElementById('ErrorGu').style.display = 'block';
                    }
                }else{
                    if(despues > parseInt(despuesR))
                    {
                        document.getElementById('ErrorGu').style.display = 'block';
                    }
                }
                    
              }else if(despues == "")
              {
                if(antes < parseInt(antesR1))
                {
                  document.getElementById('ErrorGu').style.display = 'block';
                }else if(antes > parseInt(antesR2))
                {
                    document.getElementById('ErrorGu').style.display = 'block';
                }
              }else if(antes != "" && despues != "")
              {
                if(antes < parseInt(antesR1))
                {
                  document.getElementById('ErrorGu').style.display = 'block';
                }else if(antes > parseInt(antesR2))
                {
                    document.getElementById('ErrorGu').style.display = 'block';
                }else if(OperadorRango == ">")
                {
                    if(despues < parseInt(despuesR))
                    {
                        document.getElementById('ErrorGu').style.display = 'block';
                    }
                }else{
                    if(despues > parseInt(despuesR))
                    {
                        document.getElementById('ErrorGu').style.display = 'block';
                    }
                }
              }
              document.getElementById('btnGuardarGlucometria').style.display = 'none';
            $.ajax({
              type: "POST",
              url: url+"Glucometria/RegistrarGlucometria",
              data: {"fecha": fecha, "inputAntes": antes, "txtComentario":observaciones, "momento":momento, "inputDespues":despues}
            })
            .done(function(result){
               $("#tblGlucometria").empty();
               document.getElementById('Registro').style.display = 'block';
               limpiarGLucometriaGuardar();
               GuardarP();
               consultarGlucometria(); 
            })
            .fail(function(){

            })
            .always(function(){

            });
            validMomentos.push(momento);
            }else{
                document.getElementById('ErrorG').style.display = 'block';
                document.getElementById('ErrorG').innerHTML = "Debe seleccionar un momento.";
            }
          }else{
             document.getElementById('ErrorG').style.display = 'block';
             document.getElementById('ErrorG').innerHTML = "Ingreso caracteres no numéricos o la cifra no está en el rango de 1 a 999";
          }
        }else{
          document.getElementById('ErrorG').style.display = 'block';
          document.getElementById('ErrorG').innerHTML = "Los campos no pueden estar vacíos.";
        }
}else{
    document.getElementById('ErrorG').style.display = 'block';
    document.getElementById('ErrorG').innerHTML = "El momento ya ha sido seleccionado."; 
  }
}
  
function GuardarP()
{
    document.getElementById('btnGuardarGlucometria').style.display = 'none';
    document.getElementById('btnLimpiar').style.display = 'block';
    $("#btnLimpiar").removeClass("btnLimpiar");
    $("#btnLimpiar").addClass("subir");
    $("#AlertRango").addClass("a");
    $("#btnLimpiar1").addClass("salirGuardar");
    $("#AlertRango").removeClass("bajaralert");
    $("#inputDespues").attr('disabled', 'disabled');
    $("#momento").attr('disabled', 'disabled');
    $("#inputAntes").attr('disabled', 'disabled');
    $("#txtComentario").attr('disabled', 'disabled');
}


//Consultar Glucometria
var i = 0;
var count = 0;
var SeguimientoID, fecha, antes, despues, observaciones, id_ficha_tecnica, momento, idMomento;
consultarGlucometria();
var Sglucometria;
function consultarGlucometria(){
    nivelGlucometria();
    validarMomento();
      $('#ErrorG').css("display", "none");
      $('#ErrorG').innerHTML = "";
      var fecha = $("#fecha").val();
      var idFicha = $("#id").val();
      $.ajax({
        type: "POST",
        url: url + "/Glucometria/ConsultarSeguimiento",
        data: {"fecha":fecha, "id":idFicha}
      }).done(function(result){
        $("#tblGlucometria").empty();
         Sglucometria = eval('(' + result + ')');
                   // alert(result[1]["alimentos"]);
                   count = Sglucometria.length;
                   for(i= 0; i<=count; i++)
                   {
                   SeguimientoID = Sglucometria[i]["seguimientoid"];
                   fecha = Sglucometria[i]["fecha"];
                   antes = Sglucometria[i]["antes"];
                   despues = Sglucometria[i]["despues"];
                   observaciones = Sglucometria[i]["observaciones"];
                   id_ficha_tecnica = Sglucometria[i]["id_ficha_tecnica"];
                   momento = Sglucometria[i]["momento"];
                   idMomento = Sglucometria[i]["id"];
                   pintarGlucometria();
                   }

                 }).fail(function(){

                 }).always(function(){

                 }); 
                 $("#tblGlucometria").innerHTML = "";
  } 


  //Consulta Dada una fecha
  if ($('#dpYears').length !== 0) {
  $('#dpYears').on('click', function(){
        var fecha = $("#fecha").val();
        var idFicha = $("#id").val();
      $.ajax({
        type: "POST",
        url: url + "/Glucometria/ConsultarSeguimiento",
        data: {"fecha":fecha, "id":idFicha}
      }).done(function(result){
        $("#tblGlucometria").empty();
        var Sglucometria = eval('(' + result + ')');
                   count = Sglucometria.length;
                   for(i= 0; i<=count; i++)
                   {
                   SeguimientoID = Sglucometria[i]["seguimientoid"];
                   fecha = Sglucometria[i]["fecha"];
                   antes = Sglucometria[i]["antes"];
                   despues = Sglucometria[i]["despues"];
                   observaciones = Sglucometria[i]["observaciones"];
                   id_ficha_tecnica = Sglucometria[i]["id_ficha_tecnica"];
                   momento = Sglucometria[i]["momento"];
                   idMomento = Sglucometria[i]["id"];
                   pintarGlucometria();
                   }

                 }).fail(function(){

                 }).always(function(){

                 }); 
                 document.getElementById("tblGlucometria").innerHTML = "";
  });
}



  //Pintar Glucometria
  function pintarGlucometria(){
    document.getElementById('ErrorG').style.display = 'none';
    document.getElementById('ErrorG').innerHTML = "";
    var tableGlucometria = document.getElementById('tblGlucometria');
    var rowCount = tableGlucometria.rows.length;
    var row = tableGlucometria.insertRow(rowCount);
    row.id = "tr"+SeguimientoID;


    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    cell3.id = SeguimientoID;
    cell3.style.display = 'none';
    var cell4 = row.insertCell(4);

    cell0.innerHTML = momento;
    cell1.innerHTML = antes;
    cell2.innerHTML = despues;
    cell3.innerHTML = observaciones;
    cell4.innerHTML = "<label class='badge badge-info' onclick='glucometria(this.id)' id='"+SeguimientoID+"'><i class='icon-zoom-in'></i></label>";
  }

   $('#btnModificarGlucometria').css("display", "none");
   $('#btnGuardarGlucometria').css("display", "block");
   $('#btnLimpiar1').css("display", "block");

   function ocultar(fila) {
    document.all[fila].style.display = "none";
   }

   function modificarP()
   {
     document.getElementById('btnModificaeGlucometria').style.display = 'none';
     document.getElementById('btnGuardarGlucometria').style.display = 'none';
     document.getElementById('btnLimpiar1').style.display = 'block';
     $("#inputDespues").attr('disabled', 'disabled');
     $("#momento").attr('disabled', 'disabled');
     $("#inputAntes").attr('disabled', 'disabled');
     $("#txtComentario").attr('disabled', 'disabled');
   }

  function glucometria(id)
  {
    $("#btnLimpiar").addClass("btnLimpiar");
    document.getElementById('ErrorGu').style.display = 'none';
    document.getElementById('Registro').style.display = 'none';
    document.getElementById('btnGuardarGlucometria').style.display = 'none';
    document.getElementById('btnModificarGlucometria').style.display = 'block';
    document.getElementById('ErrorG').innerHTML = "";
    document.getElementById('btnLimpiar1').style.display = 'none';
    document.getElementById('btnLimpiar').style.display = 'block';
    document.getElementById('ErrorG').style.display = 'none';
    document.getElementById('SeguimeintoGlucometriaID').innerHTML = id;
    momento = document.getElementById("tr"+id).cells[0].innerHTML;
    antes = document.getElementById("tr"+id).cells[1].innerHTML; 
    despues = document.getElementById("tr"+id).cells[2].innerHTML;
    observaciones = document.getElementById("tr"+id).cells[3].innerHTML;

    $("#inputAntes").removeAttr("disabled");
    $("#inputDespues").removeAttr("disabled");
    $("#momento").removeAttr("disabled");

    if(antes > 0)
    {
      document.getElementById('inputAntes').value = antes;
      $("#inputAntes").attr('disabled', 'disabled');
    }else{
       $("#txtComentario").removeAttr("disabled");
       $("#inputAntes").removeAttr("disabled");
       document.getElementById('inputAntes').value = "";
       document.getElementById('btnModificarGlucometria').disabled = false;
    }

    if(despues > 0)
    {
      document.getElementById('inputDespues').value = despues;
      $("#inputDespues").attr('disabled', 'disabled');
    }else{
      $("#txtComentario").removeAttr("disabled");
      document.getElementById('inputDespues').value = "";
      $("#inputDespues").removeAttr("disabled");
      document.getElementById('btnModificarGlucometria').disabled = false;
    }

    if(despues > 0 && antes >0)
    {
       document.getElementById('txtComentario').value = observaciones;
       $("#txtComentario").attr('disabled', 'disabled');
       document.getElementById('btnModificarGlucometria').disabled = "true";
    }

    document.getElementById('momento').innerHTML = "<option>"+momento+"<option>";
    $("#momento").attr('disabled', 'disabled');

    document.getElementById('txtComentario').value = observaciones;
    $("#btnLimpiar1").addClass("nuevo");

          $('#btnModificarGlucometria').on('click', function(){
            $("#tblGlucometria").empty();
            document.getElementById('ErrorG').style.display = 'none';
            document.getElementById('ErrorG').innerHTML = "";
             var antesM = $("#inputAntes").val();
             var despuesM = $("#inputDespues").val();
             var ComentarioD = $("#txtComentario").val();
             var id_Glucometria = $("#SeguimeintoGlucometriaID").val();
             if(antes > 0)
                {
                 document.getElementById('ErrorGu').style.display = 'none';
                  if(OperadorRango == ">")
                    {
                      if(despuesM < parseInt(despuesR))
                         {
                          document.getElementById('ErrorGu').style.display = 'block';
                         }
                    }else{
                      if(despuesM > parseInt(despuesR))
                         {
                           document.getElementById('ErrorGu').style.display = 'block';
                         }
                        }
                }else if (despues > 0){
                    document.getElementById('ErrorGu').style.display = 'none';
                   if(antesM < parseInt(antesR1))
                     {
                        document.getElementById('ErrorGu').style.display = 'block';
                    }else if(antesM > parseInt(antesR2))
                       {
                         document.getElementById('ErrorGu').style.display = 'block';
                       }else if(antesM > parseInt(antesR1) && antesM < parseInt(antesR2))
                     {
                        document.getElementById('ErrorGu').style.display = 'none';
                    }
                }
             $.ajax({
              type: "POST",
              url:url+"Glucometria/ActualizarGlucometria",
              data: {"inputDespues":despuesM, "inputAntes":antesM, "txtComentario":ComentarioD, "SeguimeintoGlucometriaID":id_Glucometria}
              })
             .done(function(result)
             {
               document.getElementById('Registro').style.display = 'block';
               limpiarGLucometriaModificar();
               consultarGlucometria(); 
               modificarP();
             })
             .fail(function(){
             })
             .always(function(){
             });
          }); 
       }


//Limpiar Glucometria
function limpiarGLucometriaModificar()
{
    $("#btnLimpiar").addClass("subir");
    $("#btnLimpiar1").addClass("salir");
    $("#btnLimpiar").removeClass("btnLimpiar");
    $("#btnLimpiar1").removeClass("nuevo");
    $("#AlertRango").removeClass("a");
    $("#btnLimpiar1").removeClass("limpiar2");
    $("#AlertRango").addClass("bajaralert");
   // document.getElementById('ErrorGu').style.display = 'none';
   // document.getElementById('Registro').style.display = 'none';
   document.getElementById('btnLimpiar').style.display = 'block';
   document.getElementById('btnLimpiar1').style.display = 'block';
   document.getElementById('ErrorG').style.display = 'none';
   document.getElementById('ErrorG').innerHTML = "";
   document.getElementById('btnGuardarGlucometria').style.display = 'none';
   document.getElementById('btnModificarGlucometria').style.display = 'none';
   document.getElementById('btnModificarGlucometria').disabled = false;
   document.getElementById('inputAntes').value = "";
   document.getElementById('inputDespues').value = "";
   document.getElementById('txtComentario').value = "";
   $("#momento").prop('selectedIndex',0);
   $("#inputDespues").attr('disabled', 'disabled');
   $("#momento").attr('disabled', 'disabled');
   $("#inputAntes").attr('disabled', 'disabled');
   $("#txtComentario").attr('disabled', 'disabled');
   conservarSelect();   
}


function limpiarGLucometriaGuardar()
{
    $("#btnLimpiar1").removeClass("salirGuardar");
    $("#btnLimpiar").addClass("btnLimpiar");
    $("#btnLimpiar").removeClass("subir");
    $("#btnLimpiar1").removeClass("salir");
    $("#AlertRango").removeClass("a");
    $("#AlertRango").removeClass("bajaralert");
   // document.getElementById('ErrorGu').style.display = 'none';
   // document.getElementById('Registro').style.display = 'none';
   $("#btnLimpiar1").removeClass("limpiar2");
   document.getElementById('btnLimpiar').style.display = 'none';
   document.getElementById('btnLimpiar1').style.display = 'block';   
   document.getElementById('btnGuardarGlucometria').style.display = 'block';
   document.getElementById('btnModificarGlucometria').style.display = 'none';
   document.getElementById('btnModificarGlucometria').disabled = false;
   $("#txtComentario").removeAttr("disabled");
   $("#inputAntes").removeAttr("disabled");
   document.getElementById('inputAntes').value = "";
   $("#inputDespues").removeAttr("disabled");
   document.getElementById('inputDespues').value = "";
   document.getElementById('txtComentario').value = "";
   $("#momento").removeAttr("disabled");
   $("#momento").prop('selectedIndex',0);
   conservarSelect();   
}

function limpiarGLucometria()
{
    $("#btnLimpiar1").removeClass("salirGuardar");
    $("#btnLimpiar").addClass("btnLimpiar");
    $("#btnLimpiar").removeClass("subir");
    $("#btnLimpiar1").removeClass("salir");
    $("#AlertRango").removeClass("a");
    $("#AlertRango").removeClass("bajaralert");
   // document.getElementById('ErrorGu').style.display = 'none';
   // document.getElementById('Registro').style.display = 'none';
   $("#btnLimpiar1").removeClass("limpiar2");
   document.getElementById('btnLimpiar').style.display = 'none';
   document.getElementById('btnLimpiar1').style.display = 'block';  
   document.getElementById('ErrorGu').style.display = 'none';
   document.getElementById('Registro').style.display = 'none';
   document.getElementById('ErrorG').style.display = 'none';
   document.getElementById('ErrorG').innerHTML = ""; 
   document.getElementById('btnGuardarGlucometria').style.display = 'block';
   document.getElementById('btnModificarGlucometria').style.display = 'none';
   document.getElementById('btnModificarGlucometria').disabled = false;
   $("#txtComentario").removeAttr("disabled");
   $("#inputAntes").removeAttr("disabled");
   document.getElementById('inputAntes').value = "";
   $("#inputDespues").removeAttr("disabled");
   document.getElementById('inputDespues').value = "";
   document.getElementById('txtComentario').value = "";
   $("#momento").removeAttr("disabled");
   $("#momento").prop('selectedIndex',0);
   conservarSelect();   
}





var div = $("#momento").html();
function conservarSelect()
{
  document.getElementById('momento').innerHTML = div;
}


//Dosificación 

var rangeD = /^\d{1,3}(\.\d{1,3})?$/;
var hundred = /^1000$/;

function GuadarDisificacion()
{
            $('#ErrorDosi').css("display", "none");
            var fecha = $("#fechaDosificacion").val();
            var dosis = $("#dosis").val();
            var observaciones = $("#txtComentarioDosificacion").val();
            var idFicha = $("#id").val();
            var tipoDosificacion = $("#tipoDosificacion").val();
            var fe =new Date();
            cad= fe.getFullYear()+ "/" + (fe.getMonth() +1) + "/"+fe.getDate();  
            if(dosis !== "")
              {
               if(cad >= fecha){
                $('#ErrorDosi').css("display", "none");
                if(tipoDosificacion != "Seleccionar"){  
                 $('#ErrorDosi').css("display", "none");
                $.ajax({
                  type: "POST",
                  url: url+"Dosificacion/RegistroDosificacion",
                  data: {"fechaDosificacion": fecha, "dosis": dosis, "txtComentarioDosificacion":observaciones,  "id":idFicha, "tipoDosificacion":tipoDosificacion}
                })
                .done(function(result){
                  ConsultarDosificacion();
                  limpiarDosificacion();
                  $("#tblDosificacion").empty();
                  document.getElementById('Registro').style.display = 'block';
                })
                .fail(function(){

                })
                .always(function(){

                });
            }else
            {
              document.getElementById('ErrorDosi').style.display = 'block';
              document.getElementById('ErrorDosi').innerHTML = "<strong> Debe seleccionar un tipo de dosificación. </strong>";
            }
           }else{
              document.getElementById('ErrorDosi').style.display = 'block';
              document.getElementById('ErrorDosi').innerHTML = "<strong> La fecha seleccionada no puede exceder la fecha actual.  </strong>";
           }
         }else{
              document.getElementById('ErrorDosi').style.display = 'block';
              document.getElementById('ErrorDosi').innerHTML = "<strong> Los campos no pueden estar vacíos.</strong>"; 
         }
}

var unidades, comentario, tipoInsulina;
function ConsultarDosificacion()
{
    $('#ErrorDosi').css("display", "none");
     $("#tblDosificacion").empty();
      var fecha = $("#fechaDosificacion").val();
      var idFicha = $("#id").val();
      $.ajax({
        type: "POST",
        url: url + "/Dosificacion/ConsultarDosificacion",
        data: {"fechaDosificacion":fecha, "id":idFicha}
      }).done(function(result){
        var dosificacion = eval('(' + result + ')');
                   // alert(result[1]["alimentos"]);
                   count = dosificacion.length;
                   for(i= 0; i<=count; i++)
                   {
                   unidades = dosificacion[i]["cantidad"];
                   comentario = dosificacion[i]["observaciones"];
                   tipoInsulina = dosificacion[i]["dosi"];
                   pintarDosificacion();
                   }

                 }).fail(function(){

                 }).always(function(){

                 });
}

function pintarDosificacion(){
    var tableDosificacion = document.getElementById('tblDosificacion');
    var rowCount = tableDosificacion.rows.length;
    var row = tableDosificacion.insertRow(rowCount);


    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);

    cell0.innerHTML = unidades;
    cell1.innerHTML = tipoInsulina;
    var recorte = comentario.match(/.{1,20}/g).join("<br/>");
    cell2.innerHTML = recorte;
   
  }

function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

  if ($('#btnGenerarPDF').length !== 0) {
    $('#btnGenerarPDF').on('click', function(){
        var fecha = $("#fecha").val();
        var idFicha = $("#id").val();
       
            $.ajax({
              type: "POST",
              url: url + "/Glucometria/cargarPdf",
              data: {"fecha":fecha}
            }).done(function(result){
                window.open(url+"/Glucometria/GenerarPDF");
            })
            .fail(function(){

            })
            .always(function(){

            });
    });
}


var select = $("#tipoDosificacion").html();

function conservarSelectDosificacion()
    {
      document.getElementById('tipoDosificacion').value = "Seleccionar";
    }



function limpiarDosificacion() {
  document.getElementById('ErrorDosi').style.display = 'none';
  document.getElementById("dosis").value = "";
  document.getElementById("txtComentarioDosificacion").value = "";
  $("#dosis").attr('disabled', 'disabled');
  $("#txtComentarioDosificacion").attr('disabled', 'disabled');
  $("#tipoDosificacion").attr('disabled', 'disabled');
  document.getElementById('btnGuardarDosificacion').style.display = 'none';
  document.getElementById('btnNuevo').style.display = 'block';
  $("#btnLimpiar1").addClass("salirModificar");
  conservarSelectDosificacion();
}

function NuevoDosificacion()
{
    $("#btnLimpiar1").removeClass("salirModificar");
    $("#btnLimpiar1").addClass("salirGuardarD");
    document.getElementById('btnGuardarDosificacion').style.display = 'block';
    document.getElementById('btnNuevo').style.display = 'none';
    document.getElementById('Registro').style.display = 'none';
    $("#dosis").attr('disabled', false);
    $("#txtComentarioDosificacion").attr('disabled', false);
    $("#tipoDosificacion").attr('disabled', false);
}
