<?php

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/categorias/listado-de-categorias.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LISTA DE CATEGORIAS
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i>Agregar Nueva
                        </button>
                    </h1>

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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorias registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombre de la categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($datos_categorias as $datos_categoria) {
                                        $id_category = $datos_categoria['id_category'];
                                        $name_category = $datos_categoria['name_category']; ?>
                                        <tr>
                                            <td><?php echo $contador = $contador + 1; ?></td>
                                            <td><?php echo $datos_categoria['name_category']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#modal-update<?php echo $id_category ?>">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!--update category modal -->
                                                    <div class="modal fade" id="modal-update<?php echo $id_category ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #2a4; color: #fff">
                                                                    <h4 class="modal-title">Actualizar categoría</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre de la categoria</label>
                                                                                <input type="text"
                                                                                    id="name_category<?php echo $id_category ?>"
                                                                                    value="<?php echo $name_category ?>"
                                                                                    class="form-control">
                                                                                <small style="color: red; display: none"
                                                                                    id="label_update<?php echo $id_category ?>">*Este
                                                                                    campo es
                                                                                    requerido</small>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="button" class="btn btn-success"
                                                                        id="btn-update<?php echo $id_category ?>">Actualizar
                                                                        categoria</button>

                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                            </td>
                                            <!-- <div class="btn-group"> -->
                                            <script>
                                                $('#btn-update<?php echo $id_category ?>').click(function () {
                                                    let name_category = $('#name_category<?php echo $id_category ?>').val();
                                                    let id_category = '<?php echo $id_category ?>';
                                                    if (name_category === "") {
                                                        $('#name_category<?php echo $id_category; ?>').focus();
                                                        $('#label_update<?php echo $id_category; ?>').css('display', 'block');
                                                    } else {
                                                        let url = "../app/controllers/categorias/update-de-categorias.php";
                                                        $.get(url, { name_category: name_category, id_category: id_category }, function (datos) {
                                                            $('#respuesta_update<?php echo $id_category ?>').html(datos);
                                                        });
                                                    }
                                                })
                                            </script>
                                            <div id="respuesta_update<?php echo $id_category ?>"></div>
                                            </center>
                            </div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ categorias",
                "infoEmpty": "Mostando 0 a 0 de 0 categorias",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ categorias",
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
                text: 'visor de columnas'
            }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


<!--register category modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #48e; color: #fff">
                <h4 class="modal-title">Creacion de nueva categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoria</label>
                            <input type="text" id="name_category" class="form-control">
                            <small style="color: red; display: none" id="label_create">*Este campo es requerido</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-create">Guardar categoria</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  JQUERY  -->
<script>
    $('#btn-create').click(function () {
        // alert("guardar")
        let name_category = $('#name_category').val();

        if (name_category === "") {
            $('#name_category').focus();
            $('#label_create').css('display', 'block')
        } else {
            let url = "../app/controllers/categorias/registro-de-categorias.php";
            $.get(url, { name_category: name_category }, function (datos) {
                $('#respuesta').html(datos);
            });
        }


    });
</script>

<div id="respuesta"></div>