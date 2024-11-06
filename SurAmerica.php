<?php
session_start(); // Iniciar la sesión al comienzo del archivo
?>
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

.search-bar {
    width: 40%;
    position: relative;
}

.search-bar input {
    width: 60%;
    padding: 10px;
    border-radius: 20px;
    border: 1px solid #ccc;
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
    font-size: 40px;
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
    font-size: 25px;
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
    display: grid; /* Cambiado a grid para controlar mejor las filas */
    grid-template-columns: repeat(5, 1fr); /* 5 columnas */
    gap: 20px; /* Espaciado entre las tarjetas */
    margin-top: 20px;
    padding: 0 10px;
    cursor: pointer;
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
    color: #fff; /* Tamaño del icono de menú */
}

#resultadoBusqueda img {
    display: flex;
    flex-wrap: wrap; /* Permite que los elementos se envuelvan */
    gap: 20px; /* Espacio entre tarjetas */
    
}
#resultadoBusqueda {
    background-color: white; /* Fondo blanco */
    border: 1px solid #ccc; /* Borde gris claro */
    padding: 15px; /* Espaciado interno */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    display: none; /* Ocultar por defecto */
    margin-top: 15px; /* Espacio superior */
}

#resultadoBusqueda .card {
    display: flex;
    flex-direction: column; /* Alinea el contenido verticalmente */
    align-items: center; /* Centra el contenido */
    text-align: center; /* Centra el texto */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #ddd; /* Borde sutil para cada tarjeta */
    border-radius: 5px; /* Bordes redondeados para las tarjetas */
    transition: transform 0.2s; /* Efecto de transición suave */
}

#resultadoBusqueda .card:hover {
    transform: scale(1.05); /* Efecto de aumento al pasar el ratón */
}



#resultadoBusqueda h3 {
    margin: 10px 0; /* Espaciado vertical */
}

#resultadoBusqueda p {
    color: #666; /* Color del texto del valor */
}

body { 
    font-family: Arial, sans-serif; 
}

.container { 
    max-width: 800px; 
    margin: 0 auto; 
    padding: 20px; 
}

.search-bar { 
    margin-bottom: 20px; 
}

.destination { 
    display: none; 
    margin: 10px 0; 
    padding: 10px; 
    border: 1px solid #ddd; 
    border-radius: 5px; 
}

.destination img { 
    width: 100px; 
    height: auto; 
    display: block; 
}

.button {
    margin: 10px auto;
    padding: 10px 20px;
    background-color: #fff;
    color: #111;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: right;
    font-size: 16px;
}

