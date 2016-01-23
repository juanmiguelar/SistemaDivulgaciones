<?php
session_start();
if (isset($_SESSION['username'])) {
	# code...
	echo $_SESSION['username'];
}else{
	echo "0";
}
 ?>