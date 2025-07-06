<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php'); 
include('../app/controllers/roles/listado-de-roles.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registrar nuevo usuario</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registrar usuarios</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " style="display: block;">
                            <div class="col-md-12">
                                <form action="../app/controllers/usuarios/create.php" method="post">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="names" placeholder="Escriba el nombre del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Escriba el email del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol del Usuario</label>
                                        <select name="rol" id="" class="form-control">
                                        
                                        <?php
                                                foreach($datos_roles as $dato_rol){?> 
                                                <option value="<?php echo $dato_rol['id_rol'];?>" ><?php echo $dato_rol['rol_name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                        
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="text" name="user_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Verificar Contraseña</label>
                                        <input type="text" name="repeat_password" class="form-control" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-danger">Calcelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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
?>