<?php
include('../../config.php');

$nombre_proveedor = $_GET['nombre_proveedor'];
$empresa = $_GET['empresa'];
$telefono = $_GET['telefono'];
$celular = $_GET['celular'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

$sentencia = $pdo->prepare("INSERT INTO tb_proveedores
    (nombre_proveedor,celular,telefono,empresa,email,direccion, time_creation)
VALUES(:nombre_proveedor,:celular,:telefono,:empresa,:email,:direccion, :time_creation)");

$sentencia->bindParam(':nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':empresa', $empresa);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':time_creation', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró el proveedor de la manera correcta";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se ha podido registrar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/proveedores');
}
?>