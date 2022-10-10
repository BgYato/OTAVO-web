<button onclick="cerrarInfo('cerrarExito');" id="btnOculto" style="display: none;">ocultar</button>
<button onclick="cerrarInfo('cerrarError');" id="btnOcultoError" style="display: none;">ocultar</button>

<div class="bodyAcerca">
	<div class="containerAcerca">			
		<div class="cardAcerca">
			<center><i class="fa-solid fa-bullseye icon mt-2"></i></center>
			<div class="contenidoAcerca">
				<h3>Mision</h3>
				<p>Para conocer mas oprime "Leer mas"</p>
				<a href="#" onclick="acercaTab('mision');">Leer mas</a>
			</div>
		</div>
		<div class="cardAcerca">
			<center><i class="fa-solid fa-calendar-days icon mt-2"></i></center>
			<div class="contenidoAcerca">
				<h3>Vision</h3>
				<p>Para conocer mas oprime "Leer mas"</p>
				<a href="#" onclick="acercaTab('vision');">Leer mas</a>
			</div>
		</div>
		<div class="cardAcerca">
			<center><i class="fa-solid fa-building icon mt-2"></i></center>	
			<div class="contenidoAcerca">
				<h3>Valores</h3>
				<p>Para conocer mas oprime "Leer mas"</p>
				<a href="#" onclick="acercaTab('valores');">Leer mas</a>
			</div>
		</div>
		<div class="cardAcerca">
			<center><i class="fa-solid fa-map icon1 mt-2 mb-4"></i></i></center>
			<div class="contenidoAcerca">
				<h3>Dirección</h3>
				<p>Para conocer mas oprime "Leer mas"</p>
				<a href="#" onclick="acercaTab('direccion');">Leer mas</a>
			</div>
		</div>
		<div class="cardAcerca">
			<center><i class="fa-solid fa-phone icon mt-2"></i></center>
			<div class="contenidoAcerca">
				<h3>Contactenos</h3>
				<p>Para conocer mas oprime "Leer mas"</p>
				<a href="#" onclick="acercaTab('contactenos');">Leer mas</a>
			</div>
		</div>
	</div>	
</div>
	<?php
		$contactoExito = controladorFormularios::ctrRegistrarContacto();

		if ($contactoExito=="ok") {
			echo '<div class="alert alert-success" id="cerrarExito">
			<span class="font-weight-bold float-right btnCerrarInfo"><label for="btnOculto">X</label></span>		
			<b class="font-weight-bold">Crear un contacto; </b>
			has enviado correctamente el mensaje, permanece atento al correo proporcionado para un mensaje de devuelta.
			</div>';
		} elseif ($contactoExito=="no") {
			echo '<div class="alert alert-danger" id="cerrarError">
			<span class="font-weight-bold float-right btnCerrarInfo"><label for="btnOcultoError">X</label></span>		
			<b class="font-weight-bold">Crear un contacto; </b>
			ha ocurrido un error durante el proceso, vuelve a intentarlo más tarde.
			</div>';
		}
	?>			
<div class="dropdown-divider"></div>
<div id="relleno" style="display: block;">
	<div class="nosotros">
		La empresa OTAVO se dedica a la producción y venta de bolsos para los cascos de motociclistas además de bolsos maletos escenciales para llevar a cualquier lado.
	</div>
</div>

<div id="vision" style="display:none;">
	<div class="nosotros">
		<h1>Visión</h1>
		<p>
		Para el año 2025 OTAVO será reconocida a nivel nacional, como una marca que diseña, produce y comercializa, calzado y marroquinería a usuarios de motocicleta.  Que cuida y protege las pertenencias de estos usuarios, permitiéndoles manteniendo un estilo casual - contemporáneo..
		</p>
	</div>
</div>

<div id="mision" style="display:none;">
	<div class="nosotros">
		<h1>Misión</h1>
		<p>
		Diseñar, producir y comercializar productos de calzado y marroquinería a hombres y mujeres usuarios de motocicletas, utilizando principalmente materiales impermeabilizados que nos permitirá cuidar y proteger las pertenencias de nuestros clientes, manteniendo siempre un estilo casual - contemporáneo.  
		</p>
	</div>
