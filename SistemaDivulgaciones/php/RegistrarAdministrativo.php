<?php 

require_once('dbcontroller.php');
$dbcontroller = new DBController();

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$password = $_POST['password'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];
$posicionJerarquica = $_POST['posicionJerarquica'];
$nombreDepartamento = $_POST['nombreDepartamento'];

//$cedula = "2074s346";
//$nombre = "Miguel";
//$edad = 20;
//$password = "pass";
//$sexo = 'h';
//$correo = "correo@correo.com";
//$posicionJerarquica = "Jefe";
//$nombreDepartamento = "Jefatura";

$existe1 = $dbcontroller->runQuery("Select Buscar_Cedula_Coordinador('".$cedula."') as resultado");
$existe2 = $dbcontroller->runQuery("Select Buscar_Cedula_Usuario('".$cedula."') as resultado");
$existe3 = $dbcontroller->runQuery("Select Buscar_Nombre_Departamento('".$nombreDepartamento."') as resultado");

// Si la cedula existe en el sistema
if (($existe1['resultado'] == "1" || $existe2['resultado']) == "1") {
	# code...
	// No se va a poder registrar
	echo false;
}else{

// Si esta disponible
	if ($existe3['resultado'] == "1") {
		# code...
		$query = "CALL Insert_Administrativo_Departamento_Existe('".$cedula."', '".$nombre."', ".$edad.", '".$sexo."', '".$correo."', '".$password."', '".$nombreDepartamento."', '".$posicionJerarquica."');";		
		$operation = $dbcontroller->runInsertQuery($query);

		echo $operation;
	}else{
		
		$query = "CALL Insert_Administrativo_Departamento_NoExiste('".$cedula."', '".$nombre."', ".$edad.", '".$sexo."', '".$correo."', '".$password."', '".$nombreDepartamento."', '".$posicionJerarquica."');";
		$operation = $dbcontroller->runInsertQuery($query);

		echo $operation;
	}
}
 ?>