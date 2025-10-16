<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */
        if (!$jsonOBJ) {
        echo json_encode(['status' => 'error', 'message' => 'JSON inválido']);
        exit;
    }
        $nombre   = $jsonOBJ->nombre ?? '';
        $marca    = $jsonOBJ->marca ?? '';
        $modelo   = $jsonOBJ->modelo ?? '';
        $precio   = (float)($jsonOBJ->precio ?? 0.0);
        $detalles = $jsonOBJ->detalles ?? '';
        $unidades = (int)($jsonOBJ->unidades ?? 1);
        $imagen   = $jsonOBJ->imagen ?? 'img/default.png';

        $nombre_safe = $conexion->real_escape_string($nombre);
    
    $sql_check = "SELECT id FROM productos WHERE nombre='{$nombre_safe}' AND eliminado=0 LIMIT 1";
    $result = $conexion->query($sql_check);

    if ($result && $result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Ya existe un producto con el mismo nombre.']);
    } else {
        $marca_safe    = $conexion->real_escape_string($marca);
        $modelo_safe   = $conexion->real_escape_string($modelo);
        $detalles_safe = $conexion->real_escape_string($detalles);
        $imagen_safe   = $conexion->real_escape_string($imagen);

        // Construcción de la consulta de inserción
        $sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                       VALUES ('{$nombre_safe}', '{$marca_safe}', '{$modelo_safe}', {$precio}, '{$detalles_safe}', {$unidades}, '{$imagen_safe}', 0)";

        // Ejecutar la inserción
        if ($conexion->query($sql_insert)) {
            $id_insertado = $conexion->insert_id;
            echo json_encode([
                'status' => 'success',
                'message' => 'Producto agregado exitosamente',
                'id' => $id_insertado
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Error al ejecutar la inserción: ' . $conexion->error,
                'query' => $sql_insert
            ]);
        }
    }
}

// Cerrar la conexión después de usarla.
if (isset($conexion) && $conexion) {
    $conexion->close();
}
?>