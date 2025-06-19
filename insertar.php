<?php
require("conex.php");

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

//Consulta para no permitir usuarios repetidos
$consultaTodos = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
//ejecutamos la consultaanterior
$registros = mysqli_query($conexion, $consultaTodos);

//usamos msqli_fetch_array
if(mysqli_fetch_array($registros)){//si hay concidencia en un usuario
    echo "<script>alert('Este usuario ya existe mamahuevo')
                window.location = '../Proyectoweb/registrar.html'</script>";

}else{
    //si entramos en esta opcion es que no hay concidencia y se puede registrar
    
    //la clave que esta en texto legible la pasamos a hash(incriptada)
    $clavehash = password_hash($clave, PASSWORD_DEFAULT);
    
    //Creamos una consulta para meter los datos anteriores a la base de datos
    $consultaInsertar = "INSERT INTO usuarios(nombre, edad, correo, usuario, clave)
                VALUE ('$nombre', '$edad', '$correo', '$usuario', '$clavehash')";
    
    //ejecutamos la consulta anterios en la conexion de la BBDD para incertar los valores
    $insertarDatos = mysqli_query($conexion, $consultaInsertar);
    if($insertarDatos){//si la variable existe es que se ha insertado los datos
        echo "<script>alert('Se ha regitrado el usuario con exito')
                      window.location='../Proyectoweb/index.html'</script>";
    }else{
        echo  "<script>alert('No se ha podido regitrado el usuario');
                      window.location='../Proyectoweb/index.html'</script>";
    }
}


?>