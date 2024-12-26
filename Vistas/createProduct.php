<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR PRODUCTO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h1>Crea un producto</h1>
        <form action="../Controladores/sellerController.php" method="POST">

            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="precio">Precio:</label><br>
            <input type="text" id="precio" name="precio" required><br>

            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="5" required></textarea><br>
            
            <button type="submit" id ='crearProducto' name="crearProducto" value="crearProducto">Crear</button>
            <button><a class="volver" href="./home_vendedor.php">Volver al inicio</a></button>
        </form>
    </div>
</body>
</html>