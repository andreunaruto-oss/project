<?php
$host = 'localhost';
$dbname = 'JoystickRatings';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo; // <- ESTO ES CLAVE
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


