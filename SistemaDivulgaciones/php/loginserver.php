<?php 
require_once('dbcontroller.php');
session_start();
$dbcontroller = new DBController();

$cedula = $_POST['cedula'];
$password = $_POST['password'];

//$cedula = "3cdbLK2vl7mP";
//$password = "Suafj7Qct9hYNaQuV";

$query = "CALL login_usuario('".$cedula."', '".$password."');";
$resultArray = $dbcontroller->runQuery($query);

if (!empty($resultArray)) {
	# code...
	$_SESSION['username'] = $cedula;
	echo true;
}else{
	echo false;
}
 ?>