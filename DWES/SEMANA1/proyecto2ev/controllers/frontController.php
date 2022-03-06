<?php

class frontController
{
    var $bd;
    var $ruta_global;

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }

    public function muestraHome()
    {
        require("view/home.php");
    }

    public function buscaBares(){

    }

    public function muestraPinchos(){
        
    }
}
