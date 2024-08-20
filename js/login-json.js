var password_insana = '';
var fecha = new Date();
var contraseña = 'Admin123';
//tomar el dia
var dia = fecha.getDate();
//tomar año
var year = fecha.getFullYear();
//tomar mes
var mes = fecha.getMonth() + 1;
//tomar la hora
var hora = fecha.getHours();

var password_insana ='123'; // dia + 'Hola Mundo' + (year - mes * hora);

//password maestrosa creada 😈😈😈

const boton = document.getElementById('boton');

function click_boton(event) {
	event.preventDefault();

	const input_nombre = document.getElementById('nombre').value;
	const input_contraseña = document.getElementById('password').value;

	if (input_nombre == '') {
		document.getElementById('nombre').focus();
	
	} else if (input_contraseña == '') {
		document.getElementById('password').focus();
	
	}
	let j=0;
	for(let i=0; i < usuario.length; i++){
		if(input_nombre != '' && input_contraseña != ''){
			console.log(input_nombre, usuario[i]);
			if(input_nombre == usuario[i]){
				i = usuario.length;
				if(input_contraseña == password_insana && clave[j]=='nulo'){
					console.log('valor i:'+ j);
					document.getElementById('id_usuario').value = id_usuario[j];
					document.cookie = "User_ID=" +id_usuario[j];
					document.getElementById('aviso').textContent = '';
					document.getElementById('formAdmin').action = "Admin.php";
					document.getElementById('formAdmin').submit();
					console.log('desarrollador user');
				}else if(input_contraseña == clave[j]){
					console.log('valor i:'+ j);
					document.getElementById('id_usuario').value = id_usuario[j];
					document.cookie = "User_ID=" +id_usuario[j];
					document.getElementById('aviso').textContent = '';
					document.getElementById('formAdmin').action = "Admin.php";
					document.getElementById('formAdmin').submit();
					console.log('admin user');
				}else{
					document.getElementById('aviso').textContent= 'Contraseña Incorrecta';
				}
			}else{
				document.getElementById('aviso').textContent = 'Usuaio no Registrado';
			}
		}
		j+=1;
	}
}
/*if (input_nombre != '' && input_contraseña != '') {
		if (input_nombre != nombre_afiliado && input_nombre != nombre_usuario && input_nombre != Super_Mega_Recontra_Usuario && input_nombre != "") {
			const alerta_nombre = document.getElementById('aviso-2');
			document.getElementById('nombre').focus();
			alerta_nombre.style.display = 'block';
			document.getElementById('aviso-1').style.display = 'none';
		} else if (input_nombre == nombre_afiliado) {
			if (input_contraseña == password_af) {
				sessionStorage.setItem('Programador', 'Yes');
				window.location.href = "./afiliados.html";
			} else if (input_contraseña != password_af) {
				const alerta_contraseña = document.getElementById('aviso-1');
				alerta_contraseña.style.display = 'block';
				document.getElementById('aviso-2').style.display = 'none';
				document.getElementById('password').focus();
			}
		} else if (input_nombre == nombre_usuario) {
			if (input_contraseña == contraseña) {
				sessionStorage.setItem('Programador', 'nope');
				window.location.href = "./Admin.html";
			} else if (input_contraseña != contraseña) {
				const alerta_contraseña = document.getElementById('aviso-1');
				alerta_contraseña.style.display = 'block';
				document.getElementById('aviso-2').style.display = 'none';
				document.getElementById('password').focus();
			}
		} else if (input_nombre == Super_Mega_Recontra_Usuario) {
			if (input_contraseña == password_insana) {
				sessionStorage.setItem('Programador', 'Yes');
				window.location.href = "./Admin.html";
			} else if (input_contraseña != password_insana) {
				const alerta_contraseña = document.getElementById('aviso-1');
				alerta_contraseña.style.display = 'block';
				document.getElementById('aviso-2').style.display = 'none';
				document.getElementById('password').focus();
			}
		}
	}
*/