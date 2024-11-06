<?php
session_start(); // Iniciar la sesión

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $name = $_POST["name"];
    $apellidos = $_POST["apellidos"];
    $identificacion = $_POST["identificacion"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"]; // No olvides recoger la contraseña también

    // Almacena los datos en variables de sesión
    $_SESSION["name"] = $name;
    $_SESSION["apellidos"] = $apellidos;
    $_SESSION["identificacion"] = $identificacion;
    $_SESSION["phone"] = $phone;
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $username;

    // Redirige a la página de perfil
    header("Location: Permisos_audio.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form method="post">
        <div class="container">
            <div class="input-wrapper">
                <input type="text" name="name" placeholder="Nombre" required>
            </div>
            <div class="input-wrapper">
                <input type="text" name="apellidos" placeholder="Apellidos" required>
            </div>
            <div class="input-wrapper">
                <input type="number" name="identificacion" placeholder="Identificacion" required>
            </div>
            <div class="input-wrapper">
                <input type="tel" name="phone" placeholder="Telefono" required>
            </div>
            <div class="input-wrapper">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-wrapper">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="input-wrapper">
                <input type="text" name="username" placeholder="NombreUsuario" required>
            </div>
            <input class="btn" type="submit" name="register" value="Enviar">
        </div>
    </form>
</body>
</html>


