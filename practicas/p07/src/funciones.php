<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body> 
    <?php
    //ejecicio1
    function esMultiploDe5y7($num) {
        if ($num % 5 == 0 && $num % 7 == 0) {
            return "El número $num SÍ es múltiplo de 5 y 7.";
        } else {
            return "El número $num NO es múltiplo de 5 y 7.";
        }
    }
    ?>

    <?php
    //ejercicio2
    function generarSecuenciaImparParImpar() {
    $matriz = [];
    $iteraciones = 0;

        do {
            $fila = [];
            for ($i = 0; $i < 3; $i++) {
                $fila[] = rand(1, 999);
            }
            $matriz[] = $fila;
            $iteraciones++;
        } while (!($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0));

        $resultado = "Secuencia generada:<br>";
        foreach ($matriz as $fila) {
            $resultado .= implode(", ", $fila) . "<br>";
        }

        $totalNumeros = $iteraciones * 3;
        $resultado .= "<p><b>$totalNumeros números obtenidos en $iteraciones iteraciones</b></p>";

        return $resultado;
    }
    ?>

    <?php
        // ejercicio 3 con while
        function primerNumeroEnteroDeWhile($num) {
            $aleatorio = rand(1, 1000);
            $iteraciones = 1;

            while ($aleatorio % $num != 0) {
                $aleatorio = rand(1, 1000);
                $iteraciones++;
            }

            return "Número encontrado con while: $aleatorio (en $iteraciones iteraciones)";
        }

        // Ejercicio 3 con do-while
        function primerNumeroEnteroDeDoWhile($num) {
            $iteraciones = 0;
            do {
                $aleatorio = rand(1, 1000);
                $iteraciones++;
            } while ($aleatorio % $num != 0);

            return "Número encontrado con do-while: $aleatorio (en $iteraciones iteraciones)";
        }
    ?>

    <?php
    // ejercicio4
    function arregloAscii() {
        $arreglo = [];

        // Llenar arreglo con índices 97–122
        for ($i = 97; $i <= 122; $i++) {
            $arreglo[$i] = chr($i);
        }

        // Crear tabla XHTML
        $tabla = "<h3>ejercicio 4</h3>";
        $tabla .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $tabla .= "<tr><th> - indice </th><th> - letra </th></tr>";

        foreach ($arreglo as $key => $value) {
            $tabla .= "<tr><td> $key </td><td> $value </td></tr>";
        }
        $tabla .= "</table>";

        return $tabla;
    }
    ?>

    <?php
    //ejercicio5
    function validarSexoyEdad($sexo, $edad){
    if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
        echo "<p><strong>Bienvenida</strong>, usted está en el rango de edad permitido.</p>";
    } else {
        echo "<p><strong>Lo siento, no cumple con los requisitos de edad o sexo...</p>";
    }
    }
    ?>



</body>
</html>