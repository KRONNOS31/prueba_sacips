
// REGISTRO DE INVITADOS///

const tipoRegistroSelect = document.getElementById('tipoRegistro');
const formularioPersona = document.getElementById('formularioPersona');
const formularioServicio = document.getElementById('formularioServicio');

const correoPersonaInput = document.getElementById('correoPersona');
const correoServicioInput = document.getElementById('correoServicio');
const errorCorreoPersona = document.getElementById('errorCorreoPersona');
const errorCorreoServicio = document.getElementById('errorCorreoServicio');

const contrasenaPersonaInput = document.getElementById('contrasenaPersona');
const contrasenaServicioInput = document.getElementById('contrasenaServicio');
const errorContrasenaPersonaEspecial = document.getElementById('errorContrasenaPersonaEspecial');
const errorContrasenaPersonaMayuscula = document.getElementById('errorContrasenaPersonaMayuscula');
const errorContrasenaPersonaNumero = document.getElementById('errorContrasenaPersonaNumero');
const errorContrasenaServicioEspecial = document.getElementById('errorContrasenaServicioEspecial');
const errorContrasenaServicioMayuscula = document.getElementById('errorContrasenaServicioMayuscula');
const errorContrasenaServicioNumero = document.getElementById('errorContrasenaServicioNumero');

const confirmarContrasenaPersonaInput = document.getElementById('confirmarContrasenaPersona');
const confirmarContrasenaServicioInput = document.getElementById('confirmarContrasenaServicio');
const errorContrasenaPersonaNoCoinciden = document.getElementById('errorContrasenaPersonaNoCoinciden');
const errorContrasenaServicioNoCoinciden = document.getElementById('errorContrasenaServicioNoCoinciden');

const rifServicioInput = document.getElementById('rifServicio');
const errorRifServicio = document.getElementById('errorRifServicio');

const cedulaPersonaInput = document.getElementById('documentoPersona');
const errorCedulaPersona = document.getElementById('errorCedulaPersona');

cedulaPersonaInput.addEventListener('input', () => {
    const cedulaValida = validarCedula(cedulaPersonaInput.value);
    errorCedulaPersona.style.display = cedulaValida ? 'none' : 'block';
});

function validarCedula(cedula) {
    if (cedula.startsWith('V-')) {
        // Solo números después de 'C-'
        const numerosCedula = cedula.slice(2);
        const numerosValidos = /^\d+$/.test(numerosCedula);
        
        return numerosValidos;
    } else {
        return false;
    }
}
tipoRegistroSelect.addEventListener('change', () => {
    const tipoRegistro = tipoRegistroSelect.value;

    if (tipoRegistro === 'persona') {
        formularioPersona.style.display = 'block';
        formularioServicio.style.display = 'none';
    } else {
        formularioPersona.style.display = 'none';
        formularioServicio.style.display = 'block';
    }
});

// Validación de correo electrónico (persona y servicio)
correoPersonaInput.addEventListener('input', () => {
    const correoValido = correoPersonaInput.value.includes('@');
    errorCorreoPersona.style.display = correoValido ? 'none' : 'block';
});

correoServicioInput.addEventListener('input', () => {
    const correoValido = correoServicioInput.value.includes('@');
    errorCorreoServicio.style.display = correoValido ? 'none' : 'block';
});

// Validación de contraseña (persona y servicio)
contrasenaPersonaInput.addEventListener('input', () => {
    const contrasenaValida = validarContrasena(contrasenaPersonaInput.value);
    errorContrasenaPersonaEspecial.style.display = contrasenaValida.especial ? 'none' : 'block';
    errorContrasenaPersonaMayuscula.style.display = contrasenaValida.mayuscula ? 'none' : 'block';
    errorContrasenaPersonaNumero.style.display = contrasenaValida.numero ? 'none' : 'block';
});

contrasenaServicioInput.addEventListener('input', () => {
    const contrasenaValida = validarContrasena(contrasenaServicioInput.value);
    errorContrasenaServicioEspecial.style.display = contrasenaValida.especial ? 'none' : 'block';
    errorContrasenaServicioMayuscula.style.display = contrasenaValida.mayuscula ? 'none' : 'block';
    errorContrasenaServicioNumero.style.display = contrasenaValida.numero ? 'none' : 'block';
});

