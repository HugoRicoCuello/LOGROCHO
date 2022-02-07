<?php

class backController
{
    var $bd;
    var $ruta_global;

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }

    public function muestraUsuarios()
    {
        require("view/usuariosAdmin.php");
    }

    public function muestraBares()
    {
        require("view/baresAdmin.php");
    }

    public function muestraPinchos()
    {
        require("view/pinchosAdmin.php");
    }

    public function muestraResegnas()
    {
        require("view/resegnasAdmin.php");
    }
}
