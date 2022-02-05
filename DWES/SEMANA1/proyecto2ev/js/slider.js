var idSlider = 1;
var pausado = false;
var intervalo;
let transicion = 5000;
window.onload = function () {
    verSlider();
    intervalo = setInterval(() => {
        pasarPalante();
    }, transicion);
}

function pasarPalante() {
    idSlider++;
    verSlider();
}

function pasarPatras() {
    idSlider--;
    verSlider();
}

function pinchoActual(n) {
    verSlider(idSlider = n);
}

function pausar() {
    if (pausado) {
        intervalo = setInterval(() => {
            pasarPalante();
        }, transicion);
        pausado = false;
    } else {
        pausado = true;
        clearInterval(intervalo);
    }
}

function verSlider() {
    let i;
    let pinchos = document.getElementsByClassName("pincho");
    let puntos = document.getElementsByClassName("punto");

    if (idSlider > pinchos.length) {
        idSlider = 1;
    }

    if (idSlider < 1) {
        idSlider = pinchos.length;
    }

    for (i = 0; i < pinchos.length; i++) {
        pinchos[i].style.display = "none";
    }

    for (i = 0; i < puntos.length; i++) {
        puntos[i].className = puntos[i].className.replace(" active", "");
    }
    pinchos[idSlider - 1].style.display = "block";
    puntos[idSlider - 1].className += " active";
}
