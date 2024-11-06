
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://img.freepik.com/vector-premium/viajar-mundo-avion-ubicacion-pin-mapa-mundial-ilustracion-plana-viaje_471402-694.jpg');
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
      background-color: rgba(0, 4, 255, 0.667);
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
      color: black; /* Cambiar el color a negro */
    }

    h2 {
      text-align: center;
      margin-top: 150px;
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
    
    </div>
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
    document.addEventListener("DOMContentLoaded", function() {
      const nombreUsuario = localStorage.getItem("nombreUsuario") || "Usuario";
      document.getElementById("nombreUsuario").textContent = nombreUsuario;
    });

    function irADestino(destino) {
      window.location.href = destino + ""; // Redirigir a la página del destino
    }

    function toggleFavorite(star) {
      const isFavorited = star.classList.toggle('favorited'); // Cambia el estado de favorito

      if (isFavorited) {
        // Aquí puedes añadir lógica para almacenar en favoritos
        alert("Clase agregada a favoritos"); // Mensaje o lógica adicional
      } else {
        // Aquí puedes añadir lógica para eliminar de favoritos
        alert("Clase eliminada de favoritos"); // Mensaje o lógica adicional
      }
    }
  </script>
  <h1>Mis Favoritos</h1>
  <ul id="favoritesList" class="favorites-list"></ul>
  <p id="noFavorites" class="no-favorites">Aún no tienes clases en tus favoritos.</p>

  <script>
  document.addEventListener("DOMContentLoaded", function() {
    const favoritos = JSON.parse(localStorage.getItem('favoritos')) || [];
    const favoritesList = document.getElementById('favoritesList');
    const noFavoritesMessage = document.getElementById('noFavorites');

    // Si no hay favoritos, mostramos el mensaje de que no hay clases
    if (favoritos.length === 0) {
      noFavoritesMessage.style.display = 'block';
    } else {
      noFavoritesMessage.style.display = 'none';
      // Iteramos sobre los favoritos para mostrarlos
      favoritos.forEach(favorito => {
        // Verificar que el favorito tenga la propiedad 'titulo'
        if (favorito.titulo) {
          const li = document.createElement('li');
          li.innerHTML = `
            <h3>${favorito.titulo}</h3>
            
          `;
          favoritesList.appendChild(li);
        }
      });
    }
  });
</script>
  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>
  </div>
</body>
</html>
