<?php
$sql_compras = "SELECT *, 
                        pro.nombre_proveedor as proveedor,
                        pro.celular as cel_proveedor,
                        pro.telefono as tel_proveedor,
                        pro.empresa as empresa,
                        pro.email as email_proveedor,
                        pro.direccion as dir_proveedor,
                        


                        alm.codigo as codigo_producto,
                        alm.nombre as nombre_producto,
                        alm.descripcion as descripcion,
                        alm.stock as stock,
                        alm.stock_minimo as stock_min,
                        alm.stock_maximo as stock_max,
                        alm.precio_compra as precio_compra_producto,
                        alm.precio_venta as precio_venta_producto,
                        alm.fecha_ingreso as fecha_ingreso,
                        alm.imagen as imagen,

                        category.name_category as nombre_categoria,

                        u.names as nombre_usuario
                FROM tb_compras as compras
                INNER JOIN tb_almacen as alm
                ON compras.id_producto = alm.id_producto
                INNER JOIN tb_usuarios as u
                ON u.id_user = compras.id_user 
                INNER JOIN tb_proveedores as pro
                ON pro.id_proveedor = compras.id_proveedor
                INNER JOIN tb_categoria as category
                ON category.id_category = alm.id_category
                ";

$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);
?>