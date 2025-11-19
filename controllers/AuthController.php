<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../db/conexion.php';

function registrarUsuario($nombre, $email, $usuario, $pwd) {
    global $pdo;

    $sql = "INSERT INTO usuarios (nombre, email, usuario, password)
            VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([$nombre, $email, $usuario, $pwd]);
}

function loginUsuario($usuario, $pwd) {
    global $pdo;

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario, $pwd]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

