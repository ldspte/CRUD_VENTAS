<?php
include '../Controladores/adminController.php'; // Asegúrate de que la ruta sea correcta

// Verificar si se ha pasado el id_usuario
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Llamar a la función para eliminar el usuario
    if (eliminarUsuario($id_usuario)) {
        echo "<p>Usuario eliminado con éxito.</p>";
    } else {
        echo "<p>Error al eliminar el usuario.</p>";
    }
} else {
    echo "<p>ID de usuario no proporcionado.</p>";
}

// Redirigir de vuelta a la lista de usuarios después de un breve retraso
header("refresh:1;url=findUser.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
</body>
</html>