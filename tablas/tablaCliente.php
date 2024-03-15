<?php

include "../modelo/Cliente.php";
$Opciones = new Cliente();
$resultado = $Opciones->listarCliente();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../template/dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>Eventos VillaVieja</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EVENTOS VILLAVIEJA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="tablaEventos.php">Tabla Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">Tabla Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../form/NuevoEvento.php">Nuevo Evento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../form/NuevoCliente.php">Nuevo Clientes</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a style="color: black;" href="../salir.php" class="btn btn-info"><i class="glyphicon glyphicon-close"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="" style="padding: 20px 50px 0px 50px;">
        <div class="">
            <div style="padding-bottom: 10px;">
                <a href="../form/NuevoEvento.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Nuevo Evento</a>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Nombre del Cliente</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont = 0;
                    while ($fila = mysqli_fetch_assoc($resultado)) : $cont++; ?>
                        <tr>
                            <td><?php echo $cont; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td>
                                <p>
                                    <?php if ($fila["estado"] == 0) { ?>
                                        <span class="label label-danger">InActivo</span>
                                    <?php } else { ?>
                                        <span class="label label-success">Activo</span>
                                    <?php } ?>
                                </p>
                            </td>
                            <td>
                                <a class='btn btn-linkedin' href="../form/EditarCliente.php?id=<?php echo $fila['id']; ?>">editar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nº</th>
                        <th>Nombre del Cliente</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>...</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</body>
<!-- jQuery 3 -->
<script src="../template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../template/dist/js/demo.js"></script>
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>




</html>