<?php
$Vr= $_GET['var1'];
if($Vr==1){
    include('../Vista/RegistroTec.html');
}elseif($Vr== 2){
    include('../Modelo/buscar_mostrar_tecnico.php');
}elseif($Vr== 3){
    include('../Modelo/EditarTecnico.php');
}elseif($Vr== 4){
    include('../Modelo/EliminarTecnico.php');
}
