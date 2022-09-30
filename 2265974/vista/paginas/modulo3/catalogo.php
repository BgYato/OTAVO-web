<?php $producto = controladorFormularios::ctrSeleccionarRegistroProducto(null);?>

<?php if($producto==null): ?>
    <div class="contenido-1"></div>
<?php else: ?>
    <div class="contenido-1">
<div class="container">        
    <div class="row">    
        <?php foreach ($producto as $key => $mostrar): ?>
        <div class="col-sm-4">
            <div class="card card-cascade card-ecommerce wider shadow mb-5 ">
                <!--Imagen-->
                <div class="view view-cascade overlay text-center">
                    <img class="card-img-top" src="public/img/404img.jpg" alt="" >
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="card-body card-body-cascade text-center">

                    <?php if ($mostrar["ProdCantidadStock"]==0) {
                        echo '<div class="alert alert-danger w-100 small">Producto agotado</div>';
                    }?>
                    <!--Card Title-->
                    <h4 class="card-title text-reset"><strong><a href=""><?php echo $mostrar["ProdNombre"]; ?></a></strong></h4>

                    <!-- Card Description-->                    
                    <p class="card-text"><?php echo $mostrar["ProdDescripcion"]; ?></p>
                    <p class="price"><?php echo $mostrar["ProdPrecioVenta"]; ?> COP</p>                   
                    <!--Card footer-->
                    <div class="card-footer bg-dark">
                        <a id="enlaceVenta" href="<?php if($mostrar["ProdCantidadStock"]==0){
                            echo '#';
                        } else {
                            echo 'index.php?navegacion=comprar&p_id='.$mostrar["ProdCodigoPK"].'';
                        }?>">
                            MÁS INFORMACIÓN
                        </a>
                    </div>


                </div>
            </div>
        </div>    
        <?php endforeach; ?>
    </div>
</div>                
</div>
<?php endif; ?>