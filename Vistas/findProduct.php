<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Productos</title>
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
        <h2>Lista Productos</h2>
        <button><a class="volver" href="./home_vendedor.php">Volver al inicio</a></button>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include '../Controladores/sellerController.php'; // Asegúrate de que la ruta sea correcta
            
            // Obtener todos los usuarios
            $usuarios = obtenerTodosLosProductos(); // variable para guardar los resultados

            // Verificar si se ha enviado el formulario de búsqueda
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'])) {
                $id_usuario = filter_var($_POST['id_producto'], FILTER_SANITIZE_NUMBER_INT);
                $usuarioEncontrado = obtenerProductoPorId($id_usuario); // Llama a la función para buscar por ID

                if ($usuarioEncontrado) {
                    // Mostrar el usuario encontrado
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["id_producto"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["nombre"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["precio"]) . "</td>";
                    echo "<td>" . htmlspecialchars($usuarioEncontrado["descripcion"]) . "</td>";
                    echo "<td><a href='updateProduct.php?id=" . $usuarioEncontrado["id_producto"] . "'>Actualizar</a> | <a href='deleteProduct.php?id=" . $usuarioEncontrado["id_producto"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este Producto?\");'>Eliminar</a></td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='7'>No se encontró ningún Producto con ese ID.</td></tr>";
                }
            } else {
                // Mostrar todos los usuarios si no se ha realizado una búsqueda
                if (count($usuarios) > 0) { // Verifica si hay usuarios
                    foreach ($usuarios as $row) { // Usa un foreach para iterar sobre el array
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id_producto"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["precio"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["descripcion"]) . "</td>";
                        echo "<td><a href='updateProduct.php?id=" . $row["id_producto"] . "'>Actualizar</a> | <a href='deleteProduct.php?id=" . $row["id_producto"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este Producto?\");'>Eliminar</a></td>";
                        echo "</tr>";
                        }
                } else {
                    echo "<tr><td colspan='7'>No hay Productos registrados</td></tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>