<?php
include "Conexion.php";
$idProveedor = $_POST['id_proveedor'];
$nombre = $_POST['nombre_proveedor'];
$pais = $_POST['pais_proveedor'];
$telefono = $_POST['telefono_proveedor'];
$correo = $_POST['correo_proveedor'];


$query = "UPDATE Proveedores SET nombre = '" .$nombre. "',pais = '" .$pais. "', telefono ='" .$telefono. "',correo ='" .$correo. "' WHERE idProveedor = '" .$idProveedor. "'";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Juego modificado correctamente');
            location.assign('../html/Proveedor.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo modificar');
            location.assingn('../html/Proveedor.html');
            </script>";
}
die();
