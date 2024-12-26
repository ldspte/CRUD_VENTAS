<?php
include('../Conexion/conexion.php');

function crearUsuario($nombres, $apellidos, $correo, $celular, $password, $id_rol) {
    global $conexion;
    $query = "INSERT INTO usuarios (nombres, apellidos, correo, celular, password, id_rol) VALUES ('$nombres', '$apellidos', '$correo', '$celular', '$password', '$id_rol')";

    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion);
        return "Hubo un error en la insercion: " . $error;
    }
}


function actualizarUsuario($id, $nombres, $apellidos, $correo, $celular, $password, $id_rol) {
    global $conexion;
    $query = "UPDATE usuarios SET nombres ='$nombres', apellidos = '$apellidos', correo = '$correo', celular = '$celular', password = '$password', id_rol = '$id_rol' WHERE id_usuario = '$id'";
    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion); 
        return "Hubo un error en la insercion: " . $error;
    }      
 }

 function eliminarUsuario($id) {
    global $conexion; 
    $query = "DELETE FROM usuarios WHERE id_usuario = '$id'";
    if ($conexion->query($query)) {
        mysqli_close($conexion);  
        return true;
    } else { 
        $error = $conexion->error; 
        mysqli_close($conexion); 
        return "Hubo un error en la eliminacion: " . $error;
    }
}

function obtenerTodosLosUsuarios() { 
    global $conexion;
    $query = "SELECT * FROM usuarios";
    $resultado = $conexion->query($query);
    $usuarios = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }
    return $usuarios;
}


function obtenerUsuarioPorId($id) {
    global $conexion;
    $query = "SELECT * FROM usuarios WHERE id_usuario = $id";
    $resultado = $conexion->query($query);
   
    return $resultado->fetch_assoc();
}


// function obtenerUsuarioPorId($id) {
//     global $conexion;
//     $query = "SELECT * FROM usuarios WHERE id_usuario = $id";
//     $resultado = $conexion->query($query);
//     $usuario = [];
//     if ($resultado->num_rows > 0) {
//         while($row = $resultado->fetch_assoc()) {
//             $usuario[] = $row;
//         }
//     }
//     return $usuario;
//     mysqli_close($conexion); 
   

// }

function crearVenta($id_user, $id_producto, $descripcion) {
    global $conexion;
    $query = "INSERT INTO ventas (id_usuario, id_producto, descripcion) VALUES ('$id_user', '$id_producto', '$descripcion')";
    if ($conexion->query($query) === TRUE) {
        mysqli_close($conexion); 
        return true;
    } else {
        $error = $conexion->error; 
        mysqli_close($conexion);
        return "Hubo un error en la insercion: " . $error;
    }
}


function actualizarVenta($id_venta, $id_user, $id_producto, $descripcion) {
    global $conexion;
    $query = "UPDATE ventas SET id_usuario ='$id_user', id_producto = '$id_producto', descripcion = '$descripcion' WHERE id_venta = '$id_venta'";
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

function obtenerTodasVentas() { 
    global $conexion;
    $query = "SELECT * FROM ventas";
    $resultado = $conexion->query($query);
    $usuarios = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }
    mysqli_close($conexion); 
    return $usuarios;
}

function obtenerVentaPorId($id) {
    global $conexion;
    $query = "SELECT * FROM ventas WHERE id_venta = $id";
    $resultado = $conexion->query($query);
   
    mysqli_close($conexion); 
    return $resultados->fetch_assoc();

}
?>