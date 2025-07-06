<?php

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/almacen/listado-de-productos.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTA DE PRODUCTOS</h1>
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
                            <h3 class="card-title">Productos registrados</h3>

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
                                            <th>Codigo</th>
                                            <th>imagen</th>
                                            <th>Categoria</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>stock</th>
                                            <th>Precio de compra</th>
                                            <th>Precio de venta</th>
                                            <th>fecha de ingreso</th>
                                            <th>Nombre usuario</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($datos_productos as $datos_producto) {
                                            $id_producto = $datos_producto['id_producto'] ?>
                                            <tr>
                                                <td><?php echo $contador = $contador + 1 ?></td>
                                                <td><?php echo $datos_producto['codigo'] ?></td>
                                                <td>
                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $datos_producto['imagen'] ?>"
                                                        width="70px">
                                                </td>
                                                <td><?php echo $datos_producto['categoria'] ?></td>
                                                <td><?php echo $datos_producto['nombre'] ?></td>
                                                <td><?php echo $datos_producto['descripcion'] ?></td>
                                                <td><?php echo $datos_producto['stock'] ?></td>

                                                <td><?php echo $datos_producto['precio_compra'] ?></td>
                                                <td><?php echo $datos_producto['precio_venta'] ?></td>
                                                <td><?php echo $datos_producto['fecha_ingreso'] ?></td>
                                                <td><?php echo $datos_producto['usuario_nombre'] ?></td>
                                                <td><?php echo $datos_producto['email'] ?></td>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
                "infoEmpty": "Mostando 0 a 0 de 0 productos",
                "infoFiltered": "(filtrado de _MAX_ productos en total)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ productos",
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