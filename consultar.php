<?php
//Consultar todos los usuarios
//requerimos de archivo de conexion para la base de datos
require("conex.php");

//creamos una consulta que estara almacenada en una variable
$laConsulta = "SELECT * FROM usuarios";
//creamos una variable que contendra la ejecucuion de la consulta
$registros = mysqli_query($conexion, $laConsulta);

echo "El resulta de la consulta de los usuarios es:<br>";
//mientras fila sea ygual que todo el array de registros saca los datos
while($fila = mysqli_fetch_array($registros)){
    //datos de la consulta del campo nombre de la BBDD
    echo "El nombre del usuario es: <u><b>". $fila["nombre"] . "</u></b><br>";
};
?>