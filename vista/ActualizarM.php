<?php
include('../config/conexion.php');

// Inicializar la variable de búsqueda
$buscar = false;

// Consultar toda la información del personal por defecto, solo aquellos que tengan datos en limpieza
$sql = "SELECT p.codigo AS codigo_personal, p.cedula, p.nombre, p.apellido, m.codigo AS codigo_mantenimiento, m.nombrearea, m.sueldo FROM personal p LEFT JOIN mantenimiento m ON p.codigo = m.codigopersonal WHERE m.codigo IS NOT NULL";

// Verificar si se ha enviado una solicitud de búsqueda
if(isset($_GET['buscar'])){
    $codigo_personal = $_GET['codigo_mantenimiento'];
    $buscar = true;
    $sql = "SELECT p.codigo AS codigo_personal, p.cedula, p.nombre, p.apellido, m.codigo AS codigo_mantenimiento, m.nombrearea, m.sueldo FROM personal p LEFT JOIN mantenimiento m ON p.codigo = m.codigopersonal WHERE m.codigo='$codigo_personal' AND m.codigo IS NOT NULL";
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
    <title>Personal de Mantenimiento</title>
</head>
<body>
    <center>
        <div class="navbar-container">
            <div class="navbar">
                <div class="navbar-left">
                    <div><a href="index.html"></a></div>
                    <div><a class="" href="../Mantenimiento.html"><h1><center>Gestión de Personal de Mantenimiento</center></h1></a><br></a></div>
                </div>
            </div>
        </div>
        <h2>Información del Personal</h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="../modelo/busquedaAM.php">
            <label for="cedula">Código Área de Mantenimiento:</label>
            <input type="text" name="codigo_mantenimiento" id="codigo_mantenimiento" placeholder="Ingrese código de área de mantenimiento">
            <input type="submit" name="buscar" value="Buscar">
        </form>
        <br>
        <!-- Tabla de resultados -->
        <table border="1">
            <tr>
                <th>Código de Personal</th>
                <th>Código Área de Mantenimiento</th>
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
                    echo "<td>" . $row["codigo_mantenimiento"] . "</td>";
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