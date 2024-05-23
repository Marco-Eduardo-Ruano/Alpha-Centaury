<?php
include "conexion.php";

$salida = "";
$query = "SELECT * FROM franquicias";
$resultado = mysqli_query($conexion, $query);
$salida .= "<select class='form-select' aria-label='Default select example' id='ids_franquicias'>
            <option selected>Selecciona una franquicia</option>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $salida .= "<option value='" . $fila['idFranquicia'] . "'>Nombre: " . $fila['nombre'] . "| ID: " . $fila['idFranquicia'] . "</option>";
}
$salida .= "</select>";
echo $salida;
?>