<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Tu Nombre">
    <meta name="description" content="PokéManager - Tu gestor de Pokémon">
    <title>Pokemanager</title>
    <link rel="icon" type="image/png" href="img/pokeball.png">
    <link rel="stylesheet" href="styles/styleLoginRegistro.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">
                <img src="img/pokeball.png" alt="Pokeball" class="pokeball">
            </a>
            <h1>Pokemanager</h1>
            <menu>
                <button id="login">Iniciar Sesión</button>
                <button id="registro">Registrarse</button>
            </menu>
        </nav>
    </header>
    <dialog id="dialogoLogin">
        <figure>
            <img src="img/pokeball.png" alt="Pokeball" class="pokebalLogin">
        </figure>
        <form id="formularioLogin" method="POST" action="includes/login.inc.php">
            <h2>Iniciar Sesión</h2>
            <label>
                <input type="text" name="nombre" id="nombreLogin" placeholder="Nombre de Entrenador">
            </label>
            <label>
                <input type="password" name="password" id="passwordLogin" placeholder="Contraseña">
            </label>
            <p id="mensajeLogin" style="color: red" class="menajes">
                <?php
                    if(isset($_SESSION["error_login"])){
                        echo $_SESSION["error_login"];
                        unset($_SESSION["error_login"]);
                    }
                ?>
            </p>
            <button type="submit">Iniciar Sesión</button>
            <button type="button" id="botonCancelarLogin">Cancelar</button>
        </form>
    </dialog>

    <dialog id="dialogoRegistro">
        <form id="formularioRegistro" method="POST" action="includes/registro.inc.php" enctype="multipart/form-data">
            <h2>Registro de Entrenador</h2>
            <label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombre">
            </label>
            <label>
                <input type="number" name="edad" placeholder="Edad" id="edad">
            </label>
            <label>
                <input type="email" name="email" placeholder="Correo electrónico" id="email">
            </label>
            <label>
                <input type="email" name="confirmarEmail" placeholder="Confirmar correo electrónico" id="confirmarEmail">
            </label>
            <label>
                <input type="password" name="password" placeholder="Contraseña" id="password">
            </label>
            <label>
                <input type="password" name="confirmarPassword" placeholder="Confirmar Contraseña" id="confirmarPassword">
            </label>
            <label class="fotoPerfil"> Selecciona una foto de perfil
                <input type="file" name="fotoPerfil" id="fotoPerfil">
            </label>
            <p id='mensaje' style='color: red' class="mensajes">
                <?php
                    if(isset($_SESSION["error_registro"])){
                        echo $_SESSION["error_registro"];
                        unset($_SESSION["error_registro"]);
                    }
                ?>
            </p>
            <button type="submit" id="botonRegistro">Registrarse</button>
            <button type="button" id="botonCancelar">Cancelar</button>
        </form>
    </dialog>