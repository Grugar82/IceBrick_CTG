<?php
include('../../config.php');



$code = $_POST['codigo'];
$id_category = $_POST['id_category'];
$name_producto = $_POST['name_producto'];
$id_user = $_POST['id_user'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_enter = $_POST['fecha_enter'];

$img = $_POST['img'];
$nombreArchivo = date("Y-m-d-h-i-s");
$filename = $nombreArchivo . "__" . $_FILES['img']['name'];
$location = "../../../almacen/img_productos/" . $filename;

move_uploaded_file($_FILES["img"]["tmp_name"], $location);

$sentencia = $pdo->prepare("INSERT INTO tb_almacen
    (codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, id_user, id_category, time_creation )
VALUES
    (:codigo, :nombre, :descripcion, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :id_user, :id_category, :time_creation)");

$sentencia->bindParam(':codigo', $code);
$sentencia->bindParam(':nombre', $name_producto);
$sentencia->bindParam(':descripcion', $descripcion);
$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':stock_minimo', $stock_min);
$sentencia->bindParam(':stock_maximo', $stock_max);
$sentencia->bindParam(':precio_compra', $precio_compra);
$sentencia->bindParam(':precio_venta', $precio_venta);
$sentencia->bindParam(':fecha_ingreso', $fecha_enter);
$sentencia->bindParam(':imagen', $filename);
$sentencia->bindParam(':id_user', $id_user);
$sentencia->bindParam(':id_category', $id_category);
$sentencia->bindParam(':time_creation', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró el producto de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen');
} else {
    session_start();
    $_SESSION['mensaje'] = "Perdon, ya existe ese rol";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/almacen/create.php');
}