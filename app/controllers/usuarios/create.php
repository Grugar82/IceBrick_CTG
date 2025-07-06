<?php
include('../../config.php');

$nombres = $_POST['names'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$user_password = $_POST['user_password'];
$repeat_password = $_POST['repeat_password'];

if ($user_password == $repeat_password) {
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
    ( names, email, id_rol, user_password, time_creation)
VALUES(:names, :email, :id_rol, :user_password, :time_creation)");

    $sentencia->bindParam(':names', $nombres);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':id_rol', $rol);
    $sentencia->bindParam(':user_password', $user_password);
    $sentencia->bindParam(':time_creation', $fechaHora);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = "Se registró a el usuario de la manera correcta";
    header('Location:'.$URL.'/usuarios');
} else {
    // echo "error las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "error las contraseñas no coinciden";
    header('Location:'.$URL.'/usuarios/create.php');
}
