function seleccionarPaciente(objbtn)
{
    var identificador = objbtn.value;
    $.ajax({
        type: "POST",
        url: url + "/medicos/cargarVistaPaciente",
        data: {"identificador": identificador, "arrayPacientes": arrayPacientes}
    }).done(function(result){
        document.location.href=url+"medicos/perfilPaciente";
    }).fail(function(){

    }).always(function(){

    });
}
var base_alimentaria = [];
var idMomento;
var newAlimento;
var alimentos = [];
var _alimentosList = [];
var _alimentosPrint = [];
var index;
var validaeAlimentos;

if ($('#btnLimpiar').length !== 0) {

    $('#btnLimpiar').on('click', function(){
        LimpiarBaseAlimentaria();
    });
}
function LimpiarBaseAlimentaria () {
        base_alimentaria = [];
         idMomento = 0;
         alimentos = [];
         _alimentosList = [];
         _alimentosPrint = [];
         carbohidratosPorMomentos =[];
         $('input[name^=txtCho]').val("");
         id_RecomendacionSeleccionada = 0;
         $("#tblRecomendaciones").children("tbody").children("tr").attr("class", "");
         $("html, body").animate({scrollTop:"0px"});
         $("#totalCHO").html("<ul class='breadcrumb' style='background-color:#C4DBFF;'>Total consumo CHO diario / -</ul>");
}
function cargarModelMomento(objBtnAdd)
{
    var nombre = objBtnAdd.name;
    idMomento = objBtnAdd.id;
    console.log(idMomento);
    var _alimentosMomento;
    if (base_alimentaria[0] != undefined) {

        if (validarSiNoEstaMomento(idMomento)) {

            index = findMomento(base_alimentaria, idMomento);

            _alimentosMomento = base_alimentaria[index].alimentos;

                var _push;
                _alimentosList = [];
                _alimentosPrint = [];
                var _validados = [];
               $.map(alimentosJSON, function(n,i){

                   if ($.inArray(n.id_alimento, _alimentosMomento) == -1){
                       var ret = {"id": n.id_alimento, "descripcion": n.descripcion};
                       _alimentosList.push(ret);
                   } 

                });

                $.map(alimentosJSON, function(n,i){

                   if ($.inArray(n.id_alimento, _alimentosMomento) !== -1){
                       var ret = {"id": n.id_alimento, "descripcion": n.descripcion};
                       _alimentosPrint.push(ret);
                   } 

                });              

             $('#box1View').html("");
             $('#box2View').html("");

              for (var j = 0; j < _alimentosPrint.length; j++) {

                 $('#box2View').append('<option value="'+_alimentosPrint[j].id+'">'+_alimentosPrint[j].descripcion+'</option>');
             
              };

              for (var i = 0; i < _alimentosList.length; i++) {

                 $('#box1View').append('<option value="'+_alimentosList[i].id+'">'+_alimentosList[i].descripcion+'</option>');
                    
                };

        }else 
        {
             $('#box1View').html("");
             $('#box2View').html("");
            for (var i = alimentosJSON.length - 1; i >= 0; i--) {
               $('#box1View').append('<option value="'+alimentosJSON[i].id_alimento+'">'+alimentosJSON[i].descripcion+'</option>');
            };
        };
    }else{
        $('#box1View').html("");
        $('#box2View').html("");
        for (var i = alimentosJSON.length - 1; i >= 0; i--) {
           $('#box1View').append('<option value="'+alimentosJSON[i].id_alimento+'">'+alimentosJSON[i].descripcion+'</option>');
        };
    };

    document.getElementById('myModalLabel3').innerHTML = "Añadir alimentos / " + nombre;

    document.getElementById('guardarMomento').value = idMomento;
}
function valid(arr, _index)
{
    var result = false;
    for (var i = 0; i < arr.length; i++) {
        if(arr[i] == _index)
        {
            result = true;
            break;
        }else{
            result = false
        };
    };
    return result;
}
function findMomento(momento, id_momento)
{
    for (var i = 0; i < momento.length; i++) {
        if (momento[i].id_momento == id_momento) {
            index = i;

            break;
        }else
        {
            index = 0;
        }
    }

    return index;
}

function validarSiEstaMomento(momento)
{
    var validado = true;
    for (var i = 0; i < base_alimentaria.length; i++) {
        if (base_alimentaria[i].id_momento == momento) {
            validado = false;
            break;
        }else
        {
            validado = true;
        };
    };
    return validado;
 
}
function validarSiNoEstaMomento(momento)
{
    var validado = true;
    for (var i = 0; i < base_alimentaria.length; i++) {
        if (base_alimentaria[i].id_momento == momento) {
            validado = true;
            break;
        }else
        {
            validado = false;
        };
    };
    return validado;
 
}
    $('#guardarMomento').on('click', function(){

        if (validarSiEstaMomento(idMomento)) {        

            var alimentosMomento = [ ];
            var alimentos = $("#box2View option");
            for (var i = alimentos.length - 1; i >= 0; i--) {
                alimentosMomento.push(alimentos[i].value);
            };

            var base_alimentariaMomento = {"id_momento": idMomento, "alimentos": alimentosMomento };

            base_alimentaria.push(base_alimentariaMomento);


        }else{
            var alimentosMomento = [ ];
            var alimentos = $("#box2View option");
            for (var i = alimentos.length - 1; i >= 0; i--) {
                alimentosMomento.push(alimentos[i].value);
            };

            
            index = findMomento(base_alimentaria, idMomento);
            base_alimentaria[index].alimentos = alimentosMomento;
            
        };

});
function AlertarExistenciaHC()
{
    $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Lo sentimos!</strong> Debe crear una historia clinica para acceder.</div>");
    $("html, body").animate({scrollTop:"0px"});
    setInterval(function(){$("#msg").html("");}, 10000);
}

