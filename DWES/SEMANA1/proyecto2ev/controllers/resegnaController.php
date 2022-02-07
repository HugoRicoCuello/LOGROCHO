<?php

class resegnaController
{
    var $bd;
    var $ruta_global;

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }


    function altaResegna($puntuacion, $descripcion, $usuario, $pincho)
    {
        $this->bd->altaResegna($puntuacion, $descripcion, $usuario, $pincho);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function bajaResegna($id)
    {
        $this->bd->bajaResegna($id);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function verFichaResegna($puntuacion, $descripcion, $id_usuario, $id_pincho, $id)
    {
        $puntuacion;
        $descripcion;
        $id_usuario;
        $id_pincho;
        $id;
        $bd = $this->bd;
        $rutaVista = $this->ruta_global;
        require("view/fichaResegna.php");
    }

    function modificaResegna($id, $puntuacion, $descripcion, $usuario, $pincho)
    {
        $this->bd->modificaResegna($id, $puntuacion, $descripcion, $usuario, $pincho);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }


    function listaResegnas()
    {
        require("view/listaResegnas.php");
    }

    function listaResegna()
    {
        require("view/listaResegna.php");
    }

    function obtieneResegnas($limite, $numero)
    {
        $resegnas = $this->bd->obtieneResegnas($limite, $numero);
        echo json_encode($resegnas);
    }

    function obtieneResegna($id)
    {
        $resegnas = $this->bd->obtieneResegna($id);
        echo json_encode($resegnas);
    }
}
