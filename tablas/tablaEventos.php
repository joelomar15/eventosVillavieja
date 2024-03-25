<?php

include "../modelo/Evento.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../login.php');
}
$Opciones = new Evento();
$resultado = $Opciones->listarEvento();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Opciones->generarPDF();
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VILLAVIEJA | Eventos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../template/dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->


<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="../principal.php" class="navbar-brand"><b>VILLAVIEJA</b>Eventos</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a style="background-color:#385B6F ;" href="#">Tabla Eventos<span class="sr-only">(current)</span></a></li>
                            <li><a href="tablaCliente.php">Tabla Clientes</a></li>
                            <li><a href="../form/NuevoEvento.php">Nuevo Evento</a></li>
                            <li><a href="../form/NuevoCliente.php">Nuevo Cliente</a></li>
                            <li><a href="../form/CambiarContrasenia.php">Cambiar Contraseña</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="../template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $_SESSION['usuario']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="../template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $_SESSION['usuario']; ?>
                                            <small><?php echo $_SESSION['usuarioCorreo']; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="../salir.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <div class="content-wrapper table-responsive" style="padding: 30px;">
            <center>
                <section class="content-header">
                    <h1>
                        Lista de Eventos
                    </h1>
                </section>
            </center>
            <div>
                <div class="col-md-6" style="margin-bottom: 2%;">
                    <a href="../form/NuevoEvento.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Nuevo Evento</a>
                </div>
                <div class="col-md-6" style="margin-bottom: 2%; text-align: right;">
                    <form method="post">
                        <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-success">Exportar a Excel</button>
                    </form>
                </div>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Cliente</th>
                        <th>Tipo de Evento</th>
                        <th>Lugar del Evento</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Asistencia</th>
                        <th>Costo Persona</th>
                        <th>Confirmación</th>
                        <th>Observación</th>
                        <th>Estado</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont = 0;
                    while ($fila = mysqli_fetch_assoc($resultado)) : $cont++; ?>
                        <tr>
                            <td><?php echo $cont; ?></td>
                            <td><?php echo $fila['nombreCliente']; ?></td>
                            <td><?php echo $fila['nombreTipo']; ?></td>
                            <td><?php echo $fila['nombreLugar']; ?></td>
                            <td><?php echo $fila['fecha']; ?></td>
                            <td><?php echo $fila['horas']; ?></td>
                            <td><?php echo $fila['asistentes']; ?></td>
                            <td><?php echo $fila['costoPersona']; ?></td>
                            <td>
                                <p>
                                    <?php if ($fila["confirmacion"] == 0) { ?>
                                        <span class="label label-danger">Sin Confirmar</span>
                                    <?php } else { ?>
                                        <span class="label label-success">Confirmado</span>
                                    <?php } ?>
                                </p>
                            </td>
                            <td><?php echo $fila['observacion']; ?></td>
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
                                <a class='btn btn-linkedin' href="../form/EditarEvento.php?id=<?php echo $fila['idEvento']; ?>">editar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nº</th>
                        <th>Cliente</th>
                        <th>Tipo de Evento</th>
                        <th>Lugar del Evento</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Asistencia</th>
                        <th>Costo Persona</th>
                        <th>Confirmación</th>
                        <th>Observación</th>
                        <th>Estado</th>
                        <th>...</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

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
</body>
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