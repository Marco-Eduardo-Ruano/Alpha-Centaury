<?php
include "conexion.php";

$salida = "";
if ($_POST['idJuego'] != null) {
    $q = $_POST['idJuego'];
    $query = "SELECT * FROM juegos WHERE idjuego LIKE '$q%'";
    $resultado = mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultado) > 0) {
    }
    $salida .= "<table class='tabla-bonita'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Clasificacion</th>
                    <th>Precio C/U</th>
                    <th>Inventario</th>
                    <th>Cantidad</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= "
        <tr>
            <td id='id_juego'>" . $fila['idJuego'] . "</td>
            <td id='nombre'>" . $fila['nombre'] . "</td>
            <td id='clasificacion'>" . $fila['clasificacion'] . "</td>
            <td id='precio'>" . $fila['precioVenta'] . "</td>
			<td id='inventario'>" . $fila['cantidad'] . "</td>
            <td><input class='form-control form-field' type='number' id='numero_juegos' placeholder='No. de juegos'></td>
            <td><a class='btn btn-bd-light' id='boton_add' onclick='add()'>Añadir</button></td>
            </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "<table class='tabla-bonita'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Clasificacion</th>
                    <th>Precio C/U</th>
                    <th>Inventario</th>
                    <th>Cantidad</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td>No hay datos, no existe</td>
            </tr>
            </tbody></table>";
}
echo $salida;
mysqli_close($conexion);
