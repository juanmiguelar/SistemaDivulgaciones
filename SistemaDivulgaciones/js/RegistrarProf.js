
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
		var nacionalidad = $('#nacionalidad').val();
		var direccion = $('#direccion').val();

		var data = 
		  'nombre=' + nombre
		+ '&cedula=' + cedula
		+ '&password=' + password
		+ '&edad=' + edad
		+ '&sexo=' + sexo
		+ '&correo=' + correo
		+ '&carnet=' + carnet
		+ '&nacionalidad=' + nacionalidad
		+ '&direccion=' + direccion;

		alert(data);

		// url: ubicacion del php
		// type: metodo de envio
		// data: la informacion que queremos enviar
		// beforeSend: Evento que captura el momento antes de ser enviada la informacion
		// success: Evento que captura el momento donde la informacion fue enviada
		$.ajax({

			url: 'php/RegistrarProfesor.php',
			type: 'POST',
			data: data,
			beforeSend: function(){
				$('#submitBottom').text("Espera...");
			},
			success: function(response){
				// swal("Buen trabajo " + response, "Has sido registrado", "success");
				$('#submitBottom').text("Registrar");
				if (response) {
					alert("Ya puedes entrar a tu perfil");
					window.location = "index.html";	
				}else{
					swal("Hubo un error", "Quizá la cedula ya esta registrada, o hay problemas con el servidor");
				}
				
			}
		});
	});
};

