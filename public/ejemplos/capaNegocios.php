<?php
include_once("capaDatos.php");

class capaNegocios
{
    public $codigo;
    public $descripcion;
    public $objetoDatos;
    public function __construct($codigo,$descripcion)
    {
        $this->codigo=$codigo;
        $this->descripcion=$descripcion;
        $this->objetoDatos=new capaDatos('mysql:host=localhost;dbname=ejemplo','root','123456');
    }
    public function insertar()
    {
        try
        {
            $this->objetoDatos->conectar();
            $this->objetoDatos->ejecutar("insert into bodega(codigo,descripcion) values($this->codigo,'$this->descripcion')");
            $this->objetoDatos->desconectar();
        }
        catch (PDOException $ex)
        {
            throw $ex;
        }
    }
    public function eliminar()
    {
        $this->objetoDatos->conectar();
        $this->objetoDatos->ejecutar("delete from bodega  where codigo=$this->codigo ");
        $this->objetoDatos->desconectar();
    }
}


?>