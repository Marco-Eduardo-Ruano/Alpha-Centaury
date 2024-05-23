<?php
include "conexion.php";

$salida = "";
$query = "SELECT * FROM proveedores";
$resultado = mysqli_query($conexion, $query);
$salida .= "<select class='form-control form-field' aria-label='Default select example' id='ids_proveedor' name='proveedor_juego' required>
            <option selected disabled value=''>Selecciona un proveedor</option>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $salida .= "<option value='" . $fila['idProveedor'] . "'>Nombre: " . $fila['nombre'] . " | Id: " . $fila['idProveedor'] . "</option>";
}
$salida .= "</select>";
echo $salida;
