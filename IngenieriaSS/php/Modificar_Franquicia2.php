<?php
include "Conexion.php";
$idFranquicia = $_POST['id_franquicia'];
$nombre = $_POST['nombre_franquicia'];
$telefono = $_POST['telefono_franquicia'];
$correo = $_POST['correo_franquicia'];
$direccion = $_POST['direccion_franquicia'];

$query = "UPDATE franquicias SET nombre = '" .$nombre. "', telefono ='" .$telefono. "',correo ='" .$correo. "', direccion = '" .$direccion. "' WHERE idFranquicia = '" .$idFranquicia. "'";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Juego modificado correctamente');
            location.assign('../html/Franquicia.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo modificar');
            location.assingn('../html/Franquicia.html');
            </script>";
}
die();