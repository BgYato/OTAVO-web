<!-- CONEXIÓN A LA BASE DE DATOS DE FORMA INSTANTANEA -->
    <?php 
        $namedb = "otavo_db";

        $conexion=mysqli_connect('localhost','root','',$namedb);
    ?>

<div class="container-fluid">
    <div class="py-5 text-center">
        <p class="h1 text-uppercase">
            Bienvenido al panel administrativo.
        </p>
        ESTADO GENERAL
            <?php
                if ($conexion->errno) {
                    echo "La conexión con la base de datos no ha funcionado correctamente";
                } else {
                    echo "<p style='color: green;'>La conexión con la base de datos (";
                    echo $namedb;
                    echo ") está en funcionamiento.</p>";
                }
            ?>        
        <p style="font-size: 25px;" class="py-3">
            Selecciona alguna de las siguientes opciones que quieras administrar:

        </p>                        
            
        <div class="row ">
            <div class="mr-3 ml-1 "> <!-- GESTIÓN DE USUARIOS -->
                <a href="#" onclick="mostrarEle('1'); return false;" class="text-reset"> 
                    <article class="">                    
                        <div class=" adm_btn card p-5 " id="btn-1">
                                <i class="fa-solid fa-user"></i>
                                <p>Gestionar usuarios</p>                                                            
                        </div>
                    </article>
                </a>                                            
            </div>
            <div class="mr-3"> <!-- GESTIÓN DE PRODUCTOS -->
                <a href="#" onclick="mostrarEle('2'); return false" class="text-reset"> 
                    <article class="">                    
                        <div class="adm_btn card p-5">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <p>Gestionar productos</p>                                                            
                        </div>
                    </article>
                </a>                                                           
            </div>
            <div class=" mr-3"> <!-- GESTIÓN DE VENTAS -->
                <a href="#" onclick="mostrarEle('3'); return false" class="text-reset"> 
                    <article>                    
                        <div class="adm_btn card p-5">
                                <i class="fa-solid fa-arrow-trend-up"></i> 
                                <p>Gestionar ventas</p>                        
                        </div>
                    </article>
                </a>                                                            
            </div>
            <div> <!-- GESTIÓN DE CLIENTES -->
                <a href="#" onclick="mostrarEle('4'); return false" class="text-reset"> 
                    <article>                    
                        <div class="adm_btn card p-5">
                                <i class="fa-solid fa-person"></i>
                                <p>Gestionar clientes</p>                        
                        </div>
                    </article>
                </a>                                                            
            </div>
        </div>
        <div class="row" class="btn-black" id="btn-back" style="display: none;">
            <!-- <a href="javascript:closeAll()"> --><button type="button" class="btn btn-danger mt-4 col-12" onclick="closeAll()"> Cerrar el panel. </button><!-- </a> -->
        </div>            
        <hr style="width: 100%;">
    </div>
     

    <div id="block" style="display: block;">
        <i class="fa-solid fa-triangle-exclamation icon-warning-dashboard"></i>
        <h3 class="text-warning-dashboard">No has seleccionado ningún modulo/opción que administrar, no se mostrará nada por el momento</h3>
    </div>

    <?php
            $registro = controladorFormularios::ctrRegistro();
            $registroPr = controladorFormularios::ctrRegistroProd();

            if ($registro == "ok") {
                echo ' <script>
                        alert("Usuario creado con exito, puedes seguir navegando.");
                        </script>';                
            }

            if ($registroPr == "ok") {
                echo ' <script>
                        alert("Producto creado con exito, puedes seguir navegando.");
                        </script>';                
            }
        ?>

<!-------------------------------------------------------------
--------------- APARTADOS PARA LAS GESTIONES ------------------
----------------------------------------------------------- -->

