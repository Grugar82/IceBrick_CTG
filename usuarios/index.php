<?php

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/usuarios/listado-de-usuarios.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">LISTA DE USUARIOS</h1>
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
              <h3 class="card-title">Usuarios registrados</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($datos_usuarios as $datos_usuario) {
                    $id_usuario = $datos_usuario['id']
                      ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1; ?></td>
                      <td><?php echo $datos_usuario['nombre']; ?></td>
                      <td><?php echo $datos_usuario['email']; ?></td>
                      <td><?php echo $datos_usuario['rol']; ?></td>
                      <td>
                        <center>
                          <div class="btn-group">
                            <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-info"><i
                                class="fa fa-eye"></i> Mostrar</a>
                            <a href="update.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-success"><i
                                class="fa fa-pencil-alt"></i> Editar</a>
                            <a href="delete.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger"><i
                                class="fa fa-trash"></i> Borrar</a>
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
        "infoEmpty": "Mostando 0 a 0 de 0 Usuarios",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Usuarios",
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
        text: 'Visor de columnas'
      }
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>