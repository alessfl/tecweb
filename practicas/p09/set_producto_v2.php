<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Archivo: set_producto_v2.php
// Descripción: Inserta un nuevo producto validando duplicados (nombre, marca, modelo)

// Obtener datos del formulario
$nombre   = isset($_POST['nombre'])   ? trim($_POST['nombre'])   : '';
$marca    = isset($_POST['marca'])    ? trim($_POST['marca'])    : '';
$modelo   = isset($_POST['modelo'])   ? trim($_POST['modelo'])   : '';
$precio   = isset($_POST['precio'])   ? trim($_POST['precio'])   : '';
$detalles = isset($_POST['detalles']) ? trim($_POST['detalles']) : '';
$unidades = isset($_POST['unidades']) ? trim($_POST['unidades']) : '';
$imagen   = isset($_POST['imagen'])   ? trim($_POST['imagen'])   : '';

$error = '';

// Validaciones básicas
if ($nombre == '' || $marca == '' || $modelo == '') {
    $error = 'Faltan campos obligatorios: nombre, marca o modelo.';
} else if (!is_numeric($precio) || $precio < 0) {
    $error = 'El precio debe ser un número válido.';
} else if (!is_numeric($unidades) || $unidades < 0) {
    $error = 'Las unidades deben ser un número entero.';
}

if ($error == '') {

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'Alis2404', 'marketzone');

    /** comprobar la conexión */
    if ($link->connect_errno) {
        die('<body><h1>Error</h1><p>Falló la conexión: ' . $link->connect_error . '</p></body></html>');
    }

    $link->set_charset('utf8');

    /** Validar que no exista el producto */
    $sql_check = "SELECT * FROM productos WHERE nombre='$nombre' AND marca='$marca' AND modelo='$modelo'";
    $result = $link->query($sql_check);

    if ($result && $result->num_rows > 0) {
        echo '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Producto duplicado</title></head>
        <body>
        <h1>Error: Producto duplicado</h1>
        <p>Ya existe un producto con ese nombre, marca y modelo.</p>
        <p><a href="formulario_productos.html">Volver al formulario</a></p>
        </body></html>';
        $link->close();
        exit;
    }

    /** Si no existe, insertar el producto */
    
    // Versión anterior (comentada):
    // $sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado)
    //            VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)";
    
    // Nueva versión usando column names, sin incluir id ni eliminado (eliminado toma DEFAULT 0)
    $sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
                   VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen')";


    if ($link->query($sql_insert)) {
        $id = $link->insert_id;
        echo '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Producto Insertado</title></head>
        <body>
        <h1>Producto insertado correctamente</h1>
        <h2>Resumen del producto</h2>
        <ul>
            <li><strong>ID:</strong> ' . $id . '</li>
            <li><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</li>
            <li><strong>Marca:</strong> ' . htmlspecialchars($marca) . '</li>
            <li><strong>Modelo:</strong> ' . htmlspecialchars($modelo) . '</li>
            <li><strong>Precio:</strong> ' . htmlspecialchars($precio) . '</li>
            <li><strong>Detalles:</strong> ' . htmlspecialchars($detalles) . '</li>
            <li><strong>Unidades:</strong> ' . htmlspecialchars($unidades) . '</li>
            <li><strong>Imagen:</strong> ' . htmlspecialchars($imagen) . '</li>
            <li><strong>Eliminado:</strong> 0</li>
        </ul>
        <p><a href="formulario_productos.html">Registrar otro producto</a></p>
        </body></html>';
    } else {
        echo '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Error en Inserción</title></head>
        <body>
        <h1>Error al insertar el producto</h1>
        <p>No se pudo insertar el producto: ' . $link->error . '</p>
        <p><a href="formulario_productos.html">Volver al formulario</a></p>
        </body></html>';
    }

    $link->close();

} else {
    // Error de validación
    echo '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Error en datos</title></head>
    <body>
    <h1>Error en los datos del formulario</h1>
    <p>' . $error . '</p>
    <p><a href="formulario_productos.html">Volver al formulario</a></p>
    </body></html>';
}
?>
</html>
