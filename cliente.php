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
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente registrada con exito";
}

registrar($edad, $nombre, $apellido, $n_hijos);

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
	echo <br>$result</br>
	
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

	UPDATE nombre_tabla
SET columna1 = valor1, columna2 = valor2
WHERE columna3 = valor3
	
	//$query = 'INSERT INTO cliente (cedula,nombre,apellido,telefono,correo) 	VALUES("'.$cedula.'","'.$nombre.'","'.$apellido.'","'.$telefono.'","'.$correo.'");';
	
	$query= 'UPDATE cliente SET nombre="'.$nombre.'", apellido="'.$apellido.'",telefono="'.$telefono.'",correo="'.$correo.'"';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "cliente actualizado con exito";
}


?>

