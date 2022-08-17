<div id="CProd" style="display: none;">
    <div class="container">
        <h4 class="text-center text-weight-bold py-4">CREA UN PRODUCTO</h4>
        <div class="alert alert-info" id="cerrarInfo" style="display: block;">
            <span class="font-weight-bold float-right btnCerrarInfo"><a onclick="cerrarInfo('cerrarInfo');">X</a></span>
            <i class="fa-solid fa-circle-info lead"></i>
            <b class="font-weight-bold">Crear un producto; </b>
            al crear un producto este será cargado con una imagen por defecto la cual se actualiza en un plazo de 24 horas.                        
        </div>
        <button onclick="cerrarInfo('cerrarExito');" id="btnOculto" style="display: none;">ocultar</button>
        <button onclick="abrirModulo('producto', 'RProd');" id="btnOcultoVer" style="display: none;">ocultar</button>
        <?php 
            $registro= controladorformularios::ctrRegistroProd();              
            if($registro == "ok"){
                echo'<script>
                if ( window.history.replaceState ){
                    window.history.replaceState( null, null, window.location.href);
                }           
                abrirModulo("producto", "CProd");
                </script>';
                echo '
                <div class="alert alert-success" id="cerrarExito">
                <span class="font-weight-bold float-right btnCerrarInfo"><label for="btnOculto">X</label></span>
                <i class="fa-solid fa-circle-check lead"></i>
                <b class="font-weight-bold">Crear un producto; </b>
                producto creado con exito, ya puedes consultarlo en la tabla de productos. <label for="btnOcultoVer" class="btnCerrarInfo">ver</label></span>
                </div>
                ';
            }
        ?>
        <div class="alert alert-danger formulario__mensaje" id="cerrarError">
            <span class="font-weight-bold float-right btnCerrarInfo"><a onclick="cerrarInfo('cerrarError');">X</a></span>
            <i class="fa-solid fa-circle-exclamation lead"></i>
            <b class="font-weight-bold">Crear un producto; </b>
            debes completar los campos con la información necesaria siguiendo los parametros indicados.
        </div>
        <div class="container">
        <form method="POST" id="crearProductoForm">
            <div class="row">
                <div class="form-group col-lg-6 formulario__grupo" id="grupo__nombre">
                    <label for="nombreProd" class="formulario__label">Nombre del producto</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="nombreProd"  placeholder="Ingresa el nombre de producto" name="nombreProd">                            
                    </div>
                    <p class="formulario__input-error small">El nombre debe tener la estructura habitual (nombre del producto, modelo-numero).</p>
                </div>
                <div class="form-group col-lg-6" id="grupo__precio">
                    <label for="precio" class="formulario__label">Precio del producto</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="precio"  placeholder="Ingresa el precio del producto" name="precioProd">
                    </div>
                    <p class="formulario__input-error small">El precio no debe ser mayor a 100.000 COP, únicamente digitar el número.</p>
                </div>
            </div>
            <div class="form-group" id="grupo__cantidad">
                <label for="cantidad" class="formulario__label">Cantidad de unidades del producto a registrar</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="cantidad" placeholder="Cantidad de unidades" name="cantidadProd">
                </div>
                <p class="formulario__input-error small">La cantidad de existencias no puede ser mayor a 100 o menor a 10.</p>
            </div>
            <div class="row">
                <div class="form-group col-lg-6" id="grupo__medida">
                    <label for="medidaProd" class="formulario__label">Peso máximo soportado por el producto.</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="medidaProd" placeholder="Colocar en números cuanto es el máximo peso permitido" name="medidaProd">
                    </div>
                    <p class="formulario__input-error small">El peso debe ser digitado en número, sin números ni caracteres especiales..</p>
                </div>
                <div class="form-group col-lg-6">
                    <label for="unidad" class="formulario__label">Unidad de medida</label>
                    <select name="unidadProd" id="unidad" class="form-control" required>
                        <option disabled selected>Selecciona una</option>
                        <option value="kilogramos">Kilogramos</option>
                        <option value="litros">Litros</option>
                    </select>                    
                </div>
            </div>
            <div class="form-group" id="grupo__desc">
                <label for="descProd" class="formulario__label">Descripción del producto</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" id="dscripcion" placeholder="Ingresa la descripcion del producto" name="descProd">
                </div>
                <p class="formulario__input-error small">La descripcion debe ser mayor a 50 caracteres y no puede superar los 500.</p>
            </div>            
            
            <button type="submit" class="btn btn-primary w-100" id="formulario__boton-enviar" name="crearProductoForm">Crear</button>
            </form>            
    </div>
        </div>
</div>

