<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Pedido</title>
    <link type="text/css" rel="stylesheet" href="../style.css" />
    <script src="../public/ext/bootstrap/js/jquery-3.2.1.min.js"></script>
</head>
<body>
    <center><h1>Actualizar datos de Personal de Código de Técnico Informático: <?php echo $cedula; ?></h1></center>
</body>
</html>

<?php
include("../config/conexion.php");

$cedula = $_GET['codigo_informatico'];
$sql = "SELECT p.codigo AS codigo_personal, t.codigo AS codigo_informatico, p.cedula, p.nombre, p.apellido, t.nombrearea, t.sueldo 
            FROM personal p 
            LEFT JOIN informatico t ON p.codigo = t.codigopersonal 
            WHERE t.codigo='$codigo_informatico'";
$resultado = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body><center>
        <form action="../modelo/guardarT.php" method="post">
        <table border="1">
        <tr>
            <th>Código de Personal</th>
            <th>Código de Personal Técnico</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Área de Trabajo</th>
            <th>Sueldo</th>
        </tr>
            <tr>
                <td><input type="text" value="<?php echo $mostrar['codigo_personal'] ?>" name="codigopersonal" readonly ></td>
                <td><span><?php echo $mostrar['codigo_informatico'] ?></span></td>
                <td><input type="text" value="<?php echo $mostrar['cedula'] ?>" name="cedula" readonly ></td>
                <td><input type="text" value="<?php echo $mostrar['nombre'] ?>" name="nombre"></td>
                <td><input type="text" value="<?php echo $mostrar['apellido'] ?>" name="apellido"></td>
                <td><input type="text" value="<?php echo $mostrar['nombrearea'] ?>" name="nombrearea"></td>
                <td><input type="text" value="<?php echo $mostrar['sueldo'] ?>" name="sueldo"></td>
                
            </tr>
        </table>
            <center><input type="submit" value="Guardar"></center>
        </form>
    </body>
    </html>
<?php
}
?>