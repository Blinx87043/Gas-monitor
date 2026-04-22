<?php 

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];

try {
	$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
} catch(PDOException $e) {
	echo "Ocurrio un error: " . $e->getMessage();
}