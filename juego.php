<?php
session_start();
require_once __DIR__ . '/controllers/GameController.php';

if (!isset($_GET['id'])) {
    die("ID no especificado.");
}

$juego = obtenerJuegoBD($_GET['id']);
if (!$juego) {
    die("Juego no encontrado.");
}

include 'views/header.php';
?>

<div class="main-container">
    <h1><?= htmlspecialchars($juego['titulo']) ?></h1>
    <img src="<?= htmlspecialchars($juego['imagen_url']) ?>" class="juego-portada-detalle">
    <p><?= htmlspecialchars($juego['descripcion']) ?></p>
</div>

<?php include 'views/footer.php'; ?>
