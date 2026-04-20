<?php
// Utilidad simple para generar contraseñas encriptadas para la base de datos
$password_generada = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $password_plana = $_POST['password'];
    // Encriptar la contraseña usando BCRYPT (el estándar más seguro y recomendado en PHP)
    $password_generada = password_hash($password_plana, PASSWORD_BCRYPT);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generador de Hashes para Contraseñas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f6f9;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .result {
            background: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
            word-wrap: break-word;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>Generar Contraseña Encriptada</h2>
        <p>PHP requiere que las contraseñas en la base de datos estén encriptadas (Hasheadas) para que
            <code>password_verify()</code> funcione. Ingresa tu contraseña en texto plano aquí para obtener el Hash
            seguro que debes pegar en el campo <code>password</code> de tu tabla <code>users</code>.</p>
        <form method="post">
            <input type="text" name="password" placeholder="Ej. mi_contraseña_secreta_123" required>
            <button type="submit">Generar Hash seguro</button>
        </form>

        <?php if ($password_generada) { ?>
            <div class="result">
                <strong>Aquí tienes el Hash de tu contraseña:</strong><br><br>
                <code><?php echo $password_generada; ?></code>
                <br><br>
                <em>Copia este código y pégalo tal cual en tu base de datos.</em>
            </div>
        <?php } ?>
    </div>
</body>

</html>