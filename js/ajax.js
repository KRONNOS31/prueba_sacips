/* ESTA ES UNA ALERTA QUE SALE CUANDO RECARGAN TODAS LAS PAGINAS
window.addEventListener('beforeunload', function (e) {
  e.preventDefault();
  e.returnValue = '';

  // Mensaje de confirmación personalizado
  var message = "¿Seguro que desea salir de 'nombre de la página'?";
  e.returnValue = message;
  return message;
});*/
// FINNNNN //


/// ----- COMIENZO DE LA FUNCION AJAX ---- ///

function ajax(page, extension = "php") {
  const http = new XMLHttpRequest();
  const url = `${page}.${extension}`;

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("af-container").innerHTML = this.responseText;


      
      // ---- GILBER PARTE DE USUARIOS EN ADMINISTRADOR EDITAR LOS DATOS DE USUARIO EN admCONFIG ---- //
      const boton_submit = document.getElementById('enviar_form');
      const form_edit = document.getElementById('edit_submit');
      boton_submit.addEventListener('click', (event) => {
        form_edit.submit();
      });
      console.log('T-T');
      form = document.getElementById('form');
      const InputImage = document.getElementById('imagen_perfil');
      InputImage.addEventListener('change', () => {
        // Envía automáticamente el formulario cuando se selecciona un archivo
        if (InputImage.files.length > 0) {
          console.log('jodaaaaaa');
          form.submit();
        } else {
          console.log('no seleccionado');
        }
      });
      //aki termina mi code 🚴‍♂️

      // -----AQUI ESTOY HACIENDO QUE LA IMAGEN PUEDA SER PREVISUALIZADA EN EL APARTADO DE AFILIADOS----//

      // En algún lugar al principio del archivo
      // Función para la previsualización de la imagen en afiliadosAportes.php
      // Función para la previsualización de la imagen en afiliadosAportes.php
      // Más adelante en el archivo (donde manejas la edición de datos del usuario)
      // Función para la previsualización de la imagen


      function handleImagePreview() {
        const inputImagen = document.getElementById("imagen");
        const imagenPrevia = document.getElementById("imagenPrevia");

        inputImagen.addEventListener("change", function (event) {
          const archivo = event.target.files[0];
          if (archivo) {
            const urlImagen = URL.createObjectURL(archivo);
            imagenPrevia.src = urlImagen;
            imagenPrevia.style.display = "block"; // Mostrar la previsualización
          }
        });
      }

      // Función para el envío del formulario
      function handleFormSubmission() {
        const form = document.getElementById('form');
        const InputImage = document.getElementById('imagen_perfil');

        InputImage.addEventListener('change', () => {
          // Envía automáticamente el formulario cuando se selecciona un archivo
          if (InputImage.files.length > 0) {
            form.submit();
          }
        });
      }

      // Verificación de la página actual
      if (document.getElementById("imagen")) {
        handleImagePreview(); // Estamos en afiliadosAportes.php
      }

      if (document.getElementById("imagen_perfil")) {
        handleFormSubmission(); // Estamos en admConfig.php
      }




      // --- FIN CODIGO DE USUARIO ADMCONFIG GILBER ----- //




      // Obtiene el elemento del cuerpo de la tabla
      const tableBody = document.getElementById("tableBody");

      // Limpia las filas de la tabla existentes
      tableBody.innerHTML = "";

      // Crea nuevas filas de la tabla a partir de los datos recibidos
      data.forEach(row => {
        const tableRow = document.createElement("tr");
        tableRow.innerHTML = `
          <td>${row.tipo_aporte}</td>
          <td>${row.monto}</td>
          <td>${row.fechaAporte}</td>
          <td>${row.referencia}</td>
          <td>${row.referencia}</td>
          <td><button>Mostrar</button></td>
          <td><button>MRecibo</button></td>
        `;
        tableBody.appendChild(tableRow);
      });



      /// EVENTO PARA EL CONSEJOSELECT DE AFILIADOS ///

      //GABRIEL PARTE DE EGRESOS CON LOS BANCOS

     /// GILBER JS PERFIL
     
      miSelect = document.getElementById('banco');
      miSelect.addEventListener('change', function () {
        value = miSelect.value;
        separacion = value.split(' ');
        primera_parte = separacion[0];
        document.getElementById('codigo_banco').textContent = primera_parte + ' -';
      });



    }
  };
  http.open("get", url);
  http.send();


}  //---- AQUI ACABA LA FUNCION AJAX PARA QUE SIRVA ----- //

