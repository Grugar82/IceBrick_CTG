<?php



// $sql_productos = "SELECT a.id_producto as id_producto,
//                         a.codigo as codigo, 
//                         a.nombre as nombre,
//                         a.descripcion as descripcion, 
//                         a.stock as stock, 
//                         a.stock_minimo as stock_minimo, 
//                         a.stock_maximo as stock_maximo, 
//                         a.precio_compra as precio_compra, 
//                         a.precio_venta as precio_venta, 
//                         a.fecha_ingreso as fecha_ingreso, 
//                         a.imagen as imagen, 
//                         category.name_category
//                 FROM tb_almacen as a
//                 INNER JOIN tb_categoria as category
//                 ON a.id_category = category.id_category;";

$sql_productos = "SELECT *, 
                        category.name_category as categoria ,
                        u.email as email,
                        u.names as usuario_nombre
                FROM tb_almacen as alm
                INNER JOIN tb_categoria as category
                ON alm.id_category = category.id_category
                INNER JOIN tb_usuarios as u
                ON u.id_user = alm.id_user";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);