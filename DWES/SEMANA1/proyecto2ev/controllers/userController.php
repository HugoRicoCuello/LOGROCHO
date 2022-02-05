<?php

class userController
{
    var $bd;
    var $ruta_global;

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }

    function altaUsuario($email, $password)
    {
        $this->bd->altaUsuario($email, $password);
        header("Location:" . $this->ruta_global . "index.php/administracion");
    }

    function bajaUsuario($id)
    {
        $this->bd->bajaUsuario($id);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
    }

    function modificaUsuario($id, $email, $password, $admin)
    {
        $this->bd->modificaUsuario($id, $email, $password, $admin);
        header("Location:" . $this->ruta_global . "index.php/pruebas");
    }

    function listaUsuarios()
    {
        require("view/listaUsuarios.php");
    }

    function listaUsuario()
    {
        require("view/listaUsuario.php");
    }

    function obtieneUsuarios($limite, $numero)
    {
        $usuarios = $this->bd->obtieneUsuarios($limite, $numero);
        echo json_encode($usuarios);
    }

    function obtieneUsuario($id)
    {
        $usuario = $this->bd->obtieneUsuario($id);
        echo json_encode($usuario);
    }
}