.button:hover {
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
  <!-- Header -->
  <div class="header">
    <span class="menu-icon" onclick="openNav()">☰</span> <!-- Icono de tres rayas -->
    <img src="logosinfondo.png"  class="logo">
    <div class="search-bar">
      <input type="text" id="buscarCiudad" placeholder="Buscar...">
      <button class ="button"onclick="buscarCiudad()">Buscar</button>
    </div>
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

  <!-- JavaScript -->
  
  <div class="map-container">
    <h2>¿Qué destino te gustaría visitar?</h2>
    <div class="continentes">
      <a href="SurAmerica.php" class="continente">Sur América</a>
      <a href="Europa.php" class="continente">Europa</a>
      <a href="NorteAmerica.php" class="continente">Norte América</a>
      <a href="Asia.php" class="continente">Asia</a>
      <a href="Africa.php" class="continente">África</a>
    </div>
  </div>
  <!-- JavaScript -->
  <div id="resultadoBusqueda"></div>
  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }

    document.addEventListener("DOMContentLoaded", function() {
      const nombreUsuario = localStorage.getItem("nombreUsuario") || "Usuario";
      document.getElementById("nombreUsuario").textContent = nombreUsuario;
    });

    const ciudades = [
      { contenedor: "card", nombre: "Lago Titicaca", imagen: "https://www.exploorperu.com/wp-content/uploads/2023/04/7-Reasons-to-Visit-Lake-Titicaca-in-Peru-exploorperu-blog-uros-island.webp", valor: "2'500.000",destino:"opciones_destino1.php" },
      { contenedor: "card", nombre: "La Patagonia", imagen: "https://blog.localadventures.mx/wp-content/uploads/2022/11/local2-2.png", valor: "4'000.000",destino:"no_hay_opciones_destino.php" },
      { contenedor: "card", nombre: "Quibdo", imagen: "https://www.semana.com/resizer/v2/D3DK5L4PUJAY3DOIUF5NIQYOV4.jpg?auth=34aedcb40721eb4ee0a4130062447379fa3d9cb5548b3c6c043a5d084ee37413&smart=true&quality=75&width=1280&fitfill=false", valor: "500.000" ,destino:"no_hay_opciones_destino.php"},
      { contenedor: "card", nombre: "Brasilia", imagen: "https://i0.wp.com/viajealpatrimonio.com/wp-content/uploads/2019/09/0672-brasilia.jpg?ssl=1", valor: "10'000.000",destino:"no_hay_opciones_destino.php" },
      { contenedor: "card", nombre: "Montevideo", imagen: "https://content.r9cdn.net/rimg/dimg/2f/e1/7850c4a1-lm-58522-16ac66da4bb.jpg?crop=true&width=1020&height=498", valor: "7'000.000",destino:"no_hay_opciones_destino.php" },
      { contenedor: "card", nombre: "Caracas", imagen: "https://images.unsplash.com/photo-1714594923299-e915b7d71701?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2FyYWNhcyUyMHZlbmV6dWVsYXxlbnwwfHwwfHx8MA%3D%3D", valor: "2'000.000" ,destino:"no_hay_opciones_destino.php"}
     
      
    ];

    function buscarCiudad() {
    const query = document.getElementById('buscarCiudad').value.toLowerCase();
    const resultadoDiv = document.getElementById('resultadoBusqueda'); // Asegúrate de tener este elemento definido

    // Verifica si no se ha ingresado nada
    if (query.trim() === "") {
        resultadoDiv.innerHTML = 'Primero tienes que colocar un destino';
        resultadoDiv.style.display = 'block';
        return; // Salimos de la función si no hay entrada
    }

    const resultado = ciudades.find(ciudad => ciudad.nombre.toLowerCase().includes(query));

    if (resultado) {
        resultadoDiv.innerHTML = `
            <a href="${resultado.destino}" class="card">
                <img src="${resultado.imagen}" alt="${resultado.nombre}">
                <h3>${resultado.nombre}</h3>
                <p>Valor: ${resultado.valor}</p>
            </a>
        `;
        resultadoDiv.style.display = 'block'; // Muestra el contenedor si se encuentra un resultado
    } else {
        resultadoDiv.innerHTML = 'Este destino no está en el catálogo';
        resultadoDiv.style.display = 'block';
    }
}
     function mostrarTodasLasCiudades() {
    const resultadoDiv = document.getElementById('resultadoBusqueda');
    resultadoDiv.innerHTML = ciudades.map(ciudad => `
        <a href="${ciudad.destino}" class="card">
            <img src="${ciudad.imagen}" alt="${ciudad.nombre}">
            <h3>${ciudad.nombre}</h3>
            <p>Valor: ${ciudad.valor}</p>
        </a>
    `).join('');
    resultadoDiv.style.display = 'block'; // Muestra el contenedor
}

// Llama a esta función al cargar la página para mostrar todas las ciudades
window.onload = mostrarTodasLasCiudades;

    // Función para redirigir a la pantalla de destino correspondiente
    function redirectToDestino(destino) {
        window.location.href = destino; // Redirigir a la página especificada
    }

    // Llama a la función para mostrar los destinos al cargar la página
    document.addEventListener("DOMContentLoaded", mostrarDestinos);
  </script> 

  <!-- Mapa de Continentes -->
  

  <!-- Barra de Navegación -->
  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>

  </div>
</body>
</html>
