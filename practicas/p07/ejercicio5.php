<?php   
    require_once 'src/funciones.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $edad = $_POST['edad'] ?? null;
        $sexo = $_POST['sexo'] ?? null;

        if ($edad !== null && $sexo !== null) {
            validarSexoyEdad($sexo, $edad);
        } else {
            echo "<p>Por favor, complete todos los campos.</p>";
        }
    }
?>