<?php
$Vr= $_GET['var1'];
if($Vr==1){
    include("../vista/RegistroT.html");
}else{
    if($Vr==2){
        include("../vista/ConsultarT.php");
    
    }else{
        if($Vr==3){
            include("../vista/ActualizarT.php");
        
        } else{
            if($Vr==4){
                include("../vista/EliminarL.html");
            
        }
    }
}
}
?>