<!-- APARTADO PARA LA GESTIÓN DE USUARIOS -->
<div id='1' style="display: none;"> <!-- GESTIÓN DE USUARIOS -->
    <h3 class="text-center">GESTIÓN DE USUARIOS</h3> <div>            
        <div> <!-- Crear perfil de usuario -->
            <h4>
                Crear un perfil de usuario: 
            </h4>
            <br>
            <div class="mb-5">                                                    
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <label for="nombre">Nombre del usuario</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Coloca un nombre de usuario" name="nombre">
                        </div>
                        <div class="form-floating">
                            <label for="correo">Correo eléctronico</label>
                            <input type="email" class="form-control" id="correo" placeholder="example@example.com" name="email">
                        </div>
                        <div class="form-floating">
                            <label for="pwd">Contraseña del usuario</label>
                            <input type="password" class="form-control" id="pwd" placeholder="*********" name="pwd">                    
                        </div>                                
                        <button type="submit" class="btn btn-danger mt-3 col-12 mb-3">Crear</button>
                    </form>                            
            </div>
        </div>
        <div class="mb-5">
            <h4>Actualizar un usuario:</h4>
                <p class="text-center" style="font-size: 1.2rem">A continuación, selecciona el ID del usuario al que deseas actualizar su información: </p>            
                <?php
                    require_once "vista/paginas/modulo1/layout/u_lista.php";
                ?>
            </div>
        </div>
        <div><!-- CONSULTA DE USUARIOS -->
            <h4>OBSERVAR LA TABLA DE USUARIOS INSERTADOS</h4>
            <p>Da click al siguiente botón para poder ver la tabla con el contenido deseado</p>
            <button class="btn btn-danger mt-3 col-12 mb-3" onclick="showTable()">Ver tabla</button>
            <div id="tabla-oculta" style="display: none;">
            <?php
                require_once "vista/paginas/modulo1/layout/u_tabla.php";
            ?>
            </div>
        </div>   
        <div><!-- ELIMINAR USUARIOS -->
            <h4>ELIMINAR UN USUARIO DE LA BASE DE DATOS</h4>
            <p>Selecciona el ID del usuario que desees <strong>eliminar</strong> de forma permanente en la base de datos.</p>

        </div>         
    </div>    

</div>

<!-- APARTADO PARA LA GESTIÓN DE PRODUCTOS -->
<div id='2' style="display: none;">
    <div>
        <h4>INSERTAR UN PRODUCTO EN LA BASE DE DATOS<br></h4>
        <p>Para poder crear un producto, por favor complete los campos necesarios:</p>
        <form class="form-horizontal" action="" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Nombre:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa el nombre del producto">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="precio">Precio:</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingresa el valor del producto" min="10000" max="1000000">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cantidad">Cantidad:</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingresa las existencias del producto" min="10" max="100">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="unidad">Unidad media:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="unidad" name="unidad" placeholder="Ingresa la unidad media del producto (KG)">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="descripcion">Descripción del producto:</label>
                <p class="col-sm-10 text-danger"><small>Agregue la descripción que el producto tendrá a la hora de lanzarse a la venta (mínimo 50 caracteres)</small></p>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success col-sm-12">AGREGAR</button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div>
        <h4>Actualizar producto:</h4>
            <p>En construccion</p>
    </div>
    <hr>
    <div>
        <h4>Consultar productos</h4>
        <p>De click al botón para poder ver la tabla con los productos insertados</p>       
        <br>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark" align="center">
                <tr>
                    <th class="tabla-header">ID</th>
                    <th class="tabla-header">NOMBRE</th>
                    <th class="tabla-header">PRECIO</th>
                    <th class="tabla-header">CANTIDAD</th>
                    <th class="tabla-header">UNIDAD</th>
                    <th class="tabla-header">DESCRIPCION</th>       
                    <th colspan="2">OPCIONES</th>     
                </tr>
            </thead>

            <?php 
            $sql="SELECT * from producto";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tbody>
                <tr>
                    <td><?php echo $mostrar['ProdCodigoPK'] ?></td>
                    <td><?php echo $mostrar['ProdNombre'] ?></td>
                    <td><?php echo $mostrar['ProdPrecioVenta'] ?></td>
                    <td><?php echo $mostrar['ProdCantidadStock'] ?></td>
                    <td><?php echo $mostrar['ProdUnidadMedida'] ?></td>
                    <td class="col-sm-4"><?php echo $mostrar['ProdDescripcion'] ?></td>
                    <td align="center" class="btn btn-warning col-sm-6 py-3">Editar<i class="fa-solid fa-pen-to-square"></i></td>
				    <td align="center" class="btn btn-danger col-sm-6 py-3">Borrar <i class="fa-solid fa-trash"></i> </td>
                </tr>
            </tbody>
            <?php 
            }
            ?>
        </table>
    </div>
</div>

<!-- APARTADO PARA LA GESTIÓN DE VENTAS -->
<div id="3" style="display: none;">
    <?php
        require_once "vista/paginas/modulo1/layout/ventas.php"
    ?>
</div>

<!-- APARTADO PARA LA GESTIÓN DE CLIENTES -->
<div id="4" style="display: none;">
    <h3 class="text-center">GESTIÓN DE CLIENTES</h3>
</div>


<div class="cuenta__relleno"></div>
   
</div>

        </div>