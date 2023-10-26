<?php


class capaDatos
{
    private $cadenaConexion;
    private $user;
    private $password;
    private $objetoConexion;

    
    public function __construct($cadenaConexion,$user,$password)   
    {
        $this->cadenaConexion=$cadenaConexion;
        $this->user=$user;
        $this->password=$password;
    }
    public function conectar()
    {
        try
        {
            $this->objetoConexion = new PDO($this->cadenaConexion,  $this->user ,  $this->password );
            $this->objetoConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            echo "problemas para conectar con la base de datos";
        }
    }
    public function desconectar()
    {
        $this->objetoConexion=null;
    }
    public function ejecutar($strComando)
    {
        try
        {
            $ejecutar=$this->objetoConexion->prepare($strComando); 
            $ejecutar->execute();
            $rows = $ejecutar->fetchAll();
            return $rows;
        }
        catch(PDOException $ex)
        {
            throw $ex;
        }
    }
}







?>