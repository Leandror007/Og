<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bdog";

// create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// check connection 
if($connect->connect_error) {
	die("Connection Failed : " . $connect->connect_error);
} else {
	// echo "Successfully Connected";
}

/////////////////////////////////////////////////////////////////////////
try {
    $conexao = New PDO ("mysql:host=localhost;dbname=$dbname","$username","$password");
} catch (Exception $e) {
    echo $e->getMessage();
}