let id_usuario_edit = 0;
let permisos_user;
//--------MUESTRA LOS DATOS DEL USUARIO SELECCIONADO PARA EDITAR SUS PERMISOS----------//
function administrar_permisos(id_usuario_edit) {
  //tomar datos------//
  imgagen_user = document.querySelector('#usuario_' + id_usuario_edit + ' img').src;
  nombre_user = document.querySelector('#usuario_' + id_usuario_edit + ' .textMod h2').textContent;
  tipo_user = document.querySelector('#usuario_' + id_usuario_edit + ' .textMod .pMod').textContent;
  permisos_user = document.querySelector('#usuario_' + id_usuario_edit + ' .textMod #permisos_user').value;
  tlf_user = document.querySelector('#usuario_' + id_usuario_edit + ' .textMod #telefono_usuario').textContent;
  email_user = document.querySelector('#usuario_' + id_usuario_edit + ' .textMod #correo_usuario').textContent;
  document.getElementById('id_del_usuario').value = id_usuario_edit;

  //Mostrar los datos--------//
  document.querySelector('.infoOpcionPrioridad img').src = imgagen_user;
  document.querySelector('.infoTexto #nombre_user_edit').textContent = nombre_user;
  document.querySelector('.infoTexto #tipo_user_edit').textContent = tipo_user;
  document.querySelector('.infoTexto #tlf_user_edit').textContent = tlf_user;
  document.querySelector('.infoTexto #email_user_edit').textContent = email_user;

  for (j = 0; j < permisos_user.length; j++) {
    if (permisos_user[j] == '1') {
      document.getElementById('op-' + j).checked = true;
    } else if (permisos_user[j] == '0') {
      document.getElementById('op-' + j).checked = false;
    }
  }
  k=0;
  checkboxes=document.querySelectorAll('.op_container');
  checkboxes.forEach(function(chekbox){
    chekbox.style.display = 'flex';
  });
  checkboxes2=document.querySelectorAll('input[type="checkbox"]'); 
  checkboxes2.forEach(function(chekbox2){
    
    if(chekbox2.checked == true){
      document.querySelector('.checkbox_op[for="op-'+k+'"]').style.background = '#5452ff';
      document.querySelector('.checkbox_op[for="op-'+k+'"] div').style.transform= 'translateX(25px)';
    }else if(chekbox2.checked == false){
      document.querySelector('.checkbox_op[for="op-'+k+'"]').style.background = '#a0a0a0';
      document.querySelector('.checkbox_op[for="op-'+k+'"] div').style.transform= 'translateX(5px)';
    }
    k+=1;
  });
}
let numero_check=0;

function check_on(numero_check){
  checkboxes3 = document.querySelector('input[id="op-'+numero_check+'"]');
  if(checkboxes3.checked == false){
    document.querySelector('.checkbox_op[for="op-'+numero_check+'"]').style.background = '#5452ff';
    document.querySelector('.checkbox_op[for="op-'+numero_check+'"] div').style.transform= 'translateX(25px)';
  }if(checkboxes3.checked == true){
    document.querySelector('.checkbox_op[for="op-'+numero_check+'"]').style.background = '#a0a0a0';
    document.querySelector('.checkbox_op[for="op-'+numero_check+'"] div').style.transform= 'translateX(5px)';
  }
}

