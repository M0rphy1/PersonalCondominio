<?php
    include("../config/conexion.php");
    $codigo_personal = $_POST['codigopersonal'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombrearea = $_POST['nombrearea'];
    $sueldo = $_POST['sueldo'];

    // Actualizar los datos en la tabla personal
    $sql_personal = "UPDATE personal SET nombre = '$nombre', apellido= '$apellido' WHERE cedula='$cedula'";
    mysqli_query($conexion, $sql_personal);

    // Actualizar los datos en la tabla limpieza utilizando el código personal como clave foránea
    $sql_limpieza = "UPDATE informatico SET nombrearea = '$nombrearea', sueldo= '$sueldo' WHERE codigopersonal='$codigo_personal'";
    mysqli_query($conexion, $sql_limpieza);

    // Notificar al usuario que se ha registrado exitosamente
    echo '<script language="javascript">alert("Se ha guardado exitosamente");</script>';
    include("../vista/ConsultarT.php");
?>