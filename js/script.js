function encender() {
    fetch('../php/actualizar_estado.php?estado=1')
        .then(function (response) {
            if (response.ok) {
                document.getElementById('encenderBtn').disabled = true;
                document.getElementById('apagarBtn').disabled = false;
            } else {
                console.error('Error:', response.statusText);
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });

    // Guardar estado del botón "Encender" en localStorage
    localStorage.setItem('estadoEncender', true);
    localStorage.setItem('estadoApagar', false);

    estadoBotonesOnOff();
}

function apagar() {
    fetch('../php/actualizar_estado.php?estado=0')
        .then(function (response) {
            if (response.ok) {
                document.getElementById('encenderBtn').disabled = false;
                document.getElementById('apagarBtn').disabled = true;
            } else {
                console.error('Error:', response.statusText);
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });

    // Guardar estado del botón "Apagar" en localStorage
    localStorage.setItem('estadoEncender', false);
    localStorage.setItem('estadoApagar', true);

    estadoBotonesOnOff();
}

function obtenerTemperatura() {
    fetch('../php/obtener_temperatura.php')
        .then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                console.error('Error:', response.statusText);
            }
        })
        .then(function (data) {
            document.getElementById('temperaturaValor').textContent = data + "°C";
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
}

function obtenerUbicacion() {
    fetch('../php/obtener_ubicacion.php')
        .then(function (response) {

            if (response.ok) {
                console.log(response);
                return response.text();

            } else {
                console.error('Error:', response.statusText);
                console.log(response);
            }
        })
        .then(function (data) {
            console.log(data);
            document.getElementById('lugar').textContent = data;
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
}

function cambiarModo() {
    var modoSwitch = document.getElementById('modoSwitch');
    var subirBtn = document.getElementById('subirBtn');
    var bajarBtn = document.getElementById('bajarBtn');

    if (modoSwitch.checked) {
        subirBtn.disabled = true;
        bajarBtn.disabled = true;
    } else {
        subirBtn.disabled = false;
        bajarBtn.disabled = false;
    }

    // Guardar estado del checkbox en localStorage
    localStorage.setItem('modo', modoSwitch.checked);
}

function modificarTemperatura(accion) {
    var modoSwitch = document.getElementById('modoSwitch');
    if (!modoSwitch.checked) {
        fetch('../php/modificar_temperatura.php?accion=' + accion)
            .then(function (response) {
                if (response.ok) {
                    obtenerTemperatura();
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
    }
}

function estadoCheckbox() {
    // Obtener estado del checkbox desde localStorage
    var modoGuardado = localStorage.getItem('modo');
    var modoSwitch = document.getElementById('modoSwitch');
    if (modoGuardado === 'true') {
        modoSwitch.checked = true;
    } else {
        modoSwitch.checked = false;
    }
    cambiarModo();
}

function estadoBotonesOnOff() {
    // Obtener estado de los botones "Encender" y "Apagar" desde localStorage
    var estadoEncender = localStorage.getItem('estadoEncender');
    var estadoApagar = localStorage.getItem('estadoApagar');
    if (estadoEncender === 'true') {
        document.getElementById('encenderBtn').disabled = true;
        document.getElementById('apagarBtn').disabled = false;
    } else if (estadoApagar === 'true') {
        document.getElementById('encenderBtn').disabled = false;
        document.getElementById('apagarBtn').disabled = true;
    }
}

function toggleMenu() {
    var menuLista = document.getElementById("menuLista");
    if (menuLista.style.display === "block") {
        menuLista.style.display = "none";
    } else {
        menuLista.style.display = "block";
    }
}

// Obtener temperatura al cargar la página
function cargarDatos() {
    obtenerTemperatura();
    obtenerUbicacion();

    document.getElementById("modoSwitch").checked = false;
}

document.addEventListener("alpine:init", () => {
    Alpine.data("layout", () => ({
        profileOpen: false,
        asideOpen: true,
    }));
});