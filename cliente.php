<?php


$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];


function registrar($cedula, $nombre, $apellido, $telefono,$correo)
{
	require("conexion.php");
    $connection = mysqli_connect($servidor,$usuario,$contrasena);
	if (!$connection){
		die("Not conected : " .mysqli_error());
	}

	$db_selecte = mysqli_select_db($connection,$database);
	if(!$db_selecte){
		die("Can not use database: " .mysqli_error());
	}

	$query = 'INSERT INTO cliente (cedula,nombre,apellido,telefono,correo) 	VALUES("'.$cedula.'","'.$nombre.'","'.$apellido.'","'.$telefono.'","'.$correo.'");';

	//echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	//echo "cliente registrado con exito";
	//header ("Location: http://localhost/Registro_Talleres/principal.html");

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Tabla Cliente</title>
	</head>
	<body>
		<h1>Cliente registrado con exito</h1>
	
<table class="egt" border="3">

  <tr>
    <td>Cedula</td>
    <td><?php echo $cedula;?></td>
  </tr>

  <tr>
    <td>Nombre</td>
    <td><?php echo $nombre;?></td>
  </tr>

  <tr>
    <td>Apellido</td>
    <td><?php echo $apellido;?></td>
  </tr>
  <tr>
    <td>Telefono</td>
    <td><?php echo $telefono;?></td>
  </tr>
  <tr>
    <td>Correo</td>
    <td><?php echo $correo;?></td>
  </tr>

</table>
<p><a href="http://localhost/Registro_Talleres/principal.html"><input type="submit" id="btnRegresar" name="btnRegresar" onclick = "this.form.action = 'principal.html'"  value="Menu principal" formtarget="_self"></p>
	</body>
	</html>																																																																																																						


	<?php
}

registrar($cedula, $nombre, $apellido, $telefono,$correo);

function consultar($cedula){
	require("conexion.php");
	if (!$connection){
		die("Not conected : " .mysqli_error());
	}

	$db_selecte = mysqli_select_db($connection,$database);
	if(!$db_selecte){
		die("Can not use database: " .mysqli_error());
	}
	


	//$query = 'INSERT INTO cliente (cedula,nombre,apellido,telefono,correo) 	VALUES("'.$cedula.'","'.$nombre.'","'.$apellido.'","'.$telefono.'","'.$correo.'");';
	$query= 'SELECT * FROM cliente WHERE cedula= "'.$cedula.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente consultado con exito";
	//echo <br>$result</br>
	
}

function actualizar($cedula, $nombre, $apellido, $telefono,$correo)
{
	require("conexion.php");
    $connection = mysqli_connect($servidor,$usuario,$contrasena);
	if (!$connection){
		die("Not conected : " .mysqli_error());
	}

	$db_selecte = mysqli_select_db($connection,$database);
	if(!$db_selecte){
		die("Can not use database: " .mysqli_error());
	}
	
	//$query = 'INSERT INTO cliente (cedula,nombre,apellido,telefono,correo) 	VALUES("'.$cedula.'","'.$nombre.'","'.$apellido.'","'.$telefono.'","'.$correo.'");';
	
	$query= 'UPDATE cliente SET nombre="'.$nombre.'", apellido="'.$apellido.'",telefono="'.$telefono.'",correo="'.$correo.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente actualizado con exito";
}


?>