// Validación de confirmación de contraseña (persona y servicio)
confirmarContrasenaPersonaInput.addEventListener('input', () => {
    const contrasenasCoinciden = confirmarContrasenaPersonaInput.value === contrasenaPersonaInput.value;
    errorContrasenaPersonaNoCoinciden.style.display = contrasenasCoinciden ? 'none' : 'block';
});

confirmarContrasenaServicioInput.addEventListener('input', () => {
    const contrasenasCoinciden = confirmarContrasenaServicioInput.value === contrasenaServicioInput.value;
    errorContrasenaServicioNoCoinciden.style.display = contrasenasCoinciden ? 'none' : 'block';
});

// Validación de RIF (servicio)
rifServicioInput.addEventListener('input', () => {
  const rifValido = rifServicioInput.value.startsWith('J-') && rifServicioInput.value.length === 10 && rifServicioInput.value.slice(2).match(/^\d+$/);
  errorRifServicio.style.display = rifValido ? 'none' : 'block';
});

// Función para validar contraseña

const caracteresEspeciales = /[!"#$%&'()*+,-./:;<=>?@[\]^_{|}~]/;



function validarContrasena(contrasena) {
  const especial = caracteresEspeciales.test(contrasena);
  const mayuscula = /[A-Z]/g.test(contrasena);
  const numero = /\d/g.test(contrasena);
 

  return {
    especial,
    mayuscula,
    numero,
  
};
}
const registroForm = document.getElementById('registroForm');

registroForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const tipoRegistro = tipoRegistroSelect.value;
    const nombre = document.getElementById(`nombre${tipoRegistro}`).value;
    const documento = document.getElementById(`documento${tipoRegistro}`).value;
    const correoElectronico = document.getElementById(`correo${tipoRegistro}`).value;
    const contrasena = document.getElementById(`contrasena${tipoRegistro}`).value;
    const confirmarContrasena = document.getElementById(`confirmarContrasena${tipoRegistro}`).value;

    // Additional validation if needed

    const data = {
        tipoRegistro,
        nombre,
        documento,
        correoElectronico,
        contrasena,
        confirmarContrasena
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/register');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = () => {
        if (xhr.status === 200) {
            // Registration successful
            alert('¡Registro exitoso!');
            // Redirect to login or confirmation page
        } else {
            // Registration failed
            alert('Error al registrarse. Inténtalo de nuevo.');
        }
    };
    xhr.send(JSON.stringify(data));
});

document.addEventListener('click', (event) => {
  const target = event.target;
  
  if (
      target !== errorCorreoPersona &&
      target !== errorCorreoServicio &&
      target !== errorContrasenaPersonaEspecial &&
      target !== errorContrasenaPersonaMayuscula &&
      target !== errorContrasenaPersonaNumero &&
      target !== errorContrasenaServicioEspecial &&
      target !== errorContrasenaServicioMayuscula &&
      target !== errorContrasenaServicioNumero &&
      target !== errorContrasenaPersonaNoCoinciden &&
      target !== errorContrasenaServicioNoCoinciden &&
      target !== errorRifServicio &&
      target !== errorCedulaPersona
  ) {
      errorCorreoPersona.style.display = 'none';
      errorCorreoServicio.style.display = 'none';
      errorContrasenaPersonaEspecial.style.display = 'none';
      errorContrasenaPersonaMayuscula.style.display = 'none';
      errorContrasenaPersonaNumero.style.display = 'none';
      errorContrasenaServicioEspecial.style.display = 'none';
      errorContrasenaServicioMayuscula.style.display = 'none';
      errorContrasenaServicioNumero.style.display = 'none';
      errorContrasenaPersonaNoCoinciden.style.display = 'none';
      errorContrasenaServicioNoCoinciden.style.display = 'none';
      errorRifServicio.style.display = 'none';
      errorCedulaPersona.style.display = 'none';
  }
});

/*.//// INPUT NUMBER */


/* Formateamos los numeros del input para que lo traduzca a decimales xD */
function formatearMonto() {
  const input = document.getElementById("montoInput");
  const valor = input.value.replace(/\D/g, ""); // Elimina caracteres no numéricos
  const montoFormateado = formatearNumero(valor);
  input.value = montoFormateado || ""; // Si es NaN, establece el valor vacío
}

function formatearNumero(numero) {
  const valorDecimal = parseFloat(numero) / 100; // Divide por 100 para obtener el valor decimal
  return isNaN(valorDecimal) ? "" : valorDecimal.toLocaleString("es-VE", {
      style: "currency",
      currency: "VES",
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
  });
}

