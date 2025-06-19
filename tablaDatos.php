<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datos de la tabla</title>
    <!-- Vincula el archivo CSS de Bootstrap para estilizar la página -->
    <link rel="stylesheet" href="../Proyectoweb/css/bootstrap.min.css">
</head>
<body>
    <!-- Encabezado de la página con clase Bootstrap para estilizado -->
    <h1 class="text-bg-primary p-3">Tabla de datos de los usuarios</h1>

    <?php
    // Incluye el archivo que establece la conexión con la base de datos
    require("conex.php");

    // Consulta SQL para obtener todos los datos de la tabla 'usuarios'
    $consultadatos = "SELECT * FROM usuarios";
    // Ejecuta la consulta y guarda los resultados
    $registros = mysqli_query($conexion, $consultadatos);
    ?>

    <!-- Crea una tabla estilizada con Bootstrap para mostrar los datos -->
    <table class="table table-striped">
        <thead>
            <!-- Encabezados de la tabla -->
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>USUARIO</th>
                <th>CLAVE</th>
                <th>EDAD</th>
            </tr>
        </thead>

        <?php
        // Bucle para recorrer cada registro obtenido de la consulta
        while($fila = mysqli_fetch_array($registros)){
        ?>
        <!-- Crea una fila en la tabla por cada registro en la base de datos -->
        <tr>
            <td><?php echo $fila["id"] ?></td> <!-- Muestra el ID del usuario -->
            <td><?php echo $fila["nombre"] ?></td> <!-- Muestra el nombre del usuario -->
            <td><?php echo $fila["correo"] ?></td> <!-- Muestra el correo del usuario -->
            <td><?php echo $fila["usuario"] ?></td> <!-- Muestra el nombre de usuario -->
            <td><?php echo $fila["clave"] ?></td> <!-- Muestra la clave (cifrada o sin cifrar) -->
            <td><?php echo $fila["edad"] ?></td> <!-- Muestra la edad del usuario -->
        </tr>
        <?php
        }
        ?>
    </table>

    <!-- Script para recargar automáticamente la página cada 5 segundos -->
    <script>
        setInterval("location.reload()", 5000);
    </script>

    <!-- Vincula el archivo JavaScript de Bootstrap para funcionalidades interactivas -->
    <script src="../Proyectoweb/js/bootstrap.bundle.min.js"></script>
</body>
</html>
