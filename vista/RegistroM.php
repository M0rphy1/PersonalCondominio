<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../style.css" />
    <script src="../public/ext/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="../js/restricciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="navbar-container">
        <div class="navbar">
            <div class="navbar-left">
                <div><a href="index.html"></a></div>
                <div><a class="" href="../index.html"><h1><center>Gestión de Personal de Mantenimiento</center></h1></a><br> <h1><center>Registro</center></h1></a></div>
            </div>
        </div>
    </div>
    <center><h1>Ingreso de Datos</h1></center>
    <form action="../modelo/registroM.php" method="post">
        <center>
            <label for="">Cédula:</label>
            <input type="text" name="cedula" id="cedula" placeholder="Ejemplo:0604824656"  onkeypress="return numeros(event)" minlength="10" maxlength="10" required><br><br>
            <label for="">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Ejemplo:Gabriel" onkeypress="return letras(event)"  required><br><br>
            <label for="">Apellido:</label>
            <input type="text" name="apellido" id="apellido" placeholder="Ejemplo:Vallejo" onkeypress="return letras(event)" required><br><br>
            <label for="">Nombre del Área de Trabajo:</label>
            <input type="text" name="nombrearea" id="nombrearea" placeholder="Ejemplo: Mantenimiento" required><br><br>
            <label for="">Sueldo:</label>
            <input type="number" name="sueldo" id="sueldo" placeholder="Ejemplo: 1000.00" step="0.01" min="0" required><br><br>
            <input type="submit" value="Registrar" onclick="IngresoMensaje()">
            
        </center>

    </form>
</body>
</html>