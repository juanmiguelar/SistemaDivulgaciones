<?php 
	session_start();
	require_once('dbcontroller.php');
	require_once('controladorConsultas.php');
	$dbcontroller = new DBController();
	// Obtengo la información del usuario
	$cedula = $_SESSION['username'];
	// Obtengo las publicaciones que puede ver el usuario
	$result = $dbcontroller->runQuery("call Ver_Publicaciones('$cedula')");
?>
<!-- Empiezo la lista de publicaciones -->
<ul>
<?php

	if (is_iterable($result)) {
		foreach ($result as $publicacion) {
		# code...
 ?>

<li>
	<article>
		<center>
			<header id="titulo"> <h4> <?php echo $publicacion['TITULO_PUBLICACION'] ?> </h4> </header> <br>
			<section id="emisor"> <?php echo $publicacion['EMISOR'] ?> </section> <br>
			<section id="destinatario"> <?php echo $publicacion['DESTINATARIO'] ?> </section> <br>
			<section id="fecha"> <?php echo $publicacion['FECHA_NOTIFICACION'] ?> </section> <br>
			<section id="content">
				<p id="descripcion"> <?php echo $publicacion['DESCRPCION_PUBLICACION'] ?> </p>
			</section>
		</center>
	</article>
</li>

 <?php 
 		} // Cierro el foreach
 	} else {
 		?>

 		<p>No hay publicaciones que mostrar</p>

 	<?php
 	}

  ?>

  </ul>