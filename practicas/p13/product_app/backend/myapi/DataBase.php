<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;

    /**
     * Constructor recibe:
     *  $db   -> nombre de la base de datos
     *  $user -> usuario
     *  $pass -> password
     */
    public function __construct($db = 'marketzone', $user = 'root', $pass = 'Alis2404') {
        $this->conexion = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );

        if (!$this->conexion) {
            // Mensaje claro y detención segura
            die('¡Base de datos NO conectada! (' . mysqli_connect_error() . ')');
        }

        // Asegurar charset por defecto
        $this->conexion->set_charset("utf8");
    }
}
