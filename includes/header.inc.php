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