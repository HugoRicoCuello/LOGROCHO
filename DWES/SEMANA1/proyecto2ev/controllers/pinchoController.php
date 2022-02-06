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


    function altaPincho($nombre, $bar, $imagenes)
    {
        $this->bd->altaPincho($nombre, $bar);
        $idPincho = $this->bd->obtieneIdPincho($nombre);
        $nImagenes = count($imagenes);
        $fotos = array();
        $rutaImagenes = file_get_contents("config.txt");
        $rutaPincho = $rutaImagenes . "\\img_pinchos\\" . $idPincho;

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
}
