<?php
namespace TECWEB\MYAPI\Create;

use TECWEB\MYAPI\DataBase;

class Create extends DataBase {

    public function add($jsonOBJ) {

        $this->data = [
            'status'  => 'error',
            'message' => 'Parámetros insuficientes o ya existe un producto con ese nombre'
        ];

        if (isset($jsonOBJ->nombre)) {

            $nombre  = $this->conexion->real_escape_string($jsonOBJ->nombre);
            $marca   = $this->conexion->real_escape_string($jsonOBJ->marca ?? '');
            $modelo  = $this->conexion->real_escape_string($jsonOBJ->modelo ?? '');
            $precio  = isset($jsonOBJ->precio) ? floatval($jsonOBJ->precio) : 0;
            $detalles= $this->conexion->real_escape_string($jsonOBJ->detalles ?? '');
            $unidades= isset($jsonOBJ->unidades) ? intval($jsonOBJ->unidades) : 0;
            $imagen  = $this->conexion->real_escape_string($jsonOBJ->imagen ?? 'img/default.png');

            // Comprobar existencia
            $sql = "SELECT id FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);

            if ($result && $result->num_rows == 0) {

                $sql = "INSERT INTO productos (id,nombre,marca,modelo,precio,detalles,unidades,imagen,eliminado)
                        VALUES (NULL,'{$nombre}','{$marca}','{$modelo}',{$precio},'{$detalles}',{$unidades},'{$imagen}',0)";

                if ($this->conexion->query($sql)) {
                    $this->data['status']  = 'success';
                    $this->data['message'] = 'Producto agregado';
                    $this->data['id']      = $this->conexion->insert_id;
                } else {
                    $this->data['message'] = 'ERROR SQL: ' . $this->conexion->error;
                }
            } else {
                $this->data['message'] = 'Ya existe un producto con ese nombre';
            }

            if ($result) {
                $result->free();
            }
        }

        $this->conexion->close();
        return $this->data;
    }
}
?>
