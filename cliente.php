<?php


$edad = $_POST["edad"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$n_hijos = $_POST["n_hijos"];


function registrar($edad, $nombre, $apellido, $n_hijos)
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

	$query = 'INSERT INTO persona (edad,nombre,apellido,n_hijos) 	VALUES("'.$edad.'","'.$nombre.'","'.$apellido.'","'.$n_hijos.'");';
	echo $query;
	$result= mysqli_query($connection,$query) or die('consulta fallida: '.mysqli_error());

	mysqli_close($connection);
	echo "persona registrada con exito";
}

registrar($edad, $nombre, $apellido, $n_hijos);

?>
