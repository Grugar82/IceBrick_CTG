<?php

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/compras/listado-de-compras.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTA DE COMRAS</h1>
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">compras registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Nro de la compra</th>
                                            <th>Producto</th>
                                            <th>Fecha de compra</th>
                                            <th>Proveedor de venta</th>
                                            <th>Comprobante</th>
                                            <th>Usuario</th>
                                            <th>Precio de la compra</th>
                                            <th>cantidad</th>
                                            <th>acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function ceros($numero)
                                        {
                                            $cantidad_ceros = 5;
                                            $numero = strval($numero);
                                            $len = strlen($numero);
                                            $ceros = $cantidad_ceros - $len;

                                            for ($i = 0; $i < $ceros; $i++) {
                                                $numero = "0" . $numero;
                                            }
                                            return $numero;
                                        }

                                        $contador = 0;
                                        $contador_de_id_compra = 1;
                                        foreach ($datos_compras as $datos_compra) {
                                            $codigo_compra = "COMP-" . ceros($contador_de_id_compra);
                                            $id_compra = $datos_compra['id_compra'] ?>
                                            <tr>
                                                <td><?php echo $contador = $contador + 1 ?></td>
                                                <td><?php echo $codigo_compra ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#modal-producto<?php echo $id_compra ?>">
                                                        <?php echo $datos_compra['nombre_producto'] ?>
                                                    </button>
                                                    <div class="modal fade" id="modal-producto<?php echo $id_compra ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #0098da; color: #fff">
                                                                    <h4 class="modal-title">Informacion del producto</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label for="">codigo</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['codigo_producto'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['nombre_producto'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Descripcion</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['descripcion'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['stock'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock minimo</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['stock_min'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock maximo</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['stock_max'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Fecha de
                                                                                            Ingreso</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['fecha_ingreso'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio Compra</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['precio_compra_producto'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio venta</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['precio_venta_producto'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Categoria</label>
                                                                                        <input type="text"
                                                                                            value="<?php echo $datos_compra['nombre_categoria'] ?>"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">Imagen</label>
                                                                                <img src="<?php echo $URL . "/almacen/img_productos/" . $datos_compra['imagen'] ?>"
                                                                                    width="100%">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>

                                                </td>
                                                <td><?php echo $datos_compra['time_sell'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#modal-proveedor<?php echo $id_compra ?>">
                                                        <?php echo $datos_compra['proveedor'] ?>
                                                    </button>
                                                    <div class="modal fade" id="modal-proveedor<?php echo $id_compra ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #0098da; color: #fff">
                                                                    <h4 class="modal-title">Informacion del producto</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del proveedor</label>
                                                                                <input type="text"
                                                                                    value="<?php echo $datos_compra['proveedor'] ?>"
                                                                                    class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular del proveedor</label>
                                                                                <a href="https://wa.me/57<?php echo $datos_compra['cel_proveedor'] ?>"
                                                                                    target="_blank"
                                                                                    class="btn btn-success"><i
                                                                                        class="nav-icon fa fa-phone"></i>
                                                                                    Celular</a>
                                                                                <!-- <input type="text"
                                                                                    value="<?php echo $datos_compra['cel_proveedor'] ?>"
                                                                                    class="form-control" disabled> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa Proveedora</label>
                                                                                <input type="text"
                                                                                    value="<?php echo $datos_compra['empresa'] ?>"
                                                                                    class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Telefono del
                                                                                    proveedor</label>
                                                                                <input type="text"
                                                                                    value="<?php echo $datos_compra['tel_proveedor'] ?>"
                                                                                    class="form-control" disabled>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">email</label>
                                                                                <input type="text"
                                                                                    value="<?php echo $datos_compra['email_proveedor'] ?>"
                                                                                    class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Direccion</label>
                                                                                <input type="text"
                                                                                    value="<?php echo $datos_compra['direccion'] ?>"
                                                                                    class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>

                                                </td>
                                                <td><?php echo $datos_compra['comprobante'] ?></td>
                                                <td><?php echo $datos_compra['nombre_usuario'] ?></td>
                                                <td><?php echo $datos_compra['precio_compra'] ?></td>
                                                <td><?php echo $datos_compra['cantidad'] ?></td>


                                                <td>
                                                    <center>
                                                        <div class="btn-group">
                                                            <a href="show.php?id=<?php echo $id_producto; ?>" type="button"
                                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                                                                Mostrar</a>
                                                            <a href="update.php?id=<?php echo $id_producto; ?>"
                                                                type="button" class="btn btn-success btn-sm"><i
                                                                    class="fa fa-pencil-alt"></i>
                                                                Editar</a>
                                                            <a href="delete.php?id=<?php echo $id_producto; ?>"
                                                                type="button" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash"></i>
                                                                Borrar</a>
                                                        </div>
                                                    </center>
                                                </td>
                                            </tr>

                                            <?php
                                            $contador_de_id_compra++;
                                        }
                                        ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include('../layout/parte2.php'); ?>
<?php include('../layout/mensaje.php'); ?>
<script src="../public/js"></script>


<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ compras",
                "infoEmpty": "Mostando 0 a 0 de 0 compras",
                "infoFiltered": "(filtrado de _MAX_ compras en total)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ compras",
                "loadingRecords": "Cargando...",
                "processing": "Procensando...",
                "search": "Buscador:",
                "zeroRecords": "sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy'
                }, {
                    extend: 'pdf',
                }, {
                    extend: 'csv',
                }, {
                    extend: 'excel',
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
            {
                extend: 'colvis',
                text: 'Visol de columnas'
            }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>