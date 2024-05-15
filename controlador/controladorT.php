<?php
$Vr = isset($_GET['var1']) ? $_GET['var1'] : null;

switch ($Vr) {
    case 1:
        include("../vista/RegistroT.html");
        break;
    case 2:
        include("../vista/ConsultarT.php");
        break;
    case 3:
        include("../vista/ActualizarT.php");
        break;
    case 4:
        include("../vista/EliminarT.html");
        break;
    default:
        echo "Opción no válida";
        break;
}
?>