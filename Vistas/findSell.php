<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Ventas</title>
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
        th {
            background-color: #f2f2f2;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h2>Lista Ventas</h2>
        <button><a class="volver" href="./home_vendedor.php">Volver al inicio</a></button> <br>
        <br>

        <form action="findSell.php" method="POST">
            <label for="id_venta">ID del Usuario:</label>
            <input type="number" id='id_venta' name="id_venta" required>
            <button type="submit">Buscar</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Id Usuario</th>
                    <th>Id Producto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include '../Controladores/sellerController.php'; // Asegúrate de que la ruta sea correcta
            
            // Obtener todos los usuarios
            $usuarios = obtenerTodasLasVentas(); // variable para guardar los resultados

            // Verificar si se ha enviado el formulario de búsqueda
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_venta'])) {
                $id_usuario = filter_var($_POST['id_venta'], FILTER_SANITIZE_NUMBER_INT);
                $usuarioEncontrado = obtenerVentaPorId($id_usuario); // Llama a la función para buscar por ID

                if ($usuarioEncontrado) {
                    // Mostrar el usuario encontrado
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["id_venta"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["id_usuario"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["id_producto"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["descripcion"]) . "</td>";
                    echo "<td><a href='updateSell.php?id=" . $usuarioEncontrado["id_venta"] . "'>Actualizar</a> | <a href='deleteSell.php?id=" . $usuarioEncontrado["id_venta"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta Venta?\");'>Eliminar</a></td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='7'>No se encontró ningúna venta con ese ID.</td></tr>";
                }
            } else {
                // Mostrar todos los usuarios si no se ha realizado una búsqueda
                if (count($usuarios) > 0) { // Verifica si hay usuarios
                    foreach ($usuarios as $row) { // Usa un foreach para iterar sobre el array
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id_venta"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["id_usuario"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["id_producto"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["descripcion"]) . "</td>";
                        echo "<td><a href='updateSell.php?id=" . $row["id_venta"] . "'>Actualizar</a> | <a href='deleteSell.php?id=" . $row["id_venta"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta Venta?\");'>Eliminar</a></td>";
                        echo "</tr>";
                        }
                } else {
                    echo "<tr><td colspan='7'>No hay Ventas registradas</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <button><a class="volver" href="./home_admin.php">Volver al inicio</a></button>
    </div>
</body>
</html>