<div id="CClie" style="display: none;"> <!-- CREAR CLIENTE -->
    <?php
        $registroCliente = controladorFormularios::ctrRegistroCliente();
        if ($registroCliente == "registrado") {                  

            echo'<script>
                if ( window.history.replaceState ){
                    window.history.replaceState( null, null, window.location.href);
                }
                content = document.getElementById("content");
                MClie = document.getElementById("MClie");
                CClie = document.GetElementById("CClie");

                content.style.display = "none";
                MClie.style.display = "block";
                CClie.style.display = "block";
                </script>';
            echo '
            <div class="card mt-4 bg-success ">
                <div class="card-header text-white">
                    <h4>El cliente ha sido registrado con exito</h4>
                </div>
                <div class="card-body text-white">
                    <p>Has creado el cliente con su usuario de manera exitosa, ahora podrás editarlo en la tabulación de la izquierda.</p>
                </div>
            </div>
            ';
        }
    ?>        
    <div class="container" style="display: block;">
        <div class="row ml-4 mt-4">
        <form class="col-sm-10" method="POST" id="crearClienteForm">
            <h4>Usuario</h4>
            <div class="dropdown-divider"></div>
            <div class="form-row">
                <div id="grupo__usuario"class="form-group col-md-6">
                    <label for="nombreUsuario" class="colorNegativoText">Usuario</label>
                    <input type="text" class="form-control colorNegativoInput" id="nombreUsuario" placeholder="Coloque el nombre del usuario" name="nombreUsuario">
                    <i class="fa-solid fa-circle-exclamation icon-input"></i>
                </div>
                <div class="form-group col-md-6" id="grupo__usuarioNombre">
                    <label for="correoUsuario" class="colorNegativoText">Correo</label>
                    <input type="email" class="form-control colorNegativoInput" id="correoUsuario" placeholder="Coloque el correo del usuario" name="correoUsuario">
                    <i class="fa-solid fa-circle-exclamation icon-input"></i>
                </div>            
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pwdUsuario" class="colorNegativoText">Contraseña</label>
                    <input type="password" class="form-control colorNegativoInput" id="pwdUsuario" placeholder="Coloque la contraseña del usuario" name="pwdUsuario">
                    <i class="fa-solid fa-circle-exclamation icon-input"></i>
                </div>
                <div class="form-group col-md-6">
                    <label for="pwdUsuario" class="colorNegativoText">Repita la contraseña</label>
                    <input type="password" class="form-control colorNegativoInput" id="pwdUsuario2" placeholder="Repita la contraseña del usuario" name="pwdUsuario2">
                    <i class="fa-solid fa-circle-exclamation icon-input"></i>
                </div>
            </div>
            <h4>Cliente</h4>
            <div class="dropdown-divider"></div>
            <div class="form-row">                
                <div class="form-group col-md-6">
                <label for="nombreCliente" class="colorNegativoText">Nombre</label>
                <input type="name" class="form-control colorNegativoInput" id="nombreCliente" placeholder="Coloque el nombre del cliente" name="nombreCliente">
                <i class="fa-solid fa-circle-exclamation icon-input"></i>
                </div>
                <div class="form-group col-md-6">
                <label for="apellidoCliente" class="colorNegativoText">Password</label>
                <input type="name" class="form-control colorNegativoInput" id="apellidoCliente" placeholder="Coloque el apellido del cliente" name="apellidoCliente">
                <i class="fa-solid fa-circle-exclamation icon-input"></i>            
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tipoDoc">Tipo documento</label>
                    <select id="tipoDoc" name="tipoDoc" class="form-control">
                        <option selected disabled>Selecciona el ID</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CC">Cedula de ciudadania</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label for="numDoc" class="colorNegativoText">Número de documento</label>
                    <input type="tel" class="form-control colorNegativoInput" id="numDoc" placeholder="Escribe el número del documento" name="numDoc">
                    <i class="fa-solid fa-circle-exclamation icon-input"></i>
                </div>
            </div>            
            <div class="form-group">
                <label for="numTel" class="colorNegativoText">Número de teléfono</label>
                <input type="text" class="form-control colorNegativoInput" id="numTel" placeholder="Escribe el número de teléfono" name="numTel">                
                
            </div>
            <div class="form-group">
                <label for="direccionCliente" class="colorNegativoText">Dirección</label>
                <input type="text" class="form-control colorNegativoInput" name="direccionCliente" id="direccionCliente" placeholder="Coloca la dirección del cliente (Calle | cll X sur # X)">                
            </div>                                        
            <button type="submit" class="btn btn-primary col-sm-12" name="registroCliente">Agregar</button>
            </form>
        </div>        
    </div> 

    <form action="" class="formulario" id="formulario">
			<!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
			</div>

			<!-- Grupo: Contraseña 2 -->
			<div class="formulario__grupo" id="grupo__password2">
				<label for="password2" class="formulario__label">Repetir Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password2" id="password2">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
			</div>

			<!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</form>
