<?php
include('../../config.php');

$nombres = $_POST['names'];
$email = $_POST['email'];
$user_password = $_POST['user_password'];
$repeat_password = $_POST['repeat_password'];
$id_user = $_POST['id_user'];
$rol = $_POST['rol'];

if($user_password == ""){
    if ($user_password == $repeat_password) {
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare("UPDATE tb_usuarios 
    SET names =:names,
    email=:email,
    id_rol=:id_rol,
    time_update=:time_update 
    WHERE id_user = :id_user");

    $sentencia->bindParam(':names', $nombres);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':time_update', $fechaHora);
    $sentencia->bindParam(':id_rol', $rol);
    $sentencia->bindParam(':id_user', $id_user);
    $sentencia->execute();

    session_start();
    
    $_SESSION['mensaje'] = "Se actualizó a el usuario de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL.'/usuarios');
} else {
    // echo "error las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "error las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header('Location:'.$URL.'/usuarios/update.php?id='.$id_user);
}
}else{
    if ($user_password == $repeat_password) {
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare("UPDATE tb_usuarios 
    SET names =:names,
    email=:email,
    user_password=:user_password,
    id_rol=:id_rol,
    time_update=:time_update 
    WHERE id_user = :id_user");

    $sentencia->bindParam(':names', $nombres);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':user_password', $user_password);
    $sentencia->bindParam(':time_update', $fechaHora);
    $sentencia->bindParam(':id_rol', $rol);
    $sentencia->bindParam(':id_user', $id_user);

    $sentencia->execute();

    session_start();
    
    $_SESSION['mensaje'] = "Se actualizó a el usuario de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL.'/usuarios');
} else {
    // echo "error las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "error las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header('Location:'.$URL.'/usuarios/update.php?id='.$id_user);
}
}

