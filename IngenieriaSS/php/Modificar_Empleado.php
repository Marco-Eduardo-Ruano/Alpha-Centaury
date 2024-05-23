<?php
include "Conexion.php";
$nss = $_GET['id'];
$sql = "select * from empleados where nss ='" . $nss . "'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
$nss = $fila['nss'];
$nombre = $fila["nombre"];
$edad = $fila['edad'];
$rfc = $fila['rfc'];
$estado = $fila['estado'];
$contrasena = $fila['contraseña'];
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
                    <h1>Modificar empledo</h1>
                </section>
            </div>
            <form class="row g-3 needs-validation" action="Modificar_Empleado2.php" method="post" novalidate>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Nombre</label>
                    <input type="text" class="form-control form-field" name="nombre_empleado" placeholder="Ejemplo: Marco Antonio Perez Perez" value="<?php echo $nombre; ?>" required>
                    <div class="valid-tooltip">
                        Bien!
                    </div>
                    <div class="invalid-tooltip">
                        Falta tu nombre
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">NSS:</label>
                    <input type="number" class="form-control form-field" name="nss_empleado" placeholder="Ejemplo:12345678910" min="10000000000" max="99999999999" value=<?php echo $nss; ?> readonly required>
                    <div class="valid-tooltip">
                        Recuerda que son 11 numeros!
                    </div>
                    <div class="invalid-tooltip">
                        Falta tu NSS o numero incorrecto
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Edad:</label>
                    <input type="number" class="form-control form-field" name="edad_empleado" placeholder="Ejemplo:22" min="18" max="150" value=<?php echo $edad; ?> required>
                    <div class="valid-tooltip">
                        Buena edad!
                    </div>
                    <div class="invalid-tooltip">
                        Falta tu edad o edad incorrecta
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">RFC:</label>
                    <input type="Text" class="form-control form-field" name="rfc_empleado" placeholder="Ejemplo:QUMA470929F37" value=<?php echo $rfc; ?> required>
                    <div class="valid-tooltip">
                        OK!
                    </div>
                    <div class="invalid-tooltip">
                        Falta tu RFC
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="Radiobutons" class="form-label">Estado:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado_empleado" name="inlineRadio1" value="Activo" required>
                        <label class="form-check-label" for="inlineRadio1">Activo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado_empleado" name="inlineRadio2" value="Inactivo">
                        <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado_empleado" name="inlineRadio3" value="Incapacidad">
                        <label class="form-check-label" for="inlineRadio3">Incapacitado</label>
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">
                        Contraseña:</label>
                    <input type="password" class="form-control form-field" name="contrasena_empleado" placeholder="Ejemplo:Tac0s_D3_p0llo" value=<?php echo $contrasena; ?> required>
                    <div class="valid-tooltip">
                        OK!
                    </div>
                    <div class="invalid-tooltip">
                        Falta tu contraseña
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a class="btn btn-bd-light" type="button" href="../html/Consulta_Empleado.html">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../js/ComplementoBss.js"></script>

</html>