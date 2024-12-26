<?php
include('../Modelos/sellerModels.php'); 

print_r($_POST);

if(isset($_POST['crearProducto'])){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

   if ($resultado = crearProducto($nombre, $precio, $descripcion) === true){
        header("location: ../Vistas/home_vendedor.php"); 
    } else {
        echo $resultado;
    }
}

if(isset($_POST['actualizarProducto'])){
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

   if ($resultado = actualizarProducto($id_producto, $nombre, $precio, $descripcion) === true){
        header("location: ../Vistas/findProduct.php"); 
    } else {
        echo $resultado; 
    }
}



if(isset($_POST['eliminarProducto'])){
    $id_producto = $_POST['id_producto'];
    if($resultado = eliminarProducto($id_producto) === true){
        header("location: ../Vistas/findProduct.php");
    } else {
        echo $resultado;
    }
}

if(isset($_POST['obtenerTodosLosProductos'])){
    if($resultado =obtenerTodosLosProductos() === true){
        header("location: ../Vistas/findProduct.php");
        return $resultado;
    } else {
        echo $resultado;
    }
}

if(isset($_POST['obtenerProductoPorId'])){
    $id = $_POST['id_producto'];
    if($resultado = obtenerProductoPorId($id) === true){
        header("location: ../Vistas/findProduct.php");
        return $resultado;
    } else {
        echo $resultado;
    }
}

if(isset($_POST['crearVenta'])){
    $id_usuario = $_POST['id_usuario'];
    $id_producto = $_POST['id_producto'];
    $descripcion = $_POST['descripcion'];

   if ($resultado = crearVenta($id_usuario, $id_producto, $descripcion) === true){
        header("location: ../Vistas/home_vendedor.php"); 
    } else {
        echo $resultado;
    }
}

if(isset($_POST['actualizarVenta'])){
    $id_venta = $_POST['id_venta'];
    $id_usuario = $_POST['id_usuario'];
    $id_producto = $_POST['id_producto'];
    $descripcion = $_POST['descripcion'];

   if ($resultado = actualizarVenta( $id_venta, $id_usuario, $id_producto, $descripcion) === true){
        header("location: ../Vistas/findSell.php"); 
    } else {
        echo $resultado;
    }
}

if(isset($_POST['eliminarVenta'])){
    $id_venta = $_POST['id_venta'];


   if ($resultado = eliminarVenta($id_venta) === true){
        header("location: ../Vistas/findSell.php"); 
    } else {
        echo $resultado;
    }
}

if(isset($_POST['obtenerTodasLasVentas'])){
   if ($resultado = obtenerTodasLasVentas() === true){
        header("location: ../Vistas/findSell.php"); 
        return $resultado;
    } else {
        echo $resultado;
    }
}

if(isset($_POST['obtenerVentaPorId'])){
   $id_venta = $_POST['id_venta'];
   if ($resultado = obtenerVentaPorId($id_venta) === true){
        header("location: ../Vistas/findSell.php"); 
        return $resultado;
    } else {
        echo $resultado;
    }
}

