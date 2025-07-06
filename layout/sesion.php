<?php

session_start();
if (isset($_SESSION['sesion_email'])) {
    // echo "si existe sesion de " . $_SESSION['sesion_email'];
    $email__sesion = $_SESSION['sesion_email'];
    $sql = "SELECT usuario.id_user as id_user,
                        usuario.names as nombre, 
                        usuario.email as email, rol.rol_name as rol 
                FROM tb_usuarios as usuario 
                INNER JOIN tb_roles as rol 
                ON usuario.id_rol = rol.id_rol WHERE email = '$email__sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario["id_user"];
        $nombres_sesion = $usuario['nombre'];
        $rol_sesion = $usuario['rol'];
    }
} else {
    echo "no existe sesion";
    header('Location: ' . $URL . '/login');
}
