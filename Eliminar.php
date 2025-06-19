<?php

// Requiere el archivo de conexión a la base de datos
require("conex.php");

// Obtiene el usuario y la clave enviados a través del método POST
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

// Consulta para buscar al usuario en la tabla 'usuarios' con el nombre ingresado
$laConsulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
// Ejecuta la consulta en la base de datos
$usuarioEncontrado = mysqli_query($conexion, $laConsulta);

// Verifica si la consulta encontró algún resultado
if(mysqli_fetch_array($usuarioEncontrado)){
    // Realiza nuevamente la consulta para obtener los datos del usuario encontrado
    $usuarioEncontrado = mysqli_query($conexion, $laConsulta);
    $arrayusuarioEncontrado = mysqli_fetch_array($usuarioEncontrado);
    
    // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
    if(password_verify($clave, $arrayusuarioEncontrado['clave'])){
        // Si la contraseña es correcta, prepara la consulta para eliminar al usuario
        $borrar = "DELETE FROM usuarios WHERE usuario = '$usuario'";
        // Ejecuta la consulta para eliminar al usuario
        mysqli_query($conexion, $borrar);

        // Muestra un mensaje de éxito y redirige al usuario a la página principal
        echo "<script>
            alert('El usuario ha sido borrado')
            window.location='../Proyectoweb/index.html'
        </script>";
    }
    else{
        // Si la contraseña es incorrecta, muestra un mensaje de error y redirige
        echo "<script>
        alert('Contraseña Incorrecta')
        window.location='../Proyectoweb/index.html'
    </script>";
    }
}
else{
    // Si el usuario no existe en la base de datos, muestra un mensaje de error y redirige
    echo "<script>
        alert('Usuario Incorrecto')
        window.location='../Proyectoweb/index.html'
    </script>";
};

?>
