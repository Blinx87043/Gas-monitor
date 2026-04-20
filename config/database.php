<?php 

$host = 'localhost'; // 127.0.0.1
$dbname = 'gasserver'; // nombre de la base de datos
$user = 'root';
$password = '';

try {
	$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
} catch(PDOException $e) {
	echo "Ocurrio un error: " . $e->getMessage();
}