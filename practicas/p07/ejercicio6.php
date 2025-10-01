<?php
header("Content-Type: application/xhtml+xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
require 'src/funciones.php'; // solo funciones, sin HTML
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
  <title>Resultado Ejercicio 6</title>
</head>
<body>
<h2>Resultado del Parque Vehicular</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $opcion = $_POST['consulta'];
    if ($opcion === "Buscar por matrícula" && !empty($_POST['matricula'])) {
        $matricula = strtoupper(trim($_POST['matricula']));
        $auto = buscarAuto($matricula);
        if ($auto) {
            echo '<h3>Información del vehículo con matrícula ' . htmlspecialchars($matricula) . ':</h3>';
            echo '<pre>';
            print_r($auto);
            echo '</pre>';
        } else {
            echo '<p>No se encontró ningún vehículo con la matrícula <strong>' . htmlspecialchars($matricula) . '</strong>.</p>';
        }
    } elseif ($opcion === "Mostrar todos") {
        $parque = obtenerParqueVehicular();
        echo '<h3>Listado completo del parque vehicular:</h3>';
        echo '<pre>';
        print_r($parque);
        echo '</pre>';
    } else {
        echo '<p>Debe ingresar una matrícula o seleccionar una opción válida.</p>';
    }
}
?>
</body>
</html>
