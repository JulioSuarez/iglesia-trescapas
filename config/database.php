<?php

namespace Database;

/**
 * Autor: Julico Suarez
 */
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'trescapas');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');


use mysqli;

class database
{
    private string $host = DB_HOST;
    private string $base_de_datos = DB_DATABASE;
    private string $usuario = DB_USER;
    private string $contrasena = DB_PASSWORD;

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

}