<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR VENTA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
    <h2>Actualizar una venta</h2>
        <?php
        include '../Controladores/sellerController.php'; // Asegúrate de que la ruta sea correcta


        // Mostrar mensaje si existe
        if (isset($_SESSION['mensaje'])) {
            echo "<p>" . $_SESSION['mensaje'] . "</p>";
            unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
        }

        // Verificar si se ha pasado el id_usuario
        if (isset($_GET['id'])) {
            $id_venta = $_GET['id'];
            
            // Obtener la información del usuario
            $venta =obtenerVentaPorId($id_venta); // Asegúrate de tener esta función en tu controlador
            
            if ($venta) {
                // Llenar el formulario con la información del usuario
                ?>
                <form action="../Controladores/sellerController.php" method="POST">
                    <input type="hidden" id="id_venta" name="id_venta" value="<?php echo $venta['id_venta']; ?>" required>

                    <label for="id_usuario">Id usuario:</label><br>
                    <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $venta['id_usuario']; ?>" required><br>

                    <label for="id_producto">Id producto:</label><br>
                    <input type="text" id="id_producto" name="id_producto" value="<?php echo $venta['id_producto']; ?>" required><br>

                    <label for="descripcion">Descripcion:</label><br>
                    <input type="text" id="descripcion" name="descripcion" value="<?php echo $venta['descripcion']; ?>" required><br>
                    
                    <button type="submit" id='actualizarVenta' name="actualizarVenta" value="actualizarVenta">Actualizar</button><br>
                </form>
                <?php
            } else {
                echo "<p>Venta no encontrada.</p>";
            }
        } else {
            echo "<p>ID de venta no proporcionado.</p>";
        }
        ?>
    </div>
</body>
</html>