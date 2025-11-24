<?php
namespace TECWEB\MYAPI\Update;

use TECWEB\MYAPI\DataBase;

class Update extends DataBase {

    public function edit($jsonOBJ) {

        $this->data = [
            'status'  => 'error',
            'message' => 'La consulta falló'
        ];

        if (!isset($jsonOBJ->id)) {
            $this->data['message'] = 'No se recibió el ID';
            return $this->data;
        }

        $id      = intval($jsonOBJ->id);
        $nombre  = $this->conexion->real_escape_string($jsonOBJ->nombre ?? '');
        $marca   = $this->conexion->real_escape_string($jsonOBJ->marca ?? '');
        $modelo  = $this->conexion->real_escape_string($jsonOBJ->modelo ?? '');
        $precio  = isset($jsonOBJ->precio) ? floatval($jsonOBJ->precio) : 0;
        $detalles= $this->conexion->real_escape_string($jsonOBJ->detalles ?? '');
        $unidades= isset($jsonOBJ->unidades) ? intval($jsonOBJ->unidades) : 0;
        $imagen  = $this->conexion->real_escape_string($jsonOBJ->imagen ?? 'img/default.png');

        $sql  = "UPDATE productos SET ";
        $sql .= "nombre='{$nombre}', ";
        $sql .= "marca='{$marca}', ";
        $sql .= "modelo='{$modelo}', ";
        $sql .= "precio={$precio}, ";
        $sql .= "detalles='{$detalles}', ";
        $sql .= "unidades={$unidades}, ";
        $sql .= "imagen='{$imagen}' ";
        $sql .= "WHERE id={$id}";

        if ($this->conexion->query($sql)) {

            if ($this->conexion->affected_rows > 0) {
                $this->data['status']  = "success";
                $this->data['message'] = "Producto actualizado";
            } else {
                $this->data['status']  = "warning";
                $this->data['message'] = "Consulta ejecutada, pero no hubo cambios";
            }

        } else {
            $this->data['message'] = "ERROR en SQL: " . $this->conexion->error;
        }

        $this->conexion->close();
        return $this->data;
    }
}
?>