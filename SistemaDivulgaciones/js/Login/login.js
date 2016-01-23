$(document).ready(function(){
	formloginSubmit();
});

function formloginSubmit(){

	$('#form_login').submit(function(e){

		e.preventDefault();

		var cedula = $('#cedula').val();
		var password =$('#password').val();

		var data = 'cedula='+cedula+'&password='+password;

		$.ajax({
			url: 'php/loginserver.php',
			type: 'POST',
			data: data,
			beforeSend: function(){
			},
			success: function(response){
				if (response) {
					window.location = "Home.html";
				}else{
					swal("Verifica tus datos", "No te podemos dejar entrar")
				}		

			}
		});
	});
}