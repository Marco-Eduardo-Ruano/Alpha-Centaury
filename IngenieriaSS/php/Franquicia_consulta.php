<?php
include "conexion.php";

$salida = "";
$query = "SELECT * FROM franquicias";
echo $_POST['idFranquicia'];
if ($_POST['idFranquicia'] != null) {
    $q = $_POST['idFranquicia'];
	  $query = "SELECT * FROM franquicias WHERE idFranquicia LIKE '$q%'";
}
$resultado = mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado)>0) {
    $salida .= "<table class='tabla-bonita'>
                <thead>
                    <tr>
                        <th>ID Franquicia</th>
						<th>Nombre Franquicia</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida .= "
        <tr>
            <td>" . $fila['idFranquicia'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            <td>" . $fila['telefono'] . "</td>
            <td>" . $fila['correo'] . "</td>
			<td>" . $fila['direccion'] . "</td>
            <td><a class='btn btn-bd-light' type='button' href='../php/Modificar_Franquicia.php? id=" . $fila['idFranquicia'] . "'>Modificar</button></td>
            </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "No hay datos :'(";
}
echo $salida;
mysqli_close($conexion);
