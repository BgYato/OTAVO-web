<?php 

	$conexion=mysqli_connect('localhost','root','','otavo_db');	

?>
<!DOCTYPE html>
<html>
<head>	
</head>
<body>

<br>
    <label for="sel1">Seleccionar el ID:</label>
    <form action="" method="POST">
		<select class="form-control" id="sel1" name="datos">
			<option value="na" selected>-- Selecionna un ID --</option>
		<?php 
			$sql="SELECT * from usuario";
			$result=mysqli_query($conexion,$sql);

			while($mostrar=mysqli_fetch_array($result)){
		?>
			<option value="<?php echo $mostrar['id_usuario']?>" name="numero" id="numero">
				<?php echo $mostrar['id_usuario']?> - <?php echo $mostrar['nombre'] ?>
			</option>                            
				
		<?php 
			}
		?>
		</select><br>					
		<button type="submit" name="btn1" class="btn btn-success col-12">Seleccionar</button>	
	</form>

	<button class="btn btn-success col-12">
		Valor capturado del select: <span id="span1" class="badge badge-light"></span>
	</button>
	<div id="div1">
		<?php
			if (isset($_POST["btn1"])) {
				$id = $_POST["numero"];

				print_r($id);
			}
		?>
	</div>	

	<script>	
	/* 	$('#sel1').on('change', function()
		{
			var valor = this.value;
			var texto = $(this).find('option:selected').text();							

			$('#span1').text('ID y nombre seleccionado; '+texto);
			
			$('#div1').show();
			$('#div1').text('Leer $valor');
		});

		$(document).ready(function() {
  				$("#div1").hide();
		}); */
	</script>
</body>
</html>