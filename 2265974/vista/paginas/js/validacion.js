/* ===============================================================================================================
=========================================== VALIDACIÓN DE DATOS PARA REGISTRO ====================================
================================================================================================================== */

const formularioClienteRe = document.getElementById("crearClienteForm");
const inputsClienteRe = document.querySelectorAll("#crearClienteForm input");

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombreUsuario":
			if (expresiones.usuario.test(e.target.value)) {
                
            } else {
                document.getElementById('grupo__usuario').classList.add('colorNegativo');                
            }
		break;
		case "correoUsuario":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "pwdUsuario":
			validarCampo(expresiones.password, e.target, 'password');			
		break;
		case "pwdUsuario2":			
		break;
		case "nombreCliente":			
		break;
		case "apellidoCliente":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "numDoc":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "numTel":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "direccionCliente":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
	}
}

inputsClienteRe.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario); 
});

formularioClienteRe.addEventListener('submit', (e) => {
    e.preventDefault();
})