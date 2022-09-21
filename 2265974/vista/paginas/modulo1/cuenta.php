<?php 
    $producto = controladorFormularios::ctrSeleccionarRegistroProducto(null);    
?>
<?php if (isset($_SESSION["sesion"])): ?>
    <header class="header">
        <div class="container">
            <!-- NavBar -->
            <nav class="row text-white justify-content-between align-items-center text-uppercase pt-5">
                <!-- logo -->
                <a href="#" class="col-auto text-reset">						
                <i class="fa-solid fa-user"></i>
                    Cuenta de <?php echo $_SESSION["usuario"]["ClieNombre"]; ?>
                </a>                
            </nav>	                                                      
        </div>
    </header>
    <div class="py-4 container">                
        <div class="row">
            <div class="col-lg-3 border-right cuenta__sidebar">
                <ul>
                    <li class="mb-2"><button class="cuenta__btn" onclick="cuentaTab('datos');"><i class="fa-solid fa-magnifying-glass mr-2 small"></i> Mis datos</button></li>
                    <li class="mb-2"><button class="cuenta__btn" onclick="cuentaTab('compras');"><i class="fa-solid fa-cart-shopping mr-2 small"></i> Mis compras</button></li>
                    <li class="mb-2"><button class="cuenta__btn" onclick="cuentaTab('actualizacion');"><i class="fa-solid fa-file-pen mr-1 ml-1 small"></i> Editar información</button></li>
                    <li class="mb-2"><button class="cuenta__btn" onclick="cuentaTab('configuracion');"><i class="fa-solid fa-wrench small mr-2"></i> Configuración</button></li>
                    <li class="mb-2"><button class="cuenta__btn" ><i class="fa-sharp fa-solid fa-ticket small mr-2"></i> Ticket de soporte</button></li>
                    <?php if($_SESSION["sesion"]==1): ?>                        
                        <li class="mb-2"><button class="cuenta__btn"><a href="index.php?navegacion=dashboard" class="cuenta__btn_admin"><i class="fa-solid fa-unlock small mr-2"></i> Administrador</a></li></button>
                    <?php endif?>
                    <li class="mb-2"><button class="cuenta__btn"><a href="index.php?navegacion=salir"><i class="fa-solid fa-right-from-bracket small mr-2"></i> Cerrar sesión</a></li></button>
                </ul>
            </div>
            <div class="col-lg-9">
                <div id="datos" style="display: block;">        
                    <div class="formulario__mensaje-cuenta" id="formulario__mensaje-cuenta">
                        <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation text-weigth-bold mr-2"></i> <strong>Información personal;</strong> ya has seleccionado esta tabulación.</div>
                    </div>
                    <h5>Tu información personal:</h5>
                    <div class="container">    
                        <div class="row">
                            <div class="col-sm-4">
                                Nombre completo: 
                                <ul>
                                    <li><?php echo $_SESSION["usuario"]["ClieNombre"]; ?> <?php echo $_SESSION["usuario"]["ClieApellido"]; ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                Nombre de usuario: 
                                <ul>
                                    <li><?php echo $_SESSION["usuario"]["nombre"]; ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                Correo: 
                                <ul>
                                    <li><?php echo $_SESSION["usuario"]["correo"]; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                Documento: 
                                <ul>
                                    <li>(<strong><?php echo $_SESSION["usuario"]["TipoDoc"]; ?></strong>) <?php echo $_SESSION["usuario"]["Identificacion"]; ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                Número teléfonico: 
                                <ul>
                                    <li><?php echo $_SESSION["usuario"]["Celular"]; ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                Tipo de usuario: 
                                <ul>
                                    <li>
                                        <?php 
                                            if ($_SESSION["sesion"]==0) {
                                                echo 'Cliente';
                                            } elseif ($_SESSION["sesion"]==1) {
                                                echo 'Administrador';
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>                
                    </div>
                    <h5>Última compra realizada:</h5>
                    <div class="container">
                        <h6>NULL</h6>
                    </div>
                    <h5>Comentarios:</h5>
                    <div class="container">
                        <h6>NULL</h6>
                    </div>
                </div>
                <div id="compras" style="display: none;">
                    <div class="formulario__mensaje-cuenta" id="formulario__mensaje-cuenta">
                        <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation text-weigth-bold mr-2"></i> <strong>Historial de compras;</strong> ya has seleccionado esta tabulación.</div>
                    </div>
                    <h5>Historial de todas tus compras: </h5>
                    <table class="table table-dark table-borderless mt-4 text-center table-hover table-striped" id="tablaClientes">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>                                
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <?php foreach ($producto as $key => $mostrar): ?>
                        <tbody>
                            <tr>
                                <td><?php echo $mostrar["ProdCodigoPK"]; ?></td>
                                <td><?php echo $mostrar["ProdNombre"]; ?></td>
                                <td><?php echo $mostrar["ProdPrecioVenta"]; ?></td>                                
                                <td><a href="index.php?navegacion=dashboard&p_id=<?php echo $mostrar['ProdCodigoPK']; ?>" class="btn btn-dark w-100 h-100">Ver detalles</a></td>
                            </tr>
                            <tr>                                                
                            </tr>
                        </tbody>            
                        <?php endforeach; ?>
                    </table>
                </div>
                <div id="actualizacion" style="display: none;">
                    <?php                        
                        $actualizarClienteUsuario = controladorFormularios::ctrActualizarClienteUsuario();
                        
                        if ($actualizarClienteUsuario=="ok") {
                            echo '<script>                                                                   
                                    alert("Haz actualizado tu información, para que se muestren los cambios, se cerrará la sesión actual.");
                                    window.location.href="index.php?navegacion=salir";                                    
                                </script>';              
                        } elseif ($actualizarClienteUsuario=="incorrecto") {
                            echo '<script>                                                                   
                                    alert("Ha ocurrido un error en la ejecución, verifica tu contraseña.");
                                    window.location.href="index.php?navegacion=cuenta";                                    
                                </script>';
                        }
                    ?>
                    <h4><center>Edita tu información</center></h4>
                    <hr>
                    <form method="post">
                        <div class="row">
                            <h5 class="ml-2 w-100">Usuario.</h5>
                            <div class="form-group col-sm-6">
                                <label for="" class="form-label small">Nombre de usuario;</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"]["nombre"];?>" name="u_nombreUsuario">
                            </div>          
                            <div class="form-group col-sm-6">
                                <label for="" class="form-label small">Correo;</label>
                                <input type="mail" class="form-control" value="<?php echo $_SESSION["usuario"]["correo"];?>" name="u_correoUsuario">
                            </div>       
                            <div class="form-group col-sm-12">
                                <label for="" class="form-label small">Tu contraseña (si no deseas cambiarla, deja el espacio en blanco)</label>
                                <input type="password" class="form-control" name="u_pwdUsuario">
                            </div>            
                        </div>                        
                        <div class="row">
                            <h5 class="ml-2 w-100">Cliente.</h5>
                            <div class="form-group col-sm-6">
                                <label for="" class="form-label small">Nombre;</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"]["ClieNombre"];?>" name="u_nombreCliente">
                            </div>          
                            <div class="form-group col-sm-6">
                                <label for="" class="form-label small">Apellido;</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"]["ClieApellido"];?>" name="u_apellidoCliente">
                            </div>                   
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipoDoc" class="form-label small">Tipo documento (actual <strong><?php echo $_SESSION["usuario"]["TipoDoc"]; ?></strong> )</label>
                                <select id="tipoDoc" name="tipoDoc" class="form-control">
                                    <option selected value="<?php echo $_SESSION["usuario"]["TipoDoc"]; ?>">Dejar actual</option>
                                    <option value="TI">Tarjeta de identidad</option>
                                    <option value="CC">Cedula de ciudadania</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8" id="grupo__numDoc">
                                <label for="numDoc" class="form-label small">Número de documento</label>
                                <input type="number" class="form-control " id="numDoc" placeholder="Escribe tu número de documento" name="numDoc" value="<?php echo $_SESSION["usuario"]["Identificacion"]?>">                                                                                    
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="u_numTel" class="form-label small">Número de teléfono</label>
                                    <input type="text" class="form-control" name="u_numTel" id="u_numTel" value="<?php echo $_SESSION["usuario"]["Celular"]?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="u_direccion" class="form-label small">Dirección de domicilio</label>
                                    <input type="text" class="form-control" name="u_direccion" id="u_direccion" value="<?php echo $_SESSION["usuario"]["Direccion"]?>">
                                </div>
                            </div>
                            <hr>
                            <p>Para continuar con la actualización, debes escribir tu <strong>antigua</strong> contraseña.</p>
                            <div class="form-group">
                                <input type="password" name="validarPwd" id="validarPwd" class="form-control" placeholder="Escribe tu contraseña.">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Actualizar mi cliente" class="btn btn-dark w-100" name="actualizarClientePropio">
                            </div>
                            <input type="hidden" name="pwdAntigua" value="<?php echo $_SESSION["usuario"]["Contraseña"]?>">
                            <input type="hidden" name="id" value="<?php echo $_SESSION["usuario"]["id_usuario"]?>">                                                        
                    </form>
                </div>
                <div id="configuracion" style="display: none;">
                    <?php
                        if (isset($_POST["desactivarUsuario"])) {
                            if ($_POST["pwdUsuario"]==$_POST["pwdBase"]) {
                                $id = $_POST["id"];
                                $confirmarDesactivar = controladorFormularios::ctrDesactivarCliente($id);
                                if ($confirmarDesactivar=="desactivado") {
                                    echo '<script> window.location = "index.php?navegacion=salir";
                                                alert("Cuenta desactivada con exito, se ha cerrado la sesión.");</script>';                                 
                                }
                            } else {
                                echo '<script>alert("Ha ocurrido un error durante el proceso, verifica las contraseñas."); window.location = "index.php?navegacion=cuenta";</script>';
                            }
                            
                        }
                    ?>
                    <h5>Desactivar mi cuenta:</h5>
                    <div class="container">
                        Si deseas desactivar tu cuenta presiona el siguiente botón de continuar:
                        <button onclick="confirmarDesactivar();" class="btn btn-danger w-100 m-2" id="btnAbrirConfirmar">Continuar</button>
                        <div id="textoConfirmar" style="display: none;">
                            <div class="mb-3">Antes de continuar, deberás leer los siguientes parametros que habrán al momento de desactivar la cuenta.</div>
                            <div class="alert bg-danger text-white text-reset">
                            <form action="" method="POST">
                                Al desactivar la cuenta, esta podrá ser reactivada únicamente mediante la solicitud vía correo, mensaje vía Whatsapp o abriendo un ticket.
                                No tendrás acceso al inicio de sesión, configuración y a la lectura de la información de la cuenta una vez esta se desactive, quedará almacenada un mes (30 días) en nuestra base 
                                de datos para luego ser eliminada de manera definitiva. ¿Estás seguro de desactivar tu cuenta? Para confirmar escribe tu contraseña de nuevo. <br>
                                <label for="pwdUsuario" class="text-small">Escribe tu contraseña</label>  
                                <input class="form-control w-100" type="password" name="pwdUsuario" id="pwdUsuario">
                                <input type="submit" value="Eliminar mi cuenta" class="btn btn-danger w-100 py-2 mt-2" name="desactivarUsuario">
                                <input type="hidden" name="pwdBase" value="<?php echo $_SESSION["usuario"]["Contraseña"]; ?>">
                                <input type="hidden" name="id" value="<?php echo $_SESSION["usuario"]["id_usuario"]; ?>">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
<?php else:  /* Cierre al final de todo este codigo */?>
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
        <div class="col-lg-6 br h-100"  > <!-- REGISTRO FORM -->
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
                            <input type="email" class="form-control " id="usuario" name="usuario" placeholder="Coloca tu nombreo o el correo">
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

<?php endif ?>