<?php
include "Conexion.php";
$nombre = $_POST['nombre_franquicia'];
$telefono = $_POST['telefono_franquicia'];
$correo = $_POST['correo_franquicia'];
$direccion = $_POST['direccion_franquicia'];
$gerente = $_POST['gerente_franquicia'];

$query = "INSERT INTO franquicias VALUES ('','$nombre','$telefono','$correo','$direccion')";

if (mysqli_query($conexion, $query)) {
    echo "<script>
            alert('Franquicia añadida correctamente');
            location.assign('../html/Franquicia.html');
            </script>";
} else {
    echo "<script>
            alert('No se pudo añadir');
            location.assingn('../html/Franquicia.html');
            </script>";
}
die();
