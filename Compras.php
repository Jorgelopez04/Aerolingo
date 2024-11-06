<?php
session_start(); // Iniciar la sesión al comienzo del archivo
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerolingo - Compras</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
      color: white;
    }

    .sidebar a {
      padding: 10px 15px;
      text-decoration: none;
      font-size: 25px;
      color: white;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #575757;
    }

    /* General Styles */
    body,
    html {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      height: 100%;
      background-color: #75f0e6ee;  
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px;
      background-color: #111;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

     .logo {
      background-image: url("logosinfondojpg");
      background-size: cover;
      background-position: center left;
      background-repeat: no-repeat;
      position: relative;
      margin-bottom: 20px; /* Espacio entre el logo y el siguiente elemento */
      width: 500px;
      height: 100px; /* Aumenta el tamaño del logo */
      display: block; /* Asegura que la imagen se comporte como un bloque */
    }   

    .menu-icon {
      cursor: pointer;
      font-size: 30px;
      color: #fff;
    }

    .map-container {
      height: 200px;
      position: relative;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .map-container h2 {
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translateX(-50%);
      color: #111;
      font-size: 30px;
      margin: 0;
    }

    h2 {
      text-align: center;
      margin-top: 100px;
      color: #fff;
    }

    /* Barra de Navegación */
    .navbar {
      display: flex;
      justify-content: space-around;
      background-color: #ffffff;
      padding: 5px;
      position: fixed;
      bottom: 0;
      width: 100%;
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar a {
      font-size: 20px;
      color: #111;
      text-decoration: none;
      text-align: center;
    }

    /* Estilos para la sección de planes */
    .container {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
      margin: 20px auto; /* Ajustado el margen superior */
    }

    .button {
      display: block;
      margin: 10px auto;
      padding: 10px 20px;
      background-color: #111;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      font-size: 16px;
    }

    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <span class="menu-icon" onclick="openNav()">☰</span>
    <img src="logosinfondo.png" class="logo">
    
  </div>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
    
    <!-- Profile Section -->
     <div class="profile">
        <h2><?php echo $_SESSION['username'] ?? ''; ?></h2> 
    </div> 
    <a href="Pantalla_principal.php">Principal</a>    
    <a href="Mostrar_progeso.php">Mostrar Progreso</a>
    <a href="Compartir_con_amigos.php">Conectar con amigos</a>    
    <a href="Ayuda_comentarios.php">Ayuda y comentarios</a>  
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }

    // Cargar nombre de usuario desde localStorage
    document.addEventListener("DOMContentLoaded", function () {
      const nombreUsuario = localStorage.getItem("nombreUsuario") || "Usuario";
      document.getElementById("nombreUsuario").textContent = nombreUsuario;
    });

    function seleccionarPlan(descripcion, precio) {
      localStorage.setItem("descripcionPlan", descripcion);
      localStorage.setItem("totalPagar", precio);
      window.location.href = "GenerarFactura.html";
    }

    function seleccionarPlanPersonalizado() {
      let precio = prompt("Ingrese el precio del plan personalizado:");
      if (precio !== null && !isNaN(precio) && precio > 0) {
        localStorage.setItem("descripcionPlan", 'Plan Personalizado - Acceso a servicios según el precio ingresado');
        localStorage.setItem("totalPagar", precio);
        window.location.href = "GenerarFactura.html";
      } else {
        alert("Por favor, ingrese un precio válido.");
      }
    }
  </script>

  <!-- Mapa de Continentes -->
  <div class="map-container">
    <h2>¿Qué deseas comprar?</h2>
  </div>

  <!-- Contenido Principal: Selección de Planes -->
  <div class="container">
    <h1>Seleccionar Plan</h1>
    <button class="button" onclick="seleccionarPlan('Plan Premium - Acceso completo a todos los servicios', 1000000)">
      Seleccionar Plan Premium ($1.000.000)
    </button>
    <button class="button" onclick="seleccionarPlan('Plan Básico - Acceso limitado', 0)">
      Seleccionar Plan Básico ($0)
    </button>
    <button class="button" onclick="seleccionarPlanPersonalizado()">
      Seleccionar Plan Personalizado ($Variable)
    </button>
  </div>

  <!-- Barra de Navegación -->
  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a> 
  </div>
</body>

</html>


