/* CONST */

/*===============================================================================================================
=========================================== VALIDACIÓN DE DATOS PARA REGISTRO ====================================
================================================================================================================== */
	const formularioClienteRe = document.getElementById("crearClienteForm");
	const inputsClienteRe = document.querySelectorAll("#crearClienteForm input");

	const formularioProductoRe = document.getElementById("crearProductoForm");
	const inputsProductoRe = document.querySelectorAll("#crearProductoForm input");
	
	const expresiones = {
		usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
		nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
		password: /^.{4,12}$/, // 4 a 12 digitos.
		correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
		telefono: /^\d{7,14}$/, // 7 a 14 numeros.
		documento: /^\d{10,11}$/, // 7 a 9 numeros.
		domicilio: /(([a-zA-Z]{2,6})+\s(\d[0-9]{1,100})+\s([a-z0-9]{1,16})+\s([#]+\d[0-9]{1,100}))|(([a-zA-Z.]{2,7})+\s(\d[0-9]{1,100})\s([#]+\d[0-9]{1,15})+\s([a-z]{1,10})+\s(\d[0-9\,\.]{1,15}))/,
		/* --------- PRODUCTO ----------- */
		producto: /^([A-Za-z]{4,8})+\s([A-Za-z]{4,9})+\s([A-Za-z]{2,7})+\s(([A-Z]{2,4})+[-]+([0-9]{2,4}))|([A-Za-z]{4,8})+\s([A-Za-z]{4,9})+\s([A-Za-z]{2,7})$/,
		precio: /^\d{5,9}$/,
		cantidad: /^\d{1,2}$/,
		descripcion: /^.{50,500}$/,	
	}

	const campos = {
		usuario: false,
		correo: false,
		password: false,	
		nombreCliente: false,
		apellidoCliente: false,
		numDoc: false,
		numTel: false,
		direccion: false,
		/* ------ PRODUCTO --------- */
		producto: false,
		precio: false,
		cantidad: false,
		descripcion: false
	}

	const validarFormulario = (e) => {
		switch (e.target.name) {
			case "nombreUsuario":
				validarCampo(expresiones.usuario, e.target, 'usuario');
			break;
			case "correoUsuario":
				validarCampo(expresiones.correo, e.target, 'correo');
			break;
			case "pwdUsuario":
				validarCampo(expresiones.password, e.target, 'password');
				validarPassword2();
			break;
			case "pwdUsuario2":			
				validarPassword2();
			break;
			case "nombreCliente":		
				validarCampo(expresiones.nombre, e.target, 'nombreCliente')	
			break;
			case "apellidoCliente":
				validarCampo(expresiones.nombre, e.target, 'apellidoCliente');
			break;
			case "numDoc":
				validarCampo(expresiones.documento, e.target, 'numDoc');
			break;
			case "numTel":
				validarCampo(expresiones.telefono, e.target, 'numTel');
			break;
			case "direccionCliente":
				validarCampo(expresiones.domicilio, e.target, 'direccion');
			break;
		}
	}

	/* ` */

	const validarCampo = (expresion, input, campo) => {
		if (expresion.test(input.value)) {
			document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
			document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
			document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
			document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
			document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
			campos[campo] = true;
		} else {
			document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');              
			document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');              
			document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
			document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
			document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
			campos[campo] = false;
		}
	}

	const validarPassword2 = () => {
		const inputPassword1 = document.getElementById('pwdUsuario');
		const inputPassword2 = document.getElementById('pwdUsuario2');

		if (inputPassword1.value !== inputPassword2.value) {
			document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');              
			document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');              
			document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
			document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
			document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
			campos['pwdUsuario'] = false;
		} else {
			document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');              
			document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');              
			document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
			document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');		
			document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
			campos['pwdUsuario'] = true;
		}
	}

	inputsClienteRe.forEach((input) => {
		input.addEventListener('keyup', validarFormulario);
		input.addEventListener('blur', validarFormulario); 
	});

	formularioClienteRe.addEventListener('submit', (e) => {    	

		if (!campos.usuario || !campos.correo || !campos.password || !campos.nombreCliente || !campos.apellidoCliente  
			|| !campos.numDoc || !campos.numTel || !campos.direccion) 
		{		
			e.preventDefault();
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
			document.getElementById('formulario__boton-enviar').disabled = true;
			setTimeout(() => {
				document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
				document.getElementById('formulario__boton-enviar').disabled = false;
			}, 5000);
		}
	});
/* ----------------------------------------------------------------------------------------------------------------------------------------------- */

const validarFormularioProd = (e) => {
	switch (e.target.name) {
		case "nombreProd":
			validarCampoProd(expresiones.producto, e.target, 'nombre');
		break;
		case "precioProd":
			validarCampoProd(expresiones.precio, e.target, 'precio');
		break;
		case "cantidadProd":
			validarCampoProd(expresiones.cantidad, e.target, 'cantidad');			
		break;	
		case "medidaProd":
			validarCampoProd(expresiones.cantidad, e.target, 'medida');			
		break;	
		case "descProd":		
			validarCampoProd(expresiones.descripcion, e.target, 'desc')	
		break;		
	}
}

const validarCampoProd = (expresion, input, campo) => {
	if (expresion.test(input.value)) {
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');		
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');              
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');              		
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputsProductoRe.forEach((input) => {
    input.addEventListener('keyup', validarFormularioProd);
    input.addEventListener('blur', validarFormularioProd); 
});

formularioProductoRe.addEventListener('submit', (e) => {    	

	if (!campos.nombre || !campos.precio || !campos.cantidad || !campos.desc) 
	{		
		e.preventDefault();
		document.getElementById('cerrarError').classList.add('formulario__mensaje-activo');
		document.getElementById('formulario__boton-enviar').disabled = true;
		setTimeout(() => {
			document.getElementById('cerrarError').classList.remove('formulario__mensaje-activo');
			document.getElementById('formulario__boton-enviar').disabled = false;
		}, 5000);
	}
})