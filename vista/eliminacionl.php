<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda - Eliminar Personal</title>
</head>
<body>
<div class="navbar-container">
    <div class="navbar">
        <div class="navbar-left">
            <div><a href="index.html"></a></div>
            <div><a class="" href="../index.html"><h1><center>Gestión de Personal de Limpieza</center></h1></a><br></a></div>
        </div>
    </div>
</div>
<center>
<?php
include('../config/conexion.php');

// Verificar si se ha enviado la cédula como parámetro en la URL
if(isset($_GET['cedula'])){
    // Obtener la cédula de la URL
    $cedula = $_GET['cedula'];

    // Realizar la consulta en la base de datos para obtener los datos correspondientes a la cédula
    $sql = "SELECT p.codigo AS codigo_personal, l.codigo AS codigo_limpieza, p.cedula, p.nombre, p.apellido, l.nombrearea, l.sueldo 
            FROM personal p 
            LEFT JOIN limpieza l ON p.codigo = l.codigopersonal 
            WHERE p.cedula='$cedula'";
    $result = $conexion->query($sql);

    // Mostrar resultados en una tabla si se encontraron resultados
    if ($result->num_rows > 0) {
        echo "<h2>Resultados de Búsqueda para la Cédula: $cedula</h2>";
        // Tabla de resultados
        echo "<table border='1'>";
        echo "<tr>
                <th>Código de Personal</th>
                <th>Código de Limpieza</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Área de Trabajo</th>
                <th>Sueldo</th>
              </tr>";
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
            // Formulario para eliminar
            echo "<td>
                    <form method='post' action='eliminarpl.php'>
                        <input type='hidden' name='codigo_personal' value='" . $row["codigo_personal"] . "'>
                        <input type='hidden' name='codigo_limpieza' value='" . $row["codigo_limpieza"] . "'>
                        <input type='submit' name='eliminar' value='Eliminar'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Mostrar un mensaje si no se encontraron resultados para la cédula
        echo "<p>No se encontraron resultados para la cédula: $cedula</p>";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
</center>
</body>
</html>
