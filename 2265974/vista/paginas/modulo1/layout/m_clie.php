<div id="CClie" style="display: none;"> <!-- CREAR CLIENTE -->
    <?php
        $registroCliente = controladorFormularios::ctrRegistroCliente();
        if ($registroCliente == "registrado") {                  

            echo'<script>
                alert("Gracias por registrar un nuevo cliente, serás redirigido al panel administrativo.");
                window.location.href="index.php?navegacion=dashboard";
                </script>';            
        }
    ?>            
    <div class="container" style="display: block;">
        <h4 class="text-center text-weight-bold py-4">CREA UN CLIENTE</h4>
        <div class="formulario__mensaje" id="formulario__mensaje">
            <div class="m-4 alert alert-danger"><i class="fa-solid fa-circle-exclamation text-weigth-bold mr-2"></i> <strong>Registrar cuenta;</strong> error al registrarse, los campos están vacios.</div>
        </div>
        <div class="ml-4 mt-4">
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
                            <p class="formulario__input-error small">El número de documento no debe contener puntos ni espacios, debe ser igual a 10 digitos.</p>
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
                    <button type="submit" class="btn btn-primary col-sm-12" name="registroCliente" id="formulario__boton-enviar">Registrar al cliente</button>
                </form>
        </div>        
    </div> 
</div>
<?php 
    $cliente = controladorFormularios::ctrSeleccionarRegistroCliente(null);    
?>

