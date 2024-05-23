<?php
include "conexion.php";
$iva = 0.16; // IVA del 16%
$salida = "";
$query = "SELECT P.*, E.nombre AS 'nombre_empleado', F.nombre AS 'nombre_franquicia'
          FROM Pedidos P
          INNER JOIN Empleados E ON P.nss = E.nss
          INNER JOIN Franquicias F ON P.idFranquicia = F.idFranquicia";


if (isset($_POST['consulta']) && $_POST['consulta'] != null) {
    $q = $_POST['consulta'];
    $query = "SELECT P.folioPedido AS 'folio',
    P.idFranquicia AS 'idFranquicia',
    F.nombre AS 'nombre_franquicia',
    P.nss AS 'nss',
    E.nombre AS 'nombre',
    P.fecha AS 'fecha',
    P.fechaFinal AS 'fecha_entrega',
    JP.idJuegoPedido AS 'Id_Juego_Pedido',
    JP.idJuego AS 'Id_Juego',
    J.nombre AS 'Nombre_Juego',
    JP.cantidad AS 'Cantidad',
    JP.precioVenta AS 'Precio'
    FROM Pedidos P
    JOIN Empleados E ON P.nss = E.nss
    JOIN JuegosPedido JP ON P.folioPedido = JP.folioPedido
    JOIN Juegos J ON JP.idJuego = J.idJuego
    JOIN Franquicias F ON P.idFranquicia = F.idFranquicia
    WHERE P.folioPedido = $q";

    $resultado = mysqli_query($conexion, $query);

    if ($resultado->num_rows > 0) {
        $salida .= "<table class='tabla-bonita'>
                        <thead>
                            <th>Folio Pedido</th>
                            <th>NSS Empleado</th>
                            <th>Nombre Empleado</th>
                            <th>Id Franquicia</th>
                            <th>Nombre Franquicia</th>
                            <th>Fecha</th>
                            <th>Fecha Entrega</th>
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
                            <td>" . $fila['idFranquicia'] . "</td>
                            <td>" . $fila['nombre_franquicia'] . "</td>
                            <td>" . $fila['fecha'] . "</td>
                            <td>" . $fila['fecha_entrega'] . "</td>
                            <td>" . $fila['Id_Juego_Pedido'] . "</td>
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
                            <th>Id Franquicia</th>
                            <th>Nombre Franquicia</th>
                            <th>Fecha</th>
                            <th>Fecha Entrega</th>
                        </thead>
                        <tbody>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<tr>
                            <td>" . $fila['folioPedido'] . "</td>
                            <td>" . $fila['nss'] . "</td>
                            <td>" . $fila['nombre_empleado'] . "</td>
                            <td>" . $fila['idFranquicia'] . "</td>
                            <td>" . $fila['nombre_franquicia'] . "</td>
                            <td>" . $fila['fecha'] . "</td>
                            <td>" . $fila['fechaFinal'] . "</td>
                        </tr>";
        }

        $salida .= "</tbody></table>";
    }
}

echo $salida;
mysqli_close($conexion);