//------GUARDA LOS PERMISOS Y ENVIA EL FORMULARIO-----------//

function enviar_form_opction() {

  let nuevos_permisos = '';
  for (j = 0; j < 13; j++) {
    option_select = document.getElementById('op-' + j).checked;
    if (option_select == true) {
      nuevos_permisos = nuevos_permisos + '1';
    } else if (option_select == false) {
      nuevos_permisos = nuevos_permisos + '0';
    }
  }
  console.log(nuevos_permisos);
  document.getElementById('editar_permisos').value = nuevos_permisos;
  document.getElementById('editar_permisos_de_usuario').submit();
}

//----fin de mis funciones------//

function addEventListenerIfElementExists(elementId, event, action) {
  let element = document.getElementById(elementId);
  if (element) {
    element.addEventListener(event, action);
  }
}

function setFocusAndLoad(idButton, page) {
  const button = document.getElementById(idButton);
  if (button) {
    button.focus();
    ajax(page);
    button.classList.add("activo");
  }
}


/// -- AQUI ESTOY LLAMANDO A LAS OTRAS PESTA;AS QUE ESTAN ENLAZADAS CON LOS BOTONES DE LA BARRA LATERAL, USANDO EL AJAX --///

addEventListenerIfElementExists("aAportar", "click", function () {
  ajax("./componentes/afiliados/afiliadosAporte");
});

addEventListenerIfElementExists("aMovimientos", "click", function () {
  ajax("./componentes/afiliados/afiliadosMovs");
});


addEventListenerIfElementExists("inAportar", "click", function () {
  ajax("./componentes/invitados/invitadosAporte");
});

addEventListenerIfElementExists("inMovimientos", "click", function () {
  ajax("./componentes/invitados/invitadosMovs");
});



addEventListenerIfElementExists("aPerfil", "click", function () {
  ajax("./componentes/afiliados/afiliadosPerfil");
});

addEventListenerIfElementExists("admUsuarios", "click", function () {
  ajax("./componentes/administrador/admUsuarios");
});
addEventListenerIfElementExists("admAportes", "click", function () {
  ajax("./componentes/administrador/admAportes");
});
addEventListenerIfElementExists("admEgresos", "click", function () {
  ajax("./componentes/administrador/admEgresos");
});

addEventListenerIfElementExists("admGeneral", "click", function () {
  ajax("./componentes/administrador/admDashboard");
});

addEventListenerIfElementExists("admSettings", "click", function () {
  ajax("./componentes/administrador/admConfig");
});

///---- AQUI MAS QUE TODO LLAMO A LOS BOTONES DENTRO DE LAS PESTA;AS -----///
document.addEventListener("DOMContentLoaded", function () {
  const admGeneralBtn = document.getElementById("admGeneral");
  admGeneralBtn.classList.add("activo");
  ajax("./componentes/administrador/admDashboard");
});

document.addEventListener("DOMContentLoaded", function () {
  const admGeneralBtn = document.getElementById("admVigilanciaGeneral");
  admGeneralBtn.classList.add("activo");
  ajax("./componentes/cnjVigilancia/cnjVigilanciaDashboard");
});

document.addEventListener("DOMContentLoaded", function () {
  const admGeneralBtn = document.getElementById("aMovimientos");
  admGeneralBtn.classList.add("activo");
});
document.addEventListener("DOMContentLoaded", function () {
  const admGeneralBtn = document.getElementById("inMovimientos");
  admGeneralBtn.classList.add("activo");
});





