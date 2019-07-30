<?php


$fechaIngreso = date("Y/m/d");
$kilometraje = $_POST["kilometraje"];
$estadoLlanta = $_POST["estadoLlanta"];
$estadoLuces = $_POST["estadoLuces"];
$estadoMotor = $_POST["estadoMotor"];
$placa=$_POST["placa"];


function registrar($fechaIngreso, $kilometraje, $estadoLlanta, $estadoLuces,$estadoMotor,$placa)
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

	$query = 'INSERT INTO estado (fechaIngreso,kilometraje,estadoLlanta,estadoLuces,estadoMotor,placa) 	VALUES("'.$fechaIngreso.'","'.$kilometraje.'","'.$estadoLlanta.'","'.$estadoLuces.'","'.$estadoMotor.'","'.$placa.'");';

	//echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	//echo "cliente registrado con exito";
	//header ("Location: http://localhost/Registro_Talleres/principal.html");

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Tabla Estado</title>
	</head>
	<body>
		<h1>Estado de Auto registrado con exito</h1>
	
<table class="egt" border="3">

  <tr>
    <td>Fecha de Ingreso</td>
    <td><?php echo $fechaIngreso;?></td>
  </tr>

  <tr>
    <td>kilometraje</td>
    <td><?php echo $kilometraje;?></td>
  </tr>

  <tr>
    <td>estado de Llanta</td>
    <td><?php echo $estadoLlanta;?></td>
  </tr>
  <tr>
    <td>estado de Luces</td>
    <td><?php echo $estadoLuces;?></td>
  </tr>
  <tr>
    <td>estado de Motor</td>
    <td><?php echo $estadoMotor;?></td>
  </tr>

  <tr>
    <td>placa</td>
    <td><?php echo $placa;?></td>
  </tr>

</table>
<p><a href="http://localhost/Registro_Talleres/principal.html"><input type="submit" id="btnRegresar" name="btnRegresar" onclick = "this.form.action = 'principal.html'"  value="Menu principal" formtarget="_self"></p>
	</body>
	</html>																																																																																																						


	<?php
}

registrar($fechaIngreso, $kilometraje, $estadoLlanta, $estadoLuces,$estadoMotor, $placa);

function consultar($cedula){
	require("conexion.php");
	if (!$connection){
		die("Not conected : " .mysqli_error());
	}

	$db_selecte = mysqli_select_db($connection,$database);
	if(!$db_selecte){
		die("Can not use database: " .mysqli_error());
	}
	


	//$query = 'INSERT INTO cliente (cedula,kilometraje,estadoLlanta,estadoLuces,estadoMotor) 	VALUES("'.$cedula.'","'.$kilometraje.'","'.$estadoLlanta.'","'.$estadoLuces.'","'.$estadoMotor.'");';
	$query= 'SELECT * FROM cliente WHERE cedula= "'.$cedula.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente consultado con exito";
	//echo <br>$result</br>
	
}

function actualizar($cedula, $kilometraje, $estadoLlanta, $estadoLuces,$estadoMotor)
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
	
	//$query = 'INSERT INTO cliente (cedula,kilometraje,estadoLlanta,estadoLuces,estadoMotor) 	VALUES("'.$cedula.'","'.$kilometraje.'","'.$estadoLlanta.'","'.$estadoLuces.'","'.$estadoMotor.'");';
	
	$query= 'UPDATE cliente SET kilometraje="'.$kilometraje.'", estadoLlanta="'.$estadoLlanta.'",estadoLuces="'.$estadoLuces.'",estadoMotor="'.$estadoMotor.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente actualizado con exito";
}


?>

