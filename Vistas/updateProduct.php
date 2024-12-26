<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR PRODUCTO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h2>Actualizar un producto</h2>

        <?php
        include '../Controladores/sellerController.php'; // Asegúrate de que la ruta sea correcta

        // Verificar si se ha pasado el id
        if (isset($_GET['id'])) {
            $id_producto = $_GET['id'];
            
            // Obtener la información del producto
            $producto = obtenerProductoPorId($id_producto); // Asegúrate de tener esta función en tu controlador
            
            if ($producto) {
                // Llenar el formulario con la información del usuario
                ?>
                <form action="../Controladores/sellerController.php" method="POST">
                    <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $producto['id_producto']; ?>" required>

                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>

                    <label for="precio">Precio:</label><br>
                    <input type="text" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" required><br>

                    <label for="descripcion">Descripcion:</label><br>
                    <input type="text" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required><br>
                    
                    <button type="submit" id='actualizarProducto' name="actualizarProducto" value="actualizarProducto">Actualizar</button><br>
                </form>
                <?php
            } else {
                echo "<p>Producto no encontrado.</p>";
            }
        } else {
            echo "<p>ID de producto no proporcionado.</p>";
        }
        ?>
    </div>
</body>
</html>