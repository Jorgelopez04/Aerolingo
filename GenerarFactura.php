<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Factura</title>
    <style>
        .menu-icon {
            cursor: pointer;
            font-size: 30px;
            color: black; /* Cambiar el color a negro */
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/vector-premium/viajar-mundo-avion-ubicacion-pin-mapa-mundial-ilustracion-plana-viaje_471402-694.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 200px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .invoice {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .invoice h2 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            color: #007bff;
        }

        .invoice p {
            margin: 5px 0;
            font-size: 16px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 15px;
        }

        .button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
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
        }

        .navbar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 20px;
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

        // Cargar nombre de usuario desde localStorage en el sidebar
        document.addEventListener("DOMContentLoaded", function() {
            const nombreUsuario = localStorage.getItem("nombreUsuario") || "Usuario";
            document.getElementById("nombreUsuarioSidebar").textContent = nombreUsuario;
        });
    </script>

    <div class="container">
        <h1>Factura</h1>
        <div class="invoice" id="invoice">
            <h2>Detalles de la Factura</h2>
            <p><strong>Nombre:</strong> <span id="nombreFactura"></span></p>
            <p><strong>ID:</strong> <span id="identificacionFactura"></span></p>
            <p><strong>Email:</strong> <span id="emailFactura"></span></p>
            <p><strong>Descripción del Plan:</strong> <span id="descripcionPlan"></span></p>
            <p class="total"><strong>Total a Pagar:</strong> $<span id="totalPagar"></span></p>
        </div>
        <button class="button" id="pagarFactura">Pagar</button>
    </div>

    <div class="navbar">
    <a href="Pantalla_principal.php">🏠</a>   
    <a href="Compras.php">🛒</a>
    <a href="Perfil.php">👤</a> 
    </div>

    <script>
        // Cargar datos desde localStorage y mostrarlos en la factura
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("descripcionPlan").innerText = localStorage.getItem("descripcionPlan");
            document.getElementById("totalPagar").innerText = localStorage.getItem("totalPagar");

            // Cargar los datos personales
            document.getElementById("nombreFactura").innerText = localStorage.getItem("nombre");
            document.getElementById("identificacionFactura").innerText = localStorage.getItem("identificacion");
            document.getElementById("emailFactura").innerText = localStorage.getItem("email");
        });

        // Event Listener para el botón de pagar
        document.getElementById("pagarFactura").addEventListener("click", function() {
            alert("¡El pago se ha realizado con éxito!");
            // Aquí podrías implementar la lógica para procesar el pago o redirigir a otra página
        });
    </script>
</body>
</html>
