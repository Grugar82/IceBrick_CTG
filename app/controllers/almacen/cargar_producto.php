<?php
$id_producto_get = $_GET['id'];
$sql_productos = "SELECT *, 
                        category.name_category as categoria,
                        u.email as email,
                        u.names as usuario_nombre,
                        u.id_user as id_user
                FROM tb_almacen as alm
                INNER JOIN tb_categoria as category
                ON alm.id_category = category.id_category
                INNER JOIN tb_usuarios as u
                ON u.id_user = alm.id_user 
                WHERE id_producto = :id_producto";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->bindParam(':id_producto', $id_producto_get);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos_productos as $datos_producto) {
        $code = $datos_producto['codigo'];
        $name_category = $datos_producto['name_category'];
        $name_producto = $datos_producto['nombre'];
        $email = $datos_producto['email'];
        $id_user = $datos_producto['id_user'];
        $descripcion = $datos_producto['descripcion'];
        $stock = $datos_producto['stock'];
        $stock_min = $datos_producto['stock_minimo'];
        $stock_max = $datos_producto['stock_maximo'];
        $precio_compra = $datos_producto['precio_compra'];
        $precio_venta = $datos_producto['precio_venta'];
        $fecha_enter = $datos_producto['fecha_ingreso'];
        $imagen = $datos_producto['imagen'];
}
?>