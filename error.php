<?php
require_once 'includes/header.inc.php';
?>

<main>
    <section class="error">
        <h2>Error</h2>
        <p><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : 'Ha ocurrido un error'; ?></p>
        <a href="index.php" class="boton">Volver al inicio</a>
    </section>
</main>

<?php
require_once 'includes/footer.inc.php';
?>
