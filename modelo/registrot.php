<?php
include('../config/conexion.php');

// Obtenemos los datos del formulario
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nombrearea = $_POST['nombrearea'];
$sueldo = $_POST['sueldo'];

// Verificamos si la cédula ya está registrada en la tabla personal
$comprobacion = "SELECT cedula FROM personal WHERE cedula='$cedula'";
$resultado = mysqli_query($conexion, $comprobacion);

if(mysqli_num_rows($resultado) > 0) {
    // La cédula ya está registrada en la tabla personal
    echo '<script type="text/javascript">
            window.onload = function () { alert("Cédula de personal ya registrada"); }
        </script>';
    include("../vista/RegistroT.html");
} else {
    // Insertamos los datos en la tabla personal
    $sql_personal = "INSERT INTO personal (cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
    mysqli_query($conexion, $sql_personal);

    // Obtenemos el código personal insertado
    $codigo_personal = mysqli_insert_id($conexion);

    // Verificamos si se obtuvo un código personal válido
    if($codigo_personal !== null) {
        // Insertamos los datos en la tabla informatico con el código personal como clave foránea
        $sql_limpieza = "INSERT INTO informatico (nombrearea, sueldo, codigopersonal) VALUES ('$nombrearea', '$sueldo', '$codigo_personal')";
        mysqli_query($conexion, $sql_limpieza);

        // Notificamos al usuario que se ha registrado exitosamente
        echo '<script language="javascript">alert("Se ha registrado exitosamente");</script>';
        include("../vista/RegistroT.html");
    } else {
        // Manejar el caso de código personal nulo
        echo "Error: No se pudo obtener el código personal.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

