<?php
$Vr= $_GET['var1'];
if($Vr==1){
    include("../vista/RegistroM.html");
}else{
    if($Vr==2){
        include("../vista/ConsultarM.php");
    
    }else{
        if($Vr==3){
            include("../vista/ActualizarM.php");
        
        } else{
            if($Vr==4){
                include("../vista/EliminarM.html");
            
        }
    }
}
}
?>