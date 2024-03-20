<?php
setlocale(LC_TIME, 'es.utf8');
include_once "Evento.php";
$opcionEvento = new Evento();

$result = $opcionEvento->listarEvento();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        html {
            margin: 0;
            font-size: 5;
        }

        body {
            font-family: "Times New Roman", serif;
            margin: 0mm 4mm 2mm 2mm;
        }

        td {
            border: 1px solid black;
            text-align: center;

        }

        th {
            background-color: rgb(7, 118, 143);
        }

        .th1 {
            border-top: 1px solid black;
        }

        .th2 {
            border-left: 1px solid black;
        }

        .th3 {
            border-right: 1px solid black;
        }
    </style>
<body>


    <div class="container">
        <center>
            <h2>REPORTE DE EVENTOS</h2>
        </center>
        <table id="" class="" style=" border-collapse: collapse;
            width: 100%;">
            <tr>
                <th>Nº</th>
                <th>Cliente</th>
                <th>Tipo Evento</th>
                <th>Lugar del Evento</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Asistencia</th>
                <th>Costo Persona</th>
                <th>Confirmación</th>
                <th>Observación</th>
                <th>Usuario</th>
            </tr>

            <tbody>
                <?php $cont = 0;
                foreach ($result as $fila) {
                    $cont++; ?>
                    <tr>
                        <td><?php echo $cont ?></td>
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
                        <td><?php echo $fila['nombreUsuario']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>