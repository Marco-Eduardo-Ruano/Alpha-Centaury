<?php
include "conexion.php";
$iva = .16;
$salida = "";
$query = "SELECT V.*, E.nombre AS nombre_vendedor
FROM Ventas V
INNER JOIN Empleados E ON V.nss = E.nss";
if ($_POST['consulta'] != null) {
    $q = $_POST['consulta'];
    $query = "SELECT V.folioVenta AS 'folio',
        V.nss AS 'nss',
        E.nombre AS 'nombre',
        V.fecha AS 'fecha',
        JV.idJuegosVenta AS 'Id_Juego_Venta',
        JV.idJuego AS 'Id_Juego',
        J.nombre AS 'Nombre_Juego',
        JV.cantidad AS 'Cantidad',
        JV.precioVenta AS 'Precio'
        FROM Ventas V
        JOIN Empleados E ON V.nss = E.nss
        JOIN JuegosVenta JV ON V.folioVenta = JV.folioVenta
        JOIN Juegos J ON JV.idJuego = J.idJuego
        WHERE V.folioVenta = $q";
    $resultado = mysqli_query($conexion, $query);
    if ($resultado->num_rows > 0) {
        $salida .= "<table class='tabla-bonita'>
        <thead>
        <th>Folio Venta</th>
        <th>NSS Vendedor</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Id Juego Venta</th>
        <th>Id Juego</th>
        <th>Nombre Juego</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Importe</th>
        </thead>
        <tbody>";
        $cont = 1;
        $total = 0.0;
        $importe = 0.0;
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $importe = (float)$fila['Precio'] * (float)$fila['Cantidad'];
            $total += $importe;
            if ($cont == 1) {
                $salida .= "<tr>
            <td>" . $fila['folio'] . "</td>
            <td>" . $fila['nss'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            <td>" . $fila['fecha'] . "</td>
            <td>" . $fila['Id_Juego_Venta'] . "</td>
            <td>" . $fila['Id_Juego'] . "</td>
            <td>" . $fila['Nombre_Juego'] . "</td>
            <td>" . $fila['Cantidad'] . "</td>
            <td>" . $fila['Precio'] . "</td>
            <td>" . $importe . "</td>
            </tr>";
            } else {
                $salida .= "<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>" . $fila['Id_Juego_Venta'] . "</td>
            <td>" . $fila['Id_Juego'] . "</td>
            <td>" . $fila['Nombre_Juego'] . "</td>
            <td>" . $fila['Cantidad'] . "</td>
            <td>" . $fila['Precio'] . "</td>
            <td>" . $importe . "</td>
            </tr>";
            }
            $cont++;
        }
        $calculoiva = $total * $iva;
        $total2 = $total + $calculoiva;
        $salida .= "
        <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Sub Total </td>
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
                <td>IVA </td>
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
        </tbody></table>";
    } else {
        $salida .= "No hay datos :'(";
    }
} else {
    $resultado = $conexion->query($query);
    if ($resultado->num_rows > 0) {
        $salida .= "<table class='tabla-bonita'>
        <thead>
        <th>Folio Venta</th>
        <th>NSS Vendedor</th>
        <th>Nombre</th>
        <th>Fecha</th>
        </thead>
        <tbody>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "
            <tr>
            <td>" . $fila['folioVenta'] . "</td>
            <td>" . $fila['nss'] . "</td>
            <td>" . $fila['nombre_vendedor'] . "</td>
            <td>" . $fila['fecha'] . "</td>
            </tr>";
        }
        $salida .= "</tbody></table>";
    }
}
echo $salida;
mysqli_close($conexion);
