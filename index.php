<?php
require_once 'includes/header.inc.php';
?>

    <main>
        <section class="bienvenida">
            <h2>Bienvenido a Pokemanager</h2>
            <p>Tu plataforma definitiva para gestionar y organizar tu colección de Pokémon</p>
        </section>

        <section class="caracteristicas">
            <article>
                <h3>Gestiona tu Equipo</h3>
                <p>Crea y personaliza tu equipo de Pokémon perfecto</p>
            </article>
            <article>
                <h3>Combate contra otrs Entrenadores</h3>
                <p>Usa tus pokemons y defiende tu orgullo peleando contra otros entrenadores</p>
            </article>
            <article>
                <h3>Abre sobres</h3>
                <p>Aumenta tu colección con la mejor de las addiciones: ¡¡LUDOPATÍA!!</p>
            </article>
        </section>
    </main>

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
        <form id="formularioRegistro" enctype="multipart/form-data">
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

    <script src="scripts/registro.js"></script>
    <script src="scripts/login.js"></script>

<?php
require_once 'includes/footer.inc.php';
?>