<div id="RProd" style="display: none;">
    <?php 
        $producto = controladorFormularios::ctrSeleccionarRegistroProducto(null);    
    ?>
    <div class="container">
    <?php
        if (isset($_GET["p_id"])) {
            echo '<script>abrirModulo("producto", "RProd");</script>';
            $datoProducto = $_GET["p_id"];
            $producto = controladorFormularios::ctrSeleccionarRegistroProducto($datoProducto);

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
                                        <i class="fa-solid fa-bag-shopping icon" style="color: #eeeeee;"></i>
                                        <h5 class="my-3">'.$producto["ProdNombre"].'</h5>
                                        <p class="mb-1">'.$producto["ProdPrecioVenta"].'</p>
                                        <p class="mb-4">'.$producto["ProdCantidadStock"].'</p>
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
                                                    <p class=" mb-0">a</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 float-left">Correo:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">a</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Telefono:</p>
                                                </div>
                                                <div class="col-sm-9 ">
                                                    <p class=" mb-0">a</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Documento:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">a</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Direccion</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="mb-0">a</p>
                                                </div>                                                        
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Tipo producto</p>
                                                </div>
                                                <div class="col-sm-9 mb-4">
                                                    <p class="mb-0">a</p>
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
                                                <div class="col"><a href="index.php?navegacion=dashboard&p_d=1" class="btn btn-danger h-100 w-100">
                                                    <i class="fa-solid fa-trash w-100" style="font-size: 25px; padding: 10px;"></i>
                                                    Eliminar
                                                </a></div>                                                        
                                                <div class="col"><a href="index.php?navegacion=dashboard&p_u=1" class="btn btn-info h-100 w-100"> 
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
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <?php foreach ($producto as $key => $mostrar): ?>
            <tbody>
                <tr>
                    <td><?php echo $mostrar["ProdCodigoPK"]; ?></td>
                    <td><?php echo $mostrar["ProdNombre"]; ?></td>
                    <td><?php echo $mostrar["ProdPrecioVenta"]; ?></td>
                    <td><?php echo $mostrar["ProdCantidadStock"]; ?></td>                    
                    <td><a href="index.php?navegacion=dashboard&p_id=<?php echo $mostrar['ProdCodigoPK']; ?>" class="btn btn-dark w-100 h-100">Ampliar</a></td>
                </tr>
                <tr>                                                
                </tr>
            </tbody>            
            <?php endforeach; } ?>
        </table>
    </div>
</div>            

<div id="UProd" style="display: block;">
    <div class="container">
    <div class="py-5 m-3">
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
                    <label for="u_tipoDoc" class="grupo__cliente-label mt-2">Tipo documento (actual <b class="b_rojo">'.$cliente_update["ClieTipoIdentificacion"].'</b>)</label>
                    <select id="u_tipoDoc" name="u_tipoDoc" class="grupo__cliente-select">
                        <option selected value="'.$cliente_update["ClieTipoIdentificacion"].'">Dejar actual</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CedulaCiudadania">Cedula de ciudadania</option>
                    </select>
                </div>
                <div class="grupo__cliente_u col-sm-8">
                    <label for="u_numDoc" class="grupo__cliente-label mt-2">Número de tarjeta</label>
                    <input type="number"  class="grupo__cliente-input w-100"name="u_numDoc" id="u_numDoc" placeholder="Digita el número de documento del cliente" value="'.$cliente_update["ClieIdentificacion"].'">
                </div>
            </div>
            <div class="row ml-4">
                <div class="grupo__cliente_u col-sm-6">
                    <label for="u_numTel" class="grupo__cliente-label mt-2">Número de teléfono</label>
                    <input type="text" class="grupo__cliente-input" name="u_numTel" id="u_numTel" placeholder="Cambia el número de teléfono del cliente." value="'.$cliente_update["ClieCelular"].'">
                </div>
                <div class="grupo__cliente_u col-sm-6">
                    <label for="u_direccion" class="grupo__cliente-label mt-2">Dirección de domicilio</label>
                    <input type="text" class="grupo__cliente-input" name="u_direccion" id="u_direccion" placeholder="Cambia o añade una nueva dirección del cliente" value="'.$cliente_update["ClieDireccion"].'">
                </div>
            </div>
        <h6 class="mt-3 ml-4">Administrativo</h6>
            <div class="row ml-4">
                <div class="grupo__cliente-u col-sm-12">
                    <label for="u_tipoUsua" class="grupo__cliente-label">Actualmente, este usuario tiene un rango de <b class="b_rojo">'.$cliente_update["tipoUsua"].'</b>, si quieres cambialo.</label>
                    <select id="u_tipoUsua" name="u_tipoUsua" class="grupo__cliente-select-tipo">
                        <option selected value="'.$cliente_update["tipoUsua"].'">Dejar actual</option>
                        <option value="cliente">cliente</option>
                        <option value="administrador">administrador</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="pwdAntigua" value="'.$cliente_update["password"].'">
            <input type="hidden" name="id" value="'.$cliente_update["UsuaCodigoFK"].'">
            <input type="hidden" name="tipoDocAntiguo" value="'.$cliente_update["ClieTipoIdentificacion"].'">
            <input type="hidden" name="tipoUsuaAntiguo" value="'.$cliente_update["tipoUsua"].'">
            <input type="submit" value="Actualizar" class="grupo__enviar mt-4" name="actualizarClienteForm" id="btnEnviarCliente">
        </form>                                            
    </div>
    <?php
            if (isset($_GET["d_id_u"])) {
                $datoCliente_u = $_GET["d_id_u"];
                $cliente_update = controladorFormularios::ctrSeleccionarRegistroClienteUsuario($datoCliente_u);                                
                

                echo '<script>gestClie(3);</script>';                

                echo '';
            }            
        ?>   
    </div>
</div>