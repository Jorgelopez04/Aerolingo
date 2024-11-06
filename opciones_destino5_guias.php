<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerolingo - Seleccionar Guía Educativa</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      height: 100%;
      background-image: url('https://materialdidactico.org/wp-content/uploads/2015/07/todos1.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px;
      background-color: rgba(0, 4, 255, 0.667);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .logo {
      background-image: url("logo.jpg");
      background-size: cover;
      background-position: center left;
      background-repeat: no-repeat;
      position: relative;
      margin-bottom: 20px; 
      width: 500px;
      height: 100px;
      display: block;
    }

   
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

    .form-container {
      text-align: center;
      margin-top: 100px; /* Ajusta según sea necesario */
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333; /* Cambia el color si es necesario */
    }

    .form-container select, .form-container button {
      margin: 10px 0;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #eaeaea;
    }

    /* Centrar el nombre del usuario y cambiar el color a blanco */
    .profile {
      text-align: center; /* Centrar el texto */
      color:#ffffff; /* Cambiar a color blanco */
    }
    .menu-icon {
      cursor: pointer;
      font-size: 30px;
      color: #111; /* Asegúrate de que el ícono del menú sea blanco */
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <span class="menu-icon" onclick="openNav()">☰</span>
    <img src="logo.png" class="logo" alt="Logo">
    
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

  <!-- Main Content -->
  <div class="form-container">
    <h2>Seleccione una guía educativa</h2>
    <p>¿Qué tipo de guía desea seleccionar?</p>
    <form id="guiaForm">
      <select id="guia" required>
        <option value="">Seleccione una guía...</option>
        <option value="introductoria">Introductoria</option>
        <option value="auditiva">Auditiva</option>
        <option value="visual">Visual</option>
        <option value="motora">Motora</option>
        <option value="atencion">Atención y Concentración</option>
        <option value="intelectual">Intelectual</option>
        <option value="autismo">Autismo</option>
        <option value="aprendizaje">Aprendizaje</option>
      </select>
      <button type="submit">Seleccionar</button>
    </form>
  </div>

  <!-- Navbar -->
  <div class="navbar">
    <a href="Pantalla_principal.html">🏠</a>    
    <a href="Compras.html">🛒</a>
    <a href="Perfil.php">👤</a>
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

    // Redirigir a la página de la guía seleccionada
    document.getElementById('guiaForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const guiaSeleccionada = document.getElementById('guia').value;
      if (guiaSeleccionada) {
        window.location.href = guiaSeleccionada + '.html'; // Redirige a la página de la guía seleccionada
      }
    });
  </script>

</body>
</html>



