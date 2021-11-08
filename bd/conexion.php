<?php
class Conexion
{
    private $servidor = 'localhost';
    private $dbname = 'utm_tesis';
    private $user = 'postgres';
    private $password = '1234';


    public static function Conectar($servidor, $dbname, $user, $password)
    {
        $dd = ("host=" . $servidor . " dbname=" . $dbname . " user=" . $user . " password=" . $password . "");
        try {
            $conexion = pg_connect($dd);
            return $conexion;
        } catch (Exception $e) {
            die("El error de Conexión es :" . $e->getMessage());
        }
    }
    function getServidor()
    {
        return $this->servidor;
    }
    function getDbname()
    {
        return $this->dbname;
    }
    function getUser()
    {
        return $this->user;
    }
    function getPass()
    {
        return $this->password;
    }


    function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }
    function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }
    function setUser($user)
    {
        $this->user = $user;
    }
    function setPass($pass)
    {
        $this->password = $pass;
    }
}
