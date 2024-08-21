<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "sacips_bd";
$conex = new mysqli($servername, $username, $password, $bdname);
$sqlBD = "SELECT * FROM ingresos";
$resultado = mysqli_query($conex, $sqlBD);

$afiliado = '';
$monto_operacion = '';
$banco = '';
$nro_transferencia = '';
$fecha = '';
$tipo_aporte = '';
$rConcept = '';

$id_cookie = $_COOKIE['id_aporte_recibo'];
$id_cookie;
if ($conex) {
    while ($row = $resultado->fetch_assoc()) {
        if ($row['id'] == $_COOKIE['id_aporte_recibo']) {
            $afiliado = $row['beneficiario'];
            $monto_operacion = $row['monto'];
            $banco = $row['banco'];
            $nro_transferencia = $row['nro_transferencia'];
            $fecha = $row['fechaPagoIngreso'];
            $tipo_aporte = $row['tipo_ingreso'];
            $rConcept = $row['rConcept'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprobar Recibo</title>
</head>

<body>

    <?php require ("../../componentes/template/admHeader.php") ?>


    <div class="reciboShape">
        <form id="reciboForm" action="">



            <h2 class="tituloRecibo">Comprobante de Operación</h2>



            <div class="porMonto">
                <p>Monto de la Operación</p>
                <input type="text" value="<?php echo $monto_operacion ?>" readonly>
            </div>

            <div class="labels">
                <label for="bancoReceptor">Banco Receptor</label>
                <input type="text" value="<?php echo $banco ?>" readonly>

            </div>

            <div class="labels">

                <label for="nombre">Tipo de Persona</label>
                <input type="text" value="Falta por hacer la relación." readonly>

            </div>

            <div class="labels">

                <label for="nombre">Receptor</label>
                <input type="text" value="<?php echo $afiliado ?>" readonly>

            </div>

            <div class="labels">
                <label for="cedula">cédula</label>
                <input type="text" value="Falta por hacer la relación." readonly>

            </div>
            <div class="labels">
                <label for="telefono">Teléfono</label>
                <input type="text" value="falta por hacer la relación." readonly>

            </div>
            <div class="labels">
                <label for="">Referencia</label>
                <input type="text" value="<?php echo $nro_transferencia ?>" readonly>

            </div>

            <div class="labels">
                <label for="fecha">fecha</label>
                <input type="text" value="<?php echo $fecha ?>" readonly>
            </div>

            <div class="labels">
                <label for="fecha">Hora</label>
                <input type="text" value="Falta por hacer la relación." readonly>
            </div>
            <div class="labels">

                <label for="tipo">Tipo</label>
                <input type="text" value="<?php echo $tipo_aporte ?>" readonly>
            </div>
            <div class="labels">
                <label for="concepto">Por concepto</label>
                <textarea name="concepto" id="concepto" readonly><?php echo $rConcept ?></textarea>

            </div>


            <button class="mostrarCapture">
                <img src="./img/capture.png" class="capture" alt="">
                <p>Mostrar Capture</p>
            </button>

            <div class="validacion">
                <div id="divAprobar" class="aprobar">
                    <p>¿Estás seguro de que deseas <span class="colorConfirm">Confirmar el Aporte</span>?</p>
                    <div class="botonesValidar">
                        <button onclick="alert('Se ha Confirmado el Aporte')" id="continuarAprobar">Sí</button>
                        <button id="regresar">No</button>
                    </div>
                </div>

                <div id="divDenegar" class="denegar">
                    <p>¿Estás seguro de que deseas <span class="colorConfirm">Declinar el Aporte</span>?</p>
                    <div class="botonesValidar">
                        <button onclick="alert('Se ha Declinado el Aporte')" id="continuarDenegar">Sí</button>
                        <button id="regresar">No</button>
                    </div>
                </div>

            </div>

            <div class="buttonsconfirm">

                <input type="button" id="botonAprobar" onclick="mostrarVentana('divAprobar')" value="Aprobar">
                <input type="button" id="botonDeclinar" onclick="mostrarVentana('divDenegar')" class="declinado"
                    value="Declinar">
            </div>

            <button onclick="confirm('¿Seguro que desea abandonar esta pagina?')" id="volverAprobarRecibo" class="atras">

                <img src="./img/volver.png" alt="">
                <p>Volver</p>
            </button>

        </form>


    </div>






</body>

</html>