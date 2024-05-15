<?php
$conexion= mysqli_connect('localhost','root','','ptecnico');
if(mysqli_connect_errno()){
    echo ''.mysqli_connect_error();
}