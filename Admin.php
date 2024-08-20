<?php
include("./componentes/conexiones/conexionbd.php");



$nombre; $tipo_usuaio; $correo;$apellido;

//---------------------permisos-------------------------//
/*
0-inspeccionar referencia de movimientos
1-crear usuarios
2-consultar usuarios
3-registrar usuarios
4-historial de aportesa
5-editar usuarios
6-eliminar usuarios
7-registrar aportes
8-confirmar aportes
9-registro de donaciones
10-registro de ingreso 
11-registro de egreso
12-establecer permisos
*/

if($con){
	$sql="SELECT * FROM usuario_admins";
	$resultado =mysqli_query($con, $sql);
	$i=0;
    $id_usuaio = $_COOKIE['User_ID'];
	//echo "<script> const usuario = [''];</script>";
	while($row = $resultado->fetch_assoc()){
        if($row['id_usuarios'] == $id_usuaio){
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $tipo_usuario=$row['usuario'];
            $correo = $row['correo'];
            $img_perfil=$row['img'];
            $privilegios=$row['permisos'];
        }
		$i+=1;
	}
}

session_start();
$_SESSION['permisos']=$privilegios;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style-afiliados2.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/admin.css">
    <title>SACIPS | Administración</title>
</head>

<body>

    <section class="bl-all">

        <div class="barra-lateral">
            <div class="bl-mg">
                <div class="bl-header">

                    <div class="adminHeader">
                        <?php
                        if($img_perfil !=''){
                            echo '<img src="img/Usuarios/'.$img_perfil.'" class="admHeaderImg">';
                        }else if($img_perfil == ''){
                            echo '<img src="img/UserGestion.png" class="admHeaderImg">';
                        }
                        ?>
                        
                        <div class="text">
                            <?php
                            echo "<p>".$nombre." ".$apellido."</p>";   
                            if($tipo_usuario == md5('Desarrollador')){
                                echo "<h5 class='p1'>Desarrollador</h5>";
                            }else if($tipo_usuario == md5('Super Admin')){
                                echo "<h5 class='p2'>Super Admin</h5>";
                            }else if($tipo_usuario == md5('Admin')){
                                echo "<h5 class='p2'>Administrador</h5>";
                            }
                            ?>
                        </div>
                    </div>


                </div>


                <div class="bl-body">

                    <button id="admSettings" class="b-bl"><img src="img/settings.png" class="ico-bl" alt="">
                        <p>Accesibilidad</p>
                    </button>

                    <p class="p_tittle">Gestionar</p>
                    <div class="hr">
                        <hr>
                    </div>
                    <button id="admGeneral" class="b-bl"><img src="img/dashboard.png" class="ico-bl" alt="">
                        <p>General</p>
                    </button>
                    <button id="admUsuarios" class="b-bl"><img src="img/admUsuarios.png" class="ico-bl" alt="">
                        <p>Usuarios</p>
                    </button>
                    <button id="admAportes" class="b-bl"><img src="img/admIngresos.png" class="ico-bl" alt="">
                        <p>Aportes</p>
                    </button>
                    <button id="admEgresos" class="b-bl"><img src="img/admEgresos.png" class="ico-bl" alt="">
                        <p>Egresos</p>
                    </button>
                    <button id="Programador" class="b-bl" style="display: none;"><img src="/img/mantenimiento.png"
                            class="ico-bl" alt="">
                        <p>Mantenimiento</p>
                    </button>
                </div>

                <div class="bl-footer">
                    <div class="t-footer">
                        <div class="dolar-usdc">
                            <button class="b-bl" onclick="CloseSesion();">
                                <p>Cerrar Sesión</p>
                            </button>
                        </div>

                    </div>


                </div>


            </div>
        </div>


        <!-- aquí esta el contenido completo lo que aparece en el medio, osea todo xd -->

        <div id="af-container" class="bl-container-2">


            <div class="tab-movs">

                <div class="barra-botones">
                    <p class="titulo-movs">Afiliados</p>

                    <div class="b-busqueda">
                        <select name="tipo" id="tipo">
                            <option disabled selected>Buscar por</option>
                            <option value="">Fecha</option>
                            <option value="">Telefono</option>
                            <option value="">Cedula</option>
                            <option value="">Rif</option>
                        </select>
                        <input type="text" name="buscar" placeholder="Buscar" id="buscar">

                        <img src="img/buscar.png" alt="">
                    </div>

                </div>
                <form action="">

                    <table>
                        <tr>

                            <th class="t-head">Nombre</th>
                            <th class="t-head">Cedula / Rif</th>
                            <th class="t-head">Fecha de Ingreso</th>
                            <th class="t-head">Correo</th>
                            <th class="t-head">Telefono</th>
                            <th class="t-head">Tipo</th>
                            <th class="t-head">Estatuto</th>
                            <th class="t-head">Editar</th>
                            <th class="t-head">Eliminar</th>
                        </tr>
                        <tr>
                            <td>Juan</td>
                            <td>V-00000000</td>
                            <td>00/00/0000</td>
                            <td>@ejemplo.com</td>
                            <td>(0000)-000000</td>
                            <td>Persona</td>
                            <td>Debe<br>$2.00<br>72.40bs </td>
                            <td><button>Editar</button></td>
                            <td><button>Eliminar</button></td>
                        </tr>
                        <tr>
                            <td>Britani</td>
                            <td>V-00000000</td>
                            <td>01/01/0001</td>
                            <td>@ejemplo.com</td>
                            <td>(0000)-000000</td>
                            <td>Persona</td>
                            <td>
                                <div>
                                    <p>Pagado</p>
                                </div>
                            </td>
                            <td><button>Editar</button></td>
                            <td><button>Eliminar</button></td>
                        </tr>
                        <tr>
                            <td>Rosalia</td>
                            <td>V-00000000</td>
                            <td>02/02/0002</td>
                            <td>@ejemplo.com</td>
                            <td>(0000)-000000</td>
                            <td>Persona</td>
                            <td>
                                <div>
                                    <p>Pagado</p>
                                </div>
                            </td>
                            <td><button>Editar</button></td>
                            <td><button>Eliminar</button></td>
                        </tr>
                        <tr>
                            <td>Odontologia YARACUY</td>
                            <td>J-00000000-0</td>
                            <td>02/02/0002</td>
                            <td>@ejemplo.com</td>
                            <td>(0000)-000000</td>
                            <td>Servicio Publico</td>
                            <td>
                                <div>
                                    <p>Pagado</p>
                                </div>
                            </td>
                            <td><button>Editar</button></td>
                            <td><button>Eliminar</button></td>
                        </tr>
                    </table>
                    <div class="b-Nmovs">
                        <a href="">&#60</a>
                        <p>Pag 1</p><a href="">&#62</a>
                    </div>
                </form>
            </div> <!-- aqui termina -->
        </div>
        <div class="Restriccion">
            <div>
                <h1>Alerta de Seguridad!</h1>
                <img src="img/alerta.png" alt="">
                <p>por favor inicia sesion para continuar</p>
                <a href="index.html">iniciar sessión</a>           
            </div>
        </div>
    </section>
    <script src="./js/ajax.js"></script>
</body>
</html>

<?php
if(!$_COOKIE['User_ID']){
    ?>
        <style>
            .Restriccion{display: flex;}
        </style>
    <?php
}
?>