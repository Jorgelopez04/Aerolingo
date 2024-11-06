<?php
session_start(); // Iniciar la sesión al comienzo del archivo
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #75f0e6ee; 
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: white;
      text-align: center;
      padding: 20px;
    }

    h1 {
      color: #111;
      margin-top: 150px; /* Ajusta este valor para mover el encabezado más abajo */
    }

    h2 {
      margin-top: 20px;
    }

    .options {
      margin: 20px 0;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .option {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 10px;
    }

    .option img {
      width: 300px;
      margin-top: 10px;
      border: 5px solid transparent;
      transition: transform 0.2s;
    }

    .option img:hover {
      transform: scale(1.1);
    }

    .correct-answer {
      display: none;
      margin-top: 20px;
      color: #ffff;
      font-size: 18px;
    }

    .sidebar {
      height: 100%;
      width: 0; /* Inicialmente oculto */
      position: fixed;
      z-index: 1001; /* Aumenta el z-index para que esté encima del header */
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

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px;
      background-color:#111;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
      width: 100%; /* Asegúrate de que ocupe el 100% del ancho */
      position: fixed; /* Fijo en la parte superior */
      top: 0; /* Alineado a la parte superior */
      left: 0; /* Alineado a la izquierda */
      z-index: 1000; /* Asegúrate de que esté por encima de otros elementos */
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
      color: #fff; /* Cambiar el color a negro */
    }

    h2 {
      text-align: center;
      margin-top: 50px;
      color: #fff;
    }

    /* Estilo para la barra de navegación */
    .navbar {
      display: flex;
      justify-content: space-around;
      background-color: #fff;
      padding: 10px;
      position: fixed;
      bottom: 0;
      left: 0; /* Alineado a la izquierda */
      width: 100%; /* Asegúrate de que ocupe el 100% del ancho */
      box-shadow: 0px -1px 5px rgba(0, 0, 0, 0.5);
      z-index: 1000; /* Asegúrate de que esté por encima de otros elementos */
    }

    .navbar a {
      color: #111;
      text-decoration: none;
      font-size: 24px;
    }

    .navbar a:hover {
      color: #007bff;
    }

    .jugar-btn {
      padding: 10px 40px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .favorite-star {
      cursor: pointer; /* Cambiar el cursor al pasar el mouse */
      color: black; /* Color de la estrella antes de hacer clic */
      margin-left: 10px; /* Espacio entre el texto y la estrella */
      font-size: 24px; /* Tamaño de la estrella */
      transition: transform 0.2s; /* Transición al hacer hover */
    }

    .favorite-star.favorited {
      color: gold; /* Color de la estrella después de hacer clic */
    }

    .favorite-star:hover {
      transform: scale(1.2); /* Aumentar el tamaño al pasar el mouse */
    }
    .share-container {
      margin-top: 250px;
      padding: 10px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      display: inline-block;
    }

    .share-container h2 {
      font-size: 22px;
      color: #333;
      margin-bottom: 8px;
    }

    .share-container p {
      font-size: 18px;
      color: #555;
      margin-bottom: 20px;
    }

    .social-icons {
      display: flex;
      justify-content: space-around;
      margin: 20px 0;
    }

    .social-icons a {
      text-decoration: none;
      color: inherit;
    }

    .social-icons img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .social-icons img:hover {
      transform: scale(1.1);
    }
  </style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Favoritos</title>
</head>
<body>
  <div class="header">
    <span class="menu-icon" onclick="openNav()">☰</span> <!-- Icono de tres rayas -->
    <img src="logosinfondo.png" class="logo">
  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }
  </script>
    
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
  <div class="share-container">
    <h2>Conéctate con tus amigos y comparte tus logros</h2>
    <p>Escoge en cuál red social quieres compartir tus logros</p>
    
    <div class="social-icons">
      <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/220px-2021_Facebook_icon.svg.png" alt="Facebook"></a>
      <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Instagram_logo_2022.svg" alt="Instagram"></a>
      <a href="#"><img src="https://cdn-3.expansion.mx/dims4/default/f08f00d/2147483647/strip/true/crop/1920x1080+0+0/resize/1200x675!/format/webp/quality/60/?url=https%3A%2F%2Fcdn-3.expansion.mx%2F58%2F66%2Fdb5de50f4ab4970bed8ab24d7aae%2Ftwitter-logo-x.jpg" alt="Twitter"></a>
      <a href="#"><img src="https://sf-static.tiktokcdn.com/obj/eden-sg/uhtyvueh7nulogpoguhm/tiktok-icon2.png" alt="TikTok"></a>
    </div>
  </div>
 
  
  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>
  </div>
</body>
</html>

