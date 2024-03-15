<?php

include "../modelo/Evento.php";
include "../modelo/Cliente.php";
$Opciones = new Evento();
$OpcionesClientes = new Cliente();
$resultadoCliente = $OpcionesClientes->listarCliente();
$resultadoTipo = $Opciones->listarTipo();
$resultadoLugar = $Opciones->listarLugar();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resultado = $Opciones->insertarEvento();
}

?>

<!DOCTYPE html>
<html lang="en" class="dark">

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
                        <a class="nav-link" href="../tablas/tablaEventos.php">Tabla Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tablas/tablaCliente.php">Tabla Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">Nuevo Evento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="NuevoCliente.php">Nuevo Clientes</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a style="color: black;" href="../salir.php" class="btn btn-info"><i class="glyphicon glyphicon-close"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="" style="padding:50px;">
        <div class="">
            <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Lista de Clientes</label>
                    <select class="form-control select2" style="width: 100%;" name="cliente" required>
                        <option value="">...</option>
                        <?php while ($fila = mysqli_fetch_assoc($resultadoCliente)) : ?>
                            <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="invalid-feedback">
                        Elia un Cliente.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Lista de Tipo de Evento</label>
                    <select class="form-control select2" style="width: 100%;" name="tipoEvento" required>
                        <option value="">...</option>
                        <?php while ($fila = mysqli_fetch_assoc($resultadoTipo)) : ?>
                            <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="invalid-feedback">
                        Elia un Tipo de Evento.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Lista de Lugares</label>
                    <select class="form-control select2" style="width: 100%;" name="lugar" required>
                        <option value="">...</option>
                        <?php while ($fila = mysqli_fetch_assoc($resultadoLugar)) : ?>
                            <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="invalid-feedback">
                        Elia un Lugar.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Elija la Fecha:</label>
                    <input type="date" class="form-control" id="validationCustom03" name="fecha" required>
                    <div class="invalid-feedback">
                        Ingrese la Fecha.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Elija la Hora:</label>
                    <input type="number" class="form-control" id="validationCustom03" name="hora" required>
                    <div class="invalid-feedback">
                        Ingrese la Hora.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom06" class="form-label">Nº Asistentes:</label>
                    <input type="number" class="form-control" id="validationCustom03" name="numAsistentes" required>
                    <div class="invalid-feedback">
                        Ingrese el número de Asistentes.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom07" class="form-label">Costo(Persona):</label>
                    <input type="number" class="form-control" id="validationCustom03" name="costoPersona" step='0.01' value='0.00' placeholder='0.00' required>
                    <div class="invalid-feedback">
                        Ingrese el Costo por Perosna.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom08" class="form-label">Confirmación:&nbsp</label> Si&nbsp
                    <input type="radio" class="" id="confirmacion" name="confirmacion" value="1" required>
                    &nbsp&nbspNO&nbsp<input type="radio" class="" id="confirmacion" name="confirmacion" value="0" required>
                    <div class="invalid-feedback">
                        Seleccione el estado de la Confirmación.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom09" class="form-label">Observación:</label>
                    <input type="text" class="form-control" id="validationCustom03" name="observacion" disabled>
                    <div class="invalid-feedback">
                        Ingrese una observación.
                    </div>
                </div>
                <div class="col-12"><br>
                    <center>
                    <button class="btn btn-success" type="submit">Registrar</button></center>
                </div>
            </form>
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
    $(document).ready(function() {
        $('input[type="radio"]').change(function() {
            var valorOpcion = this.value;
            if (valorOpcion == 1) {
                $('input[name="observacion"]').prop('disabled', true);
                $('input[name="observacion"]').val("");
            } else {
                $('input[name="observacion"]').prop('disabled', false);
            }
        });
    });
</script>
<script>
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
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