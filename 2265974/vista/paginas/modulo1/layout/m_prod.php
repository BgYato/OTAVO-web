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
                window.location.href = "index.php?navegacion=catalogo";
                window.reload();
                </script>';                
            }
        ?>
        <div class="alert alert-danger formulario__mensaje" id="cerrarError">
            <span class="font-weight-bold float-right btnCerrarInfo"><a onclick="cerrarInfo('cerrarError');">X</a></span>
            <i class="fa-solid fa-circle-exclamation lead"></i>
            <b class="font-weight-bold">Crear un producto; </b>
            debes completar los campos con la información necesaria siguiendo los parametros indicados.
        </div>
        <div class="container">
        <form method="POST" id="crearProductoForm" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-lg-12">
                    <label for="imagenProd" class="formulairo__label w-100">
                        Cargar una imagen. <br>
                        <span class="form-control espacioImg mt-2">
                            Elige la imagen (PNG o JPEG)
                        </span>
                    </label>                    
                    <input type="file" name="imagenProd" id="imagenProd" class="inputFileProd" accept="image/x-png,image/jpeg">
                    <p class="small">Las imagenes deben ser de tipo PNG o JPEG, se recomiendan en medidas de 250x250px</p>
                </div>
                <div class="form-group col-lg-6 formulario__grupo" id="grupo__nombre">
                    <label for="nombreProd" class="formulario__label">Nombre del producto <span class="text-danger small">*</span></label>
                    <select name="nombreProd" id="nombreProd" class="form-control" required>
                        <option disabled selected>Selecciona una</option>
                        <option value="BG">Bolso guarda casco</option>
                        <option value="BM">Bolso maleto</option>
                    </select>
                    <p class="formulario__input-error small">El nombre debe tener la estructura habitual (nombre del producto, modelo-numero).</p>
                </div>
                <div class="form-group col-lg-6" id="grupo__modelo">
                    <label for="modeloProd" class="formulario__label">Modelo del producto <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="modeloProd"  placeholder="XX-00 o nombre" name="modeloProd">
                    </div>
                    <p class="formulario__input-error small">Debes seguir el formato (XX-00) en mayusculas.</p>
                </div>
                <div class="form-group col-lg-6" id="grupo__precio">
                    <label for="precioProd" class="formulario__label">Precio del producto <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="form-control formulario__input" id="precioProd"  placeholder="Ej; 100000" name="precioProd">
                    </div>
                    <p class="formulario__input-error small">El valor debe ser mayor a 10.000 COP.</p>
                </div>            
                <div class="form-group col-lg-6" id="grupo__cantidad">
                    <label for="cantidad" class="formulario__label">Cantidad de unidades del producto a registrar <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="form-control formulario__input" id="cantidad" placeholder="Cantidad de unidades" name="cantidadProd" min="10" max="100">
                    </div>
                    <p class="formulario__input-error small">La cantidad de existencias no puede ser mayor a 100 o menor a 10.</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6" id="grupo__talla">
                    <label for="tallaProd" class="formulario__label">Talla. <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="tallaProd" placeholder="M, S, L..." name="tallaProd" required>
                    </div>
                    <p class="formulario__input-error small">Se debe colocar solo una letra, sin números ni palabras.</p>
                </div>
                <div class="form-group col-lg-6">
                    <label for="categoria" class="formulario__label">Categoria. <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="categoria" placeholder="Añade la categoría del producto" name="categoriaProd" required>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="alto" class="formulario__label">Alto. (cm) <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="form-control formulario__input" id="alto" placeholder="Digita el alto del producto" name="altoProd" required>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label for="ancho" class="formulario__label">Ancho. (cm) <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="form-control formulario__input" id="ancho" placeholder="Digita el ancho del producto" name="anchoProd" required>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label for="fondo" class="formulario__label">Fondo. (cm) <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="form-control formulario__input" id="fondo" placeholder="Digita el fondo del producto" name="fondoProd" required>
                    </div>
                </div>
            </div>          
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="sintetico" class="formulario__label">Sintetico. <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="sintetico" placeholder="Añade el sintetico del producto" name="sintetico" required>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label for="forro" class="formulario__label">Forro. <span class="text-danger small">*</span></label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" id="forro" placeholder="Añade el forro del producto" name="forro" required>
                    </div>
                </div>
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
                    <h5>Información del producto</h5></div>
                    <section id="tabla-amplia">
                        <div class="container py-3">                                
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4" id="tabla-amplia">
                                    <div class="card-body text-center">                                                
                                        <img class="" src="public/img/uploads/'.$producto["ProdImagen"].'" alt="" >
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
                                                    <p class="mb-0 ">Nombre del producto:</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p class=" mb-0">'.$producto["ProdNombre"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 float-left">Precio:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">'.$producto["ProdPrecioVenta"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Cantidad:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">'.$producto["ProdCantidadStock"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Talla:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">'.$producto["ProdTalla"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Categoria</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="mb-0">'.$producto["ProdCategoria"].'</p>
                                                </div>                                                        
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="mb-0 ">Alto</p>
                                                    <p>'.$producto["ProdAlto"].'</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="mb-0 ">Ancho</p>
                                                    <p>'.$producto["ProdAncho"].'</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="mb-0 ">Fondo</p>
                                                    <p>'.$producto["ProdFondo"].'</p>
                                                </div>                                                        
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Sintetico:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class=" mb-0">'.$producto["ProdSintetico"].'</p>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0 ">Forro</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="mb-0">'.$producto["ProdForro"].'</p>
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
                                                <div class="col"><a href="index.php?navegacion=dashboard&p_d='.$producto["ProdCodigoPK"].'" class="btn btn-danger h-100 w-100">
                                                    <i class="fa-solid fa-trash w-100" style="font-size: 25px; padding: 10px;"></i>
                                                    Eliminar
                                                </a></div>                                                        
                                                <div class="col"><a href="index.php?navegacion=dashboard&p_u='.$producto["ProdCodigoPK"].'" class="btn btn-info h-100 w-100"> 
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

<div id="UProd" style="display: none;">
    <div class="container">    
    <?php    
        $actualizarProducto = controladorFormularios::ctrActualizarProducto();
        
        if ($actualizarProducto=="ok") {
            echo '<script>                                                                   
                    alert("Has actualizado este producto, serás redirigido al panel administrativo.");
                    window.location.href="index.php?navegacion=dashboard";
                </script>';              
        }
    ?>
    <?php
            if (isset($_GET["p_u"])) {
                $datoProducto = $_GET["p_u"];
                $productoUpdate = controladorFormularios::ctrSeleccionarRegistroProducto($datoProducto);                
                if ($productoUpdate["ProdCantidadStock"]!=null) {                    
                    $cantidad = $productoUpdate["ProdCantidadStock"];
                } else {                    
                    $cantidad = 0;                    
                }
                
                echo '<script>abrirModulo("producto", "UProd");</script>';

                //Cabera
                echo '<h3 class="text-center mt-3">Vas a editar el siguiente producto: '.$productoUpdate["ProdNombre"].'</h3 > <br>';            
                echo '<div class="alert alert-info">Recuerda no dejar ningún campo vacio, los campos que están llenos se pueden dejar así si no deseas realizar ningún cambio.</div>';

                echo '<div class="container">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mt-2">
                        <div class="form-group col-lg-12" id="grupo__modelo">
                            <label for="modeloProd" class="formulario__label">Nombre y modelo del producto <span class="text-danger small">*</span></label>
                            <p class="small">Edita el nombre y el modelo del producto, dejando la misma estructura que ya posee. </p>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" id="modeloProd" placeholder="" value="'.$productoUpdate["ProdNombre"].'" name="u_nombreProd">
                            </div>                            
                        </div>
                        <div class="form-group col-lg-6" id="grupo__precio">
                            <label for="precioProd" class="formulario__label">Precio del producto <span class="text-danger small">*</span></label>
                            <p class="small">Coloca el precio del producto sin puntos, signos ni nada. </p>
                            <div class="input-group">
                                <div class="input-group-prepend float-right">
                                    <div class="input-group-text bg-dark text-white"><strong>COP</strong></div>
                                </div>
                                <input type="number" class="form-control formulario__input" id="precioProd"  placeholder="'.$productoUpdate["ProdPrecioVenta"].'" name="u_precioProd">                                
                            </div>                            
                        </div>            
                        <div class="form-group col-lg-6" id="grupo__cantidad">
                            <label for="cantidad" class="formulario__label">Existencias del producto <span class="text-danger small">*</span></label>                            
                            <p class="small">Cambia el valor de las exitencias en stock. </p>
                            <div class="formulario__grupo-input">
                                <input type="number" class="form-control formulario__input" id="cantidad" placeholder="Cantidad de unidades" name="u_cantidadProd" min="10" max="100" value="'.$cantidad.'">
                            </div>
                            <p class="formulario__input-error small">La cantidad de existencias no puede ser mayor a 100 o menor a 10.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6" id="grupo__talla">
                            <label for="tallaProd" class="formulario__label">Talla. <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el tamaño del producto, colocando únicamente la inicia (M, L, S...).</p>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" id="tallaProd" placeholder="M, S, L..." name="u_tallaProd" required value="'.$productoUpdate["ProdTalla"].'">
                            </div>
                            <p class="formulario__input-error small">Se debe colocar solo una letra, sin números ni palabras.</p>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="categoria" class="formulario__label">Categoria. <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el tipo de categoría del producto.</p>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" id="categoria" placeholder="Añade la categoría del producto" name="u_categoriaProd" required value="'.$productoUpdate["ProdCategoria"].'">
                            </div>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="alto" class="formulario__label">Alto. (cm) <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el valor del alto del producto, solo digita el número.</p>
                            <div class="formulario__grupo-input">
                                <input type="number" class="form-control formulario__input" id="alto" placeholder="Digita el alto del producto" name="u_altoProd" required value="'.$productoUpdate["ProdAlto"].'">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="ancho" class="formulario__label">Ancho. (cm) <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el valor del ancho del producto, solo digita el número.</p>
                            <div class="formulario__grupo-input">
                                <input type="number" class="form-control formulario__input" id="ancho" placeholder="Digita el ancho del producto" name="u_anchoProd" required value="'.$productoUpdate["ProdAncho"].'">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="fondo" class="formulario__label">Fondo. (cm) <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el valor del fondo del producto, solo digita el número.</p>
                            <div class="formulario__grupo-input">
                                <input type="number" class="form-control formulario__input" id="fondo" placeholder="Digita el fondo del producto" name="u_fondoProd" required value="'.$productoUpdate["ProdFondo"].'">
                            </div>
                        </div>
                    </div>          
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="sintetico" class="formulario__label">Sintetico. <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el tipo de sintético del producto.</p>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" id="sintetico" placeholder="Añade el sintetico del producto" name="u_sintetico" required value="'.$productoUpdate["ProdSintetico"].'">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="forro" class="formulario__label">Forro. <span class="text-danger small">*</span></label>
                            <p class="small">Cambia el tipo de forro del producto.</p>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" id="forro" placeholder="Añade el forro del producto" name="u_forro" required value="'.$productoUpdate["ProdForro"].'">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idProd" value="'.$productoUpdate["ProdCodigoPK"].'">
                    <button type="submit" class="btn btn-primary w-100" id="formulario__boton-enviar" name="actualizarProducto">Actualizar el producto</button>                    
                    </form>            
            </div>';
            }            
        ?>   
    </div>
</div>

<div id="DProd" style="display: none;"> <!-- ELIMINAR CLIENTE -->
    <div class="container">
        <?php
            $eliminarProducto = controladorFormularios::ctrBorrarRegistroProducto();            
            if ($eliminarProducto=="ok") {                            
                echo '<div class="py-4">
                <script>
                    window.location="index.php?navegacion=dashboard";                           
                    alert("Has eliminado correctamente al producto, serás dirigido al panel administrativo.");
                </script>                
                </div>';
            }
        ?>    
        <?php 
            if (isset($_GET["p_d"])) {
                $datoProducto = $_GET["p_d"];
                $productoDelete = controladorFormularios::ctrSeleccionarRegistroProducto($datoProducto);

                echo '<script>abrirModulo("producto", "DProd");</script>';

                echo '<div class="py-4 m-5">
                <div class="card bg-danger">
                    <div class="card-header text-center text-uppercase h6 text-light">Estás a punto de eliminar un producto</div>
                    <div class="card-body text-light text-small"><p>Estás a punto de eliminar el siguiente producto; '.$productoDelete["ProdNombre"].'. ¿Estás seguro de eliminarlo de forma permanente
                        en nuestra base de datos?.
                    <div class="">
                        <form method="post" class="row">                            
                            <input type="submit" value="Sí, eliminar" class="btn w-100 btn-confirmar" name="confirmarEliminarProducto">
                            <input type="hidden" name="idProd" id="idProd" value="'.$productoDelete["ProdCodigoPK"].'">                            
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