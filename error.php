<?php
require_once 'includes/header.inc.php';
?>

<main>
    <section class="error">
        <h2>Ooops... ¡algo ha fallado!</h2>
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
