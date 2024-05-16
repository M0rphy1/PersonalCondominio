<?php
include('../config/conexion.php');

// Inicializar la variable de búsqueda
$buscar = false;

// Consultar toda la información del personal por defecto, solo aquellos que tengan datos en limpieza
$sql = "SELECT p.codigo AS codigo_personal, p.cedula, p.nombre, p.apellido, l.codigo AS codigo_limpieza, l.nombrearea, l.sueldo FROM personal p LEFT JOIN limpieza l ON p.codigo = l.codigopersonal WHERE l.codigo IS NOT NULL";

// Verificar si se ha enviado una solicitud de búsqueda
if(isset($_GET['buscar'])){
    $codigo_personal = $_GET['codigo_limpieza'];
    $buscar = true;
    $sql = "SELECT p.codigo AS codigo_personal, p.cedula, p.nombre, p.apellido, l.codigo AS codigo_limpieza, l.nombrearea, l.sueldo FROM personal p LEFT JOIN limpieza l ON p.codigo = l.codigopersonal WHERE l.codigo='$codigo_personal' AND l.codigo IS NOT NULL";
}

// Ejecutar la consulta
$result = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal de Limpieza</title>
</head>
<body>
    <center>
        <div class="navbar-container">
            <div class="navbar">
                <div class="navbar-left">
                    <div><a href="index.html"></a></div>
                    <div><a class="" href="../Limpieza.html"><h1><center>Gestión de Personal de Limpieza</center></h1></a><br></a></div>
                </div>
            </div>
        </div>
        <h2>Información del Personal</h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="../modelo/buscarl.php">
            <label for="cedula">Código Área de Limpieza:</label>
            <input type="text" name="codigo_limpieza" id="codigo_limpieza" placeholder="Ingrese código de área de limpieza">
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <br>
        <!-- Tabla de resultados -->
        <table border="1">
            <tr>
                <th>Código de Personal</th>
                <th>Código Área de Limpieza</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Área de trabajo</th>
                <th>Sueldo</th>
            </tr>
            <?php
            // Mostrar resultados de la consulta
            if ($result->num_rows > 0) {
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
            } else {
                if ($buscar) {
                    echo "<tr><td colspan='7'>No se encontraron resultados para la búsqueda.</td></tr>";
                } else {
                    echo "<tr><td colspan='7'>No hay resultados.</td></tr>";
                }
            }
            ?>
        </table>

    </center>
</body>
</html>

<?php
// Cerrar conexión a la base de datos
$conexion->close();
?>


