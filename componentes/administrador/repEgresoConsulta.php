<?php
      //conexión.
          $servername = "localhost";
          $username = "root";
          $password = "";
          $bdname = "sacips_bd";
          $conex = new mysqli($servername, $username, $password, $bdname);

          //numero total de filas
          $totalRows = mysqli_num_rows(mysqli_query($conex, "SELECT * FROM registrar_egreso"));
          $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
          $sqlBD = "SELECT * FROM registrar_egreso ORDER BY fechaPagoEgreso DESC LIMIT $offset, 7";
          $resultado = mysqli_query($conex, $sqlBD);
      ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/style-afiliados2.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/admin.css">
  <title>SACIPS | Administrador</title>
</head>

<body>
<header>
        <?php
        include "../../componentes/template/admHeader.php";
        ?>
    </header>

  <div class="tab-movs">



    <div class="barra-botones">
      <p class="titulo-movs">EGRESOS</p>
      <div class="b-Nmovs">
          <?php
          // Calcula los offsets para los enlaces "Anterior" y "Siguiente"
          $prevOffset = max(0, $offset - 4);
          $nextOffset = min($totalRows, $offset + 4);
          ?>
          <input class="inpuTable" type="button"
            onclick="ajax('./componentes/administrador/repEgresoConsulta.php?offset=<?php echo $prevOffset; ?>')" value="Anterior">
        

          <input class="inpuTable" type="button"
            onclick="ajax('./componentes/administrador/repEgresoConsulta.php?offset=<?php echo $nextOffset; ?>')" value="Siguiente">

        </div>

    </div>
    <form class="tableEgreso" action="">

      <table>

        <tr>
          <th class="t-head">Monto</th>
          <th class="t-head">Nombre</th>
          <th class="t-head">fecha</th>
          <th class="t-head">Por Concepto de</th>
          <th class="t-head"></th>
         
        </tr>

        <?php while($row = $resultado->fetch_assoc()){
          echo "<tr>";
          echo "<td class='eMonto'>".$row['monto']."</td>";
          echo "<td>".$row['beneficiario']."</td>";
          echo "<td>".$row['fechaPagoEgreso']."</td>";
          echo "<td class='eTableConcepto'>".$row['rConcept']."</td>";
          echo "<td><button id='admVerification'></button></td>";
          echo "</tr>";
        }?>
  
      </table>
      <?php include "../../componentes/template/descargarpdf.php"?>
    </form>
  </div>

</body>

</html>