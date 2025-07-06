<?php
include('../../config.php');

$rol_name = $_POST['rol_name'];
    $sentencia = $pdo->prepare("INSERT INTO tb_roles
    (rol_name, time_creation)
VALUES(:rol_name, :time_creation)");

    $sentencia->bindParam(':rol_name', $rol_name);
    $sentencia->bindParam(':time_creation', $fechaHora);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registró a el rol de la manera correcta";
        $_SESSION['icono'] = "success";
        header('Location:'.$URL.'/roles');
    }else {
        session_start();
        $_SESSION['mensaje'] = "Perdon, ya existe ese rol";
        $_SESSION['icono'] = "error";
        header('Location:'.$URL.'/roles/create.php');
    }