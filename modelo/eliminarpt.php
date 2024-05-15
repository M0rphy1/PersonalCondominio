<?php
include('../config/conexion.php');

// Verificar si se ha enviado una solicitud de eliminación
if(isset($_POST['eliminar'])){
    // Obtener los datos de la solicitud de eliminación
    $codigo_personal = $_POST['codigo_personal'];
    $codigo_limpieza = $_POST['codigo_informatico'];

    // Ejecutar la consulta SQL para eliminar los datos de las tablas
    $sql_personal = "DELETE FROM personal WHERE codigo='$codigo_personal'";
    $sql_limpieza = "DELETE FROM informatico WHERE codigo='$codigo_informatico'";

    // Ejecutar las consultas SQL
    if ($conexion->query($sql_personal) === TRUE && $conexion->query($sql_informatico) === TRUE) {
        echo '<script language="javascript">alert("Eliminación exitosa");</script>';
        header("Location: ../PersonalGeneral.html"); // Redireccionar al index
        exit(); // Salir del script después de la redirección
    } else {
        echo '<script language="javascript">alert("Error, no se pudo eliminar");</script>';
        header("Location: ../PersonalGeneral.html"); // Redireccionar al index
        exit(); // Salir del script después de la redirección
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
