            jQuery(function(){
                jQuery("#ValidField").validate({
                    expression: "if (VAL.match(/^[a-zA-Z\s]+$/i)) return true; else return false;",
                    message: "Campo Obligatorio"
                });
                jQuery("#ValidField_1").validate({
                    expression: "if (VAL.match(/^[a-zA-Z\s]+$/i)) return true; else return false;",
                    message: "Campo Obligatorio"
                });
                jQuery("#ValidField_2").validate({
                    expression: "if (VAL.match(/^[a-zA-Z\s]+$/i)) return true; else return false;",
                    message: "Campo Obligatorio"
                });
                jQuery("#ValidField_3").validate({
                    expression: "if (VAL.match(/^[a-zA-Z\s]+$/i)) return true; else return false;",
                    message: "Campo Obligatorio"
                });
                jQuery("#ValidNumber").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Tipo Numérico"
                });
                jQuery("#ValidInteger").validate({
                    expression: "if (VAL.match(/^[0-9]*$/) && VAL) return true; else return false;",
                    message: "Invalido(*-%.,^)"
                });
                jQuery("#ValidDate").validate({
                    expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
                    message: "Fecha Invalida"
                });
                jQuery("#ValidEmail").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Correo no valido"
                });
                jQuery("#ValidPassword").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Min 5 caracteres"
                });
                jQuery("#ValidConfirmPassword").validate({
                    expression: "if ((VAL == jQuery('#ValidPassword').val()) && VAL) return true; else return false;",
                    message: "Contraseñas no coinciden"
                });
                jQuery("#ValidSelection").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                jQuery("#ValidSelection_1").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                jQuery("#ValidMultiSelection").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please make a selection"
                });
                jQuery("#ValidRadio").validate({
                    expression: "if (isChecked(SelfID)) return true; else return false;",
                    message: "Please select a radio button"
                });
                jQuery("#ValidCheckbox").validate({
                    expression: "if (isChecked(SelfID)) return true; else return false;",
                    message: "Please check atleast one checkbox"
                });
				jQuery('.AdvancedForm').validated(function(){
					alert("Use this call to make AJAX submissions.");
				});
            });