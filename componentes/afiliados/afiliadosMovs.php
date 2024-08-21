<?php

include "../../componentes/conexiones/conexionbd.php";
session_start();

$id_persona = $_SESSION['id_persona'];
// Obtén el número total de filas en la tabla
$totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM aportes_afiliados WHERE id_persona = $id_persona"));

// Calcula la posición actual (por ejemplo, en la primera carga, será 0)
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

// Consulta SQL para obtener los datos filtrando por el id_persona en sesión
$query = "SELECT * FROM aportes_afiliados WHERE id_persona = $id_persona ORDER BY fechaAporte DESC LIMIT $offset, 4";
$resultmovs = mysqli_query($con, $query);


?>

<header>
  <?php
  include "../../componentes/template/aflHeader.php";
  ?>
  <div class="inicio-afiliados">

    <div class="bloque">
      <div class="header-deuda">
        <div class="deuda">

          <p class="d-dolares">Debe <span class="d-dl-act">$2.00 USDC</span></p>
          <p class="d-bs">Bs72.84 VES</p>
        </div>


        <input type="button" value="Pagar">

      </div>
    </div>
  </div>

  <div class="tab-movs">
    <form action="">
      <div class="barra-botones">
        <p class="titulo-movs">Movimientos</p>
        <div class="b-Nmovs">
          <?php
          // Calcula los offsets para los enlaces "Anterior" y "Siguiente"
          $prevOffset = max(0, $offset - 4);
          $nextOffset = min($totalRows - 1, $offset + 4);
          ?>


          <input class="inpuTable" type="button" onclick="ajax('./componentes/afiliados/afiliadosMovs.php?offset=<?php echo $prevOffset; ?>')" value="Anterior">


          <input class="inpuTable" type="button" onclick="ajax('./componentes/afiliados/afiliadosMovs.php?offset=<?php echo $nextOffset; ?>')" value="Siguiente">

        </div>
      </div>

      <form action="">
        <div id="formularioMovs">
          <table class="tableMovsGeneral">
            <tr>
              <th class="t-head">Aporte</th>
              <th class="t-head">Monto</th>
              <th class="t-head">Fecha</th>
              <th class="t-head">Nro Referencia</th>
              <th class="t-head">concepto</th>
              <th class="t-head">Estatus</th>
              <th class="t-head">Referencia</th>
              <th class="t-head">Recibo</th>

            </tr> <!-- Encabezados de la tabla aquí... -->
            <?php
            while ($rowmovs = mysqli_fetch_assoc($resultmovs)) {
              echo "<tr>";
              echo "<td class='t-body'>" . $rowmovs['tipo_aporte'] . "</td>";
              echo "<td class='t-body'>" . $rowmovs['monto'] . "</td>";
              echo "<td class='t-body'>" . $rowmovs['fechaAporte'] . "</td>";
              echo "<td class='t-body'>" . $rowmovs['referencia'] . "</td>";
              echo "<td class='t-body'>" . $rowmovs['concepto'] . "</td>";


              $estadoClass = '';
              if ($rowmovs['estado'] == 'Aprobado') {
                $estadoClass = 'aprobado';
              } elseif ($rowmovs['estado'] == 'Declinado') {
                $estadoClass = 'declinado';
              } elseif ($rowmovs['estado'] == 'Pendiente') {
                $estadoClass = 'pendiente';
              }


              echo "<td class='t-body'>". "<span class='$estadoClass'>"  . $rowmovs['estado'] ."</span>" . "</td>";
              echo "<td class='t-body'><button class='mandarGet' data-tipo_aporte='" . $rowmovs['tipo_aporte'] . "' data-tipo_nombre='" . $rowmovs['nombre'] . "' data-tipo_apellido='" . $rowmovs['apellido'] . "' data-tipo_cedula='" . $rowmovs['cedula'] . "' data-tipo_banco='" . $rowmovs['banco'] . "' data-tipo_telefono='" . $rowmovs['telefono'] . "' data-monto='" . $rowmovs['monto'] . "' data-fechaAporte='" . $rowmovs['fechaAporte'] . "' data-referencia='" . $rowmovs['referencia'] . "' data-concepto='" . $rowmovs['concepto'] . "' data-estado='" . $rowmovs['estado'] . "'>Mostrar</button></td>";
              echo "<td class='t-body'><button class='btnRecibo'> <img src='./img/recibo.png' class='reciboImg'></button></td>";
              echo "</tr>";
          }
            ?>

          </table>

        </div>

      </form>
  </div>