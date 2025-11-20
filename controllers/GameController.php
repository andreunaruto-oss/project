<?php
require_once __DIR__ . '/../db/conexion.php';

/*
 |----------------------------------------------------------
 | Obtener todos los juegos almacenados en la base de datos
 |----------------------------------------------------------
*/
function obtenerJuegosBD() {
    global $pdo;

    $sql = "SELECT id, titulo, descripcion, imagen_url FROM juegos ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/*
 |----------------------------------------------------------
 | Obtener un juego concreto por ID
 |----------------------------------------------------------
*/
function obtenerJuegoBD($id) {
    global $pdo;

    $sql = "SELECT id, titulo, descripcion, imagen_url FROM juegos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

