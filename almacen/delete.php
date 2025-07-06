<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/almacen/cargar_producto.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Datos del producto: <?php echo $name_producto ?> a eliminar</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Eliminar Producto</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " style="display: block;">
                            <div class="row">
                            <div class="col-md-12">
                                    <form action="../app/controllers/almacen/delete.php" method="post">
                                        <input type="text" name="id_producto" value="<?php echo $id_producto_get ?>" hidden>
                                        <div class="row">
                                        <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Codigo:</label>
                                                    <input type="text" class="form-control" value="<?php echo $code; ?>"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Categoria del producto:</label>
                                                    <div class="container-almacen-create-agg">
                                                        <input type="text" class="form-control"
                                                            value="<?php echo $name_category ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Nombre del producto:</label>
                                                    <input name="name_producto" value="<?php echo $name_producto ?>"
                                                        type="text" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Usuario</label>
                                                    <input type="text" class="form-control" value="<?php echo $email ?>"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Descripcion del producto:</label>
                                                    <textarea name="descripcion" id="" rows="2" cols="30"
                                                        class="form-control"
                                                        disabled><?php echo $descripcion ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">stock:</label>
                                                    <input value="<?php echo $stock ?>" name="stock" type="number"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Stock minimo:</label>
                                                    <input value="<?php echo $stock_min ?>" name="stock_min"
                                                        type="number" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Stock maximo:</label>
                                                    <input value="<?php echo $stock_max ?>" name="stock_max"
                                                        type="number" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Precio de compra:</label>
                                                    <input value="<?php echo $precio_compra ?>" name="precio_compra"
                                                        type="number" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Precio de venta:</label>
                                                    <input value="<?php echo $precio_venta ?>" name="precio_venta"
                                                        type="number" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha de ingreso:</label>
                                                    <input value="<?php echo $fecha_enter ?>" name="fecha_enter"
                                                        type="date" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Imagen del producto:</label>
                                            <center>
                                                <img src="<?php echo $URL . '/almacen/img_productos/' . $imagen ?>"
                                                    width="100%" alt="">
                                            </center>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-secondary">Atrás</a>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Borrar Producto</button>
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
</div>


<?php
include('../layout/parte2.php');
include('../layout/mensaje.php');
?>