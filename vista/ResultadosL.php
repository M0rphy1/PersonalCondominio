<?php
include('../config/conexion.php');

// Verificar si se ha enviado la cédula como parámetro en la URL
if(isset($_GET['codigo_limpieza'])){
    // Obtener la cédula de la URL
    $codigo_limpieza = $_GET['codigo_limpieza'];

    // Realizar la consulta en la base de datos para obtener los datos correspondientes a la cédula
    $sql = "SELECT p.codigo AS codigo_personal, l.codigo AS codigo_limpieza, p.cedula, p.nombre, p.apellido, l.nombrearea, l.sueldo 
            FROM personal p 
            LEFT JOIN limpieza l ON p.codigo = l.codigopersonal 
            WHERE l.codigo='$codigo_limpieza'";
    $result = $conexion->query($sql);

    // Mostrar resultados en una tabla si se encontraron resultados
    if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
</head>
<body>
<div class="navbar-container">
        <div class="navbar">
            <div class="navbar-left">
                <div><a href="index.html"></a></div>
                <div><a class="" href="../Limpieza.html"><h1><center>Gestión de Personal de Limpieza</center></h1></a><br></a></div>
            </div>
        </div>
    </div>
    <center>
    <h2>Resultados de Búsqueda para el código de áre de Limpieza: <?php echo $codigo_limpieza; ?></h2>
    <!-- Tabla de resultados -->
    <table border="1">
        <tr>
            <th>Código de Personal</th>
            <th>Código de Limpieza</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Área de Trabajo</th>
            <th>Sueldo</th>
        </tr>
        <?php
            // Mostrar resultados de la consulta
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["codigo_personal"] . "</td>";
                echo "<td>" . $row["codigo_limpieza"] . "</td>";
                echo "<td>" . $row["cedula"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "<td>" . $row["nombrearea"] . "</td>";
                echo "<td>" . $row["sueldo"] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
<?php
    } else {
        // Mostrar un mensaje si no se encontraron resultados para la cédula
        echo "<p>No se encontraron resultados para la cédula: $cedula</p>";
    }
}

// Verificar si la conexión está abierta antes de intentar cerrarla
if ($conexion->connect_error) {
    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
