<?php
include '../Controladores/sellerController.php'; // Asegúrate de que la ruta sea correcta
// Verificar si se ha pasado el id_usuario
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    // Llamar a la función para eliminar el usuario
    if (eliminarProducto($id_producto)) {
        echo "<p>Producto eliminado con éxito.</p>";
    } else {
        echo "<p>Error al eliminar el producto.</p>";
    }
} else {
    echo "<p>ID de producto no proporcionado.</p>";
}
// Redirigir de vuelta a la lista de usuarios después de un breve retraso
header("refresh:2;url=findProduct.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
</body>
</html>