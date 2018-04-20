// $(document).ready(function() {
            

//         //Login con AJAX
//     if ($('#login').length !== 0) {

//         $('#login').on('click', function(){
//             var correo, password;
//             correo = $('#txtCorreo').val();
//             password = $('#txtPassword').val();

//             $.ajax({
//                 type: "POST",
//                 url: url + "/login/validar",
//                 data: { "txtCorreo": correo, "txtPassword": password }
//             }).done(function(result){
//                 document.getElementById("error").innerHTML="";
//                 console.log(result);
//                 $("#error").append(result);

//             }).fail(function(){

//             }).always(function(){

//             });

//         });
//     }

//     if ($('#clasificacion').length !== 0) {

//         $('#clasificacion').change( function(){

//             var idClasificacion = $( this ).val();

//             $.ajax({
//                 type: "POST",
//                 url: url + "/base_alimentaria/AlimentacionBase",
//                 data: {"idClasificacion": idClasificacion}
//             }).done(function(result){

//                 document.getElementById('box1View').innerHTML = result;

//             }).fail(function(){

//             }).always(function(){

//             });
//         });
//     };

//         if ($('#seleccionarAlimento').length !== 0) {

//         $('#seleccionarAlimento').on('click', function(){

//             var idAlimento = $('#box1View option:selected').val();

//             $.ajax({
//                 type: "POST",
//                 url: url + "/base_alimentaria/AlimentacionBasePaciente",
//                 data: {"idAlimento": idAlimento}
//             }).done(function(result){
//                 document.getElementById('box1View').innerHTML = result;
//             }).fail(function(){

//             }).always(function(){

//             });
//         });
//     };
// });
    
// // funciones JQuery plus ajax para creación de plato
// var nombreAlimento, tamaño_Porcion, unidadMedida, id_clasificacion, peso, proteinas, carbohidratos, indiceGlucemico, id_Alimentos, grasas;

// function seleccionarAlimento()
// {
//     var id_alimento = [];
//     var count = 0;
//     var idAlimento = $('#box1View option:selected').val();
//     $("#ValidNumber").removeAttr("disabled");
//     $("#ValidInteger").removeAttr("disabled");
//     $('input[name=radioTipoConversion]').attr('disabled',false);
//     document.getElementById("Error").innerHTML = "";
//     $.ajax({
//         type: "POST",
//         url: url + "/base_alimentaria/AlimentacionBasePaciente",
//         data: {"idAlimento": idAlimento}
//     }).done(function(result){
//         var alimento = eval('(' + result + ')');
//                // alert(result[1]["alimentos"]);
//                id_Alimentos = alimento[0]["id_alimento"];
//                nombreAlimento = alimento[0]["descripcion"];
//                tamaño_Porcion = alimento[0]["tamaño_porcion"];
//                unidadMedida = alimento[0]["unidad_medida"];
//                id_clasificacion = alimento[0]["clasificacion"];
//                peso = alimento[0]["peso"];
//                carbohidratos = alimento[0]["carbohidratos"];
//                proteinas = alimento[0]["proteinas"];
//                grasas = alimento[0]["grasas"];
//                indiceGlucemico = alimento[0]["indice_Glucemico"];

//                pintarAlimento();
//     }).fail(function(){

//     }).always(function(){

//     });
    
// }

// function pintarAlimento()
// {
//     document.getElementById('proteinas').innerHTML = proteinas;                         
//     document.getElementById('grasas').innerHTML = grasas;                        
//     document.getElementById('cho').innerHTML = carbohidratos;
//     document.getElementById('ig').innerHTML = indiceGlucemico;
//     document.getElementById('alimento').innerHTML = nombreAlimento; 
// }

// $("#gramos").click(function() {  
//         if($("#gramos").is(':checked')) {  
//             document.getElementById('ValidNumber').value = "";
//         }  
//     }); 
//    $("#carbohidratos").click(function() {  
//         if($("#carbohidratos").is(':checked')) {  
//             document.getElementById('ValidNumber').value = "";
//         }  
//     }); 

// var CalcularCarbohidratos = 0;
// var calcularProteinas = 0;
// var CalcularGrasas = 0;
// var alimento = [];
    
