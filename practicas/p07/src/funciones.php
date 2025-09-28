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
    


    //ejercicio5
    function validarSexoyEdad($sexo, $edad){
    if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
        echo "<p><strong>Bienvenida</strong>, usted está en el rango de edad permitido.</p>";
    } else {
        echo "<p><strong>Lo siento, no cumple con los requisitos de edad o sexo...</p>";
    }
    }



function obtenerParqueVehicular() {
    return [
        "ABC1234" => [
            "Auto" => [
                "marca" => "HONDA",
                "modelo" => 2020,
                "tipo"   => "camioneta"
            ],
            "Propietario" => [
                "nombre"    => "Alfonso Esparza",
                "ciudad"    => "Puebla, Pue.",
                "direccion" => "C.U., Jardines de San Manuel"
            ]
        ],
        "XYZ5678" => [
            "Auto" => [
                "marca" => "MAZDA",
                "modelo" => 2019,
                "tipo"   => "sedan"
            ],
            "Propietario" => [
                "nombre"    => "Ma. del Consuelo Molina",
                "ciudad"    => "Puebla, Pue.",
                "direccion" => "97 oriente"
            ]
        ],
        "QWE2345" => [
            "Auto" => [
                "marca" => "TOYOTA",
                "modelo" => 2021,
                "tipo"   => "hatchback"
            ],
            "Propietario" => [
                "nombre"    => "Carlos Méndez",
                "ciudad"    => "CDMX",
                "direccion" => "Av. Reforma 100"
            ]
        ],
        "JKL3456" => [
            "Auto" => [
                "marca" => "FORD",
                "modelo" => 2018,
                "tipo"   => "sedan"
            ],
            "Propietario" => [
                "nombre"    => "Laura Sánchez",
                "ciudad"    => "Guadalajara, Jal.",
                "direccion" => "Col. Americana"
            ]
        ],
        "MNO4567" => [
            "Auto" => [
                "marca" => "CHEVROLET",
                "modelo" => 2022,
                "tipo"   => "camioneta"
            ],
            "Propietario" => [
                "nombre"    => "Miguel Torres",
                "ciudad"    => "Monterrey, NL",
                "direccion" => "San Pedro Garza García"
            ]
        ],
        "PQR5678" => [
            "Auto" => [
                "marca" => "NISSAN",
                "modelo" => 2017,
                "tipo"   => "hatchback"
            ],
            "Propietario" => [
                "nombre"    => "Ana López",
                "ciudad"    => "Toluca, Edo. Mex.",
                "direccion" => "Col. Centro"
            ]
        ],
        "STU6789" => [
            "Auto" => [
                "marca" => "VOLKSWAGEN",
                "modelo" => 2020,
                "tipo"   => "sedan"
            ],
            "Propietario" => [
                "nombre"    => "José Ramírez",
                "ciudad"    => "Querétaro, Qro.",
                "direccion" => "Av. Constituyentes"
            ]
        ],
        "VWX7890" => [
            "Auto" => [
                "marca" => "KIA",
                "modelo" => 2021,
                "tipo"   => "camioneta"
            ],
            "Propietario" => [
                "nombre"    => "Patricia Gómez",
                "ciudad"    => "León, Gto.",
                "direccion" => "Col. Panorama"
            ]
        ],
        "YZA8901" => [
            "Auto" => [
                "marca" => "BMW",
                "modelo" => 2019,
                "tipo"   => "sedan"
            ],
            "Propietario" => [
                "nombre"    => "Andrés Herrera",
                "ciudad"    => "CDMX",
                "direccion" => "Polanco"
            ]
        ],
        "BCD9012" => [
            "Auto" => [
                "marca" => "AUDI",
                "modelo" => 2022,
                "tipo"   => "hatchback"
            ],
            "Propietario" => [
                "nombre"    => "Fernanda Ruiz",
                "ciudad"    => "Mérida, Yuc.",
                "direccion" => "Col. México Norte"
            ]
        ],
        "EFG0123" => [
            "Auto" => [
                "marca" => "MERCEDES",
                "modelo" => 2020,
                "tipo"   => "camioneta"
            ],
            "Propietario" => [
                "nombre"    => "Roberto Díaz",
                "ciudad"    => "Cancún, Q. Roo",
                "direccion" => "Zona Hotelera"
            ]
        ],
        "HIJ1235" => [
            "Auto" => [
                "marca" => "HYUNDAI",
                "modelo" => 2018,
                "tipo"   => "sedan"
            ],
            "Propietario" => [
                "nombre"    => "Lucía Martínez",
                "ciudad"    => "Puebla, Pue.",
                "direccion" => "Col. La Paz"
            ]
        ],
        "KLM2346" => [
            "Auto" => [
                "marca" => "PEUGEOT",
                "modelo" => 2021,
                "tipo"   => "hatchback"
            ],
            "Propietario" => [
                "nombre"    => "Raúl González",
                "ciudad"    => "San Luis Potosí, SLP",
                "direccion" => "Col. Centro"
            ]
        ],
        "NOP3457" => [
            "Auto" => [
                "marca" => "TESLA",
                "modelo" => 2022,
                "tipo"   => "sedan"
            ],
            "Propietario" => [
                "nombre"    => "Sofía Aguilar",
                "ciudad"    => "Zapopan, Jal.",
                "direccion" => "Av. Patria"
            ]
        ],
        "QRS4568" => [
            "Auto" => [
                "marca" => "JEEP",
                "modelo" => 2019,
                "tipo"   => "camioneta"
            ],
            "Propietario" => [
                "nombre"    => "Héctor Castillo",
                "ciudad"    => "Tijuana, BC",
                "direccion" => "Playas de Tijuana"
            ]
        ]
    ];
}

function buscarAuto($matricula) {
    $parque = obtenerParqueVehicular();
    if (isset($parque[$matricula])) {
        return $parque[$matricula];
    }
    return null;
}
?>