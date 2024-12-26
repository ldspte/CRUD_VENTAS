<?php
include('../Conexion/conexion.php');

function crearProducto($nombre, $precio, $descripcion) {
    global $conexion;
    $query = "INSERT INTO productos (nombre, precio, descripcion) VALUES ('$nombre', '$precio', '$descripcion')";

    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion);
        return "Hubo un error en la insercion: " . $error;
    }
}


function actualizarProducto($id_producto, $nombre, $precio, $descripcion ) {
    global $conexion;
    $query = "UPDATE productos SET nombre ='$nombre', precio = '$precio', descripcion = '$descripcion' WHERE id_producto = '$id_producto'";
    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion); 
        return "Hubo un error en la insercion: " . $error;
    }      
 }

 function eliminarProducto($id) {
    global $conexion; 
    $query = "DELETE FROM productos WHERE id_producto = '$id'";
    if ($conexion->query($query)) {
        mysqli_close($conexion);  
        return true;
    } else { 
        $error = $conexion->error; 
        mysqli_close($conexion); 
        return "Hubo un error en la eliminacion: " . $error;
    }
}

function obtenerTodosLosProductos() { 
    global $conexion;
    $query = "SELECT * FROM productos";
    $resultado = $conexion->query($query);
    $usuarios = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }
    return $usuarios;
}

function obtenerProductoPorId($id) {
    global $conexion;
    $query = "SELECT * FROM productos WHERE id_producto = $id";
    $resultado = $conexion->query($query);
   
    return $resultado->fetch_assoc();

}



function crearVenta($id_usuario, $id_producto, $descripcion) {
    global $conexion;
    $query = "INSERT INTO ventas (id_usuario, id_producto, descripcion) VALUES ('$id_usuario', '$id_producto', '$descripcion')";
    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion);
        return "Hubo un error en la insercion: " . $error;
    }
}


function actualizarVenta($id_venta, $id_usuario, $id_producto, $descripcion) {
    global $conexion;
    $query = "UPDATE ventas SET id_usuario ='$id_usuario', id_producto = '$id_producto', descripcion = '$descripcion' WHERE id_venta = '$id_venta'";
    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion); 
        return "Hubo un error en la insercion: " . $error;
    }      
 }

 function eliminarVenta($id) {
    global $conexion; 
    $query = "DELETE FROM ventas WHERE id_venta = '$id'";
    if ($conexion->query($query)) {
        mysqli_close($conexion);  
        return true;
    } else { 
        $error = $conexion->error; 
        mysqli_close($conexion); 
        return "Hubo un error en la eliminacion: " . $error;
    }
}

function obtenerTodasLasVentas() { 
    global $conexion;
    $query = "SELECT * FROM ventas";
    $resultado = $conexion->query($query);
    $usuarios = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }
    return $usuarios;
}

function obtenerVentaPorId($id) {
    global $conexion;
    $query = "SELECT * FROM ventas WHERE id_venta = $id";
    $resultado = $conexion->query($query);
   
    return $resultado->fetch_assoc();

}
?>