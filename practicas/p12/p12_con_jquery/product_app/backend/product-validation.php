<?php
function validateProductData(array $producto): array {
    
    $nombre = trim($producto['nombre'] ?? '');
    $marca = trim($producto['marca'] ?? '');
    $modelo = trim($producto['modelo'] ?? '');
    $precio = $producto['precio'] ?? 0.0;
    $unidades = $producto['unidades'] ?? 0;
    $detalles = trim($producto['detalles'] ?? '');
    $imagen = trim($producto['imagen'] ?? ''); 

    $errors = [];

    // nombre (requiered, max 100) 
    if (empty($nombre) || strlen($nombre) > 100) {
        $errors[] = "Nombre: requerido y máximo 100 caracteres.";
    }

    // marca (requiered)
    if (empty($marca) || $marca === 'NA') {
        $errors[] = "Marca: selecciona una marca.";
    }

    // modelo (requiered, alfanumerico, max 25)
    if (empty($modelo) || strlen($modelo) > 25 || !preg_match("/^[A-Za-z0-9\s\-]+$/", $modelo)) {
        $errors[] = "Modelo: requerido, alfanumérico (espacios/guiones) y máximo 25 caracteres.";
    }

    // precio (requiered, mayor a 99.99)
    $precio_float = floatval($precio);
    if ($precio_float <= 99.99) {
        $errors[] = "Precio: debe ser mayor a 99.99.";
    }

    // unidad (requiered, >= 0)
    $unidades_int = intval($unidades);
    if ($unidades_int < 0) {
        $errors[] = "Unidades: debe ser un número mayor o igual a 0.";
    }

    // details (optional, max 250) 
    if (strlen($detalles) > 250) {
        $errors[] = "Detalles: máximo 250 caracteres.";
    }
    return $errors;
}
?>