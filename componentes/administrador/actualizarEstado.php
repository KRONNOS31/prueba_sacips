<?php
include '../../componentes/conexiones/conexionbd.php';
session_start();

if (isset($_POST['id']) && isset($_POST['accion']) && isset($_POST['tipo'])) {
    $id = $_POST['id'];
    $accion = $_POST['accion']; // 'aprobar' o 'declinar'
    $tipo = $_POST['tipo'];

    
    $estado = ($accion == 'aprobar') ? 'Aprobado' : 'Declinado';

    if ($tipo == 'aporte') {
        $sql = "UPDATE aportes_afiliados SET estado = '$estado' WHERE id_aporte = $id";
    } else {
        // Si necesitas actualizar algo en la tabla de ingresos, puedes hacerlo aquí
    }

    if ($con->query($sql) === TRUE) {
    
        echo 'Aporte'. ' ' . $estado;

    } else {
        echo "Error al actualizar la referencia: " . $con->error;
    }
}

$con->close();
?>
