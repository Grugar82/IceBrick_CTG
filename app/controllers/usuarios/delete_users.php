<?php
include('../../config.php');

$id_user = $_POST['id_user'];


    $sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_user = :id_user");

    $sentencia->bindParam(':id_user', $id_user);
    $sentencia->execute();

    session_start();
    
    $_SESSION['mensaje'] = "Se eliminó a el usuario de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL.'/usuarios');