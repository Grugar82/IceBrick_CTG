<?php
include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol_name = $_POST['rol_name'];

    $sentencia = $pdo->prepare("UPDATE tb_roles 
    SET rol_name =:rol_name,
    time_update=:time_update 
    WHERE id_rol = :id_rol");

$sentencia->bindParam(':rol_name', $rol_name);
$sentencia->bindParam(':time_update', $fechaHora);
$sentencia->bindParam(':id_rol', $id_rol);

    if($sentencia->execute()){
        session_start();
    $_SESSION['mensaje'] = "Se actualizó a el rol de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL.'/roles');
    }else{
        session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar el rol";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL.'/roles/update.php');
    }


