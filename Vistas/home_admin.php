<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: loginController.php");
    exit;
}

$nombre = $_SESSION['nombres'];

?>
    <div class="banner"><h2>Bienvenido, <?php echo htmlspecialchars($nombre); ?>!</h2> <br></div>
    <div class="dash">
        <span class="one">¿Qué dice mi niño?</span> <br>
        <span class="two">USUARIOS</span>
        <ul>
            <li><a class="link" href="./createUser.php">Crear</a></li>
            <li><a class="link" href="./findUser.php">Ver Lista</a></li>
        </ul>
        <a class="out" href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>