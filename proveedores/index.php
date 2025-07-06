<?php

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/proveedores/listado-de-proveedores.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LISTA DE PROVEEDORES
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i>Agregar Nuevo
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
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">proveedores registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombre de proveedor</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Empresa</th>
                                        <th>Email</th>
                                        <th>Direccion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($datos_proveedores as $datos_proveedor) {
                                        $id_proveedor = $datos_proveedor['id_proveedor'];
                                        $nombre_proveedor = $datos_proveedor['nombre_proveedor']; ?>
                                        <tr>
                                            <td><?php echo $contador = $contador + 1; ?></td>
                                            <td><?php echo $datos_proveedor['nombre_proveedor']; ?></td>
                                            <td><?php echo $datos_proveedor['celular']; ?></td>
                                            <td><?php echo $datos_proveedor['telefono']; ?></td>
                                            <td><?php echo $datos_proveedor['empresa']; ?></td>
                                            <td><?php echo $datos_proveedor['email']; ?></td>
                                            <td><?php echo $datos_proveedor['direccion']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#modal-update<?php echo $id_proveedor ?>">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!--update category modal -->
                                                    <div class="modal fade" id="modal-update<?php echo $id_proveedor ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #2a4; color: #fff">
                                                                    <h4 class="modal-title">Actualizar proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <fieldset>
                                                                        <legend>Informacion</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre del
                                                                                        proveedor</label>
                                                                                    <input type="text"
                                                                                        id="nombre_proveedor<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $nombre_proveedor ?>">
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_nombre_proveedor<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Empresa</label>
                                                                                    <input type="text"
                                                                                        id="empresa<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['empresa']; ?>">
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_empresa<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset>
                                                                        <legend>Informacion de contacto</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Telefono</label>
                                                                                    <input type="number"
                                                                                        id="telefono<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['telefono']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Celular</label>
                                                                                    <input type="number"
                                                                                        id="celular<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['celular']; ?>">
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_celular<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Email</label>
                                                                                    <input type="email"
                                                                                        id="email<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['email']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Direccion</label>
                                                                                    <textarea
                                                                                        id="direccion<?php echo $id_proveedor ?>"
                                                                                        cols="30" rows="3"
                                                                                        class="form-control"><?php echo $datos_proveedor['direccion']; ?></textarea>
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_direccion<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="button" class="btn btn-success"
                                                                        id="btn-update<?php echo $id_proveedor ?>">Actualizar
                                                                        proveedor</button>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                    <script>
                                                        $('#btn-update<?php echo $id_proveedor ?>').click(function () {
                                                            let id_proveedor = '<?php echo $id_proveedor ?>';
                                                            let nombre_proveedor = $('#nombre_proveedor<?php echo $id_proveedor ?>').val();
                                                            let empresa = $('#empresa<?php echo $id_proveedor ?>').val();
                                                            let telefono = $('#telefono<?php echo $id_proveedor ?>').val();
                                                            let celular = $('#celular<?php echo $id_proveedor ?>').val();
                                                            let email = $('#email<?php echo $id_proveedor ?>').val();
                                                            let direccion = $('#direccion<?php echo $id_proveedor ?>').val();

                                                            if (nombre_proveedor === "") {
                                                                $('#nombre_proveedor<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_nombre_proveedor<?php echo $id_proveedor ?>').css('display', 'block')
                                                            } else if (empresa === "") {
                                                                $('#empresa<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_empresa<?php echo $id_proveedor ?>').css('display', 'block')

                                                            } else if (celular === "") {
                                                                $('#celular<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_celular<?php echo $id_proveedor ?>').css('display', 'block')

                                                            } else if (direccion === "") {
                                                                $('#direccion<?php echo $id_proveedor ?>').focus();
                                                                $('#lbl_direccion<?php echo $id_proveedor ?>').css('display', 'block')

                                                            } else {
                                                                let url = "../app/controllers/proveedores/update.php";
                                                                $.get(url, { id_proveedor: id_proveedor, nombre_proveedor: nombre_proveedor, empresa: empresa, telefono: telefono, celular: celular, email: email, direccion: direccion }, function (datos) {
                                                                    $('#respuesta').html(datos);
                                                                });
                                                            }

                                                        })
                                                    </script>
                                                    <div id="respuesta_update<?php echo $id_proveedor ?>"></div>

                                                </div>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal-delete<?php echo $id_proveedor ?>">
                                                        <i class="fa fa-trash-alt"></i> Borrar
                                                    </button>
                                                    <!--delete proveedores modal -->
                                                    <div class="modal fade" id="modal-delete<?php echo $id_proveedor ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background: #da0000; color: #fff">
                                                                    <h4 class="modal-title">Eliminar proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <fieldset>
                                                                        <legend>Informacion</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre del
                                                                                        proveedor</label>
                                                                                    <input type="text"
                                                                                        id="nombre_proveedor<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $nombre_proveedor ?>"
                                                                                        disabled>
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_nombre_proveedor<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Empresa</label>
                                                                                    <input type="text"
                                                                                        id="empresa<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['empresa']; ?>"
                                                                                        disabled>
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_empresa<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset>
                                                                        <legend>Informacion de contacto</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Telefono</label>
                                                                                    <input type="number"
                                                                                        id="telefono<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['telefono']; ?>"
                                                                                        disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Celular</label>
                                                                                    <input type="number"
                                                                                        id="celular<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['celular']; ?>"
                                                                                        disabled>
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_celular<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Email</label>
                                                                                    <input type="email"
                                                                                        id="email<?php echo $id_proveedor ?>"
                                                                                        class="form-control"
                                                                                        value="<?php echo $datos_proveedor['email']; ?>"
                                                                                        disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Direccion</label>
                                                                                    <textarea
                                                                                        id="direccion<?php echo $id_proveedor ?>"
                                                                                        cols="30" rows="3"
                                                                                        class="form-control"
                                                                                        disabled><?php echo $datos_proveedor['direccion']; ?></textarea>
                                                                                    <small style="color: red; display: none"
                                                                                        id="lbl_direccion<?php echo $id_proveedor ?>">*Este
                                                                                        campo es
                                                                                        requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        id="btn-delete<?php echo $id_proveedor ?>">Eliminar
                                                                        proveedor</button>
                                                                </div>
                                                                <div id="respuesta_delete<?php echo $id_proveedor ?>"></div>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                    <script>
                                                        $('#btn-delete<?php echo $id_proveedor ?>').click(function () {
                                                            let id_proveedor = '<?php echo $id_proveedor ?>';
                                                            let url2 = "../app/controllers/proveedores/delete.php";
                                                            $.get(url2, { id_proveedor: id_proveedor }, function (datos) {
                                                                $('#respuesta_delete<?php echo $id_proveedor ?>').html(datos);
                                                            });
                                                        });
                                                    </script>

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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ proveedores",
                "infoEmpty": "Mostando 0 a 0 de 0 proveedores",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ proveedors",
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #48e; color: #fff">
                <h4 class="modal-title">Creacion de nuevo proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset>
                    <legend>Informacion</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre del proveedor</label>
                                <input type="text" id="nombre_proveedor" class="form-control">
                                <small style="color: red; display: none" id="lbl_nombre_proveedor">*Este campo es
                                    requerido</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Empresa</label>
                                <input type="text" id="empresa" class="form-control">
                                <small style="color: red; display: none" id="lbl_empresa">*Este campo es
                                    requerido</small>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informacion de contacto</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="number" id="telefono" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="number" id="celular" class="form-control">
                                <small style="color: red; display: none" id="lbl_celular">*Este campo es
                                    requerido</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <textarea id="direccion" cols="30" rows="3" class="form-control"></textarea>
                                <small style="color: red; display: none" id="lbl_direccion">*Este campo es
                                    requerido</small>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-create">Guardar proveedor</button>
            </div>
            <div id="respuesta"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  JQUERY  -->
<script>
    $('#btn-create').click(function () {
        // alert("guardar")
        let nombre_proveedor = $('#nombre_proveedor').val();
        let empresa = $('#empresa').val();
        let telefono = $('#telefono').val();
        let celular = $('#celular').val();
        let email = $('#email').val();
        let direccion = $('#direccion ').val();

        if (nombre_proveedor === "") {
            $('#nombre_proveedor').focus();
            $('#lbl_nombre_proveedor').css('display', 'block')
        } else if (empresa === "") {
            $('#empresa').focus();
            $('#lbl_empresa').css('display', 'block')

        } else if (celular === "") {
            $('#celular').focus();
            $('#lbl_celular').css('display', 'block')

        } else if (direccion === "") {
            $('#direccion').focus();
            $('#lbl_direccion').css('display', 'block')

        } else {
            let url = "../app/controllers/proveedores/create.php";
            $.get(url, { nombre_proveedor: nombre_proveedor, empresa: empresa, telefono: telefono, celular: celular, email: email, direccion: direccion }, function (datos) {
                $('#respuesta').html(datos);
            });
        }


    });
</script>

<div id="respuesta"></div>