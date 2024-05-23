<?php
include "conexion.php";

$folio = $_POST['folio'];
$idempleado = $_POST['idempleado'];
$fecha = $_POST['fecha'];
$data = json_decode($_POST['datos'], true); // Decodificar el JSON para obtener un array asociativo

$query = "INSERT INTO ventas VALUES ('$folio', '$idempleado', '$fecha')";
if (!mysqli_query($conexion, $query)) {
    echo "<script>alert('No se pudo añadir');</script>";
    return;
}

foreach ($data as $value) {
    $idJuego = $value[0]; // Acceder a los valores del array asociativo
    $cantidad = $value[3];
    $precioVenta = $value[2];

    $salida = "INSERT INTO juegosVenta VALUES ('', '$folio', '$idJuego', '$cantidad', '$precioVenta')";
    if (!mysqli_query($conexion, $salida)) {
        echo "<script>alert('No se pudo añadir');</script>";
        return;
    }

    $query = "SELECT cantidad FROM juegos WHERE idJuego = '$idJuego'";
    $consulta = mysqli_query($conexion, $query);
    $obj = mysqli_fetch_object($consulta);
    $existencia = intval($obj->cantidad);
    $existencia -= $cantidad;

    $query = "UPDATE juegos SET cantidad = '$existencia' WHERE idJuego = '$idJuego'";
    mysqli_query($conexion, $query);
}

echo "<script>alert('Venta registrada'); window.location.reload();</script>";
die();
