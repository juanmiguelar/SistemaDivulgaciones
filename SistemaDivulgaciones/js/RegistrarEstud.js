
$(document).ready(function(){
	// Cuando se termine de cargar la pagina se llamara a este metodo declarado abajo
	formSubmit();
});

// Metodo que extrae los datos del input
function formSubmit(){

	$('#formReg').submit(function(e){
		// Este metodo nos ayuda a preparar el medio de comunicacion con la DB
		e.preventDefault();
		
		var nombre = $('#nombre').val();
		var cedula = $('#cedula').val();
		var password = $('#password').val();
		var edad = $('#edad').val();
		var sexo = $('input:radio[name=sexo]:checked').val();
		var correo = $('#correo').val();
		var carnet = $('#carnet').val();
		var activo_Val = $('input:radio[name=activo]:checked').val();
		var	activo = (activo_Val == "true" ? 1 : 0);
		var anoCursante = parseInt($('#anoCursante').val());

		var data = 
		  'nombre=' + nombre
		+ '&cedula=' + cedula
		+ '&password=' + password
		+ '&edad=' + edad
		+ '&sexo=' + sexo
		+ '&correo=' + correo
		+ '&carnet=' + carnet
		+ '&activo=' + activo
		+ '&anoCursante=' + anoCursante;

		// url: ubicacion del php
		// type: metodo de envio
		// data: la informacion que queremos enviar
		// beforeSend: Evento que captura el momento antes de ser enviada la informacion
		// success: Evento que captura el momento donde la informacion fue enviada
		$.ajax({

			url: 'php/RegistrarEstudiante.php',
			type: 'POST',
			data: data,
			beforeSend: function(){
				$('#submitBottom').text("Espera...");
			},
			success: function(response){
				$('#submitBottom').text("Registrar");
				if (response) {
					alert("Ya puedes entrar a tu perfil");
					window.location = "index.html";	
				}else{
					swal("Hubo un error", "Quizá la cedula o carnet ya esta registrada, o hay problemas con el servidor");
				}
				
			}
		});
	});
};

