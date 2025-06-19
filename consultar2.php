<?php
//Consultas especificas para un solo usuario
//Requerimos de archivo de conexion
require("conex.php");
//guardamos en una variable el contenido que ento en el input de usuario
$usuario = $_POST["usuario"];
//creamos variable qe contendra una consulta donde el usuario sea el que se metio en el input
$laConsulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
//guardamos la ejecion de la consulta en una variable
$registros = mysqli_query($conexion, $laConsulta);
echo "Los datos del usuario son los siguientes: <br>";
//si fila es igual al array de registros podremos sacar los datos espeficos del usuario 
if($fila = mysqli_fetch_array($registros)){
    echo " el id de usuario es:<b><u>". $fila["id"] . "</u></b>";
    echo " El nombre del usuario es:<b><u>". $fila["nombre"] . "</u></b><br>";
    echo " El correo del usuario es:<b><u>". $fila["correo"] . "</u></b><br>";
    echo " El user del usuario es:<b><u>". $fila["usuario"] . "</u></b><br>";
    echo " La clave del usuario es:<b><u>". $fila["clave"] . "</u></b><br>";
}
//si mo encuentra nada
else{
    echo "No hay usuario con ese nombre";
}
?>