// if ($('#ValidNumber').length !==0)
// {
//    $('#ValidNumber').on('input', function()
//    {
//         document.getElementById("Error").innerHTML = "";
//         if(id_Alimentos != null) //Validar existencia alimento Seleccionado
//         {
//           var existe = false;
//           for (var i = alimento.length -1; i >=0; i--)
//           {
//                if(alimento[i] == id_Alimentos)
//                {
//                    existe = true;
//                }
//           }
//             if(!existe)
//               {
//                 opcion = document.getElementsByName('radioTipoConversion');
//                   var seleccionado = false;
//                   for(var i=0; i< opcion.length; i++)
//                   {
//                       if(opcion[i].checked)
//                       {
//                           seleccionado = true;
//                       }
//                   } 
//                   var textBox = ($("#ValidNumber").val());
//                   if(!seleccionado){
//                         document.getElementById("Error").innerHTML = "No seleccionado CHO/Gramos";
//                     }else
//                     {
//                       if ($('#gramos').is(':checked'))
//                       {
//                         document.getElementById('ValidInteger').value = "";
//                         if(parseInt(textBox) > 0  && parseInt(textBox) <= 999)
//                           {
//                               calcularProteinas = (($("#ValidNumber").val()) * proteinas) / peso;
//                               CalcularCarbohidratos = (($("#ValidNumber").val()) * carbohidratos) /peso;
//                               CalcularGrasas = (($("#ValidNumber").val()) * grasas) /peso;

//                               document.getElementById('proteinas').innerHTML = Math.round(calcularProteinas);                       
//                               document.getElementById('grasas').innerHTML = Math.round(CalcularGrasas);                        
//                               document.getElementById('cho').innerHTML = Math.round(CalcularCarbohidratos);
//                           }else   
//                               {
//                                   document.getElementById('Error').innerHTML = "El valor ingresado debe ser mayor a 0 y menor de 999";
//                               }    
//                       }else if ($('#carbohidratos').is(':checked'))
//                       {
//                         document.getElementById('ValidInteger').value = "";
//                           if(parseInt(textBox) > 0  && parseInt(textBox) <= 999)
//                           {
//                               calcularProteinas = (($("#ValidNumber").val()) * proteinas) / carbohidratos;
//                               CalcularCarbohidratos = (($("#ValidNumber").val()) * carbohidratos) /carbohidratos;
//                               CalcularGrasas = (($("#ValidNumber").val()) * grasas) /carbohidratos;

//                               document.getElementById('proteinas').innerHTML = Math.round(calcularProteinas);                       
//                               document.getElementById('grasas').innerHTML = Math.round(CalcularGrasas);                        
//                               document.getElementById('cho').innerHTML = Math.round(CalcularCarbohidratos);
//                           }else   
//                               {
//                                   document.getElementById('Error').innerHTML = "El valor ingresado debe ser mayor a 0 y menor de 999";
//                               }
//                       }
//                     }
//               }
//         }else
//         {
//            document.getElementById('Error').innerHTML = "No hay Alimentos seleccionado";
//         }
//    });
// };    

// var alimento = [];
// var Agregar = 0;
// var TotalCHO = 0;
// var TotalProteinas = 0;
// var TotalCarbobohidratos = 0;
// var TotalGrasas = 0;

// if ($('#btnAgregar').length !==0)
// {
//     $('#btnAgregar').on('click', function(){
//             if(id_Alimentos != null){
//               if(document.getElementById('ValidNumber').value != "")
//                 {
//                 if (document.getElementById('ValidInteger').value != "")
//                  {                            
//                     var text = ($('#ValidInteger').val());
//                   if(parseInt(text) > 0 && parseInt(text) <=99)
//                     { 
//                         if(id_Alimentos != null){
//                         var existe = false;
//                         for (var i = alimento.length -1; i >=0; i--)
//                         {
//                             if(alimento[i] == id_Alimentos)
//                             {
//                                 existe = true;
//                             }
//                         };  
//                             if(!existe)
//                             {
//                                 TotalProteinas = calcularProteinas * $('#ValidInteger').val();
//                                 TotalGrasas = CalcularGrasas * $('#ValidInteger').val();
//                                 TotalCarbobohidratos = CalcularCarbohidratos * $('#ValidInteger').val();

//                                 var table = document.getElementById('tblAlimentos');
//                                 var unidadesAlimento = ($('#ValidInteger').val());
//                                 var rowCount = table.rows.length;
//                                 var row = table.insertRow(rowCount);
//                                 var cell0 = row.insertCell(0);
//                                 var cell1 = row.insertCell(1);
//                                 var cell2 = row.insertCell(2);
//                                 var cell3 = row.insertCell(3);
//                                 var cell4 = row.insertCell(4);
//                                 var cell5 = row.insertCell(5);
//                                 var cell6 = row.insertCell(6);
//                                 var cell7 = row.insertCell(7);
//                                 var cell8 = row.insertCell(8);

