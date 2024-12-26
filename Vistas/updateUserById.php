<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR USUARIO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h2>Actualizar un usuario</h2>

    <?php
    include '../Modelos/adminModels.php'; // Asegúrate de que la ruta sea correcta
    
    
    // Mostrar mensaje si existe
    if (isset($_SESSION['mensaje'])) {
        echo "<p>" . $_SESSION['mensaje'] . "</p>";
        unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
    }

    // Verificar si se ha pasado el id_usuario
    if (isset($_GET['id'])) {
        $id_usuario = $_GET['id'];
        
        // Obtener la información del usuario
        $usuario = obtenerUsuarioPorId($id_usuario); // Asegúrate de tener esta función en tu controlador

        if ($usuario) {
            // Llenar el formulario con la información del usuario
            ?>
            <form action="../Controladores/adminController.php" method="POST">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>" required>

                <label for="nombres">Nombres:</label><br>
                <input type="text" id="nombres" name="nombres" value="<?php echo $usuario['nombres']; ?>" required><br>

                <label for="apellidos">Apellidos:</label><br>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required><br>

                <label for="celular">Celular:</label><br>
                <input type="text" id="celular" name="celular" value="<?php echo $usuario['celular']; ?>" required><br>

                <label for="correo">Correo:</label><br>
                <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>" required><br>
                
                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password" required><br>
                    
                <label for="id_rol">Rol:</label><br>
                <select name="id_rol" id="id_rol" required>
                    <option value="1" <?php echo $usuario['id_rol'] == 1 ? 'selected' : ''; ?>>1 - Administrador</option>
                    <option value="2" <?php echo $usuario['id_rol'] == 2 ? 'selected' : ''; ?>>2 - Vendedor</option>
                </select><br>
                
                <button type="submit" id='actualizarUsuario' name="actualizarUsuario" value="actualizarUsuario">Actualizar</button><br>
            </form>
            <?php
        } else {
            echo "<p>Usuario no encontrado.</p>";
        }
    } else {
        echo "<p>ID de usuario no proporcionado.</p>";
    }
    ?>
    </div>
</body>
</html>
