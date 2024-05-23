<?php
include "conexion.php";

$salida = "";
$query = "SELECT * FROM empleados";
if ($_POST['consulta'] != null) {
    $q = $_POST['consulta'];
    $query = "SELECT * FROM empleados WHERE nss LIKE '$q%'";
}
$resultado = mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado) > 0) {
    $salida .= "<table class='tabla-bonita'>
            <thead>
                <tr>
                    <th>NSS</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>RFC</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= "
        <tr>
            <td>" . $fila['nss'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            <td>" . $fila['edad'] . "</td>
            <td>" . $fila['rfc'] . "</td>
            <td>" . $fila['estado'] . "</td>
            <td><a class='btn btn-bd-light' type='button' href='../php/Modificar_Empleado.php? id=" . $fila['nss'] . "'>Modificar</button></td>
            </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "No hay datos :'(";
}
echo $salida;
mysqli_close($conexion);
