<?php
include ("../../componentes/administrador/repAportesPatronalesForm.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar Egreso</title>
    <link rel="stylesheet" href="/style/admin.css">

</head>

<body> <!-- aquí estoy reportando que tipo de egreso se hara -->

    <section class="repEgresos"> <!-- La sección de egreso-->


        <div class="repEgresosShape"><!-- El cuerpo de la pagina de egreso-->

            <div class="titleheader">
                <p> Registrar Aportes Patronales </p> <!--Titulo de la Pagina-->
            </div>
            <hr>
            <div class="formShape">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="formularioEgreso">
                    <!--Aquí ya hace el formulario-->
                    <div class="br">
                        <label for="montoInput">Monto</label>

                        <input name="monto" placeholder="Bs.S 0,00" type="text" id="montoInput"
                            oninput="formatearMonto()" required="">
                        <!--Monto en Bs de la institución con el formateo de numeros con decimales-->
                    </div>

                    <div class="br">

                        <textarea name="rConcept" id="rConcept" placeholder="Por Concepto de" required=""></textarea>
                    </div>
                    <div class="br">
                        <label for="beneficiario">Beneficiario</label>
                        <input type="text" name="beneficiario" id="beneficiario" required="">
                    </div>
                    <div class="br">
                        <label for="fechaPagoEgreso">Fecha de Emisión del Procedimiento</label>
                        <input type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s'); ?>" name="fechaPagoEgreso"
                            required readonly>
                        <!--Tambien hagan que la fecha se actualice mediante pasen los dias-->
                    </div>
                    <div class="br">
                        <label for="tipoOperacion">Tipo de operación:</label>
                        <select id="tipoOperacion" name="tipoOperacion" required="">
                            <option value="">Selecciona una operación</option>
                            <option value="transferenciaFondos">Transferencia de fondos</option>
                            <option value="efectivo">Efectivo</option>
                        </select>
                    </div>
                    <!--El select para seleccionar los bancos solo debe aparecer cuando en el select de tipo de operacion
                uno selecciona Transferencia de fondos. PDT SI UNO SELECCIONA EFECTIVO SOLO DEBE QUEDARSE ASI-->
                    <div class="br">
                        <?php
                        //conexión.
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $bdname = "sacips_bd";
                        $conex = new mysqli($servername, $username, $password, $bdname);

                        $sqlBD = "SELECT * FROM banco";
                        $resultado = mysqli_query($conex, $sqlBD);

                        ?>
                        <label for="banco">Banco:</label>
                        <select id="banco" name="banco" required="">
                            <option value="">Selecciona un banco</option>
                            <?php
                            while ($row = $resultado->fetch_assoc()) {
                                echo "<option>" . $row['id_banco'] . " - " . $row['nombre_banco'] . "</option>";
                            }
                            ?>

                        </select>
                        <!--Causas aquí añadan la opcion de que al seleccionar el banco se muestre el codigo del banco seleccionado
                        mas el input aparte para escribir el numero de cuenta ejemplo
                        0102 - | 1029312039-02-1232132 |  y asi-->

                        <label class="codigoBanco" for="" id="codigo_banco"></label>
                        <input type="text" name="nro_cuenta" placeholder="Ingrese su nro de cuenta" required=""> <!--Aqui les deje el ejemplo del codigo del banco y el input donde se escribira el
                        numero de cuenta completo, el codigo del banco debe concordar al seleccionar dicho banco al que esta asociado 
                        y deben mostrarse estos campos al seleccionar el banco-->
                    </div>

                    <div class="br">
                        <label for="">Transferencia Nro:</label>
                        <input name="nro_transferencia" type="text" value="" required="">
                    </div>
                    <div class="firma">

                        <div class="firma1">
                            <label for="addFirma1" class="eligefirma"><img class="firmaImg" src="/img/firma.png" alt="">
                                <p>Cargar firmas</p>
                            </label>
                            <input type="file" name="addFirma" id="addFirma1" class="addfirma">
                            <hr>
                            <p>Director Presidente</p>
                        </div>
                        <div class="firmabr"></div>

                        <div class="firma2">
                            <label for="addFirma2" class="eligefirma"> <img class="firmaImg" src="/img/firma.png"
                                    alt="">
                                <p>Cargar firmas</p>
                            </label>
                            <input type="file" name="addFirma" id="addFirma2" class="addfirma">
                            <hr>
                            <p>Director de Finanzas</p>
                        </div>

                    </div>


                    <div class="buttonsReport">
                        <button id="volverEgresos" class="volverEgresos" type="button">Volver</button>

                        <div class="volverBr"></div>

                        <button name="btn" class="submitReport" type="submit">Procesar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="/js/masOpciones.js"></script>


</body>

</html>