<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'Alis2404',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>