<div id="RClie" style="display: none;"> <!-- CONSULTAR CLIENTE -->    
    <div class="container">                
        <?php
            if (isset($_GET["c_id"])) {
                echo '<script>abrirModulo("cliente", "RClie1");</script>';
                $datoCliente_r = $_GET["c_id"];
                $cliente = controladorFormularios::ctrSeleccionarRegistroCliente($datoCliente_r);
                $dato = $cliente["UsuaCodigoFK"];
                $usuario = controladorFormularios::ctrSeleccionarRegistro($dato);
                if ($usuario["tipoUsua"]==0) {
                    $tipoUsua = 'Cliente';
                } elseif ($usuario["tipoUsua"]==1) {
                    $tipoUsua = 'Administrador';
                }

                echo '<table class="table table-dark mt-4 text-center" id="RClie1">            
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
                                            <p class="mb-4">'.$tipoUsua.'</p>
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
                                                        <p class="mb-0">'.$tipoUsua.'</p>
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
                                                    <div class="col"><a href="index.php?navegacion=dashboard&d_id_u='.$cliente["UsuaCodigoFK"].'" class="btn btn-info h-100 w-100"> 
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
        <table class="table table-dark table-borderless mt-4 text-center table-hover table-striped" id="tablaClientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>ID (FK)</th>
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

<div id="DClie" style="display: block;"> <!-- ELIMINAR CLIENTE -->
    <div class="container">
        <?php
            $eliminarCliente = controladorFormularios::ctrBorrarRegistroCliente();            
            if ($eliminarCliente=="ok") {                            
                echo '<div class="py-4">
                <script>
                    window.location="index.php?navegacion=dashboard";                           
                    alert("Has eliminado correctamente al usuario, serás dirigido al panel administrativo.");
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
                    <div class="card-body text-light text-small"><p>Estás a punto de eliminar al usuario '.$cliente_delete["ClieNombre"].', ¿Estás seguro de eliminarlo de forma permanente
                        en nuestra base de datos?.
                    <div class="">
                        <form method="post" class="row">                            
                            <input type="submit" value="Sí, eliminar" class="btn w-100 btn-confirmar" name="confirmarEliminar">
                            <input type="hidden" name="idClie" id="idClie" value="'.$cliente_delete["ClieCodigoPK"].'">
                            <input type="hidden" name="idUsua" id="idUsua" value="'.$cliente_delete["UsuaCodigoFK"].'">                            
                        </form>
                    </div>
                    </p></div>
                </div>
            </div>';
            }
            ?>
        </table>
    </div>
</div>

<div id="UClie" style="display: block;"> <!-- ACTUALIZAR CLIENTE -->
    <div class="container">
        <?php
            /* REALIZAR UNA COMPROBACIÓN DONDE SE PUEDA ELEGIR SI VER LOS DATOS DEL CLIENTE QUE SE ACTUALIZO, EN CASO DE SI, QUE SE LE MUESTRE TODO 
            MEDIANTE LA SOLICITUD DE UN ID, TRATAR DE HACER ESO, SINO, ENVIARLO AL DASHBOARD PRINCIPAL */
            $actualizarClienteUsuario = controladorFormularios::ctrActualizarClienteUsuario();
            
            if ($actualizarClienteUsuario=="ok") {
                echo '<script>                                                                   
                        alert("Has actualizado este cliente, serás redirigido al panel administrativo.");
                        window.location.href="index.php?navegacion=dashboard";
                    </script>';              
            }
        ?>
        <?php
            if (isset($_GET["d_id_u"])) {
                $datoCliente_u = $_GET["d_id_u"];
                $cliente_update = controladorFormularios::ctrSeleccionarRegistroClienteUsuario($datoCliente_u);                                
                if ($cliente_update["tipoUsua"]==0) {
                    $tipoUsua = 'Cliente';
                } elseif ($cliente_update["tipoUsua"]==1) {
                    $tipoUsua = 'Administrador';
                }                

                echo '<script>gestClie(3);</script>';                

                echo '<div class="py-5 m-3">
                    <h4 class="text-uppercase text-center">Vas a actualizar la información de: <b>'.$cliente_update["ClieNombre"].'</b></h4>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="grupo__u_usuario">
                                <img src="public/img/imagen_4.jpg" alt="" class="grupo__u_usuario_img">
                            </div>
                        </div>
                        <div class="col-lg-8 contenido_usuario">
                            <div class="">
                                <h6>Datos usuario: </h6>
                                <form action="" method="post" class="ml-2" id="actualizarClienteUsuario">
                                    <div class="row">                            
                                        <div class="grupo__usuario_u col-sm-6">
                                            <label for="u_nombreUsuario" class="grupo__usuario-label">Nombre usuario</label>
                                            <input type="text" class="grupo__usuario-input" name="u_nombreUsuario" id="u_nombreUsuario" placeholder="Escribe el nuevo nombre" value="'.$cliente_update["nombre"].'">
                                        </div>
                                        <div class="grupo__usuario_u col-sm-6">
                                            <label for="u_correoUsuario" class="grupo__usuario-label">Correo usuario</label>
                                            <input type="email" class="grupo__usuario-input" name="u_correoUsuario" id="u_correoUsuario" placeholder="Escribe el nuevo correo" value="'.$cliente_update["correo"].'">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="grupo__usuario col-sm-12">
                                            <label for="u_pwdUsuario" class="grupo__usuario-label">Contraseña</label>
                                            <input type="text" class="grupo__usuario-input" name="u_pwdUsuario" id="u_pwdUsuario" placeholder="Digita la nueva contraseña">
                                        </div>
                                    </div>  
                            </div>
                        </div>
                    </div>                            
                    <h6 class="mt-3 ml-4">Datos clientes:</h6>
                        <div class="row ml-4">
                            <div class="grupo__cliente_u col-sm-6">
                                <label for="u_nombreCliente" class="grupo__cliente-label">Nombre del cliente</label>
                                <input type="text"  class="grupo__cliente-input" name="u_nombreCliente" id="u_nombreCliente" placeholder="Añade un nuevo nombre para el cliente" value="'.$cliente_update["ClieNombre"].'">
                            </div>
                            <div class="grupo__cliente_u col-sm-6">
                                <label for="u_apellidoCliente" class="grupo__cliente-label">Apellido del cliente</label>
                                <input type="text"  class="grupo__cliente-input" name="u_apellidoCliente" id="u_apellidoCliente" placeholder="Añade un nuevo nombre para el cliente" value="'.$cliente_update["ClieApellido"].'">
                            </div>
                        </div>
                        <div class="row ml-4">
                            <div class="grupo__cliente_u col-sm-4">
                                <label for="u_tipoDoc" class="grupo__cliente-label mt-2">Tipo documento (actual <b class="b_rojo">'.$cliente_update["TipoDoc"].'</b>)</label>
                                <select id="u_tipoDoc" name="u_tipoDoc" class="grupo__cliente-select">
                                    <option selected value="'.$cliente_update["TipoDoc"].'">Dejar actual</option>
                                    <option value="TI">Tarjeta de identidad</option>
                                    <option value="CC">Cedula de ciudadania</option>
                                </select>
                            </div>
                            <div class="grupo__cliente_u col-sm-8">
                                <label for="u_numDoc" class="grupo__cliente-label mt-2">Número de tarjeta</label>
                                <input type="number"  class="grupo__cliente-input w-100"name="u_numDoc" id="u_numDoc" placeholder="Digita el número de documento del cliente" value="'.$cliente_update["Identificacion"].'">
                            </div>
                        </div>
                        <div class="row ml-4">
                            <div class="grupo__cliente_u col-sm-6">
                                <label for="u_numTel" class="grupo__cliente-label mt-2">Número de teléfono</label>
                                <input type="text" class="grupo__cliente-input" name="u_numTel" id="u_numTel" placeholder="Cambia el número de teléfono del cliente." value="'.$cliente_update["Celular"].'">
                            </div>
                            <div class="grupo__cliente_u col-sm-6">
                                <label for="u_direccion" class="grupo__cliente-label mt-2">Dirección de domicilio</label>
                                <input type="text" class="grupo__cliente-input" name="u_direccion" id="u_direccion" placeholder="Cambia o añade una nueva dirección del cliente" value="'.$cliente_update["Direccion"].'">
                            </div>
                        </div>
                    <h6 class="mt-3 ml-4">Administrativo</h6>
                        <div class="row ml-4">
                            <div class="grupo__cliente-u col-sm-12">
                                <label for="u_tipoUsua" class="grupo__cliente-label">Actualmente, este usuario tiene un rango de <b class="b_rojo">'.$tipoUsua.'</b>, si quieres cambialo.</label>
                                <select id="u_tipoUsua" name="u_tipoUsua" class="grupo__cliente-select-tipo">
                                    <option selected value="'.$cliente_update["tipoUsua"].'">Dejar actual</option>
                                    <option value="0">cliente</option>
                                    <option value="1">administrador</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="pwdAntigua" value="'.$cliente_update["Contraseña"].'">
                        <input type="hidden" name="id" value="'.$cliente_update["UsuaCodigoFK"].'">
                        <input type="hidden" name="tipoDocAntiguo" value="'.$cliente_update["TipoDoc"].'">
                        <input type="hidden" name="tipoUsuaAntiguo" value="'.$cliente_update["tipoUsua"].'">
                        <input type="submit" value="Actualizar" class="grupo__enviar mt-4" name="actualizarClienteForm" id="btnEnviarCliente">
                    </form>                                            
                </div>';
            }            
        ?>                
    </div>
            
</div>
