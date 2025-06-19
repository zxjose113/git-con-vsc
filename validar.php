<?php
// Incluye el archivo para establecer la conexión a la base de datos
require("conex.php");

// Obtiene los datos enviados desde el formulario (usuario y contraseña)
$usuario = $_POST["usuario"]; // Nombre de usuario ingresado
$clave = $_POST["clave"];     // Contraseña ingresada

// Consulta SQL para buscar al usuario en la tabla 'usuarios' según el nombre de usuario proporcionado
$laConsulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

// Ejecuta la consulta en la base de datos
$usuarioEncontrado = mysqli_query($conexion, $laConsulta);

// Verifica si existe algún resultado en la consulta
if(mysqli_fetch_array($usuarioEncontrado)){
    // Vuelve a ejecutar la consulta para obtener los datos completos del usuario encontrado
    $usuarioEncontrado = mysqli_query($conexion, $laConsulta);
    $arrayUsuarioEncontrado = mysqli_fetch_array($usuarioEncontrado); // Convierte el resultado en un array asociativo

    // Comprueba si la contraseña ingresada coincide con la contraseña cifrada almacenada
    if(password_verify($clave, $arrayUsuarioEncontrado['clave'])){
        // Si la contraseña es válida, redirige a la página principal del proyecto
        echo "<script>
            window.location='../Proyectoweb/coffee-shop-html-template/index.html'
            </script>";
    }
    else{
        // Si la contraseña es incorrecta, muestra un mensaje de error y redirige a la página de inicio
        echo "<script>
            alert('Contraseña incorrecta, vuelva a intentar')
            window.location='../Proyectoweb/index.html'
        </script>";
    }
}
else{
    // Si el usuario no existe, muestra un mensaje de error y redirige a la página de inicio
    echo "<script>
        alert('Usuario incorrecto, vuelva a intentar')
        window.location='../Proyectoweb/index.html'
        </script>";
};

?>
