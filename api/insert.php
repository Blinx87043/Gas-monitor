<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");



include('../config/database.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $input_data = json_decode(file_get_contents('php://input'), true);

    if (isset($input_data['ratio'])) {

        $ratio = floatval($input_data['ratio']);

    if ($ratio >= 9) {$estado = "Estable";} 
    elseif ($ratio <= 8.99 && $ratio >= 6.1) { $estado = "Alarma";}
    elseif ($ratio <= 6){$estado = "Peligro";}

        
        $stmt = $conn->prepare("INSERT INTO gas (sensor,status, datatime) VALUES (:sensor,:status, NOW())");
        $stmt->bindParam(':sensor', $ratio); 
        $stmt->bindParam(':status', $estado); 
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Registrado correctamente',
                'ratio' => $ratio,
                'estado' => $estado
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'Error al insertar'
            ]);
        }

    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Ratio no enviado'
        ]);
    }

} else {
    http_response_code(405);
    echo json_encode([
        'error' => 'Solo se permiten peticiones POST'
    ]);
}









/*?php
include('../config/database.php');

if (isset($_GET['ratio'])) {

    $ratio = floatval($_GET['ratio']);

    
    $estado = ($ratio <=8 && $ratio)  ;

     $stmt = $conn->prepare("INSERT INTO leds (status, datatime) VALUES (?, NOW())");
    $stmt->execute([$ratio]);
    echo "OK";
} else {
    echo "No data";
} */