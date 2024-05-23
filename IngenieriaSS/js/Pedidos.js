let isVisible = false;
let datos = [];
toggleDiv();
function toggleDiv(isVisible) {
  document.getElementById("lo_de_Juegos").style.display = isVisible ? "block" : "none";
}
const fecha = new Date().toLocaleDateString();
document.getElementById("fecha").innerHTML = `Fecha: ${fecha}`;
//---------------------------------------------------------------------------------//

select_empleado();
function select_empleado() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("select_empleado").innerHTML = xhr.responseText;
                const empleado = document.getElementById('ids_empleados');
                empleado.addEventListener("change", function() {
                    const nss = empleado.value;
                    if (nss != "Selecciona un empleado") {
                        toggleDiv(isVisible = true);
                    }
                    else {
                        toggleDiv(isVisible = false);
                    }
                    buscar_empleado(nss);
                });
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };


    xhr.open("POST", '../php/Empleado_nombre.php', true);
    xhr.send();
}
//---------------------------------------------------------------------------------//

select_franquicia();
function select_franquicia() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("select_franquicia").innerHTML = xhr.responseText;
                const franquicia = document.getElementById('ids_franquicias');
                franquicia.addEventListener("change", function() {
                    const idFranquicia = franquicia.value;
                    if (idFranquicia != "Selecciona una franquicia") {
                        toggleDiv(isVisible = true);
                    }
                    else {
                        toggleDiv(isVisible = false);
                    }
                    buscar_franquicia(idFranquicia);
                });
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };


    xhr.open("POST", '../php/Franquicia_nombre.php', true);
    xhr.send();
}
//---------------------------------------------------------------------------------//

buscar_folio();
function buscar_folio() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("folio_pedido").innerHTML = xhr.responseText;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };


    xhr.open("POST", '../php/Consulta_no_folio_pedido.php', true);
    xhr.send();
}
//----------------------------------------------------------------------------------//
function buscar_empleado(consulta) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("contenido_empleado").innerHTML = xhr.responseText;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var formData = new FormData();
    formData.append('consulta', consulta);

    xhr.open("POST", '../php/Empleado_consulta_venta.php', true);
    xhr.send(formData);
}
//-----------------------------------------------------------------------------//

function buscar_franquicia(consulta) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("contenido_franquicia").innerHTML = xhr.responseText;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var formData = new FormData();
    formData.append('consulta', consulta);

    xhr.open("POST", '../php/Franquicia_consulta_pedido.php', true);
    xhr.send(formData);
}
//-----------------------------------------------------------------------------//

function buscar_juego(idJuego) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("contenido_juego").innerHTML = xhr.responseText;
                let isVisible = false;
                const id = parseInt(document.querySelector('#id_juego').textContent);
                var inventario = parseInt(document.querySelector('#inventario').textContent);
                for (let articulo of datos){
                    if (id == articulo[0]) {
                        inventario = inventario - articulo[3];
                        document.getElementById("inventario").innerHTML = inventario;
                    }
                }
                document.getElementById("boton_add").style.display = "none";
                const cantidad = document.getElementById('numero_juegos');
                cantidad.addEventListener('input', function () {
                    var valor = cantidad.value;
                    console.log("valor:" + valor)
                    if (valor < inventario && valor > 0 && valor != '') {
                        isVisible = true;
                    }
                    else {
                        isVisible = false;
                    }
                    document.getElementById("boton_add").style.display = isVisible ? "block" : "none";
                });
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var formData = new FormData();
    formData.append('idJuego', idJuego);

    xhr.open("POST", '../php/Juego_consulta_pedido.php', true);
    xhr.send(formData);
}

const id_juego = document.getElementById('idJuego');
id_juego.addEventListener('input', function() {
    var valor = id_juego.value;
    buscar_juego(valor);
});
//------------------------------------------------------------------//


