<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div id="menu" class="container-fluid">
            <img id="logo" src="../img/utiles/logo.png">
            <a class="btn btn-outline-success me-2" type="button" href="#">Bares</a>
            <a class="btn btn-outline-success me-2" type="button" href="#">Pinchos</a>
            <a class="btn btn-outline-success me-2" type="button" href="#">Mejores Valorados</a>
            <a class="btn btn-outline-success me-2" type="button" href="#">Favoritos</a>
            <a href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/login" id="adm" class="enlaces">Administracion</a>
            <a href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/registro" id="registro" class="enlaces">Registro</a>
        </div>
    </nav>
    <div id="slider">
        <h1 class="titulo">MEJORES VALORADOS</h1>
        <div id="slider1" onclick="pausar()">
            <div id="slide1" class="pincho fade">
                <div class="numTexto">1 / 5</div>
            </div>
            <div id="slide2" class="pincho fade">
                <div class="numTexto">2 / 5</div>
            </div>
            <div id="slide3" class="pincho fade">
                <div class="numTexto">3 / 5</div>
            </div>
            <div id="slide4" class="pincho fade">
                <div class="numTexto">4 / 5</div>
            </div>
            <div id="slide5" class="pincho fade">
                <div class="numTexto">5 / 5</div>
            </div>
            <a class="anterior" onclick="pasarPatras()">&lt;</a>
            <a class="siguiente" onclick="pasarPalante()">></a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="punto" onclick="pinchoActual(1)"></span>
            <span class="punto" onclick="pinchoActual(2)"></span>
            <span class="punto" onclick="pinchoActual(3)"></span>
            <span class="punto" onclick="pinchoActual(4)"></span>
            <span class="punto" onclick="pinchoActual(5)"></span>
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Contacto
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="footer">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="../js/slider.js"></script>
</body>

</html>