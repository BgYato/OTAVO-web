<header class="header">
    <div class="container">
        <!-- NavBar -->
        <nav class="row text-white justify-content-between align-items-center text-uppercase pt-5">
            <!-- logo -->
            <a href="#" class="col-auto text-reset">						
            <i class="fa-solid fa-cart-shopping"></i>
                COMPRAR
            </a>                
        </nav>	                                                      
    </div>
</header>
<?php
  if (isset($_GET["p_id"])) {
    $id = $_GET["p_id"];
    $producto = controladorFormularios::ctrSeleccionarRegistroProducto($id);

    echo '<div class="container-fluid">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 rounded d-flex justify-content-center align-items-center">
                <img src="public/img/uploads/'.$producto["ProdImagen"].'" class="mt-2" alt="">
                </div>
                <div class="col-lg-8">
                  <h4 class="text-center mt-4">'.$producto["ProdNombre"].'</h4>
                  <div class="float-left">
                    <h6>Detalles del producto</h6>
                    <ul>
                      <li>Nombre: '.$producto["ProdNombre"].'</li>
                      <li>Precio: '.$producto["ProdPrecioVenta"].' COP</li>
                      <li>Cantidades: '.$producto["ProdCantidadStock"].'</li>                                  
                      <div class="">
                        <li>Descripción:
                          <ul>
                            <li>Talla: '.$producto["ProdTalla"].'</li>
                            <li>Categoria: '.$producto["ProdCategoria"].'</li>
                            <li>Alto: '.$producto["ProdAlto"].' cm</li>
                            <li>Ancho: '.$producto["ProdAncho"].' cm</li>
                            <li>Fondo: '.$producto["ProdFondo"].' cm</li>
                            <li>Sintetico: '.$producto["ProdSintetico"].'</li>
                            <li>Forro: '.$producto["ProdForro"].'</li>
                          </ul>
                        </li>
                      </div>
                    </ul>
                  </div>
                </div>
              </div>';
              if (!isset($_SESSION["sesion"])){
                echo '<div class="alert alert-danger w-100 mt-2"><i class="fa-solid fa-circle-exclamation text-weigth-bold lead mr-2"></i><strong>Comprar producto: </strong>
                        Aún no puedes comprar productos, no has iniciado sesión, hazlo <a href="index.php?navegacion=cuenta">aquí</a>.
                      </div>
                      
                      <a href="" class="btn bg-dark w-100 text-white mt-2 disabled">Continuar.</a>';
              } elseif ($producto["ProdCantidadStock"]<=0) {
                echo '<div class="alert alert-danger w-100 mt-2"><i class="fa-solid fa-circle-exclamation text-weigth-bold lead mr-2"></i><strong>Comprar producto: </strong>
                        Este producto está actualmente agotado en existencias, no podrás adquirirlo.
                      </div>
                      
                      <a href="" class="btn bg-dark w-100 text-white mt-2 disabled">Continuar.</a>';
              } else {
                echo '<a href="#" onclick="confirmarVenta()" class="btn bg-dark w-100 text-white mt-2" id="btnVenta" style="display: block;">Continuar.</a>';
              }              
              echo'  </div>
              </div>';
  }
?>

<div class="dropdown-divider"></div>

<div class="ml-5" id="terminarVenta" style="display: none;">
<h5>Estás a punto de finalizar la compra.</h5> 
  <form method="post" action="index.php?navegacion=exito">
    <ul>
      <li class="mb-2">Nombre del producto: <?php echo $producto["ProdNombre"];?></li>
      <li class="mb-2">Valor del producto: <?php echo $producto["ProdPrecioVenta"];?> COP</li>
      <li class="mb-2">Cantidad a comprar: <input type="number" name="cantidadCompra" id="cantidadCompra" max="<?php echo $producto["ProdCantidadStock"];?>" min="1" required></li>
    </ul>
    <input type="hidden" name="idProd" value="<?php echo $producto["ProdCodigoPK"];?>">
    <input type="hidden" name="precioVenta" value="<?php echo $producto["ProdPrecioVenta"];?>">
    <input type="hidden" name="cantidadStock" value="<?php echo $producto["ProdCantidadStock"];?>">
    <input type="submit" value="Comprar" class="btn bg-dark text-white w-100" name="validarCompra">
  </form>
</div>

<div class="cuenta__relleno"></div>
<div class="cuenta__relleno"></div>