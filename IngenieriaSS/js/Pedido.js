buscar('');

function buscar(idPedido = '') {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("contenido").innerHTML = xhr.responseText;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var formData = new FormData();
    formData.append('consulta', idPedido);

    xhr.open("POST", '../php/Pedido_consulta.php', true);
    xhr.send(formData);
}

const miInput = document.getElementById('idPedido');

miInput.addEventListener('input', function() {
    var valor = miInput.value;
    buscar(valor);
    console.log(valor);
});