//                                  cell0.innerHTML = unidadesAlimento;
//                                  cell1.innerHTML = nombreAlimento;
//                                  cell2.innerHTML = tamaño_Porcion;
//                                  cell3.innerHTML = peso;
//                                  cell4.innerHTML = unidadMedida;
//                                  cell5.innerHTML = Math.round(TotalCarbobohidratos);
//                                  cell6.innerHTML = Math.round(TotalProteinas);
//                                  cell7.innerHTML = Math.round(TotalGrasas);
//                                  cell8.innerHTML = indiceGlucemico;

//                                  alimento.push(id_Alimentos);
//                                  TotalCHO = parseFloat(TotalCHO) + parseFloat(TotalCarbobohidratos);
//                                  document.getElementById('lbltotalCarbohidratos').innerHTML = TotalCHO;
//                                  limpiarCampos();
//                             } else
//                            {
//                              document.getElementById('Error').innerHTML = "El alimento ya fue agregado";
//                              limpiarCampos();
//                            }
//                     }else
//                     {
//                       document.getElementById('Error').innerHTML = "No hay alimento seleccionado";
//                     }
//              }else
//              {
//                 document.getElementById('Error').innerHTML = "Unidades deben ser mayor a 0 y menor a 99";
//              } 
//             }else
//             {
//                document.getElementById('Error').innerHTML = "No ha ingresado unidades  de alimento";
//             }  
//             }
//             }         
//         });
//     };

//     function limpiarCampos()
//     {
//         document.getElementById('ValidNumber').value = "";
//         document.getElementById('ValidInteger').value = "";
//         document.getElementById('proteinas').innerHTML = 0;                       
//         document.getElementById('grasas').innerHTML = 0;                        
//         document.getElementById('cho').innerHTML = 0;  
//         document.getElementById('ig').innerHTML = 0; 
//         document.getElementById('alimento').innerHTML = "Selecciona el alimento"; 
//         $("#ValidNumber").attr('disabled', 'disabled');
//         $("#ValidInteger").attr('disabled', 'disabled');
//         $('input[name=radioTipoConversion]').attr('disabled',true);
//         $('input[name=radioTipoConversion]').attr('checked',false);
//         document.getElementById('Error').innerHTML = "";
//     }

//      //Regoger elementos dependiendo el atributo
//     function getAllElementsWithAttribute(attribute)
//     {
//       var matchingElements = [];
//       var allElements = document.getElementsByTagName('*');
//       for (var i = 0, n = allElements.length; i < n; i++)
//       {
//         if (allElements[i].getAttribute(attribute) !== null)
//         {
//           // Element exists with attribute. Add to array.
//           matchingElements.push(allElements[i]);
//       }
//   }
//   return matchingElements;
// }

//     function camposVacios(elementos)
//     {
//         vacios = [];
//         if (tipoUsuario == 1) {
//             for (var i = elementos.length - 1; i >= 0; i--) {
//                 if ($( "#"+elementos[i].id).parent("div").parent(".control-group").attr('name') != "inputMedico") {
//                     valor = elementos[i].value;
//                     if( valor == ""){
//                         vacios.push(elementos[i].id);
//                     };
//                 };
//             };
//         }else
//         {
//             for (var i = elementos.length - 1; i >= 0; i--) {
//                 if ($( "#"+elementos[i].id).parent("div").parent(".control-group").attr('name') != "inputPaciente") {
//                     valor = elementos[i].value;
//                     if( valor == ""){
//                         vacios.push(elementos[i].id);
//                     };
//                 };
//             };
//         };
//         return vacios;
//     }

      
//       var f=new Date();
//       cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds(); 
//       window.status =cad;
//       if(f.getHours() >= 12 && f.getHours() <=16)
//       {
//         $("#momento option[value=2]").attr("selected",true);
//       }else if(f.getHours() > 16 )
//       {
//          $("#momento option[value=2]").attr("selected",true);
//       }else if(f.getHours() > 6 )
//       {
//         $("#momento option[value=1]").attr("selected",true);
//       }
      

//   if($('#btnGuardarGlucometria').length !== 0)
//   {
//     $('#btnGuardarGlucometria').on('click', function(){
//         var fecha = $("#fecha").val();
//         var antes = $("#inputAntes").val();
//         var observaciones = $("#txtComentario").val();
//         var momento = $("#Cbmomento").val();
//         var idFicha = $("#id").val();
//         $.ajax({
//             type: "POST",
//             url: url+"Glucometria/RegistrarGlucometria",
//             data: {"fecha": fecha, "inputAntes": antes, "txtComentario":observaciones, "Cbmomento":momento, "id":idFicha}
//         })
//         .done(function(result){
//           alert(result);
//         })
//         .fail(function(){

//         })
//         .always(function(){

//         });
//   });
// }

