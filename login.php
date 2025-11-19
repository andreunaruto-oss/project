<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? "";
    $pwd = $_POST['password'] ?? "";

    $user = loginUsuario($usuario, $pwd);

    if ($user) {
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['usuario_id'] = $user['id'];

        header("Location: index.php");
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<?php if ($mensaje): ?>
    <p style="color:red;"><?= htmlspecialchars($mensaje) ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
</form>

</body>
</html>

