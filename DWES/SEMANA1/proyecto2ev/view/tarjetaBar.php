<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/listadoBares.css">
    <link rel="stylesheet" href="../../css/tarjetasBares.css">

</head>


<body>
    <?php require("view/cabecera2.php") ?>
    <div id="informacion">
        <div id="carrusel" class="carousel slide imagenesBar" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $activo = true;
                foreach ($imagenes as $imagen) {
                    if ($activo) {
                        $activo = false;
                ?>
                        <div class="carousel-item active imagen" style="background-image:url(../../<?php echo $imagen[0] ?>)">
                        </div>
                    <?php
                    } else { ?>
                        <div class="carousel-item imagen" style="background-image:url(../../<?php echo $imagen[0] ?>)">
                        </div>
                    <?php
                    }
                    ?>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div id="datosBar">
            <h2>DATOS DEL BAR</h2>
            <form action="javascript:void(0)">
                <div class="col-md-6">
                    <label class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" value='<?php echo $bar[0]["nombre"] ?>' disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">PUNTUACION</label>
                    <input type="text" class="form-control" value='<?php echo $bar[0]["puntuacion"] ?>' disabled>
                </div>
                <div class="col-6">
                    <label class="form-label">DIRECCION</label>
                    <input type="text" class="form-control" value='<?php echo $bar[0]["direccion"] ?>' disabled>
                </div>
            </form>
        </div>
    </div>
    <div id="tarjetasPinchos">
        <div class="container">
            <div class="row">
                <?php
                foreach ($pinchos as $pincho) {
                ?>
                    <a class="col-md-4" href="<?php echo $rutaPincho . '/' . $pincho[0] ?>">
                        <div>
                            <div class="card text-white card-has-bg click-col" style="background-image:url(../../<?php echo $bd->obtieneImagenPincho($pincho[0]) ?>)">
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
    </div>
    <div class="mapa" id="mapa">
        <script>
            var map;
            var marker;

            function initMap() {
                map = new google.maps.Map(document.getElementById('mapa'), {
                    center: {
                        lat: 42.4656685397917,
                        lng: -2.448342586433554
                    },
                    zoom: 13
                });

                fetch("http://localhost/DWES/SEMANA1/proyecto2ev/index.php/obtieneBares/1/100")
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(bar => {
                            marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(bar[3]),
                                    lng: parseFloat(bar[4]),
                                },
                                map: map,
                                title: bar[1]
                            });

                            marker.addListener("click", () => {
                                window.location.href = "http://localhost/DWES/SEMANA1/proyecto2ev/index.php/tarjetaBar/" + bar[0];
                            });
                        });

                    });



            }
        </script>
    </div>



    <?php require("view/footer.php") ?>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXJhlMRdZdp5cudwlA-PrXEtw3kZs-z7E&callback=initMap">
</script>