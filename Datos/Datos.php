<?php

namespace Datos;

/**
 * Autor: Julico Suarez
 */

use Database\database;


class Datos extends database
{

    public function query($sql, $data = [], $params = null)
    {

        if ($data) {
            if ($params == null) {
                $params = str_repeat('s', count($data));
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params, ...$data);
            $stmt->execute();
            $this->query = $stmt->get_result();
        } else {
            $this->query = $this->connection->query($sql);
        }
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
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        return $this->query($sql, [$id], 'i')->first();
    }

    public function where($columna, $operador, $valor = null)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$columna} {$operador} ?";
        $this->query($sql, [$valor]);
        return $this;
    }

    public function lastInsertId()
    {
        try {
            $sql = "SELECT MAX(id) AS id FROM $this->table";
            $this->query($sql);
            $id = $this->first();
            return $id['id'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create($data)
    {
        $columnas = array_keys($data);
        $columnas = implode(', ', $columnas);
        $valores = array_values($data);
        $sql = "INSERT INTO {$this->table} ({$columnas}) VALUES (" . str_repeat('?,', count($valores) - 1) . "?)";

        $this->query($sql, $valores);

        $insert_id = $this->connection->insert_id;    //retorna el ultimo id insertado
        return $this->find($insert_id);
    }

    public function update($id, $data)
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "{$key} = ?";
        }
        $fields = implode(', ', $fields);
        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = ?";
        $valores = array_values($data);
        $valores[] = $id;
        // return $valores;
        $this->query($sql, $valores);
        return $this->find($id);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->query($sql, [$id], 'i');
    }
}