function add() {
    const id = parseInt(document.querySelector('#id_juego').textContent);
    const nombre = document.querySelector('#nombre').textContent;
    const precio = parseInt(document.querySelector('#precio').textContent);
    //const inventario = parseInt(document.querySelector('#inventario').textContent);
    const cantidad = parseInt(document.querySelector('#numero_juegos').value);
    var sumo = false;
    for (let articulo of datos){
        if(id == articulo[0]){
            articulo[3]+= cantidad;
            articulo[4]= articulo[2]*articulo[3];
            sumo = true;
        }
    }
    if (sumo == false){
        datos.push([id, nombre, precio, cantidad]);
    }  
    document.getElementById("tabla_articulos").innerHTML = crearTabla(datos);
    var inventario = parseInt(document.querySelector('#inventario').textContent);
    for (let articulo of datos){
         if (id == articulo[0]) {
             console.log(articulo[3]);
             inventario = inventario - articulo[3];
             document.getElementById("inventario").innerHTML = inventario;
         }
    }
    buscar_juego(id);
}
//--------------------------------------------------------------------------------------------------//


function crearTabla(lista) {
  // Define the VAT rate
  const iva = 0.16;

  // Initialize variables for calculations
  let subtotal = 0;
  let totalVAT = 0;
  let grandTotal = 0;

  // Construct the table header
  let stringTabla = "<h2>Carrito</h2><table class='tabla-bonita'><thead><tr><th>ID</th><th>Nombre</th><th>Precio c/u</th><th>Cantidad</th><th>Importe</th></tr></thead><tbody>";

  // Iterate through the list of items
  for (let articulo of lista) {
    // Calculate the item's total price
    const itemTotal = articulo[2] * articulo[3];

    // Update subtotal
    subtotal += itemTotal;

    // Construct the table row for the item
    const fila = `<tr><td>${articulo[0]}</td><td>${articulo[1]}</td><td>${articulo[2]}</td><td>${articulo[3]}</td><td>${itemTotal}</td></tr>`;

    // Add the row to the table string
    stringTabla += fila;
  }

  // Calculate total VAT
  totalVAT = subtotal * iva;

  // Calculate grand total
  grandTotal = subtotal + totalVAT;

  // Construct the subtotal row
  const filaFinal = `<tr><td></td><td></td><td></td><td>Sub Total:</td><td>${Math.round(subtotal)}</td></tr>`;
  stringTabla += filaFinal;

  // Construct the VAT row
  const filaiva = `<tr><td></td><td></td><td></td><td>IVA: </td><td>${Math.round(totalVAT)}</td></tr>`;
  stringTabla += filaiva;

  // Construct the grand total row
  const filacalculoTotal = `<tr><td></td><td></td><td></td><td>Total: </td><td>${Math.round(grandTotal)}</td></tr>`;
  stringTabla += filacalculoTotal;

  // Construct the buttons row
  const filabotones = `<tr><td></td><td></td><td></td><td><a class="btn btn-bd-light" type="button" href='Pedido.html'>Cancelar</a></td><td><button class="btn btn-primary" onclick="guardar()">Guardar</button></td></tr>`;
  stringTabla += filabotones;

  // Close the table and return the HTML string
  stringTabla += "</tbody></table>";
  return stringTabla;
}

function guardar() {
    console.log(fecha);
	const fechaEntrega = document.getElementById('fecha_entrega').value;
	console.log(fechaEntrega);
    const folio = parseInt(document.getElementById('folio_pedido').innerText);
    console.log(folio);
    const idempleado = parseInt(document.getElementById('idempleado').innerHTML);
    console.log(idempleado);
	const idFranquicia = parseInt(document.getElementById('ids_franquicias').value);
    console.log(idFranquicia);
    console.log(datos);
    addPedido(fecha, fechaEntrega, folio, idempleado,idFranquicia, datos);

}
function addPedido(fecha, fechaEntrega,folio,idempleado, idFranquicia, datos) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("tabla_articulos").innerHTML = xhr.responseText;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var formData = new FormData();
    formData.append('fecha', fecha);
	formData.append('fecha_entrega', fechaEntrega);
    formData.append('folio', folio);
    formData.append('idempleado', idempleado);
    formData.append('idfranquicia', idFranquicia);
    formData.append('datos', JSON.stringify(datos));
    xhr.open("POST", '../php/Pedido.php', true);
    xhr.send(formData);
}