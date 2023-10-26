<?php

namespace Datos;
/**
 * Autor: Julico Suarez
 */

class DMinisterioFeligres extends Datos{

    protected $table = 'ministeriofeligres';

    public function create($data)
    {
        $columnas = array_keys($data);
        $columnas = implode(', ', $columnas);
        $valores = array_values($data);
        $sql = "INSERT INTO {$this->table} ({$columnas}) VALUES (" . str_repeat('?,', count($valores) - 1) . "?)";

        $this->query($sql, $valores);

        return;
    }
}