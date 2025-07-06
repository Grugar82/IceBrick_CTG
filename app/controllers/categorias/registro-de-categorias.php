<?php
include('../../config.php');

$name_category = $_GET['name_category'];

$sentencia = $pdo->prepare("INSERT INTO tb_categoria
    (name_category, time_creation)
VALUES(:name_category, :time_creation)");

$sentencia->bindParam(':name_category', $name_category);
$sentencia->bindParam(':time_creation', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró la categoría de la manera correcta";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se ha podido registrar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/categorias');
}
?>