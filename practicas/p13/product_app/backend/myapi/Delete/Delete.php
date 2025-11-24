<?php
namespace TECWEB\MYAPI\Delete;

use TECWEB\MYAPI\DataBase;

class Delete extends DataBase {

    public function delete($id) {

        $this->data = [
            'status'  => 'error',
            'message' => 'La consulta falló'
        ];

        if (!isset($id)) {
            $this->data['message'] = 'No se recibió ID';
            return $this->data;
        }

        $id = intval($id);

        $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";

        if ($this->conexion->query($sql)) {

            if ($this->conexion->affected_rows > 0) {
                $this->data['status']  = "success";
                $this->data['message'] = "Producto eliminado";
            } else {
                $this->data['message'] = "No existe un producto con ese ID";
            }

        } else {
            $this->data['message'] = "ERROR: No se ejecutó $sql. " . $this->conexion->error;
        }

        $this->conexion->close();
        return $this->data;
    }
}
?>