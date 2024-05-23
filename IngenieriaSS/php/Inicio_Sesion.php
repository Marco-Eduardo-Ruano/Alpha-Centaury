<?php
include "conexion.php";
$password = $_POST['password'];
$id = $_POST['id'];
$query = "SELECT nss, contraseña FROM empleados where nss ='$id'";
$consulta = mysqli_query($conexion, $query);
$obj = mysqli_fetch_object($consulta);
$cont = $obj->password;
if (intval($password) == $cont) {
    echo "<script>
            location.assign('../html/empleado.html');
            </script>";
} else {
    echo "<script>
            alert('Alguno de los datos esta mal(conexion fallida)');
            location.assign('../html/Inicio_Sesion.html');
            </script>";
}
die();
?>