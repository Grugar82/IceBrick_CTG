<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/usuarios/update_usuario.php');
include('../app/controllers/roles/listado-de-roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar usuario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar datos de usuarios</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " style="display: block;">
                            <div class="col-md-12">
                                <form action="../app/controllers/usuarios/update.php" method="post">
                                    <input type="text" name="id_user" value="<?php echo $id_usuario_get; ?>" hidden>
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="names"
                                            value="<?php echo $nombres ?>"
                                            placeholder="Escriba el nombre del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $email ?>"
                                            placeholder="Escriba el email del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol del usuario</label>
                                        <select name="rol" id="" class="form-control">

                                            <?php
                                            foreach ($datos_roles as $dato_rol) {
                                                $rol_table = $dato_rol['rol_name'];
                                                $id_rol = $dato_rol['id_rol'] ?>
                                                <option value="<?php echo $id_rol; ?>" <?php
                                                   if ($rol_table == $rol) { ?>
                                                        selected="selected" <?php }

                                                   ?>><?php echo $rol_table ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="text" name="user_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Verificar Contraseña</label>
                                        <input type="text" name="repeat_password" class="form-control">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>