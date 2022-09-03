<?php $producto = controladorFormularios::ctrSeleccionarRegistroProducto(null);?>
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

                    <!--Card Title-->
                    <h4 class="card-title text-reset"><strong><a href=""><?php echo $mostrar["ProdNombre"]; ?></a></strong></h4>

                    <!-- Card Description-->
                    <p class="card-text"><?php echo $mostrar["ProdDescripcion"]; ?></p>
                    <p class="price"><?php echo $mostrar["ProdPrecioVenta"]; ?> COP</p>                   
                    <!--Card footer-->
                    <div class="card-footer bg-dark">
                        <a id="enlaceVenta" href="index.php?navegacion=comprar&p_id=<?php echo $mostrar["ProdCodigoPK"]?>">MÁS INFORMACIÓN</a>
                    </div>


                </div>
            </div>
        </div>    
        <?php endforeach; ?>
    </div>
</div>                
</div>