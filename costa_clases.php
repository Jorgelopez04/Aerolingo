<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clase 1 - Región Costa - Aerolingo</title>
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
      margin-top: 150px;
      font-size: 30px; /* Ajusta este valor para mover el encabezado más abajo */
    }

    h2 {
      margin-top: 20px;
      color: #111;
      font-size: 30px;
    }
    p {
      color: #111;
      margin-top: 10px;
      font-size: 25px; /* Ajusta el tamaño de letra */
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
    cursor: pointer;
    background-color: #fff;
    border-radius: 15px; /* Redondea las esquinas del cajón */
    padding: 20px; /* Agrega un poco de espacio interno */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Opcional: sombra para darle relieve */
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

    .selected {
      border: 5px solid #007bff; /* Resaltar la opción seleccionada */
    }

    .correct {
      border: 5px solid green; /* Resaltar la opción correcta */
    }

    .incorrect {
      border: 5px solid red; /* Resaltar la opción incorrecta */
    }

    .correct-answer {
      display: none;
      margin-top: 10px;
      color: green;
      font-size: 18px;
    }

    .incorrect-answer {
      display: none;
      margin-top: 10px;
      color: red;
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
      background-color: #111;
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
</head>
<body>
  <!-- Header -->
  <div class="header">
    <span class="menu-icon" onclick="openNav()">☰</span> <!-- Icono de tres rayas -->
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

  <h1>Comencemos!!!</h1>
  <h2>Clase 1 - Región Costa - Perú </h2>
  <p>Es una fruta que es de color verde, y que en su interior la semilla es muy grande.</p>  
  <p>Es conocido como Palta:</p>
  <p>Selecciona la imagen correcta:</p>

  <div class="options">
    <div class="option" onclick="checkAnswer('wrong', this)"> 
      <p>Opción 1</p>
      <img src="https://mejorconsalud.as.com/wp-content/uploads/2015/05/beneficios-limon-salud-1200x800.jpg" alt="aguacate" id="aguacate">
    </div>
    <div class="option" onclick="checkAnswer('correct', this)"> 
      <p>Opción 2</p>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlnMnGHBADNnmL2CBaU0bVTsqekJiS8PanuQ&s" alt="palta" id="palta">
    </div>
    <div class="option" onclick="checkAnswer('wrong', this)"> 
      <p>Opción 3</p>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFm-gWunxjoWc3-EqSOpsmV684n4L-i63mvg&s" alt="kiwi" id="kiwi">
    </div>
     <div class="option" onclick="checkAnswer('wrong', this)"> 
      <p>Opción 4</p>
      <img src="https://www.gob.mx/cms/uploads/article/main_image/70178/Blog_guanabana.jpg" alt="piña" id="piña">
    </div>
  </div>

  <p class="correct-answer" id="correctAnswer">¡Correcto! La respuesta es la opcion 2.</p>
  <p class="incorrect-answer" id="incorrectAnswer">¡Incorrecto! La respuesta es la opcion 2.</p>

  <script>
    let answered = false; // Variable para controlar si ya se respondió

    function checkAnswer(answer, selectedElement) {
      const correctAnswerElement = document.getElementById("correctAnswer");
      const incorrectAnswerElement = document.getElementById("incorrectAnswer");

      // Si ya se respondió, no hacer nada más
      if (answered) return;

      // Deshabilitar todas las opciones
      const options = document.querySelectorAll('.option');
      options.forEach(option => {
        option.onclick = null; // Desactivar clics
      });

      // Resetear las clases de todas las opciones
      options.forEach(option => {
        option.classList.remove('selected', 'correct', 'incorrect');
      });

      if (answer === 'correct') {
        selectedElement.classList.add('correct'); // Resalta la opción correcta
        correctAnswerElement.style.display = "block"; // Muestra el mensaje correcto
        incorrectAnswerElement.style.display = "none"; // Oculta el mensaje incorrecto
      } else {
        selectedElement.classList.add('incorrect'); // Resalta la opción incorrecta
        correctAnswerElement.style.display = "none"; // Oculta el mensaje correcto
        incorrectAnswerElement.style.display = "block"; // Muestra el mensaje incorrecto
      }

      selectedElement.classList.add('selected'); // Resalta la opción seleccionada
      answered = true; // Marca que ya se ha respondido
    }
  </script>

  <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>    
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a>
    </div>
</body>
</html>
