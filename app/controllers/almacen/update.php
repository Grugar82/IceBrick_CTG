<?php
include('../../config.php');

$id_producto = $_POST['id_producto'];
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

if ($_FILES['img']['name'] != null) {
    // echo "hay imagen";
    $nombreArchivo = date("Y-m-d-h-i-s");
    $image_text = $nombreArchivo . "__" . $_FILES['img']['name'];
    $location = "../../../almacen/img_productos/" . $image_text;
    move_uploaded_file($_FILES["img"]["tmp_name"], $location);

} else {
    // echo "no hay imagen";
    $sql = "SELECT imagen FROM tb_almacen WHERE id_producto = :id_producto";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id_producto', $id_producto);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    $image_text = $resultado['imagen'];
}


$sentencia = $pdo->prepare("UPDATE tb_almacen
    SET 
    nombre =:nombre,
    descripcion =:descripcion,
    stock =:stock,
    stock_minimo =:stock_minimo,
    stock_maximo =:stock_maximo,
    precio_compra =:precio_compra,
    precio_venta =:precio_venta,
    fecha_ingreso =:fecha_ingreso,
    imagen =:imagen,
    id_user =:id_user,
    id_category =:id_category,
    time_update=:time_update 
    WHERE  id_producto =:id_producto");

$sentencia->bindParam(':nombre', $name_producto);
$sentencia->bindParam(':descripcion', $descripcion);
$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':stock_minimo', $stock_min);
$sentencia->bindParam(':stock_maximo', $stock_max);
$sentencia->bindParam(':precio_compra', $precio_compra);
$sentencia->bindParam(':precio_venta', $precio_venta);
$sentencia->bindParam(':fecha_ingreso', $fecha_enter);
$sentencia->bindParam(':imagen', $image_text);
$sentencia->bindParam(':id_user', $id_user);
$sentencia->bindParam(':id_category', $id_category);
$sentencia->bindParam(':time_update', $fechaHora);
$sentencia->bindParam(':id_producto', $id_producto);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el producto de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location:' . $URL . '/roles');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/almacen";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar la categoría";
    $_SESSION['icono'] = "error";
    // header('Location:' . $URL . '/roles/update.php');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/almacen/update.php?=id".$id_producto;
    </script>
    <?php
}