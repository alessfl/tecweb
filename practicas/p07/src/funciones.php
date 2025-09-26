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

    <?php
    // ejercicio6
    function parqueVehicular() {
        $autos = array(
            "UBN6338" => array(
                "Auto" => array("marca" => "HONDA", "modelo" => 2020, "tipo" => "camioneta"),
                "Propietario" => array("nombre" => "Alfonzo Esparza", "ciudad" => "Puebla, Pue.", "direccion" => "C.U., Jardines de San Manuel")
            ),
            "UBN6339" => array(
                "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla, Pue.", "direccion" => "97 oriente")
            ),
            "XYZ1234" => array(
                "Auto" => array("marca" => "TOYOTA", "modelo" => 2021, "tipo" => "hachback"),
                "Propietario" => array("nombre" => "Luis Hernández", "ciudad" => "CDMX", "direccion" => "Av. Reforma 200")
            ),
            "QWE4567" => array(
                "Auto" => array("marca" => "NISSAN", "modelo" => 2018, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "María Pérez", "ciudad" => "Guadalajara", "direccion" => "Col. Americana")
            ),
            "ASD7890" => array(
                "Auto" => array("marca" => "FORD", "modelo" => 2022, "tipo" => "camioneta"),
                "Propietario" => array("nombre" => "Jorge Ramírez", "ciudad" => "Monterrey", "direccion" => "Centro")
            ),
            "ZXC1122" => array(
                "Auto" => array("marca" => "KIA", "modelo" => 2020, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "Ana Torres", "ciudad" => "Querétaro", "direccion" => "Av. 5 de Febrero")
            ),
            "BNM3344" => array(
                "Auto" => array("marca" => "CHEVROLET", "modelo" => 2019, "tipo" => "hachback"),
                "Propietario" => array("nombre" => "Ricardo López", "ciudad" => "Puebla, Pue.", "direccion" => "San Manuel")
            ),
            "HJK5566" => array(
                "Auto" => array("marca" => "VOLKSWAGEN", "modelo" => 2021, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "Fernanda Díaz", "ciudad" => "CDMX", "direccion" => "Roma Norte")
            ),
            "LMN7788" => array(
                "Auto" => array("marca" => "BMW", "modelo" => 2023, "tipo" => "camioneta"),
                "Propietario" => array("nombre" => "Carlos Gómez", "ciudad" => "Guadalajara", "direccion" => "Chapalita")
            ),
            "POI9900" => array(
                "Auto" => array("marca" => "MERCEDES", "modelo" => 2022, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "Daniela Suárez", "ciudad" => "CDMX", "direccion" => "Polanco")
            ),
            "GHJ2233" => array(
                "Auto" => array("marca" => "TESLA", "modelo" => 2023, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "Eduardo Salinas", "ciudad" => "Monterrey", "direccion" => "San Pedro")
            ),
            "VBN4455" => array(
                "Auto" => array("marca" => "AUDI", "modelo" => 2021, "tipo" => "camioneta"),
                "Propietario" => array("nombre" => "Gabriela Rivas", "ciudad" => "Querétaro", "direccion" => "Centro Histórico")
            ),
            "CDE6677" => array(
                "Auto" => array("marca" => "SEAT", "modelo" => 2020, "tipo" => "hachback"),
                "Propietario" => array("nombre" => "Hugo Medina", "ciudad" => "Puebla, Pue.", "direccion" => "El Carmen")
            ),
            "FGH8899" => array(
                "Auto" => array("marca" => "HYUNDAI", "modelo" => 2019, "tipo" => "sedan"),
                "Propietario" => array("nombre" => "Laura Castillo", "ciudad" => "CDMX", "direccion" => "Santa Fe")
            ),
            "JKL1010" => array(
                "Auto" => array("marca" => "PEUGEOT", "modelo" => 2021, "tipo" => "camioneta"),
                "Propietario" => array("nombre" => "Sofía Aguilar", "ciudad" => "Monterrey", "direccion" => "Col. Obispado")
            )
        );

        // Mostrar estructura general
        echo "<h3>Estructura General del Arreglo</h3>";
        echo "<pre>";
        print_r($autos);
        echo "</pre>";

        // Formulario
        echo '<h3>Consulta de Autos</h3>
        <form method="post" action="">
            <label>Ingrese matrícula: </label>
            <input type="text" name="matricula" placeholder="LLLNNNN (Letras y Números)" required>
            <input type="submit" name="buscar" value="Buscar Auto">
            <br><br>
            <input type="submit" name="mostrarTodos" value="Mostrar Todos los Autos">
        </form><br>';

        // Buscar por matrícula
        if (isset($_POST["buscar"])) {
            $mat = strtoupper(trim($_POST["matricula"]));
            if (array_key_exists($mat, $autos)) {
                echo "<h4>Resultado para matrícula $mat:</h4>";
                echo "<pre>";
                print_r($autos[$mat]);
                echo "</pre>";
            } else {
                echo "<p><b>No se encontró la matrícula $mat</b></p>";
            }
        }

        // Mostrar todos
        if (isset($_POST["mostrarTodos"])) {
            echo "<h4>Todos los Autos Registrados</h4>";
            echo "<pre>";
            print_r($autos);
            echo "</pre>";
        }
    }
    ?>

</body>
</html>