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
        
        // Verificar si la identificación ya existe
        $checkQuery = "SELECT * FROM users WHERE identificacion = ?";
        $stmt = $conex->prepare($checkQuery);
        $stmt->bind_param("s", $identificacion);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<h3 class="error">La identificación ya está registrada.</h3>';
        } else {
            // Si no existe, proceder a insertar
            $consulta = "INSERT INTO users(nombre, apellidos, identificacion, telefono, email, contraseña)
                         VALUES('$name', '$apellidos', '$identificacion', '$phone', '$email', '$password')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                header("Location: permisos_audio.html");
                exit();
            } else {
                echo '<h3 class="error">Ocurrió un error</h3>';
            }
        }
    } else {
        echo '<h3 class="error">Llena todos los campos</h3>';
    }
}
?>