/*document.body.addEventListener("click", function (event) {
  if (event.target.id === "admVerification") {
    ajax("./recibo-donacion");
  }
});*/

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admGstAfiliados") {
    ajax("./componentes/administrador/aAfiliados");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admGstInvitados") {
    ajax("./componentes/administrador/admInvitados");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admGstInvitados") {
    ajax("./componentes/administrador/admInvitados");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admConAportesPatronales") {
    ajax("./componentes/administrador/repAportesPatronales");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admConDonaciones") {
    ajax("./componentes/administrador/repDonaciones");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "open-form-btn") {
    ajax("./componentes/administrador/recibo");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admReportEgresos") {
    ajax("./componentes/administrador/repEgreso");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admGstEgresos") {
    ajax("./componentes/administrador/repEgresoConsulta");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admGstUsuarios") {
    ajax("./componentes/administrador/admGstionUsuarios");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admSettings") {
    ajax("./componentes/administrador/admConfig");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "volverEgresos") {
    ajax("./componentes/administrador/admEgresos");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "btnGstUsuarios") {
    ajax("./componentes/administrador/admGstionUsuarios");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admVigilanciaGeneral") {
    ajax("./componentes/cnjVigilancia/cnjVigilanciaDashboard");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admVigilanciaGeneral") {
    ajax("./componentes/cnjVigilancia/cnjVigilanciaDashboard");
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "volverAprobarRecibo") {
    ajax("./componentes/administrador/admAportesConsulta");
    event.preventDefault();
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admConAportes") {
    ajax("./componentes/administrador/admAportesConsulta");
    event.preventDefault();
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "aprobar") {
    ajax("./componentes/administrador/aprobarRecibo");
    event.preventDefault();
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "volverAportes") {
    ajax("./componentes/administrador/admAportes");
    event.preventDefault();
  }
});

let botones = [

  document.getElementById("aMovimientos"),
  document.getElementById("inMovimientos"),
  document.getElementById("inAportar"),
  document.getElementById("aPerfil"),
  document.getElementById("admConDonaciones"),
  document.getElementById("admAportes"),
  document.getElementById("admUsuarios"),
  document.getElementById("admGeneral"),
  document.getElementById("admPerfil"),
  document.getElementById("admSettings"),
  document.getElementById("admVigilanciaGeneral"),
  document.getElementById("admEgresos"),
];

botones = botones.filter(function (boton) {
  return boton !== null;
});

botones.forEach(function (boton) {
  boton.addEventListener("click", function (event) {
    botones.forEach(function (btn) {
      btn.classList.remove("activo");
    });

    this.classList.add("activo");

    localStorage.setItem("activeButton", this.id);
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const activeButtonId = localStorage.getItem("activeButton");
  if (activeButtonId) {
    const activeButton = document.getElementById(activeButtonId);
    if (activeButton) {
      activeButton.click();
    }
  }
});

document.body.addEventListener("click", function (event) {
  if (event.target.id === "btnFormulario") {
    event.preventDefault(); // Evita el envío predeterminado del formulario
    // Llama a una función para manejar el envío del formulario usando AJAX o envío regular
    handleFormSubmission();
  }
});



// formatear monto EN LOS FORMULARIOS //

function formatearMonto() {
  const input = document.getElementById("montoInput");
  const valor = input.value.replace(/\D/g, "");
  const montoFormateado = formatearNumero(valor);
  input.value = montoFormateado || "";
}

function formatearNumero(numero) {
  const valorDecimal = parseFloat(numero) / 100;
  return isNaN(valorDecimal)
    ? ""
    : valorDecimal.toLocaleString("es-VE", {
      style: "currency",
      currency: "VES",
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
}










/// esta funcion si que me dio dolor de cabeza entenderla porque me costo hacer para que redireccione
// de nuevo en la pagina anterior, me costo entenderle  att: Kevin
// lo que hace esta funcion es que A la hora de que se le da click al boton de verificar aporte
// y luego se le de aprobar, cargue la ventana anterior o cualquier ventana que yo ponga en el link
//voy a dejarlo comentado por si acaso.


/// ADMINISTRAR LA VERIFICACION DE PAGOS EN AMDAPORTES

function verificarAporte(id, tipo) {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', './componentes/administrador/reciboDonacion.php?id=' + id + '&tipo=' + tipo, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById('af-container').innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}


function actualizarEstado(accion) {
  let form = document.getElementById('reciboForm');
  let formData = new FormData(form);
  formData.append('accion', accion);

  let xhr = new XMLHttpRequest();
  xhr.open('POST', './componentes/administrador/actualizarEstado.php', true);
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          alert(xhr.responseText);
          // Redirigir al contenedor af-container
          cargarAportesMovs();
      }
  };
  xhr.send(formData);
}


function cargarAportesMovs() {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', './componentes/administrador/admAportesConsulta.php', true);
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('af-container').innerHTML = xhr.responseText;
      }
  };
  xhr.send();
}

//FIN //////////////////////////////////////////////////////////////////////////////////////////////////

function ajax2(page, extension = "php") {
  const http = new XMLHttpRequest();
  const url = `${page}.${extension}`;

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("gstionBody").innerHTML = this.responseText;
    }
  };
  http.open("get", url);
  http.send();
}

