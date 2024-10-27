
<?php
    include("conexion.php");

    if (isset($_POST['register'])) {
        if (
            strlen($_POST["name"]) >= 1 &&
            strlen($_POST["apellidos"]) >= 1 &&
            strlen($_POST["identificacion"]) >= 1 &&
            strlen($_POST["phone"]) >= 1 &&
            strlen($_POST["email"]) >= 1 &&
            strlen($_POST["password"]) >= 1
        ) {
            $name = trim($_POST["name"]);
            $apellidos = trim($_POST["apellidos"]);
            $identificacion = trim($_POST["identificacion"]);
            $phone = trim($_POST["phone"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

            $consulta = "INSERT INTO users(nombre, apellidos, identificacion, telefono, email, contraseña)
                         VALUES('$name', '$apellidos', '$identificacion', '$phone', '$email', '$password')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                header("Location: permisos_audio.html"); // Redirigir a la página de permisos de audio
                exit(); // Asegúrate de llamar a exit() después de header
            } else {
                echo '<h3 class="error">Ocurrió un error</h3>'; // Mostrar error si la consulta falla
            }
        } else {
            echo '<h3 class="error">Llena todos los campos</h3>'; // Mostrar mensaje si hay campos vacíos
        }
    }
?>