</div>

<div id="valores" style="display:none;">
	<div class="nosotros">
		<h1>Valores corporativos</h1>
		<p>
		Los valores que representan la marca OTAVO son: 
La honestidad, el respeto, la colaboración, la calidad y el trabajo en equipo.
Así podremos tener un mejor vinculo con nuestros clientes, proveedores, colaboradores y demás personas que quieran interactuar con nosotros.
		</p>
	</div>
</div>

<div id="direccion" style="display:none;">
	<div class="nosotros">
		<h1>Úbicanos en:</h1>
		<p>
		<center><iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.9681544186797!2d-74.20192478423623!3d4.599727134704544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9e39d5ec03d3%3A0xe0fcbf1254b5d580!2sDg.%2071c%20Bis%20ASur%20%2315%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1664314374585!5m2!1ses!2sco" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></center>
		</p>
	</div>
</div>

<div id="contactenos" style="display:none;">
	<div class="contactos">
		<h4><center>¿Con quién deseas hablar? ¿Y por cuál medio?</center></h4>
			<div class="container">								
				<div class="row">
					<div class="col-lg-4">
						<div class="text-center card-box">
							<div class="member-card pt-2 pb-2">
								<div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
								<div class="">
									<h4>Luis Otavo</h4>
									<p class="text-muted">Fundador <span><br> </span><span><a href="#" class="text-pink">OTAVO WEB</a></span></p>
								</div>
								<ul class="social-links list-inline">
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-solid fa-envelope"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-facebook"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-solid fa-phone"></i></a></li>
								</ul>
								<ul class="social-links list-inline">								
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-instagram"></i></a></li>
								</ul>
								<button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Contactar</button>							
							</div>
						</div>
					</div>
					<!-- end col -->
					<div class="col-lg-4">
						<div class="text-center card-box">
							<div class="member-card pt-2 pb-2">
								<div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
								<div class="">
									<h4>Laura Cárdenas</h4>
									<p class="text-muted">Programadora <span><br> </span><span><a href="#" class="text-pink"><br></a></span></p>
								</div>
								<ul class="social-links list-inline">
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-solid fa-envelope"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-facebook"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-solid fa-phone"></i></a></li>
								</ul>
								<br><br>
								<button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Contactar</button>							
							</div>
						</div>
					</div>
					<!-- end col -->
					<div class="col-lg-4">
						<div class="text-center card-box">
							<div class="member-card pt-2 pb-2">
								<div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
								<div class="">
									<h4>Andres Yate</h4>
									<p class="text-muted">Programador <span><br> </span><span><a href="#" class="text-pink"><br></a></span></p>
								</div>
								<ul class="social-links list-inline">
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-solid fa-envelope"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-facebook"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-solid fa-phone"></i></a></li>
								</ul>
								<ul class="social-links list-inline">
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-discord"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-telegram"></i></i></a></li>
									<li class="list-inline-item"><a class="tooltips" href=""><i class="fa-brands fa-instagram"></i></a></li>
								</ul>
								<button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Contactar</button>							
							</div>
						</div>
					</div>
					<!-- end col -->
				</div>			
		</div>
		<h4><center>O</center></h4>
		<div class="container">						
			<h5><center>Envianos tu mensaje</center></h5>

			<form method="post">
				<div class="card border-primary rounded-0">	
					<div class="card-body p-3">
						<!--Body-->
						<div class="form-group">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-dark"><i class="fa fa-user text-white"></i></div>
								</div>
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellido" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-dark"><i class="fa fa-envelope text-white"></i></div>
								</div>
								<input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@gmail.com" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-dark"><i class="fa fa-comment text-white"></i></div>
								</div>
								<textarea class="form-control" placeholder="Envianos tu mensaje" name="mensaje" required></textarea>
							</div>
						</div>
						<div class="text-center">
							<input type="submit" value="Enviar" class="btn btn-info btn-block bg-dark rounded-0 py-2" name="crearContacto">
						</div>
					</div>
				</div>
			</form>								
		</div>
	</div>
</div>