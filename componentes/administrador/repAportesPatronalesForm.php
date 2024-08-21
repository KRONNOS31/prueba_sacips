<?php
//conexión.
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "sacips_bd";
    $conexion = new mysqli($servername, $username, $password, $bdname);
    
    date_default_timezone_set('America/Caracas');

    $sqlBD = "SELECT * FROM ingresos";
    $resultado = mysqli_query($conexion, $sqlBD);

    /** Condicion para que todo funcione >Bv**/

    if(isset($_POST['btn'])){
        $_POST['btn'] = FALSE;
        $monto = $_POST['monto'];
        $rConcept = $_POST['rConcept'];
        $beneficiario = $_POST['beneficiario'];
        $fechaPagoEgreso = $_POST['fechaPagoEgreso'];
        $tipoOperacion = $_POST['tipoOperacion'];
        $banco = $_POST['banco'];
        $nro_cuenta = $_POST['nro_cuenta'];
        $nro_transferencia = $_POST['nro_transferencia'];
        $tipo_ingreso;
        $tipo_ingreso = 'Aporte Patronal';
        
        $sql = "INSERT INTO ingresos (id, monto, rConcept, beneficiario, 
        fechaPagoEgreso, tipoOperacion, banco, nro_cuenta, nro_transferencia, tipo_ingreso)
         VALUES('', '$monto', '$rConcept', '$beneficiario', '$fechaPagoEgreso',
          '$tipoOperacion', '$banco', '$nro_cuenta' ,'$nro_transferencia', '$tipo_ingreso')";
        if($conexion->query($sql)===TRUE){
            if ($resultado){
                echo "<script languaje='JavaScript'> 
                location.assign('../../Admin.php');
                </script>";
                }
                else{
                echo "<script languaje='JavaScript'> 
                location.assign('../../Admin.php');
                </script>";
            }
        }


    }


?>