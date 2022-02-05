<?php

class Reseña
{
    var $id;
    var $puntuacion;
    var $descripcion;
    var $usuario;
    var $pincho;

    function __construct($puntuacion, $descripcion, $usuario, $pincho)
    {
        $this->puntuacion = $puntuacion;
        $this->descripcion = $descripcion;
        $this->usuario = $usuario;
        $this->pincho = $pincho;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of puntuacion
     */ 
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set the value of puntuacion
     *
     * @return  self
     */ 
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of pincho
     */ 
    public function getPincho()
    {
        return $this->pincho;
    }

    /**
     * Set the value of pincho
     *
     * @return  self
     */ 
    public function setPincho($pincho)
    {
        $this->pincho = $pincho;

        return $this;
    }
}
