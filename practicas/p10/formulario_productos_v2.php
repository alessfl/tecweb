<?php
// Conexión a la BD
@$link = new mysqli('localhost', 'root', 'Alis2404', 'marketzone');
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}
$link->set_charset('utf8');

// Inicializa variables vacías
$id = $nombre = $marca = $modelo = $precio = $detalles = $unidades = $imagen = "";

// Si viene un id por GET, busca ese producto
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $link->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = htmlspecialchars($row['nombre']);
        $marca = htmlspecialchars($row['marca']);
        $modelo = htmlspecialchars($row['modelo']);
        $precio = htmlspecialchars($row['precio']);
        $detalles = htmlspecialchars($row['detalles']);
        $unidades = htmlspecialchars($row['unidades']);
        $imagen = htmlspecialchars($row['imagen']);
    } else {
        die("<h3>Producto no encontrado</h3>");
    }
    $result->free();
}
$link->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title><?= $id ? "Editar Producto" : "Registrar Producto" ?></title>
  <style>
    label { display:block; margin-top:8px; }
    input, textarea, select { width: 100%; max-width: 480px; }
  </style>

  <script>
    function validarProducto() {
      const form = document.getElementById("form-productos");
      const nombre = form.nombre.value.trim();
      const marca  = form.marca.value;
      const modelo = form.modelo.value.trim();
      const precio = parseFloat(form.precio.value);
      const detalles = form.detalles.value.trim();
      const unidades = parseInt(form.unidades.value);
      const imagen = form.imagen.value.trim();

      if (!nombre) { alert("El nombre es obligatorio"); return false; }
      if (nombre.length > 100) { alert("Nombre: máximo 100 caracteres"); return false; }
      if (!marca) { alert("Selecciona una marca"); return false; }
      if (!modelo) { alert("El modelo es obligatorio"); return false; }
      if (!/^[A-Za-z0-9\s-]+$/.test(modelo)) { alert("Modelo solo puede contener letras, números o guiones"); return false; }
      if (modelo.length > 25) { alert("Modelo: máximo 25 caracteres"); return false; }
      if (isNaN(precio)) { alert("Ingresa un precio válido"); return false; }
      if (precio <= 99.99) { alert("El precio debe ser mayor a 99.99"); return false; }
      if (detalles.length > 250) { alert("Detalles: máximo 250 caracteres"); return false; }
      if (isNaN(unidades)) { alert("Unidades inválidas"); return false; }
      if (unidades < 0) { alert("Las unidades no pueden ser negativas"); return false; }
      if (!imagen) { form.imagen.value = "images/default-product.png"; }

      return true;
    }
  </script>
</head>

<body>
  <h1><?= $id ? "Editar Producto" : "Registrar Producto" ?></h1>

  <form id="form-productos"
        action="set_producto_v2.php"
        method="post"
        onsubmit="return validarProducto()"
        novalidate>

    <?php if($id): ?>
      <input type="hidden" name="id" value="<?= $id ?>">
    <?php endif; ?>

    <label>Nombre:
      <input name="nombre" type="text" maxlength="100" required value="<?= $nombre ?>">
    </label>

    <label>Marca:
      <select name="marca" required>
        <option value="">-- Seleccione --</option>
        <?php
          $marcas = ["Apple","HP","Lenovo","Asus","Acer","Dell","MSI","Microsoft","Razer","Toshiba","Otra"];
          foreach($marcas as $m) {
              $sel = ($m === $marca) ? "selected" : "";
              echo "<option value='$m' $sel>$m</option>";
          }
        ?>
      </select>
    </label>

    <label>Modelo:
      <input name="modelo" type="text" required value="<?= $modelo ?>">
    </label>

    <label>Precio (MXN):
      <input name="precio" type="number" step="0.01" min="0" required value="<?= $precio ?>">
    </label>

    <label>Detalles:
      <textarea name="detalles" rows="4" maxlength="250"><?= $detalles ?></textarea>
    </label>

    <label>Unidades:
      <input name="unidades" type="number" min="0" step="1" value="<?= $unidades ?: 1 ?>" required>
    </label>

    <label>Imagen (ruta o URL):
      <input name="imagen" type="text" maxlength="255" placeholder="img/producto.png" value="<?= $imagen ?>">
    </label>

    <p>
      <button type="submit"><?= $id ? "Actualizar Producto" : "Insertar Producto" ?></button>
      <button type="reset">Limpiar</button>
    </p>
  </form>
</body>
</html>
