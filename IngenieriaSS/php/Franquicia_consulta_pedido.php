<?php
include "conexion.php";

$salida = "";
$q = $_POST['consulta'];
$query = "SELECT * FROM franquicias WHERE idFranquicia = '$q'";
$resultado = mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado) > 0) {
    $salida .= "<table class='tabla-bonita'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= "
        <tr>
            <td id='idFranquicia'>" . $fila['idFranquicia'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "<table class='tabla-bonita'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td>No se encontro</td>
            </tr>
            </tbody></table>";
}
echo $salida;
mysqli_close($conexion);