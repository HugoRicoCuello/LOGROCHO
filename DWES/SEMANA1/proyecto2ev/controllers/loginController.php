<?php

class loginController
{
    var $bd;
    var $ruta_global;
    var $exp_correo = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
    var $exp_contra = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

    function __construct($ruta)
    {
        $this->ruta_global = $ruta;
        $this->bd = new BD();
    }

    public function muestraRegistro()
    {
        $rutaVista = $this->ruta_global;
        $bd = $this->bd;
        require("view/registro.php");
    }

    public function compruebaRegistro($usuario, $contrasegna1, $contrasegna2)
    {
        if (preg_match($this->exp_correo, $usuario) && preg_match($this->exp_contra, $contrasegna1) && $contrasegna1 == $contrasegna2) {
            $registro_correcto = $this->bd->altaUsuario($usuario, $contrasegna1);
            var_dump($registro_correcto);
            if ($registro_correcto) {
                $_SESSION["user"] = $usuario;
                header("Location: " . $this->ruta_global . "index.php/administracion");
            } else {
                $error = "El usuario o contraseña introducidos no son correctos";
                header("Location: " . $this->ruta_global . "index.php/registro?error=$error");
            }
        } else {
            $error = "El usuario o contraseña introducidos no son correctos";
            header("Location: " . $this->ruta_global . "index.php/registro?error=$error");
        }
    }

    public function compruebaLogin($usuario, $contrasegna)
    {
        if (preg_match($this->exp_correo, $usuario) && preg_match($this->exp_contra, $contrasegna)) {
            $login_correcto = $this->bd->compruebaLogin($usuario, $contrasegna);
            if ($login_correcto) {
                $_SESSION["user"] = $usuario;
                header("Location: " . $this->ruta_global . "index.php/administracion");
            } else {
                $error = "El usuario o contraseña introducidos no son correctos";
                header("Location: " . $this->ruta_global . "index.php/login?error=$error");
            }
        } else {
            $error = "El usuario o contraseña introducidos no son correctos";
            header("Location: " . $this->ruta_global . "index.php/login?error=$error");
        }
    }

    public function cerrarSesion()
    {
        session_destroy();
        header("Location: " . $this->ruta_global . "index.php/login");
    }


    public function cerrarSesion2()
    {
        session_destroy();
        header("Location: " . $this->ruta_global . "index.php/home");
    }


    public function muestraLogin($errorLog = null)
    {
        $nueva_accion = $this->ruta_global . "index.php/loginDestino";
        $rutaVista = $this->ruta_global;
        $error = $errorLog;
        require("view/login.php");
    }

    public function muestraLogin2($errorLog = null)
    {
        $nueva_accion = $this->ruta_global . "index.php/loginDestino2";
        $rutaVista = $this->ruta_global;
        $error = $errorLog;
        require("view/login.php");
    }

    public function compruebaLogin2($usuario, $contrasegna)
    {
        if (preg_match($this->exp_correo, $usuario) && preg_match($this->exp_contra, $contrasegna)) {
            $login_correcto = $this->bd->compruebaLogin($usuario, $contrasegna);
            if ($login_correcto) {
                $_SESSION["user"] = $usuario;
                header("Location: " . $this->ruta_global . "index.php/home");
            } else {
                $error = "El usuario o contraseña introducidos no son correctos";
                header("Location: " . $this->ruta_global . "index.php/login?error=$error");
            }
        } else {
            $error = "El usuario o contraseña introducidos no son correctos";
            header("Location: " . $this->ruta_global . "index.php/login?error=$error");
        }
    }


    public function muestraAdministracion()
    {
        $rutaVista = $this->ruta_global;
        $bd = $this->bd;
        require("view/administracion.php");
    }

    public function borrarUsuario()
    {
        $id = $this->bd->obtieneIdUsuario($_SESSION["user"]);
        $this->bd->borraUsuario($id);
        header("Location: " . $this->ruta_global . "index.php/home");
    }
}
