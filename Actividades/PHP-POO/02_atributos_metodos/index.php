<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01-definicion</title>
</head>
<body>
    <?php
        requiere_once __DIR__.'/Persona.php';

        $per1 = new Persona;
        $per1->inicializar('Juan López');
        $per1->mostrar();

        $per2 = new Persona;
        $per2->inicializar('María Cárdenas');
        $per2->mostrar();
    ?>
</body>
</html>