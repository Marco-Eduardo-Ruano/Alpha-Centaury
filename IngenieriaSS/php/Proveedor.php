<?php
include "Conexion.php";
$nombre = $_POST['nombre_proveedor'];
$pais = $_POST['pais_proveedor'];
$telefono = $_POST['telefono_proveedor'];
$correo = $_POST['correo_proveedor'];


$query = "INSERT INTO proveedores VALUES ('','$nombre','$pais','$telefono','$correo')";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Proveedor añadido correctamente');
            location.assign('../html/Proveedor.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo añadir');
            location.assingn('../html/Proveedor.html');
            </script>";
}
die();
