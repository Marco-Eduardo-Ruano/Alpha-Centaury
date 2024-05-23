<?php
include "Conexion.php";
$nss = $_POST['nss_empleado'];
$nombre = $_POST['nombre_empleado'];
$edad = $_POST['edad_empleado'];
$rfc = $_POST['rfc_empleado'];
$estado = $_POST['estado_empleado'];
$contrasena = $_POST['contrasena_empleado'];

$query = "UPDATE empleados SET nombre='".$nombre."', edad='".$edad."', rfc='".$rfc."', estado='$estado',contraseña='".$contrasena."' 
		 WHERE nss='".$nss."'";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Empleado Modificado correctamente');
            location.assign('../html/Empleado.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo modificar');
            location.assingn('../html/Empleado.html');
            </script>";
}
die();
