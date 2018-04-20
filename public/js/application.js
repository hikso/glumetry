$( document ).ready(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }
    
    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }
    limpiar = false;
    $( "#txtCorreo" ).on('input', function() {
        if (limpiar) {
            document.getElementById("error").innerHTML="";
        };
    });
    $( "#txtPassword" ).on('input', function() {
        if (limpiar) {
            document.getElementById("error").innerHTML="";
        };
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

                limpiar = true;

                document.getElementById("error").innerHTML="";

                result = result.split(",");

                $("#error").append(result[0]);

                tipo = result[1];
                if (tipo == 1) {
                    $("#txtCorreo").focus();
                }else{
                    $('#txtPassword').focus();
                };
            }).fail(function(){

            }).always(function(){

            });

        });
    }
    var find = false;
    if ($('#tbnBuscarDocumento').length !==0){
        $('#tbnBuscarDocumento').on('click', function(){
            var documento;
            documento = $('#txtDocumento').val();
            if (documento != "") {
                $.ajax({
                    type: "POST",
                    url: url + "/login/ValidarDocumentoRecuperar",
                    data: {"txtDocumento": documento}
                }).done(function(result){
                        document.getElementById("error").innerHTML="";
                        $('#error').append(result);
                        find = true;                
                }).fail(function(){

                }).always(function(){

                });
            }else{
                document.getElementById("error").innerHTML="";
                $('#error').append('El campo esta vacío.');
            };     
        });

    };
    if ($('#btnRescue').length !==0){
        $('#btnRescue').on('click', function(){
            var documento;
            documento = $('#txtDocumento').val();
            if (documento != "") {
                if (find) {
                    $.ajax({
                        type: "POST",
                        url: url + "/login/recuperarPassword"
                    }).done(function(result){
                            document.getElementById("error").innerHTML="";
                            $('#error').append(result);
                    }).fail(function(){

                    }).always(function(){

                    });
                }else{
                    document.getElementById("error").innerHTML="";
                    $('#error').append('Validar el documento <br> antes de recuperar');   
                };
            }else{
                document.getElementById("error").innerHTML="";
                $('#error').append('El campo esta vacío.');
            };     
        });

    };
    // if ($('button').length !== 0) {

    //     $('button').on('click', function(){
    //         var identificador = $( this ).val();
    //         $.ajax({
    //             type: "POST",
    //             url: url + "/medicos/cargarVistaPaciente",
    //             data: {"identificador": identificador, "arrayPacientes": arrayPacientes}
    //         }).done(function(result){
    //                 document.location.href="medicos/perfilPaciente";
    //         }).fail(function(){

    //         }).always(function(){

    //         });
    //     });
    // }
    if ($('#clasificacion').length !== 0) {

        $('#clasificacion').change( function(){

            var idClasificacion = $( this ).val();
            alert(idAlimento);
            $.ajax({
                type: "POST",
                url: url + "/plato/cargarAlimentos",
                data: {"idClasificacion": idClasificacion}
            }).done(function(result){

                document.getElementById('box1View').innerHTML = result;

            }).fail(function(){

            }).always(function(){

            });
        });
    }
    
    if ($('#seleccionarAlimento').length !== 0) {

        $('#seleccionarAlimento').on('click', function(){

            var idAlimento = $('#box1View option:selected').val();

            $.ajax({
                type: "POST",
                url: url + "/plato/cargarAlimento",
                data: {"idAlimento": idAlimento}
            }).done(function(result){

                document.getElementById('box1View').innerHTML = result;

            }).fail(function(){

            }).always(function(){

            });
        });
    };

    
});
