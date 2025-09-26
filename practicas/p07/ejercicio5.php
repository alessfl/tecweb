<?php
header("Content-Type: application/xhtml+xml; charset=UTF-8");

$edad = $_POST['edad'];
$sexo = strtolower($_POST['sexo']);

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
  <title>Resultado Ejercicio 5</title>
</head>
<body>
  <?php
  if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
      echo "<p><strong>Bienvenida</strong>, usted está en el rango de edad permitido.</p>";
  } else {
      echo "<p><strong>Acceso denegado</strong>, no cumple con los requisitos de edad y sexo.</p>";
  }
  ?>
</body>
</html>