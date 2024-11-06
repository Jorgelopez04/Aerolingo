<?php
$host = "localhost";
$User = "root";
$pass = "";
$db = "php_login_database";

$conexion = mysqli_connect($host, $User, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}
?>
