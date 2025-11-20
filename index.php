<?php
session_start();
require_once __DIR__ . '/controllers/GameController.php';

$juegos = obtenerJuegosBD();
?>
<?php include 'views/header.php'; ?>

<div class="main-container">
    <h1>Juegos almacenados</h1>

    <?php if (empty($juegos)): ?>
        <p>No hay juegos todavía.</p>
    <?php else: ?>
        <div class="juegos-grid">
            <?php foreach ($juegos as $juego): ?>
                <div class="juego-card">
                    <img src="<?= htmlspecialchars($juego['imagen_url']) ?>" alt="">
                    <h3><?= htmlspecialchars($juego['titulo']) ?></h3>
                    <p><?= htmlspecialchars($juego['descripcion']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'views/footer.php'; ?>

