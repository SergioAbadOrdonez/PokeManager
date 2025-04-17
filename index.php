<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemanager - Inicio de Sesión</title>
    <link rel="stylesheet" href="styles/styleLoginRegistro.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <figure>
            <img src="img/pokeball.png" alt="Pokeball" class="pokeball">
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
            <p>¿No eres entrenador? <a href="#" id="registro">Regístrate aquí</a></p>
        </section>
    </main>

    <dialog id="dialogoRegistro">
        <form method="dialog" id="formularioRegistro" action="registro.php">
            <h2>Registro de Entrenador</h2>
            <label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombre">
            </label>
            <label>
                <input type="email" name="email" placeholder="Correo electrónico" id="email">
            </label>
            <label>
                <input type="email" name="confirmaEmail" placeholder="Confirmar correo electrónico" id="confirmaEmail">
            </label>
            <label>
                <input type="password" name="password" placeholder="Contraseña" id="password">
            </label>
            <label>
                <input type="password" name="confirmarPassword" placeholder="Confirmar Contraseña" id="confirmarPassword">
            </label>
            <div class="botones-dialogo">
                <button type="submit" id="botonRegistro">Registrarse</button>
                <button type="button" id="botonCancelar">Cancelar</button>
            </div>
        </form>
    </dialog>

    <script src="registro.js"></script>
</body>
</html>