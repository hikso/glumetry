//Documento para realizar validaciones con JQuery vallidation app
$(document).ready(function() {

	$("#main-content").validate({
		rules: {
			txtCho: {
				required: true,
				maxlength: 2
			}
		},
		messages: {
			txtCho: {
				required: "as",
				maxlength: "es"
			}
		}
	});
});