<?php

class pinchoController
{
    var $bd;
    var $ruta_global;

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }


    function verFichaPincho($nombre, $id_bar, $id_pincho)
    {
        $nombre;
        $id_bar;
        $id_pincho;
        $bd = $this->bd;
        $rutaVista = $this->ruta_global;
        require("view/fichaPincho.php");
    }

    function altaPincho($nombre, $bar, $imagenes)
    {
        $this->bd->altaPincho($nombre, $bar);
        $idPincho = $this->bd->obtieneIdPincho($nombre);
        $nImagenes = count($imagenes);
        $fotos = array();
        $rutaPincho = "./img_pinchos/" . $idPincho;

        for ($i = 0; $i < $nImagenes; $i++) {
            $filename = $imagenes[$i];
            array_push($fotos, $filename);
            if (!file_exists($rutaPincho . $filename)) {
                mkdir($rutaPincho, 0777, true);
            }
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $rutaPincho . "\\" . $filename);
        }

        $this->bd->guardaImagenesPinchos($idPincho, $fotos);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function bajaPincho($id)
    {
        $this->bd->bajaPincho($id);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function modificaPincho($id, $nombre, $bar)
    {
        $this->bd->modificaPincho($id, $nombre, $bar);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function listaPinchos()
    {
        require("view/listaPinchos.php");
    }

    function listaPincho()
    {
        require("view/listaPincho.php");
    }

    function obtienePinchos($limite, $numero)
    {
        $pinchos = $this->bd->obtienePinchos($limite, $numero);
        echo json_encode($pinchos);
    }

    function obtienePincho($id)
    {
        $pincho = $this->bd->obtienePincho($id);
        echo json_encode($pincho);
    }

    function listadoPinchos()
    {
        $rutaVista = $this->ruta_global . "index.php/tarjetaPincho";
        $pinchos = $this->bd->obtieneTodosPinchos();
        $bd = $this->bd;
        require("view/listadoPinchos.php");
    }

    function tarjetaPincho($id)
    {
        $idPincho = $id;
        $pincho = $this->bd->obtienePincho($id);
        $imagenes = $this->bd->obtieneImagenesPincho($id);
        $resegnas = $this->bd->obtieneTodasResegnasPincho($id);
        $rutaVista = $this->ruta_global . "index.php/pinchosFav";
        $rutaLikes = $this->ruta_global . "index.php/likesResegnas";
        if (isset($_SESSION["user"])) {
            $usuario = $_SESSION["user"];
        } else {
            $usuario = "admin@gmail.com";
        }

        $bd = $this->bd;
        require("view/tarjetaPincho.php");
    }

    function setPinchoFavorito($idPincho, $usuario, $fav)
    {
        if (!$fav) {
            $this->bd->unSetPinchoFav($idPincho, $usuario);
        } else {
            $this->bd->setPinchoFav($idPincho, $usuario);
        }
    }

    function likesResegnas($idResegna)
    {
        $isResegna = $this->bd->obtieneResegnasLikes($idResegna);
        if (!$isResegna) {
            $this->bd->actualizaLikesResgena($idResegna);
        } else {
            $this->bd->creaLikesResgena($idResegna);
        }
    }
}
