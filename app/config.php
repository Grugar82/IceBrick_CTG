<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'gestiondeventascurso');

$servidor = "mysql:host=" . SERVIDOR . ";dbname=" . BD;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "La conexion a la base de datos es exitosa";
} catch (PDOException $e) {
    // print_r($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost/sistemaDeVentasCurso";

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');

if(isset($_SESSION['mensaje'])){
    $respuesta = $_SESSION['mensaje'];?>
    <script>
        Swal.fire({
  position: "top-end",
  icon: "error",
  title: "<?php echo $respuesta;?>",
  showConfirmButton: false,
  timer: 1500
});
    </script>
    <?php
    unset($_SESSION['mensaje']);
}
