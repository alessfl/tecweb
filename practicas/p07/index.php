<?php include("src/funciones.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1 -> variable (ej1)</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if (isset($_GET['ej1'])) {
            echo "<h3>R= " . esMultiploDe5y7($_GET['ej1']) . "</h3>";
        } 
    ?>

    <h2>Ejercicio 2 -> variable (ej2)</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia</p>
    <?php
        if (isset($_GET['ej2'])) {
            echo generarSecuenciaImparParImpar();
        }
    ?>

    <h2>Ejercicio 3 -> variable (ej3)</h2>
    <p>Utiliza un ciclo while y do-while para encontrar el primer número aleatorio múltiplo de un número dado (por GET).</p>
    <?php
        if (isset($_GET['ej3'])) {
            echo primerNumeroEnteroDeWhile($_GET['ej3']) . "<br>";
            echo primerNumeroEnteroDeDoWhile($_GET['ej3']);
        }
    ?>

    <h2>Ejercicio 4 -> variable (ej4)</h2>
    <p>Crear un arreglo con índices de 97 a 122 y valores de la a a la z.</p>
    <?php
    if (isset($_GET['ej4'])) {
        echo arregloAscii();
    }
    ?>

    <h2>Ejercicio 5</h2>
    <p>Formulario que evalúa si una persona cumple con la edad y sexo solicitados.</p>
    <form action="http://localhost/tecweb/practicas/p07/ejercicio5.php" method="post">       
        Edad: <input type="number" name="edad" required><br>
        Sexo: 
        <select name="sexo">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
        <br>
        <input type="submit">
    </form>

    <h2>Ejercicio 6</h2>
    <p>Formulario de registro del parque vehicular de una ciudad.</p>

    <form action="http://localhost/tecweb/practicas/p07/ejercicio6.php" method="post">
        <label for="matricula">Consultar por matrícula:</label>
        <input type="text" id="matricula" name="matricula" placeholder="Ej: ABC1234" />
        <br /><br />

        <input type="submit" name="consulta" value="Buscar por matrícula" />
        <input type="submit" name="consulta" value="Mostrar todos" />
    </form>


    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>