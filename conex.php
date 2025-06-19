<?php
//CONEXION CON EL SERVIDOR MYSQL
//PARAMETROS PARA CONECTARSE A AL SERVIDOR

$servidor = "localhost"; // o ip del servidor
$usuario = "root"; //en el xampp es root
$password = "sanluis";
//establecemos la conexion con el servidor 
$conexion = mysqli_connect($servidor, $usuario, $password, "proyectoweb");
//si la variable $conexion(true) o es false si ha fallado la conexion
if(!$conexion){//condicion de conexion es false
    echo "La conexion a la BBDD ha fallado"; //mensaje si no conecta
}else{
    echo "La conexion a la BBDD ha sido correcta";
}

?>