document.body.addEventListener("click", function (event) {
  if (event.target.id === "gstModeradores") {
    ajax2("./componentes/administrador/admModeradores");
  }
});








//-------cerrar sesion COOKIES DE GILBER ---------//

function CloseSesion() {
  document.cookie = "User_ID =; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/SACIPS";
  document.cookie = "PHPSESSID =; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
  alert('baybay'); window.location.href = 'index.html';
}



//// APROBAR APORTES////

document.body.addEventListener("click", function (event) {
  if (event.target.id === "admVerification") {
    //ajax("./componentes/administrador/aprobarRecibo");
    event.preventDefault();
  }
});

//-------/Enviar la cookie/----------//
let validar_aporte;
function select_boton(validar_aporte) {
  document.cookie = "id_aporte_recibo=" + validar_aporte;
  ajax("./componentes/administrador/aprobarRecibo");
}

document.body.addEventListener("click", function (event) {
  if (event.target.id === "regresar") {
    ajax("./componentes/administrador/aprobarRecibo");
    event.preventDefault();
  }
});





document.body.addEventListener("click", function (event) {
  if (event.target.id === "aSubmit") {
    event.preventDefault(); // Evita el envío predeterminado del formulario
    handleFormSubmission();
  }
});
function validateForm() {
  const telefonoValue = document.querySelector('input[name="telefono"]').value;
  const cedulaValue = document.getElementById("cedula").value;

  if (telefonoValue.trim() === "") {
    alert("Por favor, completa todos los campos antes de continuar.");
    return false; // No permite enviar el formulario
  } if (cedulaValue.trim() === "") {
    alert("Por favor, completa el campo de cédula.");
    return false; // No permite enviar el formulario
  }

  return true; // Si todo está bien, permite enviar el formulario
}







// / -------- VALIDACION PARA ENVIARO EL FORMULARIO DE APORTE EN AFILIADO -------///

function validateForm() {

  const selectValue = document.getElementById("banco").value;
  const telefonoValue = document.querySelector('input[name="telefono"]').value;
  const cedulaValue = document.getElementById("cedula").value;
  const fileInput = document.getElementById("imagen");
  const refeValue = document.querySelector('input[name="referencia"]').value;
  const montoValue = document.querySelector('input[name="monto"]').value;

  if (selectValue === "") {
    alert("Por favor, selecciona un banco antes de continuar.");
    return false; // No permite enviar el formulario
  }


  if (telefonoValue.trim() === "") {
    alert("Por favor, complete el campo Teléfono.");
    return false; // No permite enviar el formulario
  }

  if (cedulaValue.trim() === "") {
    alert("Por favor, completa el campo Cédula.");
    return false; // No permite enviar el formulario
  }




  if (refeValue.trim() === "") {
    alert("Por favor, complete el campo Referencia.");
    return false; // No permite enviar el formulario
  }

  if (montoValue.trim() === "") {
    alert("Por favor, complete el campo Monto.");
    return false; // No permite enviar el formulario
  }

  if (fileInput.files.length === 0) {
    alert("Por favor, selecciona un archivo antes de continuar.");
    return false; // No permite enviar el formulario
  }

  return true; // Si todo está bien permite enviar el formulario
}


