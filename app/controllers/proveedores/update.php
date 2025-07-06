<?php
include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];
$nombre_proveedor = $_GET['nombre_proveedor'];
$empresa = $_GET['empresa'];
$telefono = $_GET['telefono'];
$celular = $_GET['celular'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

$sentencia = $pdo->prepare("UPDATE tb_proveedores
    SET 
    nombre_proveedor=:nombre_proveedor,
    celular=:celular,
    telefono=:telefono,
    empresa=:empresa,
    email=:email,
    direccion=:direccion,
    time_update=:time_update 
    WHERE  id_proveedor =:id_proveedor");

$sentencia->bindParam(':nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':empresa', $empresa);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':time_update', $fechaHora);
$sentencia->bindParam(':id_proveedor', $id_proveedor);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el proveedor de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location:' . $URL . '/roles');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar la categoría";
    $_SESSION['icono'] = "error";
    // header('Location:' . $URL . '/roles/update.php');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
}