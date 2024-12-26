<?php
session_start();
$usuarioEncontrado = $_SESSION['usuarioEncontrado'] ?? null;
$mensaje = $_SESSION['mensaje'] ?? null;

// Limpiar variables de sesión
unset($_SESSION['usuarioEncontrado']);
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuarios</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <h1>Lista de Usuarios</h1>
    <h2>Buscar Usuario por ID</h2>
    <form action="findUser.php" method="POST">
        <label for="id_usuario">ID del Usuario:</label>
        <input type="number" id='id_usuario' name="id_usuario" required>
        <button type="submit">Buscar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../Controladores/adminController.php'; // Asegúrate de que la ruta sea correcta
            
            // Obtener todos los usuarios
            $usuarios = obtenerTodosLosUsuarios(); // variable para guardar los resultados

            // Verificar si se ha enviado el formulario de búsqueda
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
                $id_usuario = filter_var($_POST['id_usuario'], FILTER_SANITIZE_NUMBER_INT);
                $usuarioEncontrado = obtenerUsuarioPorId($id_usuario); // Llama a la función para buscar por ID

                if ($usuarioEncontrado) {
                    // Mostrar el usuario encontrado
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["id_usuario"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["nombres"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["apellidos"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["celular"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["correo"]) . "</td>";
                    echo "<td>" . ($usuarioEncontrado["id_rol"] == 1 ? 'Administrador' : 'Vendedor') . "</td>";
                    echo "<td><a href='updateUserById.php?id=" . $usuarioEncontrado["id_usuario"] . "'>Actualizar</a> | <a href='deleteUser.php?id=" . $usuarioEncontrado["id_usuario"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</a></td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='7'>No se encontró ningún usuario con ese ID.</td></tr>";
                }
            } else {
                // Mostrar todos los usuarios si no se ha realizado una búsqueda
                if (count($usuarios) > 0) { // Verifica si hay usuarios
                    foreach ($usuarios as $row) { // Usa un foreach para iterar sobre el array
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id_usuario"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nombres"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["apellidos"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["celular"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["correo"]) . "</td>";
                        echo "<td>" . ($row["id_rol"] == 1 ? 'Administrador' : 'Vendedor') . "</td>";
                        echo "<td><a href='updateUserById.php?id=" . $row["id_usuario"] . "'>Actualizar</a> | <a href='deleteUser.php?id=" . $row["id_usuario"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay usuarios registrados</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <button><a class="volver" href="./home_admin.php">Volver al inicio</a></button>
    </div>
</body>
</html>