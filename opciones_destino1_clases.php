<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerolingo - Seleccionar Región</title>
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

    .form-container {
      text-align: center;
      margin-top: 50px; 
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container img {
      width: 80%; 
      max-width: 480px; 
      border-radius: 10px;
    }

    .form-container select, .form-container button {
      margin: 10px 0;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #eaeaea;
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

    h2 {
      text-align: center; 
      color: #111;
      font-size: 40px; 
    }

    .profile {
      text-align: center; 
      color: #ffffff; 
    }

    #mySidebar {
      width: 200px; 
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header-cajon">
    <div class="header">
      <span class="menu-icon" onclick="openNav()">☰</span>
      <img src="logosinfondo.png" class="logo">
      
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
    <h2>Selecciona una región para ver las clases</h2>
    <div class="form-container">
      <img src="https://spmedia.s3.amazonaws.com/wp-content/uploads/2009/08/regiones_top.jpg" alt="Regiones de Perú">
      <form id="regionForm">
        <select id="region" required>
          <option value="">Seleccione una región...</option>
          <option value="sierra">Sierra</option>
          <option value="costa">Costa</option>
          <option value="selva">Selva</option>
        </select>
        <button type="submit">Ver Clases</button>
      </form>
    </div>
  </div>

  <!-- Navbar -->
  <div class="navbar-cajon">
    <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>    
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "200px"; 
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }

    // Cargar nombre de usuario desde localStorage
    document.addEventListener("DOMContentLoaded", function() {
      const nombreUsuario = localStorage.getItem("nombreUsuario") || "Usuario";
      document.getElementById("nombreUsuario").textContent = nombreUsuario;
    });

    // Redirigir a la página de clases según la región seleccionada
    document.getElementById('regionForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const regionSeleccionada = document.getElementById('region').value;
      if (regionSeleccionada) {
        // Redirigir directamente al archivo HTML correspondiente de cada región
        window.location.href = regionSeleccionada + '_clases.php';
      }
    });
  </script>

</body>
</html>
