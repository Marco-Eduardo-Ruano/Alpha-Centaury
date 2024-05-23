<?php
include "Conexion.php";
$juegoid = $_GET['id'];
$sql = "select * from juegos where idJuego ='" . $juegoid . "'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
$idProveedor = $fila['idProveedor'];
$nombre = $fila['nombre'];
$precioCompra = $fila['precioCompra'];
$precioVenta = $fila['precioVenta'];
$clasificacion = $fila['clasificacion'];
$tipo = $fila['tipo'];
$estado = $fila['estado'];
$cantidad = $fila['cantidad'];
?>
<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/principal.css">
<title>JuegosCom</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../html/Inicio_Sesion.html">JuegosCOM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Empleados
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Empleado.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_Empleado.html">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Juegos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Juego.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_Juego.html">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pedidos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Pedido.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_Pedido.html">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Proveedor
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Proveedor.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_Proveedor.html">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Franquicias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Franquicia.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_Franquicia.html">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ventas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Venta.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_venta.html">Consultar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Compras
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../html/Compra.html">Agregar</a></li>
                            <li><a class="dropdown-item" href="../html/Consulta_Compra.html">Consultar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="columna-central">
        <div class="contenedor-sombreado">
            <div style="justify-content: center; width: 100%; display: flex;">
                <section class="Titulo">
                    <h1>Modificar juego</h1>
                </section>
            </div>
            <form class="row g-3 needs-validation" action="../php/Modificar_Juego2.php" method="post" novalidate>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Id juego:</label>
                    <input type="text" class="form-control form-field" name="id_juego" placeholder="Id del juego" value=<?php echo $juegoid; ?> readonly required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Id proveedor:</label>
                    <input type="text" class="form-control form-field" name="id_proveedor" placeholder="Id del proveedor" value=<?php echo $idProveedor; ?> readonly required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Nombre:</label>
                    <input type="text" class="form-control form-field" name="nombre_juego" placeholder="Ejemplo:Halo 3" value="<?php echo $nombre; ?>" required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Precio compra:</label>
                    <input type="number" class="form-control form-field" name="juego_precioCompra" placeholder="Ejemplo:220" value=<?php echo $precioCompra; ?> required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Precio venta:</label>
                    <input type="number" class="form-control form-field" name="juego_precioVenta" placeholder="Ejemplo:220" value=<?php echo $precioVenta; ?> required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Clasificacion:</label>
                    <input type="Text" class="form-control form-field" name="clasificacion_juego" placeholder="Ejemplo:Mayores de edad" value="<?php echo $clasificacion; ?>" required>
                    <div class="valid-tooltip">
                        OK!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Tipo:</label>
                    <input type="Text" class="form-control form-field" name="tipo_juego" placeholder="Ejemplo:RPG" value="<?php echo $tipo; ?>" required>
                    <div class="valid-tooltip">
                        OK!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Estado:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado_juego" name="inlineRadio1" value="Disponible" required>
                        <label class="form-check-label" for="inlineRadio1">Disponible</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado_juego" name="inlineRadio2" value="Agotado">
                        <label class="form-check-label" for="inlineRadio2">Agotado</label>
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control form-field" name="cantidad_juego" placeholder="Ejemplo:20" value=<?php echo $cantidad; ?> required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a class="btn btn-bd-light" type="button" href="../html/Consulta_Juego.html">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../js/ComplementoBss.js"></script>

</html>