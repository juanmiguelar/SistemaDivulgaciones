<?php
class DBController {
	private $host = "localhost";
	private $user = "admin";
	private $password = "admin";
	private $database = "basedatos_sistema_acreditacion";

	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password) or die("problemas al conectar");
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn) 
			or die("problemas al conectar la bd");
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
			
	}

	function runInsertQuery($query) {
		$result = mysql_query($query, $this->connectDB());
		if ($result == null) {
			# code...
			return false;
		}else{
			return true;
		}		
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>