var array =[]; 
function cargarModalRecomendacion(objbtnDetalle)
{
    var id_Recomendacion = objbtnDetalle.id;
    $.ajax({
        type: "POST",
        url: url + "/base_alimentaria/cargarRangos",
        data: {"id_Recomendacion": id_Recomendacion}
    }).done(function(result){
        array = JSON.parse(result);
        $("#rangos").html("");
        if (array[0] != undefined) {
            for (var i = array.length - 1; i >= 0; i--) {
               $("#rangos").append("<address><strong id='tipoRango'>"+array[i].tipo_rango+"</strong><br>"+ array[i].nombre +"</address>");
            };
        }else{  
            $("#rangos").html("No se encontraron datos.");
        };
    }).fail(function(){

    }).always(function(){

    });
    for (var i = recom.length - 1; i >= 0; i--) {
        if (recom[i].id_recomendacion_rango == id_Recomendacion)
        {
            $("#tituloDetalles").html(recom[i].nombre);
        };
    };
}

var array =[]; 
function cargarModalBase(objbtnBase)
{
    var id_Base = objbtnBase.id;
    $.ajax({
        type: "POST",
        url: url + "/base_alimentaria/cargarAlimentosBase",
        data: {"id_Base": id_Base}
    }).done(function(result){
        $("#cargarAliBase").html("");
        if (result != "") {
            $("#cargarAliBase").append(result);
        }else{  
            $("#cargarAliBase").html("No se encontraron datos.");
        };
    }).fail(function(){

    }).always(function(){

    });
}

var id_RecomendacionSeleccionada = 0;
function seleccionarRecomendacion(objbtnSeleccionado)
{
    id_RecomendacionSeleccionada = objbtnSeleccionado.id;
    var rows = $("#tblRecomendaciones").children('tbody').children('tr');
    for (var i = rows.length - 1; i >= 0; i--) {
        $(rows[i]).attr('class', '');
    };
    $(objbtnSeleccionado).closest("tr").attr('class', 'info');
}
//Validar el tipo de usuario en la vista de registrar nuevo usuario
var elementsUsuarios = document.getElementsByName("rbtnTipoUsuario"); // Recojo el grupo de elementos radio button. 
var tipoUsuario;
for (var i=0, len=elementsUsuarios.length; i<len; i++) {
    elementsUsuarios[i].onclick = function() { //Funcion Onclick para el grupo de elementos
        if (this.value == "rbtnMedico") {
            $("input:not(:radio)").val("");
            $("select").val("");
            document.getElementById("info-basica").style.display ="block";
            document.getElementById("botones").style.display ="block";
            document.getElementById("info-contacto").style.display ="block";
            document.getElementById("info-acceso").style.display ="block";
            var inputMedico = document.getElementsByName("inputMedico");
            for (var i = 0; i < inputMedico.length; i++) {
                inputMedico[i].style.display = "block";
            };

            var inputPaciente = document.getElementsByName("inputPaciente");
            for (var i = 0; i < inputPaciente.length; i++) {
                inputPaciente[i].style.display = "none";
            };
            tipoUsuario = 2;
            $("#msg").html("");
        }else{
            $("select").val("");
            $("input:not(:radio)").val("");
            document.getElementById("info-basica").style.display ="block";
            document.getElementById("botones").style.display ="block";
            document.getElementById("info-contacto").style.display ="block";
            document.getElementById("info-acceso").style.display ="block";

            var inputMedico = document.getElementsByName("inputMedico");
            for (var i = 0; i < inputMedico.length; i++) {
                inputMedico[i].style.display = "none";
            };

            var inputPaciente = document.getElementsByName("inputPaciente");
            for (var i = 0; i < inputPaciente.length; i++) {
                inputPaciente[i].style.display = "block";
            };
            tipoUsuario = 1;
            $("#msg").html("");
        };
    };
}
//valido si el momento ya se ingreso
function validarSiEstaMomentoCHO(momento)
{
    var validado = true;
    for (var i = 0; i < carbohidratosPorMomentos.length; i++) {
        if (carbohidratosPorMomentos[i].id_momento == momento) {
            validado = false;
            break;
        }else
        {
            validado = true;
        };
    };
    return validado;
 

}
//Recoger valores de inputs de carbohidratos en la base alimentaria, por momentos
var elements = document.getElementsByName("txtCho"); // Recojo el grupo de elementos radio button. 
var carbohidratosPorMomentos = [];
for (var i=0, len=elements.length; i<len; i++) {
    elements[i].onkeyup = function() { //Funcion Onclick para el grupo de elementos
        var valor;
        if (this.value == "") { valor = 0} else {valor = this.value};

            if (validarSiEstaMomentoCHO(this.id)) {
                var _pushCHO = {"id_momento": this.id, "CHO": valor}
                carbohidratosPorMomentos.push(_pushCHO);
            }else
            {
                _index =findMomento(carbohidratosPorMomentos, this.id);
                carbohidratosPorMomentos[_index].CHO = valor;
            };
            var TotalCHO = 0;
            for (var i = carbohidratosPorMomentos.length - 1; i >= 0; i--) {
               TotalCHO += parseFloat(carbohidratosPorMomentos[i].CHO);
            };
        
            $("#totalCHO").html("<ul class='breadcrumb' style='background-color:#C4DBFF;'>Total consumo CHO diario / "+ round(TotalCHO,2)+ "</ul>");

    };
}
function round(value, decimals) {
    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
};

$( "input[name='boxFilter']" ).keypress(function() {
    if($(this).val().length >= 45)
    {
        return false;
    }
});