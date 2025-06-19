<?php
// Requiere el archivo de conexión a la base de datos
require("conex.php");

// Obtiene los datos enviados por el formulario mediante el método POST
$usuario = $_POST["usuario"]; // Nombre de usuario
$clave = $_POST["clave"];     // Contraseña ingresada
$clave2 = $_POST["clave2"];   // Confirmación de la contraseña

// Consulta para verificar si existe un usuario con el nombre especificado
$laConsulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

// Ejecuta la consulta en la base de datos
$usuarioEncontrado = mysqli_query($conexion, $laConsulta);

// Verifica si se encontró algún resultado
if (mysqli_fetch_array($usuarioEncontrado)) {
    // Vuelve a ejecutar la consulta para obtener los datos completos del usuario encontrado
    $usuarioEncontrado = mysqli_query($conexion, $laConsulta);
    $arrayUsuarioEncontrado = mysqli_fetch_array($usuarioEncontrado);
    
    // Verifica si ambas contraseñas ingresadas coinciden
    if($clave === $clave2){
        // Comprueba si la contraseña ingresada coincide con la almacenada en la base de datos
        if(password_verify($clave2, $arrayUsuarioEncontrado["clave"])){
            // Si la verificación es exitosa, prepara la consulta para eliminar al usuario
            $borrar = "DELETE FROM usuarios WHERE usuario = '$usuario'";
            // Ejecuta la consulta para eliminar al usuario de la base de datos
            mysqli_query($conexion, $borrar);
            
            // Muestra un mensaje de éxito y redirige al usuario a la página principal
            echo "<script>
                alert('El usuario ha sido borrado')
                window.location='../Proyectoweb/index.html'
            </script>";
        }
        else{
            // Si la contraseña no coincide, muestra un mensaje de error y redirige
            echo "<script>
                alert('Contraseña incorrecta')
                window.location='../Proyectoweb/index.html'
            </script>";
        }
    }
    else{
        // Si las contraseñas ingresadas no son iguales, muestra un mensaje de error y redirige
        echo "<script>
                alert('Las contraseñas no son iguales')
                window.location='../Proyectoweb/index.html'
            </script>";
    }
} else {
    // Si no se encuentra al usuario en la base de datos, muestra un mensaje de error y redirige
    echo "<script>
                alert('Usuario incorrecto, vuelva a intentarlo')
                window.location='../Proyectoweb/index.html'
            </script>";
}
?>
