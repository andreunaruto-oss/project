<?php
session_start();
require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/controllers/GameController.php';

// Obtenemos juegos desde la BD
$juegos = obtenerJuegos();
?>

<div class="main-container">
    <header class="main-header">
        <h1>🎮 JoystickRatings</h1>
    </header>

    <div class="search-container">
        <form method="GET" action="index.php" class="search-bar">
            <input type="text" name="q" placeholder="Buscar juegos..." required>
            <button type="submit">Buscar</button>
        </form>
    </div>

    <section class="intro">
        <h2>Bienvenido a JoystickRatings</h2>
        <p>Tu espacio para descubrir videojuegos.</p>
    </section>

    <section class="juegos">
        <h2>Juegos destacados</h2>

        <div class="juegos-grid">
            <?php if (!empty($juegos)): ?>
                <!-- 🔹 Juegos reales desde la base de datos -->
                <?php foreach ($juegos as $juego): ?>
                    <div class="juego-card">
                        <?php if (!empty($juego['imagen_url'])): ?>
                            <img src="<?= htmlspecialchars($juego['imagen_url']) ?>" 
                                 alt="<?= htmlspecialchars($juego['titulo']) ?>">
                        <?php else: ?>
                            <img src="assets/img/placeholder_game.png" alt="Juego sin imagen">
                        <?php endif; ?>

                        <h3><?= htmlspecialchars($juego['titulo']) ?></h3>
                        <p class="card-description">
                            <?= htmlspecialchars($juego['descripcion'] ?? 'Sin descripción.') ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- 🔹 Si aún no hay juegos en la tabla, mostramos ejemplos de prueba -->
                <div class="juego-card">
                    <img src="assets/img/placeholder_game.png" alt="Juego 1">
                    <h3>Juego de ejemplo</h3>
                    <p class="card-description">Descripción del juego de ejemplo...</p>
                </div>

                <div class="juego-card">
                    <img src="assets/img/placeholder_game.png" alt="Juego 2">
                    <h3>Juego de ejemplo</h3>
                    <p class="card-description">Descripción del juego de ejemplo...</p>
                </div>

                <div class="juego-card">
                    <img src="assets/img/placeholder_game.png" alt="Juego 3">
                    <h3>Juego de ejemplo</h3>
                    <p class="card-description">Descripción del juego de ejemplo...</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
<?php require_once __DIR__ . '/views/footer.php'; ?>
