<?php
include '../../componentes/conexiones/conexionbd.php';
session_start();

if (isset($_POST['cedula']) && isset($_POST['clave'])) {
    $cedula = $_POST['cedula'];
    $clave = $_POST['clave'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT p.nombre, p.apellido, u.tipo_usuario, u.nombre_usuario, p.id_Personas
            FROM usuarios u
            INNER JOIN personas p ON u.id_persona = p.id_Personas
            WHERE p.cedula = '$cedula' AND u.clave = '$clave'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        $row = $result->fetch_assoc();
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
        $_SESSION['id_persona'] = $row['id_Personas']; 

        // Redirigir según el tipo de usuario
        if ($_SESSION['tipo_usuario'] == 2) {
            header("Location: ../../invitados.php");
        }else {
            $_SESSION['error'] = 'ERROR: No es un Invitado';
            header("Location: ../../loginInvitados.php");
        }
    } else {
        $_SESSION['error'] = 'Autenticación Incorrecta';
        header("Location: ../../loginInvitados.php"); // Redirige de vuelta a la página de login
    }
} else {
    $_SESSION['error'] = 'Por favor, ingresa cédula y clave.';
    header("Location: ../../loginInvitados.php"); // Redirige de vuelta a la página de login
}

$con->close();
?>
