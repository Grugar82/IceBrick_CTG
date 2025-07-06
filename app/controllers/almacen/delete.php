<?php
include('../../config.php');

$id_producto = $_POST['id_producto'];


$sentencia = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto = :id_producto");

$sentencia->bindParam(':id_producto', $id_producto);


if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se eliminó el producto de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar el producto";
    $_SESSION['icono'] = "error";
    // header('Location:' . $URL . '/roles/update.php');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/almacen/delete.php?=id".$id_producto;
    </script>
    <?php
}