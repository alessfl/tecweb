<?php
// update_producto.php
// ACTUALIZA un producto en la base de datos MySQL

// conexión
@$link = new mysqli('localhost', 'root', 'Alis2404', 'marketzone');
if ($link->connect_errno) {
    die('ERROR: No pudo conectarse con la BD. ' . $link->connect_error);
}
$link->set_charset('utf8');

// validar que se recibió un ID válido 
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die('ERROR: No se recibió un ID de producto válido.');
}

// obtener y sanitizar datos del formulario
$id = intval($_POST['id']);
$nombre   = $link->real_escape_string($_POST['nombre']);
$marca    = $link->real_escape_string($_POST['marca']);
$modelo   = $link->real_escape_string($_POST['modelo']);
$precio   = floatval($_POST['precio']);
$detalles = $link->real_escape_string($_POST['detalles']);
$unidades = intval($_POST['unidades']);
$imagen   = $link->real_escape_string($_POST['imagen']);

// sql de actualización
$sql = "UPDATE productos
        SET nombre='$nombre',
            marca='$marca',
            modelo='$modelo',
            precio=$precio,
            detalles='$detalles',
            unidades=$unidades,
            imagen='$imagen'
        WHERE id=$id";

// ejecuta y verifica resultado
if ($link->query($sql)) {
    echo "<h3>Registro actualizado correctamente.</h3>";
    echo "<p><a href='get_productos_vigentes_v2.php'>Volver a la lista de productos</a></p>";
} else {
    echo "ERROR: No se ejecutó la consulta. " . $link->error;
}

$link->close();
?>
