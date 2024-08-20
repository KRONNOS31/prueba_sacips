<?php

include('./componentes/conexiones/conexionbd.php');

if ($con) {
	$sql = "SELECT * FROM usuario_admins";
	$resultado = mysqli_query($con, $sql);
	$i = 0;
	echo "<script> const usuario = ['']; const id_usuario = ['']; const clave = [''];let pass ='';</script>";
	while ($row = $resultado->fetch_assoc()) {
		echo  "<script>usuario[" . $i . "]='" . $row['nombre'] . "';</script>";
		echo  "<script>id_usuario[" . $i . "]='" . $row['id_usuarios'] . "';</script>";
		if ($row['clave'] == '') {
			echo "<script>clave[" . $i . "]='nulo';</script>";
			echo '<script>console.log("furulaaaaa")</script>';
		} else {
			echo "<script>clave[" . $i . "]='" . $row['clave'] . "';</script>";
		}
		$i += 1;
	}
	echo "<script>console.log('Id:'+id_usuario[0]+clave[0]);</script>";
	echo "<script>console.log('Id:'+id_usuario[1]+clave[1]);</script>";
	//echo "<script>console.log('clave:'+clave_usuario[1]);</script>";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SACIPS | Ingresar - Afiliado</title>
	<link rel="stylesheet" href="style/login-style.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
	<div class="f-bg"></div>
	<div class="formularioAdmin">
		<div class="moverAdmin">
			<form class="formAdmin" method="post" action="Admin.php" id="formAdmin">
				<div>
					<div class="acceder">
						<div class="im-logo">
							<img draggable="false" src="img/IPSPUPTYAB-LOGO.ico" alt="">
							<P draggable="false">Instituto de Prevision social</P>
						</div>
						<h1 draggable="false" class="ac">Personal Administrativo</h1>
					</div>
					<div class="mov-inputs">
						<div class="input"><img draggable="false" src="img/456212.png" alt="">
							<input type="text" placeholder="Ingrese el nombre de Usuario" id="nombre" required>
						</div>
						<div class="input"><img draggable="false" src="img/password.png" alt="">
							<input type="password" placeholder="Ingrese la Clave" id="password" required>
						</div>
						<p id="aviso"></p>
						<input type="hidden" id="id_usuario" name="id_usuario" value="">
						<a href="">Olvido su clave?</a>
					</div>
					<button onclick="click_boton(event)" id="boton" aria-hidden="true">Ingresar</button>
				</div>

			</form>

			<a href="index.html" class="volver">
				<img src="img/home.png">
				<p>Volver a Inicio</p>
			</a>
		</div>
	</div>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
	<script>
		// Importa la función MD5 de la biblioteca
		import MD5 from "crypto-js/md5";

		// Calcula el hash MD5
		const clave = "12345";
		const hashMD5 = MD5(clave).toString();

		console.log(hashMD5);
	</script>-->
	<script src="./js/login-json.js"></script>
</body>

</html>