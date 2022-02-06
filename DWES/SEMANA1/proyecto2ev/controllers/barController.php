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

    function altaBar($nombre, $latitud, $longitud)
    {
        $this->bd->altaBar($nombre, $latitud, $longitud);
        
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function bajaBar($id)
    {
        $this->bd->bajaBar($id);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
    }

    function modificaBar($id, $nombre, $puntuacion, $latitud, $longitud)
    {
        $this->bd->modificaBar($id, $nombre, $puntuacion, $latitud, $longitud);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
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
