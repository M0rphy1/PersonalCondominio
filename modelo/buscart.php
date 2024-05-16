<?php
include('../config/conexion.php');

// Verificar si se ha enviado una solicitud de búsqueda
if(isset($_GET['buscar'])){
    // Obtener el valor del parámetro 'codigo_informatico' del formulario
    $codigo_limpieza = $_GET['codigo_informatico'];

    // Realizar la consulta en la base de datos
    $sql = "SELECT p.codigo AS codigo_personal, t.codigo AS codigo_informatico, p.cedula, p.nombre, p.apellido, t.nombrearea, t.sueldo 
            FROM personal p 
            LEFT JOIN informatico t ON p.codigo = t.codigopersonal 
            WHERE t.codigo='$codigo_informatico'";
    $result = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Redirigir a la vista de resultados con los datos obtenidos
        echo '<script language="javascript">alert("Búsqueda exitosa");</script>';
        include("../vista/ResultadosT.php");
    } else {
        // No se encontraron resultados, redirigir a una vista indicando la ausencia de resultados
        echo '<script language="javascript">alert("Error, no hay ningún código perteneciente al área. Revise el área al que corresponde");</script>';
        include("../vista/ConsultarT.php");
        exit();
    }
} else {
    // Si no se ha enviado una solicitud de búsqueda, redirigir a una página de error o a la página principal
    include("../vista/RegistroT.html");
    exit();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>