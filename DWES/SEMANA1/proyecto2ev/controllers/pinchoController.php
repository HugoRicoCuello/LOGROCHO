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


    function altaPincho($nombre, $bar)
    {
        $this->bd->altaPincho($nombre, $bar);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
    }

    function bajaPincho($id)
    {
        $this->bd->bajaPincho($id);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
    }

    function modificaPincho($id, $nombre, $bar)
    {
        $this->bd->modificaPincho($id, $nombre, $bar);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
    }

    function listaPinchos()
    {
        require("view/listaPinchos.php");
    }

    function listaPincho(){
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
}
