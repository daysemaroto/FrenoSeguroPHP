<?php


$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$cedula = $_POST["cedula"];


function registrar($placa, $modelo, $marca, $cedula)
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

	$query = 'INSERT INTO auto (placa,modelo,marca,cedula) 	VALUES("'.$placa.'","'.$modelo.'","'.$marca.'","'.$cedula.'");';

	//echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	//echo "cliente registrado con exito";
	//header ("Location: http://localhost/Registro_Talleres/principal.html");

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Tabla Auto</title>
	</head>
	<body>
		<h1>Auto registrado con exito</h1>
	
<table class="egt" border="3">

  <tr>
    <td>placa</td>
    <td><?php echo $placa;?></td>
  </tr>

  <tr>
    <td>modelo</td>
    <td><?php echo $modelo;?></td>
  </tr>

  <tr>
    <td>marca</td>
    <td><?php echo $marca;?></td>
  </tr>
  <tr>
    <td>cedula</td>
    <td><?php echo $cedula;?></td>
  </tr>


</table>
<p><a href="http://localhost/Registro_Talleres/principal.html"><input type="submit" id="btnRegresar" name="btnRegresar" onclick = "this.form.action = 'principal.html'"  value="Menu principal" formtarget="_self"></p>
	</body>
	</html>																																																																																																						


	<?php
}

registrar($placa, $modelo, $marca, $cedula);

?>

