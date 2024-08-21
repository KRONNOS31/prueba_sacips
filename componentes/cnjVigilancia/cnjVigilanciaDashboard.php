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
    <header class="headerDashboard">


        <div class="header">

            <div class="titleDashboard">
                <h3>GENERAL</h3>
            </div>


            <img class="iconHeader" src="img/Campana.png" alt="">
            <img class="iconHeaderAdv" src="img/advertencia.png" alt="">


        </div>
    </header>

    <section class="sectionHeader">

        <div class="estadisticas">



        </div>

    </section>

    <section class="movimientosGenerales">

        <div class="tablaMovimientosGenerales">
            <div class="movsTitleUpper">
                <p class="h1MovsTitle">Movimientos</p>

                <div class="pagmovs">
                    <button>Anterior</button>
                    <p>Pag</p>
                    <button>Siguiente</button>
                </div>

            </div>

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
                            <td><span class="coment"><button class="buttonDashboard">  Comentar </button>  </span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>