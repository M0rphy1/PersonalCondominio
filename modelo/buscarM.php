<?php
include('../config/conexion.php');

// Verificar si se ha enviado una solicitud de búsqueda
if(isset($_GET['buscar'])){
    // Obtener el valor del parámetro 'codigo_limpieza' del formulario
    $codigo_mantenimiento = $_GET['codigo_mantenimiento'];

    // Realizar la consulta en la base de datos
    $sql = "SELECT p.codigo AS codigo_personal, m.codigo AS codigo_mantenimiento, p.cedula, p.nombre, p.apellido, m.nombrearea, m.sueldo 
            FROM personal p 
            LEFT JOIN mantenimiento m ON p.codigo = m.codigopersonal 
            WHERE m.codigo='$codigo_mantenimiento'";
    $result = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Redirigir a la vista de resultados con los datos obtenidos
        echo '<script language="javascript">alert("Búsqueda exitosa");</script>';
        include("../vista/ResultadosM.php");
    } else {
        // No se encontraron resultados, redirigir a una vista indicando la ausencia de resultados
        echo '<script language="javascript">alert("Error, no hay ningún código perteneciente al área. Revise el área al que corresponde");</script>';
        include("../vista/ConsultarM.php");
        exit();
    }
} else {
    // Si no se ha enviado una solicitud de búsqueda, redirigir a una página de error o a la página principal
    include("../vista/RegistroM.html");
    exit();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
