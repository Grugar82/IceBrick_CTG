<?php
$id_rol_get = $_GET['id'];

$sql_rol = "SELECT * FROM tb_roles WHERE id_rol = '$id_rol_get'";
$query_rol =  $pdo->prepare($sql_rol);
$query_rol->execute();
$datos_rol = $query_rol->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_rol as $rol_dato){
    $id_rol = $rol_dato['rol_name'];
}
?>