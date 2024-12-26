<?php
session_start();

if (isset($_SESSION['id_usuario'])) {
   header("location: ../Vistas/usuariosViews.php");
}

include('../Conexion/conexion.php');

if (isset($_POST['entrar'])) {
    $correo = $_POST['correo'];
    $clave = $_POST['password'];
    $consulta = "SELECT id_usuario, nombres, apellidos, celular, correo, password, id_rol FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
    if ($fila && password_verify($clave, $fila['password'])) {
        $_SESSION['id_usuario'] = $fila['id_usuario'];
        $_SESSION['nombres'] = $fila['nombres'];
        if ($fila['id_rol'] == 1) {
            header("location: ../Vistas/home_admin.php");
            exit();
        } else {
            header("location: ../Vistas/home_vendedor.php");
            exit();
        }
    } else {
        echo ('Correo o clave incorrectos.');
    }
}
mysqli_close($conexion);
?>