buscar('');

function buscar(idProveedor = '') {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("contenido").innerHTML = xhr.responseText;
                console.log("contenido");
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var formData = new FormData();
    formData.append('idProveedor', idProveedor);

    xhr.open("POST", '../php/Proveedor_consulta.php', true);
    xhr.send(formData);
}

const miInput = document.getElementById('idProveedor');

miInput.addEventListener('input', function() {
    var valor = miInput.value;
    buscar(valor);
});
