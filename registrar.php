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

?>
