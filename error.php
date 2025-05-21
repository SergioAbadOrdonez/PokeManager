<?php
require_once 'includes/header.inc.php';
// Frases aleatorias de Pokémon
$frases = [
    "¡Pikachu está triste por tu error!",
    "¡Parece que has lanzado una Pokéball y ha fallado!",
    "¡Oh no! Un Snorlax bloquea el registro.",
    "¡Charmander se ha quedado sin fuego! Intenta de nuevo.",
    "¡Un Zubat te ha confundido! Prueba otra vez.",
    "¡El Equipo Rocket se ha llevado tu formulario!",
    "¡Un Ditto ha cambiado tus datos!",
    "¡Psyduck tiene dolor de cabeza por este error!"
];
$frase = $frases[array_rand($frases)];
?>

<main>
    <section class="error">
        <h2 class="frase-pokemon"><?php echo $frase; ?></h2>
        <div class="alerta-error">
            <?php echo isset($_SESSION['error']) ? $_SESSION['error'] : 'Ha ocurrido un error'; ?>
        </div>
        <img src="img/sad_pikachu.jpg" alt="Pikachu triste" class="pikachu-triste">
    </section>
</main>

<script src="scripts/registro.js"></script>
<script src="scripts/login.js"></script>

<?php
require_once 'includes/footer.inc.php';
?>
