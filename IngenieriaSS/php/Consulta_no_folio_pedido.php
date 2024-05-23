<?php
include "conexion.php";

$salida = "";
$query = "SELECT folioPedido FROM pedidos order by folioPedido desc limit 1";

$resultado = $conexion->query($query);
$fila = mysqli_fetch_assoc($resultado);
$numero = intval($fila['folioPedido']) + 1;
$salida .=  $numero;
echo $salida;
$conexion->close();
?>