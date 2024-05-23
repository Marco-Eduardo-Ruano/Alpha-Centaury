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