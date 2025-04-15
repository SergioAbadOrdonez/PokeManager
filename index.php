<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemanager - Inicio de Sesión</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <figure>
            <span></span>
        </figure>
        <section>
            <h1>Bienvenido a Pokemanager</h1>
            <form action="login.php" method="POST">
                <label>
                    <input type="text" name="usuario" placeholder="Nombre de Entrenador">
                </label>
                <label>
                    <input type="password" name="password" placeholder="Contraseña">
                </label>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <p>¿No eres entrenador? <a href="register.php">Regístrate aquí</a></p>
        </section>
    </main>
</body>
</html>