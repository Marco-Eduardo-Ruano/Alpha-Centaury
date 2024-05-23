<?php
include "conexion.php";

$salida = "";
$query = "SELECT folioCompra FROM compras order by folioCompra desc limit 1";

$resultado = $conexion->query($query);
$fila = mysqli_fetch_assoc($resultado);
$numero = intval($fila['folioCompra']) + 1;
$salida .=  $numero;
echo $salida;
$conexion->close();
