<?php
$Vr= $_GET['var1'];
if($Vr==1){
    include("../vista/RegistroL.html");
}else{
    if($Vr==2){
        include("../vista/ConsultarL.php");
    
    }else{
        if($Vr==3){
            include("../vista/ActualizarL.php");
        
        } else{
            if($Vr==4){
                include("../vista/EliminarL.html");
            
        }
    }
}
}
?>
