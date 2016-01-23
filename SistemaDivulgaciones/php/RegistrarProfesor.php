<?php 

require_once('dbcontroller.php');
$dbcontroller = new DBController();

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$carnet = $_POST['carnet'];
$nacionalidad = $_POST['nacionalidad'];
$direccion = $_POST['direccion'];

$existe1 = $dbcontroller->runQuery("Select Buscar_Cedula_Coordinador('".$cedula."') as resultado");
$existe2 = $dbcontroller->runQuery("Select Buscar_Cedula_Usuario('".$cedula."') as resultado");


// Si la cedula existe en el sistema o el carnet
if (($existe1['resultado'] == "1" || $existe2['resultado']) == "1") {
	# code...
	// No se va a poder registrar
	echo false;
}else{

	// Si esta disponible
		# code...
	$query = "CALL Insert_Profesor('".$cedula."', '"
		.$nombre."', ".$edad.", '"
		.$sexo."', '".$correo."', '".$password."', null, '".$nacionalidad."', '".$direccion."');";		

	$operation = $dbcontroller->runInsertQuery($query);

	echo $operation;
}
 ?>