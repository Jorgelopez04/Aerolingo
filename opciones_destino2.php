<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerolingo - Destinos</title>
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
      background-attachment: fixed; /* Imagen de fondo fija */
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
    }

    .map-container {
      background-image: url('mapa.png'); /* Aquí insertas la imagen del mapa */
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
      color: #111;
      font-size: 20px;
      margin: 0;
    }

    .continentes {
      display: flex;
      justify-content: space-around;
      width: 100%;
      position: absolute;
      top: 50%; /* Ajusta según la altura deseada */
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

    .options-container {
      display: flex;
      flex-direction: column; /* Coloca las opciones una debajo de la otra */
      align-items: center; /* Centra horizontalmente */
      margin-top: 20px;
      padding: 0 10px;
    }

    .option-cajon {
      background-color: white;
      border-radius: 15px;
      margin: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
      text-align: center;
      padding: 20px; /* Añadido para aumentar el tamaño del cajón */
      cursor: pointer; /* Cursor en forma de mano */
      width: 80%; /* Ancho del cajón */
    }

    .option-cajon:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efecto de sombra al pasar el mouse */
    }

    .option-cajon h3 {
      margin: 10px 0;
    }

    .option-cajon p {
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
    color: #fff; /* Tamaño del icono de menú */
}

    h2 {
      text-align: center;
      margin-top: 150px; /* Ajuste para mover el título más abajo */
      color: #111;
    }
    h1 {
      text-align: center;
      margin-top: 150px; /* Ajuste para mover el título más abajo */
      color: #111;
      font-size: 40px;
    }

  </style>
</head>
<body>

  <!-- Header -->
  <div class="header-cajon">
    <div class="header">
      <span class="menu-icon" onclick="openNav()">☰</span> <!-- Icono de tres rayas -->
      <img src="logosinfondo.png"  class="logo">
      
    </div>
  </div>

  <!-- Sidebar -->
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
    
    <!-- Profile Section -->
     <div class="profile">
       <h2><?php echo $_SESSION['username'] ?? ''; ?></h2> 
    </div>
    
    <!-- Menu Links -->
    <a href="Pantalla_principal.php">Principal</a>    
    <a href="Mostrar_progeso.php">Mostrar Progreso</a>
    <a href="Compartir_con_amigos.php">Conectar con amigos</a>    
    <a href="Ayuda_comentarios.php">Ayuda y comentarios</a>  
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-cajon">
    <h1>¿Qué deseas hacer?</h1>

    <div class="options-container">
      <!-- Opción 1: Ver guías educativas -->
      <div class="option-cajon" onclick="location.href='opciones_destino2_guias.php'">
        <h3>Ver guías educativas</h3>
        <p class="mensaje">Explora el conocimiento y prepárate con nuestras guías</p>
      </div>

      <!-- Opción 2: Empezar clases -->
      <div class="option-cajon" onclick="location.href='opciones_destino2_clases.php'">
        <h3>Empezar clases</h3>
        <p class="mensaje">Comienza ahora mismo tu viaje de aprendizaje</p>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <div class="navbar-cajon">
    <div class="navbar">
    <a href="Pantalla_principal.html">🏠</a>    
    <a href="Compras.html">🛒</a>
    <a href="Perfil.php">👤</a> 
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }

    // Cargar nombre de usuario desde localStorage
    document.addEventListener("DOMContentLoaded", function() {
        const nombreUsuario = localStorage.getItem("nombreUsuario") || "Usuario";
        document.getElementById("nombreUsuario").textContent = nombreUsuario;
    });

    function irADestino(destino) {
      window.location.href = destino + ".php"; // Redirigir a la página del destino
    }
  </script>

</body>
</html>
