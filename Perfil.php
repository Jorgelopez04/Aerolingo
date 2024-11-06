<?php
session_start(); // Iniciar la sesión al comienzo del archivo
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
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
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      height: 100%;
      background-color: #75f0e6ee; 
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    /* Header fixed at the top */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px;
      background-color: #111; /* Cambiado a semitransparente */
      box-shadow: none; /* Sin sombra para una apariencia más integrada */
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1; /* Asegúrate de que este z-index sea menor que el contenido */
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
      color: #fff;
    }

    /* Add padding to the top of the body to prevent overlap with the fixed header */
    body {
      padding-top: 120px; /* Ajusta según el alto del encabezado si es necesario */
    }

    .map-container {
      background-image: url('mapa.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 300px;
      position: relative;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .map-container h2 {
      position: absolute;
      top: 10%;
      left: 50%;
      transform: translateX(-50%);
      color: #ffffff;
      font-size: 40px;
      margin: 0;
    }

    .continentes {
      display: flex;
      justify-content: space-around;
      width: 100%;
      position: absolute;
      top: 50%;
    }

    .continente {
      font-size: 14px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 10px;
      border-radius: 10px;
      transition: 0.3s;
    }

    .continente:hover {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    .card-container {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 20px;
      margin-top: 20px;
      padding: 0 10px;
    }

    .card {
      background-color: white;
      border-radius: 15px;
      margin: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
      text-align: center;
      padding: 10px;
    }

    .card img {
      border-radius: 15px;
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .card h3 {
      margin: 15px 0;
    }

    .card p {
      color: #ff0000;
      font-size: 16px;
      font-weight: bold;
    }

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
      color: #007bff;
      text-decoration: none;
      text-align: center;
    }

    .menu-icon {
      font-size: 30px;
    }

    /* Centro el contenedor del perfil */
    .profile-container {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 300px;
      text-align: center;
      margin: 0 auto; /* Centrar horizontalmente */
      margin-top: 100px; /* Añade espacio desde el top */
      display: flex;
      flex-direction: column;
      align-items: center; /* Centrar el contenido dentro del contenedor */
    }

    .profile-container h1 {
      margin: 0;
      font-size: 24px;
    }

    .profile-container p {
      margin: 10px 0;
      font-size: 16px;
      color: #666;
    }

    .back-button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    .back-button:hover {
      background-color: #0056b3;
    }

    h2 {
      text-align: center;
      margin-top: 150px; /* Ajuste para mover el título más abajo */
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="header">
    <span class="menu-icon" onclick="openNav()">☰</span>
    <img src="logosinfondo.png" class="logo">
  </div>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
    <div class="profile">
      <h2><?php echo $_SESSION['username'] ?? ''; ?></h2>
    </div>
    <a href="Pantalla_principal.php">Principal</a>    
    <a href="Mostrar_progeso.php">Mostrar Progreso</a>
    <a href="Compartir_con_amigos.php">Conectar con amigos</a>    
    <a href="Ayuda_comentarios.php">Ayuda y comentarios</a> 
  </div>

  <div class="profile-container">
    <h1>Perfil</h1>
    <p><strong>Nombre:</strong> <?php echo $_SESSION['name'] ?? ''; ?></p>
    <p><strong>Apellidos:</strong> <?php echo $_SESSION['apellidos'] ?? ''; ?></p>
    <p><strong>ID:</strong> <?php echo $_SESSION['identificacion'] ?? ''; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $_SESSION['phone'] ?? ''; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email'] ?? ''; ?></p>
    <p><strong>Nombre del perfil:</strong> <?php echo $_SESSION['username'] ?? ''; ?></p>
  </div>

  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>  
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
    }
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }
  </script>
  
</body>
</html>
