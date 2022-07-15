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
    <div class="container">
        <div class="row ml-4 mt-4">
        <form class="col-sm-10" method="POST">
            <h4>Usuario</h4>
            <div class="dropdown-divider"></div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombreUsuario">Usuario</label>
                    <input type="text" class="form-control" id="nombreUsuario" placeholder="Coloque el nombre del usuario" name="nombreUsuario">
                </div>
                <div class="form-group col-md-6">
                    <label for="correoUsuario">Correo</label>
                    <input type="email" class="form-control" id="correoUsuario" placeholder="Coloque el correo del usuario" name="correoUsuario">
                </div>            
            </div>
            <div class="form-group">
                <label for="pwdUsuario">Contraseña</label>
                <input type="password" class="form-control" id="pwdUsuario" placeholder="Coloque la contraseña del usuario" name="pwdUsuario">
            </div>
            <h4>Cliente</h4>
            <div class="dropdown-divider"></div>
            <div class="form-row">                
                <div class="form-group col-md-6">
                <label for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" id="nombreCliente" placeholder="Coloque el nombre del cliente" name="nombreCliente">
                </div>
                <div class="form-group col-md-6">
                <label for="apellidoCliente">Password</label>
                <input type="text" class="form-control" id="apellidoCliente" placeholder="Coloque el apellido del cliente" name="apellidoCliente">
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
                    <label for="numDoc">Número de documento</label>
                    <input type="text" class="form-control" id="numDoc" placeholder="Escribe el número del documento" name="numDoc">
                </div>
            </div>            
            <div class="form-group">
                <label for="numTel">Número de teléfono</label>
                <input type="text" class="form-control" id="numTel" placeholder="Escribe el número de teléfono" name="numTel">
            </div>
            <div class="form-group">
                <label for="direccionCliente">Dirección</label>
                <input type="text" class="form-control" name="direccionCliente" id="direccionCliente" placeholder="Coloca la dirección del cliente">
            </div>                                        
            <button type="submit" class="btn btn-primary col-sm-12" name="registroCliente">Agregar</button>
            </form>
        </div>        
    </div> 
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