<link rel="stylesheet" href="../../css/cabecera.css">

<div class="tabs-to-dropdown">
    <div class="nav-wrapper d-flex align-items-center justify-content-between">
        <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="tarjetaBar" data-toggle="pill" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/listadoBares" role="tab" aria-controls="pills-company" aria-selected="true">BARES</a>
            </li>
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="tarjetaPincho" data-toggle="pill" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/listadoPinchos" role="tab" aria-controls="pills-product" aria-selected="false">PINCHOS</a>
            </li>
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="home" data-toggle="pill" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/home" role="tab" aria-controls="pills-news" aria-selected="false">HOME</a>
            </li>
        </ul>
        <a id="iniciar" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/login2">Iniciar Sesion</a>
        <a id="salir" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/cerrarSesion2">Cerrar Sesion</a>
        <a id="eliminar" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/eliminarUsuario">Darse de baja</a>
    </div>
</div>

<script>
    function setActive(a) {
        enlaces = [...document.getElementsByClassName("nav-link")];
        enlaces.forEach(enlace => {
            enlace.classList.remove("active");
        });

        a.classList.add("active");
    }

    window.onload = function() {
        switch (window.location.href.split("/")[window.location.href.split("/").length - 2]) {
            case 'tarjetaBar':
                var enlace = document.getElementById("tarjetaBar");
                setActive(enlace);
                break;
            case 'tarjetaPincho':
                var enlace = document.getElementById("tarjetaPincho");
                setActive(enlace);
            default:
                break;
        }
    }

    console.error = function() {}
</script>