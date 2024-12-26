<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR USUARIO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h1>Crea un usuario</h1>
        <form action="../Controladores/adminController.php" method="POST">

            <label for="nombres">Nombres:</label><br>
            <input type="text" id="nombres" name="nombres" required><br>

            <label for="apellidos">Apellidos:</label><br>
            <input type="text" id="apellidos" name="apellidos" required><br>

            <label for="celular">Celular:</label><br>
            <input type="text" id="celular" name="celular" required><br>

            <label for="correo">Correo:</label><br>
            <input type="email" id="correo" name="correo" required><br>
            
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br>
                
            <label for="id_rol">Rol:</label><br>
            <select name="id_rol" id="id_rol" required>
                <option value="">Selecciona rol</option>
                <option value="1">1 - Administrador</option>
                <option value="2">2 - Vendedor</option>
            </select><br>
            
            <button type="submit" id ='crearUsuario' name="crearUsuario" value="crearUsuario">Crear</button>
            <button><a class="volver" href="./home_admin.php">Volver al inicio</a></button>
        </form>
    </div>

</body>
</html>