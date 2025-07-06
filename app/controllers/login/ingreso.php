<?php
include('../../config.php');
session_start();

$email = $_POST['email'];
$password_user = $_POST['password_user'];

$sql = "SELECT * FROM tb_usuarios WHERE email = :email";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password_user, $usuario['user_password'])) {
    $_SESSION['sesion_email'] = $usuario['email'];
    header('Location: ' . $URL . '/index.php');
    exit();
} else {
    $_SESSION['mensaje'] = "Error, Datos incorrectos";
    header('Location: ' . $URL . '/login');
    exit();
}
