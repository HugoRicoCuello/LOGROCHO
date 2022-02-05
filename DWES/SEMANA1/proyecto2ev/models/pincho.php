<?php

class Pincho
{
    var $nombre;
    var $bar;

    function __construct($nombre, $bar)
    {
        $this->nombre = $nombre;
        $this->bar = $bar;
    }

    /**
     * Get the value of bar
     */ 
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set the value of bar
     *
     * @return  self
     */ 
    public function setBar($bar)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}
