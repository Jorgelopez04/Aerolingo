<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="login.php" method="post">
        <div class="container">
            <!-- Mensaje de error -->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php } ?>

            <div class="input-wrapper">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-wrapper">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <input class="btn" type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>
