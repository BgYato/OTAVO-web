<div class="container">
                <div class="row ml-4">                    
                    <div class="col-lg-8 my-3">
                        <table class="table">
                            <thead class="thead bg-primary text-white">
                                <tr>
                                <th scope="col" class="font-weight-bold">ID</th>
                                <th scope="col" class="font-weight-bold">NOMBRE</th>
                                <th scope="col" class="font-weight-bold">CORREO</th>
                                <th scope="col" class="font-weight-bold">CONTRASEÑA</th>
                                <th scope="col" class="font-weight-bold">ESTADO</th>
                                <th scope="col" class="font-weight-bold">HERRAMIENTAS</th>
                                </tr>
                            </thead>                        
                            <tbody> 
                                <?php foreach ($usuario as $key=>$value): ?>
                                <tr class="border-bottom">
                                    <th><?php echo $value["id_usuario"] ?></th>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td><?php echo $value["correo"] ?></td>
                                    <td><?php echo $value["password"] ?></td>
                                    <td><?php echo $value["tipoUsua"] ?></td>
                                    <td class="d-flex">
                                        <a href="index.php?navegacion=dashboard&u_id=<?php echo $value['id_usuario']; ?>" class="btn btn-danger w-100 ml-2 cta">Actualizar</a>
                                    </td>
                                </tr>                                                      
                            </tbody>
                            <?php endforeach ?>
                        </table>               
                    </div>     
                    <div class="col-lg-4 my-3">
                    <i class="fa-solid fa-pen icon ml-4"></i>
                    </div>                                                                      
                </div>               

                <?php                     

                    if (isset($_GET["u_id"])){
                        $d_dato=$_GET["u_id"];
                        $usuario=controladorFormularios::ctrSeleccionarRegistro($d_dato);
                        /* print_r($d_dato); */

                        echo'<script>                            
                            if ( window.history.replaceState ){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            content = document.getElementById("content");
                            UUsu = document.getElementById("UUsu");

                            content.style.display = "none";
                            UUsu.style.display = "block";
                        </script>';

                        echo '
                        <div class="row ml-4">
                                <div class="col-lg-9 m-y">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="font-weight-bold"> Usuario seleccionado '.$usuario["nombre"].'</h6>
                                        </div>
                                        <div class="card-body">
                                        <div>                
                                            <form method="POST" action="index.php?navegacion=dashboard">                                    
                                                <div class="form-group">
                                                    <label for="correo">Nombre del usuario</label>
                                                    <input type="text" class="form-control" id="correo" name="nuevo_nombre" value="'.$usuario["nombre"].'">                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="correo">Correo del usuario</label>
                                                    <input type="email" class="form-control" id="correo" name="nuevo_correo" value="'.$usuario["correo"].'">                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="pwd">Contraseña</label>
                                                    <input type="password" class="form-control" id="pwd" name="nueva_password" placeholder="Contraseña nueva">
                                                </div>                                                
                                                <input type="hidden" class="form-control" name="actual_password" value="'.$usuario["password"].'">
                                                <input type="hidden" class="form-control" name="u_id_usuario" value="'.$usuario["id_usuario"].'">                                                

                                                <input type="submit" class="mt-4 btn btn-primary w-100" value="Actualizar">
                                            </form>                                        
                                        </div>                                        
                                        </div> 
                                    </div>                
                                </div>
                            </div>                         
                        ';
                    }

                    $actualizar = controladorFormularios::ctrActualizarRegistro();              
                    if($actualizar == "actualizado"){                                                
                        echo'<script>
                                if ( window.history.replaceState ){                           }
                                    window.location="index.php?navegacion=dashboard"         
                                    window.history.replaceState( null, null, window.location.href);                                                          
                                    content = document.getElementById("content");
                                    RUsu = document.getElementById("RUsu");

                                    content.style.display = "none";
                                    RUsu.style.display = "block";                                    
                                }                               
                                
                                </script>';
                        echo'<div class="alert alert-success m-4">El usuario ha sido actualizado con exito</div>';
                    }
                    ?>                                                    
            </div>