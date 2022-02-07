<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/administracion.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title></title>
</head>

<body>
    <h2 id="titulo_resegna">FICHA DEL BAR</h2>
    <form action="<?php echo $rutaVista ?>index.php/modificaBar" class="formulario" method="GET">
        <div class="eliminar">
            <a class="btn btn-danger" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/bajaBar/<?php echo $id ?>">ELIMINAR</a>
            <input type="hidden" name="id_bar" value="<?php echo $id ?>">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>">
        </div>
        <div class="form-group">
            <label for="puntuacion">Puntuacion</label>
            <input type="text" class="form-control" id="puntuacion" name="puntuacion" value="<?php echo $puntuacion ?>">
        </div>
        <div class="form-group">
            <label for="lat">Latitud</label>
            <input type="text" class="form-control" id="lat" name="lat" value="<?php echo $lat ?>">
        </div>
        <div class="form-group">
            <label for="lon">Longitud</label>
            <input type="text" class="form-control" id="lon" name="lon" value="<?php echo $lon ?>">
        </div>
        <div class="botones">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-danger" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/administracion">Cancelar</a>
        </div>
    </form>
</body>