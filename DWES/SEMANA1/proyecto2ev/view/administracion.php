<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/administracion.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
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
    <?php
    if (isset($_GET["listado"])) {
        switch ($_GET["listado"]) {
            case 'bares':
                require("./view/listaBares.php");
                break;
            case 'pinchos':
                require_once("./view/listaPinchos.php");
                break;
            case 'resegna':
        
                require_once("./view/listaResegnas.php");
                break;
            case 'usuario':
                require_once("./view/listaUsuarios.php");
                break;
        }
    } else {
        require_once("./view/listaBares.php");
    }
    ?>
</body>

</html>