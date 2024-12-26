<?php
include('../Modelos/adminModels.php'); 

print_r($_POST);

if(isset($_POST['crearUsuario'])){
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $password = $_POST['password'];
    $id_rol = $_POST['id_rol'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    echo $nombres;

   if ($resultado = crearUsuario($nombres, $apellidos, $correo, $celular, $hash, $id_rol) === true){
        header("location: ../Vistas/home_admin.php"); 
    } else {
        echo $resultado; 
    }
}

if(isset($_POST['actualizarUsuario'])){
    $id_usuario = $_POST['id_usuario'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $password = $_POST['password'];
    $id_rol = $_POST['id_rol'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    if($resultado = actualizarUsuario($id_usuario, $nombres, $apellidos, $correo, $celular, $password, $id_rol) === true){
        header("location: ../Vistas/home_admin.php");
        $_SESSION['mensaje'] = "Usuario actualizado con éxito.";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el usuario.";
        echo $resultado;
    }
}

if(isset($_POST['eliminarUsuario'])){
    $id_usuario = $_POST['id_usuario'];
    if($resultado = eliminarUsuario($id_usuario) === true){
        header("location: ../Vistas/home_admin.php");
    } else {
        echo $resultado;
    }
}

if(isset($_POST['obtenerTodosLosUsuarios'])){
    if($resultado = obtenerTodosLosUsuarios() === true){
        return $resultado;
        header("location: ../Vistas/findUser.php");
    } else {
        echo $resultado;
    }
}

if(isset($_POST['obtenerUsuarioPorId'])){
    $id = $_POST['id_usuario'];
    if($resultado = obtenerUsuarioPorId($id) === true){
        header("location: ../Vistas/findUserById.php");
        return $resultado;
    } else {
        echo $resultado;
    }
}
