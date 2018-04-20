//Consulta Base alimentaria Paciente

var Recomendacion, rangos, rangoA, rangoD, tipoRango, Antes;
  function p()
  {
    $.ajax({
      type: "POST",
      url: url + "/base_alimentaria/consultarRangosPaciente"
    }).done(function(result){
      ConsultaNiveles = eval('(' + result + ')');
              count = ConsultaNiveles.length;
                   rangoA = ConsultaNiveles[1]["rango"];
                   rangoTA = ConsultaNiveles[1]["tipoRango"];
                   rangoD = ConsultaNiveles[0]["rango"];
                   rangoTD = ConsultaNiveles[0]["tipoRango"];
                   Antes = rangoA+" "+rangoTA;
                   Despues = rangoD+" "+rangoTD;
                   document.getElementById('antes').innerHTML = Antes;
                   document.getElementById('despues').innerHTML = Despues;
   }).fail(function(){

   }).always(function(){

   }); 
  }



var fechaAsignacionB, id_base_alimentaria, idBase, totalCho, Rangos; 
      $.ajax({
        type: "POST",
        url: url + "/base_alimentaria/consultarBaseAlimentariaPaciente"
      }).done(function(result){
         ConsultaBase = eval('(' + result + ')');
                   count = ConsultaBase.length;
                   for(i= 0; i<=count; i++)
                   {
                   fechaAsignacionB = ConsultaBase[i]["fecha_asignacion"];
                   id_base_alimentaria = ConsultaBase[i]["id_base_alimentaria"];
                   totalCho = ConsultaBase[i]["CHOTT"]; 
                   pintarBaseAlimentaria();  
                   p();
                   }
                 }).fail(function(){

                 }).always(function(){

                 }); 


$('#fechaConsulta').change(function(){
     $("#TablaConsulta").empty();
     
      document.getElementById('ConsultarForm').style.display = "none";
      document.getElementById('ErrorConsulta').style.display = "none";
      var fecha = $("#fechaConsulta").val();
      $.ajax({
        type: "POST",
        url: url + "/base_alimentaria/FiltroBaseAlimentaria",
        data: {"fechaConsulta":fecha}
      }).done(function(result){
        document.getElementById('ErrorConsulta').style.display = "block";
        document.getElementById('ErrorConsulta').innerHTML = "La fecha seleccionada, no tiene asociada una base alimentaria.";
       $("#TablaConsulta").empty();
         filtro = eval('(' + result + ')');
            fecha = filtro[0]["fecha_asignacion"];
             count = filtro.length;
                   for(i= 0; i<=count; i++)
                   {
                     fechaAsignacionB = filtro[i]["fecha_asignacion"];
                     id_base_alimentaria = filtro[i]["id_base_alimentaria"];
                     totalCho = filtro[i]["CHOTT"];
                     pintarBaseAlimentaria();
                   }
                            

                 }).fail(function(){

                 }).always(function(){

                 }); 
  });

                
function pintarBaseAlimentaria(){
    limpiarCampos();
    document.getElementById('ErrorConsulta').style.display = "none";
    var tablaConsulta = document.getElementById('TablaConsulta');
    var rowCount = tablaConsulta.rows.length;
    var row = tablaConsulta.insertRow(rowCount);
    row.id = "tr"+id_base_alimentaria;


    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);

    cell0.innerHTML = fechaAsignacionB;
    cell1.innerHTML = totalCho;
    cell2.innerHTML = "<label class='badge badge-info' onclick='consultarBase(this.id)' id='"+id_base_alimentaria+"'><i class='icon-zoom-in'></i></label>";
  }

 var descripcion, total_choM, CHO;
function consultarBase(id)
{
  document.getElementById('ConsultarForm').style.display = "block";
  document.getElementById('ErrorConsultaMomento').style.display = "none";
  localStorage.baseAlimentaria = id;

  limpiarCampos();
  document.getElementById('form').style.display = 'block';
if ($('#momento').length !== 0) {
  $('#momento').change( function(){
    document.getElementById('ErrorConsultaMomento').style.display = "block";
    document.getElementById('TotalCarbohidratos').innerHTML = "";
    var momento = $("#momento").val();
    var actual = localStorage.baseAlimentaria;
    $.ajax({
      type: "POST",
      url: url + "/base_alimentaria/ConsultaAlimentacionBase",
      data: {"momento": momento, "actual":actual}
  }).done(function(result){
    var p = result;
    actual = "";

    if($('#momento').val() == "Seleccione")
      {
        document.getElementById('ErrorConsultaMomento').style.display = "none";
      }else if(p == "[]")
    {
      document.getElementById('ErrorConsultaMomento').style.display = "block";
    }

    $("#alimentos").empty();
       alimentos = eval('(' + result + ')');
                   count = alimentos.length;
                   for(i= 0; i<=count; i++)
                   {
                   descripcion = alimentos[i]["descripcion"];
                   total_choM = alimentos[i]["total_cho"];
                   CHO = alimentos[i]["CHO"];
                   IG = alimentos[i]["IG"];
                   pintarAlimentos();
                   }

  }).fail(function(){

  }).always(function(){

  });
 });
 }
}

function pintarAlimentos()
{
    document.getElementById('ErrorConsultaMomento').style.display = "none";
    document.getElementById('TotalCarbohidratos').innerHTML = total_choM;
    
    var tablaConsulta = document.getElementById('alimentos');
    var rowCount = tablaConsulta.rows.length;
    var row = tablaConsulta.insertRow(rowCount);
    row.id = "tr"+id_base_alimentaria;


    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);

    cell0.innerHTML = descripcion;
    cell1.innerHTML = CHO;
    cell2.innerHTML = IG;
}

var select = $("#momento").html();
function limpiarCampos()
{
  document.getElementById('momento').innerHTML = select;
  document.getElementById('TotalCarbohidratos').innerHTML = "";
  $("#alimentos").empty();
}

validarMomentoSeguimiento();
function validarMomentoSeguimiento()
{
    document.getElementById('btnGuardarGlucometria').disabled = false;
    document.getElementById('ErrorG').style.display = 'none';
    $('#momento').change(function(){
    document.getElementById('btnGuardarGlucometria').disabled = false;
    document.getElementById('ErrorG').style.display = 'none';
    $('#ErrorG').css("display", "none");
    $('#ErrorG').innerHTML = "";
    var momento = $("#momento").val();
    var fecha = $("#fecha").val();
    $.ajax({
        type: "POST",
        url: url + "/Glucometria/ValidarMomentoSeguimeinto",
        data: {"momento":momento, "fecha":fecha}
    }).done(function(result){
        Valimomento = eval('('+ result +')');
        CountMomento = Valimomento.length;
        if(CountMomento > 0)
        {
            document.getElementById('ErrorG').style.display = 'block';
            document.getElementById('ErrorG').innerHTML = "El momento ya ha sido seleccionado.";
            document.getElementById('btnGuardarGlucometria').disabled = true;
        }else
        {
           document.getElementById('ErrorG').style.display = 'none';
           document.getElementById('btnGuardarGlucometria').disabled = false;
        }
        
        }); 
    });
}