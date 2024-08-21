<?php

include "../../componentes/conexiones/conexionbd.php";

$id_usuario = $_COOKIE['User_ID'];
$nombre;
$tipo_usuario;
$correo;
$telefono;
$correo;
$img_perfil;
$apellido;
$ci_rif;

//esta vaina es seria señol bill 'esta vaina guarda la imagen(foto de perfil)'
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image_true'])) {
    if ($_FILES['imagen_perfil']['error'] === UPLOAD_ERR_OK) {
        $tempPath = $_FILES['imagen_perfil']['tmp_name'];
        $targetPath = '../../img/Usuarios/' . $_FILES['imagen_perfil']['name'];
        move_uploaded_file($tempPath, $targetPath);
        $name_img = $_FILES['imagen_perfil']['name'];
        $sql = "UPDATE usuario_admins SET img='$name_img' WHERE id_usuarios= $id_usuario ";
        if (mysqli_query($con, $sql)) {
            echo '<script>window.location.href = "../../Admin.php";</script>';
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo 'Error al subir la imagen';
    }
   
}

//este guarda/edita los datos del usuario 🦍
if (isset($_POST['active'])) {
    //datos editados 👽
    $nombre = $_POST['nombres'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $apellido = $_POST['apellidos'];
    $ci_rif = $_POST['ci'];
    $sql = "UPDATE usuario_admins SET nombre='$nombre', apellido='$apellido', cedula='$ci_rif', correo='$correo', telefono='$telefono' WHERE id_usuarios=$id_usuario";
    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href = "../../Admin.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

if ($con) {
    $sql = "SELECT * FROM usuario_admins";
    $resultado = mysqli_query($con, $sql);
    $i = 0;
    //echo "<script> const usuario = [''];</script>";
    while ($row = $resultado->fetch_assoc()) {
        if ($row['id_usuarios'] == $id_usuario) {
            $nombre = $row['nombre'];
            $tipo_usuario = $row['usuario'];
            $telefono = $row['telefono'];
            $correo = $row['correo'];
            $img_perfil = $row['img'];
            $apellido = $row['apellido'];
            $ci_rif = $row['cedula'];
        }
        $i += 1;
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SACIPS | SETTING</title>
    <link rel="stylesheet" href="style/admDashboard.css">
    <link rel="stylesheet" href="style/user.css">
</head>

<body>
    <?php
    include("../../componentes/template/admHeader.php");
    ?>
    <div class="hdrPerfil">
        <div class="hdrPerfilShape perfil_user">

            <form class='img' method="POST" id="form" accept="image/*" enctype="multipart/form-data" action="./componentes/administrador/admConfig.php">
                <div>
                    <?php
                    if ($img_perfil != '') {
                        echo '<img src="./img/Usuarios/' . $img_perfil . '" alt="" class="iconGstHeader">';
                    } else {
                        echo '<img src="./img/UserGestion.png" alt="" class="iconGstHeader">';
                    }
                    ?>
                </div>
                <label class="agregar_img" for="imagen_perfil"><img src="img/camera.png"></label>
                <input type="file" id="imagen_perfil" name="imagen_perfil">
                <input type="hidden" name='image_true'>
            </form>
            <div class="textPerfilHeader">
                <?php
                echo "<h2>" . $nombre ." ".$apellido."</h2>";
                if($tipo_usuario == md5('Desarrollador')){
                    echo "<p>Desarrollador</p>";
                }else if($tipo_usuario == md5('Super Admin')){
                    echo "<p>Super Admin</p>";
                }else if($tipo_usuario == md5('Admin')){
                    echo "<p>Administrador</p>";
                }
                echo "<p>" . $telefono . "</p>";
                echo "<p>" . $correo . "</p>";
                ?>
            </div>

            <div class="btnGstHeaderPerfil">
                <button class="buttonDashboard edit_info">
                    Editar Información
                </button>
                <button class="buttonDashboard" id="enviar_form">
                    Guardar Cambios
                </button>
                <button class="buttonDashboard">
                    Eliminar foto de perfil
                </button>
            </div>
        </div>
    </div>
    <div class="title_edit">
        <h3>Editar Datos</h3>
    </div>
    <div class="edit_datos">
        <form action="./componentes/administrador/admConfig.php" method="POST" id="edit_submit" enctype="multipart/form-data">
            <label for="">Nombres:</label>
            <label for="">Apellidos:</label>
            <input type="text" placeholder="Nombres" value="<?php echo $nombre ?>" id="nombres" name="nombres">
            <input type="text" placeholder="Apellidos" value="<?php echo $apellido ?>" id="apellidos" name="apellidos">
            <label for="">Ci/Rif:</label>
            <label for="">Telefono:</label>
            <input type="text" placeholder="Ci/Rif" value="<?php echo $ci_rif; ?>" id="ci" name="ci">
            <input type="text" placeholder="Telefono" value="<?php echo $telefono ?>" id="telefono" name="telefono">
            <label for="">Correo:</label>
            <label for="">Tipo Usuario:</label>
            <input type="text" placeholder="Correo" value="<?php echo $correo ?>" id="correo" name="correo">
            <?php
            if ($tipo_usuario == md5('Desarrollador')) {
                echo "<input type='text' placeholder='Desarrollador'readonly>";
            } else if ($tipo_usuario == md5('Super Admin')) {
                echo "<input type='text' placeholder='Super Admin' readonly>";
            }else if ($tipo_usuario == md5('Admin')) {
                echo "<input type='text' placeholder='Administrador' readonly>";
            }
            ?>
            <input type="hidden" name="active" id="active">
        </form>
    </div>
    <section class="accesibilidad">
    </section>
</body>

</html>