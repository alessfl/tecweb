<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
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
</body>
</html>