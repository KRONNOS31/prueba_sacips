<?php
include("../../componentes/conexiones/conexionbd.php");

if ($con) {
    $sql = "SELECT * FROM usuario_admins";
    $resultado = mysqli_query($con, $sql);
}

session_start();
$permisos = $_SESSION['permisos'];
//variables
$id_user_edit = array();
$i = 0;
$permisos_user_edit = array();

if(isset($_POST['editar_permisos'])){
    $nuevos_permisos = $_POST['editar_permisos'];
    $id_edit_user = $_POST['id_del_usuario'];

    $sql = "UPDATE usuario_admins SET permisos='$nuevos_permisos' WHERE id_usuarios='$id_edit_user' ";
    if (mysqli_query($con, $sql)) {
        echo '<script>window.location.href = "../../Admin.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/admDashboard.css">

</head>

<body>
    <section class="admModerador">
        <div class="overflow">
            <div class="admModShape">

                <?php
                while ($row = $resultado->fetch_assoc()) {

                    if ($permisos[12] == 1) {
                        $id_user_edit[$i] = $row['id_usuarios'];
                        $permisos_user_edit[$i] = $row['permisos'];
                    }else{
                        $id_user_edit[$i] = null;
                        $permisos_user_edit[$i] = null;
                    }

                    echo    '<div class="admModPerfil" id="usuario_' . $id_user_edit[$i] . '">
                            <div class="textModProfile">';
                    if ($row['img'] == '') {
                        echo '<img src="img/UserGestion.png" alt="" class="iconModUser">';
                    } else {
                        echo '<img src="img/Usuarios/' . $row['img'] . '" alt="" class="iconModUser">';
                    }
                    echo '   <div class="textMod">
                                    <h2>' . $row['nombre'] . ' ' . $row['apellido'] . '</h2>
                                    <div class="hrMod">
                                        <hr>
                                    </div>';
                    if ($row['usuario'] == md5('Desarrollador')) {
                        echo '<p class="pMod">Desarrollador</p>';
                    } else if ($row['usuario'] == md5('Super Admin')) {
                        echo '<p class="pMod">Super Admin</p>';
                    } else if ($row['usuario'] == md5('Admin')) {
                        echo '<p class="pMod">Administrador</p>';
                    }
                    echo '   <input type="hidden" id="permisos_user" value="' . $permisos_user_edit[$i] . '">';
                    echo '   <p id="telefono_usuario">' . $row['telefono'] . '</p>
                                    <p><span id="correo_usuario">' . $row['correo'] . '</span></p>
                                </div>
                            </div>';
                    if ($permisos[12] == 1) {
                        echo '   <div class="ModPerfilButtons">
                                        <button onclick="administrar_permisos(' . $id_user_edit[$i] . ')">
                                            Modificar Permisos
                                        </button>
                                    </div>';
                    } else if ($permisos[12] == 0) {
                        echo '';
                    }

                    echo    '</div>';
                    $i += 1;
                }

                ?>
            </div> <!-- FIN DE amdModShape -->
        </div>

    </section> <!-- //////// FIN DE LA GESTION DE MODERADORES ////////// -->

    <?php if($permisos[12] == 1){ echo'
    <section class="ModerarPrioridad">

        <h3>Administrar Permisos</h3>

        <form class="modPrioridadShape" id="editar_permisos_de_usuario" method="POST" action="./componentes/administrador/admModeradores.php">

            <div class="infoOpcionPrioridad">
                <img src="img/UserGestion.png" alt="" class="iconModPrioridad">

                <div class="infoTexto">
                    <h3 id="nombre_user_edit">Nombre de Usuario</h3>
                    <p id="tipo_user_edit">Tipo de Usuario</p>
                    <p id="tlf_user_edit">(0000)-000-0000</p>
                    <p><span id="email_user_edit">correo_electronico@gmail.com</span></p>
                    <div class="infoModer">
                    </div>
                </div>
            </div>


            <div class="opcionPrioridad">
                <input type="checkbox" id="op-0" name="op-0" value="1">
                <input type="checkbox" id="op-1" name="op-1" value="1">
                <input type="checkbox" id="op-2" name="op-2" value="1">
                <input type="checkbox" id="op-3" name="op-3" value="1">
                <input type="checkbox" id="op-4" name="op-4" value="1">
                <input type="checkbox" id="op-5" name="op-5" value="1">
                <input type="checkbox" id="op-6" name="op-6" value="1">
                <input type="checkbox" id="op-7" name="op-7" value="1">
                <input type="checkbox" id="op-8" name="op-8" value="1">
                <input type="checkbox" id="op-9" name="op-9" value="1">
                <input type="checkbox" id="op-10" name="op-10" value="1">
                <input type="checkbox" id="op-11" name="op-11" value="1">
                <input type="checkbox" id="op-12" name="op-12" value="1">
                <input type="hidden" id="id_del_usuario" name="id_del_usuario">
                <input type="hidden" id="editar_permisos" name="editar_permisos">

                <div class="op_container"><p>Referencia de Movimientos</p><label for="op-1" class="checkbox_op" onclick="check_on(1)"><div></div></label></div>
                <div class="op_container"><p>Crear usuarios</p><label for="op-0" class="checkbox_op" onclick="check_on(0)"><div></div></label></div>
                <div class="op_container"><p>Consultar usuarios</p><label for="op-2" class="checkbox_op" onclick="check_on(2)"><div></div></label></div>
                <div class="op_container"><p>Registrar usuarios</p><label for="op-3" class="checkbox_op" onclick="check_on(3)"><div></div></label></div>
                <div class="op_container"><p>Historial de aportes</p><label for="op-4" class="checkbox_op" onclick="check_on(4)"><div></div></label></div>
                <div class="op_container"><p>Editar usuarios</p><label for="op-5" class="checkbox_op" onclick="check_on(5)"><div></div></label></div>
                <div class="op_container"><p>Eliminar usuarios</p><label for="op-6" class="checkbox_op" onclick="check_on(6)"><div></div></label></div>
                <div class="op_container"><p>Registrar aportes</p><label for="op-7" class="checkbox_op" onclick="check_on(7)"><div></div></label></div>
                <div class="op_container"><p>Confirmar aportes</p><label for="op-8" class="checkbox_op" onclick="check_on(8)"><div></div></label></div>
                <div class="op_container"><p>Registro de donaciones</p><label for="op-9" class="checkbox_op" onclick="check_on(9)"><div></div></label></div>
                <div class="op_container"><p>Registro de ingreso </p><label for="op-10" class="checkbox_op" onclick="check_on(10)"><div></div></label></div>
                <div class="op_container"><p>Registro de egreso</p><label for="op-11" class="checkbox_op" onclick="check_on(11)"><div></div></label></div>
                <div class="op_container"><p>Establecer permisos</p><label for="op-12" class="checkbox_op" onclick="check_on(12)"><div></div></label></div>
            </div>
        </form>
        
        <div class="contenedor_botones"><div id="boton_eviar" onclick="enviar_form_opction();">Guardar Cambios</div>
        <button class="deletePrioridad">Revocar los privilegios de Administrador</button></div>
    </section>';}else{
        echo '';
    }
    ?>
    
</body>

</html>