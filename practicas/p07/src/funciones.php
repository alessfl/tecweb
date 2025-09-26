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
    /*
    if(isset($_GET['numero'])){
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0){
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }*/
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
    /*if (isset($_GET['ej2'])) {
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

        echo "<h3>Secuencia generada:</h3>";
        foreach ($matriz as $fila) {
            echo implode(", ", $fila) . "<br>";
        }
        echo "<p>" . ($iteraciones * 3) . " números obtenidos en $iteraciones iteraciones</p>";
    }*/
    ?>

    <?php
    /* Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.
    • Crear una variante de este script utilizando el ciclo do-while.
    • El número dado se debe obtener vía GET.
    */

        // Ejercicio 3 con while
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
    /*
    Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice. Es decir:
    [97] => a
    [98] => b
    [99] => c
    …
    [122] => z
    ✓ Crea el arreglo con un ciclo for
    ✓ Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach
    foreach ($arreglo as $key => $value) {
    # code...
    } */

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
</body>
</html>