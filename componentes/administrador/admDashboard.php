<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero</title>
    <link rel="stylesheet" href="style/admDashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php 
        include("../../componentes/template/admHeader.php");
    ?>

    <section class="sectionHeader">

        <div class="estadisticas">

   

        </div>

    </section>

    <section class="movimientosGenerales">

        <div class="tablaMovimientosGenerales">
            <p class="h1MovsTitle">Movimientos</p>

            <div class="tableDashboard">
                <table class="tableMovsGeneral">
                    <thead>
                        <th class="cabezaTh"></th>
                        <th class="cabezaTh">Tipo</th>
                        <th class="cabezaTh">Beneficiario</th>
                        <th class="cabezaTh">Monto</th>
                        <th class="cabezaTh">Fecha</th>
                        <th class="cabezaTh">Concepto</th>
                        <th class="cabezaTh">Referencia</th>
                        <th class="cabezaTh"></th>
                    </thead>
                    <tbody>

                        <tr>
                            <th class="movIngreso">INGRESO</th>
                            <td>AFILIADO</td>
                            <td>Juana Castro</td>
                            <td class="movIngreso">BsS 72,00</td>
                            <td>00/00/0000</td>
                            <td class="conceptMovs">Ingreso por estatuto</td>
                            <td> <button class="buttonDashboard">Inspeccionar</button></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th class="movEgreso">EGRESO</th>
                            <td>Reparación</td>
                            <td>Multiservicios Yaracuy</td>
                            <td class="movEgreso">BsS -35.000,00</td>
                            <td>00/00/0000</td>
                            <td class="conceptMovs">Reparacion de Muebles</td>
                            <td><button class="buttonDashboard">Inspeccionar</button></td>
                            <td>
                                <button class="buttonVigilancia">
                                    <img class="imgVigilancia" src="img/ojo.png" alt="">
                                    <img src="img/advertencia.png" class="imgNewMensaje">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th class="movIngreso">INGRESO</th>
                            <td>INVITADO</td>
                            <td>Brayan Camacho</td>
                            <td class="movIngreso">BsS 144,00</td>
                            <td>00/00/0000</td>
                            <td class="conceptMovs">Donacion</td>
                            <td> <button class="buttonDashboard">Inspeccionar</button></td>
                            <td>
                                <button class="buttonVigilancia">
                                    <img class="imgVigilancia" src="img/ojo.png" alt="">
                                    <img src="img/advertencia.png" class="imgNewMensaje">
                                </button>
                            </td>
                        </tr>

                 
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>