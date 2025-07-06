<?php



$sql_usuarios = "SELECT usuario.id_user as id,
                        usuario.names as nombre, 
                        usuario.email as email, rol.rol_name as rol 
                FROM tb_usuarios as usuario 
                INNER JOIN tb_roles as rol 
                ON usuario.id_rol = rol.id_rol;";
$query_usuarios =  $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
