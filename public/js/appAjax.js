function seleccionarPaciente(objbtn)
{
    var identificador = objbtn.value;
    $.ajax({
        type: "POST",
        url: url + "/medicos/cargarVistaPaciente",
        data: {"identificador": identificador, "arrayPacientes": arrayPacientes}
    }).done(function(result){
        document.location.href="medicos/perfilPaciente";
    }).fail(function(){

    }).always(function(){

    });
};

function cargarEspecialUser(objTipoUser){
    var tipoUser = objTipoUser.id;
    $.ajax({
        type: "POST",
        url: url + "/login/direccionarUsuario",
        data: {"tipoUser": tipoUser}
    }).done(function(result){
        window.location.href= result;
    }).fail(function(){

    }).always(function(){

    });
};