function handleFormSubmission() {
  const submitButton = document.getElementById("aSubmit");

  if (validateForm()) {
    // Desactiva el botón de envío para evitar clics duplicados
    submitButton.disabled = true;

    const form = document.getElementById("formularioAfiliados");
    const formData = new FormData(form);

    fetch("./componentes/afiliados/procesarPago.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        // Actualiza el contenido en "af-container" con reciboPago.php
        fetch("./componentes/afiliados/reciboPago.php?data=" + JSON.stringify(data))
          .then((response) => response.text())
          .then((html) => {
            document.getElementById("af-container").innerHTML = html;
          });
      })
      .catch((error) => console.error("Error al procesar el formulario", error))
      .finally(() => {
        // Reactiva el botón de envío después de procesar la solicitud
        submitButton.disabled = false;
      });
  }
}
// FIN ENVIAR FORMULARIO//




document.body.addEventListener("click", function (event) {
  if (event.target.id === "btnFormulario") {
    event.preventDefault(); // Prevent default form submission

    // Send form data using AJAX
    ajax("./componentes/afiliados/procesarPago.php");
  }
});
// APORTAR AFILIADOS//

function mostrarVentana(ventanaId) {
  // Ocultar todas las ventanas emergentes
  document.querySelectorAll(".validacion > div").forEach((ventana) => {
    ventana.style.display = "none";
    event.preventDefault();

  });

  // Mostrar la ventana emergente seleccionada
  document.getElementById(ventanaId).style.display = "block";
}



document.body.addEventListener("click", function (event) {
  if (event.target.id === "btnVolverRecibo") {
    ajax("./componentes/afiliados/afiliadosMovs");
    event.preventDefault();
  }
});


///// MANDAR LOS DATOS DE AFILIADOS ////

document.body.addEventListener("click", function (event) {
  if (event.target.classList.contains("mandarGet")) {
    let tipo_aporte = event.target.getAttribute("data-tipo_aporte");
    let tipo_nombre = event.target.getAttribute("data-tipo_nombre");
    let tipo_apellido = event.target.getAttribute("data-tipo_apellido");
    let tipo_cedula = event.target.getAttribute("data-tipo_cedula");
    let tipo_banco = event.target.getAttribute("data-tipo_banco");
    let tipo_telefono = event.target.getAttribute("data-tipo_telefono");
    let monto = event.target.getAttribute("data-monto");
    let fechaAporte = event.target.getAttribute("data-fechaAporte");
    let referencia = event.target.getAttribute("data-referencia");
    let concepto = event.target.getAttribute("data-concepto");
    let estado = event.target.getAttribute("data-estado");

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./componentes/afiliados/reciboPagoMostrar.php?tipo_aporte=" + encodeURIComponent(tipo_aporte) + 
             "&tipo_nombre=" + encodeURIComponent(tipo_nombre) + 
             "&tipo_apellido=" + encodeURIComponent(tipo_apellido) + 
             "&tipo_cedula=" + encodeURIComponent(tipo_cedula) + 
             "&tipo_banco=" + encodeURIComponent(tipo_banco) + 
             "&tipo_telefono=" + encodeURIComponent(tipo_telefono) + 
             "&monto=" + encodeURIComponent(monto) + 
             "&fechaAporte=" + encodeURIComponent(fechaAporte) + 
             "&referencia=" + encodeURIComponent(referencia) + 
             "&concepto=" + encodeURIComponent(concepto) + 
             "&estado=" + encodeURIComponent(estado), true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualizar una parte específica de la página con la respuesta del servidor
        document.getElementById("af-container").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
    event.preventDefault();
  }
});

