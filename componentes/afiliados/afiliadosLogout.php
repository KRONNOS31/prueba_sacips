<?php 
include '../../componentes/conexiones/conexionbd.php';
session_start();
session_destroy();
$con->close();
header("Location: ../../loginAfiliados.php");
?>