function letras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    var letra="ABCDEFGHIJKALMNÑOPEQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóúÁÉÍÓÚ ";
    especiales="8-37-38-46";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }
    if(letra.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
    
}
function numeros(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    var numero="0123456789";
    especiales="8-37-38-46";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }
    if(numero.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }    
    }
    function decimal(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        var numero="0123456789.";
        especiales="8-37-38-46";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            }
        }
        if(numero.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }    
        }

    function IngresoMensaje(){
        var v1 = document.getElementById("cedula").value;
        var v2 = document.getElementById("nombre").value;
        var v3 = document.getElementById("apellido").value;
        var v4 = document.getElementById("direccion").value;
        var v5 = document.getElementById("telefono").value;

        if(v1 == "" || v2 == "" || v3 == "" || v4 == "" || v5 == ""){
            alert("No se puede dejar campos vacios");
        // }else{
        //     Swal.fire({
        //         titleText: "Realizado",
        //         text: "Campos ingresados exitosamente.",
        //         icon: "success",
        //         confirmButtonTest: "OK",
        //         confirmButtonColor: "#008000"
        //     });
        // }
        }
    }