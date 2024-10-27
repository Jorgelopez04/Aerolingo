<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form method="post">
        <div class="container">    
            <div class="input-wrapper">
                <input type="email" name="email" placeholder="Email" required> <!-- Campo requerido -->
            </div>

            <div class="input-wrapper">
                <input type="password" name="password" placeholder="Contraseña" required> <!-- Campo requerido -->
            </div>

            <input class="btn" type="submit" value="Enviar"> <!-- Cambié el atributo 'name' a 'submit' solo -->
        </div>
    </form>
</body>
</html>