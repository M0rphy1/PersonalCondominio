<?php
include('../config/conexion.php');

// Verificar si se ha enviado una solicitud de búsqueda
if(isset($_GET['buscar'])){
    // Obtener el valor del parámetro 'cedula' del formulario
    $cedula = $_GET['cedula'];

    // Realizar la consulta en la base de datos
    $sql = "SELECT p.codigo AS codigo_personal, l.codigo AS codigo_limpieza, p.cedula, p.nombre, p.apellido, l.nombrearea, l.sueldo 
            FROM personal p 
            LEFT JOIN limpieza l ON p.codigo = l.codigopersonal 
            WHERE p.cedula='$cedula'";
    $result = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Redirigir a la vista de resultados con los datos obtenidos
        echo '<script language="javascript">alert("Búsqueda exitosa");</script>';
        include("../vista/eliminacionl.php");
        exit(); // Salir del script después de la redirección
    } else {
        // No se encontraron resultados, redirigir a una vista indicando la ausencia de resultados
        echo "Error: No se pudo obtener el código personal.";
        exit();
    }
} else {
    // Si no se ha enviado una solicitud de búsqueda, redirigir a una página de error o a la página principal
    include("../index.html");
    exit();
}

// Verificar si la conexión está abierta antes de intentar cerrarla
if ($conexion instanceof mysqli && $conexion->ping()) {
    $conexion->close();
}
?>