<?php

include "../modelo/Cliente.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
}
$OpcionesClientes = new Cliente();
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $OpcionesClientes->buscarCliente($id);
    $dato = mysqli_fetch_assoc($result);
} else {
    header("Location: ../Tablas/tablaCliente.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resultado = $OpcionesClientes->actualizarCliente();
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

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="../principal.php" class="navbar-brand"><b>VILLAVIEJA</b>Eventos</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="../tablas/tablaEventos.php">Tabla Eventos</a></li>
                            <li><a href="../tablas/tablaCliente.php">Tabla Clientes</a></li>
                            <li><a href="NuevoEvento.php">Nuevo Evento</a></li>
                            <li><a href="NuevoCliente.php">Nuevo Cliente</a></li>
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
                        Editar Cliente
                    </h1>
                </section>
            </center>
            <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="" name="idCliente" value="<?php echo $dato["id"]; ?>" required>
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Ingrese el Nombre del Cliente:</label>
                    <input type="text" class="form-control" id="validationCustom03" name="nombre" value="<?php echo $dato["nombre"]; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Ingrese el Teléfono del Cliente:</label>
                    <input type="text" class="form-control" id="validationCustom03" name="telefono" value="<?php echo $dato["telefono"]; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Ingrese el Correo del Cliente:</label>
                    <input type="text" class="form-control" id="validationCustom03" name="correo" value="<?php echo $dato["correo"]; ?>" required>
                </div>
                <div class="col-12"><br>
                    <center>
                        <button class="btn btn-success" type="submit">Actualizar</button>
                    </center>
                </div>
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
        $('input[type="radio"]').change(function() {
            var valorOpcion = this.value;
            if (valorOpcion == 0) {
                $('input[name="observacion"]').prop('disabled', true);
                $('input[name="observacion"]').val("");
            } else {
                $('input[name="observacion"]').prop('disabled', false);
            }
        });
    });
</script>
<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</html>