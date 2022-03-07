<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/listadoBares.css">
</head>

<body>
    <?php require("view/cabecera.php") ?>
    <div id="filtros">
        <input type="text" name="buscador" id="buscador" placeholder="Buscar...">
        <a class="btn btn-light" id="buscar">Buscar</a>
        <select name="filtro" id="filtro">
            <option value="1">Buscar por Nombre</option>
            <option value="2">Buscar por Bar</option>
            <option value="3">Buscar por Puntuacion</option>
        </select>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <?php
                foreach ($pinchos as $pincho) {
                ?>
                    <a class="col-md-4" href="<?php echo $rutaVista . '/' . $pincho[0] ?>">
                        <div>
                            <div class="card text-white card-has-bg click-col" style="background-image:url(../<?php echo $bd->obtieneImagenPincho($pincho[0]) ?>)">
                                <img class="card-img d-none">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2">Nombre del Pincho</small>
                                        <h4 class="card-title mt-0 "><?php echo $pincho[1] ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</body>
<?php require("view/footer.php") ?>

</html>