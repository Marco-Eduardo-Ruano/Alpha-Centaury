<?php
include "conexion.php";

$salida = "";
$query = "SELECT * FROM proveedores";
echo $_POST['idProveedor'];
if ($_POST['idProveedor'] != null) {
    $q = $_POST['idProveedor'];
    $query = "SELECT * FROM proveedores WHERE idProveedor LIKE '$q%'";
}
$resultado = mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado) > 0) {
    $salida .= "<table class='tabla-bonita'>
                <thead>
                    <tr>
						<th>ID Proveedor</th>
                        <th>Nombre Proveedor</th>
                        <th>Pais de origen</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= "
        <tr>
            <td>" . $fila['idProveedor'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            <td>" . $fila['pais'] . "</td>
            <td>" . $fila['telefono'] . "</td>
            <td>" . $fila['correo'] . "</td>
            <td><a class='btn btn-bd-light' type='button' href='../php/Modificar_Proveedor.php? id=" . $fila['idProveedor'] . "'>Modificar</button></td>
            </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "No hay datos :'(";
}
echo $salida;
mysqli_close($conexion);
