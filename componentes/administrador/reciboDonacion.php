<?php
include '../../componentes/conexiones/conexionbd.php';
session_start();

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    // Obtener los datos del aporte o ingreso
    if ($tipo == 'aporte') {
        $sql = "SELECT * FROM aportes_afiliados WHERE id_aporte = $id";
    } else {
        $sql = "SELECT * FROM ingresos WHERE id = $id";
    }

    $result = $con->query($sql);
    $data = $result->fetch_assoc();
} else {
    echo "ID o tipo no especificado.";
    exit;
}
?>

<!-- Muestra otros datos necesarios -->





<?php require("../../componentes/template/admHeader.php") ?>


<div class="reciboShape">
    <form id="reciboForm">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">

        <h2 class="tituloRecibo">Comprobante de Operación</h2>



        <div class="porMonto">
            <p>Monto de la Operación</p>
            <input type="text" value="<?php echo $data['monto']; ?>" readonly>
        </div>

        <div class="labels">
            <label for="bancoReceptor">Banco Receptor</label>
            <input type="text" value="<?php echo $data['banco'];?>" readonly>

        </div>

        <div class="labels">

            <label for="nombre">Receptor</label>
            <input type="text" value="<?php echo $data['nombre']; ?>" readonly>

        </div>

        <div class="labels">

            <label for="tipo">por</label>
            <input type="text" value="<?php echo $data['usuario'] ?>" readonly>
        </div>

        <div class="labels">

            <label for="nombre">Tipo</label>
            <input type="text" value="<?php echo $tipo; ?>" readonly>

        </div>



        <div class="labels">
            <label for="cedula">cédula</label>
            <input type="text" value="<?php echo $data['cedula'] ?>" readonly>

        </div>
        <div class="labels">

            <label for="telefono">Teléfono</label>
            <input type="text" value="asdasd" readonly>

        </div>
        <div class="labels">
            <label for="">Referencia</label>
            <input type="text" value="<?php echo $data['referencia'] ?>" readonly>

        </div>

        <div class="labels">
            <label for="fecha">fecha</label>
            <input type="text" value="<?php echo $data['fechaAporte']; ?>" readonly>
        </div>



        <div class="labels">
            <label for="concepto">Por concepto</label>
            <textarea name="concepto" id="concepto" readonly> <?php echo $data['concepto']; ?></textarea>

        </div>


        <button class="mostrarCapture">
            <img src="./img/capture.png" class="capture" alt="">
            <p>Mostrar Capture</p>
        </button>

        <!-- <div class="validacion">
            <div id="divAprobar" class="aprobar">
                <p>¿Estás seguro de que deseas <span class="colorConfirm">Confirmar el Aporte</span>?</p>
                <div class="botonesValidar">
                    <button id='aprobar' type="button" onclick="actualizarEstado('aprobar')">Sí</button>
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

        </div> -->

        <div class="buttonsconfirm">
            <input name="aprobar" type="button"  id='aprobar' type="button" onclick="actualizarEstado('aprobar')" value="Aprobar">
            <input name="declinar" type="button" onclick="actualizarEstado('declinar')" value="Declinar"  class="declinado">
            <!-- <input type="button" id="botonAprobar" onclick="mostrarVentana('divAprobar')" value="Aprobar"> -->
            <!-- <input type="button" id="botonDeclinar" onclick="mostrarVentana('divDenegar')" class="declinado" value="Declinar"> -->
        </div>

        <button onclick="confirm('¿Seguro que desea abandonar esta pagina?')" id="volverAprobarRecibo" class="atras">

            <img src="./img/volver.png" alt="">
            <p>Volver</p>
        </button>

    </form>


</div>