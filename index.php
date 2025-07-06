<?php
include('app/config.php');
include('layout/sesion.php');

include('layout/parte1.php');
include('app/controllers/usuarios/listado-de-usuarios.php');
include('app/controllers/roles/listado-de-roles.php');
include('app/controllers/categorias/listado-de-categorias.php');
include('app/controllers/almacen/listado-de-productos.php');
include('app/controllers/proveedores/listado-de-proveedores.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido al sistema de ventas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_de_usuarios = 0;
                            foreach ($datos_usuarios as $usuario_dato) {
                                $contador_de_usuarios = $contador_de_usuarios + 1;

                            }
                            ?>
                            <h3><?php echo $contador_de_usuarios ?></h3>

                            <p>Usuarios Registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/usuarios" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_de_roles = 0;
                            foreach ($datos_roles as $dato_rol) {
                                $contador_de_roles = $contador_de_roles + 1;

                            }
                            ?>
                            <h3><?php echo $contador_de_roles ?></h3>

                            <p>Roles Registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/roles/create.php">
                            <div class="icon">
                                <i class="nav-icon fas fa-address-book"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/roles" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_de_categoria = 0;
                            foreach ($datos_categorias as $datos_categoria) {
                                $contador_de_categoria = $contador_de_categoria + 1;

                            }
                            ?>
                            <h3><?php echo $contador_de_categoria ?></h3>

                            <p>Categorias Registradas</p>
                        </div>
                        <a href="<?php echo $URL ?>/categorias/index.php">
                            <div class="icon">
                                <i class="nav-icon fas fa-layer-group"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/categorias" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_de_producto = 0;
                            foreach ($datos_productos as $datos_producto) {
                                $contador_de_producto++;

                            }
                            ?>
                            <h3><?php echo $contador_de_producto ?></h3>

                            <p>Productos Registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/almacen" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $contador_de_proveedor = 0;
                            foreach ($datos_proveedores as $datos_proveedor) {
                                $contador_de_proveedor++;

                            }
                            ?>
                            <h3><?php echo $contador_de_proveedor ?></h3>

                            <p>Proveedores Registrados</p>
                        </div>
                        <a href="<?php echo $URL ?>/proveedores">
                            <div class="icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL ?>/proveedores" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('layout/parte2.php');
?>