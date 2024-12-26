<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR VENTA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h1>Crea una venta</h1>
        <form action="../Controladores/sellerController.php" method="POST">

            <label for="id_usuario">Código usuario:</label><br>
            <input type="text" id="id_usuario" name="id_usuario" required><br>

            <label for="id_producto">Código producto:</label><br>
            <input type="text" id="id_producto" name="id_producto" required><br>

            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="5" required></textarea><br>
            
            <button type="submit" id ='crearVenta' name="crearVenta" value="crearVenta">Crear</button>
            <button><a class="volver" href="./home_vendedor.php">Volver al inicio</a></button>
        </form>
    </div>
</body>
</html>