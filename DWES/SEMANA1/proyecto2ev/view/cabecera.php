<link rel="stylesheet" href="../css/cabecera.css">

<div class="tabs-to-dropdown">
    <div class="nav-wrapper d-flex align-items-center justify-content-between">
        <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="listadoBares" data-toggle="pill" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/listadoBares" role="tab" aria-controls="pills-company" aria-selected="true">BARES</a>
            </li>
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="pills-product-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-product" aria-selected="false">PINCHOS</a>
            </li>
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="pills-news-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-news" aria-selected="false">MEJORES VALORADOS</a>
            </li>
            <li class="nav-item" role="presentation">
                <a onclick="setActive(this)" class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-contact" aria-selected="false">FAVORITOS</a>
            </li>
        </ul>
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
            switch (window.location.href.split("/")[window.location.href.split("/").length -1]) {
                case 'listadoBares':
                    let enlace = document.getElementById("listadoBares");
                    setActive(enlace);
                    break;

                default:
                    break;
            }
        }
    </script>