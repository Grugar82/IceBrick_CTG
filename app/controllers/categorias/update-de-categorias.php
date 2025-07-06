<?php
include('../../config.php');

$name_category = $_GET['name_category'];
$id_category = $_GET['id_category'];

$sentencia = $pdo->prepare("UPDATE tb_categoria 
    SET  name_category =:name_category,
    time_update=:time_update 
    WHERE  id_category =:id_category");

$sentencia->bindParam(':name_category', $name_category);
$sentencia->bindParam(':time_update', $fechaHora);
$sentencia->bindParam(':id_category', $id_category);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la categoria de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location:' . $URL . '/roles');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar la categoría";
    $_SESSION['icono'] = "error";
    // header('Location:' . $URL . '/roles/update.php');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
}