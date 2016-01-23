$(document).ready(function(){
	refrescar();
});

function refrescar () {
	// body...

	$('#refrescar').click(function(e){
			e.preventDefault();
			$.ajax({
				url: "php/CargarPublicaciones.php",
				success: function(data){
					$('#wall').html(data);
				}
			});
		}
	);
}