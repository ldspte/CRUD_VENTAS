<?php
global $conexion;
$db_host = "localhost";
$db_name = "crud_ventas";
$db_user = "root";
$db_pass = "";
try {
    $conexion= new mysqli($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
    echo "Error al conectar a la base de datos: ". $th->getMessage();
    exit(); 
}
?>