<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
/** Archivo: get_productos_vigentes.php
 *  Descripción: Muestra todos los productos cuyo campo eliminado = 0
 */

@$link = new mysqli('localhost', 'root', 'Alis2404', 'marketzone');

/** comprobar la conexión */
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error . '<br/>');
}

$link->set_charset('utf8');

/** Consulta: solo productos NO eliminados */
if ($result = $link->query("SELECT * FROM productos WHERE eliminado = 0")) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$link->close();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous" />
</head>
<body>
    <h3>PRODUCTOS VIGENTES (NO ELIMINADOS)</h3>
    <br/>

    <?php if (isset($rows) && count($rows) > 0) : ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['marca']) ?></td>
                    <td><?= htmlspecialchars($row['modelo']) ?></td>
                    <td>$<?= number_format($row['precio'], 2) ?></td>
                    <td><?= $row['unidades'] ?></td>
                    <td><?= htmlspecialchars($row['detalles']) ?></td>
                    <td><img src="<?= htmlspecialchars($row['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($row['nombre']) ?>" width="100"/></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p><strong>No hay productos vigentes o todos han sido eliminados.</strong></p>
    <?php endif; ?>
</body>
</html>
