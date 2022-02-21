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
    <?php require("view/cabecera.php") ?>
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
    <?php require("view/footer.php") ?>
    <!-- Footer -->
    <script src="../js/slider.js"></script>
</body>

</html>