<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/recibo.css">
</head>
<body>
    <div id="form-recibo" class="emitir-recibo" >
        <form action="" method="post">
            <div class="name-ipsp">
              <p>INSTITUTO DE PREVISIÓN SOCIAL PARA LOS PROFESORES DE <br> LA UNIVERSIDAD POLITÉCNICA TERRITORIAL DE YARACUY
                <br> "ARISTIDES BASTIDAS"</p>
              <p>I.P.S.P.U.P.T.Y.A.B</p>
            </div>
            <div class="header-name-rif">
              <p>RIF: J-3012921-4</p>
              <p>No: 0264</p>
            </div>
            <div class="header-name-recibo">
              <p>RECIBO DE INGRESO</p>
            </div>
            <!-- Form recibo -->
            <div class="recibo-container">
              <label for="recibimos-de">RECIBIMOS DE:</label>
              <input type="text" value="">
              <br><br>
              <label for="suma-de">LA SUMA DE:</label>
              <input type="text" value="">BsS
              <br><br>
              <label for="concepto-de">POR CONCEPTO DE:</label>
              <input type="text" value="">
              <br><br>
              <label for="banco">BANCO:</label>
              <input type="text" value="">
              <br><br>
              <label for="fecha">FECHA:</label>
              <input type="date" value="">
              <br><br>
              <label for="cheque-no">CHEQUE No.: 6546878</label>
            </div>
            <!-- Repite la estructura .form-field para los demás campos -->
            <div class="buttonsRecibo">
              <p>firma autorizada <br>dirección de finanzas</p>
              <a href="#" class="btn-aprovado">Aprobar y emitir recibo</a>
            </div>
        
          </form>
    </div>
</body>
</html>