</div>

<?php 
    $cliente = controladorFormularios::ctrSeleccionarRegistroCliente(null);
    #print_r($usuario);
?>

<div id="RClie" style="display: none;"> <!-- CONSULTAR CLIENTE -->    
    <div class="container">                
    <?php
        if (isset($_GET["c_id"])) {
            echo '<script>gestClie(2);</script>';
            $datoCliente_r = $_GET["c_id"];
            $cliente = controladorFormularios::ctrSeleccionarRegistroCliente($datoCliente_r);
            $dato = $cliente["UsuaCodigoFK"];
            $usuario = controladorFormularios::ctrSeleccionarRegistro($dato);

            echo '<table class="table table-dark mt-4 text-center ">            
            <tr>
            <td colspan="12 bg-table-per">
                <div class="card" id="tabla-amplia">
                    <div class="card-header" id="tabla-amplia"><div class="float-right"><a href="#" onclick="cerrarTablaCliente(); return false" class="btn-cerrar">X</a></div>
                    <h5>Información del cliente</h5></div>
                    <section id="tabla-amplia">
                        <div class="container py-3">                                
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4" id="tabla-amplia">
                                    <div class="card-body text-center">                                                
                                        <i class="fa-solid fa-user icon" style="color: #eee;"></i>
                                        <h5 class="my-3">'.$usuario["nombre"].'</h5>
                                        <p class="mb-1">'.$usuario["correo"].'</p>
                                        <p class="mb-4">'.$usuario["tipoUsua"].'</p>
                                    </div>
                                    </div>                                    
                                </div>
                                <div class="col-lg-8">
                                    <div class="card mb-4" id="tabla-amplia">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="mb-0 ">Nombre completo:</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p class=" mb-0">'.$cliente["ClieNombre"].' '.$cliente["ClieApellido"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Correo:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">'.$usuario["correo"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Telefono:</p>
                                                </div>
                                                <div class="col-sm-9 ">
                                                    <p class=" mb-0">'.$cliente["ClieCelular"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Documento:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">( '.$cliente["ClieTipoIdentificacion"].' ) '.$cliente["ClieIdentificacion"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Direccion</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="mb-0">'.$cliente["ClieDireccion"].'</p>
                                                </div>                                                        
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Tipo cliente</p>
                                                </div>
                                                <div class="col-sm-9 mb-4">
                                                    <p class="mb-0">'.$usuario["tipoUsua"].'</p>
                                                </div>                                                        
                                            </div>
                                        </div>                                                                     
                                    </div>   
                                </div>      
                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <div class="card-body" id="tabla-amplia">
                                            <div class="row">
                                                <div class="col-sm-12"><h5>Acciones</h5></div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row py-3">
                                                <div class="col"><a href="index.php?navegacion=dashboard&d_id_c='.$cliente["ClieCodigoPK"].'" class="btn btn-danger h-100 w-100">
                                                    <i class="fa-solid fa-trash w-100" style="font-size: 25px; padding: 10px;"></i>
                                                    Eliminar
                                                </a></div>                                                        
                                                <div class="col"><a href="#" class="btn btn-info h-100 w-100"> 
                                                    <i class="fa-solid fa-pen w-100" style="font-size 25px; padding: 10px;"></i>
                                                    Actualizar
                                                </a></div>                                                        
                                            </div>
                                        </div>                                                                     
                                    </div>   
                                </div>                                                                                                      
                    </section>
                </div>
            </td>
            </tr>
        </table>';
        } else {
                    
    ?>
        <table class="table table-dark table-borderless mt-4 text-center table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <?php foreach ($cliente as $key => $mostrar): ?>
            <tbody>
                <tr>
                    <td><?php echo $mostrar["ClieCodigoPK"]; ?></td>
                    <td><?php echo $mostrar["ClieNombre"]; ?></td>
                    <td><?php echo $mostrar["ClieApellido"]; ?></td>
                    <td><?php echo $mostrar["UsuaCodigoFK"]; ?></td>                    
                    <td><a href="index.php?navegacion=dashboard&c_id=<?php echo $mostrar['ClieCodigoPK']; ?>" class="btn btn-dark w-100 h-100">Ampliar</a></td>
                </tr>
                <tr>                                                
                </tr>
            </tbody>            
            <?php endforeach; }?>
        </table>
    </div>
</div>

<div id="DClie" style="display: none;"> <!-- ELIMINAR CLIENTE -->
    <div class="container">
        <?php
            $eliminarCliente = controladorFormularios::ctrBorrarRegistroCliente();            
            if ($eliminarCliente=="ok") {                            
                echo '<div class="py-4">
                <script>
                    window.location="index.php?navegacion=dashboard";                           
                    alert("Has eliminado correctamente al usuario, puedes navegar correctamente.");
                </script>                
                </div>';
            }
        ?>    
        <?php 
            if (isset($_GET["d_id_c"])) {
                $datoCliente_r = $_GET["d_id_c"];
                $cliente_delete = controladorFormularios::ctrSeleccionarRegistroCliente($datoCliente_r);
                echo '<script>gestClie(4);</script>';

                echo '<div class="py-4 m-5">
                <div class="card bg-danger">
                    <div class="card-header text-center text-uppercase h6 text-light">Estás a punto de eliminar un cliente</div>
                    <div class="card-body text-light text-small"><p>Estás a punto de eliminar al usuario '.$cliente_delete["ClieNombre"].', si realmente estás seguro de eliminarlo de forma permanente
                        en nuestra base de datos, elije si deseas eliminar tanto al usuario y su cliente o solamente su cliente (dando oportunidad a una nueva creación
                        sin necesidad de crear otro usuario).
                    <div class="">
                        <form action="" method="post" class="row">
                            <select name="selEliminarCliente" id="eliminarCliente" class="col-lg-12 cmbColumn" required>
                                <option disabled selected>Selecciona la opción</option>
                                <option value="Cl" id="eliminarCliente">Eliminar cliente</option>
                                <option value="ClUs" id="eliminarClUs">Eliminar cliente y usuario</option>                            
                            </select>
                            <input type="submit" value="Eliminar" class="btn w-100 btn-dark">
                            <input type="hidden" name="idClie" id="idClie" value="'.$cliente_delete["ClieCodigoPK"].'">
                            <input type="hidden" name="idUsua" id="idUsua" value="'.$cliente_delete["UsuaCodigoFK"].'">
                        </form>
                    </div>
                    </p></div>
                </div>
            </div>';
            } else {                            
        ?>        
        <table class="table table-dark table-borderless mt-4 text-center table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>ID usuario</th>
                    <th>Opción</th>
                </tr>
            </thead>
            <?php foreach ($cliente as $key => $mostrar): ?>
            <tbody>
                <tr>
                    <td><?php echo $mostrar["ClieCodigoPK"]; ?></td>
                    <td><?php echo $mostrar["ClieNombre"]; ?></td>
                    <td><?php echo $mostrar["ClieApellido"]; ?></td>
                    <td><?php echo $mostrar["UsuaCodigoFK"]; ?></td>                    
                    <td><a href="index.php?navegacion=dashboard&d_id_c=<?php echo $mostrar['ClieCodigoPK']; ?>" class="btn btn-danger w-100 h-100">Eliminar</a></td>
                </tr>
                <tr>                                                
                </tr>
            </tbody>            
            <?php endforeach; }?>
        </table>
    </div>
</div>