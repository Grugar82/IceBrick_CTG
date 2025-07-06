<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/categorias/listado-de-categorias.php');
include('../app/controllers/almacen/cargar_producto.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar producto: <?php echo $name_producto ?></h1>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar producto</h3>

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
                                <form action="../app/controllers/almacen/update.php" method="post"
                                    enctype="multipart/form-data">
                                    <input type="text" value="<?php echo $id_producto_get ?>" name="id_producto" hidden>
                                    <div class="row">
                                        <div class="col-md-9">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Codigo:</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo $code ?>" disabled>
                                                        <input type="text" name="codigo" value="<?php echo $code ?>"
                                                            hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Categoria del producto:</label>
                                                        <div class="container-almacen-create-agg">
                                                            <select name="id_category" id="" class="form-control"
                                                                required>
                                                                <?php
                                                                foreach ($datos_categorias as $datos_categoria) {
                                                                    $nombre_categoria_tabla = $datos_categoria['name_category'];
                                                                    $id_category = $datos_categoria['id_category'] ?>
                                                                    <option
                                                                        value="<?php echo $datos_categoria['id_category']; ?>"
                                                                        <?php if ($nombre_categoria_tabla == $name_category) { ?> selected="selected" <?php } ?>>
                                                                        <?php echo $nombre_categoria_tabla ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre del producto:</label>
                                                        <input value="<?php echo $name_producto ?>" name="name_producto"
                                                            type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario:</label>
                                                        <input value="<?php echo $email ?>" type="text"
                                                            class="form-control" disabled>
                                                        <input name="id_user" type="text" value="<?php echo $id_user ?>"
                                                            hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Descripcion del producto:</label>
                                                        <textarea name="descripcion" id="" rows="2" cols="30"
                                                            class="form-control"><?php echo $descripcion ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">stock:</label>
                                                        <input name="stock" value="<?php echo $stock ?>" type="number"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock minimo:</label>
                                                        <input name="stock_min" value="<?= $stock_min ?>" type="number"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock maximo:</label>
                                                        <input name="stock_max" value="<?php echo $stock_max ?>"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio de compra:</label>
                                                        <input name="precio_compra" value="<?= $precio_compra ?>"
                                                            type="number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio de venta:</label>
                                                        <input name="precio_venta" value="<?= $precio_venta ?>"
                                                            type="number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Fecha de ingreso:</label>
                                                        <input name="fecha_enter" value="<?= $fecha_enter ?>"
                                                            type="date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen del producto:</label>
                                                <input name="img" type="file" class="form-control" id="file">
                                                <input type="text" name="image_text" value="<?php echo $imagen ?>"
                                                    hidden>
                                                <br>
                                                <output id="list" style="border-radius: .25rem;">
                                                    <img src="<?= $URL . '/almacen/img_productos/' . $imagen; ?>"
                                                        width="100%" alt="">
                                                </output>
                                                <script>
                                                    function archivo(evt) {
                                                        var files = evt.target.files; // FileList object
                                                        // Obtenemos la imagen del campo "file".
                                                        for (var i = 0, f; f = files[i]; i++) {
                                                            //Solo admitimos imágenes.
                                                            if (!f.type.match('image.*')) {
                                                                continue;
                                                            }
                                                            var reader = new FileReader();
                                                            reader.onload = (function (theFile) {
                                                                return function (e) {
                                                                    // Insertamos la imagen
                                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail image_producto_registro" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                };
                                                            })(f);
                                                            reader.readAsDataURL(f);
                                                        }
                                                    }
                                                    document.getElementById('file').addEventListener('change', archivo, false);
                                                </script>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-danger">Calcelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
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
include('../layout/mensaje.php');
?>