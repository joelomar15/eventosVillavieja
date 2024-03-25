<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../login.php');
}
include "../modelo/Usuario.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = new Usuario();
    $opcion->cambiarContrasenia();
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
<style>
    .btnVer:hover {
        cursor: pointer;
    }
</style>

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
                            <li><a href="../tablas/tablaEventos.php">Tabla Eventos</a></li>
                            <li><a href="../tablas/tablaCliente.php">Tabla Clientes</a></li>
                            <li><a href="NuevoEvento.php">Nuevo Evento</a></li>
                            <li><a href="NuevoCliente.php">Nuevo Cliente</a></li>
                            <li><a style="background-color:#385B6F ;" href="#">Cambiar Contraseña<span class="sr-only">(current)</span></a></li>
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
        <div class="content-wrapper" style="padding:30px;">
            <center>
                <section class="content-header" style="margin-bottom: 50px;">
                    <h1>
                        Actualizar Contraseña
                    </h1>
                </section>
            </center>
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Ingresa una Nueva Contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <span class="input-group-addon btnVer" id="verPass"><i class="fa fa-eye"></i></span>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <center><button type="submit" value="upload" class="btn btn-success"><i class="fa fa-edit"></i>
                                Cambiar Contraseña</button></center>
                    </div>
                </div>
                <!-- /.box-body -->
            </form>

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
            $(document).ready(function() {
                $('#verPass').click(function() {
                    var passwordInput = $('#password');
                    var fieldType = passwordInput.attr('type');
                    if (fieldType === 'password') {
                        passwordInput.attr('type', 'text');
                        $('#verPass i').removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        passwordInput.attr('type', 'password');
                        $('#verPass i').removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });
            });
        </script>

</html>