<!-- Header -->    
<header class="header">
    <div class="container">
        <!-- NavBar -->
        <nav class="row text-white justify-content-between align-items-center text-uppercase pt-5">
            <!-- logo -->
            <a href="#" class="col-auto text-reset">						
            <i class="fa-solid fa-user"></i>
                CUENTA
            </a>                
        </nav>	                                                      
    </div>
</header>
 
<!-- BODY -->
<?php
    $registroCliente = controladorFormularios::ctrRegistroCliente();
    if ($registroCliente == "registrado") {                  

        echo'<script>
            if (window.history.replaceState){
                window.history.replaceState( null, null, window.location.href);
            }            
            </script>';
        echo '            
            <div class="alert-success alert w-100 mt-2"><i class="fa-solid fa-circle-check"></i> Te has registrado correctamente, ya puedes iniciar sesión.</div>
        ';
    }
?>

<?php
    $ingresar = new controladorFormularios;
    $ingresar -> ctrIngreso();
?>

<div class="formulario__mensaje" id="formulario__mensaje">
    <div class="m-4 alert alert-danger"><i class="fa-solid fa-circle-exclamation text-weigth-bold mr-2"></i> <strong>Registrar cuenta;</strong> error al registrarse, los campos están vacios.</div>
</div>
<!-- -----------------------------------------------------------------------------
------------------------------CONTENIDO PRINCIPAL --------------------------------
------------------------------------------------------------------------------ -->
<div class=""> 
    <div class="row py-5"> 
        <div class="col-lg-6 br h-100"> <!-- REGISTRO FORM -->
            <h6 class="fontRoboto text-uppercase text-center">Registro</h6>
            <div class="dropdown-divider"></div>
            <div class="p-4">            
                <form method="POST" id="crearClienteForm">                    
                    <div class="form-row">
                        <div id="grupo__usuario" class="form-group col-md-6 formulario__grupo">
                            <label for="nombreUsuario" class="formulario__label">Usuario</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" id="nombreUsuario" placeholder="Coloca tu username" name="nombreUsuario">
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>                                
                            </div>                            
                            <p class="formulario__input-error small">El nombre debe ser de 4 a 16 digitos y solo puede contener números, guiones y/o letras.</p>
                        </div>


                        <div class="form-group col-md-6 formulario__grupo" id="grupo__correo">
                            <label for="correoUsuario" class="formulario__label">Correo</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="form-control formulario__input" id="correoUsuario" placeholder="Coloca tu correo" name="correoUsuario">
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error small">El correo solo puede contener letras, numeros, puntos y guiones bajos.</p>
                        </div>            
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__password">
                            <label for="pwdUsuario" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control formulario__input" id="pwdUsuario" placeholder="Coloca tu contraseña" name="pwdUsuario">
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error small">La contraseña debe ser de 4 a 16 digitos.</p>
                        </div>
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__password2">
                            <label for="pwdUsuario" class="formulario__label">Repita la contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control formulario__input" id="pwdUsuario2" placeholder="Repite tu contraseña" name="pwdUsuario2">
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error small">Las contraseñas deben ser iguales.</p>
                        </div>                        
                    </div>                    
                    <div class="container">
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="form-row">                
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__nombreCliente">
                            <label for="nombreCliente" class="formulario__label">Nombres</label>
                            <div class="formulario__grupo-input">
                                <input type="name" class="form-control formulario__input" id="nombreCliente" placeholder="Coloca tus nombres" name="nombreCliente">
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error small">El nombre solo puede contener letras y una longitud de 50 caracteres.</p>
                        </div>
                        <div class="form-group col-md-6 formulario__grupo" id="grupo__apellidoCliente">
                            <label for="apellidoCliente" class="formulario__label">Apellidos</label>
                            <div class="formulario__grupo-input">
                                <input type="name" class="form-control formulario__input" id="apellidoCliente" placeholder="Coloca tus apellidos" name="apellidoCliente">  
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>          
                            </div>  
                            <p class="formulario__input-error small">El apellido solo puede contener letras y una longitud de 50 caracteres.</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipoDoc" class="formulario__label">Tipo documento</label>
                            <select id="tipoDoc" name="tipoDoc" class="form-control">
                                <option selected disabled>Elije el tipo</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="CC">Cedula de ciudadania</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8 formulario__grupo" id="grupo__numDoc">
                            <label for="numDoc" class="formulario__label">Número de documento</label>
                            <div class="formulario__grupo-input">
                                <input type="number" class="form-control formulario__input" id="numDoc" placeholder="Escribe tu número de documento" name="numDoc">
                                <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>
                            </div>
                            <p class="formulario__input-error small">El número de documento no debe contener puntos ni espacios, debe ser igual o mayor a 8 digitos.</p>
                        </div>
                    </div>            
                    <div class="form-group formulario__grupo" id="grupo__numTel">
                        <label for="numTel" class="formulario__label">Número de teléfono</label>
                        <div class="formulario__grupo-input">
                            <input type="number" class="form-control formulario__input" id="numTel" placeholder="Escribe tu número de teléfono" name="numTel">
                            <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>                            
                        </div>
                        <p class="formulario__input-error small">El número de teléfono no debe tener signos ni puntos, únicamente números.</p>
                    </div>
                    <div class="form-group formulario__grupo" id="grupo__direccion">
                        <label for="direccionCliente" class="formulario__label">Dirección</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input" name="direccionCliente" id="direccionCliente" placeholder="Coloca tu dirección de domicilio">
                            <i class="fa-solid fa-times-circle formulario__validacion-estado"></i>
                        </div>
                        <p class="formulario__input-error small">La dirección debe tener el orden correcto.</p>
                    </div>                                        
                    <button type="submit" class="btn btn-primary col-sm-12" name="registroCliente" id="formulario__boton-enviar">Registrarme</button>
                </form>        
            </div>
            <div class="pb-4"></div>
        </div>        
        <div class="col-lg-6"> <!-- INGRESO FORM -->
            <h6 class="fontRoboto text-uppercase text-center">Ingreso</h6>
            <div class="dropdown-divider"></div>
            <div class="p-4">
                <form method="POST">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario / correo</label>
                            <input type="text" class="form-control " id="usuario" name="usuario" placeholder="Coloca tu nombreo o el correo">
                            <div class="form-text small">¿Has olvidado tu correo? Intentaremos ayudarte <a href="_blank">acá</a>.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Contraseña</label>
                            <input type="password" class="form-control " id="pwd" name="pwd" placeholder="Escribe tu contraseña">
                        </div>
                        <div class="mb-3 form-check d-flex">
                            <input type="checkbox" class="form-check justify-content-beetwen" id="check">
                            <label class="form-check-label ml-3" for="check">Recordarme en este equipo.</label>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">Ingresar</button>                    
                        </div>
                </form>
            </div>
        </div>
    </div>    
</div>