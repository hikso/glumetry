var tabActual = 1;
$(document).ready(function(){
    $("html, body").animate({scrollTop:"0px"});
    $(".bar").attr('style', 'width: 16.5%;');
    $("li[name=li]").on('click', function(){

    	var numberCase = parseInt($(this).attr("id"));
    	if (numberCase != tabActual) {
			if(numberCase < tabActual){
				tabActual = numberCase;
				return;
			}
	    	switch (tabActual){
	    		case 1:
	    			if ($('#txtobservacionv').val() == "") {
	    				$("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Debe ingresar la observación.</div>");
	    				$('#txtobservacionv').focus();
	    				return false;	    				
	    			}else{
	    				tabActual++;
	    				actualizarTab(tabActual);
	    				return true;
	    			};
	    			break;
	    		case 2:
						var campos = camposVaciosClasi_ante();
	    				if(campos[0] != undefined){

	    					$("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Faltan campos por llenar</div>");    
	    					for (var i = campos.length - 1; i >= 0; i--) {

                			$( "#"+campos[i]).parent("div").attr('class', 'input-append control-group error');

            				};					
	    					return false;
	    				}else{
		    				tabActual++;
	    					actualizarTab(tabActual);
		    				return true;	
	    				}
	    				
	    			break;
	    		case 3:

	    			if($('#txtpadecimiento').val() == ""){
	    				$("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Debe ingresar la observación.</div>");
	    				$('#txtpadecimiento').focus();
	    				return false;
	    			}else{
	    				tabActual++;
	    				actualizarTab(tabActual);
		    			return true;
	    			}
	    			break;
	    		case 4:
	    			var campoapa = camposVaciosaparato();
	    			if(campoapa[0] != undefined){
	    				$("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Faltan campos por llenar</div>");  
	    				for (var i = campoapa.length - 1; i >= 0; i--) {

                			$( "#"+campoapa[i]).parent("div").attr('class', 'input-append control-group error');

            				};  				
	    				return false;
	    			}else{
	    				tabActual++;
	    				actualizarTab(tabActual);
		    			return true;
	    			}
	    			
	    			break;
	   			case 5:
	    				$(".bar").attr('style', 'width: 82.8%;');
	    				$("#title-widget").html("Formulario: Exploración Regional");
	    			break;
	   			case 6:
	    				$(".bar").attr('style', 'width: 100%;');
	    				$("#title-widget").html("Formulario: Impresión y Tratamiento");
	    			break;

	    		default:
	    			break;
	    	}
    	};										
    });
	function actualizarTab(caso)
	{
    	switch (caso){
    		case 1:
    				$(".bar").attr('style', 'width: 16.5%;');
    				$("#title-widget").html("Formulario: Ficha de identificación");
    			break;
    		case 2:
    				$(".bar").attr('style', 'width: 33.3%;');
    				$("#title-widget").html("Formulario: Antecedentes");
    			break;
    		case 3:
    				$(".bar").attr('style', 'width: 49.8%;');
    				$("#title-widget").html("Formulario: Padecimiento Actual");
    			break;
    		case 4:
    				$(".bar").attr('style', 'width: 66.3%;');
    				$("#title-widget").html("Formulario: Aparato y Sitemas");
    			break;
   			case 5:
    				$(".bar").attr('style', 'width: 82.8%;');
    				$("#title-widget").html("Formulario: Exploración Regional");
    			break;
   			case 6:
    				$(".bar").attr('style', 'width: 100%;');
    				$("#title-widget").html("Formulario: Impresión y Tratamiento");
    			break;

    		default:
    			break;
    	}
	}
	$('input[type="checkbox"]').on('change', function(){
		if ($(this).is(":checked")) {


			if ($(this).attr('name') == 'aparatete'){


				var aparatosis = $(this).attr('id');

				$('textarea[id^='+aparatosis+']').css("display","inline");
				$('input[type^=checkbox][id^='+aparatosis+']').prop('disable',false);

				var push_aparatos = {"id_aparato" : aparatosis , "descripcion_aparato" : ''};
				arrayaparato.push(push_aparatos);

			}else{


				
			}


			if ($(this).attr('name') == 'sintomasg'){

				var sintomas = $(this).val();
				var push_sintomas = {"id_sintomas" : sintomas}; 
				arraysintomas.push(push_sintomas);

			}else{


				if($(this).attr('name') == 'yolo'){
		    //Obtniendo Antecedentes
		    var LastHeredoSelect = $(this).val();
		    $('select[id^='+LastHeredoSelect+']').css("display","inline");
		    $('input[type^=text][id^='+LastHeredoSelect+']').prop('disabled', false);
		    var push_clasi_ante = {"id_clasi" : LastHeredoSelect , "descripcion_clasi" : '', "id_parentesco" : ''};
		    //pusheando el array
		    clasi_ante.push(push_clasi_ante);
		};
	};    

}else
{	

			//////////// validacion para borrar coasa raras
			if ($(this).attr('name') == 'aparatete'){
				var aparatosis = $(this).attr('id');
				$('textarea[id^='+aparatosis+']').css("display","none");
				$('input[type^=checkbox][id^='+aparatosis+']').prop('disable',true);
				arrayaparato = jQuery.grep(arrayaparato,function(valueapa){
					return valueapa.id_aparato != aparatosis;
				});

			};

			if ($(this).attr('name') == 'yolo'){
				var LastHeredoSelect = $(this).val();
				$('select[id^='+LastHeredoSelect+']').css("display","none");
				$('input[type^=text][id^='+LastHeredoSelect+']').prop('disabled', true);
				clasi_ante = jQuery.grep(clasi_ante,function(value){
					return value.id_clasi != LastHeredoSelect;

				});
			};

		  //validacion para borrar el id metido en un json de los sintomas
		  if ($(this).attr('name') == 'sintomasg') {

		  	var sintomas = $(this).val();
		  	arraysintomas = jQuery.grep(arraysintomas,function(values){
		  		return values.id_sintomas != sintomas;

		  	});
		  };
		};
	});

$('input[type="radio"]').on('change', function(){
	if($(this).is(":checked")){

		var name_frecu = $(this).attr('name');
		var frecuencia = $(this).attr('id');
			for (var i = arrayfrecuencia.length - 1; i >= 0; i--) {
				if(arrayfrecuencia[i].id_nopato == name_frecu)
				{
					arrayfrecuencia[i].id_frecuencia = frecuencia
				}
			}



		var name_parte = $(this).attr('name');
		var parte_cuerpo = $(this).attr('id');
		for (var i = arrayParte.length - 1; i >= 0; i--) {
			if(arrayParte[i].id_parte == name_parte)
			{
				arrayParte[i].id_estadopc = parte_cuerpo
			}
		};

	}else{



	};

});

if ($('#btnjson').length !== 0) {

	$('#btnjson').on('click', function(){

		for (var i = clasi_ante.length - 1; i >= 0; i--) {
			if ($('select[id^='+clasi_ante[i].id_clasi+']').length != 0) {
				if ($('select[id^='+clasi_ante[i].id_clasi+']').val() =="") 
				{
					$('select[id^='+clasi_ante[i].id_clasi+']').focus();	
				} else
				{
					clasi_ante[i].id_parentesco = $('select[id^='+clasi_ante[i].id_clasi+']').val();
				}

			}else{
				if ($('input[id^='+clasi_ante[i].id_clasi+']').attr( "type" ) == "text") {
					if ($('input[id^='+clasi_ante[i].id_clasi+']').val() =="") 
					{
						$('input[id^='+clasi_ante[i].id_clasi+']').focus();	
					} else
					{
						clasi_ante[i].descripcion_clasi = $('input[id^='+clasi_ante[i].id_clasi+']').val();
					}
				};
			};
		};

		for (var a = arrayaparato.length - 1; a >= 0; a--) {
			if ($('textarea[id^='+arrayaparato[a].id_aparato+']').val() == "") {
				$('textarea[id^='+arrayaparato[a].id_aparato+']').focus();
			}else{
				arrayaparato[a].descripcion_aparato = $('textarea[id^='+arrayaparato[a].id_aparato+']').val();
			};
		};



		var padecimiento,impresion,tratamiento,fecha,observacionv
		padecimiento = $('#txtpadecimiento').val();
		impresion = $('#txtimpresion').val();
		tratamiento = $('#txttratamiento').val();
		fecha = $('#fechav').val();
		observacionv = $('#txtobservacionv').val();



		menarca = $('#element1').val();
		ritmom = $('#txtritmo').val();
		menorrea = $('#txtrea').val();
		ivsa = $('#txtivsa').val();
		nparejas = $('#txtnumparejas').val();
		g = $('#g').val();
		a = $('#a').val();
		p = $('#p').val();
		c = $('#c').val();
		fum = $('#element2').val();
		fpp = $('#element3').val();
		fup = $('#element4').val();
		climaterio = $('#txtclimaterio').val();
		panificacion = $('#txtplanificacion').val();
		vaginal = $('#element5').val();
		mamas = $('#element6').val();

		// "element1" : menarca, "txtritmo" : ritmom, "txtrea" : menorrea, "txtivsa" : ivsa, "txtnumparejas" : nparejas, "g" : g, "a" : a, "p" : p, "c" : c, "element2" : fum, "element3" : fpp, "element4" : fup, "txtclimaterio" : climaterio, "txtplanificacion" : panificacion, "element5" : vaginal, "element6" : mamas
		camposVacios = camposVaciosHC(textareas);
		camposVaciosClasi_antes = camposVaciosClasi_ante();
		if (camposVacios[0] == undefined) {
			if (camposVaciosClasi_antes[0] == undefined) {
				$.ajax({
					type: "POST",
					url: url + "/historia_Clinica/guardar_historiac",
					data: { "txtpadecimiento": padecimiento, "txtimpresion": impresion, "txttratamiento" : tratamiento, "txtobservacionv" : observacionv, }
				}).done(function(result){
					
					window.open(url+"/historia_Clinica/GenerarPdfHc");


				}).fail(function(){
					alert("no manda");
				}).always(function(){

				});


				$.ajax({
					type: "POST",
					url: url + "/historia_Clinica/guardar_historia_elresto",
					data: { "clasi_ante": clasi_ante, "arrayfrecuencia": arrayfrecuencia, "arraysintomas" : arraysintomas, "arrayaparato" : arrayaparato, "arrayParte" : arrayParte,"element1" : menarca, "txtritmo" : ritmom, "txtrea" : menorrea, "txtivsa" : ivsa, "txtnumparejas" : nparejas, "g" : g, "a" : a, "p" : p, "c" : c, "element2" : fum, "element3" : fpp, "element4" : fup, "txtclimaterio" : climaterio, "txtplanificacion" : panificacion, "element5" : vaginal, "element6" : mamas}
				}).done(function(result){
					alert(result);

					$("#error").append(result);

				}).fail(function(){
					alert("no manda");
				}).always(function(){

				});
			}else{
	            for (var i = camposVaciosClasi_antes.length - 1; i >= 0; i--) {

                $( "#"+camposVaciosClasi_antes[i]).parent("div").attr('class', 'control-group error');

	            };
	            $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Falto un campo por llenar en el formulario.</div>");
	            $("html, body").animate({scrollTop:"0px"});
	            $( "#"+camposVaciosClasi_antes[camposVaciosClasi_antes.length - 1]).focus();
			};

		}else{
            for (var i = camposVacios.length - 1; i >= 0; i--) {

                $( "#"+camposVacios[i]).parent("div").parent(".control-group").attr('class', 'control-group error');

            };
            $("#msg").html("<div  class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> Algunos campos son requeridos.</div>");
            $("html, body").animate({scrollTop:"0px"});
            $( "#"+camposVacios[camposVacios.length - 1]).focus();
		};
	});

}



var textareas = $("textarea");

function camposVaciosHC(elements)
{
	displays = [];
	display = $("textarea[style$='display:none']");
	for (var i = display.length - 1; i >= 0; i--) {
		displays.push(display[i].id);
	};
	vacios = [];

	    for (var i = elements.length - 1; i >= 0; i--) {
			    if ($.inArray(elements[i].id,displays) == -1)
			    {
		            valor = elements[i].value;
		            if( valor == ""){
		            vacios.push(elements[i].id);
				}
	        };
	    };
    return vacios;
}
function camposVaciosClasi_ante()
{
	vacios= [];
	for (var i = clasi_ante.length - 1; i >= 0; i--) {
		if (clasi_ante[i].descripcion_clasi != "" || clasi_ante[i].id_parentesco != "") { break; };
			if ($("#"+clasi_ante[i].id_clasi).val() == "") {
				vacios.push(clasi_ante[i].id_clasi);
			};
	};
	return vacios;
}

function camposVaciosaparato()
{
	vacios= [];
	for (var i = arrayaparato.length - 1; i >= 0; i--) {
		if (arrayaparato[i].descripcion_aparato != "") { break; }
			if ($("textarea[id="+arrayaparato[i].id_aparato+"]").val() == "") {
				vacios.push(arrayaparato[i].id_aparato);
			}
	};
	return vacios;
}



$("textarea").keypress(function(e) {
  
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
                 && (code != 32) // espacio
                 && (code < 47 || code > 58) //numeros
                 && (code != 44) // comas
        ) 
    {
        return false;
    }
});
$('input[type=text]').keypress(function(e) {

  var code = e.keyCode || e.which;
  var value = $(this).val();
    if (

                    (code < 97 || code > 122)//letras mayusculas
                && (code < 65 || code > 90) //letras minusculas
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
                 && (code != 32) // espacio
                 && (code < 47 || code > 57) //numeros
                 && (code != 44) // comas

        ) 
    {
        return false;
    }
});



});
