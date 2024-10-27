<?php
session_start(); // Iniciar la sesión
require 'conexion.php'; // Incluir el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['password']; // Asegúrate de que el nombre coincida con el formulario

    // Consultar en la base de datos
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?"); // Asegúrate de que la columna se llama 'email'
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Verificar si se obtuvo un usuario
        if ($user = $result->fetch_assoc()) {
            // Verificar la contraseña
            if (password_verify($contrasena, $user['contraseña'])) { // Asegúrate de que la columna se llama 'contraseña'
                $_SESSION['usuario'] = $user['nombre']; // Almacenar el nombre del usuario en la sesión
                header("Location: Pantalla_principal.html"); // Redirigir a la pantalla principal
                exit(); // Asegúrate de llamar a exit() después de header
            } else {
                echo '<h3 class="error">Credenciales incorrectas</h3>'; // Mensaje de error para contraseña incorrecta
            }
        } else {
            echo '<h3 class="error">No se encontró un usuario con ese email</h3>'; // Mensaje de error para email no encontrado
        }
    } else {
        echo '<h3 class="error">Error en la consulta: ' . $conn->error . '</h3>'; // Mensaje de error para problemas en la consulta
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form method="post">
        <div class="container">    
            <div class="input-wrapper">
                <input type="email" name="email" placeholder="Email" required> <!-- Campo requerido -->
            </div>

            <div class="input-wrapper">
                <input type="password" name="password" placeholder="Contraseña" required> <!-- Campo requerido -->
            </div>

            <input class="btn" type="submit" value="Enviar"> <!-- Botón para enviar el formulario -->
        </div>
    </form>
</body>
</html>
