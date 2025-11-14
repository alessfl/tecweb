<?php
namespace MyApi;

require_once __DIR__ . '/DataBase.php';

class Products extends DataBase {

    private array $response;

    public function __construct(string $dbname, string $host = "localhost", string $user = "root", string $pass = "Alis2404") {
        $this->response = [];
        parent::__construct($host, $user, $pass, $dbname);
    }

    // Obtener todos los productos
    public function list() {
        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    // Buscar por fragmento (id / nombre / marca / detalle)
    public function search(string $text) {
        $sql = "SELECT * FROM productos 
                WHERE (id = '$text' OR nombre LIKE '%$text%' 
                OR marca LIKE '%$text%' OR detalles LIKE '%$text%')
                AND eliminado = 0";

        $result = $this->conexion->query($sql);

        if ($result) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    // Buscar por ID
    public function single(int $id) {
        $sql = "SELECT * FROM productos WHERE id = $id";
        $result = $this->conexion->query($sql);

        if ($result) {
            $this->response = $result->fetch_assoc();
        }
    }

    // Buscar por nombre exacto
    public function singleByName(string $name) {
        $sql = "SELECT * FROM productos WHERE nombre = '$name' AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result) {
            $this->response = $result->fetch_assoc();
        }
    }

    // Insertar
    public function add(array $p) {

        // Validación previa
        $exists = $this->conexion->query("SELECT id FROM productos WHERE nombre = '{$p['nombre']}' AND eliminado = 0");

        if ($exists->num_rows > 0) {
            $this->response = [
                "status" => "error",
                "message" => "Ya existe un producto con ese nombre"
            ];
            return;
        }

        $sql = "INSERT INTO productos VALUES 
               (NULL, '{$p['nombre']}', '{$p['marca']}', '{$p['modelo']}', 
               {$p['precio']}, '{$p['detalles']}', {$p['unidades']}, '{$p['imagen']}', 0)";

        if ($this->conexion->query($sql)) {
            $this->response = [
                "status" => "success",
                "message" => "Producto agregado"
            ];
        }
    }

    // Actualizar
    public function edit(array $p) {
        $sql = "UPDATE productos SET 
                nombre='{$p['nombre']}',
                marca='{$p['marca']}',
                modelo='{$p['modelo']}',
                precio={$p['precio']},
                detalles='{$p['detalles']}',
                unidades={$p['unidades']},
                imagen='{$p['imagen']}'
                WHERE id={$p['id']}";

        if ($this->conexion->query($sql)) {
            $this->response = [
                "status" => "success",
                "message" => "Producto actualizado"
            ];
        }
    }

    // Eliminar (soft delete)
    public function delete(int $id) {
        $sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";

        if ($this->conexion->query($sql)) {
            $this->response = [
                "status" => "success",
                "message" => "Producto eliminado"
            ];
        }
    }

    // Convertir respuesta a JSON
    public function getData(): string {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
