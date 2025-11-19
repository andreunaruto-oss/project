<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $pwd = $_POST["password"];

    if (registrarUsuario($nombre, $email, $usuario, $pwd)) {
        header("Location: login.php");
        exit;
    } else {
        $mensaje = "Error al registrar.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>

<h2>Registro</h2>

<?php if ($mensaje): ?>
    <p style="color:red;"><?= htmlspecialchars($mensaje) ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>
</body>
</html>
