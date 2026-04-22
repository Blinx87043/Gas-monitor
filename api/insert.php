<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../app/app.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $input_data = json_decode(file_get_contents('php://input'), true);

    if (isset($input_data['ratio'])) {

        $ratio = floatval($input_data['ratio']);

        if ($ratio >= 9)
            $status = "Estable";
        elseif ($ratio <= 8.99 && $ratio >= 6.1)
            $status = "Alarma";
        elseif ($ratio <= 6)
            $status = "Peligro";

        $stmt = $conn->prepare("INSERT INTO gas (sensor,status, datatime) VALUES (:sensor,:status, NOW())");
        $stmt->bindParam(':sensor', $ratio);
        $stmt->bindParam(':status', $status);
        if ($stmt->execute()) {
            send_email($status);

            echo json_encode([
                'success' => true,
                'message' => 'Registrado correctamente',
                'ratio' => $ratio,
                'estado' => $status
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

function send_email($status)
{
    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port = $_ENV['SMTP_PORT'];

        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Gas Monitor Alerta');
        $mail->addAddress($_ENV['SET_EMAIL_TO'], 'Administrador');

        $mail->isHTML(true);
        $mail->Subject = 'Emergencia';
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; color: #333;'>
            <h2 style='color: #d9534f;'>ALERTA DE SEGURIDAD</h2>
            <p>Se ha detectado una concentración peligrosa de gas.</p>
            <ul>
                <li><strong>Nivel: </strong> {$status}</li>
                <li><strong>Fecha y hora: </strong> {date('Y-m-d H:i:s')}</li>
            </ul>
            <div style='background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px;'>
                <h3 style='margin-top: 0;'>INSTRUCCIONES:</h3>
                <ol>
                    <li>Evacúe el área inmediatamente.</li>
                    <li>No accione interruptores eléctricos.</li>
                    <li>Llame a los servicios de emergencia desde zona segura.</li>
                </ol>
            </div>
        </div>";

        $mail->send();
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error de PHPMailer: {$mail->ErrorInfo}";
    }
}