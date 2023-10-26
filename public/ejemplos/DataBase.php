<?php

namespace App\DataBase;

use mysqli;

class DataBase
{

    private string $host = DB_HOST;
    private string $base_de_datos = DB_DATABASE;
    private string $usuario = DB_USER;
    private string $contrasena = DB_PASSWORD;
    // private string $charset = DB_CHARSET;
    protected $connection;
    protected $query;
    protected $table;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {

        $this->connection = new mysqli($this->host, $this->usuario, $this->contrasena, $this->base_de_datos);

        if ($this->connection->connect_error) {
            die("Error al conectarse con MySQL debido al error " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        $this->query = $this->connection->query($sql);
        return $this;
    }

    public function first()
    {
        return $this->query->fetch_assoc();
    }

    public function get()
    {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->query($sql);
        return $this->get();
    }

    public function insert($tabla, $datos)
    {
        $sql = "INSERT INTO $tabla (";
        $i = 0;
        foreach ($datos as $key => $value) {
            $sql .= $key;
            $i++;
            if ($i < count($datos)) {
                $sql .= ", ";
            }
        }
        $sql .= ") VALUES (";
        $i = 0;
        foreach ($datos as $key => $value) {
            $sql .= "'" . $value . "'";
            $i++;
            if ($i < count($datos)) {
                $sql .= ", ";
            }
        }
        $sql .= ")";
        $this->query($sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $this->query($sql);
        return $this->first();
    }

    public function where($columna, $operador, $valor = null)
    {
        if (is_null($valor)) {
            $valor = $operador;
            $operador = '=';
        }
        $sql = "SELECT * FROM {$this->table} WHERE {$columna} {$operador} '{$valor}'";
        $this->query($sql);
        return $this;
    }

    public function create($data)
    {

        $columnas = array_keys($data);
        $columnas = implode(', ', $columnas);

        $valores = array_values($data);
        // var_dump($valores);
        $valores = "'" . implode("', '", $valores) . "'";


        $sql = "INSERT INTO {$this->table} ({$columnas}) VALUES ({$valores})";

        $this->query($sql);

        $insert_id = $this->connection->insert_id;    //retorna el ultimo id insertado

        return $this->find($insert_id);

        // $sql = "INSERT INTO {$this->table} (";
        // $i = 0;
        // foreach($data as $key => $value){
        //     $sql .= $key;
        //     $i++;
        //     if($i < count($data)){
        //         $sql .= ", ";
        //     }
        // }
        // $sql .= ") VALUES (";
        // $i = 0;
        // foreach($data as $key => $value){
        //     $sql .= "'".$value."'";
        //     $i++;
        //     if($i < count($data)){
        //         $sql .= ", ";
        //     }
        // }
        // $sql .= ")";
        // $this->query($sql);

        // $insert_id = $this->connection->insert_id;    //retorna el ultimo id insertado

        // return $this->find($insert_id);
    }

    public function update($id, $data)
    {
        // UPDATE users SET name = 'Juan', email = 'juan@gmail.com' WHERE id = 1
        $sql = "UPDATE {$this->table} SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            $sql .= $key . " = '" . $value . "'";
            $i++;
            if ($i < count($data)) {
                $sql .= ", ";
            }
        }
        $sql .= " WHERE id = $id";
        $this->query($sql);
        return $this->find($id);
    }
}
