
<?php


$fechaMantenimiento = date("Y/m/d");
$bujias = $_POST["bujias"];
$aceite = $_POST["aceite"];
$frenos = $_POST["frenos"];
$filtroAire = $_POST["filtroAire"];
$filtroCombustibe=$_POST["filtroCombustibe"];
$alineacion=$_POST["alineacion"];
$estadoId=$_POST["estadoId"];

function registrar($fechaMantenimiento, $bujias, $aceite, $frenos,$filtroAire,$filtroCombustibe,$alineacion,$estadoId)
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

	$query = 'INSERT INTO mantenimiento (fechaMantenimiento,bujias,aceite,frenos,filtroAire,filtroCombustibe,alineacion,estadoId) 	VALUES("'.$fechaMantenimiento.'","'.$bujias.'","'.$aceite.'","'.$frenos.'","'.$filtroAire.'","'.$filtroCombustibe.'","'.$alineacion.'","'.$estadoId.'");';

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
		<h1>Mantenimiento de Auto registrado con exito</h1>
	
<table class="egt" border="3">

  <tr>
    <td>Fecha de Mantenimiento</td>
    <td><?php echo $fechaMantenimiento;?></td>
  </tr>

  <tr>
    <td>bujias</td>
    <td><?php echo $bujias;?></td>
  </tr>

  <tr>
    <td>aceite</td>
    <td><?php echo $aceite;?></td>
  </tr>
  <tr>
    <td>frenos</td>
    <td><?php echo $frenos;?></td>
  </tr>
  <tr>
    <td>filtro de Aire</td>
    <td><?php echo $filtroAire;?></td>
  </tr>

  <tr>
    <td>filtro de Combustible</td>
    <td><?php echo $filtroCombustibe;?></td>
  </tr>
  <tr>
    <td>alineacion</td>
    <td><?php echo $alineacion;?></td>
  </tr>
  <tr>
    <td>estado inicial</td>
    <td><?php echo $estadoId;?></td>
  </tr>

</table>
<p><a href="http://localhost/Registro_Talleres/principal.html"><input type="submit" id="btnRegresar" name="btnRegresar" onclick = "this.form.action = 'principal.html'"  value="Menu principal" formtarget="_self"></p>
	</body>
	</html>																																																																																																						


	<?php
}

registrar($fechaMantenimiento, $bujias, $aceite, $frenos,$filtroAire, $filtroCombustibe, $alineacion,$estadoId);

function consultar($cedula){
	require("conexion.php");
	if (!$connection){
		die("Not conected : " .mysqli_error());
	}

	$db_selecte = mysqli_select_db($connection,$database);
	if(!$db_selecte){
		die("Can not use database: " .mysqli_error());
	}
	


	//$query = 'INSERT INTO cliente (cedula,bujias,aceite,frenos,filtroAire) 	VALUES("'.$cedula.'","'.$bujias.'","'.$aceite.'","'.$frenos.'","'.$filtroAire.'");';
	$query= 'SELECT * FROM cliente WHERE cedula= "'.$cedula.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente consultado con exito";
	//echo <br>$result</br>
	
}

function actualizar($cedula, $bujias, $aceite, $frenos,$filtroAire)
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
	
	//$query = 'INSERT INTO cliente (cedula,bujias,aceite,frenos,filtroAire) 	VALUES("'.$cedula.'","'.$bujias.'","'.$aceite.'","'.$frenos.'","'.$filtroAire.'");';
	
	$query= 'UPDATE cliente SET bujias="'.$bujias.'", aceite="'.$aceite.'",frenos="'.$frenos.'",filtroAire="'.$filtroAire.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente actualizado con exito";
}


?>

