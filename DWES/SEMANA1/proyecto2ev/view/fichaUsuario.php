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
    $aux_pincho = false;
    $aux_usuario = false;
    $aux_resegna = false;
    if (strpos($_SERVER["REQUEST_URI"], "bar")) {
        $aux_bar = true;
    } else if (strpos($_SERVER["REQUEST_URI"], "pincho")) {
        $aux_pincho = true;
    } else if (strpos($_SERVER["REQUEST_URI"], "usuario")) {
        $aux_usuario = true;
    } else if (strpos($_SERVER["REQUEST_URI"], "resegna")) {
        $aux_resegna = true;
    }
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <div id="menu" class="container-fluid">
            <img id="logo" src="../img/utiles/logo.png">
            <a id="bares" class="btn btn-outline-success me-2 <?php echo ($aux_bar == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=bares">Bares</a>
            <a id="pinchos" class="btn btn-outline-success me-2 <?php echo ($aux_pincho == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=pinchos">Pinchos</a>
            <a id="resegna" class="btn btn-outline-success me-2 <?php echo ($aux_resegna == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=resegna">Reseñas</a>
            <a id="usuario" class="btn btn-outline-success me-2 <?php echo ($aux_usuario == true) ? "active" : ""; ?>" type="button" href="<?php echo $rutaVista ?>index.php/administracion?listado=usuario">Usuarios</a>
        </div>
    </nav>
    <h2 id="titulo_resegna">FICHA DEL USUARIO</h2>
    <form action="<?php echo $rutaVista ?>index.php/modificaUsuario" class="formulario" method="GET">
        <div class="eliminar">
            <a class="btn btn-danger" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/bajaUsuario/<?php echo $id ?>">ELIMINAR</a>
            <input type="hidden" name="id_usuario" value="<?php echo $id ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="form-group">
            <label for="descripcion">Contraseña</label>
            <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $pwd ?>">
        </div>
        <div class="form-group">
            <label for="admin">Administrador</label>
            <input type="number" min="0" max="1" lass="form-control" id="admin" name="admin" value="<?php echo $admin ?>">
        </div>
        <div class="botones">
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a class="btn btn-danger" href="http://localhost/DWES/SEMANA1/proyecto2ev/index.php/administracion">Cancelar</a>
        </div>
    </form>
</body>