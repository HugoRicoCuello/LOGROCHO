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
    <?php
    $aux_bar = false;
    $aux_pincho = true;
    $aux_usuario = false;
    $aux_resegna = false;
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <div id="menu" class="container-fluid">
            <img id="logo" src="../img/utiles/logo.png">
            <a id="bares" class="btn btn-outline-success me-2 <?php echo ($aux_bar == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=bares">Bares</a>
            <a id="pinchos" class="btn btn-outline-success me-2 <?php echo ($aux_pincho == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=pinchos">Pinchos</a>
            <a id="resegna" class="btn btn-outline-success me-2 <?php echo ($aux_resegna == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=resegna">Reseñas</a>
            <a id="usuario" class="btn btn-outline-success me-2 <?php echo ($aux_usuario == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=usuario">Usuarios</a>
            <a id="cerrar_sesion" href="<?php echo $rutaVista ?>index.php/cerrarSesion">Cerrar sesion</a>
        </div>
    </nav>
    <h2 id="titulo_resegna">FICHA DEL PINCHO</h2>
    <form action="<?php echo $rutaVista ?>index.php/modificaPincho" class="formulario" method="GET">
        <div class="eliminar">
            <a class="btn btn-danger" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/bajaPincho/<?php echo $id_pincho ?>">ELIMINAR</a>
            <input type="hidden" name="id_pincho" value="<?php echo $id_pincho ?>">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>">
        </div>
        <div class="form-group">
            <label for="bar">Bar</label>
            <select name="bar" id="bar">
                <?php
                $bares = $bd->obtieneTodosBares();
                foreach ($bares as $bar) {
                    if ($id_bar == $bar[0]) {
                        echo '<option value="' . $bar[0] . '" selected>' . $bar[1] . "</option>";
                    } else {
                        echo '<option value="' . $bar[0] . '">' . $bar[1] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <?php
            $imagenes = $bd->obtieneImagenesPincho($id_pincho);
            foreach ($imagenes as $imagen) {
                echo "<img src='$rutaVista/$imagen[0]'></img>";
            }
            ?>
        </div>
        <div class="botones">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-danger" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/administracion?listado=pinchos">Cancelar</a>
        </div>
    </form>
</body>