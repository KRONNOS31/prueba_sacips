<?php $servidor = "localhost";
$usuariobd = "root";
$conts = "";
$baseDato = "sacips_bd";

// Establecer la zona horaria a "America/Caracas"
date_default_timezone_set('America/Caracas');

$con = mysqli_connect($servidor, $usuariobd, $conts, $baseDato);
