<?php
include "conexion.php";

$salida = "";
$query = "SELECT folioventa FROM ventas order by folioventa desc limit 1";

$resultado = $conexion->query($query);
$fila = mysqli_fetch_assoc($resultado);
$numero = intval($fila['folioventa']) + 1;
$salida .=  $numero;
echo $salida;
$conexion->close();
