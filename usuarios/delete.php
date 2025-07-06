<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php'); 
include('../app/controllers/usuarios/show_usuario.php')

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminar usuario</h1>
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
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Deseas eliminar el usuario?</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " style="display: block;">
                            <div class="col-md-12">
                                <form action="../app/controllers/usuarios/delete_users.php" method="post">
                                    <input type="text" name="id_user" value="<?php echo $id_usuario_get;?>" hidden>
                                    <div class="form-group" >
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="names" value="<?php echo $nombres?>" placeholder="Escriba el nombre del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email?>" placeholder="Escriba el email del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol de usuario</label>
                                        <input type="text" class="form-control" name="rol" value="<?php echo $rol?>" placeholder="Escriba el email del nuevo usuario..." required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">volver</a>
                                        <button  class="btn btn-danger">Eliminar</button>
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