<?php 

	$conexion=mysqli_connect('localhost','root','','otavo_db');

?>
<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>

<br>

	<table class="tabla-datos">
		<tr>
			<td class="tabla-header">ID</td>
			<td class="tabla-header">NOMBRE</td>
			<td class="tabla-header">CORREO</td>
			<td class="tabla-header">CONTRASEÑA</td>
			<td class="tabla-header">ROL</td>
			<td class="tabla-header" colspan="2">OPCIONES</td>			
		</tr>

		<?php 
		$sql="SELECT * from usuario";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['id_usuario'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['correo'] ?></td>
			<td><?php echo $mostrar['password'] ?></td>
			<td><?php echo $mostrar['tipoUsua'] ?></td>
			<td><button>Eliminar</button></td>
			<td><button>Actualizar</button></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>