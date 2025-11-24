<?php
namespace TECWEB\MYAPI\Read;

use TECWEB\MYAPI\DataBase;

class Read extends DataBase {

    public function list() {
        $this->data = [];

        $sql = "SELECT * FROM productos WHERE eliminado = 0";

        if ($result = $this->conexion->query($sql)) {

            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (count($rows) > 0) {
                $this->data = $rows;
            } else {
                $this->data = [
                    "status"  => "empty",
                    "message" => "No hay productos registrados"
                ];
            }

            $result->free();
        } else {
            $this->data = [
                "status"  => "error",
                "message" => "Query Error: " . $this->conexion->error
            ];
        }

        $this->conexion->close();
        return $this->data;
    }

    public function search($search) {
        $this->data = [];

        if (!isset($search)) {
            $this->data = [
                "status"  => "error",
                "message" => "No se recibió texto de búsqueda"
            ];
            return $this->data;
        }

        $txt = $this->conexion->real_escape_string($search);

        $sql = "SELECT * FROM productos 
                WHERE (id = '{$txt}' 
                       OR nombre LIKE '%{$txt}%'
                       OR marca LIKE '%{$txt}%'
                       OR detalles LIKE '%{$txt}%')
                AND eliminado = 0";

        if ($result = $this->conexion->query($sql)) {

            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (count($rows) > 0) {
                $this->data = $rows;
            } else {
                $this->data = [
                    "status"  => "empty",
                    "message" => "No se encontraron coincidencias"
                ];
            }

            $result->free();
        } else {
            $this->data = [
                "status"  => "error",
                "message" => "Query Error: " . $this->conexion->error
            ];
        }

        $this->conexion->close();
        return $this->data;
    }

    public function single($id) {
        $this->data = [];

        if (!isset($id)) {
            $this->data = [
                "status"  => "error",
                "message" => "No se recibió ID"
            ];
            return $this->data;
        }

        $id = intval($id);

        $sql = "SELECT * FROM productos WHERE id = {$id} AND eliminado = 0";

        if ($result = $this->conexion->query($sql)) {

            $row = $result->fetch_assoc();

            if ($row) {
                $this->data = $row;
            } else {
                $this->data = [
                    "status"  => "empty",
                    "message" => "Producto no encontrado"
                ];
            }

            $result->free();
        } else {
            $this->data = [
                "status"  => "error",
                "message" => "Query Error: " . $this->conexion->error
            ];
        }

        $this->conexion->close();
        return $this->data;
    }
}
?>