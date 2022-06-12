<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="contenido-1">
    <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
      <a class="navbar-brand" href="#">COMPRA</a>
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading1">Descripción</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading2">Colores</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Listado</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
            <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
        <p><img src="./public/img/imagen_4.jpg" class="card-img-top" style="width: 30%;"></p>
        <h4 id="scrollspyHeading1">CASCO MCD8</h4>  
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eligendi omnis hic tempora alias commodi asperiores soluta nemo sapiente, suscipit, maiores ullam voluptatibus quasi enim repudiandae ut amet nobis vitae!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eligendi omnis hic tempora alias commodi asperiores soluta nemo sapiente, suscipit, maiores ullam voluptatibus quasi enim repudiandae ut amet nobis vitae!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eligendi omnis hic tempora alias commodi asperiores soluta nemo sapiente, suscipit, maiores ullam voluptatibus quasi enim repudiandae ut amet nobis vitae!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eligendi omnis hic tempora alias commodi asperiores soluta nemo sapiente, suscipit, maiores ullam voluptatibus quasi enim repudiandae ut amet nobis vitae!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eligendi omnis hic tempora alias commodi asperiores soluta nemo sapiente, suscipit, maiores ullam voluptatibus quasi enim repudiandae ut amet nobis vitae!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eligendi omnis hic tempora alias commodi asperiores soluta nemo sapiente, suscipit, maiores ullam voluptatibus quasi enim repudiandae ut amet nobis vitae!</p>
        <h4 id="scrollspyHeading2">Paleta de colores</h4>
        <p><input type="color"></p>
        <h4 id="scrollspyHeading3">Cantidad a comprar</h4>
        <p><input type="number" id="tentacles" name="tentacles"
          min="1" max="10"></p>
        <h4 id="scrollspyHeading4">Información.</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem commodi eius inventore itaque dolorum nostrum aperiam tenetur cum iure eum.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem commodi eius inventore itaque dolorum nostrum aperiam tenetur cum iure eum.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem commodi eius inventore itaque dolorum nostrum aperiam tenetur cum iure eum.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem commodi eius inventore itaque dolorum nostrum aperiam tenetur cum iure eum.</p>
        <h4 id="scrollspyHeading5">Confirmar compra.</h4>
        <a href="index.php?navegacion=exito" class="btn btn-primary">¡Comprar!</a>
    </div>

  </div>
  
</body>
</html>