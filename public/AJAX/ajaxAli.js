if($('#btnAddAlimentos').length !== 0){
            $('#btnAddAlimentos').on('click', function(){
                var alimento = $("#txtNombreAlimentos").val();
                var clasificacion = $("#txtClasificacion").val();
                var IndiceGlucemico = $("#txtIndiceGlucemico").val();
                $.ajax({
                    type:"POST",
                    url:url+"/alimentos/RegistrarAlimentos",
                    data: {"txtNombreAlimentos":alimentos, "txtClasificacion":txtClasificacion, "txtIndiceGlucemico": IndiceGlucemico}
                })
                .done(function(result){  
                })
                .fail(function(){
                })
                .always(function(){
                });
            });
}