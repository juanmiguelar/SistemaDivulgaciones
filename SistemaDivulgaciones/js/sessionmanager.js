$(document).ready(function(){
	welcome();
});

function welcome(){

	$.ajax({
		url: 'php/sessionmanager.php',
		success: function(response){
			if (response !== "0") {
				swal("Bienvenido " + response + "!");
			}else{
				window.location = "index.html";
			}
		}

	})

}