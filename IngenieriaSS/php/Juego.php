<?php
include "Conexion.php";
$idproveedor = $_POST['proveedor_juego'];
$nombre = $_POST['nombre_juego'];
$preciocompra = $_POST['preciocompra_juego'];
$precioventa = $_POST['precioventa_juego'];
$clasificacion = $_POST['clasificacion_juego'];
$tipo = $_POST['tipo_juego'];
$estado = 'Activo';
$cantidad = $_POST['cantidad_juego'];


$query = "INSERT INTO juegos VALUES ('','$idproveedor','$nombre','$preciocompra','$precioventa','$clasificacion','$tipo','$estado','$cantidad')";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Juegio añadido correctamente');
            location.assign('../html/Juego.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo añadir');
            location.assingn('../html/Juego.html');
            </script>";
}
die();
