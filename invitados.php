<!-- Modulo de los afiliaddos(Gabriel)-->

<?php 
include 'componentes/conexiones/conexionbd.php';
session_start();

if(!$_SESSION['tipo_usuario'] || $_SESSION['tipo_usuario'] != 2){
  header("Location: ./componentes/invitados/invitadosLogout.php");
}
 ?>
<!DOCTYPE html>
<html lang="es">  

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/style-afiliados2.css">
  <link rel="stylesheet" href="style/style.css">

  
  <title>SACIPS | Invitado</title>
</head>

<body>
  

  <section class="bl-all">
    
    <div class="barra-lateral">
      <div class="bl-mg">

        <div class="adminHeader" style=" padding: 0 0 4.8px 0;">

          <img src="img/UserGestion.png" class="admHeaderImg">
          <div class="text">
              <p class="aNombre" id="tipo_user"><?php echo $_SESSION['nombre'] . " ". $_SESSION['apellido'];?></p>
              <h5 class="tUsuario"><?php if($_SESSION['tipo_usuario'] == 1){
                echo 'Afiliado';
              };?></h5>
          </div>
          
      </div>

        <div class="bl-body">


          <!-- <button  id="aPerfil" class="b-bl"><img src="img/member.png" class="ico-bl" alt="">
            <p>Accesibilidad</p>
          </button> -->
          <button id="inMovimientos" class="b-bl"><img src="img/movs.png" class="ico-bl" alt="">
            <p>Consultar</p>
          </button>
          <button id="inAportar" class="b-bl"><img src="img/wallet.png" class="ico-bl" alt="">
            <p>Aportar</p>
          </button>

          
        </div>

        <div class="bl-footer">
          <div class="t-footer">
            <div class="dolar-usdc">
              <a class="e-bl" href="./componentes/invitados/invitadosLogout.php">
                <p>Cerrar Sesión</p>
              </a>
            </div>

          </div>


        </div>


      </div>
    </div>


    <!-- aquí esta el contenido completo lo que aparece en el medio, osea todo xd -->

    <div id="af-container" class="bl-container-2">
    <?php 
    // Desactivar la visualización de errores
error_reporting(0);
ini_set('display_errors', 0);

    include "./componentes/invitados/invitadosMovs.php" ?>
    </header>     
   
    </div>    <!-- bl-container-2 -->

  </section> <!-- barra lateral -->

  <script src="./js/ajax.js"></script>

</body>

</html>