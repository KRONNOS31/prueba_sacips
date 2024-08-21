<?php
// ... (Existing code)
include "../../componentes/conexiones/conexionbd.php";
session_start();

$tipo_aporte = $_GET['tipo_aporte'];
// $tipo_nombre = $_GET['tipo_nombre'];
// $tipo_apellido = $_GET['tipo_apellido'];
$tipo_cedula = $_GET['tipo_cedula'];
$tipo_banco = $_GET['tipo_banco'];
$tipo_telefono = $_GET['tipo_telefono'];
$monto = $_GET['monto'];
$fechaAporte = $_GET['fechaAporte'];
$referencia = $_GET['referencia'];
$concepto = $_GET['concepto'];
$estado = $_GET['estado'];


// Use the form data to populate receipt page elements
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style/afiliadosAporte.css">
    <link rel="stylesheet" href="../../style/afiliadosAporte.css">
</head>

<body>
    <header>
        <?php
        include "../../componentes/template/aflHeader.php";
        ?>
    </header>

    <div class="cuadroFormulario">



        <form action="./componentes/afiliados/procesarPago.php" id="formularioAfiliados" method="POST"
            enctype="multipart/form-data">

            <div class="btnVolver">

                <label for="btnVolverRecibo">
                    
                    <img src="./img/volver.png" alt="" class="imgVolver">
                    <p>volver</p>
                </label>

                <input onclick="confirm('¿Seguro que desea salir?')" type="button" id="btnVolverRecibo" value="volver" hidden>

            </div>

            </input>
            <p class="aTitulo">MOSTRAR APORTE</p>
            <p class="aStitulo">Referencia de pago</p>
            <div class="aHeader">
            </div>
            <div class="fecha">
                <p class="fechaRecibo"> <b>Fecha de transacción <?php echo $fechaAporte; ?></b> </p>
            </div>

            <div class="banco">
                <label for="banco">Banco</label>
                <input type="text" value="<?php echo $tipo_banco; ?>">
            </div>
<!-- 
            <div class="nombre">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Ingrese el numero telefónico" name="nombre"
                    value="<php echo $nombre; ?>" readonly>
            </div>

            <div class="apellido">
                <label for="apellido">Apellido</label>
                <input type="text" placeholder="Ingrese el numero telefónico" name="apellido"
                    value="<php echo $apellido; ?>" readonly>
            </div> -->

            <div class="telefono">
                <label for="telefono">Telefono</label>
                <input type="text" placeholder="Ingrese el numero telefónico" name="telefono" required
                    value="<?php echo $tipo_telefono; ?>" readonly>
            </div>

            <div class="documento">
                <label for="cedula">Cédula</label>
                <input type="text" id="cedula" placeholder="Ingrese la Cédula" name="cedula" required
                    value="<?php echo $tipo_cedula; ?>" readonly>
            </div>

            <div class="numReferencia">
                <label for="referencia">Referencia</label>
                <input type="text" placeholder="Ingrese el numero de su Referencia" name="referencia" required
                    value="<?php echo $referencia; ?>" readonly>
            </div>


            <div class="banco">
                <label for="donacion">Tipo de Aporte</label>
                <input type="text" value="<?php echo $tipo_aporte; ?>">
            </div>

            <div class="monto">
                <label for="montoInput">Monto</label>
                <input type="text" id="montoInput" value="<?php echo $monto; ?>" placeholder="Bs.S 0,00" name="monto"
                    required>
            </div>

            <div class="concepto">
                <label for="concepto">Por concepto</label>

                <textarea class="txtAreaRecibo"> <?php echo $concepto ?> </textarea>
            </div>


        </form>

    </div>

</body>

</html>