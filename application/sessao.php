<?php
session_start();

if($_SESSION['nivel'] == "Admin"){

	if ($_SESSION['nivel'] != "Admin") {
		header("location:corpo/corpo.php");
	}

}else if($_SESSION['nivel'] == "Sup"){

	if ($_SESSION['nivel'] != "Sup") {
		header("location:corpo/corpo.php");
	}

}


?>
