var panel = 0;
    var n;
  
    function Setpanel (n)
    {
        panel = n;
    }
    
   $(document).ready(function() {
         //Begin Update Genero
        //Begin Funciones Consultar
        // ConsultaTipoDoc2();
        // alert("Existe Ajax Datos");
        // Focus();
        // ConsultarEstadoCivil();
        // ConsultarEspcia();
        // CosultarEscolaridad();
        // // ConsultarFrecuencia();
        // // CosultarEscolaridad();
        // // CosultarTipoMedida();
        // // ConsultarMunicipios();
        // ConsultarDepartamentos();
        // // ConsultarTipoAntecedente();
        // // ConsultarGenero2();
        
        //End Funciones Consultar

        //Registro clasificación

        if ($('#btnGuardarClasificacion').length !== 0) {
            $('#btnGuardarClasificacion').on('click', function(){
            if (document.getElementById('txtclasificacion').value != ""){
            var clasificacion = $("#txtclasificacion").val();
            $.ajax({
                type: "POST",
                url: url+"/clasificacion/RegistrarClasificacion",
                data: {"txtclasificacion": clasificacion}
            })
            .done(function(result) {
               document.getElementById('result').innerHTML = result;               
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        }else
        {
           document.getElementById('result').innerHTML = "No ha ingresado clasificación"; 
        }
        });
        } 

        //Registro estado civil

         if ($('#btnGuardarEstadoCivil').length !== 0) {
            $('#btnGuardarEstadoCivil').on('click', function(){
            if (document.getElementById('txtEstadoCivil').value != ""){
            var descripcion = $("#txtEstadoCivil").val();
            var EstEstCivil = $("#SelectEstadoEstCiv").val();
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarEstadoCivil",
                    data: {"txtEstadoCivil":descripcion,"SelectEstadoEstCiv":EstEstCivil}
                })
                .done(function(result){  
                    document.getElementById('result').innerHTML = result;
                    ConsulgtarEstadoCivil2();
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado estado civil";
            }
        });
        }
        
        if ($('#btnUdpEstadoCivil').length !== 0) {
            $('#btnUdpEstadoCivil').on('click', function(){
                $("#btnGuardarEstadoCivil").css("display", "inline");
                $("#btnUdpEstadoCivil").css("display", "none");
            if (document.getElementById('txtEstadoCivil').value != ""){
                var id_ECivil = $("#txtIDEstadoCivil").val();
                var descripcionEC = $("#txtEstadoCivil").val();
                var estadoEstCiv = $("#SelectEstadoEstCiv").val();
                                
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarEstadoCivil",
                data: {"txtIDEstadoCivil": id_ECivil,"txtEstadoCivil": descripcionEC,"SelectEstadoEstCiv":estadoEstCiv}
            })
            .done(function(result){
                alert(result);
                document.getElementById('SelectEstadoEstCiv').value = 0;
                document.getElementById('txtEstadoCivil').value = "";
                $("#EstadoEstadoCiv").css("display", "none");
                ConsulgtarEstadoCivil2();
            })
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });}else
            {
                document.getElementById('result').innerHTML = "No ha ingresado Estado Civil";                
            }
        });
        }
        //Registro genero
        
        if ($('#btnGuardarGenero').length !== 0) {
            $('#btnGuardarGenero').on('click', function(){
            if (document.getElementById('txtGenero').value != ""){
              var descripcionG = $("#txtGenero").val();
              var estado = $("#SelectEstadoGenero").val();

              if(descripcionG.length < 45){
                $.ajax({
                    type: "POST",
                    url: url+"/Datos/RegistrarGenero",
                    data: { "txtGenero": descripcionG,"SelectEstadoGenero": estado}
                })
                .done(function(result) {
                    document.getElementById('result').innerHTML = result;                       
                    document.getElementById('txtGenero').innerHTML = "";
                    ConsultarGenero();
                })
                .fail(function(){
                })
                .always(function() {
                        // this will ALWAYS be executed, regardless if the ajax-call was success or not
                    });
            }else
            {
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";                
            }
            }else{
            document.getElementById('result').innerHTML = "No ha ingresado genero";
            }
            
        });
        }
        if ($('#btnActualizarGenero').length !== 0) {
            $('#btnActualizarGenero').on('click', function(){
                $("#btnGuardarGenero").css("display", "inline");
                $("#btnActualizarGenero").css("display", "none");
            if (document.getElementById('txtGenero').value != ""){
                var id_generoo = $("#txtid").val();
                var descripcionn = $("#txtGenero").val();
                var estado = $("#SelectEstadoGenero").val();
                if (descripcionn.length < 45){
                                
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarGenero",
                data: {"txtid": id_generoo,"txtGenero": descripcionn,"SelectEstadoGenero":estado}
            })
            .done(function(result) {
                alert(result);
                document.getElementById('SelectEstadoGenero').value = 0;
                document.getElementById('txtGenero').value = "";
                $("#EstadoG").css("display", "none");
                ConsultarGenero();
            }).fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado genero";                
            }
        });
        }


        //Registro tipo documento

        if ($('#btnGuardarTipoDoc').length !== 0) {
            $('#btnGuardarTipoDoc').on('click', function(){
            if (document.getElementById('txtTipoDocumento').value != ""){
                var descripcion = $("#txtTipoDocumento").val();
                var estado = $("#SelectEstadoTD").val();
                if(descripcion.length < 45){
                $.ajax({
                type:"POST",
                url:url+"/Datos/RegistrarTipoDocumento",
                data: {"txtTipoDocumento":descripcion,"SelectEstadoTD":estado}
                })
                .done(function(result){                                    
                    document.getElementById('result').innerHTML = result;
                    ConsultarTD();
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo documento";
            }
            // ConsultarTD();
        });
        }
        if ($('#btnActualizarTipoDoc').length !== 0) {
            $('#btnActualizarTipoDoc').on('click', function(){               
                $("#btnActualizarTipoDoc").css("display", "none");
                $("#btnGuardarTipoDoc").css("display", "inline");
            if (document.getElementById('txtTipoDocumento').value != ""){
                var id_TipoDocumento = $("#txtidTD").val();
                var descripcionTD = $("#txtTipoDocumento").val();
                var EstadoTD = $("#SelectEstadoTD").val();
                if(descripcionTD.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarTipoDocumento",
                data: {"txtidTD": id_TipoDocumento,"txtTipoDocumento": descripcionTD, "SelectEstadoTD":EstadoTD}
            })
            .done(function(result) {
                alert(result);
                ConsultarTD();
                document.getElementById('SelectEstadoTD').value = 0;
                document.getElementById('txtTipoDocumento').value = "";
                $("#EstadoTD").css("display", "none");
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado genero";
            }
        });
        }

        //Registro metodos planificación

        
        //Registro habitos personales

        if ($('#btnGuardarHabitosPersonale').length !== 0) {
            $('#btnGuardarHabitosPersonale').on('click', function(){
            if (document.getElementById('txtHabitosPersonales').value != ""){
              var descripcion = $("#txtHabitosPersonales").val();
              var EstHabPer = $("#SelectEstadoHabitosPer").val();
                if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarHabitosPersonales",
                    data: {"txtHabitosPersonales":descripcion,"SelectEstadoHabitosPer":EstHabPer}

                })
                .done(function(result){
                    document.getElementById('result').innerHTML = result;
                    ConsultarHabitosPersonal();
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado Habitos Personales";
            }
        });
        }

        if ($('#btnUdpHabitosPersonale').length !== 0) {            
            $('#btnUdpHabitosPersonale').on('click', function(){
                $("#btnUdpHabitosPersonale").css("display", "none");
                $("#btnGuardarHabitosPersonale").css("display", "inline");
            if (document.getElementById('txtHabitosPersonales').value != ""){
                var id_habPer = $("#txtIdHabPers").val();
                var HabitosPersonales = $("#txtHabitosPersonales").val();
                var EstadoHabitoPersonal = $("#SelectEstadoHabitosPer").val();
                if(HabitosPersonales.length < 45){
                                
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarHabitosPersonales",
                data: {"txtIdHabPers": id_habPer,"txtHabitosPersonales": HabitosPersonales,"SelectEstadoHabitosPer":EstadoHabitoPersonal}
            })
            .done(function(result) {
                alert(result);
                document.getElementById('SelectEstadoHabitosPer').value = 0;
                document.getElementById('txtHabitosPersonales').value = "";
                $("#EstadoHabitosPer").css("display", "none");
                ConsultarHabitosPersonal();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
             }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado Habitos Personales";
            }
        });
        }
        //Registro frecuencia

          if ($('#btnGuardarFrecuencia').length !== 0) {
            $('#btnGuardarFrecuencia').on('click', function(){
            if (document.getElementById('txtFrecuencia').value != ""){
            if (document.getElementById('HabitoPersonal').value != "Seleccionar"){
             var DescriFrecuencia = $("#txtFrecuencia").val();
             var id_HabitoPerso = $("#HabitoPersonal").val();
             var EstFrecuencia = $("#SelectEstadoFrecuencia").val();
             if(DescriFrecuencia.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarFrecuencia",
                    data: {"txtFrecuencia":DescriFrecuencia, "HabitoPersonal":id_HabitoPerso,"SelectEstadoFrecuencia":EstFrecuencia}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha seleccionado habitopersonal";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado frecuencia";
            }
        });
        }

        if ($('#btnUdpFrecuencia').length !== 0) {
            $('#btnUdpFrecuencia').on('click', function(){
                $("#btnGuardarFrecuencia").css("display", "inline");
                $("#btnUdpFrecuencia").css("display", "none");
            if (document.getElementById('HabitoPersonal').value != "Seleccionar"){
            if (document.getElementById('txtFrecuencia').value != ""){
                var id_Frecu = $("#txtIdFrecuencia").val();
                var DescripFrecuencia = $("#txtFrecuencia").val();
                var id_habitoPerso = $("#HabitoPersonal").val();
                var EstFrecu = $("#SelectEstadoFrecuencia").val();
                if(DescripFrecuencia.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarFrecuencia",
                data: {"txtIdFrecuencia": id_Frecu,"txtFrecuencia": DescripFrecuencia,"HabitoPersonal":id_habitoPerso,"SelectEstadoFrecuencia":EstFrecu}
            })
            .done(function(result){
                document.getElementById('SelectEstadoFrecuencia').value = 0;
                document.getElementById('txtFrecuencia').value = "";
                document.getElementById('HabitoPersonal').value = 0;
                $("#EstadoFrecuencia").css("display", "none");
                alert(result);
                
            })
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
            }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado frecuencia";
            }
        }else{
            document.getElementById('result').innerHTML = "No ha seleccionado habito personal";
        }
        });
        }
        //Registro escolaridad

         if ($('#btnGuardarEscolaridad').length !== 0) {
            $('#btnGuardarEscolaridad').on('click', function(){
            if (document.getElementById('txtEscolaridad').value != ""){
             var descripcionE = $("#txtEscolaridad").val();
             var EStdEscol = $("#txtEscolaridad").val();
             if(descripcionE.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarEscolaridad",
                    data: {"txtEscolaridad":descripcionE,"SelectEstadoEscolaridad":EStdEscol}

                })
                .done(function(result){  
                    document.getElementById('result').innerHTML = result;
                    ConsultarEscolaridadesRegis();
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado escolaridad";
            }
        });
        }
        if ($('#btnUdpEscolaridad').length !== 0) {            
            $('#btnUdpEscolaridad').on('click', function(){
                $("#btnUdpEscolaridad").css("display", "none");
                $("#btnGuardarEscolaridad").css("display", "inline");
            if (document.getElementById('txtEscolaridad').value != ""){
                var _id_Escolaridad = $("#txtIdEcolaridad").val();
                var Escolaridad = $("#txtEscolaridad").val();
                var EstEscolaridad = $("#SelectEstadoEscolaridad").val();
                if(Escolaridad.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarEscolaridad",
                data: {"txtIdEcolaridad": _id_Escolaridad,"txtEscolaridad": Escolaridad,"SelectEstadoEscolaridad":EstEscolaridad}
            })
            .done(function(result) {
                alert(result);
                document.getElementById('SelectEstadoEscolaridad').value = 0;
                document.getElementById('txtEscolaridad').value = "";
                $("#EstadoEscolaridad").css("display", "none");
                ConsultarEscolaridadesRegis();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the aj ax-call was success or not
                });
            }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado escolaridad";
            }
        });
        }
        //Registro tipo medida

         if ($('#btnGuardarTipoMedida').length !== 0) {
            $('#btnGuardarTipoMedida').on('click', function(){
            if (document.getElementById('txtTipoMedida').value != ""){
             var descripcion = $("#txtTipoMedida").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarTipoMedida",
                    data: {"txtTipoMedida":descripcion}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                    ConsultarTipoMedida2();
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo medida";
            }
        });
        }
        if ($('#btnUdpTipoMedida').length !== 0) {            
            $('#btnUdpTipoMedida').on('click', function(){
                $("#btnUdpTipoMedida").css("display", "none");
                $("#btnGuardarTipoMedida").css("display", "inline");
            if (document.getElementById('txtTipoMedida').value != ""){
                var id_TipMed = $("#txtIdTipoMedida").val();
                var TipoMedida = $("#txtTipoMedida").val();
                if(TipoMedida.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarTipoMedida",
                data: {"txtIdTipoMedida": id_TipMed,"txtTipoMedida": TipoMedida}
            })
            .done(function(result) {
                alert(result);
                ConsultarTipoMedida2();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the aj ax-call was success or not
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo medida";
            }
        });
        }
        //Registro municipio

          if ($('#btnGuardarMunicipio').length !== 0) {
            $('#btnGuardarMunicipio').on('click', function(){
            if (document.getElementById('txtMunicipio').value != ""){
            if (document.getElementById('departamentoM').value != "Seleccionar"){
             var descripcion = $("#txtMunicipio").val();
             var id_departamento = $("#departamentoM").val();
             var ESTMunicipio = $("#SelectEstadoMunicipio").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarMunicipio",
                    data: {"txtMunicipio":descripcion, "departamentoM":id_departamento,"SelectEstadoMunicipio":ESTMunicipio}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                    ConsultarMunicipios2();
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha seleccionado departamento";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado municipio";
            }
        });
        }

        if ($('#btnUdpMunicipio').length !== 0) {
            $('#btnUdpMunicipio').on('click', function(){
                $("#btnGuardarMunicipio").css("display", "inline");
                $("#btnUdpMunicipio").css("display", "none");
            if (document.getElementById('departamentoM').value != "Seleccionar"){
            if (document.getElementById('txtMunicipio').value != ""){
                var id_Muni = $("#txtIdMunicipio").val();
                var MunicipioDescr = $("#txtMunicipio").val();
                var id_Departa = $("#departamentoM").val();
                var EstadoMuni = $("#SelectEstadoMunicipio").val();
                if(MunicipioDescr.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarMunicipio",
                data: {"txtIdMunicipio": id_Muni,"txtMunicipio": MunicipioDescr,"departamentoM":id_Departa,"SelectEstadoMunicipio":EstadoMuni}
            })
            .done(function(result){
                alert(result);
                document.getElementById('SelectEstadoMunicipio').value = 0;
                document.getElementById('txtMunicipio').value = "";
                $("#EstadoMunicipio").css("display", "none");
                ConsultarMunicipios2();
            })
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
            }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado Municipio";                
            }
        }else{
            document.getElementById('result').innerHTML = "No ha seleccionado departamento";
        }
        });
        }

        //Registro departamento

          if ($('#btnGuardarDepartmento').length !== 0) {
            $('#btnGuardarDepartmento').on('click', function(){
            if (document.getElementById('txtDepartamento').value != ""){
             var descripcion = $("#txtDepartamento").val();
             var EstDepartamento = $("#SelectEstadoDepartament").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarDepartamento",
                    data: {"txtDepartamento":descripcion,"SelectEstadoDepartament":EstDepartamento}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                    ConsultarDepartamento2();
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado departamento";
            }
        });
        }
        if ($('#btnUdpDepartmento').length !== 0) {            
            $('#btnUdpDepartmento').on('click', function(){
                $("#btnUdpDepartmento").css("display", "none");
                $("#btnGuardarDepartmento").css("display", "inline");
            if (document.getElementById('txtDepartamento').value != ""){
                var id_Departamento = $("#txtIdDepar").val();
                var Departamento = $("#txtDepartamento").val();
                var EstDepartamento = $("#SelectEstadoDepartament").val();
                if(Departamento.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarDepartamento",
                data: {"txtIdDepar": id_Departamento,"txtDepartamento": Departamento,"SelectEstadoDepartament":EstDepartamento}
            })
            .done(function(result) {
                alert(result);
                document.getElementById('SelectEstadoDepartament').value = 0;
                document.getElementById('txtDepartamento').value = "";
                $("#EstadoDepartament").css("display", "none");

                ConsultarDepartamento2();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the aj ax-call was success or not
                });
                }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                    }
            }else
                {
                    document.getElementById('result').innerHTML = "No ha ingresado  departamento";
                }
        });
        }
        //Registro tipo antecedente

        if ($('#btnGuardarTipoAntecedente').length !== 0) {
            $('#btnGuardarTipoAntecedente').on('click', function(){
            if (document.getElementById('txtTipoAntecedente').value != ""){
             var descripcion = $("#txtTipoAntecedente").val();
             var EstadotipoAntecedente = $("#SelectEstadoTipoAntecedente").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarTipoAntecedente",
                    data: {"txtTipoAntecedente":descripcion,"SelectEstadoTipoAntecedente":EstadotipoAntecedente}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                    ConsultarTipoAntecedente2();
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo antecedente";
            }
        });
        }

        if ($('#btnAdpTipoAntecedente').length !== 0) {            
            $('#btnAdpTipoAntecedente').on('click', function(){
                $("#btnAdpTipoAntecedente").css("display", "none");
                $("#btnGuardarTipoAntecedente").css("display", "inline");
                if (document.getElementById('txtTipoAntecedente').value != ""){
                var id_tipAnt = $("#txtIdTipoAntec").val();
                var tipoAnte = $("#txtTipoAntecedente").val();
                var EsttipoAnte = $("#SelectEstadoTipoAntecedente").val();
                if(tipoAnte.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarTipAnt",
                data: {"txtIdTipoAntec": id_tipAnt,"txtTipoAntecedente": tipoAnte,"SelectEstadoTipoAntecedente":EsttipoAnte}
            })
            .done(function(result) {
                document.getElementById('SelectEstadoTipoAntecedente').value = 0;
                document.getElementById('TipoAntecedenteSelect').value = 0;
                document.getElementById('txtTipoAntecedente').value = "";
                $("#EstadoTipoAntecedente").css("display", "none");
                alert(result);
                ConsultarTipoAntecedente2();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the aj ax-call was success or not
                });
            }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo antecedente ";
            }
        });
        }
        
        //Registro distribucion antecedente

        if ($('#btnGuardarDistribucionAntecendete').length !== 0) {
            $('#btnGuardarDistribucionAntecendete').on('click', function(){
            if (document.getElementById('txtDistribucionAntecedentes').value != ""){
            if (document.getElementById('TipoAntecedenteSelect').value != "Seleccionar"){
             var DistribucionAntecedente = $("#txtDistribucionAntecedentes").val();
             var id_TipoAntecedente = $("#TipoAntecedenteSelect").val();
             var EstDistribucionAntecedente = $("#SelectEstadoDistriAnteceden").val();
             if(DistribucionAntecedente.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarDistribucionAntecedente",
                    data: {"txtDistribucionAntecedentes":DistribucionAntecedente, "TipoAntecedenteSelect":id_TipoAntecedente,"SelectEstadoDistriAnteceden":EstDistribucionAntecedente}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha seleccionado tipo de antecedente";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado distribucion de antecedete";
            }
        });
        }

        if ($('#btnAdpAntecendete').length !== 0) {
            $('#btnAdpAntecendete').on('click', function(){
                $("#btnAdpAntecendete").css("display", "none");
                $("#btnGuardarDistribucionAntecendete").css("display", "inline");
            if (document.getElementById('TipoAntecedenteSelect').value != "Seleccionar"){
            if (document.getElementById('txtDistribucionAntecedentes').value != ""){
                var id_clasificacionAntecedenteC = $("#txtIdDistribuAntece").val();
                var DistribucionAnt = $("#txtDistribucionAntecedentes").val();
                var id_Tip_Ant = $("#TipoAntecedenteSelect").val();
                var EstadoAntecedente = $("#SelectEstadoDistriAnteceden").val();
                if(DistribucionAnt.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarDistribucionAntecedente",
                data: {"txtIdDistribuAntece": id_clasificacionAntecedenteC,"txtDistribucionAntecedentes": DistribucionAnt,"TipoAntecedenteSelect":id_Tip_Ant,"SelectEstadoDistriAnteceden":EstadoAntecedente}
            })
            .done(function(result){
                document.getElementById('SelectEstadoDistriAnteceden').value = 0;
                document.getElementById('txtDistribucionAntecedentes').value = "";
                $("#EstadoDistriAnteceden").css("display", "none");
                alert(result);})
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado distribución antecedente";
            }
        }else{
            document.getElementById('result').innerHTML = "No ha seleccionado tipo antecedente";
        }
        });
        }
         
        //Registro Especializacion

        if ($('#btnGuardarEspecializacion').length !== 0) {
            $('#btnGuardarEspecializacion').on('click', function(){
            if (document.getElementById('txtEspecializacion').value != ""){
             var descripcion = $("#txtEspecializacion").val();
             var EstEspcializacion = $("#SelectEstadoEspciliza").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarEspecializacion",
                    data: {"txtEspecializacion":descripcion,"SelectEstadoEspciliza":EstEspcializacion}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                    ConsultarEspecializacion();
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado especializacion";
            }
        });
        }
        
        if ($('#btnUdpEspecializacion').length !== 0) {
            $('#btnUdpEspecializacion').on('click', function(){
                $("#btnUdpEspecializacion").css("display", "none");
                $("#btnGuardarEspecializacion").css("display", "inline");
            if (document.getElementById('txtEspecializacion').value != ""){
                var id_Espc = $("#txtIdEspecializacion").val();
                var EspacializacionDescr = $("#txtEspecializacion").val();
                var EstadoEspcializacion = $("#SelectEstadoEspciliza").val();
                if(EspacializacionDescr.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarEspecialiazacion",
                data: {"txtIdEspecializacion": id_Espc,"txtEspecializacion": EspacializacionDescr,"SelectEstadoEspciliza":EstadoEspcializacion}
            })
            .done(function(result) {
                alert(result);
                document.getElementById('SelectEstadoEspciliza').value = 0;
                document.getElementById('txtEspecializacion').value = "";
                $("#EstadoEspecializa").css("display", "none");
                ConsultarEspecializacion();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the aj ax-call was success or not
                });                
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado  especialización";
            }
        });
        }

        //Registro partes cuerpo

        if ($('#btnGuardarPartesCuerpo').length !== 0) {
            $('#btnGuardarPartesCuerpo').on('click', function(){ 
            if (document.getElementById('txtPartesCuerpo').value != ""){
             var descripcion = $("#txtPartesCuerpo").val();
             var EstPartesCuerpo = $("#SelectEstadoParsCuerpo").val();
                if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarPartesCuerpo",
                    data: {"txtPartesCuerpo":descripcion,"SelectEstadoParsCuerpo":EstPartesCuerpo}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                    ConsultarPartesDelCuerpo();
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado partes del cuerpo";
            }
        });
        }
    
        if ($('#btnUdpPartesCuerpo').length !== 0) {            
            $('#btnUdpPartesCuerpo').on('click', function(){
                $("#btnUdpPartesCuerpo").css("display", "none");
                $("#btnGuardarPartesCuerpo").css("display", "inline");
            if (document.getElementById('txtPartesCuerpo').value != ""){
                var id_ParteCuer = $("#txtIdParteCuerpo").val();
                var ParteCuerpo = $("#txtPartesCuerpo").val();
                var EstadoPC = $("#SelectEstadoParsCuerpo").val();

                if(ParteCuerpo.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarPartesCuerpo",
                data: {"txtIdParteCuerpo": id_ParteCuer,"txtPartesCuerpo": ParteCuerpo,"SelectEstadoParsCuerpo":EstadoPC}
            })
            .done(function(result) {
                document.getElementById('SelectEstadoParsCuerpo').value = 0;
                document.getElementById('txtPartesCuerpo').value = "";
                $("#EstadoParsCuerpo").css("display", "none");
                alert(result);
                ConsultarPartesDelCuerpo();
            })
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the aj ax-call was success or not
                });
                }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado  parte del cuerpo";
            }
        });
        }
         //Registro estado parto
         

         //Registro aparato sistema

        if ($('#btnGuardarAparatoSistema').length !== 0) {
            $('#btnGuardarAparatoSistema').on('click', function(){
                if (document.getElementById('txtAparatoSistema').value != ""){
                    if (document.getElementById('TextAreaDescripcionAparato').value != ""){
                    var descripcionAP = $("#TextAreaDescripcionAparato").val();
                    var Nombre = $('#txtAparatoSistema').val();
                    var EstApSis = $('#SelectEstadoAparaSistema').val();
                    if(Nombre.length < 45){
                        if(descripcionAP.length < 4000){
                            $.ajax({
                                type:"POST",
                                url:url+"/Datos/RegistrarAparatoSistema",
                                data: {"TextAreaDescripcionAparato":descripcionAP, "txtAparatoSistema":Nombre,"SelectEstadoAparaSistema":EstApSis}

                            })
                            .done(function(result){ 
                                document.getElementById('result').innerHTML = result; 
                            })
                            .fail(function(){
                            })
                            .always(function(){
                            });
                        }else{
                            document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos en la descripción del aparato";
                        }
                    }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos en el nombre del aparato sistema";
                    }
                }else{
                    document.getElementById('result').innerHTML = "No ingreso una descripción para aparato sistema";
                }
            }else{
                document.getElementById('result').innerHTML = "No ha ingresado aparato sistema";
            }
        });
        }
        
        if ($('#btnUpdAparatoSistema').length !== 0) {
            $('#btnUpdAparatoSistema').on('click', function(){
                $("#btnGuardarAparatoSistema").css("display", "inline");
                $("#btnUpdAparatoSistema").css("display", "none");
            if (document.getElementById('txtAparatoSistema').value != ""){
                if(document.getElementById('TextAreaDescripcionAparato').value != ""){
                var id_AparatSiste = $("#txtIdApaSis").val();
                var AparatoSist = $("#txtAparatoSistema").val();
                var DescripAS = $("#TextAreaDescripcionAparato").val();
                var EstadoAS = $("#SelectEstadoAparaSistema").val();
                if(AparatoSist.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarAparatoSistema",
                data: {"txtIdApaSis": id_AparatSiste,"txtAparatoSistema": AparatoSist, "TextAreaDescripcionAparato":DescripAS,"SelectEstadoAparaSistema":EstadoAS}
            })
            .done(function(result) {
                document.getElementById('SelectEstadoAparaSistema').value = 0;
                document.getElementById('txtAparatoSistema').value = "";
                $("#EstadoAparaSistema").css("display", "none");
                alert(result);})
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos para descripción de aparato sistema";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado aparato sistema";
            }
        });
        }
        
         //Registro Tipo dosificacion

        if ($('#btnGuardarTipoDosificacion').length !== 0) {
            $('#btnGuardarTipoDosificacion').on('click', function(){ 
            if (document.getElementById('txtTipoDosificacion').value != ""){
             var descripcion = $("#txtTipoDosificacion").val();
            if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarTipoDosificacion",
                    data: {"txtTipoDosificacion":descripcion}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo dosificacion";
            }
        });
        }
        if ($('#btnUpdTipoDosificacion').length !== 0) {
            $('#btnUpdTipoDosificacion').on('click', function(){
                $("#btnGuardarTipoDosificacion").css("display", "inline");
                $("#btnUpdTipoDosificacion").css("display", "none");
            if (document.getElementById('txtTipoDosificacion').value != ""){
                var id_TipoDosificacion = $("#txtIdTipoDosificacion").val();
                var TipoDosificacion = $("#txtTipoDosificacion").val();
                if(TipoDosificacion.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarTipoDosificacion",
                data: {"txtIdTipoDosificacion": id_TipoDosificacion,"txtTipoDosificacion": TipoDosificacion}
            })
            .done(function(result) {
                alert(result);})
            .fail(function() {
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado Tipo dosificacion";
            }
        });
        }
        //Registro distribucion partes cuerpo

        if ($('#btnGuardarDistribucionPartesCuerpo').length !== 0) {
            $('#btnGuardarDistribucionPartesCuerpo').on('click', function(){
            if (document.getElementById('txtDistribucionPartesCuerpo').value != ""){
            if (document.getElementById('PartesCuerpoSelect').value != "Seleccionar"){
             var id_ParteCuerpo = $("#PartesCuerpoSelect").val();
             var DistribucionParteCuerpo = $("#txtDistribucionPartesCuerpo").val();
             var EstDistriPartsCuerpo = $("#SelectEstadoDistriParsCuerpo").val();
             if(DistribucionParteCuerpo.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarDistribucionPartesCuerpo",
                    data: {"PartesCuerpoSelect":id_ParteCuerpo, "txtDistribucionPartesCuerpo":DistribucionParteCuerpo,"SelectEstadoDistriParsCuerpo":EstDistriPartsCuerpo}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha seleccionado parte cuerpo";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado distribucion parte cuerpo";
            }
        });
        }

        if ($('#btnUdpDistribucionPartesCuerpo').length !== 0) {
            $('#btnUdpDistribucionPartesCuerpo').on('click', function(){                
                $("#btnGuardarDistribucionPartesCuerpo").css("display", "inline");
                $("#btnUdpDistribucionPartesCuerpo").css("display", "none");
            if (document.getElementById('PartesCuerpoSelect').value != "Seleccionar"){
            if (document.getElementById('txtDistribucionPartesCuerpo').value != ""){
                var id_Clase_Parte_Cuerpo = $("#txtUIdDistrPartesCuerpo").val();
                var id_ParteCuerpo = $('#PartesCuerpoSelect').val();
                var Distri_ParteCuerpo = $("#txtDistribucionPartesCuerpo").val();
                var EstadoDisPC = $("#SelectEstadoDistriParsCuerpo").val();

                if(Distri_ParteCuerpo.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarDistribucionPartesCuerpo",
                data: {"txtUIdDistrPartesCuerpo": id_Clase_Parte_Cuerpo,"PartesCuerpoSelect": id_ParteCuerpo,"txtDistribucionPartesCuerpo":Distri_ParteCuerpo,"SelectEstadoDistriParsCuerpo":EstadoDisPC}
            })
            .done(function(result){
                document.getElementById('SelectEstadoDistriParsCuerpo').value = 0;
                document.getElementById('txtDistribucionPartesCuerpo').value = "";
                $("#EstadoDistriParsCuerpo").css("display", "none");
                alert(result);})
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado distribución partes cuerpo";                
            }
        }else{
            document.getElementById('result').innerHTML = "No ha seleccionado partes cuerpo";
        }
        });
        }

        //Estado Distibucion Partes Cuerpo
        if ($('#btnGuardarEstadoPartesCuerpo').length !== 0) {
            $('#btnGuardarEstadoPartesCuerpo').on('click', function(){
            if (document.getElementById('EstadoDistribucioPartesCuerpoSelect').value != "Seleccionar"){
            if (document.getElementById('txtEstadoPartesCuerpo').value != ""){
                var EstadoDistribucionParteCue = $("#txtEstadoPartesCuerpo").val();
                var id_ClasePC = $('#EstadoDistribucioPartesCuerpoSelect').val();
                var ESTEstPartecuerpo = $('#SelectEstadoEstParsCuerpo').val();
                if(EstadoDistribucionParteCue.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/RegistrarEstadoDistribucionParteCuerpo",
                data: {"txtEstadoPartesCuerpo": EstadoDistribucionParteCue,"EstadoDistribucioPartesCuerpoSelect": id_ClasePC,"SelectEstadoEstParsCuerpo":ESTEstPartecuerpo}
            })
            .done(function(result){
                document.getElementById('SelectEstadoEstParsCuerpo').value = 0;
                document.getElementById('txtEstadoPartesCuerpo').value = "";
                $("#EstadoEstParsCuerpo").css("display", "none");
                alert(result);})
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado estado";                
            }
        }else{
            document.getElementById('result').innerHTML = "No ha seleccionado partes cuerpo";
        }
        });
        }

        if ($('#btnActualizarEstadoPartesCuerpo').length !== 0) {
            $('#btnActualizarEstadoPartesCuerpo').on('click', function(){                
                $("#btnGuardarEstadoPartesCuerpo").css("display", "inline");
                $("#btnActualizarEstadoPartesCuerpo").css("display", "none");
            if (document.getElementById('EstadoDistribucioPartesCuerpoSelect').value != "Seleccionar"){
            if (document.getElementById('txtEstadoPartesCuerpo').value != ""){
                var id_EstadoCl = $("#txtId_EstadoPartesCuerpo").val();
                var EstadoDistriPc = $('#txtEstadoPartesCuerpo').val();
                var id_ClasePC = $("#EstadoDistribucioPartesCuerpoSelect").val();
                var EstadoEstPC = $("#SelectEstadoEstParsCuerpo").val();
                if(EstadoDistriPc.length < 45){
            $.ajax({
                type: "POST",
                url: url+"/Datos/EditarEstadoDistribucionParteCuerpo",
                data: {"txtId_EstadoPartesCuerpo": id_EstadoCl,"txtEstadoPartesCuerpo": EstadoDistriPc,"EstadoDistribucioPartesCuerpoSelect":id_ClasePC,"SelectEstadoEstParsCuerpo":EstadoEstPC}
            })
            .done(function(result){
                alert(result);})
            .fail(function(){
                })
            .always(function(){
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
        }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado estado para la parte del cuerpo";                
            }
        }else{
            document.getElementById('result').innerHTML = "No ha seleccionado partes cuerpo";
        }
        });
        }
        
        //Registro Tamaño porcion

        if ($('#btnguardarProcion').length !== 0) {
            $('#btnguardarProcion').on('click', function(){
            if (document.getElementById('txtPorcion').value != ""){
             var descripcion = $("#txtPorcion").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/clasificacion/RegistrarPorcion",
                    data: {"txtPorcion":descripcion}

                })
                .done(function(result){
                    document.getElementById('result').innerHTML = result;  
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tamaño porcion";
            }
        });
        }

        //Registro Unidad Medida

        if ($('#btnGuardarUnidadMedidad').length !== 0) {
            $('#btnGuardarUnidadMedidad').on('click', function(){
            if (document.getElementById('txtUnidadDeMedida').value != ""){
             var descripcion = $("#txtUnidadDeMedida").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/clasificacion/RegistrarUnidadMedida",
                    data: {"txtUnidadDeMedida":descripcion}

                })
                .done(function(result){
                    document.getElementById('result').innerHTML = result;  
                })
                .fail(function(){
                })
                .always(function(){
                });
                }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado unidad de medida";
            }
        });
        }

           //Registro Momento

        if ($('#btnguardarMmomento').length !== 0) {
            $('#btnguardarMmomento').on('click', function(){
            if (document.getElementById('txtMomentoM').value != ""){
             var descripcion = $("#txtMomentoM").val();
             var EstMomento = $("#SelectEstadoMomento").val();
             if(descripcion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarMomento",
                    data: {"txtMomentoM":descripcion,"SelectEstadoMomento":EstMomento}

                })
                .done(function(result){
                document.getElementById('result').innerHTML = result;  
                })
                .fail(function(){
                })
                .always(function(){
                });
                 }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado momento";
            }
        });
        }
        if ($('#btnUdpMmomento').length !== 0) {
            $('#btnUdpMmomento').on('click', function(){
                $("#btnguardarMmomento").css("display", "inline");
                $("#btnUdpMmomento").css("display", "none");
            if (document.getElementById('txtMomentoM').value != ""){
                var id_momento = $('#txtIdMomentoM').val();
                var Moment = $("#txtMomentoM").val();
                var EstadoMomento = $("#SelectEstadoMomento").val();
             if(Moment.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/EditarMomento",
                    data: {"txtIdMomentoM":id_momento, "txtMomentoM":Moment,"SelectEstadoMomento":EstadoMomento}

                })
                .done(function(result){
                    document.getElementById('SelectEstadoMomento').value = 0;
                    document.getElementById('txtMomentoM').value = "";
                    $("#EstadoMomento").css("display", "none");
                    document.getElementById('result').innerHTML = result;  
                })
                .fail(function(){
                })
                .always(function(){
                });
                 }else{
                    document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado momento";
            }
        });
        }

        //Begin Parentesco
        if ($('#btnguardarParentescoM').length !== 0) {
            $('#btnguardarParentescoM').on('click', function(){
            if (document.getElementById('txtParentesco').value != ""){
             var parentes = $("#txtParentesco").val();
             var EstParentesco = $("#SelectEstadoParentesco").val();
             if(parentes.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarParentesco",
                    data: {"txtParentesco":parentes,"SelectEstadoParentesco":EstParentesco}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado parentesco";
            }
        });
        }

        if ($('#btnUdpParentescoM').length !== 0) {
            $('#btnUdpParentescoM').on('click', function(){
                $("#btnguardarParentescoM").css("display", "inline");
                $("#btnUdpParentescoM").css("display", "none");
            if (document.getElementById('txtParentesco').value != ""){
                var id_Parentes = $('#txtIdParentescoM').val();
                var parentes = $("#txtParentesco").val();
                var EstadoParentesco = $("#SelectEstadoParentesco").val();
             if(parentes.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/EditarParentesco",
                    data: {"txtIdParentescoM": id_Parentes,"txtParentesco":parentes,"SelectEstadoParentesco":EstadoParentesco}

                })
                .done(function(result){
                    document.getElementById('SelectEstadoParentesco').value = 0;
                    document.getElementById('txtParentesco').value = "";
                    $("#EstadoParentesco").css("display", "none");
                    document.getElementById('result').innerHTML = result;
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado parentesco";
            }
        });
        }

        //Begin Recomendacion
        if ($('#btnguardarRecomendacionM').length !== 0) {
            $('#btnguardarRecomendacionM').on('click', function(){
            if (document.getElementById('txtRecomendacionM').value != ""){
                if (document.getElementById('txtSiglasM').value != ""){
                    var Recomenda = $("#txtRecomendacionM").val();
                    var Sigs = $('#txtSiglasM').val();
                    var EstRecomendacion = $('#SelectEstadoRecomendacion').val();

                    if(Recomenda.length < 45){
                        if(Sigs.length < 45){
                        $.ajax({
                            type:"POST",
                            url:url+"/Datos/RegistrarRecomendacion",
                            data: {"txtRecomendacionM": Recomenda,"txtSiglasM":Sigs,"SelectEstadoRecomendacion":EstRecomendacion}

                        })
                        .done(function(result){
                            document.getElementById('result').innerHTML = result;
                        })
                        .fail(function(){
                        })
                        .always(function(){
                        });
                        
                        }else{
                            document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos para las siglas";
                        }
                    }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos para el titulo de la recomendación";
                    }
                }else
                {
                    document.getElementById('result').innerHTML = "No ha ingresado siglas o abreviación del estudio";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado estudio o recomendacion";
            }
        });
        }
        
        if ($('#btnUdpRecomendacionM').length !== 0) {
            $('#btnUdpRecomendacionM').on('click', function(){
                $("#btnguardarRecomendacionM").css("display", "inline");
                $("#btnUdpRecomendacionM").css("display", "none");
            if (document.getElementById('txtRecomendacionM').value != ""){
                if (document.getElementById('txtSiglasM').value != ""){
                    var id_Recomenda = $("#txtIdRecomendacionM").val();
                    var Recomenda = $("#txtRecomendacionM").val();
                    var Sigs = $('#txtSiglasM').val();
                    var EstadoRecomendacion = $('#SelectEstadoRecomendacion').val();
                    if(Recomenda.length < 45){
                        if(Sigs.length < 45){
                        $.ajax({
                            type:"POST",
                            url:url+"/Datos/EditarRecomendacion",
                            data: {"txtIdRecomendacionM":id_Recomenda,"txtRecomendacionM": Recomenda,"txtSiglasM":Sigs,"SelectEstadoRecomendacion":EstadoRecomendacion}

                        })
                        .done(function(result){
                            document.getElementById('SelectEstadoRecomendacion').value = 0;
                            document.getElementById('txtRecomendacionM').value = "";
                            document.getElementById('txtSiglasM').value = "";
                            $("#EstadoRecomendacion").css("display", "none");
                            document.getElementById('result').innerHTML = result;
                        })
                        .fail(function(){
                        })
                        .always(function(){
                        });
                        
                        }else{
                            document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos para las siglas";
                        }
                    }else{
                        document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos para el titulo de la recomendación";
                    }
                }else
                {
                    document.getElementById('result').innerHTML = "No ha ingresado siglas o abreviación del estudio";
                }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado estudio o recomendacion";
            }
        });
        }

        //Begin Tipo Rango
        if ($('#btnguardarTipoRangoM').length !== 0) {
            $('#btnguardarTipoRangoM').on('click', function(){
            if (document.getElementById('txtTipoRango').value != ""){
             var TipoRango = $("#txtTipoRango").val();
             var EstTipoRango = $("#SelectEstadoTipoRango").val();
             if(TipoRango.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarTipoRango",
                    data: {"txtTipoRango":TipoRango,"SelectEstadoTipoRango":EstTipoRango}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo rango";
            }
        });
        }

        if ($('#btnUdpTipoRangoM').length !== 0) {
            $('#btnUdpTipoRangoM').on('click', function(){
                $("#btnguardarTipoRangoM").css("display", "inline");
                $("#btnUdpTipoRangoM").css("display", "none");
            if (document.getElementById('txtTipoRango').value != ""){
                var id_tiR = $("#txtIdTipoRangoM").val();
                var TipoRango = $("#txtTipoRango").val();
                var estadoTR = $("#SelectEstadoTipoRango").val();
             if(TipoRango.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/EditarTipoRango",
                    data: {"txtIdTipoRangoM":id_tiR, "txtTipoRango":TipoRango,"SelectEstadoTipoRango":estadoTR}

                })
                .done(function(result){
                    document.getElementById('SelectEstadoTipoRango').value = 0;
                    document.getElementById('txtTipoRango').value = "";
                    $("#EstadoTipoRango").css("display", "none");
                    document.getElementById('result').innerHTML = result;
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado tipo rango";
            }
        });
        }

        if ($('#btnGuardarRangos').length !== 0) {
            $('#btnGuardarRangos').on('click', function(){
            if (document.getElementById('txtRangoM').value != ""){
            if (document.getElementById('TiposRangoSelect').value != "Seleccionar"){
             var Rangos = $("#txtRangoM").val();
             var id_TipRan = $("#TiposRangoSelect").val();
             var EstRangos = $("#SelectEstadoRango").val();
             if(Rangos.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarRango",
                    data: {"txtRangoM":Rangos, "TiposRangoSelect":id_TipRan,"SelectEstadoRango":EstRangos}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha seleccionado tipo rango";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado un rango";
            }
        });
        }

        if ($('#btnUdpRangos').length !== 0) {
            $('#btnUdpRangos').on('click', function(){
                $("#btnGuardarRangos").css("display", "inline");
                $("#btnUdpRangos").css("display", "none");
            if (document.getElementById('txtRangoM').value != ""){
            if (document.getElementById('TiposRangoSelect').value != "Seleccionar"){
             var Rangos = $("#txtRangoM").val();
             var id_TipRan = $("#TiposRangoSelect").val();
             var id_Ran = $("#txtIdRangosM").val(); 
             var EstadoR = $("#SelectEstadoRango").val(); 
             if(Rangos.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/EditarRango",
                    data: {"txtRangoM":Rangos, "TiposRangoSelect":id_TipRan, "txtIdRangosM":id_Ran,"SelectEstadoRango":EstadoR}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha seleccionado tipo rango";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado un rango";
            }
        });
        }


        //End Tipo Rango
        //Begin Clasificacion Alimentos
        if ($('#btnguardarClasificacionAlimentos').length !== 0) {
            $('#btnguardarClasificacionAlimentos').on('click', function(){
            if (document.getElementById('txtClasificacionAM').value != ""){
             var ClasificacionMA = $("#txtClasificacionAM").val();
             var EstadoClasifi = $("#SelectEstadoClasificacionAlimentos").val();
             if(ClasificacionMA.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/RegistrarClasificacionAlimento",
                    data: {"txtClasificacionAM":ClasificacionMA,"SelectEstadoClasificacionAlimentos":EstadoClasifi}

                })
                .done(function(result){ 
                    document.getElementById('result').innerHTML = result;
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado clasificación";
            }
        });
        }

        if ($('#btnUdpClasificacionAlimentos').length !== 0) {
            $('#btnUdpClasificacionAlimentos').on('click', function(){
                $("#btnguardarClasificacionAlimentos").css("display", "inline");
                $("#btnUdpClasificacionAlimentos").css("display", "none");
            if (document.getElementById('txtClasificacionAM').value != ""){
             var clasificacion = $("#txtClasificacionAM").val();
             var id_clasificacion = $("#txtIdClasificacion").val();
             var estadoClasifi = $('#SelectEstadoClasificacionAlimentos').val();
             if(clasificacion.length < 45){
                $.ajax({
                    type:"POST",
                    url:url+"/Datos/EditarClasificacionAlimentosMA",
                    data: {"txtClasificacionAM":clasificacion, "txtIdClasificacion":id_clasificacion,"SelectEstadoClasificacionAlimentos":estadoClasifi}

                })
                .done(function(result){
                    document.getElementById('SelectEstadoClasificacionAlimentos').value = 0;
                    document.getElementById('txtClasificacionAM').value = "";
                    $("#EstadoClasificacionAlimentos").css("display", "none");
                    document.getElementById('result').innerHTML = result; 
                })
                .fail(function(){
                })
                .always(function(){
                });
            }else{
                document.getElementById('result').innerHTML = "Ingreso mas caracteres de los permitidos";
            }
            }else
            {
                document.getElementById('result').innerHTML = "No ha ingresado una clasificación";
            }
        });
        }
        // Registro alimento
       
        if($('#btnGuardarAlimentos').length !== 0){
            $('#btnGuardarAlimentos').on('click', function(){
                if (document.getElementById('txtNombreAlimentosAM').value != ""){
                  if (document.getElementById('txtGrasasAM').value != ""){
                    if (document.getElementById('SelectUnidadMedidaAM').value != "Seleccionar"){
                     if (document.getElementById('txtPesoAM').value != ""){
                      if (document.getElementById('txtCarbohidratosAM').value != ""){
                       if (document.getElementById('txtProteinasAM').value != ""){
                        if (document.getElementById('txtIndiceGlucemicoAM').value != ""){
                         if (document.getElementById('SelectClasAlimenAM').value != "Seleccionar"){
                            
                            var descripcion = $("#txtNombreAlimentosAM").val();
                            var grasas = $("#txtGrasasAM").val();
                            var ClasificacionA = $("#SelectClasAlimenAM").val();
                            var unidadMedida = $("#SelectUnidadMedidaAM").val();
                            var peso = $("#txtPesoAM").val();
                            var carbohidratos = $("#txtCarbohidratosAM").val();
                            var proteinas = $("#txtProteinasAM").val();
                            var IndiceGlucemico = $("#txtIndiceGlucemicoAM").val();
                            $.ajax({
                                type:"POST",
                                url:url+"/Datos/RegistrarAlimentosM",
                                data: {"txtNombreAlimentosAM":descripcion,"txtGrasasAM":grasas, "SelectClasAlimenAM":ClasificacionA, "SelectUnidadMedidaAM":unidadMedida, "txtPesoAM":peso, "txtCarbohidratosAM":carbohidratos, "txtProteinasAM":proteinas,  "txtIndiceGlucemicoAM": IndiceGlucemico}
                            })
                            .done(function(result){ 
                                 document.getElementById('result').innerHTML = result;
                            })
                            .fail(function(){
                            })
                            .always(function(){
                            });
                          }else{
                            var mensajeH = "No ha seleccionado clasificacion"; 
                            alert(mensajeH);
                         }
                         }else{
                         var mensajeG = "No ha ingresado indice glucemico";
                         alert(mensajeG);
                      }
                       }else{
                         var mensajeF = "No ha ingresado Proteinas";
                         alert(mensajeF); 
                      }
                      }else{
                         var mensajeE = "No ha ingresado Carbohidratos"; 
                         alert(mensajeE);
                     }
                     }else{
                      var mensajeD = "No ha ingresado peso"; 
                      alert(mensajeD);
                     }
                    }else{
                     var mensajeC = "No ha seleccionado unidad de medida"; 
                     alert(mensajeC);
                    }
                  }else{
                     var mensajeB = "No ha ingresado grasas";
                     alert(mensajeB);
                 }
                 
                }else {
                     var mensajeA = "No ha ingresado alimento";
                     alert(mensajeA);
                }
            });
        }


        if($('#btnUdpAlimentos').length !== 0){
            $('#btnUdpAlimentos').on('click', function(){
                if (document.getElementById('txtNombreAlimentosAM').value != ""){
                  if (document.getElementById('txtGrasasAM').value != ""){
                    if (document.getElementById('SelectUnidadMedidaAM').value != "Seleccionar"){
                     if (document.getElementById('txtPesoAM').value != ""){
                      if (document.getElementById('txtCarbohidratosAM').value != ""){
                       if (document.getElementById('txtProteinasAM').value != ""){
                        if (document.getElementById('txtIndiceGlucemicoAM').value != ""){
                         if (document.getElementById('SelectClasAlimenAM').value != "Seleccionar"){
                            
                            var id_AlimentoM = $('#txtIdAlimentosM').val();
                            var descripcion = $("#txtNombreAlimentosAM").val();
                            var grasas = $("#txtGrasasAM").val();
                            var ClasificacionA = $("#SelectClasAlimenAM").val();
                            var unidadMedida = $("#SelectUnidadMedidaAM").val();
                            var peso = $("#txtPesoAM").val();
                            var carbohidratos = $("#txtCarbohidratosAM").val();
                            var proteinas = $("#txtProteinasAM").val();
                            var IndiceGlucemico = $("#txtIndiceGlucemicoAM").val();
                            var estadoAlimento = $("#SelectEstadoAlimentos").val();
                            $.ajax({
                                type:"POST",
                                url:url+"/Datos/EditarAlimentosM",
                                data: {"txtNombreAlimentosAM":descripcion,"txtGrasasAM":grasas, "SelectClasAlimenAM":ClasificacionA, "SelectUnidadMedidaAM":unidadMedida, "txtPesoAM":peso, "txtCarbohidratosAM":carbohidratos, "txtProteinasAM":proteinas,  "txtIndiceGlucemicoAM": IndiceGlucemico,"txtIdAlimentosM":id_AlimentoM, "SelectEstadoAlimentos":estadoAlimento}
                            })
                            .done(function(result){ 
                                 alert(result);
                            })
                            .fail(function(){
                            })
                            .always(function(){
                            });
                          }else{
                            var mensajeH = "No ha seleccionado clasificacion"; 
                            alert(mensajeH);
                         }
                         }else{
                         var mensajeG = "No ha ingresado indice glucemico";
                         alert(mensajeG);
                      }
                       }else{
                         var mensajeF = "No ha ingresado Proteinas";
                         alert(mensajeF); 
                      }
                      }else{
                         var mensajeE = "No ha ingresado Carbohidratos"; 
                         alert(mensajeE);
                     }
                     }else{
                      var mensajeD = "No ha ingresado peso"; 
                      alert(mensajeD);
                     }
                    }else{
                     var mensajeC = "No ha seleccionado unidad de medida"; 
                     alert(mensajeC);
                    }
                  }else{
                     var mensajeB = "No ha ingresado grasas";
                     alert(mensajeB);
                 }
                 
                }else {
                     var mensajeA = "No ha ingresado alimento";
                     alert(mensajeA);
                }
            });
        }
    });

    function LimpiarResult(Ested){
        document.getElementById('result').innerHTML = "";        
    }
    function Focus(){
        document.getElementById('txtGenero').focus();
    }
    function FocusDocumento(){
        document.getElementById('txtTipoDocumento').focus();
    }
    var id_GeneroActualizar;
    function cargarModalGenero(btnGenero)
    {
        id_GeneroActualizar = btnGenero.id;
        var nodoTd = btnGenero.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id = nodosEnTr[0].textContent;
        var estadoEdit = nodosEnTr[1].textContent;
        $("#EstadoG").css("display", "inline");
        var genero = nodosEnTr[2].textContent;
        document.getElementById("txtid").value = id;
        document.getElementById("SelectEstadoGenero").value = estadoEdit;
        document.getElementById("txtGenero").value = genero;
        $("#btnActualizarGenero").css("display", "inline");
        $("#btnGuardarGenero").css("display", "none");
    }
    function cargarModalGenero2(btnGenero)
    {
        id_GeneroActualizar = btnGenero.id;
        var nodoTd = btnGenero.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id = id_GeneroActualizar;
        var genero = nodosEnTr[0].textContent;
        document.getElementById("txtid").value = id;
        document.getElementById("txtGenero").value = genero;
        $("#btnActualizarGenero").css("display", "inline");
        $("#btnGuardarGenero").css("display", "none");
    }
    //End Update Genero
    //Begin Update TipoDocumento
    var id_TipoDocumentoActualizar;
    function cargarTipoDocumentoEditar(btnTD)
    {        
        id_TipoDocumentoActualizar = btnTD.id;
        var nodoTd = btnTD.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var idTD = nodosEnTr[0].textContent;
        var TipoDocumento = nodosEnTr[1].textContent;
        var EstadoEditTD = nodosEnTr[2].textContent;
        $("#EstadoTD").css("display", "inline");
        document.getElementById("txtidTD").value = idTD;
        document.getElementById("txtTipoDocumento").value = TipoDocumento;
        document.getElementById("SelectEstadoTD").value = EstadoEditTD;
        $("#btnActualizarTipoDoc").css("display", "inline");
        $("#btnGuardarTipoDoc").css("display", "none");
    }
    function cargarTipoDocumentoEditar2(btnTD)
    {        
        id_TipoDocumentoActualizar = btnTD.id;
        var nodoTd = btnTD.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var idTD = id_TipoDocumentoActualizar;
        var TipoDocumento = nodosEnTr[0].textContent;
        document.getElementById("txtidTD").value = idTD;
        document.getElementById("txtTipoDocumento").value = TipoDocumento;
        $("#btnActualizarTipoDoc").css("display", "inline");
        $("#btnGuardarTipoDoc").css("display", "none");
    }
    //End Update TipoDocumento
    //Begin Update Estado Parto

    //End Update Estado Parto
    var id_AparatoSistemaActualizar;
    function cargarApaSisEditar(btnApaSis){
        id_AparatoSistema = btnApaSis.id;
        var nodoTd = btnApaSis.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_AparatoSistema = nodosEnTr[0].textContent;
        var AparatoSistema = nodosEnTr[1].textContent;
        var DescripcionAS = nodosEnTr[2].textContent;
        var EstadoditApaSis = nodosEnTr[3].textContent;
        $("#EstadoAparaSistema").css("display", "inline");
        document.getElementById("txtIdApaSis").value = id_AparatoSistema;
        document.getElementById("txtAparatoSistema").value = AparatoSistema;
        document.getElementById("TextAreaDescripcionAparato").value = DescripcionAS;
        document.getElementById("SelectEstadoAparaSistema").value = EstadoditApaSis;
        $("#btnUpdAparatoSistema").css("display", "inline");
        $("#btnGuardarAparatoSistema").css("display", "none");
    }
    
    var id_TipoDosificacionActualizar;
    function cargarTipoDosi(btnTipoDosi){
        id_TipoDosificacionActualizar = btnTipoDosi.id;
        var nodoTd = btnTipoDosi.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_TipoDosi = nodosEnTr[0].textContent;
        var TipoDosificacion = nodosEnTr[1].textContent;
        document.getElementById("txtIdTipoDosificacion").value = id_TipoDosi;
        document.getElementById("txtTipoDosificacion").value = TipoDosificacion;
        $("#btnUpdTipoDosificacion").css("display", "inline");
        $("#btnGuardarTipoDosificacion").css("display", "none");
    }
    //Begin Actaulizar Estado Civil
    var id_EstadoCivilActualizar;
    function cargarEstCiv(btnEstCiv){
        id_EstadoCivilActualizar= btnEstCiv.id;
        var nodoTd = btnEstCiv.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_EstCiv = nodosEnTr[0].textContent;
        var EstadoCivil = nodosEnTr[1].textContent;
        var EstadoEditEstCiv = nodosEnTr[2].textContent;
        $("#EstadoEstadoCiv").css("display", "inline");
        document.getElementById("txtIDEstadoCivil").value = id_EstCiv;
        document.getElementById("txtEstadoCivil").value = EstadoCivil;
        document.getElementById("SelectEstadoEstCiv").value = EstadoEditEstCiv;
        $("#btnUdpEstadoCivil").css("display", "inline");
        $("#btnGuardarEstadoCivil").css("display", "none");
    }
    function cargarEstCiv2(btnEstCiv){
        id_EstadoCivilActualizar= btnEstCiv.id;
        var nodoTd = btnEstCiv.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_EstCiv = id_EstadoCivilActualizar;
        var EstadoCivil = nodosEnTr[0].textContent;
        document.getElementById("txtIDEstadoCivil").value = id_EstCiv;
        document.getElementById("txtEstadoCivil").value = EstadoCivil;
        $("#btnUdpEstadoCivil").css("display", "inline");
        $("#btnGuardarEstadoCivil").css("display", "none");
    }
    //End Estado Civil
    //Begin Espcilizacion 
    var id_EspecializacionActualizar;
    function cargarEsp(btnEspcializacion){
        id_EspecializacionActualizar= btnEspcializacion.id;
        var nodoTd = btnEspcializacion.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_espec = nodosEnTr[0].textContent;
        var Especializacion = nodosEnTr[1].textContent;
        var EstadoEditFrec = nodosEnTr[2].textContent;
        document.getElementById("txtIdEspecializacion").value = id_espec;
        document.getElementById("txtEspecializacion").value = Especializacion;
        document.getElementById("SelectEstadoEspciliza").value = EstadoEditFrec;
        $("#btnUdpEspecializacion").css("display", "inline");
        $("#EstadoEspecializa").css("display", "inline");
        $("#btnGuardarEspecializacion").css("display", "none");
    }

    function cargarEsp2(btnEspcializacion){
        id_EspecializacionActualizar= btnEspcializacion.id;
        var nodoTd = btnEspcializacion.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_espec = id_EspecializacionActualizar;
        var Especializacion = nodosEnTr[0].textContent;
        document.getElementById("txtIdEspecializacion").value = id_espec;
        document.getElementById("txtEspecializacion").value = Especializacion;
        $("#btnUdpEspecializacion").css("display", "inline");
        $("#btnGuardarEspecializacion").css("display", "none");
    }
    //End Espcilizacion
    var id_HabitoPersonalesActualizar;
    function cargarHabPer(btnHabPer){
        id_HabitoPersonalesActualizar = btnHabPer.id;
        var nodoTd = btnHabPer.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_HabPer = nodosEnTr[0].textContent;
        var HabitosPersonales = nodosEnTr[1].textContent;
        var EstadoHabito = nodosEnTr[2].textContent;
        $("#EstadoHabitosPer").css("display", "inline");
        document.getElementById("txtIdHabPers").value = id_HabPer;
        document.getElementById("txtHabitosPersonales").value = HabitosPersonales;
        document.getElementById("SelectEstadoHabitosPer").value = EstadoHabito;
        $("#btnUdpHabitosPersonale").css("display", "inline");
        $("#btnGuardarHabitosPersonale").css("display", "none");
    }
    
    function cargarHabPer2(btnHabPer){
        id_HabitoPersonalesActualizar = btnHabPer.id;
        var nodoTd = btnHabPer.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_HabPer = id_HabitoPersonalesActualizar;
        var HabitosPersonales = nodosEnTr[0].textContent;
        document.getElementById("txtIdHabPers").value = id_HabPer;
        document.getElementById("txtHabitosPersonales").value = HabitosPersonales;
        $("#btnUdpHabitosPersonale").css("display", "inline");
        $("#btnGuardarHabitosPersonale").css("display", "none");
    }
    var id_FrecuenciaActualizar;
    function cargarFrec(btnFrec){
        id_FrecuenciaActualizar = btnFrec.id;
        var nodoTd = btnFrec.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_habito = nodosEnTr[0].textContent;
        var id_Frec = nodosEnTr[1].textContent;
        var Frecuencia = nodosEnTr[3].textContent;
        var EstadoEditFrec = nodosEnTr[4].textContent;
        $("#EstadoFrecuencia").css("display", "inline");
        document.getElementById("HabitoPersonal").value = id_habito;
        document.getElementById("txtIdFrecuencia").value = id_Frec;
        document.getElementById("txtFrecuencia").value = Frecuencia;
        document.getElementById("SelectEstadoFrecuencia").value = EstadoEditFrec;
        $("#btnUdpFrecuencia").css("display", "inline");
        $("#btnGuardarFrecuencia").css("display", "none");
    }
     
    function cargarFrec2(btnFrec){
        id_FrecuenciaActualizar = btnFrec.id;
        var nodoTd = btnFrec.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_Frec = id_FrecuenciaActualizar;
        var Frecuencia = nodosEnTr[0].textContent;
        document.getElementById("txtIdFrecuencia").value = id_Frec;
        document.getElementById("txtFrecuencia").value = Frecuencia;
        $("#btnUdpFrecuencia").css("display", "inline");
        $("#btnGuardarFrecuencia").css("display", "none");
    }
    //Begin Consultar Escolaridad
    var id_EscolaridadActualizar;
    function cargarEsc(btnEscol){
        id_EscolaridadActualizar = btnEscol.id;
        var nodoTd = btnEscol.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_Escl = nodosEnTr[0].textContent;
        var Escolarida = nodosEnTr[1].textContent;
        var EstadoEditEsc = nodosEnTr[2].textContent;
        document.getElementById("txtIdEcolaridad").value = id_Escl;
        document.getElementById("txtEscolaridad").value = Escolarida;
        document.getElementById("SelectEstadoEscolaridad").value = EstadoEditEsc;
        $("#btnUdpEscolaridad").css("display", "inline");
        $("#EstadoEscolaridad").css("display", "inline");
        $("#btnGuardarEscolaridad").css("display", "none");
    }

    function cargarEsc2(btnEscol){
        id_EscolaridadActualizar = btnEscol.id;
        var nodoTd = btnEscol.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_Escl = id_EscolaridadActualizar;
        var Escolarida = nodosEnTr[0].textContent;
        document.getElementById("txtIdEcolaridad").value = id_Escl;
        document.getElementById("txtEscolaridad").value = Escolarida;
        $("#btnUdpEscolaridad").css("display", "inline");
        $("#btnGuardarEscolaridad").css("display", "none");
    }
    //End Consultar Escolaridad
    //Begin Consultar Tipo Medida
    
    //End Consultar Tipo Medida
     var id_DepartamentoActualizar;
    function cargarDepart(btnDepar){
        id_DepartamentoActualizar = btnDepar.id;
        var nodoTd = btnDepar.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_Depart = nodosEnTr[0].textContent;
        var Departamento = nodosEnTr[1].textContent;
        var EstadoEditDepartament = nodosEnTr[2].textContent;
        $("#EstadoDepartament").css("display", "inline");
        document.getElementById("txtIdDepar").value = id_Depart;
        document.getElementById("txtDepartamento").value = Departamento;
        document.getElementById("SelectEstadoDepartament").value = EstadoEditDepartament;
        $("#btnUdpDepartmento").css("display", "inline");
        $("#btnGuardarDepartmento").css("display", "none");
    }
    //Begin Consultar Tipo Antecedente
     var id_TipoAntecedenteActualizar;
    function cargarTipAnt(btnTipAnt)
    {
        id_TipoAntecedenteActualizar = btnTipAnt.id;
        var nodoTd = btnTipAnt.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_TipMed = nodosEnTr[0].textContent;
        var TipoMedida = nodosEnTr[1].textContent;
        var EstadoEditTipAntec = nodosEnTr[2].textContent;
        $("#EstadoTipoAntecedente").css("display", "inline");
        document.getElementById("txtIdTipoAntec").value = id_TipMed;
        document.getElementById("txtTipoAntecedente").value = TipoMedida;
        document.getElementById("SelectEstadoTipoAntecedente").value = EstadoEditTipAntec;
        $("#btnAdpTipoAntecedente").css("display", "inline");
        $("#btnGuardarTipoAntecedente").css("display", "none");
    }

    function cargarTipAnt2(btnTipAnt)
    {
        id_TipoAntecedenteActualizar = btnTipAnt.id;
        var nodoTd = btnTipAnt.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_TipMed = id_TipoAntecedenteActualizar;
        var TipoMedida = nodosEnTr[0].textContent;
        document.getElementById("txtIdTipoAntec").value = id_TipMed;
        document.getElementById("txtTipoAntecedente").value = TipoMedida;
        $("#btnAdpTipoAntecedente").css("display", "inline");
        $("#btnGuardarTipoAntecedente").css("display", "none");
    }
    //End Consultar Tipo Antecedente
    var id_ParteCuerpoActualizar;
    function cargarPartCuer(btnParCuer)
    {
        id_ParteCuerpoActualizar = btnParCuer.id;
        var nodoTd = btnParCuer.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_PartCuer = nodosEnTr[0].textContent;
        var ParteCuerpo = nodosEnTr[1].textContent;
        var EstadoEditParsCuer = nodosEnTr[2].textContent;
        $("#EstadoParsCuerpo").css("display", "inline");
        document.getElementById("txtIdParteCuerpo").value = id_PartCuer;
        document.getElementById("txtPartesCuerpo").value = ParteCuerpo;
        document.getElementById("SelectEstadoParsCuerpo").value = EstadoEditParsCuer;
        $("#btnUdpPartesCuerpo").css("display", "inline");
        $("#btnGuardarPartesCuerpo").css("display", "none");
    }

    var id_DistribucionParteCuerActualizar;
    function cargarDistribucionPartCuer(btnDistribucionPC)
    {
        id_DistribucionParteCuerActualizar = btnDistribucionPC.id;
        var nodoTd = btnDistribucionPC.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_PC = nodosEnTr[0].textContent;
        var id_DistribucionPC = nodosEnTr[1].textContent;
        var DescripDistribucionPC = nodosEnTr[3].textContent;
        document.getElementById("PartesCuerpoSelect").value = id_PC;
        document.getElementById("txtUIdDistrPartesCuerpo").value = id_DistribucionPC;
        document.getElementById("txtDistribucionPartesCuerpo").value = DescripDistribucionPC;
        $("#btnUdpDistribucionPartesCuerpo").css("display", "inline");
        $("#btnGuardarDistribucionPartesCuerpo").css("display", "none");
    }
    //Begin Consultar Municipio
    var id_MunicipioActualizar;
    function cargarMunicipio(btnMuni)
    {
        id_MunicipioActualizar = btnMuni.id;
        var nodoTd = btnMuni.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_Depar = nodosEnTr[0].textContent;
        var id_Muni = nodosEnTr[1].textContent;
        var Muni = nodosEnTr[3].textContent;
        var EstadoEditaMunicipio = nodosEnTr[4].textContent;
        $("#EstadoMunicipio").css("display", "inline");
        document.getElementById("departamentoM").value = id_Depar;
        document.getElementById("txtIdMunicipio").value = id_Muni;
        document.getElementById("txtMunicipio").value = Muni;
        document.getElementById("SelectEstadoMunicipio").value = EstadoEditaMunicipio;

        $("#btnUdpMunicipio").css("display", "inline");
        $("#btnGuardarMunicipio").css("display", "none");
    }
    function cargarMunicipio2(btnMuni)
    {
        id_MunicipioActualizar = btnMuni.id;
        var nodoTd = btnMuni.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');                
        var id_Depar = nodosEnTr[0].textContent;
        var id_Muni = id_MunicipioActualizar;
        var Muni = nodosEnTr[2].textContent;
        document.getElementById("departamentoM").value = id_Depar;
        document.getElementById("txtIdMunicipio").value = id_Muni;
        document.getElementById("txtMunicipio").value = Muni;

        $("#btnUdpMunicipio").css("display", "inline");
        $("#btnGuardarMunicipio").css("display", "none");
    }
    //End Consultar Municipio
    var id_DistrubicionAntecedenteActualizar;
    function CargarDistribucionAntecedente(btnDistribucionantecedente){
        id_DistrubicionAntecedenteActualizar = btnDistribucionantecedente.parentNode.id;
        var nodoTd = btnDistribucionantecedente.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_TipoAtece = nodosEnTr[0].textContent;
        var id_Distribucion = nodosEnTr[1].textContent;
        var DescripcionDistribucion = nodosEnTr[3].textContent;
        var EstadoEditTipAnt = nodosEnTr[4].textContent;
        $("#EstadoDistriAnteceden").css("display", "inline");
        document.getElementById("TipoAntecedenteSelect").value = id_TipoAtece;
        document.getElementById("txtIdDistribuAntece").value = id_Distribucion;
        document.getElementById("txtDistribucionAntecedentes").value = DescripcionDistribucion;
        document.getElementById("SelectEstadoDistriAnteceden").value = EstadoEditTipAnt;
        $("#btnAdpAntecendete").css("display", "inline");
        $("#btnGuardarDistribucionAntecendete").css("display", "none");
    }

    var id_DistrubicionParteCuerpoActualizar;
    function CargarDistribucionParteCuerpo(btnDistriParteCuerpo){
        id_DistrubicionParteCuerpoActualizar = btnDistriParteCuerpo.parentNode.id;
        var nodoTd = btnDistriParteCuerpo.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_Clase_parteCuerpo = nodosEnTr[0].textContent;
        var id_ParteCuerpo = nodosEnTr[1].textContent;
        var DisParteCuerpo = nodosEnTr[3].textContent;
        var EstadoEditDistrParsCuer = nodosEnTr[4].textContent;
        $("#EstadoDistriParsCuerpo").css("display", "inline");
        document.getElementById("txtUIdDistrPartesCuerpo").value = id_Clase_parteCuerpo;
        document.getElementById("txtDistribucionPartesCuerpo").value = DisParteCuerpo;
        document.getElementById("PartesCuerpoSelect").value = id_ParteCuerpo;
        document.getElementById("SelectEstadoDistriParsCuerpo").value = EstadoEditDistrParsCuer;
        $("#btnUdpDistribucionPartesCuerpo").css("display","inline");
        $("#btnGuardarDistribucionPartesCuerpo").css("display", "none");        
    }

    var id_MomentoEditar;
    function cargarMomentoM(btnMomento){
        id_MomentoEditar = btnMomento.parentNode.id;
        var nodoTd = btnMomento.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_Momento= nodosEnTr[0].textContent;
        var MomentoM = nodosEnTr[1].textContent;          
        var EstadoEditMomento = nodosEnTr[2].textContent;   
        $("#EstadoMomento").css("display", "inline");       
        document.getElementById("txtIdMomentoM").value = id_Momento;
        document.getElementById("txtMomentoM").value = MomentoM;
        document.getElementById("SelectEstadoMomento").value = EstadoEditMomento;
        $("#btnUdpMmomento").css("display","inline");
        $("#btnguardarMmomento").css("display", "none");
    }

    var id_ParentescoEditar;
    function CargarParentesco(btnParentesco){
        id_ParentescoEditar = btnParentesco.parentNode.id;
        var nodoTd = btnParentesco.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_Parentesco = nodosEnTr[0].textContent;
        var Parentesco = nodosEnTr[1].textContent;
        var EstadoEditParentesco = nodosEnTr[2].textContent;
        $("#EstadoParentesco").css("display", "inline");
        document.getElementById("txtIdParentescoM").value = id_Parentesco;
        document.getElementById("txtParentesco").value = Parentesco;
        document.getElementById("SelectEstadoParentesco").value = EstadoEditParentesco;
        $("#btnUdpParentescoM").css("display","inline");
        $("#btnguardarParentescoM").css("display", "none");        
    }

    var id_estadoDistribucionParteuerpo;
    function cargarEstDisParCue(btnEstDisPartCue){
        id_estadoDistribucionParteuerpo = btnEstDisPartCue.id;
        var nodoTd = btnEstDisPartCue.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_Estado = nodosEnTr[0].textContent;
        var id_Clase_ParCuer = nodosEnTr[2].textContent;
        var EstadoDistribucionParteCuerpo = nodosEnTr[1].textContent;
        var EstadoEstDistriParteCuerpo = nodosEnTr[5].textContent;
        $("#EstadoEstParsCuerpo").css("display", "inline");
        document.getElementById("txtId_EstadoPartesCuerpo").value = id_Estado;
        document.getElementById("EstadoDistribucioPartesCuerpoSelect").value = id_Clase_ParCuer;
        document.getElementById("txtEstadoPartesCuerpo").value = EstadoDistribucionParteCuerpo;
        document.getElementById("SelectEstadoEstParsCuerpo").value = EstadoEstDistriParteCuerpo;
        $("#btnActualizarEstadoPartesCuerpo").css("display","inline");
        $("#btnGuardarEstadoPartesCuerpo").css("display", "none");
    }

    var id_RecomendacionEditar;
    function CargarRecomendacion(btnRecomenda){
        id_RecomendacionEditar = btnRecomenda.parentNode.id;
        var nodoTd = btnRecomenda.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_recomenda = nodosEnTr[0].textContent;
        var Recomenda = nodosEnTr[1].textContent;
        var acronym = nodosEnTr[2].textContent;
        var EstadoEditParentesco = nodosEnTr[3].textContent;
        $("#EstadoRecomendacion").css("display", "inline");
        document.getElementById("txtIdRecomendacionM").value = id_recomenda;
        document.getElementById("txtRecomendacionM").value = Recomenda;
        document.getElementById("txtSiglasM").value = acronym;
        document.getElementById("SelectEstadoRecomendacion").value = EstadoEditParentesco;
        $("#btnUdpRecomendacionM").css("display","inline");
        $("#btnguardarRecomendacionM").css("display", "none");
    }

    var id_TipoRangoEditar;
    function CargarTipoRango(btnTipoRango){
        id_TipoRangoEditar = btnTipoRango.parentNode.id;
        var nodoTd = btnTipoRango.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_TipoRango = nodosEnTr[0].textContent;
        var TipoRango = nodosEnTr[1].textContent;
        var EstadoEditTipRango = nodosEnTr[2].textContent;
        $("#EstadoTipoRango").css("display", "inline");
        document.getElementById("txtIdTipoRangoM").value = id_TipoRango;
        document.getElementById("txtTipoRango").value = TipoRango;
        document.getElementById("SelectEstadoTipoRango").value = EstadoEditTipRango;
        $("#btnUdpTipoRangoM").css("display","inline");
        $("#btnguardarTipoRangoM").css("display", "none");
    }

    var id_RangosEditar;
    function CargarRangos(btnRango){
        id_RangosEditar = btnRango.parentNode.id;
        var nodoTd = btnRango.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_Rango = nodosEnTr[0].textContent;
        var TipoRango = nodosEnTr[1].textContent;
        var DescripRango = nodosEnTr[2].textContent;
        var EstadoEditRango = nodosEnTr[4].textContent;
        $("#EstadoRango").css("display", "inline");
        document.getElementById("txtIdRangosM").value = id_Rango;
        document.getElementById("TiposRangoSelect").value = TipoRango;
        document.getElementById("txtRangoM").value = DescripRango;
        document.getElementById("SelectEstadoRango").value = EstadoEditRango;
        $("#btnUdpRangos").css("display","inline");
        $("#btnGuardarRangos").css("display", "none");
    }

    var id_clasificacionEditar;
    function Cargarclasificacion(btnclasifi){
        id_clasificacionEditar = btnclasifi.parentNode.id;
        var nodoTd = btnclasifi.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_clasifi = nodosEnTr[0].textContent;
        var clasificacion = nodosEnTr[1].textContent;
        var EstadoEditclasificacion = nodosEnTr[2].textContent;
        $("#EstadoClasificacionAlimentos").css("display", "inline");
        document.getElementById("txtIdClasificacion").value = id_clasifi;
        document.getElementById("txtClasificacionAM").value = clasificacion;
        document.getElementById("SelectEstadoClasificacionAlimentos").value = EstadoEditclasificacion;
        $("#btnUdpClasificacionAlimentos").css("display","inline");
        $("#btnguardarClasificacionAlimentos").css("display", "none");
    }

    var id_AlimentoEditar;
        function CargarAlimentosEditar(btnAlimentos){
        id_AlimentoEditar = btnAlimentos.parentNode.id;
        var nodoTd = btnAlimentos.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var id_Alimentos = nodosEnTr[0].textContent;
        var clasificacionA = nodosEnTr[1].textContent;
        var unidadMedida = nodosEnTr[2].textContent;
        var Alimento = nodosEnTr[5].textContent;
        var peso = nodosEnTr[6].textContent;
        var carbohidratos = nodosEnTr[7].textContent;
        var proteinas = nodosEnTr[8].textContent;
        var grasas = nodosEnTr[9].textContent;
        var indice_Glucemico = nodosEnTr[10].textContent;
        var EstadoEditAlimento = nodosEnTr[11].textContent;
        $("#EstadoAlimentos").css("display", "inline");
        document.getElementById('txtIdAlimentosM').value = id_Alimentos;
        document.getElementById('SelectClasAlimenAM').value = clasificacionA;
        document.getElementById('SelectUnidadMedidaAM').value = unidadMedida;
        document.getElementById('txtNombreAlimentosAM').value = Alimento;
        document.getElementById('txtPesoAM').value = peso;
        document.getElementById('txtGrasasAM').value = grasas;
        document.getElementById('txtCarbohidratosAM').value = carbohidratos;
        document.getElementById('txtProteinasAM').value = proteinas;
        document.getElementById('txtIndiceGlucemicoAM').value = indice_Glucemico;
        document.getElementById('SelectEstadoAlimentos').value = EstadoEditAlimento;

        $("#btnUdpAlimentos").css("display","inline");
        $("#btnGuardarAlimentos").css("display", "none");
       }

    function EsconderEstadoAlimentos(){
        $("#EstadoAlimentos").css("display", "none");
        document.getElementById('txtIdAlimentosM').value = " ";
        document.getElementById('SelectClasAlimenAM').value = "Seleccionar";
        document.getElementById('SelectUnidadMedidaAM').value = "Seleccionar";
        document.getElementById('txtNombreAlimentosAM').value = " ";
        document.getElementById('txtPesoAM').value = " ";
        document.getElementById('txtGrasasAM').value = " ";
        document.getElementById('txtCarbohidratosAM').value = " ";
        document.getElementById('txtProteinasAM').value = " ";
        document.getElementById('txtIndiceGlucemicoAM').value = " ";
        $("#btnUdpAlimentos").css("display","none");
        $("#btnGuardarAlimentos").css("display", "inline");
    }

    function validarLetras(e){
        txtinput = (document.all) ? e.keyCode : e.which; 
            if (txtinput==8) return true; // backspace
                if (txtinput==32) return true; // espacio
                if (e.ctrlKey && txtinput==86) { return true;} //Ctrl v
                if (e.ctrlKey && txtinput==67) { return true;} //Ctrl c
                if (e.ctrlKey && txtinput==88) { return true;} //Ctrl x
                
                patron = /[a-zA-Z]/; //patron
         
                te = String.fromCharCode(txtinput); 
                return patron.test(te); // prueba de patron
        }

    // var TablaGenero = $('#tablaGenero').dataTable();
    function ConsultarGenero(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarGenero",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaGenero.fnDestroy();
         TablaGenero.children("tbody").html("");
         TablaGenero.dataTable();
         alert(TablaGenero.dataTable());
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaGenero.fnAddData( [
                 "<td ><div name='invisible'></div>"+jsonData[i].id_genero+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td>"+jsonData[i].genero+"</td>"
                ,"<td>"+descripcionEstado+"</td>"
                ,"<td><a name='btnEditarGenero' id='"+jsonData[i].id_genero+"' onclick='cargarModalGenero(this)'' class='edit'>Editar</a></td>"] );
            TablaGenero.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }
    // var contadorElemenGenero;
    // var id_genero,genero,estado;
    // var a = 0;
    // function ConsultarGenero(){
    //     $.ajax({
    //       dateType: 'html',
    //       Type: 'POST',
    //       url: url+"/Datos/ConsultarGenero",

    //     }).done(function(result){
    //     Generos = eval('(' + result + ')');
    //     contadorElemenGenero = Generos.length;
    //     for (a = 0; a<=contadorElemenGenero;a++) {
    //         id_genero = Generos[i]["id_genero"];
    //         genero = Generos[i]["genero"];
    //         estado = Generos[i]["estado"];
    //         PintarTabalGenero();
    //          }

    //          }).fail(function(){

    //          }).always(function(){

    //          }); 
    //          $("#tblGlucometria").innerHTML = "";
    // }
    // function PintarTabalGenero(){
    //     var tableRecargaGenero = document.getElementById('tbl_Genero');
    //     var rowCount = tableRecargaGenero.rows.length;
    //     var row = tableRecargaGenero.insertRow(rowCount);
    //     // row.id = "tr"+id_genero;

    //     var cell0 = row.insertCell(0);
    //     // cell0.id = id_genero;
    //     cell0.style.display = 'none';
    //     var cell1 = row.insertCell(1);
    //     var cell2 = row.insertCell(2);
    //     var cell3 = row.insertCell(3);

    //     cell0.innerHTML = id_genero;
    //     cell1.innerHTML = genero;
    //     cell2.innerHTML = estado;
    //     cell3.innerHTML = "<a name='btnEditarGenero' id='id_genero' onclick='cargarModalGenero(this)' class='edit' >Editar</a>";

    // }
    //Begin Consultar Tipo Documento
    // var TipoDocumentoTabla = $('#tablaTipoDocumentos').dataTable();
    function ConsultarTD(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarTipoDocumento",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TipoDocumentoTabla.fnDestroy();
         TipoDocumentoTabla.children("tbody").html("");
         TipoDocumentoTabla.dataTable();        
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TipoDocumentoTabla.fnAddData([
                "<td ><div name='invisible'></div>"+jsonData[i].id_tipo_documento+"</td>"
                ,"<td >"+jsonData[i].descripcion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td class=''><a name='btnEditarTD' id='"+jsonData[i].id_tipo_documento+"' onclick='cargarTipoDocumentoEditar(this)'' class='edit'>Editar</a></td>"]);
            TipoDocumentoTabla.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });

    }
    
    function ConsulgtarEstadoCivil2(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarEstadoCivil",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         EstadoCivilTabla.fnDestroy();
         EstadoCivilTabla.children("tbody").html("");
         EstadoCivilTabla.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            EstadoCivilTabla.fnAddData([
                "<td ><div name='invisible'></div>"+jsonData[i].id_estado_civil+"</td>"
                ,"<td >"+jsonData[i].descripcion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td ><a name='btnEditarEstCiv' id='"+jsonData[i].id_estado_civil+"' onclick='cargarEstCiv(this)'' class='edit'>Editar</a></td>"]);
            EstadoCivilTabla.fnDraw();
         };
         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
        
        });
    }
    // var TablaEspecializacion;
    // function ConsultarEspcia(){
    //     TablaEspecializacion = $('#tablaEspecializacion').dataTable();
    // }
    function ConsultarEspecializacion(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarEspecializacion",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaEspecializacion.fnDestroy();
         TablaEspecializacion.children("tbody").html("");
         TablaEspecializacion.DataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaEspecializacion.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_especializacion+"</td>"
                ,"<td >"+jsonData[i].descripcion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td>"+descripcionEstado+"</td>"
                ,"<td ><a name='btnEditarEspcializacion' id='"+jsonData[i].id_especializacion+"' onclick='cargarEsp(this)' class='edit'>Editar</a></td>"] );
            TablaEspecializacion.fnDraw();
         };
        $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
        
        });
    }


    function ConsultarEscolaridadesRegis(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarEscolaridad",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaEscolaridad.fnDestroy();
         TablaEscolaridad.children("tbody").html("");
         TablaEscolaridad.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaEscolaridad.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_escolaridad+"</td>"
                ,"<td>"+jsonData[i].descripcion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='bntEditarEscolaridad' id='"+jsonData[i].id_escolaridad+"' type='button' 'onclick='cargarEsc(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaEscolaridad.fnDraw();
        };
        $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          
        });
    }

    function ConsultarDepartamento2(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarDepartamento",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaEscolaridad.fnDestroy();
         TablaEscolaridad.children("tbody").html("");
         TablaEscolaridad.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaEscolaridad.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_departamento+"</td>"
                ,"<td >"+jsonData[i].departamento+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td ><button name='btnEditarDepartamento' id='"+jsonData[i].id_departamento+"' type='button' 'onclick='cargarDepart(this)'' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaEscolaridad.fnDraw();
        };
        $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          
        });
    }

    function ConsultarMunicipios2(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarMunicipios",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaMunicipio.fnDestroy();
         TablaMunicipio.children("tbody").html("");
         TablaMunicipio.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaMunicipio.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_departamento+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].id_municipio+"</td>"
                ,"<td >"+jsonData[i].departamento+"</td>"
                ,"<td >"+jsonData[i].municipio+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td ><button name='btnEditarMuni' id='"+jsonData[i].id_departamento+"' type='button' 'onclick='cargarMunicipio(this)'' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaMunicipio.fnDraw();
         };
         $('div[name=invisible]').parent().css("display","none");

        }).fail(function(data){
          
        });
    }
    
   
    function ConsultarHabitosPersonal(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarHabitosPersonales",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaHabitosPersonales.fnDestroy();
         TablaHabitosPersonales.children("tbody").html("");
         TablaHabitosPersonales.DataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaHabitosPersonales.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_habitos_personales+"</td>"
                ,"<td >"+jsonData[i].descripcion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td ><button name='btnEditarHabPer' id='"+jsonData[i].id_habitos_personales+"' type='button' 'onclick='cargarHabPer(this)'' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaHabitosPersonales.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          
        });
    }

    function ConsultarFrecuencia2(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarFrecuencia",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaFrecuencia.fnDestroy();
         TablaFrecuencia.children("tbody").html("");
         TablaFrecuencia.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaFrecuencia.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_hab+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].id_frec+"</td>"
                ,"<td >"+jsonData[i].habito+"</td>"
                ,"<td >"+jsonData[i].frecuencia+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td ><button name='btnEditarFrecuencia' id='"+jsonData[i].id_frec+"' type='button' 'onclick='cargarFrec(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaFrecuencia.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }


    function ConsultarTipoAntecedente2(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarTipoAntecedente",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaTipoAntecendente.fnDestroy();
         TablaTipoAntecendente.children("tbody").html("");
         TablaTipoAntecendente.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaTipoAntecendente.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_tipo_antecedente+"</td>"
                ,"<td>"+jsonData[i].tipo_Antecedente+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarTipAnt' id='"+jsonData[i].id_tipo_antecedente+"' type='button' onclick='cargarTipAnt(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaTipoAntecendente.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }


    function ConsultarDistribucionAntecedente(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarDistribuciuonAntecedente",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaDistribucionAntecedente.fnDestroy();
         TablaDistribucionAntecedente.children("tbody").html("");
         TablaDistribucionAntecedente.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaDistribucionAntecedente.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_tipo_antecedente+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].id_clasificacion_antecedentecol+"</td>"
                ,"<td>"+jsonData[i].antecedente+"</td>"
                ,"<td>"+jsonData[i].distribucion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarDistriAntecedente' id='"+jsonData[i].id_clasificacion_antecedentecol+"' type='button' onclick='CargarDistribucionAntecedente(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaDistribucionAntecedente.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarPartesDelCuerpo(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarPartesCuerpo",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaPartesDelCuerpo.fnDestroy();
         TablaPartesDelCuerpo.children("tbody").html("");
         TablaPartesDelCuerpo.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaPartesDelCuerpo.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_parte_cuerpo+"</td>"
                ,"<td>"+jsonData[i].partesCuerpo+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarPartCuerTipAnt' id='"+jsonData[i].id_parte_cuerpo+"' type='button' onclick='cargarPartCuer(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaPartesDelCuerpo.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarDistribucionPartesDelCuerpo(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarDistribucionPartesCuerpo",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaDistribucionPartesCuerpo.fnDestroy();
         TablaDistribucionPartesCuerpo.children("tbody").html("");
         TablaDistribucionPartesCuerpo.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaDistribucionPartesCuerpo.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_clasePart+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].id_ParteCuer+"</td>"
                ,"<td>"+jsonData[i].ParteCuerpo+"</td>"
                ,"<td>"+jsonData[i].distribucionPC+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarDistribucionPC' id='"+jsonData[i].id_ParteCuer+"' type='button' onclick='CargarDistribucionParteCuerpo(this)' class='btn btn-primary btn-lg'>Editar</button></td>"] );
            TablaDistribucionPartesCuerpo.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarEstadoDistribucionPartesDelCuerpo(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarEstadoPartescuerpo",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaEstadoDistribucionPartesCuerpo.fnDestroy();
         tablaEstadoDistribucionPartesCuerpo.children("tbody").html("");
         tablaEstadoDistribucionPartesCuerpo.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].est == 0) ? 'Activo' : 'Inactivo';
            tablaEstadoDistribucionPartesCuerpo.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_estado+"</td>"
                ,"<td>"+jsonData[i].estado+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].id_clase_parte_cuerpo+"</td>"
                ,"<td >"+jsonDate[i].parteCuerpo+"</td>"
                ,"<td >"+jsonDate[i].distribucion+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].est+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><a name='btnEditarEstadoDistribucionParteCuerpo' id='"+jsonData[i].id_estado+"' onclick='cargarEstDisParCue(this)' class='btn btn-primary btn-lg'>Editar</a></td>"] );
            tablaEstadoDistribucionPartesCuerpo.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarAparatoSistema(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarAparatosistema",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaAparatoSistema.fnDestroy();
         TablaAparatoSistema.children("tbody").html("");
         TablaAparatoSistema.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaAparatoSistema.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_aparato_sistema+"</td>"
                ,"<td>"+jsonData[i].nombre_aparato+"</td>"
                ,"<td>"+jsonData[i].aparatoSistema+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarApaSis' id='"+jsonData[i].id_aparato_sistema+"' type='button' onclick='cargarApaSisEditar(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaAparatoSistema.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarMomento(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarMomento",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaMomento.fnDestroy();
         tablaMomento.children("tbody").html("");
         tablaMomento.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            tablaMomento.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_momento+"</td>"
                ,"<td>"+jsonData[i].momento+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarMomento' id='"+jsonData[i].id_momento+"' type='button' onclick='cargarMomentoM(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            tablaMomento.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarParentesco(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarParentesco",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaParente.fnDestroy();
         tablaParente.children("tbody").html("");
         tablaParente.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            tablaParente.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_parentesco+"</td>"
                ,"<td>"+jsonData[i].Parentesco+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarParentesco' id='"+jsonData[i].id_parentesco+"' type='button' onclick='CargarParentesco(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            tablaParente.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarRecomendacion(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarParentesco",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaParente.fnDestroy();
         tablaParente.children("tbody").html("");
         tablaParente.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            tablaParente.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_parentesco+"</td>"
                ,"<td>"+jsonData[i].Parentesco+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarParentesco' id='"+jsonData[i].id_parentesco+"' type='button' onclick='CargarParentesco(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            tablaParente.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarTipoRango(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarTipoRango",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaTipoRango.fnDestroy();
         tablaTipoRango.children("tbody").html("");
         tablaTipoRango.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            tablaTipoRango.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_tipo_rango+"</td>"
                ,"<td>"+jsonData[i].tipoRango+"</td>"
                ,"<td ><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td >"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarTipoRango' id='"+jsonData[i].id_tipo_rango+"' type='button' onclick='CargarTipoRango(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            tablaTipoRango.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarRango(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarRango",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         TablaRango.fnDestroy();
         TablaRango.children("tbody").html("");
         TablaRango.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            TablaRango.fnAddData( [
                "<td><div name='invisible'></div>"+jsonData[i].id_rango+"</td>"
                ,"<td><div name='invisible'></div>"+jsonData[i].id_tipo_rango+"</td>"
                ,"<td>"+jsonData[i].Rangos+"</td>"
                ,"<td>"+jsonData[i].TipoRangoC+"</td>"
                ,"<td><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td>"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarRangos' id='"+jsonData[i].id_rango+"' type='button' onclick='CargarRangos(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            TablaRango.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarClasificacion(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarClasificacion",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaClasificacion.fnDestroy();
         tablaClasificacion.children("tbody").html("");
         tablaClasificacion.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            tablaClasificacion.fnAddData( [
                "<td ><div name='invisible'></div>"+jsonData[i].id_clasificacion+"</td>"
                ,"<td>"+jsonData[i].clasificacion+"</td>"
                ,"<td><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td>"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarClasificacionM' id='"+jsonData[i].id_clasificacion+"' type='button' onclick='Cargarclasificacion(this)' class='btn btn-primary btn-lg' >Editar</button></td>"] );
            tablaClasificacion.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    function ConsultarAlimentos(){
        $.ajax({
          dateType: 'html',
          Type: 'POST',
          url: url+"/Datos/ConsultarAlimentos",

        }).done(function(data){
        var jsonData = JSON.parse(data); 
         tablaAlimentos.fnDestroy();
         tablaAlimentos.children("tbody").html("");
         tablaAlimentos.dataTable();
         for (var i = jsonData.length - 1; i >= 0; i--) {
            descripcionEstado = (jsonData[i].estado == 0) ? 'Activo' : 'Inactivo';
            tablaAlimentos.fnAddData( [
                "<td><div name='invisible'></div>"+jsonData[i].id_alimento+"</td>"
                ,"<td><div name='invisible'></div>"+jsonData[i].id_clasificacion+"</td>"
                ,"<td><div name='invisible'></div>"+jsonData[i].id_unidad_medida+"</td>"
                ,"<td>"+jsonData[i].Clasificacion+"</td>"
                ,"<td>"+jsonData[i].unidadMedida+"</td>"
                ,"<td>"+jsonData[i].Alimento+"</td>"
                ,"<td>"+jsonData[i].peso+"</td>"
                ,"<td>"+jsonData[i].carbohidratos+"</td>"
                ,"<td>"+jsonData[i].proteinas+"</td>"
                ,"<td>"+jsonData[i].grasas+"</td>"
                ,"<td>"+jsonData[i].indice_Glucemico+"</td>"
                ,"<td><div name='invisible'></div>"+jsonData[i].estado+"</td>"
                ,"<td>"+descripcionEstado+"</td>"
                ,"<td><button name='btnEditarAlimentosM' id='"+jsonData[i].id_alimento+"' type='button' onclick='CargarAlimentosEditar(this)' data-toggle='modal' data-target='#ModalAlimentos' class='btn btn-primary btn-lg'>Editar</button></td>"] );
            tablaAlimentos.fnDraw();
         };

         $('div[name=invisible]').parent().css("display","none");
        }).fail(function(data){
          alert(data);
        });
    }

    // $('#Navegacion').modal( { max-height: 80%; overflow-y: auto; .modal-body { max-height: none; text-align: center; } });
    $('#Navegacion').modal({ backdrop: true, keyboard: true, show: false }).css({ make width 90% of screen 'width': function () { return ($(document).width() * .9) + 'px'; }, center model 'margin-left': function () { return -($(this).width() / 2); } });