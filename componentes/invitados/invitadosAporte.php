<?php
include "../../componentes/conexiones/conexionbd.php";
session_start();
// consulta a la base de datos para bancos
$sql = "SELECT id_banco, nombre_banco FROM banco";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style/afiliadosAporte.css">

</head>

<body>
    <header>
        <?php
        include "../../componentes/template/aflHeader.php";
        ?>
    </header>
    <div class="cuadroFormulario">
        <form id="formularioAfiliados" method="POST" enctype="multipart/form-data">
            <p class="aTitulo">Enviar Aporte</p>
            <div class="aHeader">

            </div>
            <input type="hidden" name="dato" value="insertar_archivo">
            <input type="hidden" name="nombre" value="<?php echo $_SESSION['nombre'] ?>">
            <input type="hidden" name="apellido" value="<?php echo $_SESSION['apellido'] ?>">
            <input type="hidden" name="id_persona" value="<?php echo $_SESSION['id_persona']; ?>">
            <div class="id_afiliado">

                <input type="hidden" name="usuario" value="<?php echo $_SESSION['tipo_usuario']; ?>">
            </div>


            <div class="banco">
                <label for="banco">Banco</label>
                <select id="banco" name="banco">

                    <option value="" selected disabled>Seleccione un banco</option>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $idBanco = $row['id_banco'];
                        $nombreBanco = $row['nombre_banco'];
                        echo "<option value=\"($idBanco) - $nombreBanco\">$idBanco - $nombreBanco</option>";
                    }
                    ?>
                </select>

            </div>




            <div class="telefono">
                <label for="telefono">Telefono</label>
                <input type="number" placeholder="Ingrese el numero telefónico" name="telefono" required>
            </div>

            <div class="documento">
                <label for="cedula">Cédula</label>
                <input type="number" id="cedula" placeholder="Ingrese la Cédula" name="cedula" required>
            </div>

            <div class="numReferencia">
                <label for="referencia">Referencia</label>
                <input type="number" placeholder="Ingrese el numero de su Referencia" name="referencia" required>
            </div>

            <div class="fecha">
                <input hidden type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s'); ?>" name="fecha_actual">
            </div>

         
                <input type="text" value="Donación" id="tipo_aporte" name="tipo_aporte" hidden readonly>
          

            <div class="monto">
                <label for="montoInput">Monto</label>
                <input type="text" id="montoInput" oninput="formatearMonto()" placeholder="Bs.S 0,00" name="monto" required>
            </div>

            <div class="concepto">
                <label for="concepto">Por concepto</label>

                <textarea id="concepto" placeholder="Ingrese el concepto de la operación" name="concepto"></textarea>
            </div>

            <div class="subirReferencia">


                <label id="img" class="subirImagen" for="imagen">
                    <img src="img/capture.png" alt="" class="imglabel">
                    <p>Capture</p>
                </label>

                <input type="file" name="capture[]" id="imagen" multiple required hidden>

                <div class="mostrarimg">
                    <img id="imagenPrevia" src="#" alt="Previsualización de la imagen" style="display: none;">
                </div>



            </div>


            <div class="btnEnviar">

                <input id="aSubmit" type="submit" name="enviar" value="Confirmar" onclick="confirm('¿Seguro que desea continuar?')">

            </div>
        </form>
    </div>

</body>

</html>