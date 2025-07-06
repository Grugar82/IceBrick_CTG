<?php
$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT usuario.id_user as id,
                        usuario.names as nombre, 
                        usuario.email as email, rol.rol_name as rol 
                FROM tb_usuarios as usuario 
                INNER JOIN tb_roles as rol 
                ON usuario.id_rol = rol.id_rol WHERE id_user = '$id_usuario_get'";
$query_usuarios =  $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_usuarios as $usuario_dato){
    $nombres = $usuario_dato['nombre'];
    $email = $usuario_dato['email'];
    $rol = $usuario_dato['rol'];
}
?>