<?php

class barController
{
    var $bd;
    var $ruta_global;

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }

    function altaBar($nombre, $latitud, $longitud, $imagenes)
    {
        $this->bd->altaBar($nombre, $latitud, $longitud);
        $idBar = $this->bd->obtieneIdBar($nombre);
        $nImagenes = count($imagenes);
        $fotos = array();
        $rutaBar = "./img_bares/" . $idBar;

        for ($i = 0; $i < $nImagenes; $i++) {
            $filename = $imagenes[$i];
            array_push($fotos, $filename);
            if (!file_exists($rutaBar . $filename)) {
                mkdir($rutaBar, 0777, true);
            }
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $rutaBar . "\\" . $filename);
        }

        $this->bd->guardaImagenesBares($idBar, $fotos);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function verFichaBar($nombre, $puntuacion, $lat, $lon, $id)
    {
        $nombre;
        $puntuacion;
        $id;
        $lat;
        $lon;
        $bd = $this->bd;
        $rutaVista = $this->ruta_global;
        require("view/fichaBar.php");
    }

    function bajaBar($id)
    {
        $this->bd->bajaBar($id);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function modificaBar($id, $nombre, $puntuacion, $latitud, $longitud)
    {
        $this->bd->modificaBar($id, $nombre, $puntuacion, $latitud, $longitud);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function listaBares()
    {
        require("view/listaBares.php");
    }

    function listaBar()
    {
        require("view/listaBar.php");
    }

    function obtieneBares($limite, $numero)
    {
        $bares = $this->bd->obtieneBares($limite, $numero);
        echo json_encode($bares);
    }

    function obtieneBar($id)
    {
        $bar = $this->bd->obtieneBar($id);
        echo json_encode($bar);
    }
}
