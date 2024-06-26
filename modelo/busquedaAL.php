<?php
include('../config/conexion.php');

// Verificar si se ha enviado una solicitud de búsqueda
if(isset($_GET['buscar'])){
    // Obtener el valor del parámetro 'codigo_limpieza' del formulario
    $codigo_limpieza = $_GET['codigo_limpieza'];

    // Realizar la consulta en la base de datos
    $sql = "SELECT p.codigo AS codigo_personal, l.codigo AS codigo_limpieza, p.cedula, p.nombre, p.apellido, l.nombrearea, l.sueldo 
            FROM personal p 
            LEFT JOIN limpieza l ON p.codigo = l.codigopersonal 
            WHERE l.codigo='$codigo_limpieza'";
    $result = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Redirigir a la vista de resultados con los datos obtenidos
        echo '<script language="javascript">alert("Búsqueda exitosa");</script>';
        include("../modelo/actualizarL.php");
    } else {
        // No se encontraron resultados, redirigir a una vista indicando la ausencia de resultados
        echo '<script language="javascript">alert("Error, no hay ningún código perteneciente al área. Revise el área al que corresponde");</script>';
        include("../vista/ActualizarL.php");
        exit();
    }
} else {
    // Si no se ha enviado una solicitud de búsqueda, redirigir a una página de error o a la página principal
    include("../vista/RegistroL.html");
    exit();
}

// Cerrar la conexión a la base de datos

?>
