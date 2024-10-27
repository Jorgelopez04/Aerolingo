<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form method="post">
        <div class="container">
    
        <div class="input-wrapper">
            <input type="text" name="name" placeholder="Nombre">
        </div>

        <div class="input-wrapper">
            <input type="text" name="apellidos" placeholder="Apellidos">
        </div>

        <div class="input-wrapper">
            <input type="number" name="identificacion" placeholder="Identificacion">
        </div>

        <div class="input-wrapper">
            <input type="tel" name="phone" placeholder="Telefono">
        </div>

        <div class="input-wrapper">
            <input type="email" name="email" placeholder="Email">
        </div>

        <div class="input-wrapper">
            <input type="password" name="password" placeholder="Contraseña">
        </div>

        <input class="btn" type="submit" name="register" value="Enviar">
    </form>

    <?php
        include("registrar.php")
    ?>
    
</body>
</html>