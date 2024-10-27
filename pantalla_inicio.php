<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerolingo - Log In</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Arial', sans-serif;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      background-image: url('https://img.freepik.com/fotos-premium/cree-imagen-que-simbolice-puntos-referencia-viajes-mundiales-familia_980716-3432.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
    }

    .logo {
       /* Tamaño del logo */
      background-image: url("logosinfondo.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      margin-bottom: 20px; /* Espacio entre el logo y el siguiente elemento */
      width: 350px;
      height: 100px;; /* Aumenta el tamaño del logo */
      display: block; /* Asegura que la imagen se comporte como un bloque */
    }

    .login-box {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .login-box button {
      width: 200px;
      padding: 15px;
      font-size: 18px;
      background-color: #007bff;
      border: none;
      color: white;
      border-radius: 25px;
      cursor: pointer;
    }

    .login-box p {
      margin-top: 10px;
      font-size: 16px;
      color: black;
    }

    .login-box a {
      color: #007bff;
      text-decoration: none;
    }
    
    .login-box a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Logo -->
    <img src="logosinfondo.png"  class="logo"> <!-- Logo -->

    <!-- Caja de Login -->
    <div class="login-box">
      <button onclick="window.location.href='login.html'">Log in</button> <!-- Conecta a login.html -->
      <p>Don’t have an account? <a href="preguntar_idioma_nativo.html">Sign Up</a></p> <!-- Conecta a preguntar_idioma_nativo.html -->
    </div>
  </div>
</body>
</html> 