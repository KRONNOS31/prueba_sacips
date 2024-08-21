<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "sacips_bd";
$conex = new mysqli($servername, $username, $password, $bdname);

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
// Consulta combinada
$sqlBD = "
    SELECT 'ingreso' AS tipo, id, monto, rConcept AS concepto, beneficiario, fechaPagoIngreso AS fecha, 'Pendiente' AS estado, '' AS usuario
    FROM ingresos
    UNION ALL
    SELECT 'aporte' AS tipo, id_aporte AS id,monto, concepto, usuario AS beneficiario, fechaAporte AS fecha, estado, usuario
    FROM aportes_afiliados
    ORDER BY fecha DESC
    LIMIT $offset, 5
";
$resultado = mysqli_query($conex, $sqlBD);
$totalRows = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <title>SACIPS | Administrador</title>
  <script>
    function verificarAporte(id, tipo) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', './componentes/administrador/reciboDonacion.php?id=' + id + '&tipo=' + tipo, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('af-container').innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }
  </script>
</head>

<body>
<?php include("../../componentes/template/admHeader.php"); ?>
<div class="tab-movs">
  <div class="barra-botones">
    <p class="titulo-movs">Aportes</p>
    <div class="b-Nmovs">
      <?php
      // Calcula los offsets para los enlaces "Anterior" y "Siguiente"
      $prevOffset = max(0, $offset - 5);
      $nextOffset = min($totalRows - 1, $offset + 5);
      ?>
      <input class="inpuTable" type="button"
        onclick="ajax('./componentes/administrador/admAportesConsulta.php?offset=<?php echo $prevOffset; ?>')" value="Anterior">
      <input class="inpuTable" type="button"
        onclick="ajax('./componentes/administrador/admAportesConsulta.php?offset=<?php echo $nextOffset; ?>')" value="Siguiente">
    </div>
  </div>
  <form action="">
    <table>
      <tr>
        <th class="t-head">Aporte</th>
        <th class="t-head">Tipo</th>
        
        <th class="t-head">Fecha</th>
        <th class="t-head">Monto</th>
        <th class="t-head">Concepto</th>
        <th class="t-head">Estatus</th>
        <th class="t-head"></th>
      </tr>
      <?php while($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['tipo']."</td>";
        echo "<td>".$row['beneficiario']."</td>";

        echo "<td>".$row['fecha']."</td>";
        echo "<td>".$row['monto']."</td>";
        echo "<td>".$row['concepto']."</td>";

          /// Aqui estoy implementando una condicional que cambiara la clase del td
            // Agregar clase CSS basada en el estado
        $estadoClass = '';
        if ($row['estado'] == 'Aprobado') {
          $estadoClass = 'aprobado';
        } elseif ($row['estado'] == 'Declinado') {
          $estadoClass = 'declinado';
        }elseif($row['estado'] == 'Pendiente'){
          $estadoClass = 'pendiente';
        }
        
        echo "<td class='$estadoClass'>".$row['estado']."</td>";
        if (($row['usuario'] == 'Afiliado' || $row['usuario'] == 'Invitado') && $row['estado'] == 'Pendiente') {
            echo "<td><button type='button' onclick='verificarAporte(".$row['id'].", \"".$row['tipo']."\")'>Verificar</button></td>";
        } else {
            echo "<td></td>";
        }
        echo "</tr>";
      } ?>
    </table>

    <?php include "../../componentes/template/descargarpdf.php"?>
  </form>
</div>

</body>
</html>
