<?php
class Conexion
{
    const DB_INFO = 'mysql:host=localhost;dbname=logrocho';
    const DB_USER = 'root';
    const DB_PASS = '';

    public static function getConexion()
    {
        $conexion = new PDO(self::DB_INFO, self::DB_USER, self::DB_PASS);
        return $conexion;
    }
}

