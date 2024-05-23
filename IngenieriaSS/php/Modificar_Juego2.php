<?php
include "Conexion.php";
$idjuego = $_POST['id_juego'];
$idproveedor = $_POST['id_proveedor'];
$nombre = $_POST['nombre_juego'];
$preciocompra = $_POST['juego_precioCompra'];
$precioventa = $_POST['juego_precioVenta'];
$clasificacion = $_POST['clasificacion_juego'];
$tipo = $_POST['tipo_juego'];
$estado = $_POST['estado_juego'];
$cantidad = $_POST['cantidad_juego'];

$query = "update juegos set idJuego = '" . $idjuego . "', idProveedor = '" . $idproveedor . "', nombre ='" . $nombre . "', precioCompra = '" . $preciocompra . "', precioVenta = '" . $precioventa . "', clasificacion = '" . $clasificacion . "',tipo = '" . $tipo . "', estado ='" . $estado . "',cantidad ='" . $cantidad . "' where idJuego = '" . $idjuego . "'";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Juego modificado correctamente');
            location.assign('../html/Juego.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo modificar');
            location.assingn('../html/Juego.html');
            </script>";
}
die();
