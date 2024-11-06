<?php
session_start();
include('conexion_inicio.php'); // Conexión a la base de datos

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login_usuario.php?error=El email es requerido");
        exit();
    } elseif (empty($password)) {
        header("Location: login_usuario.php?error=La clave es requerida");
        exit();
    } else {
        $Sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conexion->prepare($Sql); // Consulta preparada
        $stmt->bind_param("s", $email); // Vincular parámetro
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Compara la contraseña directamente
            if ($row['contraseña'] === $password) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['nombre'];
                $_SESSION['identificacion'] = $row['identificacion'];
                header("Location: Pantalla_principal.php"); // Redirige a la pantalla principal
                exit();
            } else {
                header("Location: login_usuario.php?error=El usuario o la clave son incorrectas");
                exit();
            }
        } else {
            header("Location: login_usuario.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }
}
?>

