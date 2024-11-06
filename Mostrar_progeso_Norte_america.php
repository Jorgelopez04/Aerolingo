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
    }

    /* Ajustes en map-container */
    .map-container {
      text-align: center;
      margin-top: 50px;
      margin-bottom: 20px;
    }

    .map-container h2 {
      font-size: 30px;
      color: #111;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
      margin-bottom: 20px;
      font-size: 40px;
    }

    .continentes {
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    .continente {
      font-size: 20px;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 10px 20px;
      border-radius: 10px;
      color: #111;
      text-decoration: none;
    }

    .continente:hover {
      background-color: rgba(0, 4, 255, 0.667);
      color: #fff;
    }

    /* Ajustes en progress-container para aumentar el tamaño */
    .progress-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px; /* Aumentado */
      background-color: rgba(255, 255, 255, 0.8);
      margin: 40px auto; /* Aumentado */
      border-radius: 20px;
      max-width: 1000px; /* Aumentado */
    }

    .progress-title {
      font-size: 32px; /* Aumentado */
      color: #333;
      text-align: center;
      margin-bottom: 30px; /* Aumentado */
    }

    .progress-text {
      font-size: 20px; /* Aumentado */
      margin-bottom: 40px; /* Aumentado */
      text-align: center;
      color: #666;
    }

    .charts-container {
      display: flex;
      flex-wrap: wrap; /* Permitir que los elementos pasen a la siguiente fila */
      justify-content: space-evenly; /* Espaciar uniformemente */
      gap: 20px; /* Separación entre los gráficos */
    }

    .chart-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex-basis: 30%; /* Ajustar el ancho de los gráficos para que ocupen hasta el 30% del ancho del contenedor */
      margin-bottom: 20px; /* Espacio entre filas de gráficos */
    }

    .chart-item canvas {
      width: 100% !important; /* Ajustar el tamaño del gráfico al tamaño del contenedor */
      max-width: 200px !important; /* Tamaño máximo del gráfico */
      height: auto !important; /* Ajuste automático de altura */
    }

    .chart-item p {
      margin-top: 10px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
    }


    /* Navbar */
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
      color: #fff;
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
    
  </div>

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
  
  <!-- Mapa de Continentes -->
  <div class="map-container">
    <h2>¿Qué progreso te gustaria ver?</h2>
    <div class="continentes">
      <a href="Mostrar_progeso_Sur_america.php" class="continente">Sur América</a>
      <a href="Mostrar_progeso_Europa.php" class="continente">Europa</a>
      <a href="Mostrar_progeso_Norte_america.php" class="continente">Norte América</a>
      <a href="Mostrar_progeso_Asia.php" class="continente">Asia</a>      
      <a href="Mostrar_progeso_Africa.php" class="continente">África</a>
    </div> 
  </div>
  

  <!-- Progreso -->
  <div class="progress-container">
    <h1 class="progress-title">Progreso en tu viaje a Canada</h1>
    <p class="progress-text">Tu progreso en otras regiones es el siguiente</p>

    <div class="charts-container">
      <div class="chart-item">
        <canvas id="chartProvinciasAtlanticas"></canvas>
        <p>Las provincias atlanticas</p>
      </div>
      <div class="chart-item">
        <canvas id="chartCanadaCentral"></canvas>
        <p>Canada central</p>
      </div>
      <div class="chart-item">
        <canvas id="chartPraderasCanadienses"></canvas>
        <p>Las praderas canadienses</p>
      </div>
      <div class="chart-item">
        <canvas id="chartCostaPacifica"></canvas>
        <p>Costa pacifica</p>
      </div>      
      <div class="chart-item">
        <canvas id="chartTerritoriosNorte"></canvas>
        <p>Los territorios del norte</p>
      </div>
      <div class="chart-item">
        <canvas id="chartTotalCanada"></canvas>
        <p>Total</p>
      </div>
    </div>
  </div>

  <!-- JavaScript para los gráficos -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    
    // Gráficos circulares
    const dataProvinciasAtlanticas = { labels: ['Completado', 'Pendiente'], datasets: [{ data: [0, 100], backgroundColor: ["#36A2EB", "#FF6384"] }] };
    const dataCanadaCentral = { labels: ['Completado', 'Pendiente'], datasets: [{ data: [0, 100], backgroundColor: ["#36A2EB", "#FF6384"] }] };
    const dataPraderasCanadienses = { labels: ['Completado', 'Pendiente'], datasets: [{ data: [0, 100], backgroundColor: ["#36A2EB", "#FF6384"] }] };
    const dataCostaPacifica = { labels: ['Completado', 'Pendiente'], datasets: [{ data: [0, 100], backgroundColor: ["#36A2EB", "#FF6384"] }] };
    const dataTerritoriosNorte = { labels: ['Completado', 'Pendiente'], datasets: [{ data: [0, 100], backgroundColor: ["#36A2EB", "#FF6384"] }] };
    const dataTotalCanada = { labels: ['Completado', 'Pendiente'], datasets: [{ data: [0, 100], backgroundColor: ["#36A2EB", "#FF6384"] }] };

    new Chart(document.getElementById('chartProvinciasAtlanticas'), { type: 'doughnut', data: dataProvinciasAtlanticas });
    new Chart(document.getElementById('chartCanadaCentral'), { type: 'doughnut', data: dataCanadaCentral });
    new Chart(document.getElementById('chartPraderasCanadienses'), { type: 'doughnut', data: dataPraderasCanadienses });
    new Chart(document.getElementById('chartCostaPacifica'), { type: 'doughnut', data: dataCostaPacifica });
    new Chart(document.getElementById('chartTerritoriosNorte'), { type: 'doughnut', data: dataTerritoriosNorte });
    new Chart(document.getElementById('chartTotalCanada'), { type: 'doughnut', data: dataTotalCanada });

    // Funciones para abrir y cerrar el menú lateral
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }
  </script>

  <!-- Navbar inferior -->
   <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>
  </div>
</body>
</html>
