<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/listadoBares.css">
    <link rel="stylesheet" href="../../css/tarjetasPinchos.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
</head>


<body>
    <?php require("view/cabecera2.php") ?>
    <div id="informacion">
        <div id="carrusel" class="carousel slide imagenesPincho" data-bs-ride="carousel">
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
        <div id="datosPincho">
            <h2>DATOS DEL PINCHO</h2>
            <i class="fa fa-heart-o" aria-hidden="true" id="noFavPincho" onclick="setFavorito('<?php echo $rutaVista . '/' . $idPincho . '/' . $usuario . '/' . true ?>')"></i>
            <i class="fa fa-heart" aria-hidden="true" id="favPincho" onclick="setFavorito('<?php echo $rutaVista . '/' . $idPincho . '/' . $usuario . '/' . false ?>')"></i>
            <form action="javascript:void(0)">
                <div class="col-md-6">
                    <label class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" value='<?php echo $pincho[0]["nombre"] ?>' disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">BAR</label>
                    <input type="text" class="form-control" value='<?php echo $bd->obtieneNombreBar($pincho[0]["bar"]) ?>' disabled>
                </div>
            </form>
        </div>
    </div>
    <div id="resegnas">
        <?php foreach ($resegnas as $resegna) {
        ?>
            <div class="resegna">
                <div class="texto">
                    <i class="fa fa-heart-o" aria-hidden="true" onclick="setResegnaFav(this,'<?php echo $rutaLikes . '/' . $resegna['id'] ?>')"></i>
                    <h2>RESEÑA</h2>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" disabled><?php echo $resegna["descripcion"] ?></textarea>
                </div>
                <div class="datos">
                    <label class="form-label">PUNTUACION</label>
                    <input type="text" class="form-control" value='<?php echo $resegna["puntuacion"] ?>' disabled>
                    <label class="form-label">USUARIO</label>
                    <input type="text" class="form-control" value='<?php echo $bd->obtieneNombreUsuario($resegna["usuario"]) ?>' disabled>
                </div>
            </div>

        <?php } ?>
    </div>

    <?php require("view/footer.php") ?>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    let fav = false;

    function setFavorito(ruta) {
        if (fav == true) {
            let noFav = document.getElementById("noFavPincho");
            noFav.style.display = "block";
            let favorito = document.getElementById("favPincho");
            favorito.style.display = "none";
            fetch(ruta);
            fav = false;
        } else {
            let noFav = document.getElementById("noFavPincho");
            noFav.style.display = "none";
            let favorito = document.getElementById("favPincho");
            favorito.style.display = "block";
            fetch(ruta);
            fav = true;
        }
    }

    function setResegnaFav(icon, ruta) {

        if (icon.classList.contains("fa-heart-o")) {
            icon.classList.remove("fa-heart-o");
            icon.classList.add("fa-heart");
            icon.style.color = "red";
            console.log("entro1");
            fetch(ruta);
            like = false;
        } else {
            icon.classList.remove("fa-heart");
            icon.classList.add("fa-heart-o");
            icon.style.color = "black";
            console.log("entro2");
            fetch(ruta);
            like = true;
        }

    }
</script>