<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>JoystickRatings</title>

    <!-- CSS BASE -->
    <link rel="stylesheet" href="assets/css/base.css">

    <!-- NAV -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- CSS portada -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

<nav class="main-nav">
    <div class="nav-left">
        <a href="index.php">Inicio</a>
    </div>

    <div class="nav-right">
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="logout.php" class="btn">Salir</a>
        <?php else: ?>
            <a href="login.php" class="btn">Login</a>
            <a href="registro.php" class="btn">Registro</a>
        <?php endif; ?>
    </div>
</nav>
<hr>

