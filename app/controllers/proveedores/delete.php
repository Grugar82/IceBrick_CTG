<?php
include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];


$sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor = :id_proveedor");

$sentencia->bindParam(':id_proveedor', $id_proveedor);


if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se eliminó a el proveedor de la manera correcta";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar el proveedor";
    $_SESSION['icono'] = "error";
    // header('Location:' . $URL . '/roles/update.php');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
}