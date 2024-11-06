<?php
session_start(); // Iniciar la sesión al comienzo del archivo
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ayuda y Comentarios</title>
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
      margin: 0;
    }

    /* Header */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px;
      background-color:#111;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
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
      font-size: 30px;
      cursor: pointer;
      color: #fff;
      padding: 10px;
    }

    

    /* Sidebar */
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1001;
      top: 0;
      left: -250px;
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

    .sidebar .close-btn {
      position: absolute;
      top: 10px;
      right: 25px;
      font-size: 30px;
    }

    .profile {
      padding: 10px;
      background-color: #333;
      color: white;
      text-align: center;
    }

    /* Help Container */
    .help-container {
      margin-top: 200px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      display: inline-block;
      width: 90%;
      max-width: 400px;
    }

    .help-container h2 {
      font-size: 22px;
      color: #333;
      margin-bottom: 10px;
    }

    .help-container p {
      font-size: 18px;
      color: #555;
      margin-bottom: 20px;
    }

    .help-container textarea {
      width: 90%;
      height: 100px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: none;
    }

    .help-container button {
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 18px;
      background-color: #111;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .help-container button:hover {
      background-color: #0056b3;
    }

    /* Confirmation message */
    #confirm-message {
      margin-top: 20px;
      font-size: 16px;
      color: green;
      display: none;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-around;
      background-color: #fff;
      padding: 10px;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      box-shadow: 0px -1px 5px rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .navbar a {
      font-size: 25px;
      color: #007bff;
      text-decoration: none;
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
    <span class="menu-icon" onclick="openNav()">&#9776;</span>
    <img src="logosinfondo.png" class="logo" alt="Logo">
    
  </div>

  <!-- Sidebar -->
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

  <!-- Help and Comments Section -->
  <div class="help-container">
    <h2>Coméntanos en qué te podemos ayudar</h2>
    <p>Cuéntanos cómo podemos mejorar tu experiencia como usuario de la aplicación</p>
    <textarea id="comment" placeholder="Agrega comentario"></textarea>
    <button onclick="enviarComentario()">Enviar</button>
    <div id="confirm-message">¡Gracias! Tu comentario ha sido enviado.</div>
  </div>

  <!-- Bottom Navbar -->
  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a> 
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidebar").style.left = "0";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.left = "-250px";
    }

    function enviarComentario() {
      var comentario = document.getElementById('comment').value;
      if (comentario.trim() === "") {
        alert("Por favor, escribe un comentario antes de enviar.");
      } else {
        document.getElementById('confirm-message').style.display = "block";
        document.getElementById('comment').value = "";
        setTimeout(function() {
          document.getElementById('confirm-message').style.display = "none";
        }, 3000);
      }
    }
  </script>

</body>
</html>

