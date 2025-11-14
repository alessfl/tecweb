<?php
namespace MyApi;

abstract class DataBase {

    protected $conexion;

    public function __construct(
        string $host = "localhost",
        string $user = "root",
        string $pass = "Alis2404",
        string $dbname
    ) {
        $this->conexion = @mysqli_connect($host, $user, $pass, $dbname);

        if (!$this->conexion) {
            die("Error de conexión a BD");
        }

        $this->conexion->set_charset("utf8");
    }
}
