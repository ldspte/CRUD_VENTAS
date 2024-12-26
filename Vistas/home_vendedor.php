<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: loginController.php");
    exit;
}

$nombre = $_SESSION['nombres'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home vendedor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="banner"><h2>Bienvenido, <?php echo ($nombre); ?>!</h2> <br></div>
    <div class="dash">
        <span class="one">¿Qué dice mi niño?</span> <br>
        <div class="options">
            <div class="products">
                    <span class="two">PRODUCTOS</span> <br>
                    <ul>
                        <li><a class="link" href="./createProduct.php">Crear</a></li>
                        <li><a class="link" href="./findProduct.php">Ver Lista</a></li>
                    </ul>
            </div>
            <div class="sells">
                    <span class="two">VENTAS</span> <br>
                    <ul>
                        <li><a class="link" href="./createSell.php">Crear</a></li>
                        <li><a class="link" href="./findSell.php">Ver Lista</a></li>
                    </ul>
            </div>
        </div>
        <a class="out" href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>