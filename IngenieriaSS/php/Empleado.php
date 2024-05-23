<?php
include "Conexion.php";
$nss = $_POST['nss_empleado'];
$nombre = $_POST['nombre_empleado'];
$edad = $_POST['edad_empleado'];
$rfc = $_POST['rfc_empleado'];
$estado = 'Activo';
$contrasena = $_POST['contrasena_empleado'];

$query = "INSERT INTO empleados VALUES ('$nss','$nombre','$edad','$rfc','$estado','$contrasena')";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Empleado añadido correctamente');
            location.assign('../html/Empleado.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo añadir');
            location.assingn('../html/Empleado.html');
            </script>";
}
die();
