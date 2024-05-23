<?php
include "conexion.php";

$salida = "";
$query = "SELECT * FROM empleados";
$resultado = mysqli_query($conexion, $query);
$salida .= "<select class='form-control form-field' aria-label='Default select example' id='ids_empleados' required>
            <option selected disabled value=''>Selecciona un empleado</option>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $salida .= "<option value='" . $fila['nss'] . "'>Nombre: " . $fila['nombre'] . "| NSS: " . $fila['nss'] . "</option>";
}
$salida .= "</select>";
echo $salida;
