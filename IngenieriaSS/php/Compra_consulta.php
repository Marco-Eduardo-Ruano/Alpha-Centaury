<?php
include "conexion.php";
$iva = 0.16; // IVA del 16%
$salida = "";
$query = "SELECT C.*, E.nombre AS nombre_empleado
          FROM Compras C
          INNER JOIN Empleados E ON C.nss = E.nss";

if ($_POST['consulta'] != null) {
    $q = $_POST['consulta'];
    $query = "SELECT C.folioCompra AS 'folio',
                     C.nss AS 'nss',
                     E.nombre AS 'nombre',
                     C.fecha AS 'fecha',
                     JC.idJuegosCompra AS 'Id_Juego_Compra',
                     JC.idJuego AS 'Id_Juego',
                     J.nombre AS 'Nombre_Juego',
                     JC.cantidad AS 'Cantidad',
                     JC.precioCompra AS 'Precio'
              FROM Compras C
              JOIN Empleados E ON C.nss = E.nss
              JOIN JuegosCompra JC ON C.folioCompra = JC.folioCompra
              JOIN Juegos J ON JC.idJuego = J.idJuego
              WHERE C.folioCompra = $q";

    $resultado = mysqli_query($conexion, $query);

    if ($resultado->num_rows > 0) {
        $salida .= "<table class='tabla-bonita'>
                        <thead>
                            <th>Folio Compra</th>
                            <th>NSS Empleado</th>
                            <th>Nombre Empleado</th>
                            <th>Fecha</th>
                            <th>Id Juego Compra</th>
                            <th>Id Juego</th>
                            <th>Nombre Juego</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Importe</th>
                        </thead>
                        <tbody>";

        $total = 0.0;

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $importe = (float)$fila['Precio'] * (float)$fila['Cantidad'];
            $total += $importe;

            $salida .= "<tr>
                            <td>" . $fila['folio'] . "</td>
                            <td>" . $fila['nss'] . "</td>
                            <td>" . $fila['nombre'] . "</td>
                            <td>" . $fila['fecha'] . "</td>
                            <td>" . $fila['Id_Juego_Compra'] . "</td>
                            <td>" . $fila['Id_Juego'] . "</td>
                            <td>" . $fila['Nombre_Juego'] . "</td>
                            <td>" . $fila['Cantidad'] . "</td>
                            <td>" . $fila['Precio'] . "</td>
                            <td>" . $importe . "</td>
                        </tr>";
        }

        $calculoiva = $total * $iva;
        $total2 = $total + $calculoiva;

        $salida .= "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td>" . $total . "</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>IVA</td>
                        <td>" . $calculoiva . "</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>" . $total2 . "</td>
                    </tr>
                </tbody>
            </table>";
    } else {
        $salida .= "No hay datos :'(";
    }
} else {
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        $salida .= "<table class='tabla-bonita'>
                        <thead>
                            <th>Folio Compra</th>
                            <th>NSS Empleado</th>
                            <th>Nombre Empleado</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<tr>
                            <td>" . $fila['folioCompra'] . "</td>
                            <td>" . $fila['nss'] . "</td>
                            <td>" . $fila['nombre_empleado'] . "</td>
                            <td>" . $fila['fecha'] . "</td>
                        </tr>";
        }

        $salida .= "</tbody></table>";
    }
}

echo $salida;
mysqli_close($conexion);
